--
-- inserindo dados na tabela `perfis`
--

INSERT INTO 
    `perfis` 
(
    `id`, 
    `descricao`
) VALUES (
    1, 
    'administrador'
),
(
    2, 
    'coordenador'
);

-- exemplo de JOIN com tabela usuarios

SELECT
	u.*,
    p.*
FROM
	usuarios u
JOIN perfis p ON p.id = u.id_perfil