<template>
  <div class="overlay">
    <v-card>
      <h2 id="edit">Update here</h2>
      <v-card-text>
        <v-text-field
          v-model="firstName"
          prepend-icon="mdi-account"
          :rules="rules.name"
          color="purple darken-2"
          label="First name"
          required
        ></v-text-field>
        <v-text-field
            v-model="lastName"
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
                v-model="student"
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
        
        <input
          type="radio"
          name="fav_language"
          value="Female"
          v-model="gender"
        />Female
        <input
          type="radio"
          name="fav_language"
          value="Male"
          v-model="gender"
        />Male
        <br />
        
      </v-card-text>
      <v-divider></v-divider>

      <v-card-actions class="blue ">
        <v-spacer></v-spacer>
        <v-btn @click="cancel" color="white" text>Cancel</v-btn>
        <v-btn @click="Update" color="white" text>Update</v-btn>
      </v-card-actions>
    </v-card>
  </div>
</template>

<script>
import axios from "../../../http-common"
export default {
  props: ["userInfo"],
  emits: ["update", "cancel"],
  data() {
    return {
      url: "http://127.0.0.1:8000/storage/student/images/",
      dataStudent:[],
      rules: {
        name: [val => (val || '').length > 0 || 'This field is required'],
      },
       roles:['Admin', 'Student', 'Social Affair'],
      firstName: "",
      lastName: "",
      email: "",
      gender: "",
      role: "",
      student:''
    };
  },

  methods: {
     getStudent(){
              axios.get("/students").then(res =>{
                this.dataStudent = res.data;
              })
          },
    Update() {
      let student_id = ''
      if(this.student !== ''){
        this.student_id = this.student.id;
      }
      let user = {
        firstName: this.firstName,
        lastName: this.lastName,
        gender: this.gender,
        email: this.email,
        role: this.role,
        student_id: student_id,
      };

      this.$emit("update", this.userInfo.id, user, false);
    },

    cancel() {
      this.$emit("cancel", false);
    },
  },
  mounted() {
    this.getStudent();
    this.firstName = this.userInfo.firstName;
    this.lastName = this.userInfo.lastName;
    this.email = this.userInfo.email;
    this.gender = this.userInfo.gender;
    this.role = this.userInfo.role;
    this.student_id = this.userInfo.student_id;
    
  },
};
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
  box-shadow: rgba(50, 74, 85, 0.26) 0px 2px 4px 0px,
    rgba(70, 97, 109, 0.178) 0px 2px 16px 0px;
}
h2 {
  text-align: center;
  padding: 10px;
  color: #fff;
  background: blue;
}
h3 {
  text-align: center;
  padding: 10px;
  color: #fff;
  background: rgb(58, 184, 252);
}
input[type="text"],
input[type="email"],
input[type="password"] {
  width: 100%;
  margin-top: 3%;
  padding: 5px;
  outline: none;
  border: 1px solid rgb(194, 193, 193);
  border-radius: 5px;
}
select {
  width: 30%;
  margin-top: 2%;
  margin-left: 2%;
  padding: 2px;
  outline: none;
  border: 1px solid rgb(194, 193, 193);
  border-radius: 5px;
}
input[type="password"] {
  margin-bottom: 2%;
}
input[type="file"] {
  width: 100%;
  margin-top: 3%;
  padding: 5px 0;
  outline: none;
}
label {
  font-size: 20px;
}
</style>
