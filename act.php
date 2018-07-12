<?php
$res = htmlspecialchars($_GET["res"]);
$name = htmlspecialchars($_GET["name"]);
$email = htmlspecialchars($_GET["email"]);
if(filter_var($email, FILTER_VALIDATE_EMAIL)){
  $toWrite = "<tr><th>".$name."</th><th>".$email."</th></tr><tr><td></td><td>".$res."</td></tr>";
  $msg = fopen("./messages/".$name.".txt","w");
  fwrite($msg,$toWrite);
  fclose($msg);
}
echo "<p align=\"center\">Response succesfuly added<\\p>";
?>
