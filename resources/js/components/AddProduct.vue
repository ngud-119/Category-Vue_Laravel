<template>
    <div class="add-product">
        <h2>{{ title }}</h2>
        <form @submit.prevent="addProduct">
            <div>
                <label for="name">Product Name</label>
                <input type="text" v-model="product.name" id="name">
            </div>
            <div>
                <label for="description">Product Description</label>
                <textarea v-model="product.description" id="description"></textarea>
            </div>
            <div>
                <label for="price">Product Price</label>
                <input type="number" v-model="product.price" id="price">
            </div>
            <div>
                <label for="category">Product Category</label>
                <select v-model="product.category_id" id="category">
                    <option value="">Select Category</option>
                    <option v-for="category in categories" :key="category.id" :value="category.id">{{ category.name }}</option>
                </select>
            </div>
            <div>
                <label for="image">Product Image</label>
                <input type="file" id="image" accept="image/*" v-on:change="onFileSelected">
            </div>
            <button type="submit">Add Product</button>
        </form>
    </div>
</template>
 
<script>

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
                axios.get('http://127.0.0.1:8000/api/categories')
                     .then(response => { this.categories = response.data;})
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
                       this.$router.push({ path: '/' });
                    })
                    .catch(error => {
                        console.log(error);
                    });
            }
  
        },
   
        created() { this.getCategories(); },
    }
 
</script>
 
<style>
 
</style>