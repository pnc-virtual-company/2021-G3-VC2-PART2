<template>
    <section>
         
        <form-user @add-user="createUser"></form-user>
        <search-user></search-user>
        <!-- <v-data-table
           :headers="headers"
           :items="desserts"
           :>

        </v-data-table> -->
        <card-user :userinfo="userData"></card-user>
    </section>
</template>

<script>
import axios from 'axios';
const APP_URL = 'http://127.0.0.1:8000/api';
import Carduser from "../page/user/Carduser.vue";
import Searchuser from "../page/user/Searchuser.vue";
import Formsearch from "../page/user/Formuser.vue";

export default {
    name:'App',
    components: {
                'card-user': Carduser,
                'search-user': Searchuser,
                'form-user':Formsearch,
            },
        
    data(){
        return{
            userData:[],
            
        }
        
   






    },
    methods: {
        getUser(){
            axios.get(APP_URL+'/users').then(res=>{
                this.userData = res.data;
        
            })
        },
        createUser(userInfo){
            axios.post(APP_URL + '/users', userInfo).then(res=>{
                this.getUser();
                console.log(res.data);
            })
        }
    },
    mounted() {
       this.getUser();
    },
}
</script>

<style>

</style>

