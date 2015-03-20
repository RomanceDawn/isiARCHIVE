<!--the page to update a report-->
<?php
include("./header.php");

if (empty($_SESSION['login'])) {
    header('Location: ../pages/index.php');
}

if (isset($_GET['id']) && !empty($_GET['id'])) {
    require_once '../php/Rapport.class.php';
    require_once '../php/QueryManager.class.php';
    $id = $_GET['id'];
    $rapport = QueryManager::getRapportById($id);
    if ($rapport == NULL) {
        header('Location: ../pages/index.php');
    }
}
?>
<div class="container theme-showcase" role="main">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 >Modifier rapport n°<?php echo $rapport->getID();?></h3>
        </div>
        <div class="panel-body">

            <form class="form-horizontal" method="post" action="../php/modifierRapportManager.php" enctype="multipart/form-data" id="file-form">
                <?php
                if (isset($_SESSION['success'])) {
                    echo '<div class="alert alert-success text-center">
                        <strong>OK!</strong> Modification des informations réussies.
                      </div>';
                    unset($_SESSION['success']);
                }
                ?>
                <fieldset>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="singlebutton"></label>
                        <div class="col-md-4">
                            <a class="btn btn-sm btn-default" href="../rapports/<?php echo $rapport->getNomServ(); ?>" target=\"_blank\">Afficher le document</a>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="titre">Titre</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="titre" id="titre" placeholder="" value="<?php echo strip_tags($rapport->getTitre()); ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="auteur">Auteur</label>
                        <div class="col-md-4">
                            <input type="text" name="auteur" class="form-control" id="auteur" placeholder="" value="<?php echo strip_tags($rapport->getAuteur()); ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="date">Année</label>
                        <div class="col-md-2">
                            <select id="date" name="date" class="form-control">	
                                <option selected><?php echo $rapport->getAnnee(); ?></option>
                                <?php
                                $tmp = intval(date('o'));
                                for ($index = $tmp; $index >= 1993; $index--) {
                                    echo '<option value="' . $index . '">' . $index . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="sujet">Sujet</label>
                        <div class="col-md-4">
                            <input type="text" name="sujet" class="form-control" id="sujet" placeholder="" value="<?php echo strip_tags($rapport->getSujet()); ?>" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="motscles">Description</label>
                        <div class="col-md-4">
                            <textarea name="description" id="description" class="form-control vertic"  rows="2" placeholder=""><?php echo strip_tags($rapport->getDescription()); ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="motscles">Mots clés</label>
                        <div class="col-md-4">
                            <input type="text" name="motscles" class="form-control" id="motscles" placeholder="" value="<?php echo strip_tags($rapport->getMotsClefs()); ?>">
                        </div>
                    </div>  
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="texte">Texte du document</label>
                        <div class="col-md-4">                     
                            <textarea class="form-control" id="texte" name="texte" placeholder="Copiez collez ici tout le texte du document."><?php echo $rapport->getTexte(); ?></textarea>
                        </div>
                    </div>
                    <input type="hidden" name="id" value=<?php echo $id ?>
                           <div class="form-group">
                        <label class="col-md-4 control-label" for="singlebutton"></label>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary">Mettre à jour</button>
                        </div>
                    </div>

                </fieldset>
            </form>

        </div>
    </div>
</div>




<?php include("./footer.php"); ?>
