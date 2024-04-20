<?php       
    include 'Produto.php';
    class ProdutoService 
    {           
          public function get( $id = null )
          {
              if ($id){            
                 return produto::select($id) ;
              }else{                  
                 return produto::selectAll() ;
              }

          }
          
          public function post()
          {                    
             $dados = json_decode(file_get_contents('php://input'), true, 512);
             if ($dados == null) {
                 throw new Exception("Faltou as informações para incluir");
             }          
             return produto::insert($dados);
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
              return produto::alterar($id, $dados);  
          }
          
          public function delete($id = null)
          {
              if($id == null ){
                  throw new Exception("Falta o cadastro");
              }
              return produto::delete( $id );   
          }
          
   }