ALTER TABLE `escolas` DROP INDEX `id_responsavel`;
ALTER TABLE escolas DROP FOREIGN KEY escolas_ibfk_2`
ALTER TABLE `escolas` CHANGE `id_responsavel` `responsavel` VARCHAR(255) NULL DEFAULT NULL;