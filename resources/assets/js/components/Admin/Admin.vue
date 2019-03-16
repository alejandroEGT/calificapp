<template>
  <v-app id="inspire">
    <v-navigation-drawer
      fixed
      v-model="drawer"
      app
    >
      <v-list dense>
        <v-list-tile @click="clickIndex">
          <v-list-tile-action>
            <v-icon>home</v-icon>
          </v-list-tile-action>
          <v-list-tile-content>
            <v-list-tile-title>Solicitud de cuenta
			
				  <v-badge right v-if="numCuentas > 0" >
				      <span slot="badge">{{ numCuentas }}</span>
				      
				    </v-badge>
				   
            </v-list-tile-title>
          </v-list-tile-content>
        </v-list-tile>
        <v-list-tile @click="">
          <v-list-tile-action>
            <v-icon>contact_mail</v-icon>
          </v-list-tile-action>
          <v-list-tile-content>
            <v-list-tile-title>Cuentas activas</v-list-tile-title>
          </v-list-tile-content>
        </v-list-tile>
      </v-list>
    </v-navigation-drawer>
    <v-toolbar color="indigo" dark fixed app>
      <v-toolbar-side-icon @click.stop="drawer = !drawer"></v-toolbar-side-icon>
      <v-toolbar-title>Application</v-toolbar-title>
    </v-toolbar>
    <v-content>
      <v-container fluid fill-height>
        <v-layout
          
        >
          <v-flex text-xs-center>
            <router-view class="mi-contenedor" :key="$route.path"></router-view>
          </v-flex>
        </v-layout>
      </v-container>
    </v-content>
    <v-footer color="indigo" app>
      <span class="white--text">&copy; 2017</span>
    </v-footer>
  </v-app>
</template>

<script>
  export default {
    data: () => ({
      drawer: null,
      numCuentas:'',
      getCuentas:{},
    }),
    props: {
      source: String
    },
    created(){
    	this.cuentas();
    },

    methods:{
    	cuentas(){
    		axios.get('cuenta')
		    .then(response => {
		      // JSON responses are automatically parsed.
		      this.numCuentas = response.data.count;
		      this.getCuentas = response.data.cuentas;
		      console.log(this.numCuentas);
		    })
    	},
    	clickIndex(){
    		this.$router.push({ path: '/index/'})
    	}
    }
  }
</script>
    
   
