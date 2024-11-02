<div id="data-table">
<h1>G&eacute;rer les Documents</h1>
<p align="right"><a href="doc/uploadify-multi-single.php?id=<?php echo $_GET["id"];?>&type=<?php echo $_GET["type"];?>"
id="gerer-document" class="button blue size-80" title="Ajouter un document">Ajouter</a></p>

  <table class="style1 datatable">
    <thead>
      <tr>
        <th>Id </th>
        <th>Nom</th>
        <th>Fichier</th>
        <th>lien</th>
        <th> </th>
        <th> </th>
        <th>Sup.</th>
        <th>Mod.</th>
      </tr>
    </thead>
        <tbody>
    <?php
      
      $req1= "SELECT* FROM `document`";
              try {
                       $Resulats = $Mysql->TabResSQL($req1);
                      }
                      catch (Erreur $e) {
                       echo $e -> RetourneErreur();
                      }
            foreach($Resulats as $row)
            {
    ?>
          <tr>
                    <td><?php echo $row["id_document"];?></td>
                    <td><?php echo $row["nom"];?></td>
                    <td><?php echo $row["type"];?></td>
                    <td><a href="document/data/<?php echo $row["nom"];?>" target="_blank">voir file</a></td>
                    <td></td>
					<td></td>
					<td><a id="sdocument<?php echo $row["id_document"];?>" href="#form-sup-<?php echo $row["id_document"];?>" title=		"Supprimer ce document" > <img src="images/ico_delete_16.png" width="16" /></a>
								<script type="text/javascript">
                                        $("#sdocument<?php echo $row["id_document"];?>").fancybox({
                                            'width'	: '50%',
                                            'height': '50%',	
                                            'onClosed': function(e)
                                                     {
                                        parent.location.reload(true);
                                                    }									   });
                                    
                                    </script>
                 </td>
                 <td><a id="mdocument<?php echo $row["id_document"];?>" href="doc/modif-doc.php?id=<?php echo $row["id_document"];?>" title="Modifier ce document" > <img src="images/ico_edit_16.png"  width="16" /></a>
							  <script type="text/javascript">
                                 $("#mdocument<?php echo $row["id_document"];?>").fancybox({
                                     'width'  : '63%',
                                     'height': '80%',
                                     'type'  : 'iframe', 		
									 'onClosed': function(e)
												 {
									parent.location.reload(true);
				 								}									   });
                                </script>
            	</td>
          </tr>
          <?php    
                }
        ?>
        </tbody>
  </table>
</div>
	<?php
	  $req6= "SELECT* FROM `document`";
	  try {
			 $Resulats = $Mysql->TabResSQL($req6);
			  }
			 catch (Erreur $e) {
			 echo $e -> RetourneErreur();
			 }
	    foreach($Resulats as $row)
		{
	?>
<div id="sup" style="display:none"  >
  <form id="form-sup-<?php echo $row["id_document"];?>" style="width:300px;" method="post" action="" class="notification note-error">
            <center>
              Voulez vous supprimer ce document ? <br />
              <br />
              <input type="submit" id="oui" name="oui"  value="Oui" class="button red size-30">
              <input type="hidden" name="idd" value="<?php echo $row["id_document"];?>"/>
              <input type="submit" id="nom" name="non" value="Non" class="button grey size-30">
                          <br />
              &nbsp;
            </center>
  </form>
</div>

<?php
}
?>



<?php
if(isset($_POST['oui']))
{
$req="delete  from document  WHERE `id_document` =".$_POST['idd'];

	  try {
			$Resulats = $Mysql->ExecuteSQL($req);
		  }
	  catch (Erreur $e)
		  {
		  echo $e -> RetourneErreur();
		   }
//header("location:index.php?page=gerer-documents");
 }
?>