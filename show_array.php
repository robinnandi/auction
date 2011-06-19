<?php

function show_array($array) {
  echo "<table cellspacing=\"0\" border=\"2\">\n";
  if (is_array($array) == 1) {
    echo "<tr>\n";
    foreach($array as $key => $value) {
      echo "  <td>" . $key . "</td>\n";
    }  
    echo "</tr>\n";
    for ($i = 0; $i < 5; $i++) {
      echo "<tr>\n";
      foreach($array as $key => $value) {
        echo "  <td>" . $value[$i] . "</td>\n";
      }
      echo "</tr>\n";
    }
  }
  echo "</table>\n";
}

?> 
