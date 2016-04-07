<?php

class Application_Model_Experience extends Zend_DB_Table_Abstract
{
    protected $_name = "experience";

    function cityPosts($city_id){
        return $this->fetchAll("city_id=$city_id");
    }

    function cityPost($post_id){
        return $this->find("$post_id")->toArray();
    }

    function addPost($city_id,$user_id,$title,$content){
        $row=$this->createRow();
        $row->city_id= $city_id;
        $row->user_id=$user_id;
        $row->title=$title;
        $row->content=$content;
        $row->save();
    }

    function editPost($post_id,$data){
        $this->update($data,"id=$post_id");
    }

    function deletePost($post_id){
        $this->delete("id=$post_id");
    }

}

