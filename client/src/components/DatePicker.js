import '../styles/DatePicker.css';
import Calendar from 'react-calendar'
import {useState} from 'react';
import moment from 'moment'
function App() {
  const [dateState, setDateState] = useState(new Date())
  //change date method
  const changeDate = (e) => {
    setDateState(e)
  }

  const post = (e) => {
    const date = moment(dateState).format('MMMM Do YYYY')
  }
  return (
    <div className="DatePicker">
      <Calendar tileDisabled={({activeStartDate}) => activeStartDate} value={dateState} onChange={changeDate}/>
      <p>Current selected date is <b></b></p>
    </div>
  );
}

export default App;
