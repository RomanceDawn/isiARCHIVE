<!--the index of the site-->
<?php include("header.php"); ?>



<div class="container theme-showcase" role="main">

<p class="text-center">Vous pouvez sur ce site consulter les rapports de stage des élèves de l'ISIMA.</p> 

    <div class="jumbotron " style="  position: absolute;
  top: 40%;
  left:50%;
  transform: translate(-50%,-50%);
  width: 80%">

        <p class="text-center">Recherchez des rapports</p> 
        <form class="form-horizontal" method="post" action="../php/rechercheManager.php" enctype="multipart/form-data">
            <fieldset>

                <div class="col-md-8 col-md-offset-2">

                    <div class="center col-md-12 input-group">
                        <input class="col-md-10 form-control" type="text" name="motsClefs" value="" id="motsClefs" autofocus />
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Rechercher</button>
                        </span>
                    </div>
                </div>           


            </fieldset>
        </form>
    </div>


</div>
<?php include("footer.php"); ?>

