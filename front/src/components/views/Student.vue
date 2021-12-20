<template>
  
 <v-card
   
    max-width="1000"
    class="mx-auto mt-4"
    
  >  
    <v-list >
      <v-list-item >
        <v-list-item-avatar>
          <v-img src="https://cdn.vuetifyjs.com/images/john.png"></v-img>
        </v-list-item-avatar>
        <v-list-item-content>
          <v-list-item-title>John Leider</v-list-item-title>
          <v-list-item-subtitle>Author</v-list-item-subtitle>
        </v-list-item-content>
        <div>
            <v-text class="mr-2">Tell:090488985</v-text>
            <v-text class="m-3">Email: somoun@gmail.com</v-text>
        </div>
       
        <div>
            <v-btn class="mr-2" color='red' prepend-icon>
                delete
            </v-btn>
            <v-btn color='blue' class="mr-3">
                update
            </v-btn>
        </div>
      </v-list-item>
    </v-list>
  </v-card>
</template>

<script>
export default {

}
</script>

<style>
    .container{
        margin-top: 100px;
        
    }

</style>