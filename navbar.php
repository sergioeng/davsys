<?php
/// SENG: tenho que ver se irei usar isso ou nao !!!
//echo "filename=[$filename]";
	if ($filename == "clientes") {
		$active = "clientes";
	} else if ($filename == "produtos" ) {
		$active = "produtos";
	} else if ($filename == "colaboradores") {
		$active = "colaboradores";
	} else if ($filename == "relatorios") {
		$active = "relatorios";
	} else {
		$active = "home";
	}

?>


<div id="navigation" class="margintop">
	<ul id="nav">
		<li><a href="index.php" <?php if ($active == "home") { echo "class='active'"; }; ?>>Principal</a></li>
		<li><a href="clientes.php" <?php if ($active == "clientes") { echo "class='active'"; }; ?>>Clientes</a></li>
		<li><a href="produtos.php" <?php if ($active == "produtos") { echo "class='active'"; }; ?>>Produtos</a>
			<ul>
				<li><a href="leaders_scores.php">Top 100 Scores</a></li>
				<li><a href="leaders_games.php">Top 100 Games Played</a></li>
			</ul>
		</li>
		<li><a href="main_colaborador.php" <?php if ($active == "colaboradores") { echo "class='active'"; }; ?>>Colaboradores</a></li>
		<li><a href="relatorios.php"    <?php if ($active == "relatorios") { echo "class='active'"; }; ?>>Relatorios</a></li>
		<li><a href="help.php" <?php if ($active == "about") { echo "class='active'"; }; ?>>Help</a></li>
	</ul>
</div> 
<div class="nav-shadow"></div>
