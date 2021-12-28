

<template>
  <section>
    <Formpermission @add-permission="Createpermission"></Formpermission>
    <Searchpermission></Searchpermission>
    <Cardpermission :dataPermission="studentPermission" @delete-item="deleteStudentPermission" @update-permission="getPermission"></Cardpermission>
    </section>
</template>

<script>
import Cardpermission from '../../components/page/permission/Cardpermission.vue';
import Formpermission from '../../components/page/permission/Formpermission.vue';
import Searchpermission from '../../components/page/permission/Searchpermission.vue';
import axios from "axios"
const APP_URL = 'http://127.0.0.1:8000/api';
export default {
  components:{
    Cardpermission,
    Formpermission,
    Searchpermission
  },
  data(){
    return{
      studentPermission:[]
    }
  },
  methods: {
    getPermission(){
      axios.get(APP_URL + '/permission').then(res=>{
        this.studentPermission = res.data;
      })
    },
    Createpermission(newPermission){
      axios.post(APP_URL + '/permission',newPermission).then(res =>{
        this.studentPermission = res.data.permission;
         this.getPermission();
        
      })
    },
    deleteStudentPermission(deleteId){
    axios.delete(APP_URL + "/permission/" +   deleteId).then(res =>{
      console.log(res.data);
      this.getPermission();
    })

  },
  },

  // ======== delete item =========
  
  mounted() {
    this.getPermission();
  },
};
</script>

<style scoped>
</style>