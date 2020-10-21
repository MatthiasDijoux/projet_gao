import { BehaviorSubject } from "rxjs";

import { requestOptions } from "../_helpers/request-options";
import { handleResponse } from "../_helpers/handle-response";


const currentUserSubject = new BehaviorSubject(
    JSON.parse(localStorage.getItem("currentUser"))
);

export const authenticationService = {
    connected,
    login,
    logout,
    isAdmin,
    isProducer() {
        console.log(role())
        return role() === Role.Producteur
    },
    currentUser: currentUserSubject.asObservable(),
    get currentUserValue() {
        return currentUserSubject.value;
    }
};

function connected() {
    const user = localStorage.getItem("currentUser");
    return !_.isNull(user)
}

function login(user) {
    return fetch(
        `/api/login`,
        requestOptions.post(user)
    )
        .then(handleResponse)
        .then(({ data }) => {
            // store user details and jwt token in local storage to keep user logged in between page refreshes
            localStorage.setItem("currentUser", JSON.stringify(data));
            currentUserSubject.next(data);

            return data;
        });
}
function checkAuthentication() {
    let currentUser = localStorage.getItem("currentUser");
    if (!currentUser) {
        // not logged in so redirect to login page with the return url
        return next({ path: "/login", query: { returnUrl: to.path } });
    }
}

function logout() {
    // remove user from local storage to log user out
    localStorage.removeItem("currentUser");
    currentUserSubject.next(null);
}

function isAdmin() {
    return role() === Role.Admin
}

function role() {
    let user = localStorage.getItem("currentUser");
    if (!user) {
        return null
    }
    user = JSON.parse(user)
    return user.role.name
}
