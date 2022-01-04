<template>
    <section>
        <Background
        :studentBacground="dataStudent"
        ></Background>
        <v-tab class="tap">
            <v-badge
                color="red"
                :content="countDiscipline"
                class="text-h5"
            >
                Warning letter
            </v-badge>
        </v-tab>
        <Discipline
        v-for="discpline in dataDiscipline" :key="discpline.id"
        :studentDiscipline="discpline"
        ></Discipline>
         <v-tab class="tap">
            <v-badge
                color="yellow"
                :content="countPermission"
                class="text-h5"
            >
                Permissions
            </v-badge>
        </v-tab>
        <Permission v-for="permission in dataPermission" :key="permission.id"
        :studentPermission="permission"
        ></Permission>
    </section>
</template>

<script>
import Background from "../page/studentdetail/Background.vue";
import Discipline from "../page/studentdetail/Discipledetail.vue";
import Permission from "../page/studentdetail/Permissiondetail.vue"
import axios from '../../http-common.js'
export default {

    components: {
        Background,
        Discipline,
        Permission
    },
    data(){
        return {
            dataStudent:[],
            dataDiscipline:[],
            dataPermission:[],
            userID: '',
            studentId:null,
            countPermission:0,
            countDiscipline:0
        }
    },
    methods: {
      
        getDiscipline() {
            let disciplines = []
            axios.get("/discipline").then((res) => {
                disciplines = res.data;
                for( let discipline of disciplines){
                    if(discipline.student_id == this.studentId){
                        this.dataDiscipline.push(discipline);
                        this.countDiscipline ++;
                    }
                }
            })
        },
        getPermission(){
            let permissions = "";
            axios.get("/permission").then((res) => {
                permissions = res.data;
                for (let permission of permissions) {
                    if(permission.student.id == this.studentId) {
                        this.dataPermission.push(permission);
                         this.countPermission ++;
                    }
                }
            })
        },
        getUserAction(){
            axios.get('/users/'+this.userID).then((res)=>{
                this.dataStudent = res.data.student;
                this.studentId = res.data.student_id;
            })
        }
    },
    mounted() {
        this.userID = localStorage.getItem("userId");
        this.getUserAction();
        this.getDiscipline();
        this.getPermission();
    },
}
</script>

<style scoped>
    .tap{
        margin-left:170px ;
        margin-top: 60px;
        margin-bottom: 20px;
        
    }
</style>