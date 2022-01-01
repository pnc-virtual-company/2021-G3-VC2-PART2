<template>
  <section>
    <form-user @add-user="createUser"></form-user>
    <card-user
      :userinfo="userData"
      @delete-Item="deleteUser"
      @search-user="searchUser"
      @update-user="getUser"
    ></card-user>
  </section>
</template>

<script>

import axios from '../../http-common.js'
import Carduser from "../page/user/Carduser.vue";
import Formsearch from "../page/user/Formuser.vue";

export default {
  name: "App",

  components: {
    "card-user": Carduser,
    "form-user": Formsearch,
  },
  data() {
    return {
      userData: [],
    };
  },
  methods: {
    getUser() {
      axios.get("/users").then((res) => {
        this.userData = res.data;
      });
    },
    createUser(userInfo) {
      axios.post("/users", userInfo).then((res) => {
        this.getUser();
        console.log(res.data);
      });
    },
    deleteUser(deleteId) {
      axios.delete("/users/" + deleteId).then((res) => {
        console.log(res.data);
        this.getUser();
      
      });
    },
    searchUser(search) {
      if (search !== "") {
        axios.get("/users/search/" + search).then((res) => {
          this.userData = res.data;
        });
      }else{
        this.getUser();
      }
    },
  },
  mounted() {
    this.getUser();
  },
};
</script>

<style>
</style>

