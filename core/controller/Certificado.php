<?php

namespace core\controller;

use core\model\Atividade;
use core\model\Evento;
use core\sistema\Util;
use Mpdf\Mpdf;
use Mpdf\MpdfException;

class Certificado {

    /**
     * @return bool
     * @throws MpdfException
     */
    public function gerarCertificado() {

        $converte_mes = [
            '01' => 'Janeiro',
            '02' => 'Fevereiro',
            '03' => 'Março',
            '04' => 'Abril',
            '05' => 'Maio',
            '06' => 'Junho',
            '07' => 'Julho',
            '08' => 'Agosto',
            '09' => 'Setembro',
            '10' => 'Outubro',
            '11' => 'Novembro',
            '12' => 'Dezembro'
        ];

        $data_inicio = '2019-05-22';
        $data_fim = '2019-05-25';

        if ($data_inicio != $data_fim) {

            $di = explode('-', $data_inicio);
            $df = explode('-', $data_fim);

            $periodo = "no período de {$di[2]} a {$df[2]} de {$converte_mes[$df[1]]} de {$df[0]}";
        } else {

            $di = explode('-', $data_inicio);

            $periodo = "na data de {$di[2]} de {$converte_mes[$di[1]]} de {$di[0]}";
        }

        $data_emissao = date('d') . " de " . $converte_mes[date('m')] . " de " . date('Y');

        $dados = [
            'nome' => 'Fulado de Tal da Silva',
            'cpf' => '012.345.678-90',
            'evento' => 'III Semana Acadêmica da Graduação e Pós-Graduação do Campus Ceres',
            'periodo' => $periodo,
            'carga_horaria' => '06',
            'data_emissao' => $data_emissao
        ];

        $html = "<!DOCTYPE html>";
        $html .= "<html lang='pt-br'>";
        $html .= "<head>";
        $html .= "    <meta charset='UTF-8'>";
        $html .= "    <title>Certificado</title>";
        $html .= "</head>";
        $html .= "<body>";
        $html .= "<table>";
        $html .= "    <tr>";
        $html .= "        <td colspan='3' class='center bold fs16 pt10'>MINISTÉRIO DA EDUCAÇÃO</td>";
        $html .= "    </tr>";
        $html .= "    <tr>";
        $html .= "        <td colspan='3' class='center bold fs16'>SECRETARIA DE EDUCAÇÃO PROFISSIONAL E TECNOLÓGICA</td>";
        $html .= "    </tr>";
        $html .= "    <tr>";
        $html .= "        <td colspan='3' class='center bold fs16 pb170'>INSTITUTO FEDERAL DE EDUCAÇÃO, CIÊNCIA E TECNOLOGIA GOIANO<br/> CAMPUS CERES</td>";
        $html .= "    </tr>";
        $html .= "    <tr>";
        $html .= "        <td colspan='3' class='center'>O IF Goiano - Campus Ceres no uso de suas atribuições e em consonância com a legislação vigente certifica que</td>";
        $html .= "    </tr>";
        $html .= "    <tr>";
        $html .= "        <td colspan='3' class='center fs18 p10'>{$dados['nome']}</td>";
        $html .= "    </tr>";
        $html .= "    <tr>";
        $html .= "        <td colspan='3' class='center pb80 lh'>
                            CPF nº {$dados['cpf']}, participou das atividades do(a) {$dados['evento']}, promovido pelo(a) Coordenação de Sistemas
                            de Informação {$dados['periodo']} com carga horária de {$dados['carga_horaria']}h.
                          </td>";
        $html .= "    </tr>";
        $html .= "    <tr>";
        $html .= "        <td colspan='3' class='right pb80'>Ceres - Goiás, {$dados['data_emissao']}</td>";
        $html .= "    </tr>";
        $html .= "    <tr>";
        $html .= "        <td class='center'>Nome</td>";
        $html .= "        <td class='center'>Nome</td>";
        $html .= "        <td class='center'>Nome</td>";
        $html .= "    </tr>";
        $html .= "    <tr>";
        $html .= "        <td class='center pb30'>Cargo/Função</td>";
        $html .= "        <td class='center pb30'>Cargo/Função</td>";
        $html .= "        <td class='center pb30'>Cargo/Função</td>";
        $html .= "    </tr>";
        $html .= "</table>";
        $html .= "</body>";
        $html .= "</html>";

        $config = [
            'mode' => '',
            'format' => 'A4',
            'default_font_size' => 0,
            'default_font' => 14,
            'margin_left' => 10,
            'margin_right' => 10,
            'margin_top' => 10,
            'margin_bottom' => 10,
            'margin_header' => 10,
            'margin_footer' => 10,
            'orientation' => 'L',
        ];

        $pdf = new Mpdf($config);

        $style = file_get_contents(ROOT . 'public_html/assets/css/certificado.css');

        $pdf->WriteHTML($style, 1);
        $pdf->WriteHTML($html);

        $pdf->Output('Certificado.pdf', 'D');

        return true;
    }

