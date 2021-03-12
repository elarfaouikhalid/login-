
<?php

require_once('base/createDb.php');
$db='db1';
$db_user='root';
$db_password="";
$table="login";
$server="127.0.0.1";
$create=new CreateDb($db,$table);
$create->create($db,$table);
?>

<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
	<title>exmple</title>
	<style type="text/css">
		*{
			padding:0;
			margin:0;
			box-sizing: border-box;
		}
		header{
			background-color:#555;
			color:#fff;
			display:flaot;
			height:100px;
			font-family:sans-serif;
			position: relative;
		}
		.nav{
			float:left;
			clear: both;
		}
		h1{
			float: left;
			clear: both;
			position: absolute;
			top:10px;
			left: 12px;
		}
		.nav{
			position:absolute;
			top:12px;
			right:12px;
		}
		.nav ul li{
			display: inline;
			margin-right:12px;
			font-size:1.3em;
			transition:.3s;
		}
		.nav ul li:hover{
			background-color:orange;
			padding:10px;
			border-radius:8px;
		}
		.content{
			width:400px;
			padding:80px;
			margin:0 auto;
			margin-top:10px;
			border-radius:12px;
			box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 8px 20px 0 rgba(0, 0, 0, 0.2);
			background-color:#ddd;
		}
		input{
			display: block;
			margin:12px;
			padding-left:5px;
			width:80%;
			height:30px;
			border-radius:9px;
			box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 8px 20px 0 rgba(0, 0, 0, 0.2);
			border-style: none;
		}
		.btn{
			width:90px;
			color:#fff;
			background-color:blue;
			border-radius:9px;
			box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 8px 20px 0 rgba(0, 0, 0, 0.2);
			border-style: none;
		}
		footer{
			background-color:#555;
			height:100px;
			width: 100%;
			position:fixed;
			bottom:0;
		}
		p{
			font-size:1.5em;
			font-family:Arial;
			color: #fff;
			text-align: center;
			position:absolute;
			top:30px;
			right:50%;
		}
	</style>
</head>
<body>
	<header>
		<h1>MyLogo</h1>
		<nav class="nav">
			<ul>
				<li>home</li>
				<li>contact</li>
				<li>About</li>
				<li>home</li>
			</ul>
		</nav>
	</header>
	
	<div class="content">
		<form action=""  method="Post">
		<div class="row text-center py-5">
	<?php
$email=$_POST['email'] ?? "";
$password=$_POST['password'] ?? "";
if(isset($_POST['send'])){
$db_name=$create->connect($db);

if($db!==null)
{
$query=$db_name->query("SELECT email,pas from $table");
$query->execute();
$data=$query->fetchAll(PDO::FETCH_ASSOC);
foreach($data as $d)
{
	if($d['email']===$email && $d['pas']===$password)
	{
			header('location:registre.php');
	}
	else
	{
		echo $status='<span class="badge bg-danger">password or email invalid</span>';
	}
}
}}
$query=null;
$db=null;
?>
        </div>
			<input type="email" name="email" value="<?php echo $email ?>"  placeholder="Email">
			<input type="password" name="password"  placeholder="password">
			<input type="submit" name="send" value="Send" class="btn">	
		</form>
	</div>
	<footer>
		<p>copyright 2021</p>
	</footer>

</body>
</html>
