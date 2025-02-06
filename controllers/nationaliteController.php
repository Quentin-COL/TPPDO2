<?php
$action=$_GET['action'];
switch($action){
    case 'list':
        $libelle ="";
        $continentSel="Tous";
        if(!empty($_POST['continent']) || !empty($_POST['libelle']))
        {
            $libelle = $_POST['libelle'];
            $continentSel = $_POST['continent'];
        }
        $lesContinents = Continent::findAll();
        $lesNationalites=Nationalite::findAll($libelle, $continentSel);
        include('vues/nationalite/listeNationalites.php');
        break;
    case 'add':
        $mode="Ajouter";
        $lesContinents=Continent::findAll();
        include('vues/nationalite/formNationalite.php');
        break;
    case 'update':
        $mode="Modifier";
        $lesContinents=Continent::findAll();
        $laNationalite=Nationalite::findById($_GET['num']);
        include('vues/nationalite/formNationalite.php');
        break;
    case 'delete':
        $laNationalite=Nationalite::findById($_GET['num']);
        $nb=Nationalite::delete($laNationalite);
        if($nb==1){
            $_SESSION['message']=["success"=>"La nationalite a bien été supprimé"];
        }else{
            $_SESSION['message']=["danger"=>"La nationalite n'a pas été supprimé"];
        }
        header('location: index.php?uc=nationalites&action=list');
        break;
    case 'ValiderForm':
        $nationalite= new Nationalite();
        $continent = Continent::findById($_POST['continent']);
        $nationalite->setLibelle($_POST['libelle']);
        $nationalite->setContinent($continent);
        if(empty($_POST['num'])){
            $nb=Nationalite::add($nationalite);
            $message = "ajoutée";  
        }else{
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