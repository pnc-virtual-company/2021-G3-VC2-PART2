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
                class="ma-4"
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
                v-model="student_id"
                required
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
              type="date"
              v-model="date"
              required
            ></v-text-field>
        </v-card-text>

        <v-divider></v-divider>
        <v-card-actions class="blue lighten-2">
          <v-spacer></v-spacer>
          <v-btn
            color="white"
            text
            @click.prevent="createDiscripline"
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
    props:['add-discipline'],
    data () {
      return {
        dialog: false,
        rules: {
             name: [val => (val || '').length > 0 || 'This field is required'],
            },
        userStudent:[],
        url: "http://127.0.0.1:8000/storage/student/images/",
        types:[
          {name:'Misconduct', icon:'https://o.remove.bg/downloads/6b5cf122-3248-4794-a513-0dbf175d7a39/image-removebg-preview.png'},
          {name:'Oral warning', icon:'https://o.remove.bg/downloads/0b4c2326-55b0-4acb-8377-fdd7895f59ed/image-removebg-preview.png'},
          {name:'Warning letter',icon:'https://o.remove.bg/downloads/83c2a024-794d-4ff0-83d7-081e84ab9bfa/image-removebg-preview.png'},
          {name:'Termination', icon:'https://o.remove.bg/downloads/39181206-f6b0-4ecf-a70a-bc6401bbbb96/image-removebg-preview.png'}
        ],
        student_id:null,
        reason:'',
        date:'',
        type:''
      }
      
    },
    methods: {
        getStudent() {
            axios.get(APP_URL + "/students").then((res) => {
                this.userStudent = res.data;
            });
        },
        createDiscripline(){
          this.dialog = false;
          let discipline = new FormData();
          discipline.append('student_id', this.student_id.id);
          discipline.append('notice_type', this.type.name);
          discipline.append('reason', this.reason);
          discipline.append('start_date', this.date);
          discipline.append('icon_type', this.type.icon);
          this.$emit('add-discipline', discipline);
        },
        

    },
     mounted(){
        this.getStudent();
    }
  }
</script>
<style scoped>
    
</style>