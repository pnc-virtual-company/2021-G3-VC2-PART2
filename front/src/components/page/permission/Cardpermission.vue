<template>
  <v-container fluid class="card">
    <v-row justify="center">
      <v-subheader>Student Permission</v-subheader>
      <v-expansion-panels 
        popout
        v-for="(permission, index) in dataPermission"
        :key="index"
      >
        <v-expansion-panel hide-actions class="ma-3" >
          <v-expansion-panel-header>
            <v-row align="center" class="spacer mx-auto" no-gutters>
              <v-col cols="4" sm="2" md="1">
                <v-avatar size="50px">
                  <img alt="Avatar" :src="url + permission.student.image" />
                  <v-icon></v-icon>
                </v-avatar>
              </v-col>
              <v-col>
                <h3>
                  {{ permission.student.firstName }}
                  {{ permission.student.lastName }}
                </h3>
                  
              </v-col>
              <v-col>
                <h5>{{permission.student.class}}</h5>
              </v-col>
              <v-col class="hidden-xs-only" sm="5" md="3">
                <strong v-html="permission.reason"></strong>
              </v-col>
              <v-col>
                <h5>{{ permission.end_date }} </h5>
                <h5 class="mt-2">{{ permission.start_date }}</h5>
              </v-col>
              <v-col v-if="showBtn !=='Student'">
                <v-icon
                  @click="getPermissionId(permission.id)"
                  class="red--text"
                >
                  mdi-delete
                </v-icon>
                <v-icon @click="getpermissionInfo(permission)">
                  mdi-lead-pencil
                </v-icon>
                <update-permission
                  v-if="showForm"
                  :permissionInfo="permissionData"
                  @cancel="Cancel"
                  @update="UpdatePermission"
                >
                </update-permission>
              </v-col>
            </v-row>
          </v-expansion-panel-header>
          <v-expansion-panel-content>
            <v-divider></v-divider>
            <v-card-text v-text="permission.description"></v-card-text>
          </v-expansion-panel-content>
        </v-expansion-panel>
      </v-expansion-panels>
    </v-row>
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
.card {
  width: 80%;
}
.ma {
  margin: 20px;
}
v-row {
  border: 1px solid #ccc;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.26);
}
.ma-3{
  border: 1px solid #ccc;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.26);
}
</style>
