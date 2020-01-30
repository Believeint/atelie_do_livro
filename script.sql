CREATE TABLE IF NOT EXISTS `usuario`(
	`id` INT(11) NOT NULL AUTO_INCREMENT,
    `nome` VARCHAR(80) NOT NULL,
    `nome_usuario` VARCHAR(20) NOT NULL,
    `senha` VARCHAR(64) NOT NULL,
    `salt` VARCHAR(32) NOT NULL,
    `data_cadastro` DATETIME NOT NULL,
    `grupo` INT(11) NOT NULL,
    PRIMARY KEY(`id`)
) ENGINE=INNODB DEFAULT CHARSET=LATIN1 AUTO_INCREMENT=16;

CREATE TABLE IF NOT EXISTS `grupo`(
	`id` INT(11) NOT NULL AUTO_INCREMENT,
    `nome` VARCHAR(20) NOT NULL,
    `permissao` TEXT NOT NULL,
    PRIMARY KEY(`id`)
) ENGINE=INNODB DEFAULT CHARSET=LATIN1;

CREATE TABLE IF NOT EXISTS `sessao_usuario`(
	`id` INT(11) NOT NULL AUTO_INCREMENT,
    `id_usuario` INT(11) NOT NULL,
    `hash` VARCHAR(64) NOT NULL,
    PRIMARY KEY(`id`)
) ENGINE=INNODB DEFAULT CHARSET=LATIN1;

CREATE TABLE IF NOT EXISTS `clientes`(
	`id` INT(11) NOT NULL AUTO_INCREMENT,
    `razao_social` VARCHAR(120) NOT NULL,
    `cnpj` VARCHAR(20) NOT NULL,
    `inscricao_estadual` VARCHAR(15) NOT NULL,
    `logradouro` VARCHAR(100) NOT NULL,
    `numero` VARCHAR(10) NOT NULL,
    `complemento` VARCHAR(100) NULL,
    `bairro` VARCHAR(50) NOT NULL,
    `municipio` VARCHAR(50) NOT NULL,
    `uf` VARCHAR(20) NOT NULL,
    `cep` VARCHAR(20) NOT NULL,
    `pais` VARCHAR(30) NOT NULL,
    `fone` VARCHAR(20) NOT NULL,
    `email` VARCHAR(30) NOT NULL,
    PRIMARY KEY(`id`)
) ENGINE=INNODB DEFAULT CHARSET=LATIN1 AUTO_INCREMENT=1;


INSERT INTO `grupo`(`id`,`nome`,`permissao`) VALUES
(1, 'PADRAO', ''),
(2, 'ADMINISTRADOR','{\r\n"admin":1 , \r\n"moderador":1\r\n }' );

INSERT INTO `usuario` (`id`, `nome`, `nome_usuario`, `senha`, `salt`, `data_cadastro`, `grupo`) VALUES
('1', 'Elias Carvalho dos Santos', 'elias.santos', 'elias37145', '123', '2020-01-19 04:24:14', '1');
