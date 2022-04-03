<?php

include "../config/database/conexao.php";

function visitasTodas() {
	try {
		global $conexao;

		$conexao->beginTransaction();

		$sql = 
			"SELECT 
				v.id, 
				v.conteudo, 
				v.professor, 
				v.telefone,
				v.data_visita, 
				v.criado_em,
				u.nome as nm_usuario,
				u.cpf as cpf_usuario,
				u.telefone as telefone_usuario,
				s.descricao as ds_setor_visita,
				e.nome as nm_escola,
				u2.nome as nm_responsavel,
				u2.cpf as cpf_responsavel,
				u2.telefone as cpf_responsavel,
				l.descricao as ds_localidade_escola,
				s2.descricao as ds_setor_escola 
			FROM 
				visitas v
			JOIN usuarios u ON u.id = v.id_usuario
			JOIN setores s ON s.id = v.id_setor
			JOIN escolas e ON e.id = v.id_escola
			JOIN usuarios u2 ON u2.id = e.id_responsavel
			JOIN localidades l ON l.id = e.id_localidade
			JOIN setores s2 ON s2.id = l.id_setor";

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
				v.conteudo, 
				v.professor, 
				v.telefone,
				v.data_visita, 
				v.criado_em,
				u.nome as nm_usuario,
				u.cpf as cpf_usuario,
				u.telefone as telefone_usuario,
				s.descricao as ds_setor_visita,
				e.nome as nm_escola,
				u2.nome as nm_responsavel,
				u2.cpf as cpf_responsavel,
				u2.telefone as cpf_responsavel,
				l.descricao as ds_localidade_escola,
				s2.descricao as ds_setor_escola 
			FROM 
				visitas v
			JOIN usuarios u ON u.id = v.id_usuario
			JOIN setores s ON s.id = v.id_setor
			JOIN escolas e ON e.id = v.id_escola
			JOIN usuarios u2 ON u2.id = e.id_responsavel
			JOIN localidades l ON l.id = e.id_localidade
			JOIN setores s2 ON s2.id = l.id_setor
			WHERE
				v.id = :id";

		$consulta = $conexao->prepare($sql);
		$consulta->execute($params);

		$visita = $consulta->fetch(PDO::FETCH_ASSOC);

		$conexao->commit();

		return sucesso($visita ? $visita : []);

	} catch(PDOException $erro) {
		$conexao->rollback();

		return falha($erro, 500);
	}
}

function visitasInserir($params) {
	try {
        global $conexao;

        $conexao->beginTransaction();

        $sql = 
            "INSERT INTO visitas
            (
                conteudo,
                professor,
                telefone,
                data_visita,
                criado_em
            ) VALUES 
            (
                :conteudo,
                :professor,
                :telefone,
                :data_visita,
                :criado_em
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

function visitasAtualizar($params) {
	try {
        global $conexao;

        $conexao->beginTransaction();

        $sql = 
            "UPDATE 
                visitas
            SET
                conteudo = :conteudo,
				professor = :professor,
				telefone = :telefone,
				data_visita = :data_visita,
				criado_em = :criado_em
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
