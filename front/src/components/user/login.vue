<template>
    <v-card
        elevation="15"
        width="350"
        height="370"
        class="card"
        color='#dcdcdc'
        
    >
        <div class="d-flex align-center justify-center  "   >
            <v-form class="mt-5">
                <div class="text-center ">
                    <img
                        src="../../assets/pnc.png"
                        alt="Vuetify Admin"
                        width="80"
                        height="80"
                    />
                </div>
                <v-text-field
                    prepend-icon="mdi-account"
                    required
                    label="Email"
                    v-model="email"
                    
                ></v-text-field>
                <v-text-field
                    :append-icon="show3 ? 'mdi-eye' : 'mdi-eye-off'"
                    :type="show3 ? 'text' : 'password'"
                    name="input-10-2"
                    label="Password"
                    hint="At least 8 characters"
                    prepend-icon="mdi-lock"
                    class="input-group--focused"
                    @click:append="show3 = !show3"
                    v-model="password"
                ></v-text-field>
                <small red>{{message}}</small>
                <div class="text-center">
                <v-btn
                    class="btn"
                    color="primary"
                    large
                    type="submit"
                    text
                    rounded
                    @click.prevent="login"
                    >Login</v-btn
                >
                </div>
            </v-form>
        </div>
    </v-card>
</template>

<script>
export default {
    emits: ["requestToLogin"],
    props:['message'],
    data() {
        return {
            email:'',
            password:'',
            message_error:'',
            loading: false,
            show3:false

        };
        
    },
    methods: {
        login() {
            let dataUser = {
               email:this.email,
               password:this.password
            }
            this.$emit("requestToLogin", dataUser);
        }

    }

};
</script>
 
<style scoped>
.card{
    margin: auto;
    margin-top: 120px;

}
.btn{
    margin-top: 15px;
    background: rgb(202, 243, 185);
}
small{
    color: red;
}

</style>