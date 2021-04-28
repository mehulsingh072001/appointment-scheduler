import express from 'express'
import path from 'path'
import cors from 'cors'
import helmet from 'helmet'
//import cookieParser from 'cookie-parser';
import appointmentRoutes from './routes/appointment.routes.js'

const app = express()

//parse body params and attach them to req.body
app.use(express.json())
app.use(express.urlencoded({ extended: true}))
//app.use(cookieParser())

//get current working directory
const cwd = process.cwd()

//secure apps by setting various http headers
app.use(helmet())

//enable cors
app.use(cors())

app.use('/public', express.static(path.join(cwd, 'public')))
app.use(appointmentRoutes)

export default app
