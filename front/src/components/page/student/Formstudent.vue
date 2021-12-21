<template>
  <div class="text">
    <v-dialog
      v-model="dialog"
      width="500"
    >
      <template v-slot:activator="{ on, attrs }">
        <v-btn
          color="red lighten-2"
          dark
          v-bind="attrs"
          v-on="on"
        >
          Create
        </v-btn>
      </template>

      <v-card>
        <v-card-title class="text-h5 grey lighten-1">
          Create Student
        </v-card-title>

        <v-card-text>
            
        
            <v-text-field label='Firstname' type='text'
                prepend-icon="mdi-account"
                v-model="firstname"
                >
            </v-text-field>
            <v-text-field label='Lastname' type='text'
                prepend-icon="mdi-account"
                v-model="lastname"
                >
            </v-text-field>
            <v-text-field label='Email' type='text'
                prepend-icon="mdi-gmail"
                v-model="email"
                >
            </v-text-field>
            
            <v-text-field label='Class' type='text'
                prepend-icon="mdi-home"
                v-model="classes"
                >
            </v-text-field>
            <v-text-field label='Phone' type='number'
                prepend-icon="mdi-cellphone"
                v-model="phone"
                >
            </v-text-field>
            <v-text-field label='Password' type='password'
                prepend-icon="mdi-lock"
                v-model="password"
                >
            </v-text-field>
            
            
            <input type="file" label='Profile' @change="onFileSelected">
            <v-radio-group v-model="gender" >
                <v-radio
                  v-for="n in genders"
                  :key="n"
                  :label="`${n}`"
                  :value="n"
                ></v-radio>
            </v-radio-group>
        </v-card-text>    

        <v-divider></v-divider>

        <v-card-actions class="grey lighten-1">
          <v-spacer></v-spacer>
          <v-btn
            color="primary"
            text
            @click=" createStudent"
          >
            Create
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </div>
</template>
<script>
  export default {
    emits:['add-student'],
    data () {
      return {
        dialog: false,
        genders:['Male','Female'],
        firstname:'',
        lastname:'',
        email:'',
        phone:'',
        classes:'',
        image:'',
        password:'',
        gender:'Male',
        
      }
    },
    methods: {
        onFileSelected(event){
            this.image = event.target.files[0];
        },
        createStudent(){
            if(this.firstname !== ''){
                this.dialog = false;
                let newStudent = new FormData();
                newStudent.append('firstName', this.firstname);
                newStudent.append('lastName', this.lastname);
                newStudent.append('email', this.email);
                newStudent.append('class', this.classes);
                newStudent.append('password', this.password);
              
                newStudent.append('image', this.image);
                newStudent.append('gender', this.gender);
                newStudent.append('phone', this.phone);


                this.$emit("add-student", newStudent);
            }

        }
    },
  }
</script>