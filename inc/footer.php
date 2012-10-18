<?php
  function number_significant($x, $n) {
    $x_sci = sprintf("%.".$n."e", $x);
    $x_f = rtrim(sprintf("%f", $x_sci),"0");
    if ( $x_f[strlen($x_f)-1]=="." ) {
      $x_f .= "0";
    }
    return $x_f;
  }
  function engnot($num){
    $exp = floor(log10($num)/3)*3;
    $new_num = $num*pow(10,-$exp);
    if($new_num > 1000){
      $new_num = $new_num / 1000;
      $exp += 3;
    }
    $engnot = array(
      24=>"Y",
      21=>"Z",
      18=>"E",
      15=>"P",
      12=>"T",
      9=>"G",
      6=>"M",
      3=>"k",
      0=>"",
      -3=>"m",
      -6=>"&#181;",
      -9=>"n",
      -12=>"p",
      -15=>"f",
      -18=>"a",
      -21=>"z",
      -24=>"y"
    );
    return number_significant($new_num,3).$engnot[$exp];
  }
?>
    <div class="footer">&copy; <?php echo date("Y"); ?> - Page Generated in <?php echo engnot(microtime(1)-$start_time);?>s with <a target="_blank" href="https://github.com/josefnpat/BlogFast">BlogFast</a></div>
  </body>
</html>
