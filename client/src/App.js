import './App.css';
import { useEffect, useState } from 'react';
// import DatePicker from './DatePicker'

function App() {
  const [month, setMonth] = useState("")
  const [year, setYear] = useState("")
  const [dateValue, setDateValue] = useState("")
  const [timeValue, setTimeValue] = useState("")
  const [timezone, setTimezone] = useState("")
  const [name, setName] = useState("")
  const [email, setEmail] = useState("")
  const [dates, setDates] = useState([])
  const [sun, setSun] = useState([])
  const [mon, setMon] = useState([])
  const [tue, setTue] = useState([])
  const [wed, setWed] = useState([])
  const [thu, setThu] = useState([])
  const [fri, setFri] = useState([])
  const [sat, setSat] = useState([])

  useEffect(() => {
    setMonthYear()
    getDatesInMonth()
  }, [month, year])

  useEffect(() => {
  })

  
  const setMonthYear = () => {
    var d = new Date()
    setMonth(d.getMonth())
    setYear(d.getFullYear())
    console.log(month)
    console.log(year)
  }

  //get all the dates in specified month
  const getDatesInMonth = () => {
    var date = new Date(year, month);

    const arrayValue = dates
    if(dates.length === 0){
      while(date.getMonth() === month){
        arrayValue.push(new Date(date).toString())
        setDates(arrayValue)
        date.setDate(date.getDate() + 1);
      }
      console.log(dates)
    }
    else{
      dates.length = 0
      while(date.getMonth() === month){
        arrayValue.push(new Date(date).toString())
        setDates(arrayValue)
        date.setDate(date.getDate() + 1);
      }
      console.log(dates)
    }
  }

  return (
    <div className="App">
      {dates.map(function(date, index) {
        return <h2 key={index}>{date}</h2>
      })}
    </div>
  );
}

export default App;
