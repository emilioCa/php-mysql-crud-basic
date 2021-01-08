<?php 
require_once("Database.php");

    class Post {
        private $db;

        public function __construct()
        {
            $this->db = new Database();
        }

        // Get all posts
        public function getPosts(){
            $this->db->query("SELECT * FROM tbl_oop_post");
            return $this->db->resultSet();
        }

        // Get one post
        public function getPostById($id) {
            $this->db->query("SELECT * FROM tbl_oop_post WHERE id = :id");
            $this->db->bind(':id', $id);

            return $this->db->single();
        }

        // Insert post
        public function addPost($data) {
            $this->db->query("INSERT INTO tbl_oop_post (title, content) VALUES (:title, :content)");
            
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':content', $data['content']);

            if($this->db->execute()){
                return true;
            } else {
                return false;
            }

        }

        // Update post
        public function updatePost($data) {
            $this->db->query("UPDATE tbl_oop_post SET title = :title, content = :content) WHERE id = :id");
            
            $this->db->bind(':id', $data['id']);
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':content', $data['content']);

            if($this->db->execute()){
                return true;
            } else {
                return false;
            }

        }

        // Delete post
        public function deletePost($id) {
            $this->db->query("DELETE FROM tbl_oop_post WHERE id = :id");
                        
            $this->db->bind(':id', $id);

            if($this->db->execute()){
                return true;
            } else {
                return false;
            }

        }
    }

?>