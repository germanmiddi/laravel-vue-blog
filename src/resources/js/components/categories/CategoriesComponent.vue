<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Categorias</div>
                    <b-table 
                    hover 
                    :items="items"
                    :fields="fields" 
                    :key="items.id">
                    
                    <template #cell(actions)="row">
                        <b-button pill variant="outline-primary" @click="editCategory(row.item)" class="mr-2" ><b-icon-pencil></b-icon-pencil></b-button>
                        <b-button pill variant="outline-danger" class="mr-2" ><b-icon-trash></b-icon-trash></b-button>
                    </template>

                    </b-table>
                </div>

            </div>
            <div class="col-md-4">
                <categories-form-component 
                    @new="addCategory"
                    v-if="!editMode"
                    >
                </categories-form-component>
                <categories-edit-component 
                    v-if="editMode"
                    :category="category"
                    @update="updateCategory"
                    :key="category.id">
                </categories-edit-component>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
				items: [],
                fields: [
                        { key: 'id',    label: 'ID', sortable: true, sortDirection: 'desc' },
                        { key: 'title', label: 'Título'},
                        { key: 'actions', label: 'Actions' }
                ],
                category: null,
                editMode: false
            }
        },
        methods:{
            addCategory(category){
                this.items.push(category)
            },
            editCategory(category){
                this.category = category
                this.editMode = true;
            },
            updateCategory(upcategory){
                this.editMode = false;
                this.items[upcategory.id - 1 ].title = upcategory.new_title 
                console.log(upcategory.id);

				const params = {
					title: upcategory.new_title
				};

				axios.put(`/categories/${upcategory.id}`, params)
				.then(response => {
					console.log(response);
				});


            }
        },
        mounted() {
            axios.get('/categorias')
            .then((response) => {
                console.log(response.data)
                this.items = response.data.data
            })
            console.log('Component mounted.')
        }
    }
</script>
