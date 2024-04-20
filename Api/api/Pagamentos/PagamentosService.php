<?php       
    include 'Pagamentos.php';
    class PagamentosService 
    {           
          public function get( $id = null )
          {
              if ($id){            
                 return pagamentos::select($id) ;
              }else{                  
                 return pagamentos::selectAll() ;
              }

          }
          
          public function post()
          {                    
             $dados = json_decode(file_get_contents('php://input'), true, 512);
             if ($dados == null) {
                 throw new Exception("Faltou as informações para incluir");
             }          
             return pagamentos::insert($dados);
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
              return pagamentos::alterar($id, $dados);  
          }
          
          public function delete($id = null)
          {
              if($id == null ){
                  throw new Exception("Falta o produto");
              }
              return pagamentos::delete( $id );   
          }
          
   }