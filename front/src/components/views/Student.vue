<template>
  <section>
    <form-student @add-student="createStudent"></form-student>
    <search-student @search-student=" searchStudent"></search-student>
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
import Searchstudent from "../page/student/Searchstudent.vue"
import axios from '../../http-common.js'
export default {
  name: "App",
  components: {
    "card-student": Cardstudent,
    "form-student": Formstudent,
    "search-student":Searchstudent,
  },
  data() {
    return {
      userStudent: [],
      role:localStorage.getItem("Userrole")
    };
  },
  methods: {
    //========== get student =====================
    getStudent() {
      
        axios.get("/students").then((res) => {
        this.userStudent = res.data;
        });
      
      
    },
    //=========== create student====================
    createStudent(newStudent) {
      axios.post("/students", newStudent).then((res) => {
        this.getStudent();
        console.log(res.data);  
      });
    },

    //========== function delete student=============
    deleteStudent(studentId) {
      axios.delete("/students/" + studentId).then((res) => {
        console.log(res.data);
        this.getStudent();
      });
    },
    //========= search student =====================
    searchStudent(search) {
      if (search !== "") {
        axios.get("/students" + "/search/" + search).then((res) => {
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