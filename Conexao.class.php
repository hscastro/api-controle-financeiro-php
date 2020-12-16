<?php
	//Desenvolvedor: Antonio Halyson 
	//email: halisonsc5@gmail.com
	//Data:14/12/2020 as 09:00
    //http://github.com/hscastro
    
 class Conexao {   

        private $host = "localhost";

        private $dbname = "dbfinance";

        private $user = "root";

        private $pwd = "@Admin1234";

        private $conn = null;

        public function __construct(){

        }

        public function openConexao(){
            //url de conexão com banco de dados mysSQL
            $this->conn = new PDO("mysql:host=". $this->host. ";dbname=". $this->dbname, $this->user, $this->pwd);
            

            if($this->conn != null){ 
                //echo 'conectado'; 
                return $this->conn;

            }else{
                echo "Erro ao conectar ao banco";
                return null;
            }
        }

        public function closeConexao(){
            $this->conn = NULL;
            //echo 'fechado';
        }
    }

?>