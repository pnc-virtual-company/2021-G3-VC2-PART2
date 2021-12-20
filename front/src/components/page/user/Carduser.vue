<template>
  <section>
      <v-card
      max-width="900"
      class="mx-auto"
      >
          <v-row dense>
              <v-col cols="12" v-for="(item, index) in userinfo" :key="index">
                  <v-card
                      color="#385F73"
                      dark
                  >
                      <div class="d-flex justify-space-between" >  
                          <v-card-title class="text-h5">
                              {{item.firstName}} {{item.lastName}}
                          </v-card-title>
                          <v-card-title>
                              {{item.gender}}
                          </v-card-title>
                          <v-card-title class="text-h6">
                              diana@gmail.com
                          </v-card-title>
                          <v-card-title>
                              {{item.role}}
                          </v-card-title>
                          <v-card-title>
                                  
                                  
                                  <Modaldelete></Modaldelete>
                                  <v-icon>mdi-lead-pencil</v-icon>
                          </v-card-title>
                      </div>
                  </v-card>
              </v-col>
          </v-row>
      </v-card>
      
  </section>
  <!-- table -->
    

</template>

<script>
import Modaldelete from "../../ui/Modaldelete.vue"
export default {
  props:['userinfo'],
  components: {
      Modaldelete
  },
}
</script>

<style scoped>
.mx-auto{
  margin-top: 30px;
}
</style>

