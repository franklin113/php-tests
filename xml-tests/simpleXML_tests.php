<?php
libxml_use_internal_errors(true);

$xml=simplexml_load_file("note.xml") or die("Error: Cannot create object");

if ($xml === false) {
  echo "Failed loading XML: ";
  foreach(libxml_get_errors() as $error) {
    echo "<br>", $error->message;
  }
} else {
  print_r($xml);
}
?>