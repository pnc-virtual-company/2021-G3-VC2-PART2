<template>
    <section>
        <v-form>
            <v-container>
                <v-row class="input">
                    <h1><v-icon class="blue--text" >mdi-account-multiple-plus mdi-48px</v-icon> Users</h1>
                    <v-col
                        cols="12"
                        sm="6"
                    >
                        <v-text-field
                        v-model="search"
                        prepend-icon="mdi-account-search"
                        filled
                        label="Search"
                        @keyup="searchName"
                        >
                           
                        </v-text-field>
                    </v-col>
                </v-row>
            </v-container>
    </v-form>
    </section>
</template>

<script>
    
  export default {
      emists:['search-user'],
    data: () => ({
      search: '',
      
    }),

    methods: {
 
        searchName(){
            this.$emit('search-user', this.search);
        },
    },
    mounted() {
        this.searchName();
    },
  }
</script>

<style scoped>
   .input{
       display: flex;
       justify-content: space-between;
       margin-top: 25px;
   }
   h1{
       margin-top: 10px;
       font-size: 30px;
   }
</style>