<?php
session_start();

$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
$id = $_POST['employee'];

if ($_FILES["file"]["size"] < 200000) {
  if ($_FILES["file"]["error"] > 0) {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
  } else {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "../../images/member/" . $id .".jpg");
  }
} else {
  echo "Invalid file";
}
?>