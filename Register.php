<?php
function ExitAlert($msg){
    exit("gg.alert('".$msg."') os.exit()");
}

$JDecode = json_decode(file_get_contents('php://input'),true); 
$FileName = "LoginData.data";
$FileName2 = "User_Check.lua";
$username= $JDecode["Username"];
$password=  $JDecode["Password"];
$uid=  $JDecode["Uid"];
$DiaV= $JDecode["VDia"];
$MesV= $JDecode["VMes"];
$AnoV= $JDecode["VAno"];
$SignsV= $JDecode["Signs"];
$content =json_decode(file_get_contents($FileName),true);
$content2 = file_get_contents($FileName2);
if ($content == null){
$content =[];
}
if ($content2 == null){
$content2 =[];
}

#if(isset($username) == false||trim($username) == ""){
#ExitAlert('Usuário Inválido');
#}

#if(isset($password) == false||trim($password) == ""){
#ExitAlert('Senha Inválida');
#}

#if(isset($uid) == false||trim($uid) == ""){
#ExitAlert('Dispositivo Inválido');
#}

if($content[$username] == null){
	$content[$username] =  array(
    "password" => $password, 
    "uid" => $uid );
    file_put_contents($FileName,json_encode($content,true));
    file_put_contents($FileName2,$content2."\n\nif uid == '".$uid."' then\nDia = ".$DiaV."\nMes = ".$MesV."\nAno = ".$AnoV."\n".$SignsV."\nend",true);
    ExitAlert("Usuário Cadastrado Com Sucesso!!!");
	}
	else{
		ExitAlert("Este Usuário Já Existe");
		}
?>