require('dotenv').config();
const express = require("express");


const indexRouter = require('./routes/index');
//const commandesRouter = require('./routes/commandes');


const app = express();
const PORT = 8795;

//cors
app.all('*', function (req, res, next) {
  res.header('Access-Control-Allow-Origin', '*');
  res.header('Access-Control-Allow-Methods', 'PUT, GET, POST, DELETE, OPTIONS');
  res.header('Access-Control-Allow-Headers', 'Content-Type, application/json');
  next();
});
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

//crash
app.get('*', function (req, res) {
  res.status(400).json({
    "type": "error",
    "error": 404,
    "message": `route inconnu`});
})

//defaults errors

app.use((req, res, next) => {
  const err = new Error('Not Found');
  err.status = 404;
  next();
});
app.use((err, req, res, next) => {
  res.locals.error = err;
  const status = err.status || 500;
  res.status(status).json({ error: err });
});






//Launch the app
app.listen(PORT, () => {
    console.log(`⚡️[server]: Server is running at http://localhost:${PORT}`);
});
