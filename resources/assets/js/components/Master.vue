<template>
 <v-app light>
    <v-toolbar fixed class="white">
    	<v-icon x-large class="black--text text--lighten-2">fab fa-contao</v-icon>
      <v-toolbar-title v-text="title"></v-toolbar-title>
      <v-toolbar-title class="btn  btn--fixed btn--right" @click="clickRedirect" >Iniciar cuenta</v-toolbar-title>
    </v-toolbar>
    <v-content>
      <section>
        <v-parallax src="assets/hero.jpeg" height="600">
          <v-layout
            column
            align-center
            justify-center
            class="white--text"
          >
            <img src="http://www.iisb.co/css/image/bottom.png" alt="Vuetify.js" style="height:100%; wid">

          </v-layout>
        </v-parallax>
      </section>

      <section>
        <v-layout
          column
          wrap
          class="my-5"
          align-center
        >
          <v-flex xs12 sm4 class="my-3">
            <div class="text-xs-center">
              <h2 class="headline">EL SITIO TECNOLOGICO PARA TU ESCUELA</h2>
              <span class="subheading">
                Mejorando la educación
              </span>
            </div>
          </v-flex>
          <v-flex xs12>
            <v-container grid-list-xl>
              <v-layout row wrap align-center>
                <v-flex xs12 md4>
                  <v-card class="elevation-0 transparent">
                    <v-card-text class="text-xs-center">
                      <v-icon x-large class="blue--text text--lighten-2">fas fa-bell</v-icon>
                    </v-card-text>
                    <v-card-title primary-title class="layout justify-center">
                      <div class="headline text-xs-center">Notificaciones</div>
                    </v-card-title>
                    <v-card-text>
                      Notificamos a tus apoderados las actividades básicas del establecimiento como lo que son las calificaciones, histotriales evaluados por docentes y reuniones de apoderados, con el objetivo de que tus apoderados conoscan la situación academica de sus hijos.
                    </v-card-text>
                  </v-card>
                </v-flex>
                <v-flex xs12 md4>
                  <v-card class="elevation-0 transparent">
                    <v-card-text class="text-xs-center">
                      <v-icon x-large class="blue--text text--lighten-2">fas fa-chart-area</v-icon>
                    </v-card-text>
                    <v-card-title primary-title class="layout justify-center">
                      <div class="headline">Estadisticas</div>
                    </v-card-title>
                    <v-card-text>
                      Cras facilisis mi vitae nunc lobortis pharetra. Nulla volutpat tincidunt ornare. 
                      Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. 
                      Nullam in aliquet odio. Aliquam eu est vitae tellus bibendum tincidunt. Suspendisse potenti. 
                    </v-card-text>
                  </v-card>
                </v-flex>
                <v-flex xs12 md4>
                  <v-card class="elevation-0 transparent">
                    <v-card-text class="text-xs-center">
                      <v-icon x-large class="blue--text text--lighten-2">build</v-icon>
                    </v-card-text>
                    <v-card-title primary-title class="layout justify-center">
                      <div class="headline text-xs-center">Completely Open Sourced</div>
                    </v-card-title>
                    <v-card-text>
                      Cras facilisis mi vitae nunc lobortis pharetra. Nulla volutpat tincidunt ornare. 
                      Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. 
                      Nullam in aliquet odio. Aliquam eu est vitae tellus bibendum tincidunt. Suspendisse potenti. 
                    </v-card-text>
                  </v-card>
                </v-flex>
              </v-layout>
            </v-container>
          </v-flex>
        </v-layout>
      </section>

      <section>
        <v-parallax src="assets/section.jpg" height="380">
           <v-layout row justify-center>
    <v-dialog v-model="dialog" fullscreen hide-overlay transition="dialog-bottom-transition">
      <v-btn color="primary" dark slot="activator">Obtener una cuenta</v-btn>

      <v-card>
        <v-toolbar dark color="primary">
          <v-btn icon @click.native="dialog = false" dark>
            <v-icon>close</v-icon>
          </v-btn>
          <v-toolbar-title>Obtener una cuenta</v-toolbar-title>
          <v-spacer></v-spacer>
          <v-toolbar-items>
            <v-btn dark flat @click.native="dialog = false">Enviar</v-btn>
          </v-toolbar-items>
        </v-toolbar>
        
			<v-container fluid fill-height>
        <v-layout align-center justify-center>
          <v-flex xs12 sm8 md4>
            <v-card class="elevation-12">
              <v-toolbar dark color="primary">
                <v-toolbar-title>Petición de cuenta</v-toolbar-title>
                <v-spacer></v-spacer>
                <v-tooltip bottom>
                 
                  <span>Source</span>
                </v-tooltip>
                <v-tooltip right>
                  
                </v-tooltip>
              </v-toolbar>
              <v-card-text>
                <v-form>
                  <v-text-field prepend-icon="person" v-model="cu.nombres" label="Nombres" type="text"></v-text-field>
                  <v-text-field prepend-icon="person" v-model="cu.apellidos" label="Apellidos" type="text"></v-text-field>
                  <v-text-field prepend-icon="fas fa-graduation-cap" v-model="cu.establecimiento" label="Nombre del establecimiento" type="text"></v-text-field>
                  <v-text-field prepend-icon="fas fa-map-marker-alt" v-model="cu.direccion" label="Dirección del establecimiento" type="text"></v-text-field>
                  <v-text-field prepend-icon="fas fa-envelope" v-model="cu.email" label="Correo para la cuenta" type="text"></v-text-field>
                  
                  <v-text-field prepend-icon="fas fa-mobile-alt" v-model="cu.celular" label="Celular (*)" type="text"></v-text-field>

                  <v-text-field prepend-icon="fas fa-comments" v-model="cu.comentario" label="¿Tienes duda?, aprovecha de comentarnos (*)" type="text"></v-text-field>

                </v-form>
				
				<div v-if="ver">
					 <v-alert type="success" :value="true">
      					Gracias por comunicarte con nosotros, analisaremos y crearemos tu cuenta, te informaremos al correo que especificaste, saludos.
   				     </v-alert>
				</div>

              </v-card-text>
              <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="primary" @click.native="send">Enviar</v-btn>
              </v-card-actions>
            </v-card>
          </v-flex>
        </v-layout>
      </v-container>
        

      </v-card>
    </v-dialog>
  </v-layout>
        </v-parallax>
      </section>

      <section>
        <v-container grid-list-xl>
          <v-layout row wrap justify-center class="my-5">
            <v-flex xs12 sm4>
              <v-card class="elevation-0 transparent">
                <v-card-title primary-title class="layout justify-center">
                  <div class="headline">Company info</div>
                </v-card-title>
                <v-card-text>
                  Cras facilisis mi vitae nunc lobortis pharetra. Nulla volutpat tincidunt ornare. 
                  Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. 
                  Nullam in aliquet odio. Aliquam eu est vitae tellus bibendum tincidunt. Suspendisse potenti. 
                </v-card-text>
              </v-card>
            </v-flex>
            <v-flex xs12 sm4 offset-sm1>
              <v-card class="elevation-0 transparent">
                <v-card-title primary-title class="layout justify-center">
                  <div class="headline">Contact us</div>
                </v-card-title>
                <v-card-text>
                  Cras facilisis mi vitae nunc lobortis pharetra. Nulla volutpat tincidunt ornare.
                </v-card-text>
                <v-list class="transparent">
                  <v-list-tile>
                    <v-list-tile-action>
                      <v-icon class="blue--text text--lighten-2">phone</v-icon>
                    </v-list-tile-action>
                    <v-list-tile-content>
                      <v-list-tile-title>777-867-5309</v-list-tile-title>
                    </v-list-tile-content>
                  </v-list-tile>
                  <v-list-tile>
                    <v-list-tile-action>
                      <v-icon class="blue--text text--lighten-2">place</v-icon>
                    </v-list-tile-action>
                    <v-list-tile-content>
                      <v-list-tile-title>Chicago, US</v-list-tile-title>
                    </v-list-tile-content>
                  </v-list-tile>
                  <v-list-tile>
                    <v-list-tile-action>
                      <v-icon class="blue--text text--lighten-2">email</v-icon>
                    </v-list-tile-action>
                    <v-list-tile-content>
                      <v-list-tile-title>john@vuetifyjs.com</v-list-tile-title>
                    </v-list-tile-content>
                  </v-list-tile>
                </v-list>
              </v-card>
            </v-flex>
          </v-layout>
        </v-container>
      </section>

      <v-footer class="blue darken-2">
        <v-layout row wrap align-center>
          <v-flex xs12>
            <div class="white--text ml-3">
              Made with
              <v-icon class="red--text">favorite</v-icon>
              by <a class="white--text" href="https://vuetifyjs.com" target="_blank">Vuetify</a>
              and <a class="white--text" href="https://github.com/vwxyzjn">Costa Huang</a>
            </div>
          </v-flex>
        </v-layout>
      </v-footer>
    </v-content>
  </v-app>
</template>

<script type="text/javascript">
	export default{
		data(){
			return{
				title:'CALIFICA (Version master)',
				dialog: false,
		        notifications: false,
		        sound: true,
		        widgets: false,
		        ver: false,
		        cu:{}
			}
		},
		methods:{
			send(){
				console.log(this.cu);
				axios.post('cuenta', this.cu ).then((response) =>{
					console.log(response.data);
					this.ver = true;
				});
			},
      clickRedirect(){
        this.$router.push({ path: '/loginc' })
      }
		}
	}
</script>