<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>MUPAD 5.0</title>
	<meta http-equiv="content-type" 
		content="text/html;charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="design.css" />
	
	<script type="text/javascript">
		function estChampNonVide()
		{
			
			var champ = document.getElementById('name');
			
			if(champ.value == "")
				window.alert("Tu n'as pas de prénom ?");
			else
				if(!isNaN(champ.value))
					window.alert("Je ne savais pas qu'un prénom était un chiffre !");

			return !(champ.value == "" || !isNaN(champ.value));
		}
		
		function estChampValide()
		{
			var champ = document.getElementById('montant');
			
			if(champ.value == "")
				window.alert('Le montant est vide !');
			else
				if(isNaN(champ.value))
					window.alert('Le montant n\'est pas un nombre! ');
				else
					if(champ.value <0)
						window.alert("Le montant est négatif !");
					
			return !(champ.value == "" || isNaN(champ.value) || champ.value < 0);
		}
		
		function estChampValide2(pChamp1,pChamp2)
		{
			var champ = document.getElementById(pChamp1);
			var champ2 = document.getElementById(pChamp2);
			
			var ok = false;
			if(champ.value == "")
				window.alert('Le nombre 1 est vide !');
			else
				if(isNaN(champ.value))
					window.alert('Le nombre 1 n\'est pas un nombre! ');
				else
					if(champ2.value == "")
						window.alert('Le nombre 2 est vide !');
					else
						if(isNaN(champ2.value))
							window.alert('Le nombre 2 n\'est pas un nombre! ');
						else
							ok = true;
					
			return ok;
		}
		
		function resetChamp(pChamp1,pChamp2,pChampCache)
		{
			var champ  =  document.getElementById(pChamp1);
			var champ2 =  document.getElementById(pChamp2);
			var cache  =  document.getElementById(pChampCache);
			
			champ.value  = "";
			champ2.value = "";
			cache.value  = "";

			return false;
		}
	</script>
</head>

