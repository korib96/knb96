<?php

//error_reporting(0);
date_default_timezone_set("Asia/Jakarta");
function clear()
{
  system("clear");
}
clear();
/* STARD BECGROUND */
$res="\033[0m";
$hitam="\033[0;30m";
$putih="\033[0;37m";
$putih2="\033[1;37m";
$red="\033[0;31m";
$red2="\033[1;31m";
$green="\033[0;32m";
$green2="\033[1;32m";
$yellow="\033[0;33m";
$yellow2="\033[1;33m";
$blue="\033[0;34m";
$blue2="\033[1;34m";
$purple="\033[0;35m";
$lblue="\033[0;36m";
$lblue2="\033[1;36m";
$ungu="\33[1;31m";
$hijau="\33[1;32m";
$kuning="\33[1;33m";
$ungu="\33[1;34m";
$ungu1="\33[1;35m";
$biru="\33[1;36m";
$putih="\33[1;37m";
$kuningg="\[\033[4;33m\]";
//warna background
$bhijau ="\033[42m";
$bmerah="\033[41m";
$bkuning="\033[43m";
$bputih="\033[47m";
$bbiru="\033[44m";
$bungu="\033[45m";
$bmuda="\033[46m";
$bhitam="\033[40m";
$mr ="\33[1;44m";
$mrt ="\33[1;41m";
$ung ="\33[1;45m";
$bir ="\33[1;46m";
$nrm="\33[0m";


function curl($url, $post = 0, $httpheader = 0, $proxy = 0)
{
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
    curl_setopt($ch, CURLOPT_TIMEOUT, 60);
    curl_setopt($ch, CURLOPT_HEADER, true);

    if ($post) {
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    }

    if ($httpheader) {
        curl_setopt($ch, CURLOPT_HTTPHEADER, $httpheader);
    }

    if ($proxy) {
        curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, true);
        curl_setopt($ch, CURLOPT_PROXY, $proxy);

        // curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5);
    }

    $response = curl_exec($ch);

    // Error handling
    if ($response === false) {
        return [null, null];
    }

    $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);

    $header = substr($response, 0, $header_size);
    $body   = substr($response, $header_size);

    // Tidak perlu lagi di PHP 8+
    // curl_close($ch);

    return [$header, $body];
}
function curl_get($url, $host)
{
  return curl($url, "", $host)[1];
}
function curl_post($url, $data, $host)
{
  return curl($url, $data, $host)[1];
}


function slow($str, $t)
{
  $arr = str_split($str);
  foreach ($arr as $az) {
    echo $az;
    usleep($t);
  }
}

function getKey($str)
{
	$bytes = hash('md5', $str, true);
	return $bytes;
}
function decode($hexString)
{
	$key = getKey("xdrCFTKey");
	$decrypted = openssl_decrypt(hex2bin($hexString), 'AES-128-ECB', $key, OPENSSL_RAW_DATA);
	return $decrypted;
}
function encode($str)
{  
	$key = getKey('xdrCFTKey');
	$encrypted = openssl_encrypt($str, 'AES-128-ECB', $key, OPENSSL_RAW_DATA);
	return bin2hex($encrypted);
}

function decode1($hexString)
{
	$key = getKey("weTrustInNDK");
	$decrypted = openssl_decrypt(hex2bin($hexString), 'AES-128-ECB', $key, OPENSSL_RAW_DATA);
	return $decrypted;
}
function encode1($str)
{  
	$key = getKey('weTrustInNDK');
	$encrypted = openssl_encrypt($str, 'AES-128-ECB', $key, OPENSSL_RAW_DATA);
	return bin2hex($encrypted);
}




$host = "desert-looters-app-a393866a580b.herokuapp.com";
$pkg = "com.app.desert.looters.hero";
$ua = [
"currency: USD",
"Connection: close",
"isFakeUser: false",
"version: 1.1",
"versionName: 1.1",
"language: Indonesian",
"versionCode: 2",
"packageName: com.app.desert.looters.hero",
"isDeviceEmulator: false",
"rentappsetup: true",
"authcode: s6q:g89g;;>",
"Content-Type: application/json; charset=utf-8",
"Host: desert-looters-app-a393866a580b.herokuapp.com",
"User-Agent: okhttp/5.0.0-alpha.14"
];

$ua1 = [
"language: in",
"versionName: 1.1",
"isProduction: true",
"monetizationLibVersion: 1.1.6",
"packageName: com.app.desert.looters.hero",
"isDeviceEmulator: false",
"Content-Type: application/json; charset=utf-8",
"Host: givvy-general-config.herokuapp.com",
"Connection: Keep-Alive",
"User-Agent: okhttp/5.0.0-alpha.14"
];






$userid = "6a055181ff01de00022d9cd0";

$ts = round(microtime(true) * 1000);
$url="https://".$host."/getUser";
$datt = '{"userId":"'.$userid.'","verts":'.$ts.'}';
$datah=json_encode([
	"verificationCode" => encode($datt)
		]);
$res=json_decode(curl_post($url,$datah,$ua), true);

$nama=$res['result']['name'];
$poin=$res['result']['credits'];
$usd=$res['result']['userBalance'];
$id =$res['result']['id'];

 $res1 = json_decode(curl_post("https://freeipapi.com/api/json", [], ""), true);
  $ip =$res1['ipAddress'];
  $date = date("H:i:s", time());
echo $baner =slow("$lblue2
██╗  ██╗███╗   ██╗██████╗  █████╗  ██████╗ 
██║ ██╔╝████╗  ██║██╔══██╗██╔══██╗██╔════╝ 
█████╔╝ ██╔██╗ ██║██████╔╝╚██████║███████╗$putih2 
██╔═██╗ ██║╚██╗██║██╔══██╗ ╚═══██║██╔═══██╗
██║  ██╗██║ ╚████║██████╔╝ █████╔╝╚██████╔╝
╚═╝  ╚═╝╚═╝  ╚═══╝╚═════╝  ╚════╝  ╚═════╝\n",1000);
echo $lblue2, slow("[☯] ".$green2."IP    ".$lblue2."[#] ".$putih2."".$ip."".$red2."     \n",1000);
echo $lblue2, slow("[☯] ".$green2."USER  ".$lblue2."[#] ".$putih2."".$nama."".$red2."     \n",1000);
echo $lblue2, slow("[☯] ".$green2."KOIN  ".$lblue2."[#] ".$putih2."".$poin."".$red2."    \n",1000);
echo $lblue2, slow("[☯] ".$green2."USD   ".$lblue2."[#] ".$putih2."".$usd."".$red2."          ".$ungu1."".$date."\n",1000);
echo $red2, "────⋆⋅☆⋅⋆─────⋆⋅☆⋅⋆─────⋆⋅☆⋅⋆─────⋆⋅☆⋅⋆────\n";

