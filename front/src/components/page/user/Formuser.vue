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
            <v-text-field
              label='Password'
              prepend-icon="mdi-lock"
              type="password"
              v-model="password"
            >
              
            </v-text-field>
            <v-text-field
              label="Gender"
              v-model="gender"
              prepend-icon="mdi-gender-transgender"
              type='selected'
            >

            </v-text-field>
             <v-text-field
              label='Profile'
              prepend-icon="mdi-image"
              type='file'
             >
            </v-text-field>
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
            gender:'',
            userinfo:[]
            }
        },
        methods: {
          createUser(){
            if(this.firstname !== ''){
                this.dialog = false;
              this.$emit(
                "add-user",
                this.firstname,
                this.lastname,
                this.email,
                this.password,
                this.gender,
                (
                  this.firstname='',
                  this.lastname='',
                  this.email='',
                  this.password='',
                  this.gender=''
                )
              )
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
</style>