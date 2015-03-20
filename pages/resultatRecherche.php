<!--the page page which print the results of the search-->
<?php include("./header.php"); ?>
<div class="container theme-showcase" role="main">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3>Résultat de recherche</h3>
        </div>
        <div class="panel-body">

            <?php
            if (!empty($_SESSION['rapports'])) {
                require_once '../php/Rapport.class.php';
                $rapports = $_SESSION['rapports'];
		
		$nbRapports= count($rapports);
		$page=1;
		if(isset($_GET['numPage']))
		{
		    $page=$_GET['numPage'];
		    if($page<1 || $page>ceil($nbRapports/20))
		    {
			$page=1;
		    }
		}
			
		
		
                ?>
                <div class="alert alert-info text-center"><strong><?php echo $nbRapports; ?></strong> résultat(s).
                </div>
                <div class="table-responsive">
                    <table class="table table-condensed table-striped container" >
                        <thead >
                        <th class="col-xs-1 text-center ">N°</th>
                        <th class=" col-xs-5  text-center" >Titre</th>
                        <th class="col-xs-2 text-center">Auteur</th>
                        <th class="col-xs-1 text-center">Année</th>
                        </thead>
                        <tbody>

                            <?php
                            for ($i = ($page-1)*20; $i < $nbRapports && $i<$page *20; $i++) {
                                $rapports[$i] = unserialize($rapports[$i]);
                                ?>
                                <tr id="<?php echo $rapports[$i]->getID(); ?>" class="<?php if (!$rapports[$i]->isValide() && !empty($_SESSION['login'])) {
                                    ?>warning
                                    <?php } ?>">
                                    <td class="text-center"><?php echo $rapports[$i]->getID(); ?></td>
                                    <td class=""><a class="" href="../rapports/<?php echo $rapports[$i]->getNomServ(); ?>" target=\"_blank\"><?php echo $rapports[$i]->getTitre(); ?></a></td>
                                    <td><?php echo $rapports[$i]->getAuteur(); ?></td>
                                    <td class="text-center"><?php echo $rapports[$i]->getAnnee(); ?></td>
                                    <td><a class="btn btn-sm btn-default" href="../rapports/<?php echo $rapports[$i]->getNomServ(); ?>" target=\"_blank\">Afficher</a></td>
                                    <td><a class="btn btn-sm btn-primary" href="../php/telechargerManager.php?id=<?php echo $rapports[$i]->getId(); ?>">Télécharger</a></td>
                                    <?php
                                    if (!empty($_SESSION['login'])) {
                                        $id = $rapports[$i]->getID();
                                        ?>
                                        <td><a class="btn btn-default btn-sm" href="modifierRapport.php?id=<?php echo $id; ?>">Modifier</a></td>
                                        <td><a class="btn btn-danger btn-sm" href="#" onClick="supprimerRapport('<?php echo $rapports[$i]->getID() ?>', '<?php echo $i ?>');
                                                            return false;">Supprimer</a></td>
                                           <?php } ?>
                                </tr>
                            <?php }
                            ?>
                        </tbody>
                    </table>
		    
		    
                </div>
		<nav>
		    <ul class="pagination pagination-lg">
			<li><a href="resultatRecherche.php?numPage=<?php echo max($page-1,1)?> " aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
		      
		    <?php 
			for($i=1;$i<=ceil($nbRapports/20);$i++)
			{
		    ?>
		      <li
			  <?php
			  if($i==$page)
			  {
			      echo ' class="active"';
			  }
			  ?>
			  ><a href="resultatRecherche.php?numPage=<?php echo $i?> "><?php echo $i?></a></li>
		      
		      
		    <?php
			}
		      
		    ?>
		  
		      <li><a href="resultatRecherche.php?numPage=<?php echo min($page+1,ceil($nbRapports/20))?> " aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>
		    </ul>
		</nav>
                <?php
            }
            ?>
        </div>
    </div>
</div>
<?php include("./footer.php"); ?>