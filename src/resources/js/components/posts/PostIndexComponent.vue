     
<template>
    <div class="card">
        <div class="card-header">
            Articulos
            <a @click="goToCreatePost" class="btn btn-sm btn-primary float-right">Crear</a>
        </div>

        <div class="card-body">
            <b-table 
            hover 
            :sort-by.sync="sortBy"
            :sort-desc.sync="sortDesc"
            :sort-direction="sortDirection"
            :items="items" 
            :fields="fields" 
            :key="items.id"       
            :current-page="currentPage"
            :per-page="perPage"
            >

                <!-- <template #cell(actions)="row"> -->
                <template #cell(actions)="row">
                    <b-button pill variant="outline-primary" @click="editPost(row.item.id)" class="mr-2" ><b-icon-pencil></b-icon-pencil></b-button>
                    <b-button pill variant="outline-danger" class="mr-2" ><b-icon-trash></b-icon-trash></b-button>
                </template>
            </b-table>

            <div class="row">
                <div class="col-4">
                    <b-pagination
                    v-model="currentPage"
                    :total-rows="totalRows"
                    :per-page="perPage"
                    align="fill"
                    class="my-0"
                    >
                    </b-pagination>
                </div>
            </div>

        </div>
    </div>
</template>


<script>
    export default {
        data(){
            return {
                items: [],
                fields: [
                        { key: 'id',    label: 'ID', sortable: true, sortDirection: 'desc' },
                        { key: 'title', label: 'Título'},
                        { key: 'category_id', label: 'Categoria'},
                        { key: 'categoria', label: 'titulo'},
                        { key: 'created_at', label: 'Creado', sortable: true},
                        { key: 'actions', label: 'Actions' }
                ],
                currentPage: 1,
                perPage: 10,
                totalRows: 1,
                sortBy: 'created_at',
                sortDesc: true,
                sortDirection: 'desc',                 
            }
        },
        methods:{
            goToCreatePost(){
                window.location = '/posts/create'
            },
            editPost(id){
                console.log(id)
                window.location.href = `/posts/${id}/edit`
            }
        },
        mounted(){
            axios.get('/posteos')
            .then((response) => {
                this.items = response.data.data
                this.totalRows = this.items.length
            })
            console.log('Component mounted.')              
        }    
    }

</script>