
//let loadingElements = document.getElementsByClassName('loading');
let loadingElements = [];
/**
 * 
 * @param {string} urlSend url à traité
 * @param {function} success Function de traitement du succès
 * @returns none
 */
 export function senXhr(urlSend, success) {
    //send to the user we're loadind data
    for (let i = 0; i < loadingElements.length; i++) {
        loadingElements[i].classList.add('loading');
        loadingElements[i].classList.remove('loaded');
    }
    let xhr = new XMLHttpRequest();
    xhr.open('GET', urlSend);
    xhr.responseType = 'json';
    console.log('url :  ', urlSend);
    xhr.send();
    xhr.addEventListener('load', function (response) {
        success(response.target.response);
        //send to the user load data
        //console.log(loadingElements);
        for (let i = 0; i < loadingElements.length; i++) {
            loadingElements[i].classList.add('loaded');
            loadingElements[i].classList.remove('loading');
        }
    });}