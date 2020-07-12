<?php

namespace app\site\entitie;

class Receita
{
    private $id;
    private $titulo;
    private $conteudo;
    private $thumb;
    private $tags;
    private $dataPublicacao;

    public function __construct($id = null, $titulo = '', $conteudo = '', $thumb = null, $tags = '', $dataPublicacao = null)
    {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->conteudo = $conteudo;
        $this->thumb = $thumb;
        $this->tags = $tags;
        $this->dataPublicacao = $dataPublicacao;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function getConteudo()
    {
        return $this->conteudo;
    }

    public function getThumb()
    {
        return $this->thumb;
    }

    public function getTags()
    {
        return $this->tags;
    }

    public function getDataPublicacao()
    {
        return $this->dataPublicacao;
    }
}
