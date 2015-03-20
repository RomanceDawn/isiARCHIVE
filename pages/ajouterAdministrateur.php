<!--the page to add an admin-->
<?php include("header.php"); ?>



<div class="container theme-showcase" role="main">

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3>Ajouter un administrateur</h3>
        </div>
        <div class="panel-body">
            <form class="form-horizontal" method="post" action="../php/ajouterAdministrateurManager.php" enctype="multipart/form-data">
                <fieldset>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="login">Login * </label>
                        <div class="col-md-4">
                            <input type="text" name="login" class="form-control"  value="" id="titre" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="password">Mot de passe * </label>
                        <div class="col-md-4">

                            <input type="password" name="password" class="form-control"  value="" id="password" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="password2">Répéter mot de passe * </label>
                        <div class="col-md-4">

                            <input type="password" name="password2" class="form-control"  value="" id="password2" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" ></label><div class="col-md-4">
                            <button type="submit" class="btn btn-default">Valider</button>
                        </div>
                    </div>
                    <?php
                    if (isset($_GET['error_form'])) {
                        switch ($_GET['error_form']) {
                            case 1 :
                                echo '<div class="alert alert-danger text-center">'
                                . 'Champ login non renseigné'
                                . '</div>';
                                break;
                            case 2 :
                                echo '<div class="alert alert-danger text-center">'
                                . 'Champ mot de passe non renseigné'
                                . '</div>';
                                break;
                            case 3 :
                                echo '<div class="alert alert-danger text-center">'
                                . 'Champ confirmation mot de passe non renseigné'
                                . '</div>';
                                break;
                            case 4 :
                                echo '<div class="alert alert-danger text-center">'
                                . 'Les 2 mots de passes doivent être identiques'
                                . '</div>';
                                break;
                            case 5 :
                                echo '<div class="alert alert-danger text-center">'
                                . 'Ce login existe déjà'
                                . '</div>';
                                break;
                            case 5 :
                                echo '<div class="alert alert-danger text-center">'
                                . 'le mot de passe doit faire au moins 3 caractères'
                                . '</div>';
                                break;
                        }
                    } else if (isset($_GET['succes'])) {
                        echo '<div class="alert alert-success text-center">'
                        . 'Ajout d\'un administrateur réussi'
                        . '</div>';
                    }
                    ?>
                </fieldset>
            </form>
        </div>
    </div>


</div>
<?php include("footer.php"); ?>

