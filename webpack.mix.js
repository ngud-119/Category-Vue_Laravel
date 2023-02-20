const mix = require('laravel-mix');
const { VueLoaderPlugin } = require('vue-loader');

mix.js('resources/js/app.js', 'public/js')
   .css('resources/css/app.scss', 'public/css')
   .webpackConfig({
      module: {
         rules: [
            
               { test: /\.vue$/, loader: 'vue-loader' },
               { test: /\.vue\.html$/, loader: 'vue-loader' }
            
         ]
      },
      plugins: [
         new VueLoaderPlugin()
      ]
   });