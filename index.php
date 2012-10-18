<?php
include('inc/header.php');
if($_GET['timestamp']){
  if(isset($blog->posts[$_GET['timestamp']])){
    echo_post($blog->posts[$_GET['timestamp']],$_GET['timestamp']);
  } else {
    $post->title = "Sorry!";
    $post->body = "The post you're looking for does not exist.";
    echo_post($post);
  }
} else {
  foreach($blog->posts as $time => $post){
    if($time <= time()){
      echo_post($post,$time);
    }
  }
}
include('inc/footer.php');
?>
