<?php       
    include 'Carrinho.php';
    class CarrinhoService 
    {           
          public function get( $id = null )
          {
              if ($id){            
                 return carrinho::select($id) ;
              }else{                  
                 return carrinho::selectAll() ;
              }

          }
          
          public function post()
          {                    
             $dados = json_decode(file_get_contents('php://input'), true, 512);
             if ($dados == null) {
                 throw new Exception("Faltou as informações para incluir");
             }          
             return carrinho::insert($dados);
          }
          
          public function put($id = null)          
          {
              if ($id == null ){
                 throw new Exception("Falta o produto");
              }   

              $dados = json_decode(file_get_contents('php://input'), true, 512);
              if ($dados == null ){
                 throw new Exception("Faltou as informações para alterar");
              }
              return carrinho::alterar($id, $dados);  
          }
          
          public function delete($id = null)
          {
              if($id == null ){
                  throw new Exception("Falta o cadastro");
              }
              return carrinho::delete( $id );   
          }
          
   }