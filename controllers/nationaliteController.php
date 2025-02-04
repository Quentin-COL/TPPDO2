<?php
$action=$_GET['action'];
switch($action){
    case 'list':
        $lesNationalites=Nationalite::findAll();
        include('vues/listeNationalites.php');
        break;
    case 'add':
        $mode="Ajouter";
        include('vues/formNationalite.php');
        break;
    case 'update':
        $mode="Modifier";
        $nationalite=Nationalite::findById($_GET['num']);
        include('vues/formNationalite.php');
        break;
    case 'delete':
        $nationalite=Nationalite::findById($_GET['num']);
        $nb=Nationalite::delete($nationalite);
        if($nb==1){
            $_SESSION['message']=["success"=>"La nationalite a bien été supprimé"];
        }else{
            $_SESSION['message']=["danger"=>"La nationalite n'a pas été supprimé"];
        }
        header('location: index.php?uc=nationalites&action=list');
        break;
    case 'valideForm':
        $nationalite= new Nationalite();
        if(empty($_POST['num'])){
            $nationalite->setLibelle($_POST['libelle']);
            $nb=Nationalite::add($nationalite);
            $message = "ajoutée";  
        }else{
            $nationalite->setLibelle($_POST['libelle']);
            $nationalite->setNum($_POST['num']);
            $nb=Nationalite::update($nationalite);
            $message = "modifiée";  
        }

        if($nb==1){
            $_SESSION['message']=["success"=>"La nationalite a bien été $message"];
        }else{
            $_SESSION['message']=["danger"=>"La nationalite n'a pas été $message"];
        }
        header('location: index.php?uc=nationalites&action=list');
        break;
}



?>