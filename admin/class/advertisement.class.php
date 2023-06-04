<?php

require_once('common.class.php');

class Advertisement extends Common
{
  public $id, $rank, $linkforad, $image, $slider_img, $slider_key,  $status,
    $created_by,
    $created_date;

  public function save()
  {
    $conn = mysqli_connect('localhost', 'root', '', 'my_news');
    $sql = "insert into 
               advertisement(rank, linkforad, image, slider_img, slider_key, status, 
               created_by, created_date) values('$this->rank',
                '$this->linkforad',
                '$this->image',
                '$this->slider_img',
                '$this->slider_key',

                '$this->status',
                '$this->created_by',
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
    $sql = "select * from advertisement";
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
    $sql = "update advertisement set rank='$this->rank',
                                    linkforad='$this->linkforad',
                                    image='$this->image',
                                    slider_img='$this->slider_img',
                                    slider_key='$this->slider_key',

                                    status='$this->status',
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
    $sql = "delete from advertisement where id='$this->id'";
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
    $sql = "select * from advertisement where id='$this->id'";
    $var = $conn->query($sql);
    if ($var->num_rows > 0) {
      $data = $var->fetch_object();
      return $data;
    } else {
      return [];
    }
  }

  public function getAllActiveAds()
  {
    $sql = "select * from advertisement where status=1 limit 1";
    return $this->select($sql);
  }

  public function getAllActiveSliderAds()
  {
    $sql = "select * from advertisement where status=1 and slider_key = 1 limit 1";
    return $this->select($sql);
  }
  // public function getAllActiveBreakingNews()
  // {
  //   $sql = "select * from news where status=1 and breaking = 1 order by created_date desc limit 4";
  //   return $this->select($sql);
  // }
  // public function getAllActiveFeaturedNewsSlider()
  // {
  //   $sql = "select * from news where status=1 and featured = 1 order by created_date desc limit 4";
  //   return $this->select($sql);
  // }

  // public function getAllActiveFeaturedNews()
  // {
  //   $sql = "select * from news where status=1 and featured = 1 order by created_date desc";
  //   return $this->select($sql);
  // }
  // public function getNewsByCategoryId()
  // {
  //   $sql = "select * from news where status=1 and category_id ='$this->category_id' order by created_date desc limit 1";
  //   return $this->select($sql);
  // }

  // public function getNewsById()
  // {
  //   $sql = "select news.*, category.name as category_name from news join category on news.category_id = category.id where news.id='$this->id'";
  //   return $this->select($sql);
  // }
}
