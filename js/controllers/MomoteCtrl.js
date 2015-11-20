angular.module("Momote").controller("MomoteCtrl",function($scope,$location,$http){
    
    
    $location.path("/home");
    
     $scope.ir_para_home = function(){
        $location.path("/home");
     };
    $scope.momote_001 = function(){
        $location.path("/momote001");
    };
    $scope.contato = function(){
        $location.path("/contato");
    };
    $scope.participe = function(){
        $location.path("/participe");
    };
    
    $scope.assinarNewsLetter = function(email){
        
    };

});