<?php

/**
 * Exibe o parâmetro em forma estruturada e encerra a aplicação.
 *
 * @param  mixed $param Parâmetro a ser analisado
 * @return void
 */
function dd($param = [])
{
    echo '<pre>';
    print_r($param);
    echo '</pre>';

    die();
}

/**
 * Trata um CPF, Removendo os pontos e o traço.
 *
 * @param  string $cpf CPF com máscara.
 * @return string retorna os números do CPF apenas.
 */
function trataCPF(string $cpf = '')
{
    if (trim($cpf) == '')
        return null;

    return str_replace([
        '.',
        '-'
    ], '', $cpf);
}

/**
 * Verifica se o CPF é válido.
 * https://gist.github.com/rafael-neri/ab3e58803a08cb4def059fce4e3c0e40
 * @param  string $cpf CPF com máscara ou sem.
 * @return bool Retorna true se o CPF for válido, ou false em caso contrário.
 */
function validaCPF($cpf)
{
    // Extrai somente os números
    $cpf = preg_replace('/[^0-9]/is', '', $cpf);

    // Verifica se foi informado todos os digitos corretamente
    if (strlen($cpf) != 11) {
        return false;
    }

    // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
    if (preg_match('/(\d)\1{10}/', $cpf)) {
        return false;
    }

    // Faz o calculo para validar o CPF
    for ($t = 9; $t < 11; $t++) {
        for ($d = 0, $c = 0; $c < $t; $c++) {
            $d += $cpf[$c] * (($t + 1) - $c);
        }
        $d = ((10 * $d) % 11) % 10;
        if ($cpf[$c] != $d) {
            return false;
        }
    }
    return true;
}

/**
 * Grava um texto no arquivo informado.
 *
 * @param  string $path Caminho para o arquivo
 * @param  string $data Conteúdo do arquivo
 * @param  string $mode Modo de escrita.
 * @return void
 */
function gravar(string $path, string $data, string $mode = 'w')
{
    $fp = fopen($path, $mode);
    fwrite($fp, $data);
    fclose($fp);
}

/**
 * Lê um arquivo através do seu caminho completo.
 *
 * @param  string $path Caminho completo do arquivo
 * @param  string $mode Modo de leitura do arquivo
 * @return string Retorna o texto armazenado no arquivo
 */
function ler(string $path, string $mode = 'r')
{
    $fp = fopen($path, $mode);
    $content = fread($fp, filesize($path));
    fclose($fp);

    return $content;
}

/**
 * Verifica se o diretório não existe e o diretório
 *
 * @param  string $path Caminho do diretório
 * @return void
 */
function criarDiretorio(string $path)
{
    if (!is_dir($path))
        mkdir($path);
}

/**
 * Protege um método de ser acessado. Em caso de redirecionamento, envia o usuário para a root do projeto.
 *
 * @return void
 */
function security()
{
    if (!isset($_SESSION['logado']) || !$_SESSION['logado']) {
        header('Location: ' . BASE);
    }

    if (!isset($_SESSION['ip']) || $_SESSION['ip'] != $_SERVER['REMOTE_ADDR']) {
        header('Location: ' . BASE);
    }
}
