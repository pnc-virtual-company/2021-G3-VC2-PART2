<template>
    <section>
        <Background></Background>
        <Discipline></Discipline>
        <Permission></Permission>
    </section>
</template>

<script>
import Background from "../page/studentdetail/Background.vue";
import Discipline from "../page/studentdetail/Discipledetail.vue";
import Permission from "../page/studentdetail/Permissiondetail.vue"
export default {
    components: {
        Background,
        Discipline,
        Permission
    },
    data(){
        return {}
    }
}
</script>

<style>

</style>