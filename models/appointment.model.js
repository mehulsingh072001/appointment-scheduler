import mongoose from 'mongoose';

const Schema = mongoose.Schema
const ObjectId = mongoose.Schema.Types.ObjectId;

const appointmentSchema = new Schema({
    id: ObjectId,
    name: String,
    email: String,
    phone: Number,
    slots: {
        slot_time: String,
        slot_date: String,
        created_at: Date,
    },
    created_at: Date
})
export default mongoose.model('Appointments', appointmentSchema)

