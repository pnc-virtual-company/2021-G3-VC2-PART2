

<template>
  <section>
    <Formpermission @add-permission="Createpermission"></Formpermission>
    <Searchpermission @search="searchName"></Searchpermission>
    <Cardpermission v-for="(permission, index) in studentPermission" :key="index"
    :dataPermission="permission" 
    @delete-item="deleteStudentPermission" 
    @update-permission="getPermission"></Cardpermission>
    </section>
</template>

<script>
import Cardpermission from '../../components/page/permission/Cardpermission.vue';
import Formpermission from '../../components/page/permission/Formpermission.vue';
import Searchpermission from '../../components/page/permission/Searchpermission.vue';
import axios from "../../http-common"

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
      axios.get( '/permission').then(res=>{
        this.studentPermission = res.data;
      })
    },
    Createpermission(newPermission){
      axios.post( '/permission',newPermission).then(res =>{
        this.studentPermission = res.data.permission;
         this.getPermission();
        
      })
    },
    deleteStudentPermission(deleteId){
    axios.delete( "/permission/" +   deleteId).then(res =>{
      console.log(res.data);
      this.getPermission();
      })

    },
    searchName(name){
      if(name !== ''){
        axios.get("/permission/search/" + name).then(res =>{
        this.studentPermission = res.data;
        })
      }else{
        this.getPermission();
      }
      
    }
  },

  // ======== delete item =========
  
  mounted() {
    this.getPermission();
  },
};
</script>

<style scoped>
</style>