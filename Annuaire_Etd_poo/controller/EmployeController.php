<?php

require_once 'model/employe.php';

class EmployeController {

	private $employes;

	public function __construct() {
		$this->employes = new employe();
	}

    public function index($notification = '') {
        $data['notification'] = $notification;
        $data['employes'] = $this->employes->getAllEmploye();
        $data['categorie'] = $this->employes->Categorie();
    	include 'view/employe/index.php';
        die;
    }

    public function show() {
    	$employe = $this->employes->getEmploye($_GET['id']);
        if (!$employe) {
            die('Page Not Found 404');    
        }
    	include 'view/employe/show.php';
    }

    public function add() {
        $errors = array();

        if (isset($_POST['submit'])) {

            if (empty($_POST['prenom'])) {
                $errors['prenom'] = 'Le prénom doit être rempli';
            }
            if (empty($_POST['nom'])) {
                $errors['nom'] = 'Le nom doit être rempli';
            }
            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && !empty($_POST['email'])) {
                $errors['email'] = 'Merci de remplir l\'adresse email';
            }
            if (!is_numeric($_POST['age']) && !empty($_POST['age'])) {
                $errors['age'] = 'L\'age doit être un nombre';
            }
            if (empty($_POST['ville'])) {
                $errors['ville'] = 'La ville doit être remplie';
            }
            
            if (empty($errors)) {
                $add = $this->employes->add($_POST);
                
                if ($add) {
                    $msg = "L'employé ".$_POST['prenom'].$_POST['nom']." a été ajouté!";
                } 
                else {
                    $msg = "Impossible d'ajouter l'employé!";
                }
                $this->index($msg); // Redirection vers l'index
            }
        }
        $data['categorie'] = $this->employes->categorie();
        include 'view/employe/add.php';
    }


    public function delete()
    {
        session_start();
        $type = $_SESSION['type_compte'];
        if (empty($_SESSION)){
            echo "<script type='text/javascript'>alert('Vous devez être connecté pour accéder à cette fonction'); 
            window.location.href='?ctrl=employe&mth=login';</script>";
            //echo "<script type='text/javascript'> alert('test'); </script>";
            //header("Location: ?ctrl=Accueil&mth=index");
            //exit();
            
        }
        
        else if ($type == 0){
            echo "<script type='text/javascript'>alert('Vous devez être administrateur pour accéder à cette fonction'); 
            window.location.href='?ctrl=employe';</script>";
        }

        else {
            $del = $this->employes->delete($_GET['id']);
            if ($del) {
                $msg = "L'employé ". $_GET['id']." a été supprimé.";
            } 
            else {
                $msg = "Impossible de supprimer l'employé!";
            }
            $this->index($msg); // Redirection vers l'index
        }

        
    }

    public function edit()
    {
        /*$upd = $this->employes->edit($_POST,$_GET['id']);

        if ($upd) {
            $msg = "L'employé ". $_GET['id']." a été modifié.";
        } 
        else {
            $msg = "Impossible de modifier l'employé!";
        }
        $this->index($msg); // Redirection vers l'index*/
        $errors = array();
        if (isset($_POST['submit'])) {

            $upd = $this->employes->edit($_POST,$_GET['id']);
            

            if ($upd) {
                $msg = "L'employé ". $_GET['id']." a été modifié.";
            } 
            else {
                $msg = "Impossible de modifier l'employé!";
            }
            $this->index($msg); // Redirection vers l'index

        }
        $employe = $this->employes->getEmploye($_GET['id']);
        $data['categorie'] = $this->employes->categorie();
        include 'view/employe/edit.php';
    
    }

    public function login()
    {
        $errors = array();
        if (isset($_POST['login'])) {
            $login = $this->employes->login($_POST['pseudo'],$_POST['password']);

            if ($login) {
                session_start();
                
                $_SESSION['id'] = $login['id'];
                $_SESSION['pseudo'] = $login['pseudo'];
                $_SESSION['type_compte'] = $login['type_compte'];
                $msg = "Connexion réussie";
                header("Location: ?ctrl=Accueil&mth=index");
                //$this->index($msg); // Redirection vers l'index
            } 
            else {
                echo "Identifiants incorrects";
            }
            

        }

        //$employe = $this->employes->getEmploye($_GET['id']);
        include 'view/employe/login.php';
    }


    public function logout()
    {
        session_start();
        if (isset($_POST['logout'])){
            session_unset();
            session_destroy();
            //echo session_status();
            header("Location: ?ctrl=Accueil&mth=index");
            
            
        }
    }
/*
    public function trie()
    {
        if (isset($_POST['trie'])){
            $data['employes'] = $this->employes->trie($_POST['categorie']);
            include 'view/employe/trie.php';
            
        }
    }
*/
    public function trie2() {
    	$data['employes'] = $this->employes->trie($_GET['cat']);
        include 'view/employe/trie.php';
    }

    public function ordre()
    {
        if (!isset($_SESSION)){
            session_start();
        }
        $data['employes'] = $this->employes->ordre($_SESSION['categorie'],$_GET['by'],$_GET['AD']);
        include 'view/employe/trie.php';  
    }

    public function categorie()
    {
        $data['categorie'] = $this->employes->categorie();
        include 'view/employe/categorie.php';
    }

    public function editCat()
    {
        $errors = array();
        if (isset($_POST['submit'])) {

            $editCat = $this->employes->editCat($_POST,$_GET['id']);
            

            if ($editCat) {
                $msg = "La catégorie ". $_GET['id']." a été modifiée.";
            } 
            else {
                $msg = "Impossible de modifier la catégorie!";
            }
            $this->index($msg); // Redirection vers l'index

        }
        $categorie = $this->employes->getCategorie($_GET['id']);
        include 'view/employe/editCat.php';
    
    }

    public function deleteCat()
    {
        session_start();
        $type = $_SESSION['type_compte'];
        if (empty($_SESSION)){
            echo "<script type='text/javascript'>alert('Vous devez être connecté pour accéder à cette fonction'); 
            window.location.href='?ctrl=employe&mth=login';</script>";
            //echo "<script type='text/javascript'> alert('test'); </script>";
            //header("Location: ?ctrl=Accueil&mth=index");
            //exit();
            
        }
        
        else if ($type == 0){
            echo "<script type='text/javascript'>alert('Vous devez être administrateur pour accéder à cette fonction'); 
            window.location.href='?ctrl=employe';</script>";
        }

        else {

            $del = $this->employes->deleteCat($_GET['id']);
            if ($del) {
                $msg = "La catégorie ". $_GET['id']." a été supprimé.";
            } 
            else {
                $msg = "Impossible de supprimer la catégorie!";
            }
            $this->index($msg); // Redirection vers l'index
        }
    }
}