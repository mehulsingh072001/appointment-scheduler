<template>
  <div>
    <button @click="getDaysInMonth(month, year)">Click</button>
    <div v-for="day in days">
      <button id="day">{{day}}</button>
    </div>
  </div>
</template>

<script>
export default {
  data(){
    return{
      month: "",
      year: "",
      days: []
    }
  },
  methods:{
    getDaysInMonth: function(month, year) {
      var date = new Date(year, month, 1);
      while(date.getMonth() === month){
        this.days.push(new Date(date));
        date.setDate(date.getDate() + 1);
      }
      console.log(this.month)
    }
  },
  mounted() {
      var d = new Date()
      this.month = d.getMonth()
      this.year = d.getFullYear()
  }
}
</script>

<style scoped>

</style>
