<!--The page to upload a report-->
<?php
include("./header.php");

if (empty($_SESSION['login'])) {
    header('Location: ../pages/index.php');
}
?>

<div class="container theme-showcase" role="main">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 >Upload simple</h3>
        </div>
        <div class="panel-body">

            <form class="form-horizontal" method="post" action="../php/simpleUploadManager.php" enctype="multipart/form-data" id="file-form">
                <fieldset><?php
                    if (isset($_SESSION['erreur'])) {
                        switch ($_SESSION['erreur']) {
                            case 1:
                                echo '<div class="alert alert-danger text-center">
                        <strong>Erreur!</strong> Chargement du fichier.
                      </div>';
                                break;
                            case 2:
                                echo '<div class="alert alert-danger text-center">
                        <strong>Erreur!</strong> Format fichier.
                      </div>';
                                break;
                        }
                         unset($_SESSION['erreur']);
                    }
                    if (isset($_SESSION['success'])) {
                        echo '<div class="alert alert-success text-center">
                        <strong>OK!</strong> Envoi du fichier réussie.
                      </div>';
                        unset($_SESSION['success']);
                    }
                    ?>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="file">Fichier</label>
                        <div class="col-md-4">
                            <input type="file" id="file" name="file" accept="application/pdf">
                            <span class="help-block">Format accepté : PDF</span> 
                            <button type="button" id="auto" class="btn btn-info btn-sm">Auto-Complétion</button>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-4 control-label" for="titre">Titre</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="titre" id="titre" placeholder="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="auteur">Auteur</label>
                        <div class="col-md-4">
                            <input type="text" name="auteur" class="form-control" id="auteur" placeholder="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="date">Année</label>
                        <div class="col-md-2">
                            <select id="date" name="date" class="form-control">
                                <option value=""></option>
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
                            <input type="text" name="sujet" class="form-control" id="sujet" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="motscles">Description</label>
                        <div class="col-md-4">
                            <textarea name="description" id="description" class="form-control vertic"  rows="2" placeholder=""></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="motscles">Mots clés</label>
                        <div class="col-md-4">
                            <input type="text" name="motscles" class="form-control" id="motscles" placeholder="">
                        </div>
                    </div>  
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="texte">Texte du document</label>
                        <div class="col-md-4">                     
                            <textarea class="form-control" id="texte" name="texte" placeholder="Copiez collez ici tout le texte du document."></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="singlebutton"></label>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary">Envoyer</button>
                        </div>
                    </div>

                </fieldset>
            </form>

        </div>

        <script type="text/javascript" src="../javascript/autoCompletion.js"></script>
    </div>
</div>
<?php include("./footer.php"); ?>
