<?php
function color_of_verdict($str) {
  if ($str == 'Accepted') {
    return "green";
  }
  if ($str == 'Rejected') {
    return "red";
  }
  if ($str == 'Submitted') {
    return "purple";
  }
  return "black";
}
?>