    /**
     * @param $params
     * @return bool
     * @throws MpdfException
     */
    public function gerarListaPresenca($params) {
        $evento = new Evento();
        $atividade = new Atividade();
        $presenca = new Presencas();

        $params = json_decode($params['dados'], true);
        $dados_evento = $evento->selecionarEvento($params['evento_id'])[0];
        $dados_atividade = $atividade->selecionarAtividade($params['atividade_id'])[0];
        $participantes = $presenca->listarPresencas([$params['atividade_id'], null], 'nomes');

        $data_atividade = explode(' ', $dados_atividade->datahora_inicio)[0];

        $dados = [
            'participantes' => $participantes,
            'evento' => $dados_evento->nome,
            'atividade' => $dados_atividade->titulo,
            'data' => Util::formataDataBR($data_atividade),
            'responsavel' => $dados_atividade->responsavel
        ];

        $html = "<!DOCTYPE html>";
        $html .= "<html lang='pt-br'>";
        $html .= "<head>";
        $html .= "    <meta charset='UTF-8'>";
        $html .= "    <title>Lista de Presença</title>";
        $html .= "</head>";
        $html .= "<body>";
        $html .= "    <p class='center bold '>Ministério da Educação</p>";
        $html .= "    <p class='center bold '>Secretaria de Educação Profissional e Tecnológica</p>";
        $html .= "    <p class='center bold '>Instituto Federal de Educação, Ciência e Tecnologia Goiano</p>";
        $html .= "    <table class='mt25 mb25 collapse fs14'>";
        $html .= "        <tr class=''>";
        $html .= "            <td colspan='4' class='center '><b>Lista de Presença</b></td>";
        $html .= "        </tr>";
        $html .= "        <tr>";
        $html .= "            <td colspan='1' class=' w100'><b>Evento:</b></td>";
        $html .= "            <td colspan='3' class='left'>{$dados['evento']}</td>";
        $html .= "        </tr>";
        $html .= "        <tr>";
        $html .= "            <td colspan='1' class=' w100'><b>Atividade:</b></td>";
        $html .= "            <td colspan='3' class='left'>{$dados['atividade']}</td>";
        $html .= "        </tr>";
        $html .= "        <tr>";
        $html .= "            <td class=' w100'><b>Responsável:</b></td>";
        $html .= "            <td class='left'>{$dados['responsavel']}</td>";
        $html .= "            <td class=' w100' colspan='1'><b>Data:</b></td>";
        $html .= "            <td class='left w100' colspan='1'>{$dados['data']}</td>";
        $html .= "        </tr>";
        $html .= "    </table>";
        $html .= "    <table class='mb25 collapse fs16'>";
        $html .= "        <tr>";
        $html .= "            <td class='w40 center '><b>#</b></td>";
        $html .= "            <td class='w500 center '><b>Participante</b></td>";
        $html .= "            <td class='w500 center '><b>Assinatura</b></td>";
        $html .= "        </tr>";

        $cont = 1;
        foreach ($dados['participantes'] as $i => $valor) {
            $html .= "        <tr>";
            $html .= "            <td class='center'>{$cont}</td>";
            $html .= "            <td>{$valor->nome}</td>";
            $html .= "            <td colspan='2'></td>";
            $html .= "        </tr>";
            $cont++;
        }

        $html .= "    </table>";
        $html .= "</body>";
        $html .= "</html>";

        $config = [
            'mode' => '',
            'format' => 'A4',
            // 'default_font_size' => 12,
            // 'default_font' => 'dejavusans',
            'margin_left' => 10,
            'margin_right' => 10,
            'margin_top' => 10,
            'margin_bottom' => 10,
            'margin_header' => 10,
            'margin_footer' => 10,
            'orientation' => 'P',
        ];

        $pdf = new Mpdf($config);

        $style = file_get_contents(ROOT . 'public_html/assets/css/lista.css');

        $pdf->WriteHTML($style, 1);
        $pdf->WriteHTML($html);

        $pdf->Output('Lista de Inscritos.pdf', 'D');

        return true;
    }
}
