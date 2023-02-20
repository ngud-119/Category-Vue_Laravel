<template>
    <div class="container">
        <div class="nav-links">
            <span><router-link to="/">Products List</router-link></span> 
            <span><router-link to="/add-product">Add Product</router-link></span>
        </div>
        <div class="main">
            <router-view></router-view>
        </div>
    </div>
</template>