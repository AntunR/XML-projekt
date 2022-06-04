<?php
$email="";
$password="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
$priv=$_POST;
$email= $priv["email"];
$password= $priv["password"];
	
prijava($email,$password);
}

function prijava($email, $password) {
	
$xml=simplexml_load_file("korisnici.xml");
	
foreach ($xml->korisnik as $kor) {
  	$kore = $kor->email;
	$korp = $kor->password;
	$korime=$kor->ime;
	$korprezime=$kor->prezime;
	if($kore==$email){
		if($korp == $password){
			echo "Dobro došli $korime $korprezime";
			return;
			}
		else{
			echo "Krivo unesena lozinka";
			return;
			}
		}
	}
		
echo "Korisnik ne postoji.";
return;
}
?>

<html>
<head>
<title>Prijava</title>
</head>
<body>
<center>
<form action="" method="post">

<label>Email :</label><br>
<input id="email" name="email" type="email"><br>

<label>Lozinka :</label><br>
<input id="password" name="password" type="password"><br><br>

<input name="submit" type="submit" value=" Login "><br>

</form>
</center>
</body>
</html>
