<?php

class blog {
  private $loc;
  private $name;
  private $tagline;
  private $posts;
  private $hash;
  private $save_prefix = "<?php die();\n";
  public function __construct($loc){
    $this->loc = $loc;
    $this->load()
  }
  public function load(){
    $data = $this->decode(file_get_contents($this->loc));
    
    if(isset($this->name)){
      $this->name = $data->name;
    } else {
      $this->name = "Blog Name";
    }
    
    if(isset($this->tagline)){
      $this->tagline = $data->tagline;
    } else {
      $this->tagline = "Blog Tagline";
    }
    
    if(isset($this->posts)){
      $this->posts = $data->posts;
    } else {
      $this->posts = array();
    }
    
    if(isset($data->hash)){
      $this->hash = $data->hash;
    } else {
      // Use something bigger probably.
      $this->hash = uniqueid(1);
    }
  }
  public function save(){
    file_put_contents($this->loc,this->encode());
  }
  private function encode($data){
    return $this->save_prefix.json_encode($data);
  }
  private function decode($data){
    return json_decode(substr($data,count($this->save_prefix));
  }

  public function getName(){
    return $this->name;
  }
  public function setName($name){
    if($name != ""){
      $this->name = $name;
      return TRUE;
    } else {
      return "Name must be a string.";
    }
  }
  public function getTagline(){
    return $this->tagline;
  }
  public function setTagline($tagline){
    if($tagline != ""){
      $this->tagline = $tagline;
      return TRUE;
    } else {
      return "Tagline must be a string.";
    }
  }
  public function getPosts(){
    return $this->posts;
  }
  public function getPost($post_time){
    foreach($this->getPosts() as $post){
      if($post->getTime() == $post_time){
        return $post;
      }
    }
  }
  public function addPost($post){
    if(typeof($post) == "post"){
      $this->posts[] = $post;
      ksort($this->posts);
    } else {
      return "Post must be of type post.";
    }
  }
  public function removePost($post){
    if(typeof($post) == "post"){
      $found = FALSE;
      foreach($this->posts as $tkey => $tpost){
        if($tpost === $post){ // no idea if this will work, lol.
          unset($this->posts[$tkey];
          $found = TRUE;
          break;
        }
      }
      if($found){
        return TRUE;
      } else {
        return "Post not found.";
      }
    } else {
      return "Post must be of type post.";
    }
  }
}

class post {
  private title = "";
  private time = 0;
  private body = "";
  public function getTitle(){
    return $this->title;
  }
  public function setTitle($title){
    if($title != ""){
      $this->title = $title;
      return TRUE;
    } else {
      return "Title must be a string.";
    }
  }
  public function getTime(){
    return $time;
  }
  public function setTime($time){
    if($time != "" and is_int($time)){
      $this->time = $time;
      return TRUE;
    } else {
      return "Time must be a unix timestamp.";
    }
  }
  public function getBody(){
    return $this->body;
  }
  public function setBody($body){
    if($body != ""){
      $this->body = $body;
      return TRUE;
    } else {
      return "Body must be a string.";
    }
  }
}