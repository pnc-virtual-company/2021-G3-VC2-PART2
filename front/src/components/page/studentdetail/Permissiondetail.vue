<template>
  <section>
      <template>
      <v-card
        class="mx-auto"
        max-width="800"
        
      >
      <v-card-text class="d-flex">
        
        <v-card-subtitle>
            <v-card-text>
              <p class="text-h6"><v-icon class="blue--text">mdi-calendar-clock</v-icon> {{studentPermission.start_date}}</p>
              <p class="text-h6"><v-icon class="red--text">mdi-calendar-clock</v-icon> {{studentPermission.end_date}}</p>
            </v-card-text>
        </v-card-subtitle>
        <v-card-subtitle>
            <v-card-text>
                <p class="text-h6">Reason: {{studentPermission.reason}}</p>
                <strong class="text-h6"> Amount:</strong> <strong class="text-h6" v-html="Math.round(((new Date(studentPermission.end_date)).getTime() - (new Date(studentPermission.start_date)).getTime()) / (1000 * 3600 * 24))" > </strong> |DAYS
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
              Description
            </p>
            <p>{{studentPermission.description}}</p>
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
    props: ["studentPermission"],
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