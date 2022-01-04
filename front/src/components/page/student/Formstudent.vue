<template>
  <div class="text" v-if="admin !=='Student'">
    <v-dialog v-model="dialog" width="500">
      <template v-slot:activator="{ on, attrs }" v-if="hideData">
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
        <v-card-title class="text-h5 blue white--text">
           Create Student
        </v-card-title>

        <v-card-text>
          <v-text-field
            label="Firstname"
            type="text"
             :rules="rules.name"
            prepend-icon="mdi-account"
            v-model="firstname"
          >
          </v-text-field>
          <v-text-field
            label="Lastname"
             :rules="rules.name"
            type="text"
            prepend-icon="mdi-account"
            v-model="lastname"
          >
          </v-text-field>
          <v-text-field
            label="Email"
            type="text"
            :rules="rules.email"
            prepend-icon="mdi-gmail"
            v-model="email"
          >
          </v-text-field>

          <v-text-field
            label="Class"
            type="text"
            :rules="rules.name"
            prepend-icon="mdi-home"
            v-model="classes"
          >
          </v-text-field>
          <v-text-field
            label="Phone"
            :rules="rules.name"
            type="number"
            prepend-icon="mdi-cellphone"
            v-model="phone"
          >
          </v-text-field>
          <v-text-field
            label="birthday"
            :rules="rules.name"
            type="text"
            prepend-icon="mdi-cake-variant"
            v-model="birthday"
          >
          </v-text-field>
          <v-text-field
            :rules="rules.name"
            label="Password"
            type="password"
            prepend-icon="mdi-lock"
            v-model="password"
          >
          </v-text-field>
          <input type="file" label="Profile" @change="onFileSelected" />
          <v-radio-group v-model="gender">
            <v-radio
              v-for="n in genders"
              :key="n"
              :label="`${n}`"
              :value="n"
            ></v-radio>
          </v-radio-group>
        </v-card-text>
        <v-divider></v-divider>
        <v-card-actions class="blue">
          <v-spacer></v-spacer>
          <v-btn color="white" text @click="createStudent"> Create </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </div>
</template>
<script>
export default {
  emits: ["add-student"],
  props: ['hideData'],
  data() {
    return {
      dialog: false,
      rules: {
        name: [val => (val || '').length > 0 || 'This field is required'],
        email:[val =>(val || '').length>0 || 'This field is required Email'
          ]
      },
      genders: ["Male", "Female"],
      firstname: "",
      lastname: "",
      email: "",
      phone: "",
      classes: "",
      birthday:"",
      image: "",
      password: "",
      gender: "Male",
      admin:localStorage.getItem("Userrole")
     
    };
  },
  methods: {
    onFileSelected(event) {
      this.image = event.target.files[0];
    },
    createStudent() {
      if (this.firstname !== "") {
        this.dialog = false;
        let newStudent = new FormData();
        newStudent.append("firstName", this.firstname);
        newStudent.append("lastName", this.lastname);
        newStudent.append("email", this.email);
        newStudent.append("class", this.classes);
        newStudent.append("password", this.password);
        newStudent.append("image", this.image);
        newStudent.append("gender", this.gender);
        newStudent.append("phone", this.phone);
        newStudent.append("birthday", this.birthday);
        this.$emit("add-student", newStudent);
      }
    },
  },
};
</script>
<style scoped>
  .btn-create{
    margin-top: 10px;
  }
</style>