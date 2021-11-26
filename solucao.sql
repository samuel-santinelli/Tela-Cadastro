select nome,  idClassificacao from tblFilme;
select * from tblclassificacao;

select tblFilme.nome, tblClassificacao.faixaEtaria from tblFilme inner join tblClassificacao on tblClassificacao.idClassificacao = tblFilme.idClassificacao;