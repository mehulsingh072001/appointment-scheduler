<template>
  <div>
    <div v-for="day in days" v-bind:key="day">
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
        this.days.push(date.getDate());
        date.setDate(date.getDate() + 1);
      }
      console.log(this.month)
      console.log(this.days)
    }
  },
  mounted() {
      var d = new Date()
      this.month = d.getMonth()
      this.year = d.getFullYear()
      this.getDaysInMonth(this.month, this.year)
  }
}
</script>

<style scoped>

</style>
