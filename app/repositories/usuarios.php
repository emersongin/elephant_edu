<?php

include "../config/database/conexao.php";

function usuariosTodas($params) {
    try {
        global $conexao;

        $conexao->beginTransaction();

        $sql = 
            "SELECT
                u.id,
                u.nome,
                u.cpf,
                u.telefone,
                u.id_perfil,
                p.descricao as ds_perfil
            FROM
                usuarios u
            JOIN perfis p ON p.id = u.id_perfil
            WHERE
                u.id <> :id_user";

        $consulta = $conexao->prepare($sql);
        $consulta->execute($params);
    
        $usuarios = $consulta->fetchAll(PDO::FETCH_ASSOC);
    
        $conexao->commit();

        return sucesso(count($usuarios) ? $usuarios : []);
    
    } catch(PDOException $erro) {
        $conexao->rollback();

        return falha($erro, 500);
    }
}

function usuariosID($params) {
    
    try {
        global $conexao;

        $conexao->beginTransaction();

        $sql = 
            "SELECT
                u.id,
                u.nome,
                u.cpf,
                u.telefone,
                u.id_perfil,
                p.descricao as ds_perfil
            FROM
                usuarios u
            JOIN perfis p ON p.id = u.id_perfil
            WHERE
                u.id = :id";

        $consulta = $conexao->prepare($sql);
        $consulta->execute($params);
    
        $usuario = $consulta->fetch(PDO::FETCH_ASSOC);
    
        $conexao->commit();

        return sucesso($usuario ? $usuario : []);
    
    } catch(PDOException $erro) {
        $conexao->rollback();

        return falha($erro, 500);
    }
}

function usuariosInserir($params) {
    try {
        global $conexao;

        $conexao->beginTransaction();

        $sql = 
            "INSERT INTO usuarios
            (
                nome,
                cpf,
                senha,
                telefone,
                id_perfil
            ) VALUES 
            (
                :nome,
                :cpf,
                :senha,
                :telefone,
                :id_perfil
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

function usuariosAtualizar($params) {

    try {
        global $conexao;

        $conexao->beginTransaction();

        $sql = 
            "UPDATE 
                usuarios
            SET
                nome      = :nome,
                cpf       = :cpf,
                telefone  = :telefone,
                id_perfil = :id_perfil
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

function usuariosApagar($params) {
    try {
        global $conexao;

        $conexao->beginTransaction();

        $sql = "DELETE FROM usuarios WHERE id = :id";

        $consulta = $conexao->prepare($sql);
        $consulta->execute($params);
        
        $conexao->commit();

        return sucesso(true);
    
    } catch(PDOException $erro) {
        $conexao->rollback();

        return falha($erro, 500);
    }
}
