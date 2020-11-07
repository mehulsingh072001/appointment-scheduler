const express = require('express');
const mongoose = require('mongoose')

const appointment = require('./routes/api/appointment')

const app = express()

app.all('/*', function(req, res, next){
    // CORS headers
    res.header("Access-Control-Allow-Origin", "*");
    res.header("Access-Control-Allow-Methods", "GET,PUT,POST,DELETE,OPTIONS");
    //set custom headers for CORS
    res.header('Access-Control-Allow-Headers', 'Content-type,Accept,X-Access-Token,X-Key');
    if(req.method == 'OPTIONS'){
        res.status(200).end();
    }else{
        next();
    }
})

app.use(express.json())

//use routes
app.use('api/', appointment)

//DB config
const db = require('./config/keys').mongoURI;
mongoose.connect(db)
    .then(() => console.log('DB connected....'))
    .catch(err => console.log(err));

const port = process.env.PORT || 8083;
app.listen(port, () => console.log(`server started on port ${port}`))
