<template>
  <div class="overlay">
    <v-card>
      <h2 id="edit">Do you want to update?</h2>
      <v-card-text>
        <v-text-field
          label="student_id"
          type="text"
          prepend-icon="mdi-account"
          v-model="student_id"
        >
        </v-text-field>
        <v-text-field
          label="Notice_type"
          type="text"
          prepend-icon="mdi-gmail"
          v-model="notice_type"
        >
        </v-text-field>
  
        <v-text-field
          label="date" 
          type="text"
          prepend-icon="mdi-home"
          v-model="start_date"
        >

        <v-text-field
          label="reason"
          type="text"
          prepend-icon="mdi-home"
          v-model="reason"
        >
        </v-text-field>
    
      </v-card-text>
      <v-divider></v-divider>
      <v-card-actions>
        <v-spacer></v-spacer>
        <v-btn @click="cancel" color="primary " text>Cancel</v-btn>
        <v-btn @click="Update" color="success" text>Update</v-btn>
      </v-card-actions>
    </v-card>
  </div>
</template>
<script>
export default {
  props: ["discipleInfo"],
  emits: ["update", "cancel"],
  data() {
    return {
      student_id:"",
      notice_type: "",
      start_date:"",
      reason: "",
    };
  },

  methods: {
    Update() {
      let disciple = {
        student_id: this.student_id,
        notice_type: this.notice_type,
        start_date: this.start_date,
        reason: this.reason,
      };

      this.$emit("update", this.discipleInfo.id, disciple, false);
    },
    cancel() {
      this.$emit("cancel", false);
    },
  },
  mounted() {
    this.student_id =this.studentInfo.student_id;
    this.notice_type = this.studentInfo.notice_type;
    this.start_date = this.studentInfo.start_date;
    this.reason = this.studentInfo.reason;
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
  background: rgb(108, 185, 226);
}
h3 {
  text-align: center;
  padding: 10px;
  color: #fff;
  background: rgb(108, 185, 226);
}
</style>
