<?php 
require_once "livremanagerclass.php";
$livreManager = new LivreManager;
$livreManager->chargementLivres();

ob_start()?>
   <table class="table text-center">
    <tr class="table-dark text-white">
        <th>Image</th>
        <th>Titre</th>
        <th>Pages</th>
        <th colspan="2">Actions</th>
    </tr>
    <?php
        $livres= $livreManager->get_livre();
        for ($i=0; $i < count($livres); $i++):?>
    <tr>
        <td class="align-middle">
            <img src="public/images/<?=$livres[$i]->getImage();?>" width="60px">
        </td>
        <td class="align-middle">
           <h6> <?=$livres[$i]->getTitre(); ?></h6>
        </td>
        <td class="align-middle">
           <h6> <?=$livres[$i]->getNbPages();?></h6>
        </td>
        <td class="align-middle"><a href="" class="btn btn-warning">Modifier</a></td>
        <td class="align-middle"><a href="" class="btn btn-danger">Supprimer</a></td>
    </tr>
    <?php endfor; ?>
   </table>
   <a href="" class="btn btn-success d-block">Ajouter</a>
<?php
$content= ob_get_clean();
$title = "Livres de la bibliothèque";
require "template.php";
?>