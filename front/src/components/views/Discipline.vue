<template>
  <section>
    
    <Searchdiscipline></Searchdiscipline>
    <Carddescipline></Carddescipline>
    <Formdiscipline></Formdiscipline>
  </section>
</template>

<script>
import Searchdiscipline from "../page/descipline/Searchdiscipline.vue"
import Carddescipline from "../page/descipline/Carddescipline.vue"
import Formdiscipline from "../page/descipline/Formdiscipline.vue"

export default {
  components:{
    Searchdiscipline,
    Carddescipline,
    Formdiscipline,
  }
};
</script>

<style>
</style>