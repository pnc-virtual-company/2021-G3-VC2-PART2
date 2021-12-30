<template> 
  <v-row justify="center">
    <v-dialog
      v-model="dialog"
      persistent
      max-width="600px"
    >
      <template v-slot:activator="{ on, attrs }">
        <v-btn
          color="primary"
          dark
          v-bind="attrs"
          v-on="on"
        >
         <v-icon dark>
            mdi-plus
          </v-icon>
          
        </v-btn>
      </template>
      <v-card>
        <v-card-title>
          <span class="text-h5">Disciple_Student</span>
        </v-card-title>
        <v-card-text>
          <v-container>
            <v-row>
              <v-col cols="12">
                <v-text-field
                  label="Name"
                  required
                  prepend-icon="mdi-account"
                ></v-text-field>
              </v-col>
              <v-col cols="12">
                <v-text-field
                  label="reason"
                  type="text"
                  required
                  prepend-icon="mdi-message-text"
                ></v-text-field>
              </v-col>

              <v-col
                cols="12"
              >
                <v-autocomplete
                  :items="['a', 'b', 'c', 'd', 'e']"
                  label="note_type"
                  multiple
                  prepend-icon="mdi-emoticon-dead"
                ></v-autocomplete>
              </v-col>
              <v-col cols="12">
                <v-text-field
                  label="start_date"
                  type="date"
                  required
                  prepend-icon="mdi-calendar-range"
                ></v-text-field>
              </v-col>
            </v-row>
          </v-container>
          <small>Are you OK ? you save</small>
        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn
            color="blue darken-1"
            text
            @click="dialog = false"
          >
            Close
          </v-btn>
          <v-btn
            color="blue darken-1"
            text
            @click="dialog = false"
          >
            Save
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-row>
</template>

<script>
    export default {
        data: () => ({
        dialog: false,
        }),
    }
</script>
<style>

</style>