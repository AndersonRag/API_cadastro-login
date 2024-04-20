<?php      
      require_once 'config.php' ;      
      
      class Pagamentos 
      {        
        public static function select(int $id)
        {            
            $tabela = "pagamentos"; 
            $coluna = "id_pagamento";            
            
            $connPdo = new PDO(dbDrive.':host='.dbHost.'; dbname='.dbName, dbUser, dbPass);            
            
            $sql = "select * from $tabela where $coluna = :id" ;            
            
            $stmt = $connPdo->prepare($sql);
            
            $stmt->bindValue(':id' , $id) ;           
            
            $stmt->execute() ;
           
            if ($stmt->rowCount() > 0)
            {                 
                return $stmt->fetch(PDO::FETCH_ASSOC) ;
                
            }else{                
                throw new Exception("Sem registro de pagamento");
            }

        }       
        
        public static function selectAll()
        {
            $tabela = "pagamentos";            
            
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
            $tabela = "pagamentos";
            
            $connPdo = new PDO(dbDrive.':host='.dbHost.'; dbname='.dbName, dbUser, dbPass);
            
            $sql = "insert into $tabela (debito,credito,pix,numero_cartao,codigo,vencimento,id_carrinho) values (:debito, :credito, :pix, :numero_cartao, :codigo, :vencimento, :id_carrinho)"  ;
            
            $stmt = $connPdo->prepare($sql);
            
            $stmt->bindValue(':debito', $dados['debito']);
            $stmt->bindValue(':credito' , $dados['credito']);
            $stmt->bindValue(':pix' , $dados['pix']);
            $stmt->bindValue(':numero_cartao' , $dados['numero_cartao']);
            $stmt->bindValue(':codigo' , $dados['codigo']);
            $stmt->bindValue(':vencimento' , $dados['vencimento']);
            $stmt->bindValue(':id_carrinho' , $dados['id_carrinho']);
            
            $stmt->execute() ;

            if ($stmt->rowCount() > 0)
            {
                return 'Pagamento cadastrados com sucesso!!!';
            }else{
                throw new Exception("Erro ao  inserir os dados!!");
            }
         }
         
        public static function alterar($id, $dados)
        {
            $tabela = "pagamentos";
            $coluna = "id_pagamento";
            
            $connPdo = new PDO(dbDrive.':host='.dbHost.'; dbname='.dbName, dbUser, dbPass);
            $sql = "update $tabela  set debito=:debito, credito=:credito, pix=:pix, numero_cartao=:numero_cartao, codigo=:codigo, vencimento=:vencimento, id_carrinho=:id_carrinho where $coluna = :id"  ;
            $stmt = $connPdo->prepare($sql);
            $stmt->bindValue(':id' , $id) ;
            $stmt->bindValue(':debito' , $dados['debito']) ;
            $stmt->bindValue(':credito' , $dados['credito']) ;
            $stmt->bindValue(':pix' , $dados['pix']) ;
            $stmt->bindValue(':numero_cartao' , $dados['numero_cartao']) ;
            $stmt->bindValue(':codigo' , $dados['codigo']) ; 
            $stmt->bindValue(':vencimento' , $dados['vencimento']) ;
            $stmt->bindValue(':id_carrinho' , $dados['id_carrinho']) ;           
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
            $tabela = "pagamentos";
            $coluna = "id_pagamento";

            $connPdo = new PDO(dbDrive.':host='.dbHost.'; dbname='.dbName, dbUser, dbPass);
            
            $sql = "delete from $tabela where $coluna = :id_pagamento"  ;
            $stmt = $connPdo->prepare($sql);
            $stmt->bindValue(':id_pagamento' , $id) ;
            $stmt->execute() ;

            if ($stmt->rowCount() > 0)
            {
                return 'Dados excluídos com sucesso!';
            }else{
                throw new Exception("Erro ao excluir os dados!!");
            }
        }   


      }