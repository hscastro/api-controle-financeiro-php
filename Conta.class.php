<?php

    require_once('Cliente.class.php');

    class Conta {

        private $id;

        private $numero;

        private $saldo;

        private $cliente;

        private $dataCadastro;


        public function setNumero($numero){
            $this->numero = $numero;
        }

        public function getNumero(){
            return $this->numero;
        }

        public function setSaldo($saldo){
            $this->saldo = $saldo;
        }

        public function setDataCadastro($dataCadastro){
            $this->dataCadastro = $dataCadastro;
        }

        public function getDataCadastro(){
            return $this->dataCadastro;
        }

        //Saldo: Deverá retornar o saldo de uma pessoa.
        public function getSaldo($cpf){
            if(existCliente()){

                if($this->saldo > 0.01){
                
                    return $this->saldo;
    
                }else{
                    return "Saldo insuficiente! ";
                }    
            }

            return ('Cliente não encontrado');
            
        }        

        public function existCliente($cpf){
            
            return false;
        }

        public function existsConta($numero){
            
            return false;
        }

        public function setCliente(Cliente $cliente){
            $this->cliente = $cliente;
        }

        public function getCliente(){
            return $this->cliente;
        }
		//Extrato: Deverá retornar as operações realizadas por uma pessoa.
        public function getExtrato($numero){
            return null;
		}
		
        //Débito: Essa operação deverá retirar do saldo de uma pessoa o valor informado na requisição.
        public function setDebito($numero, $valor){

        }
        


        public function getCredito(){
            $this->saldo;
        }

    }    


?>