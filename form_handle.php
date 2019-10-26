<?php 

	$surname = $_POST['surname'];
	$name = $_POST['name'];
	$patronymic = $_POST['patronymic'];

    $errors = [
        'surname' => check($surname, "Поле с фамилией"),
        'name' => check($name, "Поле с именем"),
        'patronymic' => check($patronymic, "Поле с отчеством")
    ];

   
    if(empty($errors['surname']) && empty($errors['name']) && empty($errors['patronymic'])) {
        header('Location: '.'/index.php?result='.urlencode("Ошибок нет"), true, 302);
        exit();
    } else {
        header('Location: '.'/FormWithPHP.php?errors[]='.urlencode($errors['surname'])
													    .'&errors[]='.urlencode($errors['name'])
													    .'&errors[]='.urlencode($errors['patronymic']), true, 302);
        exit();
    }

    function check ($var, $field_name) {
        $regex = "/[a-zA-Z]{1,}/";
        
        if (strlen($var) == 0) {
            return $field_name . " необходимо заполнить!";
        }
        
        if (!preg_match($regex, $var)) {
            return $field_name . " ввод только латиницей!";
        }
        
        return "";
    }
?>