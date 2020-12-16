<?php

    require_once('Cliente.class.php');

    class Conta {

        private $id;

        private $numero;

        private $saldo;

        private $cliente;

        private $dataCadastro;

        public function setId($id){
            $this->id = $id;
        }

        public function getId(){
            return $this->id;
        }

        public function setNumero($numero){
            $this->numero = $numero;
        }

        public function getNumero(){
            return $this->numero;
        }

        public function setSaldo($saldo){
            $this->saldo = $saldo;
        }

        public function getSaldo(){
            return $this->saldo;
        }

        public function setDataCadastro($dataCadastro){
            $this->dataCadastro = $dataCadastro;
        }

        public function getDataCadastro(){
            return $this->dataCadastro;
        }

        //Saldo: Deverá retornar o saldo de uma pessoa.
        public function retornoSaldo($cpf){
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
	      


        public function getCredito(){
            $this->saldo;
        }

    }    


?>