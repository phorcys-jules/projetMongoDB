var express = require('express');
var router = express.Router();

/* GET home page. */

//Error: No default engine was specified and no extension was provided.
//at res.render
router.get('/', function (req, res, next) {
  res.send('index', { title: 'Express' });
  //res.send('Express js server');
});


router.get('/testConnection', async function (req, res, next) {
  const { MongoClient, MongoClients } = require("mongodb");

  // Create a new MongoClient
  //const client = new MongoClient();

  try {
    // Connect the client to the server
    let mongoClient = MongoClients.create("mongodb://localhost:27017");
    //await client.connect();
      //res.send("Connected successfully to mongoDB server");
  } catch (e) {
    res.json({
      error : "impossible de se connecter au server mongo",
      e
    });
  }  finally {
    // Ensures that the client will close when you finish/error
    //await client.close();
    console.log('ok');
  }
});

/*
  // Establish and verify connection
    await client.db("admin").command({ ping: 1 });  //lient.db('firstmongodb').collection('villeNancy').find().toArray()
*/

module.exports = router;
