const mongoose = require('mongoose');

const Schema = mongoose.Schema,
    ObjectId = mongoose.Schema.Types.ObjectId;

const slotSchema = new Schema({
    slot_time: String,
    slot_date: String,
    created_at: Date,
})

module.exports  = mongoose.model('Slot', slotSchema);

const appointmentSchema = new Schema({
    id: ObjectId,
    name: String,
    email: String,
    phone: Number,
    slots: {type: ObjectId, ref: 'Slot'},
    created_at: Date
})
module.exports = mongoose.model('Appointments', appointmentSchema)
