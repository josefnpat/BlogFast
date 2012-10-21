<?php

function echo_post($post){
  echo "    <div class=\"post\">\n";
  echo "      <div class=\"title\"><a href=\"?post=".$post->getTime()."\">".$post->getTitle()."</a></div>\n";
  echo "      <div class=\"body\">".$post->getBody()."</div>\n";
  if($post->getTime() > 0){
    // http://php.net/manual/en/class.datetime.php for alternate DATE_'s
    if($post->getTime() <= time()){
      echo "      <div class=\"timestamp\">".date(DATE_RFC2822,$time)."</div>\n";
    } else {
      echo "      <div class=\"timestamp\">This post has not yet been published.\n".
           "      Publish time: ".date(DATE_RFC2822,$time)."</div>\n";
    }
  } else {
    echo "      <div class=\"timestamp\">This post has no time set.</div>\n";
  }
  echo "    </div>\n";
}

function significant_digits($x, $n) {
  $x_sci = sprintf("%.".$n."e", $x);
  $x_f = rtrim(sprintf("%f", $x_sci),"0");
  if ( $x_f[strlen($x_f)-1]=="." ) {
    $x_f .= "0";
  }
  return $x_f;
}
function engineering_notation($num){
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
  return significant_digits($new_num,3).$engnot[$exp];
}