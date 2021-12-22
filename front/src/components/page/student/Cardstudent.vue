<template>
  <v-container>
  <template>
  <v-card color="#81BEF7"
        green>
    <v-card-title >
        Student List
      <v-spacer></v-spacer>
      <v-text-field
        v-model="search"
        append-icon="mdi-magnify"
        label="Search"
        single-line
        hide-details
        @keyup="searchUsername"
      ></v-text-field>
    </v-card-title>
        <v-simple-table>
                <template v-slot:default>
                    <thead class="blue lighten-3" >
                      <tr>
                            <th>profile</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Gender</th>
                            <th>Action</th>
                      </tr>
                    </thead> 
                    <tbody class="blue lighten-4">
                       <tr class="" v-for="student in dataUser" :key="student.name">
                           <td class= "text-4">
                              <img
                                  :src="url + student.image"
                                  alt="No internet"
                                  width="50"
                                  height="52"
                              />
                            </td>
                           <td>{{student.firstName}}</td>
                           <td>{{student.lastName}}</td>
                           <td>{{student.email}}</td>
                           <td>{{student.phone}}</td>
                           <td>{{student.gender}}</td>
                           <td> 
                               <div class="i-con">
                                  <v-icon @click="getStudentId(student.id)">mdi-delete</v-icon>
                                  <v-icon>mdi-lead-pencil</v-icon>
                               </div>
                               
                           </td>
                       </tr>
                    </tbody>
                </template>
            </v-simple-table>
    </v-card>
    </template>
  </v-container>
</template>
<script>
  export default {
    props:['dataUser'],
    emits:['deleteItem',"search-user"],
    data () {
      return {
        search: '',
        studentId:0,
        url: "http://127.0.0.1:8000/storage/student/images/",

       
      }
    },
    methods: {
        getStudentId(id){
            this.deleteId = id;
            this.$emit('deleteItem', this.deleteId);
        },
        searchUsername(){
            this.$emit("search-user", this.search);
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
</style>