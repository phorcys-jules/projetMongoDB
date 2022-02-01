# projetMongoDB
 Projet d'affichage de cartes MongoDB

## Comment lancer le projet ?
    - `docker-compose up` 
    - `cd .\src\api\ `
    - `npm i` 
    - `npm start` 
    - puis rendez vous sur : http://localhost:8795/

## Infos sur le stockage sous mongo

Cette application rècupère certaine informations sur des points d'intèrêt et les stockes sous la structure suivantes :

`{
    "_id" : ObjectId("61f9460f8f0cf6b080b53360"),
    "attributes" : {
        "NOM" : "Mouzimpré",
        "ADRESSE" : "Rue des Prés",
        "PLACES" : 149,
        "CAPACITE" : 240
    },
    "geometry" : {
        "x" : 6.22529681517676,
        "y" : 48.7020180307908
    }
}`
