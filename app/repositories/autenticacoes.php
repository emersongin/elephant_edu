<?php

include_once "../config/database/conexao.php";

function autenticacaoUsuario($params) {
    try {
        global $conexao;

        $conexao->beginTransaction();

        $params['nome'] = strtolower($params['nome']);

        $sql = 
            "SELECT
                u.id,
                u.nome as nome_usuario,
                u.senha as hash,
                u.id_perfil,
                p.descricao as perfil_usuario
            FROM
                usuarios u
            JOIN perfis p ON p.id = u.id_perfil
            WHERE
                u.nome = :nome";

        $consulta = $conexao->prepare($sql);
        $consulta->execute([
            'nome' => $params['nome']
        ]);
    
        $usuario = $consulta->fetch(PDO::FETCH_ASSOC);

        if(!password_verify($params['senha'], $usuario['hash'])) return false;

        if($usuario) {
            $token = password_hash($params['senha'], PASSWORD_DEFAULT);

            $sql = 
                "UPDATE
                    usuarios u
                SET
                    token = :token
                WHERE
                    u.id = :id
                ";

            $consulta = $conexao->prepare($sql);
            $consulta->execute([
                'id' => $usuario['id'],
                'token' => $token
            ]);

            $usuario['token'] = $token;

        }

        $conexao->commit();

        return $usuario ? $usuario : false;
    
    } catch(PDOException $erro) {
        $conexao->rollback();

        return falha($erro, 500);
    }
}

function autorizacaoToken($params) {
    try {
        global $conexao;

        $conexao->beginTransaction();

        $sql = 
            "SELECT
                COUNT(*) as autorizado
            FROM
                usuarios u
            WHERE
                u.id = :id
                AND u.token = :token
                AND u.id_perfil = :id_perfil";

        $consulta = $conexao->prepare($sql);
        $consulta->execute([
            'id'        => $params['id'],
            'token'     => $params['token'],
            'id_perfil' => $params['id_perfil']
        ]);
    
        $usuario = $consulta->fetch(PDO::FETCH_ASSOC);

        $conexao->commit();

        return $usuario['autorizado'];
    
    } catch(PDOException $erro) {
        $conexao->rollback();

        return falha($erro, 500);
    }
}