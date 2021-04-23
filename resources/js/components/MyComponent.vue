<template>
    <div class="container">
        <form action="" method="post" v-on:submit.prevent="submitForm" id="form">
            <div>
                <div class="alert alert-success" role="alert" id ="success-alert" v-if="successful">
                    Đặt hàng thành công, chúng tôi sẽ sớm liên hệ với bạn
                </div>
                <div class="alert alert-danger alert-dismissible" role="alert" v-if="errors.length > 0">
                    <ul>
                        <li v-for="error in errors" :key="index">
                            {{error}}
                        </li>
                    </ul>
                </div>
                <div v-for="(form,index) in forms" v-if="isActive === true">
                    <button @click="removeForm(index)" type="button" class="close" style="color:#F5773A" v-if="forms.length > 1">&times;</button>
                    <div class="mb-3">
                        <label for="link" class="form-label">Link sản phẩm</label>
                        <input v-model="form.link" type="text" class="form-control" id="link">
                    </div>
                    <div class="mb-3">
                        <label for="note" class="form-label">Ghi chú</label>
                        <textarea  v-model="form.note" class="form-control" id="note" rows="3"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <button @click="addForm" v-if="isActive === true" type="button" class="btn btn-primary " id="button">Thêm sản phẩm</button>
                    </div>
                    <div class="col-md-6">
                        <button type="button" style="margin-left: 55px" @click="checkError" v-show="isActive === true"  class="btn btn-primary mb-3">Xác nhận đặt hàng</button>
                    </div>

                </div>
                <div v-if="isActive === false">
                    <div class="mb-3">
                        <label for="name" class="form-label">Họ tên</label>
                        <input v-model="user.name" type="text" class="form-control" id="name">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Số điện thoại</label>
                        <input v-model="user.phone" type="text" class="form-control" id="phone">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Địa chỉ</label>
                        <input v-model="user.address" type="text" class="form-control" id="address">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                        </div>
                        <div class="col-md-6">
                            <button id="submit" style="margin-left: 120px" type="submit" class="d-inline p-2 btn btn-primary">Đặt hàng</button>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    import JQuery from 'jquery'
    window.$ = JQuery;
    import axios from 'axios'
    $(document).ready(function() {
        $("#success-alert").hide();
        $("#submit").click(function showAlert() {
            $("#success-alert").fadeTo(2000, 500).slideUp(500, function() {
                $("#success-alert").slideUp(500);
            });
        });
    });
    export default {
        name: 'AddProduct',
        mounted() {
            console.log('Component mounted.')
        },
        data(){
            return{
                forms: [],
                count: 0,
                user:{
                    name:'',
                    phone:'',
                    address:''
                },
                isActive:true,
                errors:[],
                successful: false
            }
        },
        methods: {
            submitForm() {
                axios.post('/products', {
                    products: this.forms,
                    name: this.user.name,
                    phonenumber: this.user.phone,
                    address: this.user.address
                }).then((res) => {
                    this.errors = [];
                    this.successful = true;
                }).catch(e => {
                    this.errors = [];
                    if (!this.user.name) this.errors.push('Phải nhập tên');
                    if (!this.user.phone) this.errors.push('Phải nhập số điện thoại');
                    if (!this.user.address) this.errors.push('Phải nhập địa chỉ');
                    if (this.user.name && this.user.address && this.user.phone && this.forms) this.errors = [];
                    console.log(this.errors);
                });
            },
            checkError(){
                this.errors = [];
                if (!this.forms[0]['link']&& !this.forms[0]['note']) this.errors.push('Phải nhập link, ghi chú cho sản phẩm');
                else this.isActive = false;
            },
            addForm(){
                this.forms.push({
                        link: '',
                        note: ''
                });
                this.count ++;
            },
            removeForm(index){
                this.forms.splice(index,1);
            },
        }
    }


</script>
