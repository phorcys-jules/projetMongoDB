

/* Verifie que le navigateur est compatible avec la géolocalisation */
if ("geolocation" in navigator) {
    navigator.geolocation.getCurrentPosition(handleLocation, handleLocationError, locationOptions);
} else {
    /* Le navigateur n'est pas compatible */
    alert("Géolocalisation indisponible");
}

function handleLocation(position) {
    /* Zoom avant de trouver la localisation */
    map.setZoom(16);
    /* Centre la carte sur la latitude et la longitude de la localisation de l'utilisateur */
    map.panTo(new L.LatLng(position.coords.latitude, position.coords.longitude));
}

function handleLocationError(msg) {
    alert("Erreur lors de la géolocalisation");
}
