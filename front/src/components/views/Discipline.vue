<template>
  <section>
      <Formdiscipline @add-discipline="createDiscripline"></Formdiscipline>
    <Searchdiscipline @search-disciple="searchDisciple"></Searchdiscipline>
  
    <Carddescipline :datadiscipline="discipline"  @delete-item="deleteStudentdiscipline" @update-discipline="getdiscipline"></Carddescipline>
  </section>
</template>

<script>
import Searchdiscipline from "../page/descipline/Searchdiscipline.vue"
import Carddescipline from "../page/descipline/Carddescipline.vue"
import Formdiscipline from "../page/descipline/Formdiscipline.vue"
import axios from "axios"
const APP_URL="http://127.0.0.1:8000/api"
export default {
  components:{
    Searchdiscipline,
    Carddescipline,
    Formdiscipline,
  },
    data(){
      return{
        discipline:[],
      }
    
    },
  methods: {
      searchDisciple(search){
        if(search !== ''){
            axios.get(APP_URL + "/discipline/" + search).then(res =>{
            this.discipline = res.data;
          })
        }else{
          this.getdiscipline();
        }
    
    },
    getdiscipline(){
      axios.get(APP_URL + '/discipline').then(res=>{
        this.discipline = res.data;
      })
    },
    createDiscripline(discipline){
      axios.post(APP_URL + '/discipline', discipline).then(res=>{
        this.discipline = res.data;
        this.getdiscipline();
      })
    },
    deleteStudentdiscipline(deleteId){
    axios.delete(APP_URL + "/discipline/" +   deleteId).then(res =>{
      console.log(res.data);
      this.getdiscipline();
      })

    },

  mounted() {
    this.getdiscipline();
  }
  }
};
</script>

<style scoped>
  
</style>