CREATE TABLE `perfis` (
    `id` int(11) NOT NULL,
    `descricao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `login_top`.`perfis` ADD PRIMARY KEY (`id`);

-- excluir tabela perfis!
-- DROP TABLE perfis;