<body>
	<div>
		<a href="javascript:history.go( -1 )"><img src="../Images/retour.ico" alt="Validator" /></a>
		<?php						
			
			$tabDevises[0] = 'Euros';
			$tabDevises[1] = 'Francs';
			$tabDevises[2] = 'Dollars';
			
			$tabCalcul[0] = "+";
			$tabCalcul[1] = "-";
			$tabCalcul[2] = "*";
			$tabCalcul[3] = "/";
			
			
			if( !isset($_POST['nom']) 			 && !isset($_POST['devise1']) 
			 && !isset($_POST['devise2']) 		 && !isset($_POST['montantCalcul1'])
			 && !isset($_POST['montantCalcul2']) && !isset($_POST['montantCalcul1Bis'])
			 && !isset($_POST['montantCalcul2Bis'] ) )
			{

					echo '<br />';
					echo '<br />';
					
					//Partie 1 : le nom
					echo"<form action='tp9.php' method='post' onSubmit='return estChampNonVide()'>"; //On post TOUTES les valeurs
					
					echo 'votre nom :';
					echo "<input type='text' id='name' name='nom' /> ";
					echo '<input type="submit" value="bonjour"/>';

					echo '</form>';
					echo '<br />';
					echo '<hr />';
					echo '<br />';
					echo '<br />';
					
					
					//Partie 2 : Convertions
					echo '<form action="tp9.php" method="post"  onSubmit="return estChampValide()">
					
						Montant à convertir: <input type="text" id="montant" name="montant" /><br />
						De
						<select name="devise1" size="1">
							<option value="'.$tabDevises[0].'" selected>'.$tabDevises[0].'</option>
							<option value="'.$tabDevises[1].'">'.$tabDevises[1].'</option>
							<option value="'.$tabDevises[2].'">'.$tabDevises[2].'</option>
						</select>
						<br />
						Vers
						<select name="devise2" size="1">
							<option value="'.$tabDevises[0].'">'.$tabDevises[0].'</option>
							<option value="'.$tabDevises[1].'" selected>'.$tabDevises[1].'</option>
							<option value="'.$tabDevises[2].'">'.$tabDevises[2].'</option>
						</select>';
										
					
						echo '<input type="submit" value="envoi"/>
						</form>';					
					
					echo '<br /><hr /><br /><br />';
					
					
					//Partie 3.1 : mini calculette
					echo "<form action='tp9.php' method='post' onSubmit=\"return estChampValide2('calcul1','calcul2')\">";//calcul1 et calcul2 representent les 2 champs
					//de nombres à additionner/soustraire/multiplier/diviser
					echo '<input type="text" id="calcul1" name="montantCalcul1" size="6"/>'; //L'id sert pour le javascript , name sert pour le POST du php
					echo '<select name="choix" size="1">';
					
						for($i =0;$i < 4;$i++)	
							echo '<option value="'.$tabCalcul[$i].'" >'.$tabCalcul[$i].'</option>';
		
					echo'</select>';					
					
					echo ' <input type="text" id="calcul2" name="montantCalcul2" size="6"/>   ';
					echo '<span style="visibility:hidden" id="cache" > = <input type="text" readonly /></span>'; // Champ caché au début , visible après le bouton calculer
					echo '<br /> <span  style="padding-left:20px" ></span><input type="submit" value="envoyer" />';					
					echo "<button onClick=\"return resetChamp('calcul1','calcul2','cache') \">reset</button>";
					echo '</form>';
			
					echo '<br /><hr /><br /><br />';
					
					
					//Partie 3.2 : mini  calculette sous un autre forme
					echo "<form action='tp9.php' method='post' onSubmit=\"return estChampValide2('calcul1Bis','calcul2Bis')\">";
						echo '<div id="partie1">';								
							echo '<input type="text" id="calcul1Bis" name="montantCalcul1Bis" size="6"/>   ';
						echo '</div>';
							
							echo '<div id="boutons">';
							
								for($i =0;$i < 4;$i++)
								{
									echo '<input type="radio" name="choix" value="'.$tabCalcul[$i].'" ';
									if($i == 0)
										echo ' checked="checked" ';
									echo ' >'.$tabCalcul[$i].'</input>';
								}
									
							echo '</div>';
								
							
							echo '<div id="partie2">';
								echo ' <input type="text" id="calcul2Bis" name="montantCalcul2Bis" size="6"/>   ';
								echo '<span style="visibility:hidden" id="cacheBis"> = <input type="text" readonly /></span>';
							echo '</div>';
							
							echo '<div id="envoyer">';
								echo '<br /><br /> <span  style="padding-left:20px" ></span><input type="submit" value="envoyer" />';					
								echo "<button onClick=\"return resetChamp('calcul1Bis','calcul2Bis','cacheBis')\">reset</button>";
								
							echo '</div>';
						echo '</form>';
										

			}
			
			
			if(isset($_POST['montantCalcul1']) && isset($_POST['montantCalcul2'])) //Traitement de la partie 3.1 (redondance du code avec la partie 3.2 ....)
			{		
				echo '<br />';
				echo '<br />';
				if($_POST['choix'] == "+")
					$montant = $_POST['montantCalcul1'] + $_POST['montantCalcul2'];
				if($_POST['choix'] == "-")
					$montant = $_POST['montantCalcul1'] - $_POST['montantCalcul2'];
				if($_POST['choix'] == "*")
					$montant = $_POST['montantCalcul1'] * $_POST['montantCalcul2'];
				if($_POST['choix'] == "/")
					$montant = $_POST['montantCalcul1'] / $_POST['montantCalcul2'];
					
			
				echo "<form action='tp9.php' method='post' onSubmit=\"return estChampValide2('calcul1','calcul2')\">";//calcul1 et calcul2 representent les 2 champs
					//de nombres à additionner/soustraire/multiplier/diviser
					echo '<input type="text" value="'.$_POST['montantCalcul1'].'" id="calcul1" name="montantCalcul1" size="6"/>'; //L'id sert pour le javascript , name sert pour le POST du php
					echo '<select name="choix" size="1">';
					
						for($i =0;$i < 4;$i++)	
							echo '<option value="'.$tabCalcul[$i].'" >'.$tabCalcul[$i].'</option>';
		
					echo'</select>';					
					
					echo ' <input type="text"  value="'.$_POST['montantCalcul2'].'" id="calcul2" name="montantCalcul2" size="6"/>   ';
					echo '= <input id="cache" type="text" value="'.$montant.'" readonly /></span>'; // Champ caché au début , visible après le bouton calculer
					echo '<br /> <span  style="padding-left:20px" ></span><input type="submit" value="envoyer" />';					
					echo "<button onClick=\"return resetChamp('calcul1','calcul2','cache')\">reset</button>";
				echo '</form>';
					
					echo"<form action='tp9.php'>";
						echo '<br/><input type ="submit" value="Retour"/><center>';
					echo'</form>';
				echo '<br /><hr /><br /><br />';
			}
			
			
			if(isset($_POST['montantCalcul1Bis']) && isset($_POST['montantCalcul2Bis'])) //Traitement de la partie 3.2 
			{		
				echo '<br/><br/>';
				if($_POST['choix'] == "+")
					$montant = $_POST['montantCalcul1Bis'] + $_POST['montantCalcul2Bis'];
				if($_POST['choix'] == "-")
					$montant = $_POST['montantCalcul1Bis'] - $_POST['montantCalcul2Bis'];
				if($_POST['choix'] == "*")
					$montant = $_POST['montantCalcul1Bis'] * $_POST['montantCalcul2Bis'];
				if($_POST['choix'] == "/")
					$montant = $_POST['montantCalcul1Bis'] / $_POST['montantCalcul2Bis'];
					
					echo "<form action='tp9.php' method='post' onSubmit=\"return estChampValide2('calcul1Bis','calcul2Bis')\">";
						echo '<div id="partie1">';								
							echo '<input type="text" value="'.$_POST['montantCalcul1Bis'].'" id="calcul1Bis" name="montantCalcul1Bis" size="6"/>   ';
						echo '</div>';
							
							echo '<div id="boutons">';
							
								for($i =0;$i < 4;$i++)	
								{
									echo '<input type="radio" name="choix" value="'.$tabCalcul[$i].'"';
									
									if($tabCalcul[$i] == $_POST['choix'])
										echo ' checked="checked" ';
										
									echo ' >'.$tabCalcul[$i].'</input>';
								}
									
							echo '</div>';
								
							
							echo '<div id="partie2">';
								echo ' <input type="text" value="'.$_POST['montantCalcul2Bis'].'" id="calcul2Bis" name="montantCalcul2Bis" size="6"/>   ';
								echo ' = <input id= "cacheBis" value="'.$montant.'" type="text" readonly />';
							echo '</div>';
							
							echo '<div id="envoyer">';
								echo '<br /><br /> <span  style="padding-left:20px" ></span><input type="submit" value="envoyer" />';					
								echo "<button onClick= \" return resetChamp('calcul1Bis','calcul2Bis','cacheBis') \">reset</button>";
								
							echo '</div>';
						echo '</form>';
						
						echo"<form action='tp9.php'>";
						echo '<br/><input type ="submit" value="Retour"/><center>';
						echo'</form>';
					
				echo '<br /><hr /><br /><br />';
			}
			
			
			if(isset($_POST['nom'])) //Traitement du nom (Bonjour xxx)
			{
				echo 'Bonjour '.strip_tags($_POST['nom']).'<br />'; //strip_tags permet de ne pas afficher le prénom en gras si l'on rentre <strong>Prenom</strong> par ex

				echo"<form action='tp9.php'>";
				echo '<br/><input type ="submit" value="Retour"/><center>';
				echo'</form>';
			}
			
			if(isset($_POST['devise1']) && isset($_POST['devise2']))
			{			
				echo "<br /><br /><br />";
				echo '<form action="tp9.php" method="post" onSubmit="return estChampValide()">
						Montant à convertir : <input type="text" id="montant" name="montant" value="'.$_POST['montant'].'"/><br />
						De
						<select name="devise1" size="1">';
						for($i = 0;$i <= 2;$i++)
						{
							echo '<option value="'.$tabDevises[$i].'"';
							
							if($_POST['devise1'] == $tabDevises[$i])
								echo 'selected';								
							echo '>'.$tabDevises[$i].'</option>';
						}						
						echo'</select>
						
						<br />
						Vers
						<select name="devise2" size="1">';
						for($i = 0;$i <= 2;$i++)
						{
							echo '<option value="'.$tabDevises[$i].'"';
							
							if($_POST['devise2'] == $tabDevises[$i])
								echo 'selected';								
							echo '>'.$tabDevises[$i].'</option>';
						}	
						echo '</select>';
						
						
					echo '  <input type="submit" value="envoi"/></form>';
					
					$dev1 = $_POST['devise1'];
					$dev2 = $_POST['devise2'];
					
					if(		$dev1 == 'Euros' && $dev2 == 'Euros'
						||  $dev1 == 'Francs' && $dev2 == 'Francs'
						|| 	$dev1 == 'Dollars' && $dev2 == 'Dollars')
						$taux = 1;
					if($dev1 == 'Euros' && $dev2 == 'Francs')
						$taux = 6.55957;
					if($dev1 == 'Euros' && $dev2 == 'Dollars')
						$taux = 1.4434;				
					if($dev1 == 'Francs' && $dev2 == 'Euros')
						$taux = 1/6.55957;
					if($dev1 == 'Francs' && $dev2 == 'Dollars')
						$taux = 1.4434/6.55957;
					if($dev1 == 'Dollars' && $dev2 == 'Euros')
						$taux = 1/1.4434;
					if($dev1 == 'Dollars' && $dev2 == 'Francs')
						$taux = 6.55957/1.4434;
					
					$montantConverti = $_POST['montant']*$taux;
					
					echo 'Montant <input type="text" readonly value="'.$montantConverti.'"/> '.$dev2.'<br />';
					
					echo"<form action='tp9.php'>";
					echo '<br/><input type ="submit" value="Retour"/><center>';
					echo'</form>';
			}
		
		
		?>
	</div>
</body>
</html>