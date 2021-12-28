<template>
  <div class="overlay">
    <v-card>
      <h2 id="edit">Do you want to update?</h2>
      <v-card-text>
         <div>
            <small>Student</small> <br>
            <v-icon>mdi-account</v-icon>
            <select v-model="student_id">
                <option
                v-for="student of dataStudent"
                :key="student.id"
                :value="student.id"
                >
                {{ student.firstName }}
                </option>
              
            </select>
              <hr>
        </div>
        <v-autocomplete
            ref="role"
            v-model="reason"
            :rules="[() => !!role || 'This field is required']"
            :items="reasons"
            prepend-icon="mdi-weather-lightning"
            label="Reason"
            placeholder="Select..."
            required
        ></v-autocomplete>
        
        <v-text-field
          label="Description"
          type="text"
          prepend-icon="mdi-menu"
          v-model="description"
        >
        </v-text-field>
        <v-text-field
          label="start_date"
          type="date"
          prepend-icon="mdi-account-clock"
          v-model="start_date"
        >
        </v-text-field>

        <v-text-field
          label="End_date"
          type="date"
          prepend-icon="mdi-account-clock-outline"
          v-model="end_date"
        >
        </v-text-field>
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
import axios from 'axios';
const APP_URL = 'http://127.0.0.1:8000/api';
export default {
  props: ["permissionInfo"],
  emits: ["update", "cancel"],
  data() {
    return {
      reason: '',
      description: '',
      start_date: '',
      end_date: '',
      student_id:"",
      dataStudent:[],
      reasons:['Sick', "Wedding's relative", "Busy", "Interview"],
    };
  },

  methods: {
    getStudent(){
        axios.get(APP_URL + "/students").then((res) => {
            this.dataStudent = res.data;
        });     
    },
    update() {
       let permission = {
          reason: this.reason,
          description: this.description,
          start_date: this.start_date,
          end_date: this.end_date,
          student_id:this.student_id
      };
      this.$emit('update',this.permissionInfo.id,permission,false);
      console.log(permission);
     
    },
    cancel() {
      this.$emit('cancel', false);
    },
  },
  mounted() {
    this.getStudent();
    this.reason = this.permissionInfo.reason;
    this.description = this.permissionInfo.description;
    // this.start_date = this.permissionInfo.start_date;
    // this.end_date = this.permissionInfo.end_date;
    this.student_id = this.permissionInfo.student_id;
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
  background:rgb(81, 118, 221);
}
h3 {
  text-align: center;
  padding: 10px;
  color: #fff;
  background: rgb(108, 185, 226);
}
</style>
