<?php

include "../config/database/conexao.php";

function localidadesTodas() {
    try {
        global $conexao;

        $conexao->beginTransaction();

        $sql = 
            "SELECT 
                l.id,
                l.descricao as ds_localidade,
                l.id_setor,
                s.descricao as ds_setor
            FROM 
                localidades l
            JOIN setores s ON s.id = l.id_setor";

        $consulta = $conexao->prepare($sql);
        $consulta->execute();
    
        $localidades = $consulta->fetchAll(PDO::FETCH_ASSOC);
    
        $conexao->commit();

        return sucesso(count($localidades) ? $localidades : []);
    
    } catch(PDOException $erro) {
        $conexao->rollback();

        return falha($erro, 500);
    }
}

function localidadesID($params) {
    try {
        global $conexao;

        $conexao->beginTransaction();

        $sql = 
            "SELECT 
                l.id,
                l.descricao as ds_localidade,
                l.id_setor,
                s.descricao as ds_setor
            FROM 
                localidades l
            JOIN setores s ON s.id = l.id_setor
            WHERE 
                l.id = :id";

        $consulta = $conexao->prepare($sql);
        $consulta->execute($params);
    
        $localidade = $consulta->fetch(PDO::FETCH_ASSOC);
    
        $conexao->commit();

        return sucesso($localidade ? $localidade : []);
    
    } catch(PDOException $erro) {
        $conexao->rollback();
        
        return falha($erro, 500);
    }
}

function localidadesInserir($params) {
    try {
        global $conexao;

        $conexao->beginTransaction();

        $sql = 
            "INSERT INTO localidades
            (
                descricao,
                id_setor
            ) VALUES 
            (
                upper(:descricao),
                :id_setor
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

function localidadesAtualizar($params) {
    try {
        global $conexao;

        $conexao->beginTransaction();

        $sql = 
            "UPDATE 
                localidades
            SET
                descricao = upper(:descricao),
                id_setor = :id_setor
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

function localidadesApagar($params) {
    try {
        global $conexao;

        $conexao->beginTransaction();

        $sql = "DELETE FROM localidades WHERE id = :id";

        $consulta = $conexao->prepare($sql);
        $consulta->execute($params);
        
        $conexao->commit();

        return sucesso(true);
    
    } catch(PDOException $erro) {
        $conexao->rollback();

        return falha($erro, 500);
    }
}
