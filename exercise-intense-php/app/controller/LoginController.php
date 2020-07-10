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

        // $cpf = $_POST['txtCpf'];
        // die($cpf);

        //Se estiver OK{
        session_start();
        $_SESSION['logado'] = true;
        $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
        setcookie('user_name', 'USER_NAME', time() + 3600, '/');
        header('Location: ' . BASE . '?url=home');
        //}
    }

    public function register()
    {
        // $formData = (object) [
        //     'nome' => filter_input(INPUT_POST, 'txtNome', FILTER_SANITIZE_STRING),
        //     'cpf' => filter_input(INPUT_POST, 'txtCpf', FILTER_SANITIZE_STRING),
        //     'email' => filter_input(INPUT_POST, 'txtEmail', FILTER_SANITIZE_EMAIL),
        //     'nascimento' => filter_input(INPUT_POST, 'txtNascimento', FILTER_SANITIZE_STRING)
        // ];

        $filters = [
            'txtNome' => FILTER_SANITIZE_STRING,
            'txtCpf' => FILTER_SANITIZE_STRING,
            'txtEmail' => FILTER_SANITIZE_STRING,
            'txtNascimento' => FILTER_SANITIZE_STRING,
        ];
        
        $data = filter_input_array(INPUT_POST, $filters);

        $dataUrlEncode = array_map('urlencode', $data);
        $dataStripTags = array_map('strip_tags', $dataUrlEncode);
        $dataTrim = array_map('trim', $dataStripTags);
        $sanitizedData = str_replace(['%', '#'], '', $dataTrim);

        dd($sanitizedData); 

        // if (!$this->validate($sanitizedData)) {
        //     //Exibir mensagem, cria tela...
        //     return;
        // }

        //dados/128411891891
        //$dirPath = DATA_PATH . '/' . trataCPF($formData->cpf);

        //criarDiretorio($dirPath);

        //dados/128411891891/dados.txt
        //$path = $dirPath . '/dados.txt';

        //gravar($path, json_encode($formData));
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
