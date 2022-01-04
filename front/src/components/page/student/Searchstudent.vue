<template>
    <section>
        <v-form v-if="hideData">
            <v-container>
                <v-row class="input">
                    <h1><v-icon class="blue--text">mdi-account</v-icon>Students</h1>
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
      props: ['hideData'],
    emists:['search-student'],
    data: () => ({
      search: '',
      
    }),

    methods: {
 
        searchName(){
            this.$emit('search-student', this.search);
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