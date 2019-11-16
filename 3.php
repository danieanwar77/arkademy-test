
<?php
function cek_kata($string){

	$number = 0;
	$total = 0;
	$pieces = explode(" ", $string);
	$count = count($pieces);

	while ($number < $count)
	{
		if (preg_match("/^[a-zA-Z]+$/", $pieces[$number]))
		{
			$total = $total + 1;
		}
		$number++;
	}

	echo $total."/".$count;
}

$string  = "121 121 411 arka arka demy demy";
cek_kata($string);

?>
