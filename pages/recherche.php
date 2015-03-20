<!--the page to make a search-->
<?php include("./header.php"); ?>
<div class="container theme-showcase" role="main">

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3>Recherche de rapports</h3>
        </div>
        <div class="panel-body">
            <form class="form-horizontal" method="post" action="../php/rechercheManager.php" enctype="multipart/form-data">
                <fieldset>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="titre">Titre : </label>
                        <div class="col-md-4">
                            <input class="form-control" type="text" name="titre" value="" id="titre" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="sujet">Sujet : </label>
                        <div class="col-md-4">
                            <input class="form-control" type="text" name="sujet" value="" id="sujet" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="description">Description : </label>
                        <div class="col-md-4">
                            <input class="form-control" type="text" name="description" value="" id="description" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="auteur">Auteur : </label>
                        <div class="col-md-4">
                            <input class="form-control" type="text" name="auteur" value="" id="titre" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="annee">Année : </label>
                        <div class="col-md-2">
                            <select class="form-control" name="annee" id="annee">
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
                        <label class="col-md-4 control-label" for="mots-clés">Mots-clés : </label>
                        <div class="col-md-4">
                            <input class="form-control" type="text" name="motsClefs" value="" id="motsClefs" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="singlebutton"></label>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary" name="submit">Rechercher</button>
                        </div>

                    </div>                  

                    <?php
                    if (isset($_GET['no_result'])) {
                        echo '<p class="bg-danger text-center" style=" margin:auto;padding:10px;">Aucun résultat </p>';
                    }
                    ?>

                </fieldset>
            </form>
        </div>
    </div>
</div>
<?php include("./footer.php"); ?>