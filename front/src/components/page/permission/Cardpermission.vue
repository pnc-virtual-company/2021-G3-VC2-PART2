<template>
<section>
    <template>
        <v-card
        class="ma"
            max-width="500"
            outlined
        >
            <v-list-item three-line d-flex>
            <v-list-item-content>
                <p></p>
                <div class="text-overline mb-4">
                OVERLINE
                </div>
                <v-list-item-title class="text-h5 mb-1">
                Headline 5
                </v-list-item-title>
                <v-list-item-subtitle>Greyhound divisely hello coldly fonwderfully</v-list-item-subtitle>
            </v-list-item-content>

            <v-list-item-avatar
                tile
                size="80"
                color="grey"
            ></v-list-item-avatar>
            </v-list-item>

            <v-card-actions>
            <v-btn
                outlined
                rounded
                text
            >
                Button
            </v-btn>
            </v-card-actions>
        </v-card>
        </template>
    </section>
</template>

<script>
import axios from "axios";
const APP_URL = "http://127.0.0.1:8000/api"
export default {
    data(){
        return{
            dataStudent:[]
        }
    },
    methods: {
    getStudent() {
      axios.get(APP_URL + "/students").then((res) => {
        this.dataStudent = res.data;
        console.log(this.dataStudent)
      });
    },
  },
  mounted() {
    this.getStudent()
  },
}
</script>

<style scoped>
    .ma{
        margin: 80px;
    }
</style>