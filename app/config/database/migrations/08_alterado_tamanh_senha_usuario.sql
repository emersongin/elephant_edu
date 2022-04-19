ALTER TABLE `usuarios` CHANGE `senha` `senha` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;
ALTER TABLE `elephant_edu`.`usuarios` ADD UNIQUE `nome_usuario_unico` (`nome`);