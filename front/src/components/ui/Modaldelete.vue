<template>
  <div class="text-center">
    <v-dialog
      v-model="dialog"
      width="500"
    >
      <template v-slot:activator="{ on, attrs }">
        <v-btn
          color="red lighten-2"
          dark
          v-bind="attrs"
          v-on="on"
          display="none"
         
        >
        
        </v-btn>
      </template>

      <v-card>
        <v-card-title class="text-h5 grey lighten-2">
          Privacy Policy
        </v-card-title>

        <v-card-text>
            Are you sure! you want to delete?
        </v-card-text>

        <v-divider></v-divider>

        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn
            color="primary"
            text
            @click="dialog = false"
          >
            Yes
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </div>
</template>

<script>
import API from '@/api/api.js'
  export default {
    data () {
      return {
        dialog: false,
        
      }
    },
    methods: {
        
        deleteItem(){
            API.deleteItem('/user'+'/').then(res=>{
                console.log(res.data);
            });
        }
    },
  }
</script>
<style scoped>

</style>