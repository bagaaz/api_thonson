<?php

namespace App\Helpers;

class Helper
{
    public static function getNivelAcesso($nivelAcessoId)
    {
        switch ($nivelAcessoId) {
            case 1:
                return 'Administrador';
            case 2:
                return 'Suporte';
            case 3:
                return 'Usuário';
            default:
                return 'Nível de acesso inválido';
        }
    }

    public static function getStatus($statusId)
    {
        switch ($statusId) {
            case 1:
                return 'Aberto';
            case 2:
                return 'Em andamento';
            case 3:
                return 'Fechado';
            default:
                return 'Status inválido';
        }
    }

    public static function getPrioridade($prioridadeId)
    {
        switch ($prioridadeId) {
            case 1:
                return 'Baixa';
            case 2:
                return 'Média';
            case 3:
                return 'Alta';
            case 4:
                return 'Crítica';
            default:
                return 'Prioridade inválida';
        }
    }

    public static function formataCPF($cpf)
    {
        return substr($cpf, 0, 3) . '.' . substr($cpf, 3, 3) . '.' . substr($cpf, 6, 3) . '-' . substr($cpf, 9, 2);
    }

    public static function formataTelefone($telefone)
    {
        return '(' . substr($telefone, 0, 2) . ') ' . substr($telefone, 2, 5) . '-' . substr($telefone, 7, 4);
    }

    public static function formataData($data)
    {
        return substr($data, 8, 2) . '/' . substr($data, 5, 2) . '/' . substr($data, 0, 4);
    }

    public static function formataDataHora($dataHora)
    {
        return substr($dataHora, 8, 2) . '/' . substr($dataHora, 5, 2) . '/' . substr($dataHora, 0, 4) . ' ' . substr($dataHora, 11, 5);
    }

    public static function mascaraNumeros($numeros, $template) {
        $resultado = "";
        $indice_template = 0;
        $indice_numeros = 0;

        while ($indice_template < strlen($template) && $indice_numeros < strlen($numeros)) {
          if ($template[$indice_template] == '#') {
            $resultado .= $numeros[$indice_numeros];
            $indice_numeros++;
          } else {
            $resultado .= $template[$indice_template];
          }
          $indice_template++;
        }

        return $resultado;
    }

    public static function formataRealBrasileiro($valor)
    {
        return "R$ " . number_format($valor, 2, ',', '.');
    }
}
