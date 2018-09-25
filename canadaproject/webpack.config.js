var Encore = require('@symfony/webpack-encore');

Encore
    .setOutputPath('web/build/')
    .setPublicPath('/web')
    .addEntry('app', './assets/js/app.js')
    .addEntry('style', './assets/scss/main.scss')
    .addEntry('header', './assets/scss/header.scss')
    .addEntry('login', './assets/scss/login.scss')
    .addEntry('adminPanel', './assets/scss/adminPanel.scss')
    .addEntry('adminPanelTwo', './assets/scss/adminPanelTwo.scss')
    .addEntry('adminPanelSeller', './assets/scss/adminPanelSeller.scss')
    .addEntry('adminPanelSellerTwo', './assets/scss/adminPanelSellerTwo.scss')
    .addEntry('user', './assets/scss/user.scss')
    .addEntry('rechercheVehicule', './assets/js/rechercheVehiculeVendeur.js')
    .cleanupOutputBeforeBuild()
    .enableBuildNotifications()
    .enableSassLoader();


module.exports = Encore.getWebpackConfig();