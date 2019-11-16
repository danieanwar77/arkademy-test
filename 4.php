<?php
function findPair($array){

	$totalpair = 0;

	if (is_array($array))
	{
			$my_array_values = array_count_values($array);
			while (list ($key, $val) = each ($my_array_values))
			{
				if($val > 1)
				{
			   		$totalpair++;
			   	}
			}

			echo "Jumlah Pasangan Kaos Kaki = " . $totalpair;
	}
	else
	{
		echo "Data bukan Array";
	}
}
$array = array(20,50,70,10,70,30,10,30,50);
findPair($array);
?>