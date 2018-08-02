<?php
$res = htmlspecialchars($_GET["res"]);
$name = htmlspecialchars($_GET["name"]);
$email = htmlspecialchars($_GET["email"]);
if(filter_var($email, FILTER_VALIDATE_EMAIL)){
  $toWrite = $name."\n".$email."\n".$res;
  $time = getdate();
  $msg = fopen("./messages/".
               $time["year"]."-".
               $time["mon"]."-".
               $time["mday"]."-".
               $time["hours"]."-".
               $time["minutes"]."-".
               $time["seconds"].".txt","w");
  fwrite($msg,$toWrite);
  fclose($msg);
  echo "<p align=\"center\">Response succesfuly added</p>";
}
print '<meta http-equiv="refresh" content="2;url=index.php">';
?>