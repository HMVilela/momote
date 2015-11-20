angular.module("Momote").config(function($routeProvider){
    
    $routeProvider.when("/home",{
        templateUrl:"views/home.html"
    });
    $routeProvider.when("/momote001",{
        templateUrl:"views/momote001.html"
    });
    $routeProvider.when("/contato",{
        templateUrl:"views/contato.html"
    });
    $routeProvider.when("/participe",{
        templateUrl:"views/participe.html"
    });
   
       
    
});