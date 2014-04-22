create database express;

	use express;

	create table perfis(
	id_perf int UNSIGNED AUTO_INCREMENT  PRIMARY KEY NOT NULL,
	descricao_perf varchar(50) not null,
	opcoes_perf text null
	)engine=MYiSAM;

	create table usuarios(
		id_usu int UNSIGNED AUTO_INCREMENT  PRIMARY KEY NOT NULL,
		ativo char(1) not null,
		nome_usu varchar(100) not null,
		email_usu varchar(150) not null,
		senha_usu varchar(20) not null,
		dt_criacao_usu datetime not null,
		id_perf int not null,
		foreign key(id_perf) references perfis(id_perf)
		)engine=MYiSAM;
	
	create table funcoes(
		id_func int UNSIGNED AUTO_INCREMENT  PRIMARY KEY NOT NULL,
		ativo char(1) not null,
		nome_func text not null,
		data_criacao_func dateTime not null,
		id_proj int not null,
		foreign key(id_proj) references projetos(id_proj)
	)engine=MYiSAM;
	
	create table projetos(
		id_proj int UNSIGNED AUTO_INCREMENT  PRIMARY KEY NOT NULL,
		nome_proj text not null,
		descricao_proj text not null,
		sigla_proj varchar(8) not null,
		data_criacao_proj dateTime not null
	)engine=MYiSAM;
	
	create table indicadores(
		id_ind int UNSIGNED AUTO_INCREMENT  PRIMARY KEY NOT NULL,
		descricao_ind text not null,
		tipo_ind varchar(2) not null,
		sigla_ind varchar(8) not null,
		regra_ind char(2) not null,
		versao_ind text null,
		valor double(5,2),
		referencia_ind text null,
		data_referencia_ind date null
	)engine=MYiSAM;
	
	create table tipo_solicitacoes(
		id_tipo_soli int UNSIGNED AUTO_INCREMENT  PRIMARY KEY NOT NULL,
		descricao_tipo_soli varchar(50) not null
	)engine=MYiSAM;

	create table solicitacoes(
		id_soli int UNSIGNED AUTO_INCREMENT  PRIMARY KEY NOT NULL,		
		id_usu int not null,
		foreign key(id_usu) references usuarios(id_usu),
		id_tipo_soli int not null,
		foreign key(id_tipo_soli) references tipo_solicitacoes(id_tipo_soli),
		id_proj int not null,
		foreign key(id_proj) references projetos(id_proj),
		data_criacao_soli dateTime not null,
		data_soli date null,
		sigla_soli varchar(8) not null,
		identificacao_soli text null,
		tecnica_soli char(1) not null,
		tipo_funcao_soli char(3) not null
		)engine=MYiSAM;

	create table solicitacoes_itens(
		id_soli_itens int UNSIGNED AUTO_INCREMENT  PRIMARY KEY NOT NULL,		
		id_soli int not null,
		foreign key(id_soli) references solicitacoes(id_soli),
		id_ind int not null,
		foreign key(id_ind) references indicadores(id_ind),
		data_criacao_soli_itens dateTime not null,
		qtd_soli_itens double(5,2) not null,
		qtd_alrrlr_soli_itens double(5,2) not null,
		qtd_der_soli_itens double(5,2) not null,
		descricao_soli_itens text not null,
		referencia_soli_itens text not null,
		evidencia_soli_itens text not null
		)engine=MYiSAM;


	create table opcoes(
		id_opc int UNSIGNED AUTO_INCREMENT  PRIMARY KEY NOT NULL,
		proposito_opc text null,
		servidor_smtp text null,
		usuario_smtp text null,
		senha_smtp text null,
		porta_smtp text null
	)engine=MYiSAM;
	