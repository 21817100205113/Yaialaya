<?php
function ExitAlert($msg){
    exit("gg.alert('".$msg."')");
}

$JDecode = json_decode(file_get_contents('php://input'),true); 
$FileName = "LoginData.data";
$ScriptName = "~ZhLDvb7IFa2xKuwSkonqoMBeqFZw3";
$username= $JDecode["Username"];
$password=  $JDecode["Password"];
$uid= $JDecode["Uid"];
$content =json_decode(file_get_contents($FileName),true);
if ($content == null){
$content =[];
}

if(isset($username) == false||trim($username) == ""){
ExitAlert('Usuario Inválido');
}

if(isset($password) == false||trim($password) == ""){
ExitAlert('Senha Inválida');
}

if(isset($uid) == false||trim($uid) == ""){
ExitAlert('Dispositivo Inválido');
}

if($content[$username] <> null){
	if($content[$username]["password"] == $password){
	if($content[$username]["uid"] == $uid){
exit(file_get_contents($ScriptName));
} }
else{
ExitAlert('Senha Incorreta');
} 
	}
	else{
		ExitAlert("Usuário Incorreto");
		}
		if($content[$username]["uid"] != $uid){
		ExitAlert("ID Incorreto, Esperava-se Outro ID, Mais Encontrou: (".$uid.")");
		}
?>