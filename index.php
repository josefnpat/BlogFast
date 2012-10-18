<?php
include('inc/header.php');
if($_GET['post']){
  $post = $blog->getPost($_GET['post'];
  if(isset($post)){
    echo_post($post);
  } else {
    $post = new post();
    $post->setTitle("Sorry!");
    $post->setBody("The post you're looking for does not exist.");
    $post->setTime(time());
    echo_post($post);
  }
} else {
  foreach($blog->getPosts() as $post){
    if($post->getTime() <= time() and $post->getTime() != 0){
      echo_post($post);
    }
  }
}
include('inc/footer.php');
?>
