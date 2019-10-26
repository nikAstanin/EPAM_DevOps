<!DOCTYPE html>
<html>
	<head>
	<meta charset = "UTF-8"/>
	<link rel = "stylesheet" href = "style/Main_style.css"/>
	<title>Lab_2_Ticks</title>
	<script src="scripts/Main_script.js"></script>
	</head>
	
	<body>

<?php include 'header.php'; ?>
        <main>
            <form id = "ticks" name = "ticks">
                <div id = "leftTicks">
                    <p><input type="checkbox" name = "firstCheckbox" value="1">1</p>
                    <p><input type="checkbox" name = "secondCheckbox" value="2">2</p>
                    <p><input type="checkbox" name = "thirdCheckbox" value="3">3</p>
                    <p><input type="checkbox" name = "fourthCheckbox" value="4">4</p>
                    <p><input type="checkbox" name = "fifthCheckbox" value="5">5</p>
                </div>
                <div id = "rightTicks">
                    <p><input type="checkbox" name = "sixthCheckbox" value="6">6</p>
                    <p><input type="checkbox" name = "seventhCheckbox" value="7">7</p>
                    <p><input type="checkbox" name = "eighthCheckbox" value="8">8</p>
                    <p><input type="checkbox" name = "ninthCheckbox" value="9">9</p>
                    <p><input type="checkbox" name = "tenthCheckbox" value="10">10</p>
                </div>
                
                <div>
                    <input type="button" value="Отметить всё">
                    <input type="button" value="Снять всё">
                    <input type="button" value="Инвертировать">
                </div>
                
            </form>
        </main>
<?php include 'footer.php'; ?>