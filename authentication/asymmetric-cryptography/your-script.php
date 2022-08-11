<?php
   // Generate a new private (and public) key pair
  $config = array(
    "digest_alg" => "sha512",
    "private_key_bits" => 4096,
    "private_key_type" => OPENSSL_KEYTYPE_RSA,
  );
  // Create the private and public key
  $keyPairRes = openssl_pkey_new();

  // extract private key from the pair
  openssl_pkey_export($keyPairRes, $newPrivateKey);

  // extract public key from the pair
  $publicKeyPem = openssl_pkey_get_details($keyPairRes)['key'];

  // write private key to file
  $privateFile = fopen('private.pem', 'w');
  fwrite($privateFile, $newPrivateKey) or die('Unable to open file');
  
  // write public key to file
  $publicFile = fopen('public.pem', 'w');
  fwrite($publicFile, $publicKeyPem) or die('Unable to open public key file');
  

  // read private key from file
  $private_key = openssl_pkey_get_private(file_get_contents('private.pem'));

  // read public key from file
  $public_key = openssl_pkey_get_public(file_get_contents('public.pem'));

  // Encrypt the data to $encrypted using the public key
  openssl_public_encrypt('data to encrypt', $encrypted, $public_key);
  
  // print the encrypted data
  echo $encrypted;

  // Decrypt the data using the private key and store the results in $decrypted
  openssl_private_decrypt($encrypted, $decrypted, $private_key);

  // print the decrypted data
  echo $decrypted;

?>