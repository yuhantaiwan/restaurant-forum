<?php
@session_start();
function get_all_restaurants() {
  $sql = "SELECT * FROM `restaurant`";
  $datas = array();
  $result = mysqli_query($_SESSION["conn"], $sql);
  if($result) {
    if(mysqli_num_rows($result)>0) {
      while($row = mysqli_fetch_assoc($result)) {
        $datas[] = $row;
      }
    }
    mysqli_free_result($result);
  } else {
    echo "{$sql} 語法執行失敗，錯誤訊息：" . mysqli_error($_SESSION["conn"]);
  }
  return $datas;
}

function get_restaurant($id) {
  $sql = "SELECT * FROM `restaurant` WHERE `data_id` = '{$id}'";
  $data = null;
  $result = mysqli_query($_SESSION["conn"], $sql);
  if($result) {
    if(mysqli_num_rows($result)==1) {
      $data = mysqli_fetch_assoc($result);
    }
    mysqli_free_result($result);
  } else {
    echo "{$sql} 語法執行失敗，錯誤訊息：" . mysqli_error($_SESSION["conn"]);
  }

  return $data;
}

function add_user($username, $email, $password) {
  $sql1 = "SELECT * FROM `user` WHERE `email` = '{$email}'";
  $query1 = mysqli_query($_SESSION["conn"], $sql1);
  $result = null;
  $password = md5($password);
  $sql2 = "INSERT INTO `user` (`username`, `email`, `password`) VALUES ('{$username}','{$email}', '{$password}' )";
  
  if(mysqli_num_rows($query1)==0){
    if(mysqli_query($_SESSION["conn"], $sql2)) {
      $result = true;
    } 
    mysqli_free_result($query1);
  }
  return $result;
}

function verify_user($email, $password) {
  $result = null;
  $password = md5($password);
  $sql = "SELECT * FROM `user` WHERE `email` = '{$email}' AND `password` = '{$password}'";
  $query = mysqli_query($_SESSION["conn"], $sql);


  if($query) {
    if(mysqli_num_rows($query)==1) {
      $user = mysqli_fetch_assoc($query);
      $_SESSION["is_login"] = true;
      $_SESSION["login_user_id"] = $user["id"];
      $_SESSION["login_username"] = $user["username"];
      $result = true;
    }
  } else {
    echo "{$sql} 語法執行失敗，錯誤訊息：" . mysqli_error($_SESSION['conn']);
  }
  return $result;
}

function leave_comment($comment, $rating) {
  $result = null;
  $create_date = date("Y-m-d");
  $comment = htmlspecialchars($comment);
  $rating = $rating + 1;
  $user_id = $_SESSION["login_user_id"];
  $user_name = $_SESSION["login_username"];
  $data_id = $_SESSION["i"];
  $sql = "INSERT INTO `comment` (`store_id`, `user_id`, `user_name`, `content`, `rating`,`time`) VALUES ('{$data_id}', '{$user_id}', '{$user_name}', '{$comment}', '{$rating}','{$create_date}') ";
  $query = mysqli_query($_SESSION['conn'], $sql);
  if($query) {
    if(mysqli_affected_rows($_SESSION['conn'])==1) {
      $result = true;
    }
  } else {
    echo "{$sql} 語法執行失敗，錯誤訊息：" . mysqli_error($_SESSION['conn']);
  }
  return $result;
}

function show_comments($store_id) {
  $sql = "SELECT * FROM `comment` WHERE `store_id` = '{$store_id}'";
  $datas = array();
  $result = mysqli_query($_SESSION["conn"], $sql);
  if($result) {
    if(mysqli_num_rows($result)>0) {
      while($row = mysqli_fetch_assoc($result)) {
        $datas[] = $row;
      }
    }
    mysqli_free_result($result);
  } else {
    echo "{$sql} 語法執行失敗，錯誤訊息：" . mysqli_error($_SESSION["conn"]);
  }
  return $datas;
}

