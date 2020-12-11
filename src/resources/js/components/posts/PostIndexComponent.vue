     
<template>
    <div class="card">
        <div class="card-header">
            Articulos
            <a href="" class="btn btn-sm btn-primary float-right">Crear</a>
        </div>

        <div class="card-body">
            <b-table hover :sort-by.sync="sortBy" :items="items" :fields="fields" :key="items.id">
                <template #cell(actions)="row">
                    <b-button pill variant="outline-primary" class="mr-2" ><b-icon-pencil></b-icon-pencil></b-button>
                    <b-button pill variant="outline-danger" class="mr-2" ><b-icon-trash></b-icon-trash></b-button>
                </template>
            </b-table>
        </div>
    </div>
</template>


<script>
    export default {
        data(){
            return {
                items: [],
                fields: [
                        { key: 'id',    label: 'ID', sortDirection: 'desc' },
                        { key: 'title', label: 'Título'},
                        { key: 'created_at', label: 'Creado'},
                        { key: 'actions', label: 'Actions' }
                ]
            }
        },
        // methods:{
        // },
        mounted(){
            axios.get('/posteos')
            .then((response) => {
                this.items = response.data.data
            })
            console.log('Component mounted.')            
        }    
    }

</script>