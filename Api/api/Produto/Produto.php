<?php      
      require_once 'config.php' ;      
      
      class Produto 
      {        
        public static function select(int $id)
        {            
            $tabela = "produto"; 
            $coluna = "id_produto";            
            
            $connPdo = new PDO(dbDrive.':host='.dbHost.'; dbname='.dbName, dbUser, dbPass);            
            
            $sql = "select * from $tabela where $coluna = :id" ;            
            
            $stmt = $connPdo->prepare($sql);
            
            $stmt->bindValue(':id' , $id) ;           
            
            $stmt->execute() ;
           
            if ($stmt->rowCount() > 0)
            {                 
                return $stmt->fetch(PDO::FETCH_ASSOC) ;
                
            }else{                
                throw new Exception("Sem registro de produto");
            }

        }       
        
        public static function selectAll()
        {
            $tabela = "produto";            
            
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
            
            $sql = "insert into $tabela (postagem,itens,descricao,quantidade,preco) values (:postagem, :itens, :descricao, :quantidade, :preco)"  ;
            
            $stmt = $connPdo->prepare($sql);
            
            $stmt->bindValue(':postagem', $dados['postagem']);
            $stmt->bindValue(':itens' , $dados['itens']);
            $stmt->bindValue(':descricao' , $dados['descricao']);
            $stmt->bindValue(':quantidade' , $dados['quantidade']);
            $stmt->bindValue(':preco' , $dados['preco']);
            
            $stmt->execute() ;

            if ($stmt->rowCount() > 0)
            {
                return 'Dados cadastrados com sucesso!!!';
            }else{
                throw new Exception("Erro ao  inserir os dados!!");
            }
         }
         
        public static function alterar($id, $dados)
        {
            $tabela = "produto";
            $coluna = "id_produto";
            
            $connPdo = new PDO(dbDrive.':host='.dbHost.'; dbname='.dbName, dbUser, dbPass);
            $sql = "update $tabela  set postagem=:postagem, itens=:itens, descricao=:descricao, quantidade=:quantidade, preco=:preco where $coluna = :id"  ;
            $stmt = $connPdo->prepare($sql);
            $stmt->bindValue(':id' , $id) ;
            $stmt->bindValue(':postagem' , $dados['postagem']) ;
            $stmt->bindValue(':itens' , $dados['itens']) ;
            $stmt->bindValue(':descricao' , $dados['descricao']) ;
            $stmt->bindValue(':quantidade' , $dados['quantidade']) ;
            $stmt->bindValue(':preco' , $dados['preco']) ;            
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
            $tabela = "produto";
            $coluna = "id_produto";

            $connPdo = new PDO(dbDrive.':host='.dbHost.'; dbname='.dbName, dbUser, dbPass);
            
            $sql = "delete from $tabela where $coluna = :id_produto"  ;
            $stmt = $connPdo->prepare($sql);
            $stmt->bindValue(':id_produto' , $id) ;
            $stmt->execute() ;

            if ($stmt->rowCount() > 0)
            {
                return 'Dados excluídos com sucesso!';
            }else{
                throw new Exception("Erro ao excluir os dados!!");
            }
        }   


      }