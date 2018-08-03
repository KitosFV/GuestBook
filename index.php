<html>
  <head><title>Guest book</title></head>
  <link href="style.css" rel="stylesheet" type="text/css"/>
  <body>
    <H1 align="center">Guest book</H1>
    <?php      
      if(!is_dir('messages')){
        mkdir('./messages',0777);
      }
      ?>
      <?php
	    $msgs = scandir("./messages/");
        for($i=2;$i<count($msgs);$i++){
          $time = explode("-",explode(".",$msgs[$i])[0]);//[0]-y [1]-mon [2]-day [3]-h [4]-min [5]-s
          $ftime = $time[2].".".$time[1].".".$time[0].", ".$time[3].":".$time[4].":".$time[5];
          $content = file("./messages/$msgs[$i]");
	  $content[0] = htmlspecialchars($content[0]);
	  $content[1] = htmlspecialchars($content[1]);
	  $i = 3;
	  while($content[2].="\n$content[$i]"){
	    $i++;
	  }
	  $content[2] = htmlspecialchars($content[2]);
          echo "<div class=\"wraper\"><div class=\"time\">$ftime</div><div class=\"time\">Message text</div><div class=\"uinfo\">$content[0](<a href=\"mailto:$content[1]\">$content[1]</a>)</div><div class=\"cont\">$content[2]</div></div>";
        }
		?>
    <form action="act.php" methode="get">
      <fieldset>
      <legend>Response info:</legend>
      <p>Name: <input type="text" name="name"/></p>
      <p>Email: <input type="text" name="email"/></p>
      <input type="text" name="res"/>
      <input type="submit">
      </fieldset>
    </form>
  </body>
</html>
