<template>
    <v-card
        elevation="2"
        width="350"
        height="370"
        class="card"
        
    >
        <div class="d-flex align-center justify-center  "   >
            <v-form class="mt-5">
                <div class="text-center ">
                    <img
                        src="../../assets/pnc.png"
                        alt="Vuetify Admin"
                        width="80"
                        height="80"
                    />
                </div>
                <v-text-field
                    prepend-icon="mdi-account"
                    required
                    label="email"
                    v-model="email"
                    
                ></v-text-field>

                <v-text-field
                    prepend-icon="mdi-lock"
                    type="password"
                    label="password"
                    required
                    v-model="password"
                   
                ></v-text-field>
                <small red>{{message_error}}</small>
                <div class="text-center">
                    
                <v-btn
                    class="btn"
                    color="primary"
                    large
                    type="submit"
                    text
                    rounded
                    @click.prevent="login"
                    >submit</v-btn
                >
                </div>
            </v-form>
        </div>
    </v-card>
</template>

<script>
import axios from 'axios';
let APP_URL = 'http://127.0.0.1:8000/api'
export default {
   data() {
        return {
        email:'',
        password:'',
        message_error:'',
        loading: false,
        };
      
   },
   methods: {
       login(){
           let dataUser = {
               email:this.email,
               password:this.password
           }
           axios.post(APP_URL + '/signin',dataUser).then(res =>{
               this.dataUser = res.data.user;
               this.$router.push('/user');
            
           }).catch(error => {
            let statusCode = error.response.status;
            if(statusCode === 401) {
                this.message_error= 'Invalid data, please try again';
                console.log(this.message_error);
            }
        })

       }


   },

};
</script>
 
<style scoped>
.card{
    margin: auto;
    margin-top: 120px;

}
.btn{
    margin-top: 15px;
}
small{
    color: red;
}

</style>