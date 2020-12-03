<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Categorias</div>

                    <!-- <div class="card-body">
                        Hello baby.
                    </div> -->
                    <b-table hover :items="items"></b-table>                
                </div>

            </div>
            <div class="col-md-4">
                <categories-form-component></categories-form-component>
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
        mounted() {
            axios.get('/categories')
            .then((response) => {
                this.items = response.data
            })
            console.log('Component mounted.')
        }
    }
</script>
