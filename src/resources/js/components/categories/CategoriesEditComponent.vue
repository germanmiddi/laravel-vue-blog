<template>
    <div class="card">
        <div class="card-header">Categorias</div>
        <div class="card-body">
            <form action="" v-on:submit.prevent="editCategory()">
                <div class="form-group">
                    <label for="">Categoria</label>
                    <input
                        type="text"
                        class="form-control"
                        v-model="upcategory.new_title"
                    />
                </div>

                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
	
    </div>
</template>

<script>
	export default {
		props:['category'],
		data() {
			return {
				upcategory: {
					id: this.category.id,
					new_title: this.category.title	
				},

				
				new_title: this.category.title
			};
		},
		mounted() {
			console.log("Component mounted.");
		},
		created() {
			console.log("Component created.");
		},

		methods: {
            editCategory(){
				// this.$emit('update', this.new_title)
				this.$emit('update', this.upcategory)
                // const params = {
                //      title: this.new_title
                // }
                // axios.put(`/thoughts/${this.thought.id}`, params)
                //     .then((response) => {
                //         this.editMode = false;
                //         const thought = response.data;
                //         this.$emit('update', thought)
                //     })

            },
		}
	};	
</script>
