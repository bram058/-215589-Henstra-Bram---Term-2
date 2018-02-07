<!DOCTYPE html>
<style>
#rcorners1 {
    border-radius: 25px;
    border: 2px solid #73AD21;
    padding: 20px;
    width: 250px;
    height: 370px;
	font-family: monospace;
	text-align: left;
	color: white;
	position: absolute;
    left: 10px;
    top: 150px;
	}

	#rcorners2 {
    border-radius: 25px;
    border: 2px solid #73AD21;
    padding: 20px;
    width: 1470px;
    height: 40px;
	position: absolute;
	font-family: monospace;
	color: white;
	text-align: center;
	font-size: 40px;
    left: 10px;
    top: 65px;
	}

</style>
</html>


<?php
	include_once 'headermem.php'
?>

<section class="main-container">
	<div class="main-wrapper">
		<p id="rcorners2">Welcome to memory, login to continue</p>
		<?php
			if (isset($_SESSION['u_id'])) {
				echo '<p id="rcorners1">';
				
				echo '<form action="Memory8.html">
    			<input type="submit" value="8 Card Mode" style="height:60px; width:200px; position: absolute;  left: 55px; top: 175px;"/>
				</form>	
				<br></br>

				<form action="Memory16.html">
   			    <input type="submit" value="16 Card Mode" style="height:60px; width:200px; position: absolute;  left: 55px; top: 275px;"/>"/>
				</form>
				<br></br>

				<form action="Memory32.html">
    			<input type="submit" value="32 Card Mode" style="height:60px; width:200px; position: absolute;  left: 55px; top: 375px;"/>"/>
				</form>
				<br></br>

				<form action="Memory64.html">
   			    <input type="submit" value="64 Card Mode" style="height:60px; width:200px; position: absolute;  left: 55px; top: 475px;"/>"/>
				</form>';
				echo "</p>";

			}
		?>
	</div>
</section>

<?php
	include_once 'footermem.php'
?>
