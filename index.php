﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>Bienvenue !</title>
	<meta http-equiv="content-type" 
		content="text/html;charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="design_js.css" />
	
	<script type="text/javascript">
		function error()
		{
			alert("Oui bon ça va j'ai pas réussi à le virer de la banniere...");
		}
		
		function afficher(pNom,pPosX)
		{
			var chaine = pNom;
			
			chaine = chaine + "Bis";
			document.getElementById(pNom).style.visibility = "visible";
			document.getElementById(pNom).style.left = pPosX;
			document.getElementById(pNom).style.top = document.getElementById(chaine).offsetTop + 42+ "px";
			
			if(pNom != "menu9")
			{
				document.getElementById('info').style.textAlign = "left";
			}
		}
		function cacher(pNom)
		{
			document.getElementById(pNom).style.visibility = "hidden";
			document.getElementById(pNom).style.left = "0px";
			document.getElementById(pNom).style.top = "0px";
			
			document.getElementById('info').style.textAlign = "center";
		}	
	</script>
</head>

<body>

	<div id="banniere">
		<img usemap="#mymap" src="Images/banniere.png" alt="map"/>
		<map id="mymap" name="mymap"> <!-- map = zone générale -->
		<!--  area zone précise -->	
		<area shape="rect" coords="680,40 760,55" href="index_sansjs.html" onClick="error()" target="blank" alt="Cliquer ici" />

	</map>
	</div>
	<div id="menu">
		 <p>
		<ul>	
			<li><a href="TP1/tp1.html">TP1</a><br/></li>
			<li><a href="TP2/tp2.html">TP2</a><br/></li>
			<li><a href="TP3/tp3.html">TP3</a><br/></li>
			<li><a href="TP4/tp4.html">TP4</a><br/></li>
			<li><a href="TP5/tp5.html">TP5</a><br/></li>
			<li id='menu6Bis' onMouseOver="afficher('menu6','45.5%')" onMouseOut="cacher('menu6')"><span class="lien">TP6</span><br/></li>
			<li><a href="TP7/tp7.html">TP7</a><br/></li>
			<li id='menu8Bis' onMouseOver="afficher('menu8','57.5%')" onMouseOut="cacher('menu8')"><span class="lien">TP8</span><br/></li>
			<li><a href="TP8Bis/tp8bis.html">TP8Bis</a><br/></li>
			<li id='menu9Bis' onMouseOver="afficher('menu9','69.5%')" onMouseOut="cacher('menu9')"><span class="lien">TP9</span><br/></li>
		<ul>
		
		
		<div id="menu6" class="menuCache" onMouseOver="afficher('menu6','45.5%')" onMouseOut="cacher('menu6')">
		<a href="TP6/cv_css.html">TP6_1 Avec CSS</a><br />
		<a href="TP6/cv.html">TP6_1 Sans CSS</a><br />
		<a href="TP6/ex2_css.html">TP6_2 Avec CSS</a><br />
		<a href="TP6/ex2.html">TP6_2 Sans CSS</a><br />
		</div>
		
		<div id="menu8" class="menuCache" onMouseOver="afficher('menu8','57.5%')" onMouseOut="cacher('menu8')">
		<a href="TP8/carre.html">Carré Magique</a><br />
		<a href="TP8/menu.html">Menu magique</a><br />
		</div>
		
		<div id="menu9" class="menuCache" onMouseOver="afficher('menu9','69.5%')" onMouseOut="cacher('menu9')">
		<a href="TP9/tp9.php">Partie1 PHP</a><br />
		<a href="TP9/calc.html">Calculatrice JS</a><br />
		</div>
		
	</div>
	 </p>
	
	<div id="main">
		<br /><h1 id="info"><span class="etoile">**</span> Informations <span class="etoile">**</span></h1>
		<hr />
			
			<p>
				Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
				<br />Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur 
				<br />ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. 
				<br />Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.
				<br />In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. 
				<br />Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. 
				<br />Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.
				<br />Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue.
				<br />Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus,
				<br />sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. 
				<br />Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante.
				<br />Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. 
				<br />Sed consequat, leo eget bibendum sodales, augue velit cursus nunc.
			</p>
	</div>
	
	<div id="pied_page">
			<img src='Images/validator.png' alt="Validator"/>
			<a href='mailto:guillaume.sainthillier@univ-tlse2.fr'>SAINTHILLIER Guillaume</a>
			<br />I.U.T Blagnac 
	</div>

</body>
</html>