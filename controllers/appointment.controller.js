import Appointment from '../models/appointment.model.js'
import nodemailer from 'nodemailer'

const create = async(req, res) => {
    const newAppointment = new Appointment({
        name: req.body.name,
        email: req.body.email,
        phone: req.body.phone,
        slots: {
            slot_time: req.body.slot_time,
            slot_date: req.body.slot_date,
            created_at: Date.now()
        }
    });
    newAppointment.save().then(() => {
        let transporter = nodemailer.createTransport({
            service: 'gmail',
            auth: {
                user: 'mehulsingh072001@gmail.com',
                pass: 'puntcovaxvedgqpn'
            }
        });

        var mailOptions = {
            from: 'Mehul Singh Rathore',
            to: req.body.email,
            subject: 'Your appointment has been booked.',
            text: `Your appointment has been booked for ${req.body.slot_date} ${req.body.slot_time}`
        }

        transporter.sendMail(mailOptions, (error, info) =>{
            if(error) {
                console.log(error);
            }
            else{
                console.log('Email sent' + info.response)
            }
        });
        res.json(req.body)
    })
    
}

export default {
    create
}
