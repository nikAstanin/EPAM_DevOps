<!DOCTYPE html>
<html>
	<head>
	<meta charset = "UTF-8"/>
	<link rel = "stylesheet" href = "style/Main_style.css"/>
	<title>Lab_2_Form</title>
	<script src="scripts/Main_script.js"></script>
	</head>
	
	<body>

<?php include 'header.php'; ?>
			
			<main>
				<form name = "forma" id = "form">
					<span><h1>Личные данные</h1><span>На английском</span></span>
					<input type = "text" name = "surname" id = "input_surname" placeholder = "Фамилия">
					<label for = "input_surname">Фамилия</label><br/>
					<input type = "text" name = "name" id = "input_name" placeholder = "Имя">
					<label for = "input_name">Имя</label><br/>
					<input type = "text" name = "patronymic" id = "input_patronymic" placeholder = "Отчество">
					<label for = "input_patronymic">Отчество</label> <br/>
					<select name = "age_list[]" id = "spisok">
						<option value = "less_16">До 16</option>
						<option value = "_16_21">16-21</option>
						<option value = "_21_27">21-27</option>
						<option value = "_27_35">27-35</option>
						<option value = "_35_45">35-45</option>
						<option value = "_45_55">45-55</option>
						<option value = "more_55">Больше 55</option>
					</select>
					<label for = "spisok">Выберите возраст</label><br/>
					<p><b>О себе</b></p>
					<textarea name = "about_yourself"></textarea>
					<input type = "button" onclick = "valid(document.getElementById('form'))" name = "submit" id = "button_submit" value = "ПЕРЕЙТИ"/>
				</form>
			</main>
			
<?php include 'footer.php'; ?>