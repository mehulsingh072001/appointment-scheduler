<template>
  <div class="container">
    <div class="dates">
      <div class="button">
        <p class="day">Mon</p>
        <div class="col-day" v-for="date in this.mon" v-bind:key="date.id">
          <button @click="setDate" class="btn" :value="date" id="btn-mon">{{date}}</button>
        </div>
      </div>
      <div class="button">
        <p class="day">Tue</p>
        <div class="col-day" v-for="date in this.tue" v-bind:key="date.id">
          <button @click="setDate" class="btn" :value="date" id="btn-tue">{{date}}</button>
        </div>
      </div>
      <div class="button">
        <p class="day">Wed</p>
        <div class="col-day" v-for="date in this.wed" v-bind:key="date.id">
          <button @click="setDate" class="btn" :value="date" id="btn-wed">{{date}}</button>
        </div>
      </div>
      <div class="button">
        <p class="day">Thu</p>
        <div class="col-day" v-for="date in this.thu" v-bind:key="date.id">
          <button @click="setDate" class="btn" :value="date" id="btn-thu">{{date}}</button>
        </div>
      </div>
      <div class="button">
        <p class="day">Fri</p>
        <div class="col-day" v-for="date in this.fri" v-bind:key="date.id">
          <button @click="setDate" class="btn" :value="date" id="btn-fri">{{date}}</button>
        </div>
      </div>
      <div class="button">
        <p class="day">Sat</p>
        <div class="col-day" v-for="date in this.sat" v-bind:key="date.id">
          <button @click="setDate" class="btn" :value="date" id="btn-sat">{{date}}</button>
        </div>
      </div>
      <div class="button">
        <p class="day">Sun</p>
        <div class="col-day" v-for="date in this.sun" v-bind:key="date.id">
          <button @click="setDate" class="btn" :value="date" id="btn-sun">{{date}}</button>
        </div>
      </div>
    </div>
    <div class="time">
      <button @click="setTime" value="4 PM">4 PM</button>
      <button @click="setTime" value="12 PM">12 PM</button>
      <button @click="setTime" value="3 PM">3 PM</button>
    </div>

    <form action="">
      <input type="text" v-model="name" placeholder="Name">
      <input type="email" v-model="email" placeholder="E-Mail">
    </form>

    <button class="submit" @click="submit">Submit</button>
  </div>
</template>

<script>
import Vue from 'vue'
import axios from 'axios'

export default {
  data(){
    return{
      month: "",
      year: "",
      dates: [],
      sun: [],
      mon: [],
      tue: [],
      wed: [],
      thu: [],
      fri: [],
      sat: [],
      dateValue: "",
      timeValue: "",
      name: "",
      email: ""
    }
  },

  mounted() {
      var d = new Date()
      this.month = d.getMonth()
      this.year = d.getFullYear()
      this.getDatesInMonth()
      this.getDaysOfDates()
      this.fixArrayLength()
      this.emptySpace()
  },

  methods:{
    getDatesInMonth: function() {
      var date = new Date(this.year, this.month);
      while(date.getMonth() === this.month){
        this.dates.push(new Date(date));
        date.setDate(date.getDate() + 1);
      }
    },

    getDaysOfDates: function(){
       for (let i = 0; i < this.dates.length; i++) {
         var date = new Date(this.dates[i])
         var date_to_str = date.toString()
         var strings = []
         strings.push(date_to_str.trim().split(" "));
         for(let i = 0; i < strings.length; i++){
           if(strings[i][0] == 'Mon'){
             this.mon.push(strings[i][2])
           }
           if(strings[i][0] == 'Tue'){
             this.tue.push(strings[i][2])
           }
           if(strings[i][0] == 'Wed'){
             this.wed.push(strings[i][2])
           }
           if(strings[i][0] == 'Thu'){
             this.thu.push(strings[i][2])
           }
           if(strings[i][0] == 'Fri'){
             this.fri.push(strings[i][2])
           }
           if(strings[i][0] == 'Sat'){
             this.sat.push(strings[i][2])
           }
           if(strings[i][0] == 'Sun'){
             this.sun.push(strings[i][2])
           }
           else{
             console.log(false)
           }
         }
      } 
    },
    
    fixArrayLength: function(){
      for(let i = 0; i < this.sun.length; i++){
        if(this.sun[i] == '01'){
          this.mon.unshift(" ")
          this.tue.unshift(" ")
          this.wed.unshift(" ")
          this.thu.unshift(" ")
          this.fri.unshift(" ")
          this.sat.unshift(" ")
        }
        if(this.tue[i] == '01'){
          this.mon.unshift(" ")
        }
        if(this.wed[i] == '01'){
          this.mon.unshift(" ")
          this.tue.unshift(" ")
        }
        if(this.thu[i] == '01'){
          this.mon.unshift(" ")
          this.tue.unshift(" ")
          this.wed.unshift(" ")
        }
        if(this.fri[i] == '01'){
          this.mon.unshift(" ")
          this.tue.unshift(" ")
          this.wed.unshift(" ")
          this.thu.unshift(" ")
        }
        if(this.sat[i] == '01'){
          this.mon.unshift(" ")
          this.tue.unshift(" ")
          this.wed.unshift(" ")
          this.thu.unshift(" ")
          this.fri.unshift(" ")
        }
      }
    },

    emptySpace: function(){
      Vue.nextTick(() =>{
        var btn_mon = document.getElementById('btn-mon')
        var btn_tue = document.getElementById('btn-tue')
        var btn_wed = document.getElementById('btn-wed')
        var btn_thu = document.getElementById('btn-thu')
        var btn_fri = document.getElementById('btn-fri')
        var btn_sat = document.getElementById('btn-sat')
        var btn_sun = document.getElementById('btn-sun')
          if(btn_mon.innerHTML == ' '){
            btn_mon.style.visibility = 'hidden'
          }
          if(btn_tue.innerHTML == ' '){
            btn_tue.style.visibility = 'hidden'
          }
          if(btn_wed.innerHTML == ' '){
            btn_wed.style.visibility = 'hidden'
          }
          if(btn_thu.innerHTML == ' '){
            btn_thu.style.visibility = 'hidden'
          }
          if(btn_fri.innerHTML == ' '){
            btn_fri.style.visibility = 'hidden'
          }
          if(btn_sat.innerHTML == ' '){
            btn_sat.style.visibility = 'hidden'
          }
          if(btn_sun.innerHTML == ' '){
            btn_sun.style.visibility = 'hidden'
          }
          else{
            console.log(false)
          }
      })
    },

    setDate: function(e){
      this.dateValue = e.target.value
      console.log(this.dateValue)
    },
    setTime: function(e){
      this.timeValue = e.target.value
      console.log(this.timeValue)
    },

    submit: function(){
      var dateTime = new Date(this.year, this.month, this.dateValue)
      console.log(dateTime.toJSON())
        axios.post('http://localhost:8000/api/appointments', {appointment_date_time: dateTime,
          name: this.name, email: this.email}).then((res) => console.log(res.json))
    }
  },
}
</script>

<style scoped>
</style>
