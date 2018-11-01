<?php

require_once 'connexionDB.php';

class employe extends ConnexionDB  {

	public function getAllEmploye() {
        return $this->cnx->query("SELECT * FROM employes")->fetchAll();
	}

	public function getEmploye($id) {
		$sql = $this->cnx->prepare("SELECT * FROM employes WHERE id=?");
		$sql->execute( array($id) );
		return $sql->fetch();
	}

	public function add($empl)
	{
		$sql = $this->cnx->prepare("INSERT INTO employes (prenom,nom,email,age,ville,pseudo,mdp,type_compte,genre,categorie) 
        VALUES (?,?,?,?,?,?,?,?,?,?)");
		$sql->execute( array($empl['prenom'],$empl['nom'],$empl['email'],$empl['age'],$empl['ville'],$empl['pseudo'],$empl['password'],$empl['type_compte'],$empl['genre'],$empl['categorie']) );
		return $sql->rowCount();
	}

	public function edit($empl,$id)
	{
		$sql = $this->cnx->prepare("UPDATE employes 
                                    SET prenom=?,nom=?,email=?,age=?,ville=?,pseudo=?,mdp=?,genre=?,categorie=?
                                    WHERE id=?");
        $sql->execute( array($empl['prenom'],$empl['nom'],$empl['email'],$empl['age'],$empl['ville'],$empl['pseudo'],$empl['password'],$empl['genre'],$empl['categorie'],$id) );
		return $sql->rowCount();
	}

	public function delete($id)
	{
		$sql = $this->cnx->prepare("DELETE FROM employes WHERE id = ?");
		$sql->execute( array($id) );
		return $sql->rowCount();
	}

	public function login($pseudo, $mdp)
	{
		$sql = $this->cnx->prepare("SELECT id,pseudo,mdp,type_compte FROM employes WHERE pseudo=? AND mdp=?");
		$sql->execute( array($pseudo, $mdp) );
		return $sql->fetch();
	}

	public function trie($categorie)
	{
		$sql = $this->cnx->prepare("SELECT id,prenom,nom,categorie FROM employes WHERE categorie=?");
		$sql->execute( array($categorie) );
		session_start();
		$_SESSION['categorie']=$categorie;
		$res = $sql->fetchAll();
		return $res;
		
	}

	public function ordre($categorie,$by,$AD)
	{
		$sql = $this->cnx->prepare("SELECT id,prenom,nom,categorie FROM employes WHERE categorie=? ORDER BY $by $AD;? ?");
		$sql->execute( array("$categorie",$by,$AD) );
		$res = $sql->fetchAll();
		return $res;
	}

	public function categorie()
	{
		return $this->cnx->query("SELECT * FROM categorie WHERE categorie NOT LIKE 'var' ")->fetchAll();
	}

	public function editCat($empl,$id)
	{
		$sql = $this->cnx->prepare("UPDATE employes SET categorie='var' WHERE categorie LIKE (SELECT categorie FROM categorie WHERE id_cat=?);
		UPDATE categorie SET categorie=? WHERE id_cat=?;
		UPDATE employes SET categorie=? WHERE categorie LIKE 'var' ");
        $sql->execute( array($id,$empl['categorie'],$id,$empl['categorie']) );
		return $sql->rowCount();
	}

	public function getCategorie($id) {
		$sql = $this->cnx->prepare("SELECT * FROM categorie WHERE id_cat=?");
		$sql->execute( array($id) );
		return $sql->fetch();
	}

	public function deleteCat($id)
	{
		$sql = $this->cnx->prepare("UPDATE employes SET categorie=null WHERE categorie LIKE (SELECT categorie FROM categorie WHERE id_cat=?);
		DELETE FROM categorie WHERE id_cat = ?");
		$sql->execute( array($id,$id) );
		
		return $sql->rowCount();
	}
}