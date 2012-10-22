<?php
include('inc/header.php');
if(isset($_GET['post'])){
  $post = $blog->getPost($_GET['post']);
  if(isset($post)){
    echo_post($post);
  } else {
    $post = new post();
    $post->setTitle("Sorry!");
    $post->setBody("The post you're looking for does not exist.");
    echo_post($post);
  }
} else {
  $posts = $blog->getPosts();
  if(count($posts)>0){
    foreach($posts as $post){
      if($post->getTime() <= time() and $post->getTime() != 0){
        echo_post($post);
      }
    }
  } else {
    $post = new post();
    $post->setTitle("Sorry!");
    $post->setBody("There aren't any posts yet.");
    echo_post($post);
  }
}
include('inc/footer.php');
?>