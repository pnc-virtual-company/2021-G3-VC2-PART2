<template>
  
<v-autocomplete
      class="search"
      hide-details
      hide-selected
      item-text="name"
      item-value="symbol"
      prepend-icon="mdi-file-find"
      label="Search for a coin..."
      solo
    >
      
</v-autocomplete>
</template>
<script>
export default {
  
}
</script>
<style scoped>
.search{
  width: 78%;
  margin: auto;
  margin-top: 20px;
  border: 1px solid #ccc;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.26);
}


</style>