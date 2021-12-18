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
                              {{item.firstname}} {{item.lastname}}
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
                                  <v-icon
                                    class="mr-4 "
                                  >mdi-delete</v-icon>
                                  <v-icon>mdi-lead-pencil</v-icon>
                          </v-card-title>
                      </div>
                  </v-card>
              </v-col>
          </v-row>
      </v-card>
  </section>
</template>

<script>

export default {
  props:['userinfo']
}
</script>

<style scoped>
.mx-auto{
  margin-top: 30px;
}
</style>

