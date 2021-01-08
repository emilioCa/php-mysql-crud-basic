<?php
require_once("../Post.php");

$post = new Post();
$insert = ['title' => 'This is next post', 'content' => 'PHP jeje'];
$update = ['id' => 1, 'title' => '[UPDATED] This is next post', 'content' => 'PHP jeje'];

// Select 
var_dump($post->getPosts());
var_dump($post->getPostById(1));

// Insert 
$post->addPost($insert);
var_dump($post->getPosts());

// Update
$post->updatePost($update);
var_dump($post->getPosts());

// Delete
$post->deletePost(2);
var_dump($post->getPosts());

?>