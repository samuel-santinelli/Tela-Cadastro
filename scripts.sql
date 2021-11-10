/*Cria um novo database*/
create database dbcontatos20212t; 

/*Permite visualizar os databases existentes*/
show databases;

/*Permite selecionar o database que será utilizado*/
use dbcontatos20212t;

/*Permite visualizar a estrutura criada da tabela*/
desc tblcliente;

select * from tblcliente;

/*Permite criar uma tabela*/ 
create table tblcliente                            
(
	idcliente int not null auto_increment primary key,
    nome varchar(100) not null, 
    rg varchar(15) not null, 
	cpf varchar(20) not null,
    telefone varchar(16),
    celular varchar(17),
    email varchar(60),
    obs text(54)
	
);

/*Permite visualizar todas as tabelas existentes*/
show tables;

/*Permite visualizar o conteudo de uma tabela*/
select * from tblcliente;

insert into tblcliente ( nome, rg, cpf, telefone, celular, email, obs ) values ( 'Samuel', 'ddadadaddddsd', 'dadadadadadadadadada', 'dadadadadda', 'addadadad', 'dadaddaddadad@ss', '' );

alter table tblcliente
	add column foto varchar(40);

