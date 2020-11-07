const express = require('express');
const {Model} = require('mongoose');
const router = express.Router();
const Nexmo = require('nexmo');

// Database Models
const Appointment = require('../../models/index.js')
router.post('/appointmentCreate', (req, res) => {
    newAppointment = Appointment({
        name: req.body.name,
        email: req.body.email,
        phone: req.body.phone
    });
    newAppointment.save().then(appointment => res.json(appointment))
})

module.exports = router

