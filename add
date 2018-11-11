<?php 
function add_user(){
  if(empty($_POST['name'])){
    $GLOBALS['error_message']='请输入姓名';
    return;
  }

if(empty($_POST['gender'])){
    $GLOBALS['error_message']='请输入性别';
    return;
  }

if(empty($_POST['birthday'])){
    $GLOBALS['error_message']='请输入日期';
    return;
  }


$name = $_POST['name'];
$gender=$_POST['gender'];
$birthday=$_POST['birthday'];


if(empty($_FILES['avatar'])){
  $GLOBALS['error_message']='上传头像失败1';
  return;
}
 $ext = pathinfo($_FILES['avatar']['name'],PATHINFO_EXTENSION);
 $target = './uploads/avatar-' . uniqid() . '.' . $ext;
if(!move_uploaded_file($_FILES['avatar']['tmp_name'], $target))
{
  $GLOBALS['error_message']='上传头像失败2';
  return;
}

 $avatar =$target;
$conn = mysqli_connect('localhost','root','123456','test');
if(!$conn){
  $GLOBALS['error_message']='查询失败1';
   return;
 }

 $query = mysqli_query($conn, "INSERT into USER VALUES (null, '{$name}', {$gender},'{$birthday}','{$avatar}');");
 //var_dump("INSERT into USER VALUES (null,'{$name}',{$gender},'{$birthday}','{$avatar}');");
 if(!$query){
   $GLOBALS['error_message']='查询失败2';
   return;
 }


$affected_rows = mysqli_affected_rows($conn);
if($affected_rows !==1){
  $GLOBALS['error_message'] = '添加数据失败3';
  return;
}
header('Location:index.php');


}


if ($_SERVER['REQUEST_METHOD']==='POST'){
  add_user();
}
 ?>




<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>xxx管理系统</title>
</head>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="bootstrap.css">
<body>
  <nav class="navbar navbar-expand navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">XXX管理系统</a>
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.html">用户管理</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">商品管理</a>
      </li>
    </ul>
  </nav>
  <main class="container">
    <h1 class="headong">添加用户</h1>
    <?php if (isset($error_message)): ?>
      <div><?php echo $error_message; ?></div>  
      <?php endif ?>
    <!-- <form action="<?php echo $_SERVER['PHP_SELF']; ?>"
      method='post' enctype='multipart/form-data' 
      autocomplete='off'> -->
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" autocomplete="off">
        <div class="form-group">
          <label for="avatar">头像</label>
         <!--  <input type="file" class="form-control" 
          id='avatar' name="avatar"> -->
           <input type="file" class="form-control" id="avatar" name="avatar">
        </div>
        <div class="form-group">
          <label for='name'>姓名</label>
          <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="form-grop">
          <label for="gender">性别</label>
          <select class="form-control" name="gender" id="gender">
            <option value="-1">选择性别</option>
            <option value="1">男</option>
            <option value="0">女</option>
          </select>
        </div>
        <div class="form-group">
          <label for="birthday">生日</label>
          <input type="date" class="form-control" id='birthday' name="birthday">
        </div>
        <button class="btn btn-primary">保存</button>
      
    </form>   
  </main>

  
</body>
</html>
 // tmp_name的下滑线注意，$_FILES的下划线注意，全局变量的下滑线都要注意 
//正确$query = mysqli_query($conn, "INSERT into USER VALUES (null, '{$name}', {$gender},'{$birthday}','{$avatar}');");
//错误$query = mysqli_query($conn, "‘INSERT into USER VALUES (null, '{$name}', {$gender},'{$birthday}','{$avatar}');’");多了个‘’ 单引号
