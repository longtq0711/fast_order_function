<template>
    <div class="container">
        <form action="" method="post" v-on:submit.prevent="submitForm">
            <div class="mb-3">
                <label for="link" class="form-label">Link sản phẩm</label>
                <input v-model="form.link" type="text" class="form-control" id="link">
            </div>
            <div class="mb-3">
                <label for="note" class="form-label">Ghi chú</label>
                <textarea v-model="form.note" class="form-control" id="note" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary mb-3">Đặt hàng</button>
        </form>
        <hr>
        <h1>List Products</h1>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Link</th>
                <th scope="col">Note</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="product in listProducts" :key="product.id">
                <th scope="row">{{ product.id }}</th>
                <td>{{ product.link }}</td>
                <td>{{ product.note }}</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    import axios from 'axios'
    export default {
        name: 'AddProduct',
        mounted() {
            console.log('Component mounted.')
        },
        data(){
            return{
                form:{
                    link:'',
                    note: ''
                },
                listProducts:[]
            }
        },
        created(){
            this.getListProducts()
        },
        methods: {
            submitForm(){
                axios.post('/products',{
                    link: this.form.link,
                    note: this.form.note
                }).then((res) =>{
                    console.log(1)
                }).catch(e =>{
                    console.log(2)
                })
            },
            getListProducts(){
                axios.get('/products').then((res) =>{
                    this.listProducts = res.data
                }).catch(e =>{
                    console.log(2)
                })
            }
        }

    }
</script>
