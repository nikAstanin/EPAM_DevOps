<?php
$path_to_xml = 'xml-file.xml';
?>
	
<!DOCTYPE html>
<html>
	<head>
		<meta charset = "UTF-8"/>
		<link rel = "stylesheet" href = "style/Main_style.css"/>
		<title>Lab_6</title>
		<script src="scripts/Main_script.js"></script>
	</head>
	
	<body>

<?php include 'header.php'; ?>
	<main class = "farm">
		<script>
			// When the user clicks on div, open the popup
			function myFunction(id) 
			{
				ajax_zap(id);
				var popup = document.getElementById(id);
				popup.classList.toggle("show");
			}
			function ajax_zap(id) 
			{
				var hr = false;
				if (window.XMLHttpRequest) 
				{ // Mozilla, Safari, ...
					hr = new XMLHttpRequest();
				} 
				else if (window.ActiveXObject) 
				{ // IE
					try 
					{
						hr = new ActiveXObject("Msxml2.XMLHTTP");
					} 
					catch (e) 
					{
						try 
						{
							hr = new ActiveXObject("Microsoft.XMLHTTP");
						}
						catch (e) 
						{
							
						}
					}
				}
				if (!hr) 
				{
					alert('Не вышло :( Невозможно создать экземпляр класса XMLHTTP ');
					return false;
				}
				var arr;
				hr.open('GET','server.php?id='+id, true);
				hr.send();
				hr.onreadystatechange = function()
				{
					if ((hr.readyState == 4)&&(hr.status == 200))
					{
						var res = hr.responseText;
						arr = JSON.parse(res);
						var div =  document.getElementById(id);
						for(var i=0; i<=arr[id]['parList'].length;)
						{
							var pp = document.createElement('P');
							pp.innerHTML =arr[id]['parList'][i]['parName'] +" "+arr[id]['parList'][i]['parDescr'];
							div.appendChild(pp);
							i++;
						}
					}
				}
			}
			function del(id)
			{
				document.getElementById(id).innerHTML = "";
			}  
    	</script>


<?php
	$dom = new DOMDocument('1.0', 'utf-8');
	$dom->load('xml-file.xml');
	$root = $dom->documentElement;
	$farmacopy = $dom ->getElementsByTagName("medicament");
	$mass = array();
		foreach ($farmacopy as $medicament) 
		{
			{
				$id=$medicament->getAttribute("id");

				$names = $medicament->getElementsByTagName("name");
				$name = $names ->item(0)->nodeValue;
				
				$prices = $medicament->getElementsByTagName("price");
				$price = $prices ->item(0)->nodeValue;
				
				$serial_numbers = $medicament->getElementsByTagName("serial_number");
				$serial_number = $serial_numbers ->item(0)->nodeValue;
				
				$countries = $medicament->getElementsByTagName("country");
				$country = $countries ->item(0)->nodeValue;
				
				$expiration_years = $medicament->getElementsByTagName("expiration_year");
				$expiration_year = $expiration_years ->item(0)->nodeValue;
				
				$types = $medicament->getElementsByTagName("type");
				$type = $types ->item(0)->nodeValue;
				
				$active_substancess = $medicament->getElementsByTagName("active_substances");
				$active_substances = $active_substancess ->item(0)->nodeValue;
				
				$purposes = $medicament->getElementsByTagName("purpose");
				$purpose = $purposes ->item(0)->nodeValue;
				
				$imgs = $medicament->getElementsByTagName("img");
				$img = $imgs -> item(0) -> nodeValue;

				$mass = array("id" => $id,"name" => $name, "price" => $price,"serial_number" => $serial_number,"country" => $country,"expiration_year" => $expiration_year,"active_substances" => $active_substances,"type" => $type,"img" => $img,"purpose" => $purpose);
				output($id, $name, $price, $serial_number, $country, $expiration_year, $active_substances, $type, $img, $purpose);

				$i=0;
                $paramList = $medicament->getElementsByTagName("param");  
                foreach( $paramList as $param )
                {
                  $parNames=$param->getElementsByTagName("parName");
                  $parName=$parNames->item(0)->nodeValue;

                  $parDescrs=$param->getElementsByTagName("parDescr");
                  $parDescr=$parDescrs->item(0)->nodeValue;

                  $mass[$id]["paramList"][$i]["parNames"] = $parName;
                  $mass[$id]["paramList"][$i++]["parDescr"] = $parDescr;
                }
			}
		}
	function output($id, $name, $price, $serial_number, $country, $expiration_year, $active_substances, $type, $img, $purpose)
	{
	echo '
			<table class = "xml_output">
			<tr>
			<th class ="imgCell">
			<img width="300px" height="300px" src=" '.$img.' "/>
			</th>
			<th>
            <p>Продукт:
            <i>'.$name.'</i></p><hr>
			<p>Цена:
            <i>'.$price.'</i></p><hr>
			<p>Код продукта:
            <i>'.$serial_number.'</i></p><hr>
			<p>Страна-производитель:
            <i>'.$country.'</i></p><hr>
			<p>Срок годности:
            <i>'.$expiration_year.'</i></p><hr>
            <p>Тип продукта:
            <i>'.$type.'</i></p><hr>
            <p>Активные вещества:
            <i>'.$active_substances.'</i></p><hr>
			<p>Назначение:
            <i>'.$purpose.'</i></p>
			<div class="popup" onclick="myFunction('.$id.');del('.$id.')">Подробнее
			<div class="popuptext" id="'.$id.'"></div>
		    </th>
			</table>
	';}
?>
	</main>
<?php include 'footer.php'; ?>