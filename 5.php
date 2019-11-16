<?php
function CreateTriangle($i)
{
	$j = 1;
	$k = 1;
	while($j <= $i)
	{
		while($k <= $i)
		{
			if($k > $i-$j)
			{
				echo "*";
			}			
			else
			{
				echo "_";
			}
			$k++;
		}
		echo "<br>";
		$j++;
		$k = 1;
	}
}
$i = 5;
CreateTriangle($i);
?>