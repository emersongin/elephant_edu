<?php

include "../config/database/conexao.php";

function autenticacaoUsuario($params) {
    try {
        global $conexao;

        $conexao->beginTransaction();

        $sql = 
            "SELECT
                u.id,
                u.id_perfil
            FROM
                usuarios u
            WHERE
                u.nome = :nome
                AND u.senha = :senha";

        $consulta = $conexao->prepare($sql);
        $consulta->execute($params);
    
        $usuario = $consulta->fetch(PDO::FETCH_ASSOC);

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