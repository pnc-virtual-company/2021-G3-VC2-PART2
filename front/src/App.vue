<template>
  <v-app>
    <Navbar/>
    <v-main
      
    >
      <router-view/>
      
    </v-main>
  </v-app>
</template>

<script>
import Navbar from '@/components/nav/Navigation';
export default {
  
  components: {
    Navbar
  },
  data(){
    return {

    }
  },
  methods: {
      logOut(){
            this.$router.push('/');
          }
  },
  

  
};
</script>
