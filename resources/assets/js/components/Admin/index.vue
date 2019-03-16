
<template>
	<div>
		<loading :active.sync="isLoading" ></loading>
		<a href="#" @click="logout">Salir</a>
		<hr>
		 	<table class="table" >
		 		<tr class="tablehr" >
		 			<td><strong><v-icon dark>fas fa-user</v-icon> Solicitante</strong></td>
		 			<td><strong><v-icon dark>fas fa-graduation-cap</v-icon> Establecimiento</strong></td>
		 			<td><strong><v-icon dark>fas fa-map-marker-alt</v-icon> Dirección</strong></td>
		 			<td><strong><v-icon dark>fas fa-mobile-alt</v-icon> Celular</strong></td>
		 			<td><strong><v-icon dark>fas fa-eye</v-icon></strong></td>
		 		</tr>
		 		<tr class="tabletr"  v-for="c in getCuentas" >
		 			<td>{{ c.nombres+' '+c.apellidos }}</td>
		 			<td>{{ c.establecimiento }}</td>
		 			<td>{{ c.direccion }}</td>
		 			<td>{{ c.celular }}</td>
		 			<td><a><i class="fas fa-eye" @click="verCuenta(c.id)" ></i></a></td>
		 		</tr>
		 	</table>
		 
	 </div> 
</template>
		
		

<script type="text/javascript">
// Import component
    import Loading from 'vue-loading-overlay';
    // Import stylesheet
    import 'vue-loading-overlay/dist/vue-loading.min.css';

	export default{
		data(){
			return{
				getCuentas:{},
				isLoading: true,

			}
		},
		components: {
            Loading
        },
		created(){
			this.cuentas();
		}
		,
		methods:{
			cuentas(){
	    		axios.get('cuenta')
			    .then(response => {
			      // JSON responses are automatically parsed.
			   
			      this.getCuentas = response.data.cuentas;
			      this.isLoading = false;
			      console.log(this.getCuentas);
			    })
	    	},
	    	verCuenta($id){
	    	
	    		this.$router.push({ path: '/crear_cuenta/'+$id })
	    	},
			logout: function (e) {

				var r = confirm("Seguro que quieres salir ?', 'Confirmation");
				if (r == true) {
				    this.$auth.logout({
                        makeRequest: true,
                        redirect: '/'
                    });
				} else {
				    e.preventDefault();
				}

            }
		}
	}
</script>

<style type="text/css">
	.tablehr{
		height: 40px;
		background: rgb(48, 57, 166);
		color: white;
	}
	.tabletr{
		height: 40px;
		color: #34495E;
	}
</style>
