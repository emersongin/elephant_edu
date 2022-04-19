<?php

require_once "../config/database/conexao.php";

function escolasTodas() {
    try {
        global $conexao;

        $conexao->beginTransaction();

        $sql = 
            "SELECT
                e.id,
                e.nome as nm_escola,
                e.responsavel,
                e.id_localidade,
                l.descricao as ds_localidade
            FROM
                escolas e
            JOIN localidades l ON l.id = e.id_localidade";

        $consulta = $conexao->prepare($sql);
        $consulta->execute();
    
        $escolas = $consulta->fetchAll(PDO::FETCH_ASSOC);
    
        $conexao->commit();

        return sucesso(count($escolas) ? $escolas : []);
    
    } catch(PDOException $erro) {
        $conexao->rollback();

        return falha($erro, 500);
    }
}

function escolasID($params) {
    try {
        global $conexao;

        $conexao->beginTransaction();

        $sql = 
            "SELECT
                e.id,
                e.nome as nm_escola,
                e.responsavel,
                e.id_localidade,
                l.descricao as ds_localidade
            FROM
                escolas e
            JOIN localidades l ON l.id = e.id_localidade
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

function escolasInserir($params) {
    try {
        global $conexao;

        $conexao->beginTransaction();

        $sql = 
            "INSERT INTO escolas
            (
                nome, 
                responsavel, 
                id_localidade
            ) VALUES 
            (
                upper(:nome), 
                upper(:responsavel), 
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

function escolasAtualizar($params) {
    try {
        global $conexao;

        $conexao->beginTransaction();

        $sql = 
            "UPDATE 
                escolas
            SET
                nome = upper(:nome),
                responsavel = upper(:responsavel), 
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

function escolasApagar($params) {
    try {
        global $conexao;

        $conexao->beginTransaction();

        $sql = "DELETE FROM escolas WHERE id = :id";

        $consulta = $conexao->prepare($sql);
        $consulta->execute($params);
    
        $escolas = $consulta->fetchAll(PDO::FETCH_ASSOC);
    
        $conexao->commit();

        return sucesso(true);
    
    } catch(PDOException $erro) {
        $conexao->rollback();

        return falha($erro, 500);
    }
}
