<template>

    <section>
<<<<<<< HEAD
        <v-container fluid class="card">
    <v-row justify="center">
      <v-expansion-panels 
        popout
      
      >
        <v-expansion-panel hide-actions class="ma-3" >
          <v-expansion-panel-header>
            <v-row align="center" class="spacer mx-auto" no-gutters>
                  <v-card-title class="d-flex" 
=======
        <v-container>
           
                <v-card
                    elevation="15"
                    class="ma-4"
                    v-for="(discipline, index) in datadiscipline"
                    :key="index"
             
                >
                    <v-card-title class="d-flex" 
>>>>>>> 87e330dd393dc737f9b4dd6cde0d81d7c7897603
                    >
                            <v-card-subtitle class="d-flex">
                                <v-avatar  size="90" 
                                    mx-auto>
<<<<<<< HEAD
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSWIKLCtyGwaq0YpqI3vxcPPyn96kEhIpw9IQ&usqp=CAU" alt="">
                                </v-avatar>
                                <v-card-text class="ms-3">
                                        <p class="text-h6">USERNAME: SOTHOUN PHAUV</p>
                                        <p>Class: WEB 2021B</p>
=======
                                <img
                                    :src="url + discipline.student.image"
                                    alt="John"
                                >
                                </v-avatar>
                                <v-card-text class="ms-3">
                                        <p class="text-h6">USERNAME: {{discipline.student.firstName}} </p>
                                        <p>Class: {{discipline.student.class}}</p>
>>>>>>> 87e330dd393dc737f9b4dd6cde0d81d7c7897603
                                </v-card-text>
                            </v-card-subtitle>
                            <v-card-subtitle>
                                <v-avatar size="70px">
                                    <img src="https://o.remove.bg/downloads/8d1a623c-5145-4c6a-9b1d-fba348aa1af6/42081633-danger-warning-attention-sign-removebg-preview.png" alt="">
                                </v-avatar>
                            </v-card-subtitle>
                            <v-card-subtitle class="content ms-5">
                                        <v-card-text class="text-p">
<<<<<<< HEAD
                                            <p class="text-h6"><v-icon color="blue">mdi-calendar-multiple</v-icon> 12 JAN 2021</p>
                                            <p class="text-p"> <v-icon color="blue">mdi-cellphone</v-icon>+885 972045505</p>
=======
                                            <p class="text-h6"><v-icon color="blue">mdi-calendar-multiple</v-icon> {{discipline.start_date}}</p>
                                            <p class="text-p"> <v-icon color="blue">mdi-cellphone</v-icon> {{discipline.student.phone}}</p>
>>>>>>> 87e330dd393dc737f9b4dd6cde0d81d7c7897603
                                        </v-card-text>
                            </v-card-subtitle>
                            <v-card-subtitle class="display">
                                <v-icon  color="red" 
                                    class="red--text"
<<<<<<< HEAD
                                    
                                >mdi-delete mdi-36px</v-icon>
                                <v-icon color="#82E0AA " >mdi-pencil-box mdi-36px</v-icon>
=======
                                      @click="getdisciplineId(discipline.id)"
                                >mdi-delete mdi-36px</v-icon>
                                <v-icon color="#82E0AA "  >mdi-pencil-box mdi-36px</v-icon>
                              
>>>>>>> 87e330dd393dc737f9b4dd6cde0d81d7c7897603
                            </v-card-subtitle>
                    </v-card-title>
<<<<<<< HEAD
            </v-row>
          </v-expansion-panel-header>

          <v-expansion-panel-content>
            <v-divider></v-divider>
            <v-card-text > Hello</v-card-text>
          </v-expansion-panel-content>
        </v-expansion-panel>
      </v-expansion-panels>
    </v-row>
</v-container>

=======
                        
                </v-card>
                <div class="text-center">
                    <v-dialog v-model="dialog" width="500" height='100' >
                        <v-card>
                        <v-card-title class="text-h5 blue lighten-2 white--text">
                            Delete Permission
                        </v-card-title>
                        <h3 class="ma">
                            <v-icon class="orange--text" mdi-48px>mdi-alert-outline</v-icon>Are
                            you sure you want to delete?
                        </h3>
                        <v-divider></v-divider>

                        <v-card-actions class="blue lighten-2">
                            <v-spacer></v-spacer>
                            <v-btn
                            @click="dialog = false"
                            class="teal darken-4 white--text"
                            text
                            >
                            Cancel
                            </v-btn>
                            <v-btn class="red white--text" text @click="deletediscipline">
                            Confirm
                            </v-btn>
                        </v-card-actions>
                        </v-card>
                    </v-dialog>
                </div>
        </v-container>
>>>>>>> 87e330dd393dc737f9b4dd6cde0d81d7c7897603
    </section>
</template>


<script>

export default {
<<<<<<< HEAD

}
</script>

<style>
    .card {
        width: 80%;
    }
    .ma {
        margin: 20px;
    }
    v-row {
        border: 1px solid #ccc;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.26);
    }
    .ma-3{
        border: 1px solid #ccc;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.26);
=======
    props: ["datadiscipline","delete_item"],
    data(){
        return{
            show: false,
            dialog:false,
            url: "http://127.0.0.1:8000/storage/student/images/",
            cardId:null

        }
    },
    methods: {
        getdisciplineId(id) {
            this.deleteId = id;
            this.dialog = true;
        },
        deletediscipline() {
            this.$emit("delete-item", this.deleteId);
            this.dialog = false;
        },
        
    },
    
}
</script>
<style scoped>
    .ma-4{
        margin: auto;
        
    }
    .content{
        display: flex;
        justify-content: space-between;
        
    }
    .ma {
        margin: 20px;
>>>>>>> 87e330dd393dc737f9b4dd6cde0d81d7c7897603
    }
</style>