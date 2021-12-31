<template>
  <div class="overlay">
    <v-card>
      <h2 id="edit">Do you want to update?</h2>
      <v-card-text>
        <div>
          <small>Student</small> <br />
          <v-icon>mdi-account</v-icon>
          <select v-model="student_id">
            <option
              v-for="student of dataStudent"
              :key="student.id"
              :value="student.id"
            >
              <!-- {{ student.firstName }} -->
            </option>
          </select>
          <hr />
        </div>
        <v-autocomplete
          ref="role"
          :rules="rules.name"
          :items="types"
          prepend-icon="mdi-note-text"
          label="Notice Type"
          placeholder="Select..."
          color="purple darken-2"
          v-model="notice_type"
          required
        ></v-autocomplete>
        <v-text-field
          :rules="rules.name"
          color="purple darken-2"
          prepend-icon="mdi-pill"
          label="Reason"
          v-model="reason"
          required
        ></v-text-field>
        <v-text-field
          :rules="rules.name"
          color="purple darken-2"
          prepend-icon="mdi-calendar-clock"
          label="Date"
          type="date"
          v-model="start_date"
          required
        ></v-text-field>
      </v-card-text>
      <v-divider></v-divider>

      <v-card-actions>
        <v-spacer></v-spacer>
        <v-btn @click="cancel" color="primary" text>Cancel</v-btn>
        <v-btn @click="update" color="success" text>Update</v-btn>
      </v-card-actions>
    </v-card>
  </div>
</template>

<script>
import axios from "axios";
const APP_URL = "http://127.0.0.1:8000/api";
export default {
  props: ["disciplineInfo"],
  emits: ["update", "cancel"],
  data() {
    return {
      reason: "",
      notice_type: "",
      start_date: "",
      student_id: "",
      dataStudent: [],
      types: ["Misconduct", "Oral warning", "Warning letter", "Termination"],
    };
  },
  methods: {
    getStudent() {
      axios.get(APP_URL + "/students").then((res) => {
        this.dataStudent = res.data;
      });
    },
    update() {
      let discipline = {
        reason: this.reason,
        notice_type: this.notice_type,
        start_date: this.start_date,
        student_id: this.student_id,
      };
      this.$emit("update", this.disciplineInfo.id, discipline, false);
      console.log(discipline);
    },
    cancel() {
      this.$emit("cancel", false);
    },
  },
  mounted() {
    this.getStudent();
    this.reason = this.disciplineInfo.reason;
    this.notice_type = this.disciplineInfo.notice_type;
    this.start_date = this.disciplineInfo.start_date;
    this.student_id = this.disciplineInfo.student_id;
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
  padding: 15px;
  color: #fff;
  background: rgb(81, 118, 221);
}
h3 {
  text-align: center;
  padding: 10px;
  color: #fff;
  background: rgb(108, 185, 226);
}
</style>
