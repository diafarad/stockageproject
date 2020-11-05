<?php

require_once '../model/DB.php';
require_once '../model/FournisseurDB.php';

    if(isset($_POST['valider']))
    {
        $ok = addFournisseur($_POST['nom'],$_POST['adresse'],$_POST['ville'],$_POST['pays'],$_POST['tel'],$_POST['mail'],$_POST['bp']);
        header("location:..?page=fournisseur/liste&resultA=$ok");
    }

    if(isset($_POST['envoyer']))
    {
        $ok = updateUser($_POST['idU'],$_POST['nomU'],$_POST['prenomU'],$_POST['loginU'],$_POST['passwordU']);
        header("location:..?page=user/liste&resultE=$ok");
    }

    if(isset($_GET['idU']))
    {
        $ok = deleteUser($_GET['idU']);
        header("location:../view/user/liste.php?resultD=$ok");
    }

?>
