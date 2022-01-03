<template>
  <section>
    <template>
      <v-card
        class="mx-auto"
        max-width="344"
        v-for="(item, index) in data"
        :key="index"
      >
        <v-card-text>
          <div>Word of the Day {{ item.name }}</div>
          <p class="text-h4 text--primary">el·ee·mos·y·nar·y</p>
          <p>adjective</p>
          <div class="text--primary">
            relating to or dependent on charity; charitable.<br />
            "an eleemosynary educational institution."
          </div>
        </v-card-text>
        <v-card-actions>
          <v-btn text color="teal accent-4" @click="reveal = true">
            Learn More
          </v-btn>
        </v-card-actions>

        <v-expand-transition>
          <v-card
            v-if="reveal"
            class="transition-fast-in-fast-out v-card--reveal"
            style="height: 100%"
          >
            <v-card-text class="pb-0">
              <p class="text-h4 text--primary">Origin</p>
              <p>
                late 16th century (as a noun denoting a place where alms were
                distributed): from medieval Latin eleemosynarius, from late
                Latin eleemosyna ‘alms’, from Greek eleēmosunē ‘compassion’
                {{ item.name }}
              </p>
            </v-card-text>
            <v-card-actions class="pt-0">
              <v-btn text color="teal accent-4" @click="reveal = false">
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
    data: [{ name: "stay" }, { name: "stand" }, { name: "stall" }],
  }),
};
</script>
<style>
.v-card--reveal {
  bottom: 0;
  opacity: 1 !important;
  position: absolute;
  width: 100%;
}
</style>