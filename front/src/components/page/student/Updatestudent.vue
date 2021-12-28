<template> 
    <div class="overlay">
      <v-card>
        <h2 id="edit">Do you want to update?</h2>
        <v-card-text>
                <v-text-field
                    label="Firstname"
                    type="text"
                    prepend-icon="mdi-account"
                    v-model="firstName"
                >
                </v-text-field>
                <v-text-field
                    label="Lastname"
                    type="text"
                    prepend-icon="mdi-account"
                    v-model="lastName"
                >
                </v-text-field>
                <v-text-field
                    label="Email"
                    type="text"
                    prepend-icon="mdi-gmail"
                    v-model="email"
                >
                </v-text-field>

                <v-text-field
                    label="Class"
                    type="text"
                    prepend-icon="mdi-home"
                    v-model="classes"
                >
                </v-text-field>
                <v-text-field
                    label="Phone"
                    type="number"
                    prepend-icon="mdi-cellphone"
                    v-model="phone"
                >
                </v-text-field>
                <v-text-field
                    label="Password"
                    type="password"
                    prepend-icon="mdi-lock"
                    v-model="password"
                >
                </v-text-field>
          </v-card-text>
    
         <v-divider></v-divider> 

        <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn @click="cancel" color="primary " text >Cancel</v-btn>
            <v-btn @click="Update" color="success" text >Update</v-btn>
        </v-card-actions>
      </v-card>
  </div>
</template>
<script>
export default {
    props: ['studentInfo'],
    emits:['update', 'cancel'],
    data(){
      return{
        firstName:'',
        lastName:'',
        email: '',
        password: '',
        phone: '',
        classes:'',
        gender:''
      }
    },

    methods:{
      Update(){
        let student = {
          firstName:this.firstName,
          lastName:this.lastName,
          email: this.email,
          password: this.password,
          class:this.classes,
          phone:this.phone,
          gender:this.gender,
         
        }
         
        this.$emit('update',this.studentInfo.id, student, false);
      },
      cancel(){
        this.$emit('cancel', false);
      }
    },
    mounted() {
      this.firstName = this.studentInfo.firstName;
      this.lastName = this.studentInfo.lastName;
      this.email = this.studentInfo.email;
      this.password = this.studentInfo.password;
      this.classes = this.studentInfo.class;
      this.phone = this.studentInfo.phone;
      this.gender = this.studentInfo.gender;

    },
}
</script>

<style scoped>

   .overlay {
      position: fixed;
      background: #fff;
      top: 5%;
      left: 35%;
      width: 35%;
      z-index: 100;
      border-radius: 10px;
      box-shadow: rgba(50, 74, 85, 0.26) 0px 2px 4px 0px, rgba(70, 97, 109, 0.178) 0px 2px 16px 0px;
  }
   h2{
    text-align: center;
    padding: 15px;
    color: #fff;
    background: rgb(108, 185, 226);
  }
  h3{
    text-align: center;
    padding: 10px;
    color: #fff;
    background: rgb(108, 185, 226);
  }
  

</style>
