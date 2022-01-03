<template>
  <section>
      <template>
    <v-card
      class="mx-auto"
      max-width="900"

    >
      <v-card-text class="d-flex">
        <v-card-subtitle class="d-flex">
            <v-avatar size="90">
              <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSUgoHCc0rNp3hBP7yHkhIEkev-tVfaM4GrMQ&usqp=CAU" alt="">
            </v-avatar>
            <v-card-text>
              <p class="text-h6">USERNAME: </p>
              <p>Class: @021B</p>
            </v-card-text>
        </v-card-subtitle>
        <v-card-subtitle>
            <v-card-text>
              <p class="text-h6"><v-icon class="blue--text">mdi-calendar-clock</v-icon> 12 JAN 2021</p>
              <p class="text-h6"><v-icon class="red--text">mdi-calendar-clock</v-icon> 17 JAN 2021</p>
            </v-card-text>
        </v-card-subtitle>
        <v-card-subtitle>
            <v-card-text>
                <p>Reason: Wedding'relative</p>
                <p>Amount: 2 Days</p>
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
              Origin
            </p>
            <p>late 16th century (as a noun denoting a place where alms were distributed): from medieval Latin eleemosynarius, from late Latin eleemosyna ‘alms’, from Greek eleēmosunē ‘compassion’</p>
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
    data: () => ({
      reveal: false,
      data:[
        {name:'stay'},
        {name:'stand'},
        {name:'stall'},
      ]
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
</style>