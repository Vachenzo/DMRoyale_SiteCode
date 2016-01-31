<HTML>
	<head>
		<style>
			img{
				padding:10px;
			}
		</style>
	</head>
	<body>
		<?PHP
		$dice = $_GET['dice'];

		if($dice==2){
			$roll = rand(1,2);
			echo "<img src='uploads/coin.png' height='50' width='50'>";
			if ($roll==1){
				echo "heads";
			}
			if ($roll==2){
				echo "tails";
			}
			else{}
		}
		if($dice==4){
			echo "<img src='uploads/d4.png' height='50' width='50'>";
			echo rand(1,4);
		}
		if($dice==6){
			echo "<img src='uploads/d6.png' height='50' width='50'>";
			echo rand(1,6);
		}
		if($dice==10){
			echo "<img src='uploads/d10.png' height='50' width='50'>";
			echo rand(1,10);
		}
		if($dice==12){
			echo "<img src='uploads/d12.png' height='50' width='50'>";
			echo rand(1,12);
		}
		if($dice==20){
			echo "<img src='uploads/d20_red.png' height='50' width='50'>";
			echo rand(1,20);
		}
		?>
		</br>
		<div id='2' style='float:left;;'>
			<a href='dice.php?dice=2'><img src='uploads/coin.png' height='50' width='50'></a>
		</div>
		<div id='4' style='float:left;;'>
			<a href='dice.php?dice=4'><img src='uploads/d4.png' height='50' width='50'></a>
		</div>
		<div id='6' style='float:left;;'>
			<a href='dice.php?dice=6'><img src='uploads/d6.png' height='50' width='50'></a>
		</div>
		<div id='10' style='float:left;;'>
			<a href='dice.php?dice=10'><img src='uploads/d10.png' height='50' width='50'></a>
		</div>
		<div id='12' style='float:left;;'>
			<a href='dice.php?dice=12'><img src='uploads/d12.png' height='50' width='50'></a>
		</div>
		<div id='20' style='float:left;;'>
			<a href='dice.php?dice=20'><img src='uploads/d20_red.png' height='50' width='50'></a>
		</div>
	</body>
</HTML>