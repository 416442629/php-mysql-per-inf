<?php 
	$conn = mysqli_connect('localhost','root','123456','test');
		if(!$conn){
			exit('连接失败');
}

	$query=mysqli_query($conn,'select * from user;');
		if(!$query){
			exit('查询失败');

}

 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>xxx管理系统</title>
 	<link rel="stylesheet"  href="/bootstrap.css">
 	<link rel="stylesheet" href="/style.css">
 </head>
 <body>

 	<nav class="navbar navbar-expand nav-dark bg-dark fixed-top">
 		<a class="navbar-brand" href="#">xxx管理系统</a>
 		<ul class="navbar-nav mr-auto">
 			<li class="nav-item active">
 				<a class="nav-link" href="index.html">用户管理</a>
 			</li>
 			<li class='nav-item'>
 				<a class="nav-link" href="#">商品管理</a>

 		</ul>
 		</nav>
 		<main class="container">
			<h1 class="heading">
				用户管理<a class="btn btn-link btn-sm"
				href="/add.php">添加</a>
			</h1> 			
			<table class='table table-hover'>
				<thead>
					<tr>
						<th>#</th>
						<th>头像</th>
						<th>性别</th>
						<th>性别</th>
						<th>年龄</th>
						<th class="text-center">操作</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						while ($item = mysqli_fetch_assoc($query)): 
					 ?>
					<tr>
						<th scope="row"><?php echo $item['id'] ?></th>
						<td>
						<img src="<?php echo $item['avatar'] ?>" 
						class='round' alt='<?php echo $item['name']; ?>'>
						</td>
						<td><?php echo $item['name']; ?></td>
						<td><?php echo $item['gender'] ==0 ? '♂' : '♀'; ?></td>
						<td><?php echo $item['birthday']; ?></td>
						<td class="text-center">
							<a class="btn btn-info vtn-sm" href="edit.php?id=<?php echo $item['id'] ?>">编辑</a>
							<a class="btn btn-danger btn-sm" 	href="delete.php?id=<?php echo $item['id'] ?>">删除</a>
						</td>
					</tr>

					<?php endwhile ?>

				</tbody>
			</tabble>
			<ul class="pagination justify-content-center">
				<li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
				<li class="page-item"><a class="page-link" href="#">1</a></li>
      			<li class="page-item"><a class="page-link" href="#">2</a></li>
      			<li class="page-item"><a class="page-link" href="#">3</a></li>
     			<li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
			</ul>

 		</main>
 	
 	
 </body>
 </html>
