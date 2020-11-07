const express = require('express');
const {Model} = require('mongoose');
const router = express.Router();

// Database Models
const Appointment = require('../../models/index.js')

router.post('/appointmentCreate', (req, res) => {

    newAppointment = Appointment({
        name: req.body.name,
        email: req.body.email,
        phone: req.body.phone,
        slots: {
            slot_time: req.body.slot_time,
            slot_date: req.body.slot_date,
            created_at: Date.now()
        }
    });
    newAppointment.save().then(appointment => res.json(appointment))
})

module.exports = router

