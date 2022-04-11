<?php

include "../config/database/conexao.php";

function perfisTodas() {
    
    try {
        global $conexao;

        $conexao->beginTransaction();

        $sql = 
            "SELECT
                p.id,
                p.descricao
            FROM
                perfis p";

        $consulta = $conexao->prepare($sql);
        $consulta->execute();
    
        $perfis = $consulta->fetchAll(PDO::FETCH_ASSOC);
    
        $conexao->commit();

        return sucesso(count($perfis) ? $perfis : []);
    
    } catch(PDOException $erro) {
        $conexao->rollback();

        return falha($erro, 500);
    }
}

function perfisID($params) {
    
    try {
        global $conexao;

        $conexao->beginTransaction();

        $sql = 
            "SELECT
                p.id,
                p.descricao
            FROM
                perfis p
            WHERE
                p.id = :id";

        $consulta = $conexao->prepare($sql);
        $consulta->execute($params);
    
        $perfil = $consulta->fetch(PDO::FETCH_ASSOC);
    
        $conexao->commit();

        return sucesso($perfil ? $perfil : []);
    
    } catch(PDOException $erro) {
        $conexao->rollback();

        return falha($erro, 500);
    }
}
