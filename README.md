 



#tabelas para criar

usuarios
    id << primary >>
    nome
    cpf
    telefone
    senha
    id_perfil << FK perfis >>

perfis
    id << primary >>
    descricao

setores
    id << primary >>
    descricao

localidades
    id << primary >>
    descricao
    id_setores << FK setores >>

escolas
    id << primary >>
    nome
    id_responsavel << FK usuarios >>
    id_localidade << FK localidades >>

visitas
    id << primary >>
    id_usuario << FK usuarios >>
    id_setor << FK setores >>
    id_escola << FK escolas >>
    qtd_alunos
    conteudo
    professor
    telefone
    data
    criado_em


