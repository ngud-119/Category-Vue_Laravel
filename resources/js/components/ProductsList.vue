<template>
    <div class="products-list">
        <h2 class="component-title">{{ title }}</h2>
        <div v-for="product in products" :key="product.id">
            <div class="product">
                <div class="product__image">
                    <img  :src="product.image">
                </div>
                <div class="product__info">
                    <h4>{{ product.name }}</h4>
                    <p>{{ product.description }}</p>
                    <span>$ {{ product.price }}</span>
                </div>
            </div>
        </div>
    </div>
</template>
 
<script>

    export default{

        name: 'ProductsList',

        data() { 
            return {
                title: 'Products List',
                products: [],
            } 
        },
 
        methods:{
            getProducts: function(){
                axios.get('http://127.0.0.1:8000/api/products')
                     .then(response => { this.products = response.data;})
                     .catch(error => { console.log(error);});
            }
        },
   
        created() { this.getProducts();},
    }
 
</script>
 
<style>
 
</style>