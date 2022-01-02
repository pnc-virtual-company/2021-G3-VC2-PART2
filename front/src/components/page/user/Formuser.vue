<template>
  <div class="text-left">
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
            class="btn-create"
         
        >
          <v-icon dark>
            mdi-plus
          </v-icon>
        </v-btn>
      </template>

      <v-card >
        <v-card-title class="text-h5 blue" >
          Create User
        </v-card-title>

        <v-card-text >
     
            <v-text-field
              v-model="firstname"
              prepend-icon="mdi-account"
              :rules="rules.name"
              color="purple darken-2"
              label="First name"
              required
            ></v-text-field>

      
            <v-text-field
              v-model="lastname"
              prepend-icon="mdi-account"
              :rules="rules.name"
              color="purple darken-2"
              label="Last name"
              required
            ></v-text-field>
          
            <v-text-field
              v-model="email"
              prepend-icon="mdi-gmail"
              :rules="rules.name"
              color="purple darken-2"
              type='email'
              label="Email"
              required
            ></v-text-field>
            <v-autocomplete
              ref="role"
              v-model="role"
              :rules="[() => !!role || 'This field is required']"
              :items="roles"
              prepend-icon="mdi-account-star"
              color="purple darken-2"
              label="Role"
              placeholder="Select..."
              required
            ></v-autocomplete>
              <v-combobox
                v-if="role === 'Student'"
                :rules="[() => !!role || 'This field is required']"
                prepend-icon="mdi-account-multiple"
                label="Choose"
                color="purple darken-2"
                v-model="student_id"
                :items="dataStudent"
                item-text="firstName"
                item-value="id"
                required
              >
                <template v-slot:item="dataStudent">
                  <template>
                    <v-list-item-avatar>
                      <img :src="url + dataStudent.item.image"/>
                    </v-list-item-avatar>
                    <v-list-item-content>
                      <v-list-item-title
                        v-html="dataStudent.item.firstName"
                      ></v-list-item-title>
                      <v-list-item-subtitle
                        v-html="dataStudent.item.class"
                      ></v-list-item-subtitle>
                    </v-list-item-content>
                  </template>
                </template>
              </v-combobox>
            <v-text-field
              v-model="password"
              prepend-icon="mdi-lock"
              :rules="rules.name"
              color="purple darken-2"
              type='password'
              label="Password"
              required
            ></v-text-field>
         
            <v-text-field
              v-model="confirm"
              prepend-icon="mdi-lock"
              :rules="rules.name"
              color="purple darken-2"
              type='password'
              label="Confirm Password"
              required
            ></v-text-field>
            <v-radio-group v-model="gender" >
                <v-radio
                  v-for="n in genders"
                  :key="n"
                  :label="`${n}`"
                  :value="n"
                ></v-radio>
            </v-radio-group>
            <input type="file" @change="onFileSelected">
        
        </v-card-text>

        <v-divider></v-divider>

        <v-card-actions class="blue">
          <v-spacer></v-spacer>
          <v-btn
            color="white"
            text
            @click.prevent="createUser"
          >
            Create
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </div>
</template>
<script>
    import axios from "axios";
    const APP_URL = "http://127.0.0.1:8000/api";
    export default {
        emits:['add-user'],
        components:{
            
        },
        data () {
        return {
            // required for create user

            rules: {
                name: [val => (val || '').length > 0 || 'This field is required'],
            },
            dialog: false,
            url: "http://127.0.0.1:8000/storage/student/images/",
            firstname:'',
            lastname: '',
            email:'',
            password: '',
            student_id:null,
            gender:'Female',
            image:'',
            role:'',
            userinfo:[],
            dataStudent:[],
            roles:['Admin', 'Student', 'Social Affair'],
            genders:['Female','Male'],
            confirm:''
            }
        },
        methods: {

          getStudent(){
              axios.get(APP_URL + "/students").then(res =>{
                this.dataStudent = res.data;
              })
          },
          onFileSelected(event){
            this.image = event.target.files[0];
          },
          createUser(){
            if((this.firstname && this.lastname && this.email && this.role && this.password && this.confirm && this.image) !==''){
              this.isBtn = true
              this.dialog = false;
              let newUser = new FormData();
              newUser.append('firstName', this.firstname);
              newUser.append('lastName', this.lastname);
              newUser.append('email', this.email);
              newUser.append('role', this.role);
              newUser.append('password', this.password);
              newUser.append('password_confirmation', this.confirm);
              newUser.append('gender', this.gender);
              newUser.append('profile', this.image);
              newUser.append('student_id', this.student_id.id);
              this.$emit("add-user",newUser);
              console.log(this.student_id);
            }
              
          }
        },
       mounted() {
         this.getStudent()
       },
    }
</script>
<style scoped>
  .text-h5{
    color: white;
  }
  .btn-create{
    margin: 10px; 
  }
  v-radio{
    display: flex;
  }
  btn-create{
    margin-top: 10px;
  }
</style>