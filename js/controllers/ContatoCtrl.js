angular.module("Momote").controller("ContatoCtrl",function($scope,$http){
    $scope.contato = {};
    $scope.enviarContato = function(contato){
       var parametros = {
            nome     : contato.nome,
            email    : contato.email,
            assunto  : contato.assunto,
            mensagem : contato.mensagem
       };
        $http.post("php/enviar_contato.php",parametros).success(function(resposta){
            if(resposta.status === true){
                $scope.contato = {};
                $scope.form.$setPristine();   
                $scope.respostaDeEnvio = resposta.info;
            }
            else{
                $scope.respostaDeEnvio = resposta.info;
            }
        }).error(function(erro){
        
        });
    };




});