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
    .addEntry('rechercheVehiculeAdmin', './assets/js/rechercheVehiculeAdmin.js')
    .addEntry('listing_render', './assets/scss/listing_render.scss')
    .addEntry('recherche', './assets/scss/recherche.scss')
    .addEntry('blocRecherche', './assets/scss/blocRecherche.scss')
    .addEntry('menuCompaRecherche', './assets/scss/menuCompaRecherche.scss')
    .addEntry('ficheProduit', './assets/scss/ficheProduit.scss')
    .addEntry('addToCompare', './assets/js/addToCompare.js')




    .cleanupOutputBeforeBuild()
    .enableBuildNotifications()
    .enableSassLoader();


module.exports = Encore.getWebpackConfig();