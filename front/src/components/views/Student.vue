<template>
  <section>
    <form-student @add-student="createStudent"></form-student>
    <card-student
      :dataUser="userStudent"
      @deleteItem="deleteStudent"
      @search-user="searchStudent"
      @update-student="getStudent"
    ></card-student>
  </section>
</template>

<script>
import Cardstudent from "../page/student/Cardstudent.vue";
import Formstudent from "../page/student/Formstudent.vue";
import axios from "axios";
const APP_URL = "http://127.0.0.1:8000/api";
export default {
  name: "App",
  components: {
    "card-student": Cardstudent,
    "form-student": Formstudent,
  },
  data() {
    return {
      userStudent: [],
    };
  },
  methods: {
    //========== get student =====================
    getStudent() {
      axios.get(APP_URL + "/students").then((res) => {
        this.userStudent = res.data;
      });
    },
    //=========== create student====================
    createStudent(newStudent) {
      axios.post(APP_URL + "/students", newStudent).then((res) => {
        this.getStudent();
        console.log(res.data);  
      });
    },

    //========== function delete student=============
    deleteStudent(studentId) {
      axios.delete(APP_URL + "/students/" + studentId).then((res) => {
        console.log(res.data);
        this.getStudent();
      });
    },
    //========= search student =====================
    searchStudent(search) {
      if (search !== "") {
        axios.get(APP_URL + "/students" + "/search/" + search).then((res) => {
          this.userStudent = res.data;
        });
      } else {
        this.getStudent();
      }
    },
  },

  mounted() {
    this.getStudent();
  },
};
</script>

<style>
</style>