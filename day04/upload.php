<?php
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]); // $_FILES["fileToUpload"]["name"]는 업로드된 파일의 원래 파일 이름, basename()로 파일 경로에서 파일 이름만 추출
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION)); // _EXTENSION 옵션으로 확장자 추출

  // 이미지 파일이 진짜인지 가짜인지 체크
  if(isset($_POST["submit"])) { // 폼이 제출되었는가?
    // getimagesize는 실제 이미지인지 확인하는 php 내장함수, $_FILES["fileToUpload"]["tmp_name"]는 업로드된 파일의 임시 저장 경로
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]); // 이미지 파일의 정보 or false
    if($check !== false) {
      echo "File is an image - " . $check["mime"] . "." . "<br>"; // MIME 타입(image/jpeg, image/png, ...)
      $uploadOk = 1;
    } else {
      echo "File is not an image." . "<br>";
      $uploadOk = 0;
    }
  }

  // 파일이 이미 존재하는지 체크
  if(file_exists($target_file)) {
    echo "Sorry, file already exists." . "<br>";
    $uploadOk = 0;
  }

  // 파일 크기 체크
  if($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large." . "<br>";
    $uploadOk = 0;
  }

  // 파일 형식 제한
  if($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'jpeg' && $imageFileType != 'gif') {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br>";
    $uploadOk = 0;
  }

  // 업로드된 파일 경로에 저장
  if($uploadOk == 0) {
    echo "Sorry, your file was not uploaded." . "<br>";
  } else {
    if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) { // move_uploaded_file()이 업로드된 파일을 경로로 옮겨줌
      echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded." . "<br>";
    } else {
      echo "Sorry, there was an error uploading your file." . "<br>";
    }
  }
?>