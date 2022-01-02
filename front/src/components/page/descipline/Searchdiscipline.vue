<template>
    <section>
        <v-form>
            <v-container>
                <v-row class="searchForm">
                    <v-col cols="12" class="me-4">
                    <v-text-field
                        prepend-icon="mdi-account-search"
                        v-model="search"
                        filled
                        clear-icon="mdi-close-circle"
                        clearable
                        label="Search"
                        type="text"
                        @click:clear="clearMessage"
                        @keyup="searchName"
                    ></v-text-field>
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
        clearMessage () {
            this.search = ''
        },
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
    .searchForm{
        margin-top: 20px;
    }
</style>