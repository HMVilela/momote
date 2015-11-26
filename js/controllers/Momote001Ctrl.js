angular.module("Momote").controller("Momote001Ctrl",function($scope,$location,$http){
    $scope.mostraTelaDeContato = function(){
        $location.path("/contato");
    };
    $scope.gravarUsuario = function(contato){
        var parametros = {
            nome    : contato.nome,
            email   : contato.email
        };
        $http.post("php/gravar_email.php",parametros).success(function(resposta){
           if(resposta.status === true){
               $scope.mensagemDeResposta = resposta.info;
               $scope.contato = {};
               $scope._form.$setPristine();
           }
            else{
              $scope.mensagemDeResposta = resposta.info;  
                
            }
        
        
        }).error(function(erro){
        
        });
    };



});