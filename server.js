import mongoose from 'mongoose';
import app from './express.js';
import dotenv from 'dotenv';
dotenv.config()

//connection url
mongoose.Promise = global.Promise
mongoose.connect(process.env.MONGODB_URI, {
    "auth": { "authSource": "admin" },
    "user": "mehul",
    "pass": "biteme430",
    "useNewUrlParser": true, 
    "useCreateIndex": true, 
    "useUnifiedTopology": true
})

app.listen(process.env.PORT, (err) => {
    if(err) {
        console.log(err)
    }
    console.info('Server started on port %s', process.env.PORT)
})
