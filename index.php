<!DOCTYPE html>

<html lang="pt">
	<head>
		<meta charset="utf-8" />
		<title>betateststart</title>
		<link rel="stylesheet" type="text/css" href="estilo.css" />
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
		<script type="text/javascript" src="script.js"></script>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>
		<link href='http://fonts.googleapis.com/css?family=Yesteryear' rel='stylesheet' type='text/css'>
	</head>
	
	<body>
		<header>
			<h1>todos</h1>
		</header>
				
		<div class="content">
			<article>
				<div class="noteSupBar"></div>
				
				<div class="noteBody">
				<?php
					$conn = mysql_connect("mysql.qlix.com.br", "betateststart", "");
      					$db = mysql_select_db("betateststart");
      					if (!$conn) {
						die('Não foi possível conectar: ' . mysql_error());
					}
      					     					
      					echo "<div class=\"inputLine\">";
      					echo "<form action=\"\" method=\"post\">";
					echo "<input class=\"inputField\" type=\"text\" name=\"item\" value=\"What needs to be done?\">";
					echo "<input class=\"submit\" type=\"submit\" name=\"submit\" value=\"\">";
					echo "</form>";
					echo "</div>";
      					
      					if(isset($_POST['item'])) {
      						mysql_query("INSERT INTO todo_list (todo_item) VALUES ('$_POST[item]')");

						/*if (!mysql_query($conn,$sql)) {
							die('Error: ' . mysql_error($conn));
						}*/

						/*echo "1 record added";*/
      					}
      					
      					$loop = mysql_query("SELECT * FROM todo_list") or die (mysql_error());
					
					$i = 0;
					while ($row = mysql_fetch_array($loop))
					{
						echo "<div class=\"noteLine\">" . "<p>" . $row['todo_item'] . "</p>";
						echo "<form class=\"delete\" action=\"\" method=\"post\">";
						echo "<input type=\"hidden\" name=\"delete_id\" value=\"" . $row['todo_id'] . "\" />";
						echo "<input class=\"button\" type=\"submit\" name=\"submit\" value=\"X\" />";
						echo "</form>";

						if(isset($_POST['delete_id'])) {
							$delete_id = $_POST['delete_id'];
							mysql_query("DELETE FROM todo_list WHERE todo_id='$delete_id'"); 
							/*header('Location: index.php');*/
						}
						
						$i++;
						echo "</div>";
					}
      					
      					mysql_close($conn);
				?>
				</div>
				
				<?php
					echo "<div class=\"lastLine\">" . "<p>" . $i . " items left" . "</p>" . "</div>";
				?>
				
			</article>
				
			<footer>
			
			</footer>
		</div>
	</body>
</html>