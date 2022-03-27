<?php

include_once "../config/database/conexao.php";

function escolaTodas() {
    try {
        global $conexao;

        $conexao->beginTransaction();

        $sql = 
            "SELECT
                e.id,
                e.nome as nm_escola,
                e.id_responsavel,
                u.nome as nm_responsavel,
                e.id_localidade,
                l.descricao as ds_localidade,
                s.descricao  as ds_setor
            FROM
                escolas e
            JOIN usuarios u ON u.id = e.id_responsavel
            JOIN localidades l ON l.id = e.id_localidade
            JOIN setores s ON s.id = l.id_setor";

        $consulta = $conexao->prepare($sql);
        $consulta->execute();
    
        $escolas = $consulta->fetchAll(PDO::FETCH_ASSOC);
    
        $conexao->commit();

        return sucesso($escolas ? $escolas : []);
    
    } catch(PDOException $erro) {
        $conexao->rollback();

        return falha($erro, 500);
    }
}

function escolaID($params) {
    try {
        global $conexao;

        $conexao->beginTransaction();

        $sql = 
            "SELECT
                e.id,
                e.nome as nm_escola,
                e.id_responsavel,
                u.nome as nm_responsavel,
                e.id_localidade,
                l.descricao as ds_localidade,
                s.descricao  as ds_setor
            FROM
                escolas e
            JOIN usuarios u ON u.id = e.id_responsavel
            JOIN localidades l ON l.id = e.id_localidade
            JOIN setores s ON s.id = l.id_setor
            WHERE
                e.id = :id";

        $consulta = $conexao->prepare($sql);
        $consulta->execute($params);
    
        $escola = $consulta->fetch(PDO::FETCH_ASSOC);
    
        $conexao->commit();

        return sucesso($escola ? $escola : []);
    
    } catch(PDOException $erro) {
        $conexao->rollback();
        
        return falha($erro, 500);
    }
}

function escolaInserir($params) {
    try {
        global $conexao;

        $conexao->beginTransaction();

        $sql = 
            "INSERT INTO escolas
            (
                nome, 
                id_responsavel, 
                id_localidade
            ) VALUES 
            (
                :nome, 
                :id_responsavel, 
                :id_localidade
            )";

        $consulta = $conexao->prepare($sql);
        $consulta->execute($params);

        $id = $conexao->lastInsertId();
    
        $conexao->commit();

        return sucesso($id, 201);
    
    } catch(PDOException $erro) {
        $conexao->rollback();
        
        return falha($erro, 500);
    }
}

function escolaAtualizar($params) {
    try {
        global $conexao;

        $conexao->beginTransaction();

        $sql = 
            "UPDATE 
                escolas
            SET
                nome = :nome
                id_responsavel = :id_responsavel, 
                id_localidade = :id_localidade
            WHERE
                id = :id";

        $consulta = $conexao->prepare($sql);
        $consulta->execute($params);
    
        $conexao->commit();

        return sucesso(true);
    
    } catch(PDOException $erro) {
        $conexao->rollback();
        
        return falha($erro, 500);
    }
}
