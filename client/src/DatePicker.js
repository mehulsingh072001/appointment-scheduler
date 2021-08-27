import React from "react";

class DatePicker extends React.Component {
  constructor(props){
    super(props);
    this.state = {
      year: "",
      month: "",
      dates: []
    };
  }

  componentDidMount(){
    this.getDatesInMonth(this.month, this.year)
  }

  //get all the dates in specified month
  getDatesInMonth(month, year){
    var date = new Date(month, year);
    this.month = date.getMonth()
    this.year = date.getFullYear()
    var temp = []
    while(date.getMonth() === month){
      var newDate = new Date(date)
      temp.push(newDate)
      date.setDate(date.getDate() + 1);
    }
    this.setState({dates: [...this.state.dates, temp]})
    console.log(this.dates)
  }
  render(){
    return(
      <h1>Hello</h1>
    )
  }
}

export default DatePicker
