<?php

function validate_bid($name, $room, $bid) {
  $errors = array();
  # Get current bids
  $filename = "bids.txt";
  $bids = unserialize( file_get_contents($filename) );
  # Verify information submited
  $name_recognized = in_array( $name, array( "Alex", "Arlo", "Mike", "Paul", "Robin" ) ) 
  $name_used = in_array( $name, $bids["Current Bidder"]);
  if ( !$name_recognized ) {
    $errors["name"] = "Name not recognised. Must be Alex, Arlo, Mike, Paul or Robin."; 
  } else if ( $name_used ) {
    $errors["name"] = "You currently have an open bid. You may not have more than one bid open at a time."; 
  }
  $room_ok = in_array( $room, array( 0, 1, 2, 3, 4 ) );
  if ( !$room_ok ) $errors["room"] = "Room not recognised. Must be 0, 1, 2, 3 or 4.";
  $bid_ok = ( $bid > $bids["Current Bid"][$room] );
  if ( !$bid_ok ) $errors["bid"] = "Bid must be higher than the current bid."; 
  return $errors;
}

?>
