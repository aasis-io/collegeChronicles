<?php

require_once('common.class.php');

class News extends Common
{
    public $id, $title, $short_detail, $detail,
        $thumb_img, $slider_img, $featured, $breaking, $slider_key, $status,
        $created_by,
        $created_date, $modified_by, $modified_date,
        $category_id;

    public function save()
    {
        $conn = mysqli_connect('localhost', 'root', '', 'my_news');
        $sql = "insert into 
               news(title, short_detail, detail, thumb_img, slider_img, featured, breaking
               ,slider_key, category_id, status, 
               created_by, created_date) values('$this->title',
                '$this->short_detail','$this->detail',
                '$this->thumb_img',
                '$this->slider_img',
                '$this->featured',
                '$this->breaking',
                '$this->slider_key',
                '$this->category_id', 
                '$this->status', '$this->created_by',
                '$this->created_date')";

        $conn->query($sql);
        if ($conn->affected_rows == 1 && $conn->insert_id > 0) {
            return $conn->insert_id;
        } else {
            return false;
        }
    }
    public function retrieve()
    {
        $conn = mysqli_connect('localhost', 'root', '', 'my_news');
        $sql = "select * from news";
        $var = $conn->query($sql);
        if ($var->num_rows > 0) {
            $datalist = $var->fetch_all(MYSQLI_ASSOC);
            return $datalist;
        } else {
            return false;
        }
    }
    public function edit()
    {
        $conn = mysqli_connect('localhost', 'root', '', 'my_news');
        $sql = "update news set title='$this->title',
                                    short_detail='$this->short_detail',
                                    detail='$this->detail',
                                    thumb_img='$this->thumb_img',
                                    slider_img='$this->slider_img',
                                    featured='$this->featured',
                                    breaking='$this->breaking',
                                    slider_key='$this->slider_key',
                                    status='$this->status',
                                    category_id='$this->category_id',
                                    modified_by='$this->modified_by', 
                                    modified_date='$this->modified_date'
                                    where id='$this->id'";
        $conn->query($sql);
        if ($conn->affected_rows == 1) {
            return $this->id;
        } else {
            return false;
        }
    }
    public function delete()
    {
        $conn = mysqli_connect('localhost', 'root', '', 'my_news');
        $sql = "delete from news where id='$this->id'";
        $var = $conn->query($sql);
        if ($var) {
            return "success";
        } else {
            return "failed";
        }
    }

    public function getById()
    {
        $conn = mysqli_connect('localhost', 'root', '', 'my_news');
        $sql = "select * from news where id='$this->id'";
        $var = $conn->query($sql);
        if ($var->num_rows > 0) {
            $data = $var->fetch_object();
            return $data;
        } else {
            return [];
        }
    }

    public function getAllActiveNews()
    {
        $sql = "select * from news where status=1 order by created_date desc limit 3";
        return $this->select($sql);
    }

    public function getAllActiveSliderNews()
    {
        $sql = "select * from news where status=1 and slider_key = 1 order by created_date desc limit 5";
        return $this->select($sql);
    }
    public function getAllActiveBreakingNews()
    {
        $sql = "select * from news where status=1 and breaking = 1 order by created_date desc limit 4";
        return $this->select($sql);
    }
    public function getAllActiveFeaturedNewsSlider()
    {
        $sql = "select * from news where status=1 and featured = 1 order by created_date desc limit 4";
        return $this->select($sql);
    }

    public function getAllActiveFeaturedNews()
    {
        $sql = "select * from news where status=1 and featured = 1 order by created_date desc";
        return $this->select($sql);
    }
    public function getNewsByCategoryId()
    {
        $sql = "select * from news where status=1 and category_id ='$this->category_id' order by created_date desc limit 1";
        return $this->select($sql);
    }

    public function getNewsById()
    {
        $sql = "select news.*, category.name as category_name from news join category on news.category_id = category.id where news.id='$this->id'";
        return $this->select($sql);
    }
}