function rate_restaurant($rating) {
  $result = null;
  $create_date = date("Y-m-d");
  $rating = $rating + 1;
  $user_id = $_SESSION["login_user_id"];
  $user_name = $_SESSION["login_username"];
  $data_id = $_SESSION["i"];
  $sql = "INSERT INTO `rating` (`store_id`, `user_id`, `user_name`, `score`, `time`) VALUES ('{$data_id}', '{$user_id}', '{$user_name}', '{$rating}', '{$create_date}') ";
  $query = mysqli_query($_SESSION['conn'], $sql);
  if($query) {
    if(mysqli_affected_rows($_SESSION['conn'])==1) {
      $result = true;
    }
  } else {
    echo "{$sql} 語法執行失敗，錯誤訊息：" . mysqli_error($_SESSION['conn']);
  }
  return $result;
}

function show_store_rating($store_id) {
  $sql = "SELECT * FROM `rating` WHERE `store_id` = '{$store_id}'";
  $result = mysqli_query($_SESSION["conn"], $sql);
  $num = mysqli_num_rows($result);
  $datas = array();
  
  if($result) {
    if($num>0) {
      while($row = mysqli_fetch_assoc($result)) {
        $datas[] = $row;
      }
      $total = 0;
      for($i=0; $i<=$num-1; $i++) {
        $total += $datas[$i]["score"];
      }
      $avg = $total / $num;
    }
    mysqli_free_result($result);
  } else {
    echo "{$sql} 語法執行失敗，錯誤訊息：" . mysqli_error($_SESSION["conn"]);
  }
  return $avg;
}

function get_all_members() {
  $sql = "SELECT * FROM `user`";
  $datas = array();
  $result = mysqli_query($_SESSION["conn"], $sql);
  if($result) {
    if(mysqli_num_rows($result)>0) {
      while($row = mysqli_fetch_assoc($result)) {
        $datas[] = $row;
      }
    }
    mysqli_free_result($result);
  } else {
    echo "{$sql} 語法執行失敗，錯誤訊息：" . mysqli_error($_SESSION["conn"]);
  }
  return $datas;
}

function get_member($id) {
  $sql = "SELECT * FROM `user` WHERE `id` = '{$id}'";
  $data = null;
  $result = mysqli_query($_SESSION["conn"], $sql);
  if($result) {
    if(mysqli_num_rows($result)==1) {
      $data = mysqli_fetch_assoc($result);
    }
    mysqli_free_result($result);
  } else {
    echo "{$sql} 語法執行失敗，錯誤訊息：" . mysqli_error($_SESSION["conn"]);
  }
  return $data;
}

function update_member($id, $username, $password) {
  $result = null;
  // 判別密碼有無更動過
  if($password) {
    $password = md5($password);
    $sql = "UPDATE `user` SET `username` = '{$username}', `password` = '{$password}' WHERE `id` = '{$id}'";
  } else {
    $sql = "UPDATE `user` SET `username` = '{$username}' WHERE `id` = '{$id}'";
  }
  $query = mysqli_query($_SESSION["conn"], $sql);
  if($query) {
    if(mysqli_affected_rows($_SESSION["conn"])==1) {
      $result = true;
    }
  } else {
    echo "{$sql} 語法執行失敗，錯誤訊息：" . mysqli_error($_SESSION["conn"]);
  }
  return $result;
}

function del_member($id) {
  $result = null;
  $sql = "DELETE FROM `user` WHERE `id` = '{$id}'";
  $query = mysqli_query($_SESSION["conn"], $sql);
  if($query) {
    if(mysqli_affected_rows($_SESSION["conn"])==1) {
      $result = true;
    }
  } else {
    echo "{$sql} 語法執行失敗，錯誤訊息：" . mysqli_error($_SESSION["conn"]);
  }
  return $result;
}

?>