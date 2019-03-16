<template>
	<div>

		<h1>Crear esta solicitud de cuenta</h1>
		<hr>
		<loading :active.sync="isLoading" ></loading>
		<p><label>Nombre de establecimiento: </label>{{ getCuenta.establecimiento }}</p>
		<p><label>Dirección: </label>{{ getCuenta.direccion }}</p>
		<v-btn color="info" @click="clickAceptar" >Crear cuenta</v-btn>
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
				getCuenta:{},
				isLoading: true,
			}
		},
		created(){
			this.cuenta()
		},
		components: {
            Loading
        },
		methods:{
			cuenta(){
				axios.get('cuenta/'+this.$route.params.id).then((response) =>{
					this.getCuenta = response.data;
					console.log(this.getCuenta)
					  this.isLoading = false;
				})
			},
			clickAceptar(){
				axios.put('cuenta/'+this.$route.params.id).then((response) =>{
					this.getCuenta = response.data;
					console.log(this.getCuenta)
				})
			}
		}
	}
</script>