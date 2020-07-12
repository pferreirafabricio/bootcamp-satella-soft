<?php

namespace app\site\model;

use app\core\Model;
use app\site\entitie\Receita;

class ReceitaModel
{

    private $pdo;

    public function __construct()
    {
        $this->pdo = new Model();
    }

    public function insert(Receita $receita)
    {
        $sql = 'INSERT INTO receita (titulo, conteudo, thumb, tags, data_publicacao) VALUES (:titulo, :conteudo, :thumb, :tags, :datapublicacao)';
        $params = [
            ':titulo' => $receita->getTitulo(),
            ':conteudo' => $receita->getConteudo(),
            ':thumb' => $receita->getThumb(),
            ':tags' => $receita->getTags(),
            ':datapublicacao' => $receita->getDataPublicacao()
        ];

        if (!$this->pdo->ExecuteNonQuery($sql, $params))
            return -1;

        return $this->pdo->GetLastID();
    }

    public function update(Receita $receita)
    {
        $sql = 'UPDATE receita SET titulo = :titulo, conteudo = :conteudo, tags = :tags WHERE id = :id';
        $params = [
            ':id' => $receita->getId(),
            ':titulo' => $receita->getTitulo(),
            ':conteudo' => $receita->getConteudo(),
            ':tags' => $receita->getTags()
        ];

        return $this->pdo->ExecuteNonQuery($sql, $params);
    }

    public function delete(int $id)
    {
        $sql = 'DELETE FROM receita WHERE id = :id';
        $params = [
            ':id' => $id
        ];

        return $this->pdo->ExecuteNonQuery($sql, $params);
    }

    public function readById(int $id)
    {
        $sql = 'SELECT * FROM receita WHERE id = :id';
        $param = [
            ':id' => $id
        ];

        return  $this->collection(
            $this->pdo->ExecuteQueryOneRow($sql, $param)
        );
    }

    public function readByTerm(string $termo)
    {
        $termo = strtolower($termo);

        $sql = 'SELECT id, titulo, data_publicacao FROM receita WHERE LOWER(tags) LIKE :tags OR LOWER(titulo) LIKE :titulo';
       
        $params = [
            ':tags' => "%{$termo}%",
            ':titulo' => "%{$termo}%"
        ];
        
        $dt = $this->pdo->ExecuteQuery($sql, $params);
        $list = [];

        foreach ($dt as $dr)
            $list[] = $this->collection($dr);

        return $list;
    }

    public function readLasts(int $quantidade = 20)
    {

        $sql = 'SELECT id, titulo, data_publicacao FROM receita ORDER BY data_publicacao DESC LIMIT :limit';
       
        $params = [
            ':limit' => $quantidade
        ];
        
        $dt = $this->pdo->ExecuteQuery($sql, $params);
        $list = [];

        foreach ($dt as $dr)
            $list[] = $this->collection($dr);

        return $list;
    }

    private function collection($param)
    {
        return new Receita(
            $param['id'] ?? null,
            $param['titulo'] ?? null,
            trataImagem(html_entity_decode($param['conteudo'] ?? null)),
            $param['thumb'] ?? null,
            $param['tags'] ?? null,
            $param['data_publicacao'] ?? null
        );
    }
}
