<template>
  <v-app>
    <v-navigation-drawer v-model="showDrawer" absolute bottom temporary>
      <app-nav></app-nav>
    </v-navigation-drawer>

    <v-app-bar app>
      <v-app-bar-nav-icon
        @click.stop="showDrawer = !showDrawer"
      ></v-app-bar-nav-icon>
      <v-avatar size="50px" class=" ml-3 mr-3">
          <img alt="Avatar" src="assets/pnc.png">
      </v-avatar>
      <v-toolbar-title>
          <h2>Student Life</h2>
      </v-toolbar-title>

      <v-spacer></v-spacer>

      <v-btn icon>
        <v-icon>mdi-exit-to-app</v-icon>
      </v-btn>
    </v-app-bar>

    <v-main>
      <router-view class="pa-12"></router-view>
    </v-main>

    <v-footer app> </v-footer>
  </v-app>
</template>

<script>
import Navigation from "./components/nav/Navigation.vue";

export default {
  name: "App",
  components: {
    "app-nav": Navigation,
  },

  data() {
    return {
      showDrawer: false,
    };
  },
};
</script>
 