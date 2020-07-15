<?php

function dd($param = [])
{
    echo '<pre>';
    print_r($param);
    echo '</pre>';
    die();
}

function get(string $param, $filter = FILTER_SANITIZE_STRING)
{
    return filter_input(INPUT_GET, $param, $filter);
}

function post(string $param, $filter = FILTER_SANITIZE_STRING)
{
    return filter_input(INPUT_POST, $param, $filter);
}

function getCurrentDate(string $type = 'Y-m-d H:i:s')
{
    return date($type);
}

function redirect(string $url)
{
    header('Location: ' . $url);
}

function arrayTree($array, int $maxColumns = 4)
{
    $tempArr  = [];
    $newArr   = [];
    $index    = 0;
    $lastItem = end($array);

    foreach ($array as $item) {
        $tempArr[] = $item;

        $index++;

        if ($index == $maxColumns || $item == $lastItem) {
            $newArr[] =  $tempArr;
            $tempArr = null;
            $index = 0;
        }
    }

    return $newArr;
}


function trataImagem($conteudo)
{
    if ($conteudo === null)
        return null;

    $pattern = '/\[http.+?\]/';

    $data = [];
    preg_match_all($pattern, $conteudo, $data);

    if (!isset($data[0]) || count($data[0]) == 0)
        return $conteudo;

    foreach ($data[0] as $item) {
        
        $url = str_replace(
            ['[', ']'],
            '',
            $item
        );

        $img = '<img src="' . $url . '" alt="Imagem Quase Tudo Gostoso">';

        $conteudo = str_replace($item, $img, $conteudo);
    }

    return $conteudo;
}
