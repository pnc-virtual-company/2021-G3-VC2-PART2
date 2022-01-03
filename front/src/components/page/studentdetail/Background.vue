<template>
    <section>
        <template>
            <v-card
                class="mx-auto"
                max-width="800"
                
            >
            <v-card-subtitle>
                <v-card-subtitle class="text-center">
                        <v-avatar size="120"  >
                            <img src="https://www.tandemconstruction.com/sites/default/files/styles/project_slider_main/public/images/project-images/IMG-Fieldhouse-10.jpg?itok=Whi8hHo9" alt="">
                        </v-avatar>
                        <v-card-text>
                            <p class="text-h4"> DIANA</p>
                        </v-card-text>
                </v-card-subtitle>
                <div class="d-flex">
                    <v-card-text>
                        <h5 class="text-h5"><v-icon class="blue--text">mdi-email mdi-36px</v-icon> diana@gmail.com</h5>
                        <h5 class="text-h5"><v-icon class="blue--text">mdi-school mdi-36px</v-icon> WEB 2021B</h5>
                    </v-card-text>
                    <v-card-text>
                        <h5 class="text-h5"><v-icon class="blue--text">mdi-phone mdi-36px</v-icon> +885 097204595</h5>
                        <h5 class="text-h5"><v-icon class="blue--text">mdi-gender-transgender mdi-36px</v-icon> Female</h5>
                    </v-card-text>
                </div>
            </v-card-subtitle>
        </v-card>
    </template>
    </section>
</template>

<script>
export default {

}
</script>

<style scoped>
    .blue--text{
        margin-right: 20px;
    }
    h5{
        margin: 15px;
        font-weight:bold ;
    }
    .mx-auto{
        border: 1px solid #ccc;
        box-shadow: 6 9px 12px rgba(0, 0, 0, 0.26);
        margin-top: 30px;
    }
    .d-flex{
        display: flex;
        justify-content: space-between;
    }
</style>