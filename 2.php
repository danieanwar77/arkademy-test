
<?php
function tes($user,$pass){

	$countuser = strlen($user);
	$countpass = strlen($pass);

	if($countuser == 7 && $countpass == 7)
	{

		$number = 0;
		$max = 2;
		$pieces = explode("*", $pass);

		$str1 = $pieces[0];
		$str2 = $pieces[1];

		if (preg_match("/^[A-Z]+$/", $user) && is_numeric($str1) && preg_match("/^[a-zA-Z]+$/", $str2))

		{
			while($number < $max)
			{
				if($str1[$number] == $str1[$number+1])
				{
					$results1[] = "sama ";
				}
				if($str1[$number] != $str1[$number+1])
				{
					$results1[] = "beda";
				}

				$number++;
			}

			if(preg_grep("/beda/", $results1)) {
			  $return1 = "false";
			} else {
			  $return1 = "true";
			}

			$number = 0;

			while($number < $max)
			{
				if($str2[$number] == $str2[$number+1])
				{
					$results2[] = "sama";
				}
				if($str2[$number] != $str2[$number+1])
				{
					$results2[] = "beda";
				}

				$number++;
			}

			if(preg_grep("/beda/", $results2)) {
			  $return2 = "false";
			} else {
			  $return2 = "true";
			}

			if($return1 == "true" && $return2 == "true")
			{
				echo "True";
			}

			else 
			{
				if($return1 == "false")
				{
					echo "Kombinasi Password pertama tidak sama";
				}

				if($return2 == "false")
				{
					echo "Kombinasi Password kedua tidak sama";
				}
			}
		}

		else

		{	
			if(!preg_match("/^[A-Z]+$/", $user))
			{
				echo "Username yang dimasukkan tidak memiliki kombinasi huruf besar";
			}

			if(!is_numeric($str1))
			{
				echo "Kombinasi Password pertama yang dimasukkan bukan angka";
			}

			if(!preg_match("/^[a-zA-Z]+$/", $str2))
			{
				echo "Kombinasi Password kedua yang dimasukkan bukan huruf";
			}

		}
	}

	else

	{
		echo "jumlah Username atau Password kurang atau lebih dari 7";
	}
}

$user = "TAKUMII";
$pass  = "111*ccc";
tes($user,$pass);

?>
