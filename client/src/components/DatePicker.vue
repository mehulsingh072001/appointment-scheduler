<template>
  <div class="container">
    <div class="button">
      <p class="day">Mon</p>
      <div class="col-day" v-for="date in this.mon" v-bind:key="date.id">
        <button class="btn" id="btn-mon">{{date}}</button>
      </div>
    </div>
    <div class="button">
      <p class="day">Tue</p>
      <div class="col-day" v-for="date in this.tue" v-bind:key="date.id">
        <button class="btn" id="btn-tue">{{date}}</button>
      </div>
    </div>
    <div class="button">
      <p class="day">Wed</p>
      <div class="col-day" v-for="date in this.wed" v-bind:key="date.id">
        <button class="btn" id="btn-wed">{{date}}</button>
      </div>
    </div>
    <div class="button">
      <p class="day">Thu</p>
      <div class="col-day" v-for="date in this.thu" v-bind:key="date.id">
        <button class="btn" id="btn-thu">{{date}}</button>
      </div>
    </div>
    <div class="button">
      <p class="day">Fri</p>
      <div class="col-day" v-for="date in this.fri" v-bind:key="date.id">
        <button class="btn" id="btn-fri">{{date}}</button>
      </div>
    </div>
    <div class="button">
      <p class="day">Sat</p>
      <div class="col-day" v-for="date in this.sat" v-bind:key="date.id">
        <button class="btn" id="btn-sat">{{date}}</button>
      </div>
    </div>
    <div class="button">
      <p class="day">Sun</p>
      <div class="col-day" v-for="date in this.sun" v-bind:key="date.id">
        <button class="btn" id="btn-sun">{{date}}</button>
      </div>
    </div>
  </div>
</template>

<script>
import Vue from 'vue'
export default {
  mounted() {
      var d = new Date()
      this.month = d.getMonth()
      this.year = d.getFullYear()
      this.getDatesInMonth(this.month, this.year)
      this.getDaysOfDates()
      this.fixArrayLength()
      this.emptySpace()
  },

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
      empty: false
    }
  },

  methods:{
    getDatesInMonth: function(month, year) {
      var date = new Date(year, month);
      while(date.getMonth() === month){
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
      if(this.sun.length == 4){
        this.sun.unshift(" ")
      }
      if(this.mon.length == 4){
        this.mon.unshift(" ")
      }
      if(this.tue.length == 4){
        this.tue.unshift(" ")
      }
      if(this.wed.length == 4){
        this.wed.unshift(" ")
      }
      if(this.thu.length == 4){
        this.thu.unshift(" ")
      }
      if(this.fri.length == 4){
        this.fri.unshift(" ")
      }
      if(this.sat.length == 4){
        this.sat.unshift(" ")
      }
      else{
        return null
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
    }
  },
  computed: {
  }
}
</script>

<style scoped>
</style>
