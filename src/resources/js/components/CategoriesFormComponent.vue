<template>
    <div class="card">
        <div class="card-header">Categorias</div>
        <div class="card-body">
            <form action="" v-on:submit.prevent="addCategory()">
                <div class="form-group">
                    <label for="">Categoria</label>
                    <input
                        type="text"
                        class="form-control"
                        v-model="category"
                    />
                </div>
                <button type="submit" class="btn btn-primary">Crear</button>
            </form>
        </div>
	
    </div>
</template>

<script>
	export default {
		data() {
			return {
				category: ""
			};
		},
		mounted() {
			console.log("Component mounted.");
		},
		methods: {
			addCategory() {
				const params = {
					category: this.category
				};

				axios.post("/category", params).then(response => {
					console.log(response);
				});
			}
		}
	};	
</script>
