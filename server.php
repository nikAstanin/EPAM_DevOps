<?php
  if (isset($_GET["id"]))
  {
    $myid= $_GET["id"];
	$path_to_xml = 'xml-file.xml';
    $arr = serList($path_to_xml,$myid);
    echo json_encode($arr);
  }
?>

<?php
    function serList($path_to_xml,$myid)
    {
        $arr = array();
		if(file_exists($path_to_xml))
        {
			$dom = new DOMDocument('1.0', 'utf-8');
			$dom->load($path_to_xml);
			if($path_to_xml !== false)
            {
				$farm = $dom->getElementsByTagName('medicament' );
				foreach ($farm as $medicament)
                {
                    $id=$medicament->getAttribute( "id" );
                    if ($id == $myid)
                    {
                        $i=0;
                        $parList = $medicament->getElementsByTagName( "param" );
                        foreach( $parList as $param )
                        {
                            $parNames=$param->getElementsByTagName( "parName" );
                            $parName=$parNames->item(0)->nodeValue;
                            $parDescrs=$param->getElementsByTagName( "parDescr" );
                            $parDescr=$parDescrs->item(0)->nodeValue;
                            $arr[$id]["parList"][$i]["parName"] = $parName;
                            $arr[$id]["parList"][$i++]["parDescr"] = $parDescr;
                        }
                        return $arr;
                    }
				}
			}
            else
            {
				echo "XML Error";
			}
		}
        else
        {
			echo "xml FILE NOT FIND .";
		}
    }
?>
