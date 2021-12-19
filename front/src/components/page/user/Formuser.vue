<template>
  <div class="text-left">
    <v-dialog
      v-model="dialog"
      width="500"
    >
      <template v-slot:activator="{ on, attrs }">
        <v-btn
          class="btn-create"
          color="red lighten-2"
          dark
          v-bind="attrs"
          v-on="on"
        >
          Create
        </v-btn>
      </template>

      <v-card>
        <v-card-title class="text-h5 purple lighten-2" >
          Create User
        </v-card-title>

        <v-card-text>
            
            <v-text-field
              label='Firstname'
              prepend-icon="mdi-account"
              type='text'
              v-model="firstname"
            >
            </v-text-field>

            <v-text-field
              label='Lastname'
              prepend-icon="mdi-account"
              type='name'
              v-model="lastname"
            >

            </v-text-field>
              
            <v-text-field
              label='Email'
              prepend-icon="mdi-gmail"
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
              type="password"
              v-model="password"
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

        <v-card-actions class="purple lighten-2">
          <v-spacer></v-spacer>
          <v-btn
            color="black"
        
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
            genders:['Female','Male']
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
</style>