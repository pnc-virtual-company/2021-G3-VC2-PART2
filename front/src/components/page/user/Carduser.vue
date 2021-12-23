<template>
  <section>
      <v-container>
  <template>
  <v-card class="table-user" color="#81BEF7"
        green>
    <v-card-title >
        User List
      <v-spacer></v-spacer>
      <v-text-field
        v-model="search"
        append-icon="mdi-magnify"
        label="Search"
        single-line
        hide-details
        @keyup="searchUser"
      ></v-text-field>
    </v-card-title>
        <v-simple-table>
                <template v-slot:default>
                    <thead class="blue lighten-3" >
                      <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Gender</th>
                            <th>Role</th>
                            <th>Action</th>
                      </tr>
                    </thead> 
                    <tbody class="blue lighten-4">
                       <tr class="" v-for="(item, index) in userinfo" :key="index">
                           <td>{{item.firstName}}</td>
                           <td>{{item.lastName}}</td>
                           <td>{{item.email}}</td>
                           <td>{{item.gender}}</td>
                           <td>{{item.role}}</td>
                           <td> 
                               <div class="i-con">
                                    <v-icon class="red--text" @click="getId(item.id)" @>mdi-delete</v-icon>
                                    <v-icon @click="ShowEdit(item)">mdi-lead-pencil</v-icon>
                                    <Updateuser
                                    v-if="showForm"
                                    :userInfo="userData"
                                    @cancel="Cancel"
                                    @update="UpdateUser"
                                    />
                               </div>
                           </td>
                       </tr>
                    </tbody>
                </template>
            </v-simple-table>
    
    </v-card>
    </template>
  </v-container>
      
  </section>
  <!-- table -->
    

</template>

<script>
// import Modaldelete from "../../ui/Modaldelete.vue"
import axios from "axios";
const APP_URL = "http://127.0.0.1:8000/api"
import Updateuser from "../user/Updateuser.vue"
export default {
  props:['userinfo'],
  emits:['delete-Item','search-user','update-user'],
  components: {
    Updateuser
  },
  data(){
      return{
          deleteId:0,
          search:'',
          dialog: false,
          showForm:false,
          userData:""
           
      }

  },
  methods: {
    getId(id){
        this.deleteId = id;
        this.$emit("delete-Item",this.deleteId);
    },
    searchUser(){
        this.$emit("search-user", this.search);
    },
    ShowEdit(user){
      this.userData = user;
      this.showForm = true
    },
    Cancel(hidden){
        this.showForm = hidden
    },
    UpdateUser(id, user, hidden){
        axios.put(APP_URL + '/users/'+ id, user).then((res)=>{
          this.$emit("update-user", res.data);
          this.showForm = hidden;
        })
    }

  },

}
</script>

<style scoped>
.mx-auto{
  margin-top: 30px;
}
table,th{
       font-size:25px;
   }
table,td{
       background:rgb(242, 242, 245);

   }
.table-user{
  margin-top: 25px;
}

</style>

