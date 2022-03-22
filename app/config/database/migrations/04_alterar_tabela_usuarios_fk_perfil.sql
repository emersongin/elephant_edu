ALTER TABLE `usuarios` CHANGE `tipo` `tipo` INT(50) NOT NULL;
ALTER TABLE `usuarios` CHANGE `tipo` `id_perfil` INT(50) NOT NULL;

ALTER TABLE `usuarios` ADD FOREIGN KEY (`id_perfil`) REFERENCES `perfis`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
