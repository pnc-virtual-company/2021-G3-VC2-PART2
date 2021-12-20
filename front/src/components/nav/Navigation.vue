<template>
  <nav>
    <v-navigation-drawer v-model="sidebar" app absolute left temporary>
      <v-list>
        <v-list-item-group
          v-model="group"
          active-class="deep-purple--text text--accent-4"
        >
        <v-list-item
          v-for="item in menuItems"
          :key="item.title"
          :to="item.path">
          <v-list-item-action>
            <v-icon>{{ item.icon }}</v-icon>
          </v-list-item-action>
          <v-list-item-content>{{ item.title }}</v-list-item-content>
        </v-list-item>
          </v-list-item-group>
      </v-list>
    </v-navigation-drawer>
    <v-toolbar >
      <span class="hidden-sm-and-up">
        <v-app-bar-nav-icon @click="sidebar = !sidebar">
        </v-app-bar-nav-icon>
      </span>
       <img
            src="../../assets/pnc.png"
            alt="Vuetify Admin"
            width="50"
            height="50"
        />
      <v-toolbar-title class="ml-2">
        <router-link to="/" tag="span" style="cursor: pointer">
          {{ appTitle }}
        </router-link>
      </v-toolbar-title>
      <v-spacer></v-spacer>
      <v-toolbar-items class="hidden-xs-only">
        <v-btn
          active-class="grey-5 red--text" 
          text
          @click="requestLogOut"
          v-for="item in menuItems"
          :key="item.title"
          :to="item.path">
          <v-icon left class="orange--text">{{ item.icon }}</v-icon>
          {{ item.title }}
        </v-btn>
      </v-toolbar-items> 
    </v-toolbar>
  </nav>
</template>

<script>
export default {
 
  data() {
    return {
        appTitle: 'PNC Cambodia',
        sidebar: false,
        group: false,
        menuItems: [
            { title: 'Users', path: '/user', icon: 'mdi-account-multiple-plus' },
            { title: 'Students', path: '/student', icon: 'mdi-account-box' },
            { title: 'Permission', path: '/permission', icon: 'mdi-account-key' },
            { title: 'Discipline', path: '/discipline', icon: 'mdi-account-star' },
            { title: 'logout', path: '/', icon: 'mdi-login' },
        ]
    }
  },
  methods: {
   
  },
}
</script>

<style>


</style>