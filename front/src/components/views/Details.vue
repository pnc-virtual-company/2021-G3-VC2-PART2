<template>
  <v-container fluid>
    <v-tabs align-with-title v-model="tab">
      <v-tab  :to="{ path:'/background'}">Background</v-tab>
      <v-tab :to ="{path:'/permissions'}" >Permission</v-tab>
      <v-tab :to="{path:'/disciplines'}">Discipline</v-tab>
    </v-tabs>
  </v-container>
</template>

<script>
export default {
  name: "App",

  data() {
    return {
      tab: null,
    };
  },
};
</script>