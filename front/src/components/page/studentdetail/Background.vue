<template>
    <section>
        <template>
            <v-container>
                <h1 class="text-center">Background</h1>
            </v-container>
            <v-card
                class="mx-auto"
                max-width="800"
                
            >

            <v-card-subtitle>
                <v-card-subtitle class="d-flex mr-4">
                        
                        <v-img
                            lazy-src="https://picsum.photos/id/11/10/6"
                            max-height="150"
                            max-width="120"
                            src="https://picsum.photos/id/11/500/300"
                            
                        ></v-img>
                        <v-card-text >
                            <h6 class="text-h6"><v-icon class="blue--text">mdi-account mdi-20px</v-icon>{{studentBacground.firstName}}</h6>
                            <h6 class="text-h6"><v-icon class="blue--text">mdi-cake-variant mdi-20px</v-icon>{{studentBacground.birthday}}</h6>
                            <h6 class="text-h6"><v-icon class="blue--text">mdi-gender-transgender mdi-20px</v-icon> {{studentBacground.gender}}</h6>
                        </v-card-text>
                        <v-card-text>
                            <h6 class="text-h6"><v-icon class="blue--text">mdi-email mdi-20px</v-icon>{{studentBacground.email}}</h6>
                            <h6 class="text-h6"><v-icon class="blue--text">mdi-school mdi-20px</v-icon>{{studentBacground.class}}</h6>
                            <h6 class="text-h6"><v-icon class="blue--text">mdi-phone mdi-20px</v-icon>{{studentBacground.phone}}</h6>
                            
                        </v-card-text>
                        
                </v-card-subtitle>
               
            </v-card-subtitle>
        </v-card>
    </template>
    </section>
</template>

<script>
export default {
    props:['studentBacground'],
    data(){
        return{
            studentdata:[],
            
        }
    },

    methods:{
        getStudentInfo(student){
          this.studentData = student;
        },

    }


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
    .text-center{
        font-size: 40px;
    }
</style>