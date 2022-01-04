<template>

    <v-form class="mx-auto">
        <v-container>
            <v-row class="searchForm">
                <v-col cols="11" class="me-4">
                <v-text-field
                    prepend-icon="mdi-account-search"
                    class="ma"
                    v-model="searchPermission"
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
</template>
<script>
export default {
  props:['search'],
  data(){
    return{
      searchPermission:''
    }
  },
  methods: {
    clearMessage () {
        this.search = ''
    },
    searchName(){
      this.searchPermission;
      this.$emit('search', this.searchPermission);
    }
  },
  mounted() {
  },
}
</script>
<style scoped>
.searchForm{
    margin-top: 20px;
  }
  .ma{
    margin-left: 100px;
  }

</style>