<template>
   <v-card-title >
      Welcome to search here
      <v-spacer></v-spacer>
      <v-text-field 
        
        class="mr-16 mt-4"
        v-model="search"
        append-icon="mdi-magnify"
        label="Search"
        single-line
        hide-details 
      ></v-text-field>
    </v-card-title>
</template>

<script>
export default {
    data(){
        return{
            search:''
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

