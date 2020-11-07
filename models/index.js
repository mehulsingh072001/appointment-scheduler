const mongoose = require('mongoose');

const Schema = mongoose.Schema,
    ObjectId = mongoose.Schema.Types.ObjectId;

const appointmentSchema = new Schema({
    id: ObjectId,
    name: String,
    email: String,
    phone: Number,
    created_at: Date
})
module.exports = mongoose.model('Appointments', appointmentSchema)
