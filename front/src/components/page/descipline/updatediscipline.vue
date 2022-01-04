<template>
  <div class="overlay">
    <v-card>
      <h2 id="edit">Do you want to update?</h2>
      <v-card-text>
        <v-combobox
          prepend-icon="mdi-account-multiple"
          label="Student"
          :items="dataStudent"
          item-text="firstName"
          item-value="id"
          v-model="student_id"
          color="purple darken-2"
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
        <v-combobox
              ref="role"
              :items="types"
              prepend-icon="mdi-note-text"
              label="Notice Type"
              placeholder="Select..."
              color="purple darken-2"
              item-text="name"
              item-value="type"
              v-model="type"
              required
        ></v-combobox>
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
          type="datetime-local"
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
      url: "http://127.0.0.1:8000/storage/student/images/",
      reason: "",
       rules: {
             name: [val => (val || '').length > 0 || 'This field is required'],
            },
      type: [],
      start_date: "",
      student_id: "",
      types:[
          {name:'Misconduct', icon:'mdi-cards'},
          {name:'Oral warning', icon:'mdi-alert-octagon'},
          {name:'Warning letter',icon:'mdi-alert'},
          {name:'Termination', icon:'mdi-cancel'}
        ],
      dataStudent:[],
      idDisciple:null
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
        notice_type: this.type.name,
        icon_type: this.type.icon,
        start_date: this.start_date,
        student_id: this.student_id.id,
      };
      this.$emit("update", this.idDisciple, discipline, false);
    },
    cancel() {
      this.$emit("cancel", false);
    },
  },
  mounted() {
    this.getStudent();
    this.reason = this.disciplineInfo.reason;
    this.notice_type = this.disciplineInfo.type;
    this.start_date = this.disciplineInfo.start_date;
    this.student_id = this.disciplineInfo.student_id;
    this.idDisciple = this.disciplineInfo.id;
  },
};
</script>

<style scoped>
.overlay {
  position: fixed;
  background: blue;
  top: 20%;
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
  color:rgb(248, 246, 246);
  background:blue;
}
h3 {
  text-align: center;
  padding: 10px;
  color: #fff;
  background: rgb(108, 185, 226);
}
</style>
