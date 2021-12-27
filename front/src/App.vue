<template>
  <v-app>
    <Navbar
      v-if="user !== null"
    />
    <v-main
      
    >
      <router-view
      @requestToLogin="login"
      :message="message_error"
      />
      
    </v-main>
  </v-app>
</template>

<script>
import axios from 'axios';
let APP_URL = 'http://127.0.0.1:8000/api'
import Navbar from '@/components/nav/Navigation';
export default {
  
  components: {
    Navbar
  },
  data(){
    return {
      user: null,
      message_error:''
    }
  },
  methods: {
      login(userData){
           axios.post(APP_URL + '/signin',userData).then(res =>{
               this.dataUser = res.data.user;
               this.$router.push('/user');
               this.user = res.data.user;
              localStorage.setItem("userId", res.data.user.id);
              localStorage.setItem("Roleuser", res.data.user.role);
           }).catch(error => {
            let statusCode = error.response.status;
            if(statusCode === 401) {
                this.message_error= 'Invalid data, please try again';
                console.log(this.message_error);
            }
        })
      },
      logOut() {
        this.user = null
        localStorage.removeItem('name');
        localStorage.removeItem('id');
       
      }
  },
  mounted() {
    if(localStorage.userId) {
      axios.get("/users/" + localStorage.userId)
      .then(res => {
        this.user = res.data;
      })
    }
  },
  
};
</script>
