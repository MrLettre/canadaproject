var Encore = require('@symfony/webpack-encore');

Encore
    .setOutputPath('web/build/')
    .setPublicPath('/web')
    .addEntry('app', './assets/js/app.js')
    .addEntry('style', './assets/scss/main.scss')
    .addEntry('header', './assets/scss/header.scss')
    .addEntry('adminPanel', './assets/scss/adminPanel.scss')
    .addEntry('adminPanelTwo', './assets/scss/adminPanelTwo.scss')
    .cleanupOutputBeforeBuild()
    .enableBuildNotifications()
    .enableSassLoader();


module.exports = Encore.getWebpackConfig();