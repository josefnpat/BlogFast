<?php
include('header.php');
if($_GET['timestamp']){
  if(isset($blog->posts[$_GET['timestamp']])){
    if($blog->posts[$_GET['timestamp']]->published){
      echo_post($blog->posts[$_GET['timestamp']],$_GET['timestamp']);
    }
  } else {
    $post->title = "Sorry!";
    $post->body = "The post you're looking for does not exist.";
    echo_post($post);
  }
} else {
  foreach($blog->posts as $time => $post){
    if($post->published){
      echo_post($post,$time);
    }
  }
}
include('footer.php');
?>
