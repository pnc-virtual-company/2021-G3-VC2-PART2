<template>
  <div class="text-center">
    <v-dialog
      v-model="dialog"
      width="500"
    >
      <template v-slot:activator="{ on, attrs }">
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
        <v-card-title class="text-h5 blue lighten-2 white--text">
          Create Discpline
        </v-card-title>

        <v-card-text>
            <v-combobox
                prepend-icon="mdi-account-multiple"
                label="Student"
                color="purple darken-2"
                :items="userStudent"
                item-text="firstName"
                item-value="id" 
                required
            >
            </v-combobox>
            
             <v-autocomplete
              ref="role"
              :rules="rules.name"
              :items="types"
              prepend-icon="mdi-note-text"
              label="Notice Type"
              placeholder="Select..."
                color="purple darken-2"
              required
            ></v-autocomplete>
            <v-text-field
              :rules="rules.name"
              color="purple darken-2"
              prepend-icon="mdi-pill"
              label="Reason"
              required
            ></v-text-field>
            <v-text-field
              :rules="rules.name"
              color="purple darken-2"
              prepend-icon="mdi-calendar-clock"
              label="Date"
              type="date"
              required
            ></v-text-field>
        </v-card-text>

        <v-divider></v-divider>
        <v-card-actions class="blue lighten-2">
          <v-spacer></v-spacer>
          <v-btn
            color="white"
            text
            @click="dialog = false"
          >
            Create
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </div>
</template>
<script>
    import axios from "axios";
    const APP_URL = "http://127.0.0.1:8000/api";
  export default {
    data () {
      return {
        dialog: false,
        rules: {
             name: [val => (val || '').length > 0 || 'This field is required'],
            },
        userStudent:[],
        types:['Misconduct','Oral warning', 'Warning letter','Termination']
      }
      
    },
    methods: {
        getStudent() {
            axios.get(APP_URL + "/students").then((res) => {
                this.userStudent = res.data;
                console.log(this.userStudent);
            });
        },
    },
     mounted(){
        this.getStudent();
    }
  }
</script>
<style scoped>
    .btn-create{
        margin-top: 10px;
    }
</style>