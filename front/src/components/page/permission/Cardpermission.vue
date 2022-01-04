<template>
  <v-container fluid class="card">

    <section>
        <template>
        <v-card
          class="mx-auto"
          max-width="1000"
        >
          <v-card-text class="d-flex">
            <v-card-subtitle class="d-flex">
                <v-avatar size="90">
                  <img :src="url + dataPermission.student.image" alt="">
                </v-avatar>
                <v-card-text>
                  <p class="text-h6">USERNAME: {{dataPermission.student.firstName}}</p>
                  <p>Class: {{dataPermission.student.class}}</p>
                </v-card-text>
            </v-card-subtitle>
            <v-card-subtitle>
                <v-card-text>
                  <p class="text-h6"><v-icon class="blue--text">mdi-calendar-clock</v-icon> {{dataPermission.start_date}}</p>
                  <p class="text-h6"><v-icon class="red--text">mdi-calendar-clock</v-icon> {{dataPermission.end_date}}</p>
                </v-card-text>
            </v-card-subtitle>
            <v-card-subtitle>
                <v-card-text>
                    <p>Reason: {{dataPermission.reason}}</p>
                    <strong> Amount:</strong> <strong v-html="Math.round(((new Date(dataPermission.end_date)).getTime() - (new Date(dataPermission.start_date)).getTime()) / (1000 * 3600 * 24))" > </strong> |DAYS
                </v-card-text>
            </v-card-subtitle>
            <v-card-subtitle>
                <v-card-text >
                    <v-icon
                      @click="getPermissionId(dataPermission.id)"
                      class="red--text"
                    >
                      mdi-delete
                    </v-icon>
                    <v-icon @click="getpermissionInfo(dataPermission)">
                      mdi-lead-pencil
                    </v-icon>
                    <update-permission
                      v-if="showForm"
                      :permissionInfo="permissionData"
                      @cancel="Cancel"
                      @update="UpdatePermission"
                    >
                    </update-permission>
                </v-card-text>
            </v-card-subtitle>
          </v-card-text>
          <v-card-actions>
            <v-btn
              text
              color="teal accent-4"
              @click="reveal = true"
            >
              Reason
            </v-btn>
          </v-card-actions>

          <v-expand-transition>
            <v-card
              v-if="reveal"
              class="transition-fast-in-fast-out v-card--reveal"
              style="height: 100%;"
            >
              <v-card-text class="pb-0">
                <p class="text-h4 text--primary">
                  Reason
                </p>
                <p>{{dataPermission.description}}</p>
              </v-card-text>
              <v-card-actions class="pt-0">
                <v-btn
                  text
                  color="teal accent-4"
                  bottom
                  @click="reveal = false"
                >
                  Close
                </v-btn>
              </v-card-actions>
            </v-card>
          </v-expand-transition>
        </v-card>
      </template>
    </section>

    <!-- card permission -->
    <!-- dialog -->
    <div class="text-center">
      <v-dialog v-model="dialog" width="500">
        <v-card>
          <v-card-title class="text-h5 blue lighten-2 white--text">
            Delete Permission
          </v-card-title>
          <h3 class="ma">
            <v-icon class="orange--text" mdi-48px>mdi-alert-outline</v-icon>Are 
            you sure you want to delete?
          </h3>
          <v-divider></v-divider>

          <v-card-actions class="blue lighten-2">
            <v-spacer></v-spacer>
            <v-btn
              @click="dialog = false"
              class="teal darken-4 white--text"
              text
            >
              Cancel
            </v-btn>
            <v-btn class="red white--text" text @click="deletePermission">
              Confirm 
            </v-btn>
          </v-card-actions>
        </v-card>
      </v-dialog>
    </div>
  </v-container>
</template>
<script>
import axios from "axios";
const APP_URL = "http://127.0.0.1:8000/api";
import UpdatePermission from "../permission/permissionUpdate.vue";
export default {
  props: ["dataPermission", "delete-item"],
  emits: ["update-permission"],
  components: {
    "update-permission": UpdatePermission,
  },
  data: () => ({
    deleteId: 0,
    dialog: false,
    showBtn:localStorage.getItem("Userrole"),
    url: "http://127.0.0.1:8000/storage/student/images/",
    showForm: false,
    permissionData: [],
    reveal:false
  }),
  methods: {
    getPermissionId(id) {
      this.deleteId = id;
      this.dialog = true;
    },
    deletePermission() {
      this.$emit("delete-item", this.deleteId);
      this.dialog = false;
    },
    getpermissionInfo(permission) {
      this.showForm = true;
      this.permissionData = permission;
    },
    Cancel(hidden) {
      this.showForm = hidden;
    },
    UpdatePermission(id, permission, hidden) {
      axios.put(APP_URL + "/permission/" + id, permission).then((res) => {
        this.$emit("update-permission", res.data);
        this.showForm = hidden;
        
      });
    },
  },
  mounted() {
    
  },
};
</script>
<style scoped>
.v-card--reveal {
  bottom: 0;
  opacity: 1 !important;
  position: absolute;
  width: 100%;
}
.ma{
  margin: 10px;
}
</style>
