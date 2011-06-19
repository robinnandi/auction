<?php

$bids = array(
  "Room" => array(0, 1, 2, 3, 4), 
  "Description" => array("", "", "", "", "Lounge"), 
  "Photo" => array('<a href="http://bkjzdbv.herobo.com/auction/photos/room_0.html">photo</a>', 
                   '<a href="http://bkjzdbv.herobo.com/auction/photos/room_1.html">photo</a>', 
                   '<a href="http://bkjzdbv.herobo.com/auction/photos/room_2.html">photo</a>', 
                   '<a href="http://bkjzdbv.herobo.com/auction/photos/room_3.html">photo</a>', 
                   '<a href="http://bkjzdbv.herobo.com/auction/photos/room_4.html">photo</a>'), 
  "Current Bid" => array(602, 602, 602, 602, 602), 
  "Current Bidder" => array("", "", "", "", "")
);
$filename = "bids.txt";
$file = fopen($filename, 'w+') or die("I could not open $filename."); 
fwrite($file, serialize($bids)); 
fclose($file);

?>
