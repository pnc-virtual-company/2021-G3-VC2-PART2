<template>
    <section>
        <v-form>
            <v-container>
                <v-row class="input">
                    <h1><v-icon class="blue--text" >mdi-account-star mdi-48px</v-icon> Discipline</h1>
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
      emists:['search-disciple'],
    data: () => ({
      search: '',
      
    }),

    methods: {
 
        searchName(){
            this.$emit('search-disciple', this.search);
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
       margin-right: 50px;
   }
   h1{
       margin-top: 10px;
       font-size: 30px;
   }
</style>
