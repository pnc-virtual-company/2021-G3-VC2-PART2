<template>
  <section>
    
    <Searchdiscipline @search-disciple="searchDisciple"></Searchdiscipline>
    <Carddescipline></Carddescipline>
    <Formdiscipline></Formdiscipline>
  </section>
</template>

<script>
import Searchdiscipline from "../page/descipline/Searchdiscipline.vue"
import Carddescipline from "../page/descipline/Carddescipline.vue"
import Formdiscipline from "../page/descipline/Formdiscipline.vue"
import axios from "axios"
const APP_URL = "http://127.0.0.1:8000/api"
export default {
  components:{
    Searchdiscipline,
    Carddescipline,
    Formdiscipline,
  },
  methods: {
    searchDisciple(search){
      if(search !== ''){
        axios.get(APP_URL + "/discipline/" + search).then(res =>{
        this.getDisciple = res.data;
      })
      }
      
    }
  },
};
</script>

<style>
</style>