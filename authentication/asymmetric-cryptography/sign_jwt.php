<?php
  $header = json_encode(['typ' => 'JWT', 'alg' => 'RS256']);

  $payload = json_encode(['user_id' => 123]);

  // base64url encode header
  $base64UrlHeader = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($header));

  // base64url encode payload
  $base64UrlPayload = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($payload));

  $privateKey = file_get_contents('private.pem');
  // create signature hash
  $signature = hash_hmac('sha256', $base64UrlHeader . "." . $base64UrlPayload, $privateKey , true);

  // base64url encode signature
  $base64UrlSignature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($signature));

  // create  JWT
  $jwt = $base64UrlHeader . "." . $base64UrlPayload . "." . $base64UrlSignature;

  echo $jwt;

  $jwtFile = fopen('jwt.txt', 'w');
  fwrite($jwtFile, $jwt) or die('Unable to open file');

?>