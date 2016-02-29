CREATE TABLE pdo.usuarios (
  id INT(11) NOT NULL AUTO_INCREMENT,
  u_nome VARCHAR(50) NOT NULL,
  u_senha VARCHAR(40) NOT NULL,
  PRIMARY KEY (id),
  UNIQUE INDEX u_nome (u_nome)
)
ENGINE = INNODB
AUTO_INCREMENT = 3
AVG_ROW_LENGTH = 8192
CHARACTER SET utf8
COLLATE utf8_general_ci;
SET NAMES 'utf8';

INSERT INTO `usuarios` VALUES (1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997');
INSERT INTO `usuarios` VALUES (2, 'otavio', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220');
