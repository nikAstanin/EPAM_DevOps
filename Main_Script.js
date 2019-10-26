function logo_click(logo)
{	
	var count = 0;
	var timer = setInterval(function() 
	{
		count += 8;		
		logo.style.marginLeft = count + 'px';
		
		if (count/8 >= 75){
			clearInterval(timer);
			var new_timer = setInterval(function() 
			{
				count -= 8;
				logo.style.marginLeft = count + 'px';
				
				if (count/8 <= 0)
				clearInterval(new_timer);
			
			}, 20);
			//logo.style.marginLeft = 0 + 'px';
		}		

	}, 20);	
}
	
var counter = 0;

function timer()
{
	counter++;
	document.getElementById("count").innerHTML = counter;
	setTimeout("timer()", 1000);
	if (counter == 3)
	window.location = "../index.php"
}

function valid (form)
{
	var fail = false;
	var surname = form.surname.value;
	var name = form.name.value;
	var patronymic = form.patronymic.value;
	var error_list = "";
	
	var proverka = /[a-z]{1,15}/i;
	
	if(proverka.test(surname) == false)
	{
		fail = true;
		error_list += "Введите фамилию правильно";
	}
	if(proverka.test(name) == false)
	{
		fail = true;
		error_list += "\nВведите имя правильно";
	}
	if(proverka.test(patronymic) == false)
	{
		fail = true;
		error_list += "\nВведите отчество правильно";
	}
	
	if(fail)
	{
		alert(error_list)
	}
	else
	{
		alert("ЧЁТКО");
		window.location = "../index.php";
	}	
}