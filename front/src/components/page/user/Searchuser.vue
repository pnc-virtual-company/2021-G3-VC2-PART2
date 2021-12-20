<template>
  <v-toolbar
    dark
    color="#385F73"
    max-width = "900px"
    class="mx-auto"
  >
    <v-toolbar-title>Search</v-toolbar-title>
    <v-autocomplete 
      cache-items
      class="mx-4"
      flat
      hide-no-data
      hide-details 
      label="What do you want to search?"
      solo-inverted 
      v-model="title"
      v-on:keyup="searchUser"
    ></v-autocomplete>
    <v-btn icon>
      <v-icon>mdi-dots-vertical</v-icon>
    </v-btn>
  </v-toolbar>
</template>

<script>
export default {
    data(){
        return{
            title:''
        }
    },
    methods: {
        searchUser(){
            console.log(this.title);
        }
    },
    mounted() {
        this.searchUser();
    },
}
</script>

<style scoped>
 
</style>

