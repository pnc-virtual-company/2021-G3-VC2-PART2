<template>
  <div class="overlay">
    <v-card>
      <h2 id="edit">Update here</h2>
      <v-card-text>
        <input type="text" placeholder="firstName" v-model="firstName" />
        <input type="text" placeholder="lastName" v-model="lastName" />
        <input type="email" placeholder="Email" v-model="email" />
        <br /><br />
        <label>Chose of gender</label>
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
        <form>
          <!-- <label for="role"> Select of Role: </label> -->
          <select name="role" v-model="role">
             <option value="Select role" disabled>Select role</option>
             <option value="Student">Student</option>
             <option value="Admin">Admin</option>
             <option value="Social Affair">Social Affair</option>
          </select>
        </form>
        
      </v-card-text>

      <v-divider></v-divider>

      <v-card-actions>
        <v-spacer></v-spacer>
        <v-btn @click="cancel" color="primary" text>Cancel</v-btn>
        <v-btn @click="Update" color="success" text>Update</v-btn>
      </v-card-actions>
    </v-card>
  </div>
</template>

<script>
export default {
  props: ["userInfo"],
  emits: ["update", "cancel"],
  data() {
    return {
      firstName: "",
      lastName: "",
      email: "",
      gender: "",
      role: "",
    };
  },

  methods: {
    // .......................Update of user................//
    Update() {
      let user = {
        firstName: this.firstName,
        lastName: this.lastName,
        gender: this.gender,
        email: this.email,
        role: this.role,
      };

      this.$emit("update", this.userInfo.id, user, false);
    },

    cancel() {
      this.$emit("cancel", false);
    },
  },
  mounted() {
    this.firstName = this.userInfo.firstName;
    this.lastName = this.userInfo.lastName;
    this.email = this.userInfo.email;
    this.gender = this.userInfo.gender;
    this.role = this.userInfo.role;
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
  background: #0096;
}
h3 {
  text-align: center;
  padding: 10px;
  color: #fff;
  background: rgb(108, 185, 226);
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
};
label{
  font-size: 20px;
}
</style>
