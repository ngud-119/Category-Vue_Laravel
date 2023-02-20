<template>
    <div class="container">
        <div class="nav-links">
            <div>
                <span><router-link to="/">Products List</router-link></span> 
                <span><router-link to="/add-product">Add Product</router-link></span>
            </div>
            <div>
                <h3 class="logo"><router-link to="/">YouCan</router-link></h3>
            </div>
        </div>
        <div class="main">
            <router-view></router-view>
        </div>
    </div>
</template>