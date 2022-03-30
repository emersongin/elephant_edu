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
    
        $conexao->commit();

        return $usuario;
    
    } catch(PDOException $erro) {
        $conexao->rollback();

        return falha($erro, 500);
    }
}