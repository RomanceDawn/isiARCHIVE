<!--the page to update the password-->
<?php include("header.php"); ?>
<div class="container theme-showcase" role="main">

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3>Changer son mot de passe</h3>
        </div>
        <div class="panel-body">
            <form class="form-horizontal" method="post" action="../php/changerMotDePasseManager.php" enctype="multipart/form-data">
                <fieldset>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="oldPassword">Ancien mot de passe * </label>
                        <div class="col-md-4">
                            <input type="password" name="oldPassword" class="form-control"  value="" id="titre" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="newPassword">Nouveau mot de passe * </label>
                        <div class="col-md-4">
                            <input type="password" name="newPassword" class="form-control"  value="" id="newPassword" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="newPasswordRe">Confirmation * </label>
                        <div class="col-md-4">
                            <input type="password" name="newPassword2" class="form-control"  value="" id="newPasswordRe" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" ></label>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-default">Valider</button>
                        </div>
                    </div>
                    <?php
                    if (isset($_GET['error_mdp'])) {
                        switch ($_GET['error_mdp']) {
                            case 1 :
                                echo '<div class="alert alert-danger text-center">'
                                . 'Mot de passe actuel erroné'
                                . '</div>';
                                break;
                            case 2 :
                                echo '<div class="alert alert-danger text-center">'
                                . 'Erreur dans la confirmation du mot de passe'
                                . '</div>';
                                break;
                            case 3 :
                                echo '<div class="alert alert-danger text-center">'
                                . 'Champ ancien mot de passe non renseigné'
                                . '</div>';
                                break;
                            case 4 :
                                echo '<div class="alert alert-danger text-center">'
                                . 'Champ nouveau mot de passe non renseigné'
                                . '</div>';
                                break;
                            case 5 :
                                echo '<div class="alert alert-danger text-center">'
                                . 'Champ confirmation nouveau mot de passe non renseigné'
                                . '</div>';
                                break;
                            case 6 :
                                echo '<div class="alert alert-danger text-center">'
                                . 'Le mot de passe doit faire au moins 4 caractères'
                                . '</div>';
                                break;
                        }
                    } else if (isset($_GET['succes'])) {
                        echo '<div class="alert alert-success text-center">'
                        . 'Mot de passe changé avec succès'
                                . '</div>';
                    }
                    ?>


                </fieldset>
            </form>
        </div>
    </div>


</div>
<?php include("footer.php"); ?>

