<template>
        <div>
                <h1>List Products</h1>
                <div class="search">
                        <label for="search">Search:</label>
                        <input type="text" @keyup="getList" v-model="search" id="search" placeholder="Search..">
                </div>
                <table class="table">
                        <thead>
                        <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Link</th>
                                <th scope="col">Note</th>
                                <th scope="col">Mã đơn hàng</th>
                        </tr>
                        </thead>
                        <tbody>
                        <!--In danh sach-->
                        <tr v-for="product in listProducts" :key="product.id">
                                <th scope="row">{{ product.id }}</th>
                                <td>{{ product.link }}</td>
                                <td>{{ product.note }}</td>
                                <td>{{product.order_id}}</td>
                        </tr>
                        </tbody>
                </table>
        </div>
</template>
<script>
        import axios from 'axios'
        export default {
            data(){
                return{
                    listProducts:[],
                    search:'',
                    listSearch:[]
                }
            },
            created(){
                this.getList()
            },
            methods:{
                getList(){
                     axios.get('/products')
                         .then(res => {
                             // this.listProducts = res.data;
                             if (this.search) {
                                 this.listProducts = res.data.filter(listProducts =>
                                     listProducts.link.toLowerCase().includes(this.search.toLowerCase())
                                 );
                             } else {
                                 this.listProducts = res.data;
                             }
                        })
                }
            }
        }
</script>
