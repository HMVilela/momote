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
   
    $scope.limpaMensagem = function(){
        $scope.mensagemDeErro = "";
    };
    $scope.assinarNewsLetter = function(){
        var email = $scope.campoEmail;
        $http.post("php/gravar_email.php",{email: email}).success(function(retorno){
            console.log(retorno);
            if(retorno.status === true){
                $scope.mensagemDeErro = retorno.info;
                $scope.campoEmail = "";
            }
            else{
                $scope.mensagemDeErro = retorno.info;
            }
        }).error(function(erro){
            $scope.mensagemDeErro = "Infelizmente houve um erro durante o registro. Por favor, tente novamente.";
            console.log(erro);
        
        });
    };

});