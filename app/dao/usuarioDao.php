<?php

require_once "core/database.php";

Class UsuarioDao{
    /**
     * @var $pdo
     */
    private $pdo;

    public function __construct(){
        $this->pdo = Database::getInstance();
    }

    public function save(usuarioModel $usuario){
        //TODO: implement logic to persist usuario in database;
    }

    public function listUsuario(){
        //TODO: implement logic to list usuario from database;
    }

    public function update(usuarioModel $usuario){
        //TODO: implement logic to update usuario in database
    }

    public function delete($id){
        //TODO: implement logic to delete usuario from database;
    }

    public function doLogin(usuarioModel $usuario){
        try{
            // QUERY WHICH WILL BE EXECUTED
            $sql = "SELECT * FROM usuario WHERE email = :email AND senha = :senha LIMIT 0, 1";

            // PREPARING QUERY TO EXECUTION
            $query = $this->pdo->prepare($sql);

            //BINDING VALUES
            $email = $usuario->__get("email");
            $senha = $usuario->__get("senha");

            $query->bindParam("email", $email);
            $query->bindParam("senha", $senha);

            // IF EXECUTION IS OK AND WE FOUND JUST ONE RESULT, LET'S START SESSION, AND TWO SESSION VARIABLES:
            // ONE TO STORE USUARIO ID AND ANOTHER TO SHOW THAT IT IS AN USER LOGGED.
            if($query->execute() && $query->rowCount() == 1){
                session_start();
                $_SESSION["usuario"] = $query->fetch(PDO::FETCH_OBJ);
                $_SESSION["logged"] = true;
                return true; // RETURN TO FINISH EXECUTION IN THIS POINT
            }

            return false;

        }catch (Exception $e){
            throw new Exception("We had an error: " . $e->getMessage(), 1);
        }
    }

}