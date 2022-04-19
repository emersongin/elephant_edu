<?php

require_once "../config/database/conexao.php";

function setoresTodas() {
    try {
        global $conexao;

        $conexao->beginTransaction();

        $sql = 
            "SELECT 
                s.id,
                s.descricao as ds_setor
            FROM 
                setores s";

        $consulta = $conexao->prepare($sql);
        $consulta->execute();
    
        $setores = $consulta->fetchAll(PDO::FETCH_ASSOC);
    
        $conexao->commit();

        return sucesso(count($setores) ? $setores : []);
    
    } catch(PDOException $erro) {
        $conexao->rollback();

        return falha($erro, 500);
    }
}

function setoresID($params) {
    try {
        global $conexao;

        $conexao->beginTransaction();

        $sql = 
            "SELECT 
                s.id,
                s.descricao as ds_setor
            FROM 
                setores s
            WHERE
                s.id = :id";

        $consulta = $conexao->prepare($sql);
        $consulta->execute($params);
    
        $setor = $consulta->fetch(PDO::FETCH_ASSOC);
    
        $conexao->commit();

        return sucesso(count($setor) ? $setor : []);
    
    } catch(PDOException $erro) {
        $conexao->rollback();

        return falha($erro, 500);
    }

}

function setoresInserir($params) {
    try {
        global $conexao;

        $conexao->beginTransaction();

        $sql = 
            "INSERT INTO setores
            (
                descricao
            ) VALUES 
            (
                upper(:descricao)
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

function setoresAtualizar($params) {
    try {
        global $conexao;

        $conexao->beginTransaction();

        $sql = 
            "UPDATE 
                setores
            SET
                descricao = upper(:descricao)
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

function setoresApagar($params) {
    try {
        global $conexao;

        $conexao->beginTransaction();

        $sql = "DELETE FROM setores WHERE id = :id";

        $consulta = $conexao->prepare($sql);
        $consulta->execute($params);
        
        $conexao->commit();

        return sucesso(true);
    
    } catch(PDOException $erro) {
        $conexao->rollback();

        return falha($erro, 500);
    }
}
