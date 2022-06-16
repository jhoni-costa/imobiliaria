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

/* Cria a Tabela de clientes */
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
