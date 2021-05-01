import './App.css';
import Calendar from 'react-calendar'
import {useState} from 'react';
import moment from 'moment'
function App() {
  const [dateState, setDateState] = useState(new Date())
  //change date method
  const changeDate = (e) => {
    setDateState(e)
  }
  return (
    <div className="App">
      <Calendar value={dateState} onChange={changeDate}/>
      <p>Current selected date is <b>{moment(dateState).format('MMMM Do YYYY')}</b></p>
    </div>
  );
}

export default App;
