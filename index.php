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
    <form action="act.php" methode="get">
      <fieldset>
      <legend>Response info:</legend>
      <p>Name: <input type="text" name="name"/></p>
      <p>Email: <input type="text" name="email"/></p>
      <input type="text" name="res"/>
      <input type="submit">
      </fieldset>
    </form>
    <table>
      <?php
	    $msgs = scandir("./messages/");
        for($i=2;$i<count($msgs);$i++){
          $file = fopen("./messages/".$msgs[$i],"r");
          echo fread($file, filesize("./messages/".$msgs[$i]));
          fclose($file);
        }
		?>
    </table>
  </body>
</html>
