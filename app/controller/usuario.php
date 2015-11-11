<?php

require_once "dao/usuarioDao.php";
require_once "model/usuarioModel.php";

Class Usuario{
    /**
     * @throws Exception
     * @var usuarioDao
     */
    private $usuarioDao;

    /**
     * @throws Exception
     * @var usuarioModel
     */
    private $usuarioModel;


    /**
     * @method __construct
     */
    public  function __construct(){
        //Instanciamos usuarioDao no construtor.
        $this->usuarioDao = new UsuarioDao();
    }

    /**
     * @method doLogin
     * Método responsável por realizar o login do usuario
     */
    public function doLogin(){
        // Criamos um novo usuário, baseado no modelo criado
        $this->usuarioModel = new usuarioModel();

        // Setamos os atributos email e senha com os dados vindos do formulário
        $this->usuarioModel->__set("email", $_POST["usuario"]);
        $this->usuarioModel->__set("senha", $_POST["senha"]);

        // Chamamos o método doLogin de usuarioDao. Esse método retorna booleano por isso,
        // podemos usá-lo como condição no if.
        // Caso seja true, daremos um echo em true para que o javascript visualize esse retorno
        if($this->usuarioDao->doLogin($this->usuarioModel)){
            echo "true";
            return;
        }

        // Caso o método doLogin retorne falso, daremos um echo false para retornar ao javascript.
        echo "false";
        return;
    }
}