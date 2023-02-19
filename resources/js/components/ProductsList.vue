<template>
    <div class="products-list">
        <h2>{{ title }}</h2>
        <div v-for="product in products" :key="product.id">
            <p>{{ product.name }}</p>
            <p>{{ product.description }}</p>
            <p>{{ product.price }}</p>
            <p>{{ product.image }}</p>
            <hr>
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