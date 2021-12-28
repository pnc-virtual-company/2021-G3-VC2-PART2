<template>
  <div class="text-center" v-if="showBtn !=='Student' ">
    <v-dialog
      v-model="dialog"
      width="500"
    >
      <template v-slot:activator="{ on, attrs }">
            <v-btn
                color="blue"
                dark
                fab
                fixed
                right
                v-bind="attrs" v-on="on"
                class="ma-4"
            >
            <v-icon dark>
                mdi-plus
            </v-icon>
            </v-btn>
      </template>

      <v-card>
            <v-card-title class="text-h5 blue white--text">
            Create Permission
            </v-card-title>

            <v-card-text>
               
                 <div>
                     <small>Student</small> <br>
                      <v-icon>mdi-account</v-icon>
                    <select v-model="student_id">
                        <option
                        v-for="student of dataStudent"
                        :key="student.id"
                        :value="student.id"
                        >
                        {{ student.firstName }}
                        </option>
                      
                    </select>
                      <hr>
                </div>
                <v-autocomplete
                    ref="role"
                    v-model="reason"
                    :rules="[() => !!role || 'This field is required']"
                    :items="reasons"
                    prepend-icon="mdi-weather-lightning"
                    label="Reason"
                    placeholder="Select..."
                    required
                ></v-autocomplete>
                
                <v-text-field
                    label="Description"
                    type="text"
                    prepend-icon="mdi-comment-text"
                    v-model = "description"
                >
                </v-text-field>
                <v-text-field
                    label="Start date"
                    type="date"
                    prepend-icon="mdi-calendar-today"
                    v-model = "start_date"
                >
                </v-text-field>
                <v-text-field
                    label="End date"
                    type="date"
                    prepend-icon="mdi-calendar-today"
                    v-model = "end_date"
                >
                </v-text-field>
            </v-card-text>

            <v-divider></v-divider>

            <v-card-actions class="blue white--text">
            <v-spacer></v-spacer>
            <v-btn
                color="white"
                text
                @click.prevent="createPermission" 
            >
                Create
            </v-btn>
            </v-card-actions>
        </v-card>
        </v-dialog>
    </div>
</template>

<script>
import axios from 'axios';
const APP_URL = 'http://127.0.0.1:8000/api';

export default {
    emits:['add-permission'],
    data(){
        return{
            showBtn:localStorage.getItem("Userrole"),
            dialog:false,
            dataStudent:[],
            reasons:['Sick', "Wedding's relative", "Busy", "Interview"],
            studentId:[],
            student_id: "",
            reason: "",
            description: "",
            start_date: "",
            end_date: ""
        }
    },
    methods: {
        //============== get student =================
        getStudent(){
          
            axios.get(APP_URL + "/students").then((res) => {
                this.dataStudent = res.data;
            });
           
              
        },
        createPermission(){
            this.dialog = false;
            let newPermission = new FormData();
            newPermission.append('student_id', this.student_id);
            newPermission.append('reason', this.reason);
            newPermission.append('description', this.description);
            newPermission.append('start_date', this.start_date);
            newPermission.append('end_date', this.end_date);
            this.$emit('add-permission', newPermission);
        }

    },
    mounted() {
       this.getStudent(); 
    },
   
}
</script>
    

<style  scoped>
    select{
        width: 90%;
    }
    btn-create{
        margin-top: 40px;
    }
</style>
