-- criacao da tabela titulo
CREATE TABLE "tb_titulo" (
	"id"	INTEGER NOT NULL UNIQUE,
	"nome"	TEXT NOT NULL,
	"nome_original"	TEXT NOT NULL,
	"ano_lancamento"	INTEGER,
	"descricao"	TEXT,
	PRIMARY KEY("id" AUTOINCREMENT)
)

-- criacao da tabela tb_midia
CREATE TABLE "tb_midia" (
	"id"	INTEGER NOT NULL UNIQUE,
	"nome"	TEXT NOT NULL,
	"descricao"	TEXT,
	PRIMARY KEY("id" AUTOINCREMENT)
);

-- criacao da tabela b_situacao_item_acervo
CREATE TABLE "tb_situacao_item_acervo" (
	"id"	INTEGER NOT NULL UNIQUE,
	"nome"	TEXT NOT NULL,
	"descricao"	TEXT,
	PRIMARY KEY("id" AUTOINCREMENT)
);

-- cricao da tabela tb_item_acervo
CREATE TABLE "tb_item_acervo" (
	"codigo"	TEXT NOT NULL,
	"id_midia"	INTEGER NOT NULL,
	"id_titulo"	INTEGER NOT NULL,
	"id_situacao_item_acervo"	INTEGER NOT NULL,
	"quantidade"	INTEGER NOT NULL DEFAULT 0,
	"periodo_max"	INTEGER NOT NULL DEFAULT 0,
	"id"	INTEGER NOT NULL,
	PRIMARY KEY("id" AUTOINCREMENT)
);

-- criacao da tabela tb_cliente
CREATE TABLE "tb_cliente" (
	"id"	INTEGER NOT NULL UNIQUE,
	"nome"	TEXT NOT NULL,
	"logradouro"	TEXT NOT NULL,
	"bairro"	TEXT NOT NULL,
	"cpf"	TEXT NOT NULL,
	"rg"	TEXT NOT NULL,
	PRIMARY KEY("id" AUTOINCREMENT)
);

-- criacao da tabela tb_funcionario
CREATE TABLE "tb_funcionario" (
	"id"	INTEGER NOT NULL,
	"nome"	TEXT NOT NULL,
	"logradouro"	TEXT NOT NULL,
	"bairro"	TEXT NOT NULL,
	"cpf"	TEXT NOT NULL,
	"rg"	INTEGER NOT NULL,
	PRIMARY KEY("id" AUTOINCREMENT)
);

-- criacao da tabela tb_usuario
CREATE TABLE "tb_usuario" (
	"id"	INTEGER NOT NULL UNIQUE,
	"login"	TEXT NOT NULL,
	"senha"	TEXT,
	"status"	INTEGER NOT NULL DEFAULT 1,
	"id_funcionario"	INTEGER NOT NULL,
	"eh_administrador"	INTEGER NOT NULL DEFAULT 0,
	PRIMARY KEY("id" AUTOINCREMENT)
);

-- criacao da tabela tb_meta_venda
CREATE TABLE "tb_meta_venda" (
	"id"	INTEGER NOT NULL UNIQUE,
	"id_funcionario"	TEXT NOT NULL,
	"qde"	INTEGER NOT NULL DEFAULT 0,
	"estah_vigente"	INTEGER NOT NULL DEFAULT 1,
	"dt_termino"	TEXT,
	PRIMARY KEY("id" AUTOINCREMENT)
);

--criacao da tabela tb_configuracao
CREATE TABLE "tb_configuracao" (
	"habilitar_promocao_locacao_individual"	INTEGER NOT NULL DEFAULT 0,
	"habilitar_promocao_locacao_periodo"	INTEGER NOT NULL DEFAULT 0,
	"qde_locacao_individual"	INTEGER NOT NULL DEFAULT 5,
	"qde_locacao_periodo"	INTEGER NOT NULL DEFAULT 20,
	"valor_locacao"	REAL NOT NULL DEFAULT 0,
	"valor_multa"	REAL NOT NULL DEFAULT 0
);

