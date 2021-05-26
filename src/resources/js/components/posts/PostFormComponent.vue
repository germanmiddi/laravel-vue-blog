     
<template>
    <div>
        <b-alert
            :show="dismissCountDown = 5"
            dismissible
            variant="success"
            >
            <p>This alert will dismiss after {{ dismissCountDown }} seconds...</p>
        </b-alert>
        <div class="card">
            <div class="card-header">Crear Artículo</div>


            <div class="card-body">
                <form >           
                <div class="form-group">
                    <label>Titulo *</label>
                    <input type="text" name="title" class="form-control" required v-model="fields.title">
                </div>
                
                <div class="form-group">
                    <label for="category_id">Categoria</label>
                    <select class="form-control" id="category_id" name="category_id" v-model="fields.category_id">
                        <option v-for="category in categories" :key="category.id"
                                :value="category.id">{{ category.title }}
                        </option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Imagen</label>
                    <input type="file" name="file" @change="imageChanged">

                    <img :src="fields.imagepreview" class="figure-img img-fluid rounded"  style="max-height:100px;">                
                </div>                    

                <div class="form-group">
                    <label for="status">Estado</label>
                    <select v-if="status != null " class="form-control" id="status" name="status" v-model="fields.status_id">
                        <option v-for="stat in status" :key="stat.id"
                                :value="stat.id">{{ stat.status_txt }}
                        </option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Cotenido *</label>
                    <ckeditor v-model="fields.body" :config="editorConfig"></ckeditor>
                </div>

                <div class="form-group">
                    <label>Cotenido destacado</label>
                    <textarea name="iframe" class="form-control" v-model="fields.iframe"></textarea>
                </div>

                <div class="form-group">
                    <input value="Enviar" class="btn btn-sm btn-primary" @click="create">
                </div>
                </form>

            </div>
        </div>
    </div>

</template>

<script>
export default {
    props:['post'],
    data(){
        return {
            categories: null,
            editorConfig: {}, // The configuration of the editor.
            fields: {},
            imagepreview: null,
            status: null
        }
    },
    methods:{
        makeToast(append = false) {
            this.toastCount++
            this.$bvToast.toast(`Post creado con éxito.`, {
                title: 'Bien hecho!',
                variant: 'success',
                autoHideDelay: 5000,
                appendToast: append
            })
        },
        imageChanged(e){
            var fileReader = new FileReader()
            fileReader.readAsDataURL(e.target.files[0])
            fileReader.onload = (e) => {
                this.fields.image = e.target.result
                this.imagepreview = e.target.result
            }
        },
        create(){
            const msg = this.makeToast()
            axios.post('/posteos', this.fields)
            .then(response => {
                msg()
                console.log(response)
            })
        }
    },
    mounted(){
        axios.get('/categorias')
        .then((response) => {
            this.categories = response.data.data
        })

        axios.get('/post_status')
        .then((response) => {
            this.status = response.data.data
        })

            this.fields.title        = this.post.title
            this.fields.body         = this.post.body
            this.fields.iframe       = this.post.iframe
            this.fields.category_id  = this.post.category_id
            this.fields.imagepreview = this.post.image

    },
    created(){

        this.fields.category_id = this.post.category_id
        this.fields.status_id   = this.post.status_id
        console.log(this.post)
    }
    
}

</script>