<template>
  
  <section>
      <h1>Permission</h1>
      <Cardpermission></Cardpermission>
      <Formpermission></Formpermission>

  </section>
</template>

<script>
import Cardpermission from "../page/permission/Cardpermission.vue"
import Formpermission from "../page/permission/Formpermission.vue"
export default {
  components:{
      Cardpermission,
      Formpermission
  },
  data(){
    return{

    }
  }
}
</script>

<style>
</style>