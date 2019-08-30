<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
      $myArray = array('Honda', 'Toyota', 'BMW');

      for ($i=0; $i <=2 ; $i++):
        echo $myArray[$i].'<br />';
      endfor;




      //print_r($myArray);
      // foreach ($myArray as $key => $value) {
      //   // code...
      //   echo $key.$value.'<br />';
      // }
    ?>
  </body>
</html>
