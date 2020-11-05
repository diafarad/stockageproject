<?php

require_once "public/web/rooting.php";
require_once "public/web/menu.php";
require_once "model/DB.php";
require_once "model/ArticleDB.php";
require_once "model/CommandeDB.php";
require_once "model/EntreeDB.php";
require_once "model/SortieDB.php";
require_once "model/FournisseurDB.php";
require_once "model/CouleurDB.php";
require_once "model/StatsDB.php";

if(isset($_GET['page']))
{
    switch ($_GET['page'])
    {
        case 'accueil':
            $valstock = @getValeurStock();
            $valstock = mysqli_fetch_row($valstock);
            $nbarticleencom = @getNbArticleEnCommande();
            $nbarticleencom = mysqli_fetch_row($nbarticleencom);
            $nbarticleencritic = @getNbArticleCritique();
            $nbarticleencritic = mysqli_fetch_row($nbarticleencritic);
            $nbarticle = @getNbArticle();
            $nbarticle = mysqli_fetch_row($nbarticle);
            $volumestock = @getVolumeStock();
            $volumestock = mysqli_fetch_row($volumestock);
            $articleplusvendu = @getArticlePlusVendu();
            $articleplusvendu = mysqli_fetch_row($articleplusvendu);
            $articlemoinsvendu = @getArticleMoinsVendu();
            $articlemoinsvendu = mysqli_fetch_row($articlemoinsvendu);
            require_once "view/accueil/index.php";
            break;
        case 'article/liste':
            $articles = listeArticle();
            require_once "view/article/liste.php";
            break;
        case 'article/detail':
            $art = @getArticleByRef($_GET['ref']);
            $art = mysqli_fetch_row($art);
            $article = @getCouleurArticleByRef($_GET['ref']);
            require_once "view/article/detail.php";
            break;
        case 'commande/liste':
            $infosCommandes = listeCommande();
            require_once "view/commande/liste.php";
            break;
        case 'commande/detail':
            $c = @getCommandeByNumero($_GET['num']);
            $c = mysqli_fetch_row($c);
            $com = @getAllArticlesCommandeByNum($_GET['num']);
            require_once "view/commande/detail.php";
            break;
        case 'commande/bon':
            $num = $_GET['num'];
            $f = @getFournisseurByNumCommande($_GET['num']);
            $f = mysqli_fetch_row($f);
            header("location:".base_url()."view/commande/bon.php?num=$num");
            //require_once "view/commande/bon.php";
            break;
        case 'entree/liste':
            $infosEntrees = listeEntree();
            require_once "view/entree/liste.php";
            break;
        case 'entree/detail':
            $e = @getEntreeById($_GET['num']);
            $e = mysqli_fetch_row($e);
            $ent = @getAllArticlesEntreeById($_GET['num']);
            require_once "view/entree/detail.php";
            break;
        case 'sortie/liste':
            $infosSorties = listeSortie();
            require_once "view/sortie/liste.php";
            break;
        case 'sortie/detail':
            $s = @getSortieById($_GET['num']);
            $s = mysqli_fetch_row($s);
            $sort = @getAllArticlesSortieById($_GET['num']);
            require_once "view/sortie/detail.php";
            break;
        case 'fournisseur/liste':
            $fournisseur = listeFournisseur();
            require_once "view/fournisseur/liste.php";
            break;
        case 'couleur/liste':
            $couleur = listeCouleur();
            require_once "view/couleur/liste.php";
            break;
        default:
            //require_once 'view/index.php';
            header("location:".base_url());
            break;
    }
}
?>
