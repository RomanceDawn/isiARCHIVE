<!--the page to connect-->
<?php include("./header.php"); ?>
<div class="container theme-showcase" role="main">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3>Connexion</h3>
        </div>
        <div class="panel-body">
              <?php
                    if (isset($_SESSION['errorConnexion'])) {
                                echo '<div class="alert alert-danger text-center">'
                                . 'Erreur : Verifiez le mot de passe et l\'identifiant'
                                . '</div>';
                                unset($_SESSION['errorConnexion']);
                    }
                            ?>
            <form class="form-horizontal" method="post" action="../php/connexionManager.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="col-md-4 control-label" for="login">Identifiant</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" id="login" name="login"  >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="password">Mot de passe</label>
                    <div class="col-md-4">
                        <input type="password" name="password" class="form-control" id="password" >

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" ></label>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-default">Connexion</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include("./footer.php"); ?>
