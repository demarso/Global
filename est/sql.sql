#CRIA TABELA ONDE TER? OS ADMINISTRADORES.

CREATE TABLE usuarios
(
	id int not null auto_increment primary key,
	senha char(10) not null,
	nivel int(2) not null
);

#Cria usu?rio administrador com nivel 10
#Administrador pode incluir fabricante, incluir tipo, incluir produto, etc.
INSERT INTO usuarios (senha, nivel) VALUES ('senhaadmin', 10);

#Cria usu?rio comum para fazer consultas ao estoque e nada mais.
INSERT INTO usuarios (senha, nivel) VALUES ('senhauser', 5);



#CRIA TABELA DE PRODUTOS E SUA QUANTIDADE EM ESTOQUE

CREATE TABLE produtos (
	id int(5) not null auto_increment primary key,
	tipo varchar(50) not null,
	fabricante varchar(100) not null,
	modelo varchar(100) not null,
	preco float(6,2) not null,
	descricao text,
	quantidade int(4) not null default '0'
);


CREATE TABLE tipo (
	id int not null auto_increment primary key,
	nome varchar(50)
);


CREATE TABLE fabricante (
	id int(5) not null auto_increment primary key,
	nome varchar(100)
);