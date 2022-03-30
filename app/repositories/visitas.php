<?php

include "../config/database/conexao.php";

function visitasTodas() {

      try {
        global $conexao;

        $conexao->beginTransaction();

        $sql = 
            "SELECT
                v.id,
                v.id_usuario,
                v.id_setor,
                v.id_escola,
                v.qtd_alunos,
                v.conteudo,
                v.professor,
                v.telefone,
                v.data,
                v.criado_em
            FROM
                visitas v
            JOIN usuarios u ON u.id = u.id_perfil";

        $consulta = $conexao->prepare($sql);
        $consulta->execute();

        $visitas = $consulta->fetchAll(PDO::FETCH_ASSOC);

        $conexao->commit();

        return sucesso(count($visitas) ? $visitas : []);

    } catch(PDOException $erro) {
        $conexao->rollback();

        return falha($erro, 500);
    }
}

function visitasID($params) {
      
  try {
        global $conexao;

        $conexao->beginTransaction();

        $sql = 
            "SELECT
                v.id,
                v.id_usuario,
                v.id_setor,
                v.id_escola,
                v.qtd_alunos,
                v.conteudo,
                v.professor,
                v.telefone,
                v.data,
                v.criado_em
            FROM
                visitas v
            JOIN perfis p ON p.id = u.id_perfil
            WHERE
                u.id = :id";

        $consulta = $conexao->prepare($sql);
        $consulta->execute($params);

        $visitas = $consulta->fetch(PDO::FETCH_ASSOC);

        $conexao->commit();

        return sucesso($visitas ? $visitas : []);

    } catch(PDOException $erro) {
        $conexao->rollback();

        return falha($erro, 500);
    }
}

function visitasInserir($params) {

}

function visitasAtualizar($params) {

}

function visitasApagar($params) {

      try {
        global $conexao;

        $conexao->beginTransaction();

        $sql = "DELETE FROM visitas WHERE id = :id";

        $consulta = $conexao->prepare($sql);
        $consulta->execute($params);
        
        $conexao->commit();

        return sucesso(true, 204);

    } catch(PDOException $erro) {
        $conexao->rollback();

        return falha($erro, 500);
    }
}
