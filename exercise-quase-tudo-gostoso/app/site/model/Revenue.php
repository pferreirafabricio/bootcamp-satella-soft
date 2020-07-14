<?php

namespace app\site\model;

class Revenue 
{
    private $id;
    private $title;
    private $content;
    private $thumb;
    private $tags;
    private $created_at;

    public function __construct($id = null, $title = '', $content = '', $thumb = null, $tags = '', $created_at = null)
    {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->thumb = $thumb;
        $this->tags = $tags;
        $this->created_at = $created_at;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getThumb()
    {
        return $this->thumb;
    }

    public function getTags()
    {
        return $this->tags;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }
}