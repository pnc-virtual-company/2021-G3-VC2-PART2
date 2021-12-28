<template>
  <v-form>
    <v-container>
      <v-row>
        <v-col
          cols="12"
          sm="8"
        >
          <v-text-field
            class="m-auto"
            outlined
            label="Search"
             placeholder="Firstname"
            append-icon="mdi-file-find"
          ></v-text-field>
        </v-col>
      </v-row>
    </v-container>
  </v-form>
</template>

<script>
export default {

}
</script>

<style scoped>
    .m-auto{
        margin: auto;
    }
</style>