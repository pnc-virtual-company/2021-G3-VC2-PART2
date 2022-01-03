<template>
  <v-container>
  <template>
  <v-card class="table-student" color="#81BEF7"
        green>
        <v-simple-table>
                <template v-slot:default>
                    <thead class="blue lighten-3" >
                      <tr>
                            <th>profile</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>birthday</th>
                            <th>Gender</th>
                            <th v-if="admin !=='Student'">Action</th>
                      </tr>
                    </thead> 
                    <tbody class="blue lighten-4">
                       <tr class="" v-for="student in dataUser" :key="student.name">
                           <td class= "text-4">
                              <img
                                  :src="url + student.image"
                                  alt="No internet"
                                  width="50"
                                  height="50"
                              />
                            </td>
                           <td>{{student.firstName}}</td>
                           <td>{{student.lastName}}</td>
                           <td>{{student.email}}</td>
                           <td>+885 {{student.phone}}</td>
                           <td>{{student.birthday}}</td>
                           <td>{{student.gender}}</td>
                           <td v-if="admin !=='Student'"> 
                               <div class="i-con">
                                  <v-icon class="red--text"  @click="getStudentId(student.id)">mdi-delete</v-icon>
                                  <v-icon @click="getStudentInfo(student)">mdi-lead-pencil</v-icon>
                                  <update-student 
                                  v-if="showForm"
                                  :studentInfo="studentData"
                                  @cancel="Cencel"
                                  @update="Updatestudent"
                                  >
                                  </update-student>
                               </div>
                               
                           </td>
                       </tr>
                    </tbody>
                </template>
            </v-simple-table>
    </v-card>
    </template>
    <div class="text-center">
        <v-dialog
          v-model="dialog"
          width="500"
        >
        <v-card>
            <v-card-title class="text-h5 grey lighten-2 black--text">
              Delete User
            </v-card-title>
            <h3 class="ma"><v-icon class="orange--text"  mdi-48px>mdi-alert-outline</v-icon>Are you sure you want to delete?</h3>
            <v-divider></v-divider>

            <v-card-actions class="grey lighten-2">
              <v-spacer></v-spacer>
              <v-btn
                @click="dialog = false"
                color='blue'
                text
              >
                Cancel
              </v-btn>
              <v-btn
                color='red'
                text
                @click="deleteStudent"
                
              >
                Delete
              </v-btn>
            </v-card-actions>
          </v-card>
        </v-dialog>
      </div>
  </v-container>
  
</template>
<script>
  import axios from '../../../http-common'
  import Updatestudent from "../student/Updatestudent.vue";
  export default {
 
    props:['dataUser'],
    emits:['deleteItem',"search-user","update-student"],
    components:{
        'update-student':Updatestudent,
    },
    data () {
      
      
      return {
        search: '',
        studentId:0,
        url: "http://127.0.0.1:8000/storage/student/images/",
        showForm:false,
        dialog:false,
        studentData:[],
        admin:localStorage.getItem('Userrole'),
      }
    },
    methods: {
    //  ============= delete ============
        getStudentId(id){
            this.dialog = true;
            this.deleteId = id;
            
        },
        deleteStudent(){
            this.$emit('deleteItem', this.deleteId);
            this.dialog = false;
        },
        //======== get student=========
        getStudentInfo(student){
          this.showForm = true;
          this.studentData = student;
        },
        // =========== update student=========
        Cencel(hidden){
          this.showForm = hidden;
        },
        Updatestudent(id,student,hidden){
          axios.put('/students/' + id, student).then((res) =>{
            console.log(res.data);
            this.$emit("update-student", res.data);
            this.showForm = hidden;

          })
        }
    },
  }
</script>
<style scoped>
    v-card-title{
        background: rgb(85, 237, 248);
    }
    .t-head{
        display: flex;
        justify-content: space-between;
    }
    th{
        color: black;
     
    }
    td{
        color: black;
       
    }
    img{
      border-radius: 50%;
      margin-top: 5px;
    }
    .table-student{
       margin-top: 25px;
    }
    .ma{
      margin:20px;
    }

</style>