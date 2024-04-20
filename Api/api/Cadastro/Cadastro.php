<?php
      // Arquivo de "Regras de negócio": 
      // MODELO -> Operações para ter acesso ao BD e realizar CRUD !!

     /* criarmos uma classe para ter acesso ao BD e criarmos 5 métodos para CRUD:
       1) consultar um determinado o registro através de um parâmetro "id" 
       2) consultar todos os registros sem parâmetro     
       3) Inserir os dados para Banco de dados 
       4) Alterar os dados no Banco de Dados */
      
      //inserir o arquivo 'config.php'
      require_once 'config.php' ; // ou include 'config.php'
      
      /* Criamos uma class chama "Alunos"  */
      class Cadastro 
      {
        //1) um método para fazer consulta atráves do parâmetro $id
        public static function select(int $id)
        {
            //Criar duas variáveis para tabela e primeira coluna
            $tabela = "cadastro"; //variável para nome da tabela
            $coluna = "id_cadastro"; //variável para chave primaria
            
            // Conectando com o banco de dados através da classe (objeto) PDO
            // pegando as informações do config.php (variáveis globais)
            $connPdo = new PDO(dbDrive.':host='.dbHost.'; dbname='.dbName, dbUser, dbPass);
            
            // Usando comando sql que será executado no banco de dados para consultar um 
            // determinado registro 
            $sql = "select * from $tabela where $coluna = :id" ;
            
            //preparando o comando Select do SQL para ser executado usando método prepare()
            $stmt = $connPdo->prepare($sql);  

            //configurando (ou mapear) o parametro de busca
            $stmt->bindValue(':id' , $id) ;
           
            // Executando o comando select do SQL no banco de dados
            $stmt->execute() ;
           
            if ($stmt->rowCount() > 0) // se houve retorno de dados (Registros)
            {
                //imprimir usando : var_dump( $stmt->fetch(PDO::FETCH_ASSOC) );

                // retornando os dados do banco de dados através do método fetch(...)
                return $stmt->fetch(PDO::FETCH_ASSOC) ;
                
            }else{// se não houve retorno de dados, jogar no classe Exception (erro)
                  // e mostrar a mensagem "Sem registro do aluno"                
                throw new Exception("Sem registro de cadastro");
            }

        }
        
        //2) Um método para fazer consultado de todos os dados sem parâmetro
        public static function selectAll()
        {
            $tabela = "cadastro"; //uma variável para nome da tabela "alunos"
            
            // conectando com o banco de dados através da classe (objeto) PDO
            // pegando as informações do config.php (variáveis globais)
            $connPdo = new PDO(dbDrive.':host='.dbHost.'; dbname='.dbName, dbUser, dbPass);
            //criar execução de consulta usando a linguagem SQL
            $sql = "select * from $tabela"  ;
            // preparando o comando Select do SQL para ser executado usando método prepare()
            $stmt = $connPdo->prepare($sql);
            // Executando o comando select do SQL no banco de dados
            $stmt->execute() ;

            if ($stmt->rowCount() > 0) // se houve retorno de dados (Registros)
            {
                // retornando os dados do banco de dados através do método fetchAll(...)
                return $stmt->fetchAll(PDO::FETCH_ASSOC) ;
            }else{
                throw new Exception("Sem registros");
            }

        }
        
        //3) Um método para inserir os dados para BD
        public static function insert($dados)
         {            
            $tabela = "cadastro";
            //Conectar BD
            $connPdo = new PDO(dbDrive.':host='.dbHost.'; dbname='.dbName, dbUser, dbPass);
            //Comando SQL
            $sql = "insert into $tabela (nome,sobrenome,idade,email,senha) values (:nome, :sobrenome, :idade, :email, :senha)"  ;
            //Preparando o comando SQL
            $stmt = $connPdo->prepare($sql);
            //Mapeando os parâmetros com campos do BD
            $stmt->bindValue(':nome', $dados['nome']);
            $stmt->bindValue(':sobrenome' , $dados['sobrenome']);
            $stmt->bindValue(':idade' , $dados['idade']);
            $stmt->bindValue(':email' , $dados['email']);
            $stmt->bindValue(':senha' , $dados['senha']);
            //Executar
            $stmt->execute() ;

            if ($stmt->rowCount() > 0)
            {
                return 'Dados cadastrados com sucesso!!!';
            }else{
                throw new Exception("Erro ao  inserir os dados!!");
            }
         }
         //4) Um método para fazer alteração de um determinado registro no BD
        public static function alterar($id, $dados)
        {
            $tabela = "cadastro";
            $coluna = "id_cadastro";
            
            $connPdo = new PDO(dbDrive.':host='.dbHost.'; dbname='.dbName, dbUser, dbPass);
            $sql = "update $tabela  set nome=:nome, sobrenome=:sobrenome, idade=:idade, email=:email, senha=:senha where $coluna = :id"  ;
            $stmt = $connPdo->prepare($sql);
            $stmt->bindValue(':id' , $id) ;
            $stmt->bindValue(':nome' , $dados['nome']) ;
            $stmt->bindValue(':sobrenome' , $dados['sobrenome']) ;
            $stmt->bindValue(':idade' , $dados['idade']) ;
            $stmt->bindValue(':email' , $dados['email']) ;
            $stmt->bindValue(':senha' , $dados['senha']) ;            
            $stmt->execute() ;

            if ($stmt->rowCount() > 0)
            {
                return 'Dados alterados com sucesso!';
            }else{
                throw new Exception("Erro ao  alterar os dados!!");
            }
        }
        //5)Um método para fazer exclusão de um determinado registro atráves de id
        public static function delete($id)
        {
            $tabela = "cadastro";
            $coluna = "id_cadastro";

            $connPdo = new PDO(dbDrive.':host='.dbHost.'; dbname='.dbName, dbUser, dbPass);
            //comando sql para deletar um registro
            $sql = "delete from $tabela where $coluna = :id_cadastro"  ;
            $stmt = $connPdo->prepare($sql);
            $stmt->bindValue(':id_cadastro' , $id) ;
            $stmt->execute() ;

            if ($stmt->rowCount() > 0)
            {
                return 'Dados excluídos com sucesso!';
            }else{
                throw new Exception("Erro ao excluir os dados!!");
            }
        } 
      }