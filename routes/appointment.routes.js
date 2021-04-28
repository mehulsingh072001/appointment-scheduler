import express from 'express'
import appointmentCtrl from '../controllers/appointment.controller.js'

const router = express.Router();

router.route('/api/appointment')
    .post(appointmentCtrl.create)

export default router

