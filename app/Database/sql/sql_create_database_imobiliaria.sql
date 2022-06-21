/* Cria o banco de dados */
CREATE DATABASE IF NOT EXISTS imobiliaria;
USE imobiliaria;

/* Cria a Tabela de clientes */
CREATE TABLE IF NOT EXISTS `imobiliaria`.`tb_cliente`
(`id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR (255) NOT NULL,
  `email` VARCHAR (255) NULL,
  `telefone` VARCHAR (45) NULL,
  `flag_ativo` INT (2) NOT NULL DEFAULT 1 COMMENT '1 = Ativo\n0 = Inativo',
  `time_stamp` DATETIME NOT NULL DEFAULT now(),
  PRIMARY KEY
(`id`));

/* Cria a Tabela de proprietario */
CREATE TABLE IF NOT EXISTS `imobiliaria`.`tb_proprietario`
(`id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR (255) NOT NULL,
  `email` VARCHAR (255) NULL,
  `telefone` VARCHAR (45) NULL,
  `dia_repasse` INT (10) NOT NULL,
  `flag_ativo` INT (2) NOT NULL DEFAULT 1 COMMENT '1 = Ativo\n0 = Inativo',
  `time_stamp` DATETIME NOT NULL DEFAULT now(),
  PRIMARY KEY
(`id`));

/* Cria a Tabela de imoveis */
CREATE TABLE IF NOT EXISTS `imobiliaria`.`tb_imovel`
(`id` INT NOT NULL AUTO_INCREMENT,
  `rua` VARCHAR (255) NOT NULL,
  `numero` VARCHAR (45) NULL,
  `cep` VARCHAR (45) NULL,
  `cidade` VARCHAR (255) NULL,
  `estado` VARCHAR (45) NULL,
  `proprietario_id` INT NULL,
  `time_stamp` DATETIME NOT NULL DEFAULT now(),
  PRIMARY KEY (`id`),
  CONSTRAINT `proprietario_id`
    FOREIGN KEY (`id`)
    REFERENCES `imobiliaria`.`tb_proprietario`(`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

/* Cria a Tabela de contratos */
CREATE TABLE `imobiliaria`.`tb_contrato` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `imovel_id` INT NULL,
  `cliente_id` INT NULL,
  `proprietario_id` INT NULL,
  `data_inicio` DATE NULL,
  `data_fim` DATE NULL,
  `taxa_administracao` DOUBLE NULL,
  `valor_aluguel` DOUBLE NULL,
  `valor_condominio` DOUBLE NULL,
  `valor_iptu` DOUBLE NULL,
  `time_stamp` DATETIME NULL DEFAULT now(),
  PRIMARY KEY (`id`),
  CONSTRAINT `imovel_id`
    FOREIGN KEY (`id`)
    REFERENCES `imobiliaria`.`tb_imovel` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `cliente_id`
    FOREIGN KEY (`id`)
    REFERENCES `imobiliaria`.`tb_cliente` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `proprietario_id`
    FOREIGN KEY (`id`)
    REFERENCES `imobiliaria`.`tb_proprietario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

/* Cria a Tabela de mensalidades */
CREATE TABLE `imobiliaria`.`tb_mensalidade` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `contrato_id` INT NULL,
  `valor` DOUBLE NULL,
  `data_vencimento` DATE NULL,
  `data_pagamento` DATE NULL,
  `numero_parcela` INT NULL,
  `mes_referencia` INT NULL,
  `ano_referencia` INT NULL,
  `status_pagamento` INT(2) NULL DEFAULT 0,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

/* Cria a Tabela de repasse */
CREATE TABLE `imobiliaria`.`tb_repasse` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `contrato_id` INT NULL,
  `valor` DOUBLE NULL,
  `data_repasse` DATE NULL,
  `numero_repasse` INT NULL,
  `mes_referencia` INT NULL,
  `ano_referencia` INT NULL,
  `status_repasse` INT(2) NULL DEFAULT 0,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;



/* Cria tabela auxiliar de estados*/
CREATE TABLE `imobiliaria`.`tb_estados`
(`id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL,
  `uf` VARCHAR (2) NULL,
  PRIMARY KEY(`id`));

/* INSERE OS ESTADOS DO BRASIL */
insert into tb_estados (nome, uf) values ('ACRE','AC');
insert into tb_estados (nome, uf) value ('ALAGOAS','AL');
insert into tb_estados (nome, uf) value ('AMAPÁ','AP');
insert into tb_estados (nome, uf) value ('AMAZONAS','AM');
insert into tb_estados (nome, uf) value ('BAHIA','BA');
insert into tb_estados (nome, uf) value ('CEARÁ','CE');
insert into tb_estados (nome, uf) value ('DISTRITO FEDERAL','DF');
insert into tb_estados (nome, uf) value ('ESPIRITO SANTO','ES');
insert into tb_estados (nome, uf) value ('GOIÁS','GO');
insert into tb_estados (nome, uf) value ('MARANHÃO','MA');
insert into tb_estados (nome, uf) value ('MATO GROSSO','MT');
insert into tb_estados (nome, uf) value ('MATO GROSSO DO SUL','MS');
insert into tb_estados (nome, uf) value ('MINAS GERAIS','MG');
insert into tb_estados (nome, uf) value ('PARÁ','PA');
insert into tb_estados (nome, uf) value ('PARAIBA','PB');
insert into tb_estados (nome, uf) value ('PARANA','PR');
insert into tb_estados (nome, uf) value ('PERNANBUCO','PE');
insert into tb_estados (nome, uf) value ('PIAUÍ','PI');
insert into tb_estados (nome, uf) value ('RIO GRANDE DO NORTE','RN');
insert into tb_estados (nome, uf) value ('RIO GRANDE DO SUL','RS');
insert into tb_estados (nome, uf) value ('RIO DE JANEIRO','RJ');
insert into tb_estados (nome, uf) value ('RONDÔNIA','RO');
insert into tb_estados (nome, uf) value ('RORAIMA','RR');
insert into tb_estados (nome, uf) value ('SANTA CATARINA','SC');
insert into tb_estados (nome, uf) value ('SÃO PAULO','SP');
insert into tb_estados (nome, uf) value ('SERGIPE','SE');
insert into tb_estados (nome, uf) value ('TOCANTINS','TO');