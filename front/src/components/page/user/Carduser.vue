<template>
  <section>
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
                            <th>Phone</th>
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
                           <td>{{item.phone}}</td>
                           <td>{{item.gender}}</td>
                           <td>{{item.role}}</td>
                           <td> 
                               <div class="i-con">
                                   <v-icon @click="getId(item.id)">mdi-delete</v-icon>
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
      
  </section>
  <!-- table -->
    

</template>

<script>
// import Modaldelete from "../../ui/Modaldelete.vue"
export default {
  props:['userinfo'],
  emits:['delete-Item','search-user'],
  components: {
    //   Modaldelete
  },
  data(){
      return{
          deleteId:0,
          search:''
      }

  },
  methods: {
    getId(id){
        this.deleteId = id;
        this.$emit("delete-Item",this.deleteId);
    },
    searchUser(){
        this.$emit("search-user", this.search);
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

</style>

