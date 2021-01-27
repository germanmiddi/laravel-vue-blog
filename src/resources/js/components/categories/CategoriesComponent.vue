<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Categorias</div>
                    <b-table hover :items="items" :key="items.id"></b-table>
                </div>

            </div>
            <div class="col-md-4">
                <categories-form-component @new="addCategory"></categories-form-component>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
				items: []
            }
        },
        methods:{
            addCategory(category){
                this.items.push(category)
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
