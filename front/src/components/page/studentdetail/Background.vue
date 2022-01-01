<template>
    <section>
        <template>
            <v-card
                class="mx-auto"
                max-width="800"
                v-for="(student, index) in dataStudent" :key="index"
            >
            <v-card-subtitle>
                <v-card-subtitle class="text-center">
                        <v-avatar size="120"  >
                            <img :src="url + student.image" alt="">
                        </v-avatar>
                        <v-card-text>
                            <p class="text-h4"> {{student.firstName}}</p>
                        </v-card-text>
                </v-card-subtitle>
                <div class="d-flex">
                    <v-card-text>
                        <h5 class="text-h5"><v-icon class="blue--text">mdi-email mdi-36px</v-icon> {{student.email}}</h5>
                        <h5 class="text-h5"><v-icon class="blue--text">mdi-school mdi-36px</v-icon> {{student.class}}</h5>
                    </v-card-text>
                    <v-card-text>
                        <h5 class="text-h5"><v-icon class="blue--text">mdi-phone mdi-36px</v-icon> +885 {{student.phone}}</h5>
                        <h5 class="text-h5"><v-icon class="blue--text">mdi-gender-transgender mdi-36px</v-icon> {{student.gender}}</h5>
                    </v-card-text>
                </div>
            </v-card-subtitle>
        </v-card>
    </template>
    </section>
</template>

<script>
import axios from "axios"
const APP_URL = "http://127.0.0.1:8000/api"
export default {
    data(){
        return{
            dataStudent:[],
            url: "http://127.0.0.1:8000/storage/student/images/",
        }
    },
    methods: {
        getStudent(){
           
           axios.get(APP_URL + "/students").then(res =>{
               this.dataStudent = res.data
               console.log(this.dataStudent);
           })
        }
    },
    mounted() {
        this.getStudent();
    },
}
</script>

<style scoped>
    .blue--text{
        margin-right: 20px;
    }
    h5{
        margin: 15px;
        font-weight:bold ;
    }
    .mx-auto{
        border: 1px solid #ccc;
        box-shadow: 6 9px 12px rgba(0, 0, 0, 0.26);
        margin-top: 30px;
    }
    .d-flex{
        display: flex;
        justify-content: space-between;
    }
</style>