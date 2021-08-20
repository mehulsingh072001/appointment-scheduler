<template>
  <div>
    <button>Click</button>
    <div v-for="date in dates" v-bind:key="date.id">
      <button id="day">{{date}}</button>
    </div>
  </div>
</template>

<script>
export default {
  mounted() {
      var d = new Date()
      this.month = d.getMonth()
      this.year = d.getFullYear()
      this.getDatesInMonth(this.month, this.year)
      this.getDaysOfDates()
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
      sat: []
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
      console.log(this.sun)
      console.log(this.mon)
      console.log(this.tue)
      console.log(this.wed)
      console.log(this.thu)
      console.log(this.fri)
      console.log(this.sat)
    }
  },
}
</script>

<style scoped>

</style>
