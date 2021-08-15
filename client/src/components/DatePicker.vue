<template>
  <div>
    <button>Click</button>
    <div v-for="day in days" v-bind:key="day.id">
      <button id="day">{{day}}</button>
    </div>
  </div>
</template>

<script>
export default {
  mounted() {
      var d = new Date()
      this.month = d.getMonth()
      this.year = d.getFullYear()
      this.getDaysInMonth(this.month, this.year)
  },
  data(){
    return{
      month: "",
      year: "",
      days: []
    }
  },
  methods:{
    getDaysInMonth: function(month, year) {
      var date = new Date(year, month);
      while(date.getMonth() === month){
        this.days.push(new Date(date));
        date.setDate(date.getDate() + 1);
      }
      console.log(this.days)
    }
  },
}
</script>

<style scoped>

</style>
