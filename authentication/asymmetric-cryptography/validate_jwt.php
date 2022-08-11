<?php 
  
// read the jwt
$jwtStr = file_get_contents('jwt.txt');

// split the jwt into its parts
$jwtParts = explode('.', $jwtStr);

// decode header
$jwtHeader = json_decode(base64_decode($jwtParts[0]));

// decode payload
$jwtPayload = json_decode(base64_decode($jwtParts[1]));

// read in the public key
$privateKey = file_get_contents('private.pem');

// decode provided signature
$providedJwtSignature = $jwtParts[2];

// create signature hash

$testSignature = hash_hmac('sha256', $jwtParts[0] . "." . $jwtParts[1], $privateKey , true);
$base64EncodedTestSignature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($testSignature));

$isValidSignature = $providedJwtSignature === $base64EncodedTestSignature;

if ($isValidSignature) {
  echo "Signature is valid";
} else {
  echo "Signature is invalid";
}




?>