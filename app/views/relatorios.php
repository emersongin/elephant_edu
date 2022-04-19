<?php

    define ('FPDF_FONTPATH','font/');
    require('../assets/lib/fpdf/fpdf.php');

    include_once "../includes/autorizacao.php";
    include_once "../includes/functions.php";
    include_once "../repositories/visitas.php";

    $pdf = new FPDF();

    $pdf->AddPage('L');
    $pdf->SetFont('Arial', 'B', 20, 'C');
    $pdf->Cell(270, 20, utf8_decode('Relatório de Visitas'), 0, 0, "C");
    $pdf->Ln(30);
    $pdf->SetFillColor(211, 211, 211);
    $pdf->SetFont('Arial', 'I', 10);
    $pdf->Cell(50, 14, 'Professor', 1, 0, 'C', TRUE);
    $pdf->Cell(45, 14, 'Telefone', 1, 0, 'C', TRUE);
    $pdf->Cell(45, 14, 'Quantidade de Alunos', 1, 0, 'C', TRUE);
    $pdf->Cell(50, 14, utf8_decode('Escola'), 1, 0, 'C', TRUE);
    $pdf->Cell(45, 14, 'Data da visita', 1, 0, 'C', TRUE);
    $pdf->Cell(40, 14, 'Coordenador', 1, 0, 'C', TRUE);
    $pdf->Ln();

    $visitas = json_decode(visitasTodas([ 
        'id' => $auth_user_id,
        'id_perfil' => $auth_user_id_perfil,
    ]));

    if(is_array($visitas) && count($visitas)) {
        // id, 
        // qtd_alunos,
        // conteudo, 
        // professor, 
        // telefone,
        // data_visita,
        // data_visita_formatada, 
        // criado_em,
        // criado_em_formatada,
        // nome as nm_usuario,
        // cpf as cpf_usuario,
        // telefone as telefone_usuario,
        // id_setor,
        // descricao as ds_setor_visita,
        // nome as nm_escola,
        // responsavel as nm_responsavel

        foreach($visitas as $visita){
            $pdf->Cell(50 ,14 , utf8_decode($visita->professor), 1 ,0, 'C');
            $pdf->Cell(45 ,14 , $visita->telefone, 1 ,0 , 'C');
            $pdf->Cell(45 ,14 , $visita->qtd_alunos, 1 ,0 , 'C');
            $pdf->Cell(50 ,14 , utf8_decode($visita->nm_escola), 1,0, 'C');
            $pdf->Cell(45 ,14 , $visita->data_visita_formatada, 1,0, 'C');
            $pdf->Cell(40 ,14 , utf8_decode($visita->nm_usuario), 1, 0, 'C');
            $pdf->Ln();
        }

    } else {
        $pdf->Cell(275, 14, utf8_decode('nenhuma informação foi obtida até o momento...'), 1, 0, 'C');
        
    }

    $pdf->OutPut();
