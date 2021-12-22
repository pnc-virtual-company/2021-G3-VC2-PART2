<template>
    <section>
        <form-user @add-user="createUser"></form-user>
        <card-user :userinfo="userData"  @delete-Item="deleteUser" @search-user="searchUser"></card-user>
    </section>
</template>

<script>
import axios from 'axios';
const APP_URL = 'http://127.0.0.1:8000/api';
import Carduser from "../page/user/Carduser.vue";
import Formsearch from "../page/user/Formuser.vue";

export default {
    name:'App',
    
    components: {
                'card-user': Carduser,
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
        },
        deleteUser(deleteId){
            axios.delete(APP_URL +'/users'+'/'+ deleteId).then(res=>{
                console.log(res.data);
                this.getUser();
                console.log("deleteId")
            });
            
        },
        searchUser(search){
          
            if(this.search !== ''){
                axios.get(APP_URL + '/users/search/' + search).then(res =>{
                    this.userData = res.data;
                })
                ;
            }else{
                this.getUser();
            }
        }
    },

    
    mounted() {
       this.getUser();
    },
}
</script>

<style>

</style>

