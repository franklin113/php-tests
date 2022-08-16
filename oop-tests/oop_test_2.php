<?php 

$num = 1;

$curUrl = "http://codewars.com/kata/php-in-action-number-2-http-get-method/train/php/?avocado=avocado-core&banana=banana-core&dragonfruit=dragon-core";

$_GET['avocado'] = "avocado-core<script>HELLO</script>";
$_GET['banana'] = "banana-core";
$_GET['dragonfruit'] = "dragon-core";

function fetchQueryParams(){
  $vars = array();
  $vars['avacodo'] = htmlspecialchars( $_GET['avocado']);
  $vars['banana'] = htmlspecialchars( $_GET['banana']);
  $vars['dragonfruit'] = htmlspecialchars( $_GET['dragonfruit']);
  return $vars;
}




foreach (fetchQueryParams() as $k => $v) {
  echo $k . " => " . $v . "\n";
} 


?>