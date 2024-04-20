<?php
// arquivo de controle
include 'Login.php';
class LoginService
{
    //Uma função para consultar dados
    public function post(){
    /*"php://input" : Este é um stream somente leitura que nos permite ler dados brutos do corpo da solicitação. 
    Ele retorna todos os dados brutos após os cabeçalhos HTTP da solicitação,
    independentemente do tipo de conteúdo.
    A função file_get_contents() : Esta função em PHP é usada para ler um arquivo em uma string.
    A função json_decode() : esta função pega uma string JSON e a converte em uma variável PHP que 
    pode ser um array ou um objeto. */
        $dados = json_decode(file_get_contents('php://input'), true, 512);
        if ($dados == null) {
                throw new Exception("Faltou as informações para o login");
        }
        return Login::verificarLogin($dados);    
    }
}