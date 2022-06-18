const mix = require('laravel-mix');
//const webpackConfig = require('./webpack.config')

mix
    .js('resources/js/app.js', 'public/js')
    .vue({ runtimeOnly: true })
    .sass('resources/sass/app.scss', 'public/css')
    .version()
    .alias({ '@': 'resources/js' })
    // .webpackConfig({
    //     stats: {
    //         children: true,
    //     },
    // })
    //.webpackConfig(webpackConfig)
    //.disableSuccessNotifications()
    .browserSync({
        proxy: 'todo.d',
        //notify: true,
        //open: true,
        open: 'external',
        host: 'todo.d',
        cors: true,
        //files: ['!node_modules', '!vendor', 'public/{*,**/*}', '{*,**/*}.php']
        files: ['!node_modules', '!vendor', 'public/{*,**/*}']
    })
    .sourceMaps()
