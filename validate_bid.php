<?php

function validate_bid($name, $room, $bid) {
  $errors = array();
  # Verify information submited
  $name_ok = in_array( $name, array( "Alex", "Arlo", "Mike", "Paul", "Robin" ) );
  if ( !$name_ok ) $errors["name"] = "Name not recognised. Must be Alex, Arlo, Mike, Paul or Robin."; 
  $room_ok = in_array( $room, array( 0, 1, 2, 3, 4 ) );
  if ( !$room_ok ) $errors["room"] = "Room not recognised. Must be 0, 1, 2, 3 or 4.";
  # Get current bids
  $filename = "bids.txt";
  $bids = unserialize( file_get_contents($filename) );
  $bid_ok = ( $bid > $bids["Current Bid"][$room] );
  if ( !$bid_ok ) $errors["bid"] = "Bid must be higher than the current bid."; 
  return $errors;
}

?>
