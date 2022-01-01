<template>
  <v-app>
    <Navbar
      v-if="isLogin"
      @log-out="Logout"
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
    Navbar,
  },
  data(){
    return {
      user: null,
      message_error:'',
      isLogin: false,
    }
  },
  methods: {
      login(userData){
           axios.post(APP_URL + '/signin',userData).then(res =>{
               this.dataUser = res.data.user;
               this.$router.push('/user');
               this.isLogin = true;
               this.user = res.data.user;
               localStorage.setItem("userId", res.data.user.id);
               localStorage.setItem("Userrole", res.data.user.role);
               localStorage.setItem("user", res.data.user.firstName);
            
           }).catch(error => {
            let statusCode = error.response.status;
            if(statusCode === 401) {
                this.message_error= 'Invalid data, please try again';
                console.log(this.message_error);
            }
        })
      },
      Logout(isLogout) {
        localStorage.clear();
        this.isLogin = isLogout;
        console.log("Hello");
      }
  },
  mounted() {
    if(localStorage.userId) {
      axios.get("/users/" + localStorage.userId)
      .then(res => {
        this.user = res.data;
        
      })
    }
    let userid = localStorage.getItem('userId');
    if(userid !== null){
      this.isLogin = true;
    }
  },
  
};
</script>
