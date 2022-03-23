CREATE TABLE escolas ( 
    id int AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255),
    id_responsavel int,
    id_localidade int
);

CREATE TABLE localidades ( 
    id int AUTO_INCREMENT PRIMARY KEY,
    descricao VARCHAR(255),
    id_setor int 
);

CREATE TABLE setores ( 
    id int AUTO_INCREMENT PRIMARY KEY,
    descricao VARCHAR(255)
);

CREATE TABLE visitas ( 
    id int AUTO_INCREMENT PRIMARY KEY,
	id_usuario INT,
    id_setor INT,
    id_escola INT,
    qtd_alunos INT,
    conteudo TEXT,
    professor VARCHAR(255),
    telefone VARCHAR(255),
    data_visita DATE,
    criado_em DATE DEFAULT CURRENT_DATE
);

ALTER TABLE `escolas` ADD FOREIGN KEY (`id_localidade`) REFERENCES `localidades`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT; ALTER TABLE `escolas` ADD FOREIGN KEY (`id_responsavel`) REFERENCES `usuarios`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `localidades` ADD FOREIGN KEY (`id_setor`) REFERENCES `setores`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `visitas` ADD FOREIGN KEY (`id_escola`) REFERENCES `escolas`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT; ALTER TABLE `visitas` ADD FOREIGN KEY (`id_setor`) REFERENCES `setores`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT; ALTER TABLE `visitas` ADD FOREIGN KEY (`id_usuario`) REFERENCES `usuarios`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;