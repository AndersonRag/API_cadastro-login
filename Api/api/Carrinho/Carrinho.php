<?php      
      require_once 'config.php' ;      
      
      class Carrinho 
      {        
        public static function select(int $id)
        {            
            $tabela = "carrinho"; 
            $coluna = "id_carrinho";            
            
            $connPdo = new PDO(dbDrive.':host='.dbHost.'; dbname='.dbName, dbUser, dbPass);            
            
            $sql = "select * from $tabela where $coluna = :id" ;            
            
            $stmt = $connPdo->prepare($sql);
            
            $stmt->bindValue(':id' , $id) ;           
            
            $stmt->execute() ;
           
            if ($stmt->rowCount() > 0)
            {                 
                return $stmt->fetch(PDO::FETCH_ASSOC) ;
                
            }else{                
                throw new Exception("Sem produto selecionado");
            }

        }       
        
        public static function selectAll()
        {
            $tabela = "carrinho";            
            
            $connPdo = new PDO(dbDrive.':host='.dbHost.'; dbname='.dbName, dbUser, dbPass);
            
            $sql = "select * from $tabela"  ;
            
            $stmt = $connPdo->prepare($sql);
            
            $stmt->execute() ;

            if ($stmt->rowCount() > 0)
            {                
                return $stmt->fetchAll(PDO::FETCH_ASSOC) ;
            }else{
                throw new Exception("Sem registros");
            }

        }        
        
        public static function insert($dados)
         {            
            $tabela = "produto";
            
            $connPdo = new PDO(dbDrive.':host='.dbHost.'; dbname='.dbName, dbUser, dbPass);
            
            $sql = "insert into $tabela (id_produto,subtotal,total_itens,total,endereco) values (:id_produto, :subtotal, :total_itens, :total, :endereco)"  ;
            
            $stmt = $connPdo->prepare($sql);
            
            $stmt->bindValue(':id_produto', $dados['id_produto']);
            $stmt->bindValue(':subtotal' , $dados['subtotal']);
            $stmt->bindValue(':total_itens' , $dados['total_itens']);
            $stmt->bindValue(':total' , $dados['total']);
            $stmt->bindValue(':endereco' , $dados['endereco']);
            
            $stmt->execute() ;

            if ($stmt->rowCount() > 0)
            {
                return 'produtos cadastrados com sucesso!!!';
            }else{
                throw new Exception("Erro ao  inserir os dados!!");
            }
         }
         
        public static function alterar($id, $dados)
        {
            $tabela = "carrinho";
            $coluna = "id_carrinho";
            
            $connPdo = new PDO(dbDrive.':host='.dbHost.'; dbname='.dbName, dbUser, dbPass);
            $sql = "update $tabela  set id_produto=:id_produto, subtotal=:subtotal, total_itens=:total_itens, total=:total, endereco=:endereco where $coluna = :id"  ;
            $stmt = $connPdo->prepare($sql);
            $stmt->bindValue(':id' , $id) ;
            $stmt->bindValue(':id_produto' , $dados['id_produto']) ;
            $stmt->bindValue(':subtotal' , $dados['subtotal']) ;
            $stmt->bindValue(':total_itens' , $dados['total_itens']) ;
            $stmt->bindValue(':total' , $dados['total']) ;
            $stmt->bindValue(':endereco' , $dados['endereco']) ;            
            $stmt->execute() ;

            if ($stmt->rowCount() > 0)
            {
                return 'Dados alterados com sucesso!';
            }else{
                throw new Exception("Erro ao  alterar os dados!!");
            }
        }
        
        public static function delete($id)
        {
            $tabela = "carrinho";
            $coluna = "id_carrinho";

            $connPdo = new PDO(dbDrive.':host='.dbHost.'; dbname='.dbName, dbUser, dbPass);
            
            $sql = "delete from $tabela where $coluna = :id_carrinho"  ;
            $stmt = $connPdo->prepare($sql);
            $stmt->bindValue(':id_carrinho' , $id) ;
            $stmt->execute() ;

            if ($stmt->rowCount() > 0)
            {
                return 'Dados excluídos com sucesso!';
            }else{
                throw new Exception("Erro ao excluir os dados!!");
            }
        }
      }