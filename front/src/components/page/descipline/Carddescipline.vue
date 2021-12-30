<template>
    <section>
        <v-container>
            <v-hover >
                <v-card
                elevation="15"
                class="ma-4"
                @mouseover="isBtn=true" 
                @mouseleave="isBtn = false, isReason = false"
                >
                    <v-card-title class="d-flex">
                        
                            <v-card-subtitle class="d-flex">
                                <v-avatar  size="100" 
                                    mx-auto>
                                <img
                                    src="https://cdn.vuetifyjs.com/images/john.jpg"
                                    alt="John"
                                >
                                </v-avatar>
                                <v-card-text class="ms-3">
                                        <p class="text-h6">USERNAME: SOTHOUN PHAUV</p>
                                        <p>Class: 2021B</p>
                                </v-card-text>
                            </v-card-subtitle>
                            <v-card-subtitle>
                                <v-avatar size="90px">
                                    <img src="https://o.remove.bg/downloads/8d1a623c-5145-4c6a-9b1d-fba348aa1af6/42081633-danger-warning-attention-sign-removebg-preview.png" alt="">
                                </v-avatar>
                            </v-card-subtitle>
                            <v-card-subtitle class="content ms-5">
                                        <v-card-text class="text-p">
                                            <p class="text-h6"><v-icon color="blue">mdi-calendar-multiple</v-icon> 12 Jan 2021</p>
                                            <p class="text-p"> <v-icon color="blue">mdi-cellphone</v-icon> 0972045595</p>
                                        </v-card-text>
                            </v-card-subtitle>
                            <v-card-subtitle class="display" v-if="isBtn">
                                <v-icon  color="red" >mdi-delete mdi-36px</v-icon>
                                <v-icon color="#82E0AA "  >mdi-pencil-box mdi-36px</v-icon>
                                <v-icon color = "#5499C7" @click="isReason = true">mdi-eye-off mdi-36px</v-icon>
                            </v-card-subtitle>
                        
                        
                    </v-card-title>
                    <v-card-title v-if="isReason">
                        <v-card-subtitle>
                            <p class="text-h6"> <v-icon color="blue">mdi-file-document</v-icon> Reason </p>
                            <p>Various educators teach rules governing the length of paragraphs. They may say that a paragraph should be 100 to 200 words long, or be no more than five or six sentences. But a good paragraph should not be measured in characters, words, or sentences. The true measure of your paragraphs should be ideas.</p>
                        </v-card-subtitle>
                    </v-card-title>
                    
                </v-card>
            </v-hover>
        </v-container>
        
    </section>
</template>

<script>
export default {
    data(){
        return{
            isReason:false,
            isBtn:false
        }
    }
    
}
</script>

<style scoped>
    .ma-4{
        margin: auto;
        
    }
    .content{
        display: flex;
        justify-content: space-between;
    }
  
</style>