<?php require_once 'connexionDB.php';

class install extends ConnexionDB  {

    public function install()
    {
        $sql = file_get_contents("/data/database.sql");
        $cnx->exec($sql);
        return $sql->rowCount();
    }


}