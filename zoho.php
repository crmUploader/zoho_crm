<?php 
echo 'Module Name: '. $_GET['module'].'<br>';
$client_id 			= "Client_Id";
$client_secret 		= "Client_secret";
$code 				= "code";
$base_accounts_url 	= "https://accounts.zoho.com";
$service_url 		= "https://creator.zoho.com";
$token_url   		= $base_accounts_url."/oauth/v2/token?grant_type=authorization_code&client_id=".$client_id."&client_secret=".$client_secret."&redirect_uri=http://localhost/&code=".$code;

$refresh_token 		= "refresh_token";
// refresh_token($token_url);

function refresh_token($url){
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_URL, $url); 
	curl_setopt($ch, CURLOPT_POST, 1);
	$content = curl_exec($ch);
	curl_close($ch);
	var_dump($content);
}
// die;

// // print_r($refresh_token);die;
function generate_access_token($url){
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_URL, $url); 
	curl_setopt($ch, CURLOPT_POST, 1);
	return $content = json_decode(curl_exec($ch));
}

$access_token_url = $base_accounts_url."/oauth/v2/token?refresh_token=".$refresh_token."&client_id=".$client_id."&client_secret=".$client_secret."&grant_type=refresh_token";
$access_token =  generate_access_token($access_token_url)->access_token;



function get_records($access_token,$module){
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "https://www.zohoapis.com/crm/v2/".$module); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($ch, CURLOPT_HTTPHEADER,array(
		
					'Authorization: Zoho-oauthtoken ' . $access_token,
					'Content-Type: application/x-www-form-urlencoded'
	));
	return $content = json_decode(curl_exec($ch));
}

$selectedReports = get_records($access_token,$_GET['module']);

?>
