<template>
  <section>
    <Formpermission @add-permission="Createpermission"></Formpermission>
    <Cardpermission></Cardpermission>
    
    </section>
</template>

<script>
import Cardpermission from '../../components/page/permission/Cardpermission.vue';
import Formpermission from '../../components/page/permission/Formpermission.vue'
import axios from "axios"
const APP_URL = 'http://127.0.0.1:8000/api';
export default {
  components:{
    Cardpermission,
    Formpermission
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
        console.log(this.studentPermission);
      })
    },
    Createpermission(newPermission){
      axios.post(APP_URL + '/permission',newPermission).then(res =>{
        console.log(res.data);
      })
    }
  },
  mounted() {
    this.getPermission();
  },
};
</script>

<style scoped>
</style>