-- criacao da tabela tb_locacao
CREATE TABLE "tb_locacao" (
	"id"	INTEGER NOT NULL UNIQUE,
	"id_cliente"	INTEGER NOT NULL,
	"id_funcionario"	INTEGER NOT NULL,
	"id_cupom_desconto"	INTEGER,
	"id_multa"	INTEGER,
	"id_pagamento"	INTEGER,
	"valor_base"	REAL NOT NULL DEFAULT 0,
	"valor_multa"	REAL NOT NULL DEFAULT 0,
	"valor_desconto"	REAL NOT NULL DEFAULT 0,
	"valor_total"	REAL NOT NULL DEFAULT 0,
	"data_locacao"	TEXT NOT NULL DEFAULT '',
	"data_entrega"	TEXT NOT NULL,
	"id_devolucao"	INTEGER,
	PRIMARY KEY("id" AUTOINCREMENT)
);

-- criacao da tabela tb_item_locacao
CREATE TABLE "tb_item_locacao" (
	"id"	INTEGER NOT NULL UNIQUE,
	"id_locacao"	INTEGER NOT NULL,
	"id_item_acervo"	INTEGER NOT NULL,
	"valor"	REAL NOT NULL DEFAULT 0,
	PRIMARY KEY("id" AUTOINCREMENT)
);

-- criacao da tabela tb_multa
CREATE TABLE "tb_multa" (
	"id"	INTEGER NOT NULL UNIQUE,
	"data"	TEXT NOT NULL,
	"valor"	REAL,
	"status"	INTEGER NOT NULL DEFAULT 1,
	"data_cancelamento"	TEXT,
	"motivo_cancelamento"	TEXT,
	PRIMARY KEY("id" AUTOINCREMENT)
);

-- criacao da tabela tb_pagamento
CREATE TABLE "tb_pagamento" (
	"id"	INTEGER NOT NULL UNIQUE,
	"id_locacao"	INTEGER NOT NULL,
	"valor_locacao"	REAL NOT NULL DEFAULT 0,
	"valor_multa"	REAL NOT NULL DEFAULT 0,
	"valor_desconto"	REAL NOT NULL DEFAULT 0,
	"data"	TEXT NOT NULL,
	"status"	INTEGER NOT NULL DEFAULT 1,
	"data_cancelamento"	TEXT,
	"motivo_cancelamento"	TEXT,
	PRIMARY KEY("id" AUTOINCREMENT)
);

-- criacao da tabela tb_devolucao
CREATE TABLE "tb_devolucao" (
	"id"	INTEGER NOT NULL UNIQUE,
	"dt_devolucao"	TEXT NOT NULL,
	"id_funcionario"	INTEGER NOT NULL,
	PRIMARY KEY("id" AUTOINCREMENT)
);









-- inserindo as midias disponíveis para cadastro
INSERT INTO "main"."tb_midia" ("id", "nome", "descricao") VALUES ('1', 'VHS', 'Fita de Vídeo Cassete');
INSERT INTO "main"."tb_midia" ("id", "nome", "descricao") VALUES ('2', 'DVD', 'Disco ótico');

-- inserindo as opções de status da mídia
INSERT INTO "main"."tb_situacao_item_acervo" ("id", "nome", "descricao") VALUES ('1', 'Cadastrado', 'O item foi registrado mas ainda não pode ser empresatado');
INSERT INTO "main"."tb_situacao_item_acervo" ("id", "nome", "descricao") VALUES ('2', 'Disponível para locação', 'O item pode ser emprestado');
INSERT INTO "main"."tb_situacao_item_acervo" ("id", "nome", "descricao") VALUES ('3', 'Em Manutenção', 'O item não pode ser emprestado porque está em manutenção');
INSERT INTO "main"."tb_situacao_item_acervo" ("id", "nome", "descricao") VALUES ('4', 'Baixado', 'O item nao está mais disponível pra empréstimo porque está inutilizável');

-- inserindo as configuracoes do sistema
INSERT INTO "main"."tb_configuracao" ("habilitar_promocao_locacao_individual", "habilitar_promocao_locacao_periodo", "qde_locacao_individual", "qde_locacao_periodo",'valor_locacao','valor_multa') VALUES ('0', '0', '5', '20','3.5','1.0');

-- inserindo usuário administrador
INSERT INTO "main"."tb_usuario" ("id", "login", "senha", "status", "id_funcionario", "eh_administrador") VALUES ('1', 'admin', 'admin', '1', '0', '1');

