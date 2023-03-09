<template>
    <div class="add-product">
        <h2 class="component-title">{{ title }}</h2>
        <form @submit.prevent="addProduct">
            <div class="form-first-group">
                <div>
                    <div class="first-input">
                        <label for="name">Product Name</label>
                        <input type="text" v-model="product.name" id="name">
                     </div>
                     <div>
                         <label for="price">Product Price</label>
                         <input type="number" v-model="product.price" id="price">
                     </div>
                </div>
                <div>
                     <label for="description">Product Description</label>
                     <textarea v-model="product.description" id="description"></textarea>
                </div>
            </div>
            <div class="form-second-group">
                <div>
                    <label for="image">Product Image</label>
                    <input type="file" id="image" accept="image/*" v-on:change="onFileSelected">
                </div>
                <div>
                    <label for="category">Product Category</label>
                    <select v-model="product.category_id" id="category">
                        <option value="">Select Category</option>
                        <option v-for="category in categories" :key="category.id" :value="category.id">{{ category.name }}</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="submit--btn">Add Product</button>
        </form>
    </div>
</template>

<script>
    import { useToastr } from "../toastr";

    const toastr = useToastr();

    export default{

        name: 'AddProduct',

        data() {
            return {

                title: 'Add Product',
                categories: [],
                product:{
                   name: '',
                   description: '',
                   price: '',
                   category_id: null,
                   image: null,
                }
            }
        },

        methods:{

            getCategories: function(){
                axios.get(`${window.location.protocol}//${window.location.host}/api/categories`)
                     .then(response => { this.categories = response.data.categories;})
                     .catch(error => { console.log(error);});
            },

            onFileSelected(event) {
                this.product.image = event.target.files[0];
            },

            addProduct: function(){

                axios.post(`${window.location.protocol}//${window.location.host}/api/products`, this.product,{
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                    .then(response => {
                        toastr.success("Product created successfully !!.");
                        this.$router.push({ path: '/' });
                    })
                    .catch(error => {
                        const errors = JSON.parse(error.request.response).errors;
                        for (const property in errors) {
                            toastr.warning(`${errors[property]}`)
                        }
                    });
            }

        },

        created() { this.getCategories(); },
    }

</script>

<style>

</style>
