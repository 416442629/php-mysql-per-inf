<?php 
	if(empty($_GET['id'])){
		exit('必须传入制定参数');
	}
	$id = $_GET['id'];
	$conn = mysqli_connect('localhost','root','123456','test');
	if(!$conn){
		exit('连接失败');
		}

	$query=mysqli_query($conn,'DELETE FROM user WHERE id in ('.$id.');');
	if(!$query){
		exit('查询数据失败');
	}
	$affected_rows = mysqli_affected_rows($conn);
		if ($affected_rows <= 0){
			exit('失败');
	}

	header('Location: index.php');
 ?>
