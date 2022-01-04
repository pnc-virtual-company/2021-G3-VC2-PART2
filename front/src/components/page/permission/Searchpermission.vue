<template>

  
  <v-form>
    <v-container>
      <v-row class="input">
        <h1><v-icon class="blue--text">mdi-account-key mdi-48px</v-icon> Permission</h1>
        <v-col
            cols="12"
            sm="6"
        >
            <v-text-field
                v-model="searchPermission"
                prepend-icon="mdi-account-search"
                filled
                label="Search"
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
.input{
        display: flex;
        justify-content: space-between;
        margin-top: 25px;
        margin-right: 50px;
  }
  h1{
      font-size: 30px;
      margin-top:10px ;
  }

</style>