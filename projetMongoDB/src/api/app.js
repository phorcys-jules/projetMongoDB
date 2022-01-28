require('dotenv').config();
const express = require("express");



const indexRouter = require('./routes/index');
//const commandesRouter = require('./routes/commandes');


const app = express();
const PORT = 8795;

//Use for html as view
const path = require('path');
app.use(express.urlencoded({ extended: false }));
//app.use(cookieParser());
app.use(express.static(path.join(__dirname, 'public')));


app.use(express.json());

/**
 * Routes available
 */
 app.use('/', indexRouter);
 //app.use('/commandes', commandesRouter);

 app.get('*', function (req, res) {
    res.status(400).json({
      "type": "error",
      "error": 400,
      "message": `route inconnu`});
  })


//crash

//Launch the app
app.listen(PORT, () => {
    console.log(`⚡️[server]: Server is running at http://localhost:${PORT}`);
});
