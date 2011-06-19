<?php

function process_bid($name, $room, $bid) {
  # get bids from file
  $filename = "bids.txt";
  $bids = unserialize( file_get_contents($filename) );
  # create an array of the other bids
  $other_bids = array();
  $total_other_bids = 0;
  for( $i=0; $i<count($bids["Current Bid"]); $i++ ) { 
    if ( $i != $room ) {
      $other_bids[$i] = $bids["Current Bid"][$i];
      $total_other_bids += $bids["Current Bid"][$i]; 
    }
  }
  $weights = array();
  $rebait = array();
  $other_bids_updated = array();
  if($total_other_bids != 0) {
    #how do you divide an array by a scalar in php?
    #$weights = $other_bids/$total_other_bids;
    for( $i=0; $i<count($other_bids); $i++ ) { 
      # weights array contains the proportions of the other bids
      $weights[$i] = $other_bids[$i]/$total_other_bids;
      # share out extra money created by new bid in the correct proportions maintaining the same total
      $rebait[$i] = $weights[$i]*($bid - $bids["Current Bid"][$room]);
      $other_bids_updated[$i] = $other_bids[$i] - $rebait[$i];
    }
  }
  #$other_bids_updated = $weights*($bid - $bids["Current Bid"][$room]);
  # update other bids
  $bids["Current Bid"] = $other_bids_updated;
  # update this bid
  $bids["Current Bid"][$room] = $bid;
  # update current resident/bidder on this room
  $bids["Current Bidder"][$room] = $name;
  # save bids to file
  $file = fopen($filename, 'w+') or die("I could not open $filename."); 
  fwrite($file, serialize($bids)); 
  fclose($file);
}

?>
