<td valign="top" width="125">
	<div style="width: 120px; background-color: #F9F1E7; padding:4px; border: solid #632415 1px">
	<b>Alege domeniu</b><HR size="1">
		<?php
		$sql="SELECT * FROM domenii ORDER BY nume_domeniu ASC";
		$resursa=mysql_query($sql);
		while($row=mysql_fetch_array($resursa))
		{
			print '<a href="domeniu.php?id_domeniu='.$row['id_domeniu'].'">'.$row['nume_domeniu'].'</a><br>';
		}
		?>
	</div><br>
	<div style="width:120px; background-color: #F9F1E7; padding:4px; border:solid #632415 1px">
		<form action="cautare.php" method="GET">
			<b>Cautare</b><br>
			<INPUT type="text" name="cuvant" size="12"><br>
			<INPUT type="submit" value="Cauta">
		</form>
	</div>
	<br>
	<div style="width:120px; background-color:#F9F1E7; padding:4px; border:solid #632415 1 px">
	<b>Cos</b><br>
	<?php
	$nrCarti=0;
	$totalValoare=0;
	if(isset($_SESSION['titlu'])&& isset($_SESSION['nr_buc'])&& isset($_SESSION['pret']))
	{		
	for($i=0; $i<count($_SESSION['titlu']); $i++)
	{
		$nrCarti=$nrCarti+$_SESSION['nr_buc'][$i];
		$totalValoare=$totalValoare+($_SESSION['nr_buc'][$i]*$_SESSION['pret'][$i]);
	}
	}
	?>
	Aveti <b><?=$nrCarti?></b> carti in cos, in valoare totala de <b><?=$totalValoare?></b> lei.
	<a href="cos.php"> Click aici pentru a vedea continutul cosului! </a>
	</div>
</td>