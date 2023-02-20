<template>
    <div class="products-list">
        <h2 class="component-title">{{ title }}</h2>
        <div class="products-list-container">
            <div class="products-list-content">
                <div v-for="product in products" :key="product.id">
                    <div class="product">
                        <div class="product__image">
                            <img :src="product.image">
                        </div>
                        <div class="product__info">
                            <h4>{{ product.name }}</h4>
                            <p>{{ product.description }}</p>
                            <span>$ {{ product.price }}</span>
                        </div>
                    </div>
                 </div>
            </div>
            <div class="sidebar">
                <form>
                    <div>
                        <label for="category"></label>
                        <select  id="category" v-model="selectedCategory" @change="filterByCategory" class="select-filter">
                            <option value="">Filter by category : </option>
                            <option v-for="category in categories" :key="category.id" :value="category.id">{{ category.name }}</option>
                        </select>
                     </div>
                     <div>
                        <label for="order"></label>
                        <select  id="order" v-model="selectedOrder" @change="sortByOrder" class="select-filter">
                            <option value="">Sort by order : </option>
                            <option value="ASC">ASC</option>
                            <option value="DESC">DESC</option>
                        </select>
                     </div>
                </form>
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
                categories: [],
                selectedCategory:'',
                selectedOrder:'',
            } 
        },
 
        methods:{

            getProducts: function(){
                axios.get('http://127.0.0.1:8000/api/products')
                     .then(response => { this.products = response.data;})
                     .catch(error => { console.log(error);});
            },

            getCategories: function(){
                axios.get('http://127.0.0.1:8000/api/categories')
                     .then(response => { this.categories = response.data;})
                     .catch(error => { console.log(error);});
            },

            filterByCategory: function(){
                this.products = this.products.filter(product => {
                    return product.categories.some(category => { 
                        return category.id === this.selectedCategory; }); 
                    }
                );
            },

            sortByOrder: function(){

                if(this.selectedOrder === "ASC"){
                    this.products = this.products.sort((a, b) => a.price - b.price);    
                }

                if(this.selectedOrder === "DESC"){
                    this.products = this.products.sort((a, b) => b.price - a.price);    
                }

            }
        },
   
        created() { 
            this.getProducts();
            this.getCategories();
        },
    }
 
</script>
 
<style>
 
</style>