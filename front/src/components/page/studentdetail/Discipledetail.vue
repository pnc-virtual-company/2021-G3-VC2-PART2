<template>
  <section>
      <template>
    <v-card
      class="mx-auto"
      max-width="800"
    >
      <v-card-text >
        <v-card-subtitle class="d-flex">
            <v-card-text>
               
                <p class="text-h6">{{studentDiscipline.notice_type}}</p>
            </v-card-text>
            <v-card-text>
              <p class="text-h6"><v-icon class="blue--text">mdi-calendar-clock</v-icon> {{studentDiscipline.start_date}}</p>
            </v-card-text>
            
        </v-card-subtitle>
      </v-card-text>
      <v-card-actions>
        <v-btn
          text
          color="teal accent-4"
          @click="reveal = true"
        >
          Reason
        </v-btn>
      </v-card-actions>

      <v-expand-transition>
        <v-card
          v-if="reveal"
          class="transition-fast-in-fast-out v-card--reveal"
          style="height: 100%;"
        >
          <v-card-text class="pb-0">
            <p class="text-h4 text--primary">
              Reason
            </p>
            <p>{{studentDiscipline.reason}}</p>
          </v-card-text>
          <v-card-actions class="pt-0">
            <v-btn
              text
              color="teal accent-4"
              bottom
              @click="reveal = false"
            >
              Close
            </v-btn>
          </v-card-actions>
        </v-card>
      </v-expand-transition>
    </v-card>
  </template>
  </section>
</template>

<script>
  export default {
    props: ["studentDiscipline"],
    data: () => ({
      reveal: false,
     
    }),
  }
</script>
<style scoped>
.v-card--reveal {
  bottom: 0;
  opacity: 1 !important;
  position: absolute;
  width: 100%;
}


.mx-auto{
  margin-top:20px;
}
</style>