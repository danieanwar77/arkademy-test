<?php
function ReturnJson (string $name, int $age, string $address, bool $is_married, array $list_school, array $skills, bool $interest_in_coding){

	$json_array = array('Name'=>$name, 'Age'=>$age, 'Address'=>$address, 'Is Married'=>$is_married, 'List of School'=>$list_school, 'Skills'=>$skills, 'Interest in Coding'=>$interest_in_coding);

	header('Content-Type: application/json');
	echo json_encode($json_array);

}

$name = "Danie Anwar";
$age = 25;
$address = "JL. Teleponia Raya No.6 Komplek Telkom, Cibeureum, Cimahi Selatan, Kota Cimahi";
$is_married = false;

class school
{
    public $name;
    public $year_in;
    public $year_out;
    public $major;
}

$mySd = new school();
$mySd->name = "SD Islam Hidayatullah Semarang";
$mySd->year_in = "2001";
$mySd->year_out = "2007";
$mySd->major = null;

$mySmp = new school();
$mySmp->name = "SMPN 7 Cimahi";
$mySmp->year_in = "2007";
$mySmp->year_out = "2010";
$mySmp->major = null;

$mySma = new school();
$mySma->name = "SMK TI Pembangunan Cimahi";
$mySma->year_in = "2010";
$mySma->year_out = "2013";
$mySma->major = "Software Engineering";

$myColl = new school();
$myColl->name = "Universitas Komputer Indonesia Bandung";
$myColl->year_in = "2013";
$myColl->year_out = "2020";
$myColl->major = "Informatics Engineering";

$list_school = array($mySd, $mySmp, $mySma, $myColl);

class skill
{
	public $skill_name;
	public $level;
}

$myHtml = new skill();
$myHtml->skill_name = "HTML";
$myHtml->level = "Advanced";

$myCss = new skill();
$myCss->skill_name = "CSS";
$myCss->level = "Advanced";

$myPhp = new skill();
$myPhp->skill_name = "PHP";
$myPhp->level = "Advanced";

$mySql = new skill();
$mySql->skill_name = "MySQL";
$mySql->level = "Advanced";

$myJs = new skill();
$myJs->skill_name = "JavaScript";
$myJs->level = "Beginner";

$skills = array($myHtml, $myCss, $myPhp, $mySql, $myJs);

$interest_in_coding = true;

ReturnJson($name,$age,$address,$is_married,$list_school,$skills,$interest_in_coding);
?>