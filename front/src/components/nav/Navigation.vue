<template>
  <v-list nav dense>
    <v-list-item-group active-class="deep-purple--text text--accent-4">
        <v-list-item class="d-logo">
            <v-avatar size="90px" >
                <img alt="Avatar" src="../../assets/logo.svg">
            </v-avatar>
        </v-list-item>
        <v-list-item >
            <h3>SOTHOUN PHAUV</h3><br>
            
        </v-list-item>
        <v-list-item>
            <h4>Administrator</h4>
        </v-list-item>
        <v-list-item 
         v-for="item in menuItems"
          :key="item.title"
          :to="item.path"
        >
            <v-list-item-icon>
                <v-icon>{{item.icon}}</v-icon>
            </v-list-item-icon>
            <v-list-item-title>{{item.title}}</v-list-item-title>
        </v-list-item>
    </v-list-item-group>
  </v-list>
</template>

<script>
export default {
    data(){
        return{
             menuItems: [
                        { title: 'Users', path: '/user', icon: 'mdi-account-multiple-plus' },
                        { title: 'Students', path: '/student', icon: 'mdi-account-box' },
                        { title: 'Permission', path: '/permission', icon: 'mdi-account-key' },
                        { title: 'Discipline', path: '/discipline', icon: 'mdi-account-star' },
                ]
        }
    }
}
</script>

<style scoped>
.d-logo{
    display: flex;
    justify-content: center;
}
h3{
    text-align: center;
}

</style>