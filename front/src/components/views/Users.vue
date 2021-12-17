<template>
    <section>
        <form-user @add-user="createUser"></form-user>
        <search-user></search-user>
        <card-user :userinfo="userData"></card-user>
        
    </section>
</template>

<script>
import axios from 'axios';
const APP_URL = 'http://127.0.0.1:8000/api';
import Carduser from "../page/user/Carduser.vue";
import Searchuser from "../page/user/Searchuser.vue";
import Formsearch from "../page/user/Formuser.vue"
export default {
    name:'App',
    components: {
                'card-user': Carduser,
                'search-user': Searchuser,
                'form-user':Formsearch
            },
    data(){
        return{
            userData:[]
        }
    },
    methods: {
        getUser(){
            axios.get(APP_URL+'/users').then(res=>{
                this.userData = res.data;
                console.log(this.userData);
                console.log('hello')
            })
        },
        createUser(firstname,lastname,email,password,gender,role){
            const addData = {
                firstname:firstname,
                lastname:lastname,
                email:email,
                password:password,
                gender:gender,
                role:role
            }
            this.userData.push(addData);
            console.log(this.userData);
        }
    },
    mounted() {
       this.getUser();
    },
}
</script>

<style>

</style>

