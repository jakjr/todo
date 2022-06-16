/**
 * jakjr: apenas para que o phpStorm consiga entender o '@'.
 * O Mix utiliza o alias em, webpack.mix.js
 */
const path = require('path')

module.exports = {
    resolve: {
        alias: {
            '@': '/var/www/todo/resources/js'
        }
    }
}
