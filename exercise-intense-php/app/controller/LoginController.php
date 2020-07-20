<?php

namespace app\controller;

use app\core\Controller;

class loginController extends Controller
{
    //#### VIEW ####
    public function login()
    {
        $this->view('externa/login');
    }

    /**
     * Carrega a view para cadastrar um usuário
     *
     * @return void
     */
    public function cadastro()
    {
        $this->view('externa/cadastro');
    }

    //#### INTERNAL ####
    public function auth()
    {
        $cpf = $_POST['txtCpf'];
        $path = ROOT . BASE . DATA_PATH . '/' . trataCPF($cpf);

        if (!file_exists($path)) {
            $this->view('externa/error', [
                'message' => 'Ooops! Esse CPF não existe em nossa base de dados.'
            ]);
        }
        
        session_start();
        $_SESSION['logado'] = true;
        $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
        setcookie('user_name', 'Diego', time() + 3600, '/');
        header('Location: ' . BASE . '?url=home');
    }

    public function register()
    {
        $filters = [
            'txtNome' => FILTER_SANITIZE_STRING,
            'txtCpf' => FILTER_SANITIZE_STRING,
            'txtEmail' => FILTER_SANITIZE_STRING,
            'txtNascimento' => FILTER_SANITIZE_STRING,
        ];
        
        $data = filter_input_array(INPUT_POST, $filters);

        $dataStripTags = array_map('strip_tags', $data);
        $dataTrim = array_map('trim', $dataStripTags);
        $dataReplace = str_replace(['%', '#'], '', $dataTrim);
        $dataObject = (object) $dataReplace;

        // if (!$this->validate($sanitizedData)) {
        //     //Exibir mensagem, cria tela...
        //     return;
        // }

        if (!file_exists($dirPath = DATA_PATH . '/' . trataCPF($dataObject->txtCpf))) {
            $dirPath = DATA_PATH . '/' . trataCPF($dataObject->txtCpf);
            criarDiretorio($dirPath);

            //dados/128411891891/dados.txt
            $path = $dirPath . '/dados.txt';

            gravar($path, json_encode($data));
        } else {
            $this->view('externa/error', [
                'message' => 'Ooops! Parece que esse CPF já foi cadastrado.'
            ]);
        }
    }

    /**
     * Validate all fields in array
     *
     * @return bool
     */
    private function validate(array $data)
    {
        return true;
    }

    public function logout()
    {
        session_start();
        if (isset($_SESSION['logado'])) {
            session_destroy();
        }

        header('Location: ' . BASE);
    }
}
