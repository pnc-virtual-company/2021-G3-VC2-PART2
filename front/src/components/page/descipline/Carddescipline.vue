<template>
    <section>
        <v-container fluid class="card">
    <v-row justify="center">
      <v-expansion-panels 
        popout
      
      >
        <v-expansion-panel hide-actions class="ma-3" >
          <v-expansion-panel-header>
            <v-row align="center" class="spacer mx-auto" no-gutters>
                  <v-card-title class="d-flex" 
                    >
                            <v-card-subtitle class="d-flex">
                                <v-avatar  size="100" 
                                    mx-auto>
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSWIKLCtyGwaq0YpqI3vxcPPyn96kEhIpw9IQ&usqp=CAU" alt="">
                                </v-avatar>
                                <v-card-text class="ms-3">
                                        <p class="text-h6">USERNAME: SOTHOUN PHAUV</p>
                                        <p>Class: WEB 2021B</p>
                                </v-card-text>
                            </v-card-subtitle>
                            <v-card-subtitle>
                                <v-avatar size="70px">
                                    <img src="https://o.remove.bg/downloads/8d1a623c-5145-4c6a-9b1d-fba348aa1af6/42081633-danger-warning-attention-sign-removebg-preview.png" alt="">
                                </v-avatar>
                            </v-card-subtitle>
                            <v-card-subtitle class="content ms-5">
                                        <v-card-text class="text-p">
                                            <p class="text-h6"><v-icon color="blue">mdi-calendar-multiple</v-icon> 12 JAN 2021</p>
                                            <p class="text-p"> <v-icon color="blue">mdi-cellphone</v-icon>+885 972045505</p>
                                        </v-card-text>
                            </v-card-subtitle>
                            <v-card-subtitle class="display">
                                <v-icon  color="red" 
                                    class="red--text"
                                    
                                >mdi-delete mdi-36px</v-icon>
                                <v-icon color="#82E0AA " >mdi-pencil-box mdi-36px</v-icon>
                            </v-card-subtitle>
                    </v-card-title>
            </v-row>
          </v-expansion-panel-header>

          <v-expansion-panel-content>
            <v-divider></v-divider>
            <v-card-text > Hello</v-card-text>
          </v-expansion-panel-content>
        </v-expansion-panel>
      </v-expansion-panels>
    </v-row>
</v-container>

    </section>
</template>

<script>
export default {

}
</script>

<style>
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