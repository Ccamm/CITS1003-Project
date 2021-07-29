<?php

if (isset($_POST) and !empty($_POST["ip"])) {
  $ip = $_POST["ip"];
  system("ping -c 10 $ip");
  echo "\nYou need to pay some money to do more pings!";
} else {
  echo "lol you can't even properly send me an IP address lol";
}
?>
