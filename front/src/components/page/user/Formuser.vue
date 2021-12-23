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

      <v-card>
        <v-card-title class="text-h5 blue" >
          Create User
        </v-card-title>

        <v-card-text>
            
            <v-text-field
              label='Firstname'
              prepend-icon="mdi-account"
              :rules="[() => !!role || 'This field is required']"
              type='text'
              v-model="firstname"
            >
            </v-text-field>

            <v-text-field
              label='Lastname'
              prepend-icon="mdi-account"
              :rules="[() => !!role || 'This field is required']"
              type='name'
              v-model="lastname"
            >

            </v-text-field>
              
            <v-text-field
              label='Email'
              prepend-icon="mdi-gmail"
              :rules="[() => !!role || 'This field is required']"
              type='email'
              v-model="email"
            >
              
            </v-text-field>
            <v-autocomplete
              ref="role"
              v-model="role"
              :rules="[() => !!role || 'This field is required']"
              :items="roles"
              prepend-icon="mdi-account-star"
              label="Role"
              placeholder="Select..."
              required
            ></v-autocomplete>
            <v-text-field
              label='Password'
              prepend-icon="mdi-lock"
              :rules="[() => !!role || 'This field is required']"
              type="password"
              v-model="password"
            >
              
            </v-text-field>
            <v-text-field label='Confirm Password' type='password'
                prepend-icon="mdi-lock"
                :rules="[() => !!role || 'This field is required']"
                v-model="confirm"
                >
            </v-text-field>
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
    // import Card from '../../ui/Card.vue'
    export default {
        emits:['add-user'],
        components:{
            
        },
        data () {
        return {
            dialog: false,
            firstname:'',
            lastname: '',
            email:'',
            password: '',
            gender:'Female',
            image:'',
            role:'',
            userinfo:[],
            roles:['Admin', 'Student', 'Social Affair'],
            genders:['Female','Male'],
            confirm:''
            }
        },
        methods: {
          onFileSelected(event){
            this.image = event.target.files[0];
          },
          createUser(){
            if(this.firstname !== ''){
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

              this.$emit("add-user",newUser);
            }
              
          }
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
    margin-top: 15px;
  }
</style>