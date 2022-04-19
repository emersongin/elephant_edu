<?php

require_once "../config/database/conexao.php";

function visitasTodas($params) {
	try {
		global $conexao;

		$conexao->beginTransaction();

		$where = '';

		if(isset($params['id']) && (!isset($params['id_perfil']) || $params['id_perfil'] != 1)) {
			$where = "WHERE v.id_usuario = :id";

		} else {
			if(isset($params['id'])) unset($params['id']);
			
		}
		
		if(isset($params['id_perfil'])) unset($params['id_perfil']);

		$sql = 
			"SELECT 
				v.id, 
				v.qtd_alunos,
				v.conteudo,
				v.professor,
				v.telefone,
				v.data_visita,
				DATE_FORMAT(v.data_visita, '%d/%m/%Y') as data_visita_formatada, 
				v.criado_em,
				DATE_FORMAT(v.criado_em, '%d/%m/%Y') as criado_em_formatada, 
				u.nome as nm_usuario,
				u.cpf as cpf_usuario,
				u.telefone as telefone_usuario,
				v.id_setor,
				s.descricao as ds_setor_visita,
				e.nome as nm_escola,
				e.responsavel as nm_responsavel
			FROM 
				visitas v
			JOIN usuarios u ON u.id = v.id_usuario
			JOIN setores s ON s.id = v.id_setor
			JOIN escolas e ON e.id = v.id_escola
			{$where}";

		$consulta = $conexao->prepare($sql);
		$consulta->execute($params);

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
				v.qtd_alunos,
				v.conteudo, 
				v.professor, 
				v.telefone,
				v.data_visita,
				DATE_FORMAT(v.data_visita, '%d/%m/%Y') as data_visita, 
				v.criado_em,
				DATE_FORMAT(v.criado_em, '%d/%m/%Y') as criado_em_formatada,
				u.nome as nm_usuario,
				u.cpf as cpf_usuario,
				u.telefone as telefone_usuario,
				v.id_setor,
				s.descricao as ds_setor_visita,
				e.nome as nm_escola,
				e.responsavel as nm_responsavel
			FROM 
				visitas v
			JOIN usuarios u ON u.id = v.id_usuario
			JOIN setores s ON s.id = v.id_setor
			JOIN escolas e ON e.id = v.id_escola
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
				id_usuario,
				id_escola,
				id_setor,
				qtd_alunos,
                professor,
                telefone,
                data_visita,
				conteudo				
            ) VALUES 
            (
				:id_usuario,
                :id_escola,
				:id_setor,
				:qtd_alunos,
                upper(:professor),
                :telefone,
                :data_visita,
				:conteudo
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
				id_setor = :id_setor,
				qtd_alunos = :qtd_alunos,
				professor = upper(:professor),
				telefone = :telefone,
				data_visita = :data_visita,
                conteudo = :conteudo
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

		return sucesso(true);

	} catch(PDOException $erro) {
		$conexao->rollback();

		return falha($erro, 500);
	}
}
