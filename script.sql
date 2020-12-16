//cria a tabela clientes

CREATE TABLE tb_clientes(
    ID INT(11) NOT NULL AUTO_INCREMENT,
    NOME VARCHAR(100) NOT NULL,
    CPF VARCHAR(11) NOT NULL,
    DATANASCIMENTO DATE,
    EMAIL VARCHAR(100),
    PRIMARY KEY(ID)
)engine=InnoDB;
 
//cria a tabela contas
CREATE TABLE tb_contas(
    ID INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    NUMERO VARCHAR(12) NOT NULL,
    DATACADASTRO DATE,
    VALOR FLOAT,
    CLIENTE_ID INT(11) NOT NULL, 
    PRIMARY KEY(ID)    
)engine=InnoDB;
 
# alter e insere a chave estrangeira na tabela tb_contas

ALTER TABLE tb_clientes ADD CONSTRAINT UNIQUE_CLIENTES_CPF UNIQUE (CPF);
 
ALTER TABLE tb_contas ADD CONSTRAINT UNIQUE_CONTAS_NUMERO UNIQUE (NUMERO);

ALTER TABLE tb_contas ADD CONSTRAINT fk_cliente_id FOREIGN KEY(CLIENTE_ID) REFERENCES tb_clientes(ID);

#insert de testes
INSERT INTO tb_clientes(id, nome, cpf, datanascimento, email)values(1,'Antonio','94230202022' ,'2019-11-17', 'antonio123@gmail.com');

INSERT INTO tb_contas(id, numero,datacadastro, valor, cliente_id)values(1,'2323','2020-12-20', 2390, 1);

INSERT INTO tb_clientes(nome, cpf, datanascimento, email)values('João','18194230202' ,'2019-02-01', 'joao2_1@gmail.com');

INSERT INTO tb_contas(numero,datacadastro, valor, cliente_id)values('3921-8','2020-12-15', 110, 2);

INSERT INTO tb_clientes(nome, cpf, datanascimento, email)values('Maria da Silva','98194230345' ,'2019-07-29', 'maria.s@gmail.com');

INSERT INTO tb_contas(numero,datacadastro, valor, cliente_id)values('9342-5','2020-12-15', 1140.52, 3);



UPDATE tb_contas SET valor=6800 WHERE id=5 AND numero='1923-2';