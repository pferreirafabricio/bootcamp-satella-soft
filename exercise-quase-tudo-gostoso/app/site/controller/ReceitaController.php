<?php

namespace app\site\controller;

use app\core\Controller;

use app\site\entitie\Receita;
use app\site\model\ReceitaModel;

class ReceitaController extends Controller
{

    private $receitaModel;

    public function __construct()
    {
        $this->receitaModel = new ReceitaModel();
    }

    /*### VIEW ###*/
    public function nova()
    {
        $this->view('receita/nova', []);
    }

    public function ver()
    {
        $id = get('id', FILTER_SANITIZE_NUMBER_INT);

        if ($id <= 1) {
            $this->showMessage('Receita inválida', 'A receita que voccê procura não foi encontrada.');
            return;
        }

        $receita = $this->receitaModel->readById($id);

        if ($receita === null || $receita->getId() === null) {
            $this->showMessage('Receita inválida', 'A receita que você procura não foi encontrada.');
            return;
        }

        $tags = explode(',', $receita->getTags());

        $this->view('receita/ver', [
            'receita' => $receita,
            'tags' => $tags,
            'id' => $id
        ]);
    }

    public function editar()
    {
        $id = get('id', FILTER_SANITIZE_NUMBER_INT);

        $this->view('receita/editar', [
            'receita' => $this->receitaModel->readById($id)
        ]);
    }

    public function busca()
    {
        $termo = strtolower(get('termo'));
        $termo = substr($termo, 0, 30);

        if (strlen($termo) <= 2 || strlen($termo) > 30) {
            $this->showMessage('Termo inválido', 'O termo que você procura é curto ou grande demais');
            return;
        }

        $receitas = $this->receitaModel->readByterm($termo);

        $this->view('receita/busca', [
            'receitas'       => arrayTree($receitas),
            'totalResultado' => count($receitas)
        ]);
    }

    /*### INTERNAL ###*/

    public function insert()
    {
        $receita = $this->getInput();

        $result = $this->receitaModel->insert($receita);

        if ($result <= 0) {
            $this->showMessage('Erro', 'Houve um erro ao tentar cadastrar, tente novamente mais tarde.');
            return;
        }

        redirect(BASE . '?url=editar&id=' . $result);
    }

    public function delete()
    {
        $id = get('id', FILTER_SANITIZE_NUMBER_INT);

        if (!$this->receitaModel->delete($id)) {
            $this->showMessage('Erro', 'Houve um erro ao tentar deletar, tente novamente mais tarde.');
            return;
        }

        redirect(BASE);
    }

    public function update()
    {
        $receita = $this->getInput();

        if (!$this->receitaModel->update($receita)) {
            $this->showMessage('Erro', 'Houve um erro ao tentar cadastrar, tente novamente mais tarde.');
            return;
        }

        redirect(BASE . '?url=editar&id=' . get('id'));
    }

    private function getInput()
    {
        return new Receita(
            get('id'),
            post('txtTitulo'),
            post('txtConteudo', FILTER_SANITIZE_SPECIAL_CHARS),
            null,
            post('txtTags'),
            getCurrentDate()
        );
    }
}
