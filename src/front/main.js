import { senXhr } from "./toolBox.js";

/**
 * Constantes
 */
const PARKING_URL = 'https://geoservices.grand-nancy.org/arcgis/rest/services/public/VOIRIE_Parking/MapServer/0/query?where=1%3D1&text=&objectIds=&time=&geometry=&geometryType=esriGeometryEnvelope&inSR=&spatialRel=esriSpatialRelIntersects&relationParam=&outFields=nom%2Cadresse%2Cplaces%2Ccapacite&returnGeometry=true&returnTrueCurves=false&maxAllowableOffset=&geometryPrecision=&outSR=4326&returnIdsOnly=false&returnCountOnly=false&orderByFields=&groupByFieldsForStatistics=&outStatistics=&returnZ=false&returnM=false&gdbVersion=&returnDistinctValues=false&resultOffset=&resultRecordCount=&queryByDistance=&returnExtentsOnly=false&datumTransformation=&parameterValues=&rangeValues=&f=pjson';
const MAP_URL = 'http://tile.openstreetmap.org/{z}/{x}/{y}.png';
const mapOptions = {
    center: [48.69350, 6.18313],
    zoom: 13
}

/* Les options pour affiner la localisation */
const locationOptions = {
    maximumAge: 10000,
    timeout: 5000,
    enableHighAccuracy: true
};

/**
 *  Création et affichage de la carte 
 */
var map = new L.map("map", mapOptions);

var layer = new L.TileLayer(MAP_URL,
    { attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors' });

map.addLayer(layer);

/**
 * Affichage des parkings
 * @param {json} data 
 * @returns none
 */
function afficherParking(data) {
    console.log('data', data);
    data.features.forEach(features => {
        var marker = L.marker([features.geometry.y, features.geometry.x]).addTo(map);
        marker.on('click', markerOnClick)
        function markerOnClick(e) {
            alert("hi. you clicked the marker at " + e.latlng);
        }
    });
}


document.addEventListener("DOMContentLoaded", function () {
    senXhr(PARKING_URL, afficherParking);

});






/*

//let map = document.getElementById('map');


// On initialise la latitude et la longitude de Paris (centre de la carte)
var lat = 48.852969;
var lon = 2.349903;
var macarte = null;
// Fonction d'initialisation de la carte
function initMap() {
    // Créer l'objet "macarte" et l'insèrer dans l'élément HTML qui a l'ID "map"
    macarte = L.map('map').setView([lat, lon], 11);
    // Leaflet ne récupère pas les cartes (tiles) sur un serveur par défaut. Nous devons lui préciser où nous souhaitons les récupérer. Ici, openstreetmap.fr
    L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
        // Il est toujours bien de laisser le lien vers la source des données
        attribution: 'données © <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>',
        minZoom: 1,
        maxZoom: 20
    }).addTo(macarte);
}
window.onload = function () {
    // Fonction d'initialisation qui s'exécute lorsque le DOM est chargé
    initMap();
};


*/
