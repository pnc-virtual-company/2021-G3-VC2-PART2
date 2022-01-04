<template>
    <section>
         <v-btn
            class="mx-4"
            fab
            dark
            large
            fixed
            color="primary"
            @click="Back"
            >
            <v-icon dark>
                mdi-arrow-up-bold  mdi-rotate-270
            </v-icon>
            </v-btn>

            <!-- card background -->
            <v-card
                class="mx-auto top"
                max-width="800"

            >
            <v-card-subtitle>
                    <v-card-subtitle class="d-flex mr-4">
                            
                            <v-img
                                lazy-src="https://picsum.photos/id/11/10/6"
                                max-height="150"
                                max-width="120"
                                :src="url + oneData.image"
                                
                            ></v-img>
                            <v-card-text >
                                <h6 class="text-h6"><v-icon class="blue--text">mdi-account mdi-20px</v-icon> {{oneData.firstName}}</h6>
                                <h6 class="text-h6"><v-icon class="blue--text">mdi-cake-variant mdi-20px</v-icon> {{oneData.birthday}}</h6>
                                <h6 class="text-h6"><v-icon class="blue--text">mdi-gender-transgender mdi-20px</v-icon> {{oneData.gender}}</h6>
                            </v-card-text>
                            <v-card-text>
                                <h6 class="text-h6"><v-icon class="blue--text">mdi-email mdi-20px</v-icon> {{oneData.email}}</h6>
                                <h6 class="text-h6"><v-icon class="blue--text">mdi-school mdi-20px</v-icon> {{oneData.class}}</h6>
                                <h6 class="text-h6"><v-icon class="blue--text">mdi-phone mdi-20px</v-icon> {{oneData.phone}}</h6>
                                
                            </v-card-text>
                            
                    </v-card-subtitle>
                
                </v-card-subtitle>
            </v-card>
            <!-- card discipline -->
            <v-tab class="tap">
                <v-badge
                    color="red"
                    :content="disciplines"
                    class="text-h5"
                >
                    Discipline
                </v-badge>
            </v-tab>
            <v-card
                class="mx-auto"
                max-width="800"
                >
                    
                    <v-row justify="center" v-for="(item, index) in oneData.discipline" :key="index">
                        <v-expansion-panels popout >
                        <v-expansion-panel
                            hide-actions
                            class="ma-3"
                        >
                            <v-expansion-panel-header >
                            <v-row align="center" class="spacer mx-auto" no-gutters>
                                <v-card-title class="d-flex">
                                <v-card-subtitle class="d-flex">
                                    <v-card-text class="ms-3">
                                    <p class="text-h6"><v-icon>{{item.icon_type}} mdi-48px</v-icon> {{item.notice_type}}</p>
                                    </v-card-text>
                                </v-card-subtitle>
                                <v-card-subtitle>
                                    <p class="text-h6"><v-icon class="ma-4 blue--text">mdi-calendar-clock</v-icon> {{item.start_date}}</p>
                                </v-card-subtitle>
                                </v-card-title>
                            </v-row>
                            </v-expansion-panel-header>
                            <v-expansion-panel-content>
                            <v-divider></v-divider>
                            <v-card-text>{{item.reason}}</v-card-text>
                            </v-expansion-panel-content>
                        </v-expansion-panel>
                        </v-expansion-panels>
                    </v-row>
                </v-card>
            <!-- card permissions  -->
             <v-tab class="tap">
                    <v-badge
                        color="yellow"
                        :content="permissions "
                        class="text-h5"
                    >
                        Permissions
                    </v-badge>
                </v-tab>
            <v-card
                class="mx-auto"
                max-width="800"
            >
                <v-row justify="center">
                    <v-expansion-panels popout >
                    <v-expansion-panel
                        hide-actions
                        class="ma-3"
                        v-for="(item, index) in oneData.permission" :key="index"
                    >
                        <v-expansion-panel-header >
                        <v-row align="center" class="spacer mx-auto" no-gutters>
                            <v-card-title class="d-flex">
                            <v-card-subtitle class="d-flex">
                                <v-card-text class="ms-3">
                                <p class="text-h6">{{item.reason}}</p>
                                </v-card-text>
                            </v-card-subtitle>
                            <v-card-subtitle>
                                <p class="text-p"><v-icon class="ma-4 blue--text">mdi-calendar-clock </v-icon> {{item.start_date}}</p>
                                <p class="text-p"><v-icon class="ma-4 red--text">mdi-calendar-clock </v-icon> {{item.end_date}}</p>
                            </v-card-subtitle>
                            <v-card-subtitle class="content ms-5">
                                <v-card-text class="text-p">
                                <p class="text-h6">
                                     <strong> Amount:</strong> <strong v-html="Math.round(((new Date(item.end_date)).getTime() - (new Date(item.start_date)).getTime()) / (1000 * 3600 * 24))" > </strong> |DAYS
                                </p>
                                
                                </v-card-text>
                            </v-card-subtitle>
                            <v-card-subtitle class="display">
                            </v-card-subtitle>
                            </v-card-title>
                        </v-row>
                        </v-expansion-panel-header>
                        <v-expansion-panel-content>
                        <v-divider></v-divider>
                        <v-card-text>{{item.description}}</v-card-text>
                        </v-expansion-panel-content>
                    </v-expansion-panel>
                    </v-expansion-panels>
                </v-row>
            </v-card>    
            

    </section>
</template>

<script>
export default {
    emists: ['isBack'],
    props: ['oneData','permissions','disciplines'],
    data(){
        return{
            reveal:false,
            url: "http://127.0.0.1:8000/storage/student/images/",

        }
    },
    methods:{
        Back(){
            this.$emit('isBack', false);
        }
    }
}
</script>

<style scoped>
    .v-card--reveal {
  bottom: 0;
  opacity: 1 !important;
  position: absolute;
  width: 100%;
}
 .tap{
        margin-left:170px ;
        margin-top: 60px;
        margin-bottom: 20px;
        
    }
.top{
    margin-top:30px;
}

</style>