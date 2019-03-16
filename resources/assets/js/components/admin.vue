<template>
  <v-app id="inspire">
    <v-content>
      <v-container fluid fill-height>
        <v-layout align-center justify-center>
          <v-flex xs12 sm8 md4>
            <v-card class="elevation-12">
              <v-toolbar dark color="primary">
                <v-toolbar-title>Login form</v-toolbar-title>
                <v-spacer></v-spacer>
                <v-tooltip bottom>
                  <v-btn
                    icon
                    large
                    :href="source"
                    target="_blank"
                    slot="activator"
                  >
                    <v-icon large>code</v-icon>
                  </v-btn>
                  <span>Source</span>
                </v-tooltip>
                <v-tooltip right>
                  <v-btn icon large href="https://codepen.io/johnjleider/pen/wyYVVj" target="_blank" slot="activator">
                    <v-icon large>mdi-codepen</v-icon>
                  </v-btn>
                  <span>Codepen</span>
                </v-tooltip>
              </v-toolbar>
              <v-card-text>
                <v-form>
                  <v-text-field prepend-icon="person" v-model="form.email" label="Login" type="text"></v-text-field>
                  <v-text-field prepend-icon="lock" v-model="form.password" label="Password" id="password" type="password"></v-text-field>
                </v-form>
              </v-card-text>
              <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="primary" @click="login" >Login</v-btn>
              </v-card-actions>
            </v-card>
          </v-flex>
        </v-layout>
      </v-container>
    </v-content>
  </v-app>
</template>

<script>
 export default{
  data(){
    return {
      source:null,
      form:{
        email:'', password:'',
      }
    }
  },

   methods:{
      login(){
        var app = this;
        this.$auth.login({
            params: {
              email: app.form.email,
              password: app.form.password,
            }, 
           redirect:'/admin/',
          success: function(){
            //this.$router.push({ path: '/index' });
          },
          error: function(){},
          rememberMe: true,
          //redirect: '/index',
          //fetchUser: true,
        });       
      },
    }
 }
</script>