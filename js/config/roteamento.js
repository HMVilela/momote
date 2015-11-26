angular.module("Momote").config(function($routeProvider){
    
    $routeProvider.when("/home",{
        templateUrl:"views/home.html",
        controller: "MomoteCtrl"
    });
    $routeProvider.when("/momote001",{
        templateUrl:"views/momote001.html",
        controller: "Momote001Ctrl"
    });
    $routeProvider.when("/contato",{
        templateUrl:"views/contato.html",
        controller: "ContatoCtrl"
    });
    $routeProvider.when("/participe",{
        templateUrl:"views/participe.html"
    });
   
       
    
});