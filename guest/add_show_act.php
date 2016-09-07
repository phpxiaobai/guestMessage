<?
	//用来添加留言信息到数据库
	//POST方式
	header("Content-type=text/html;charset=utf-8");
	//print_r($_POST);
	$f_method=$_POST['method'];
	$f_method_v=$_POST['method_v'];
	$f_title=$_POST['title'];
	$f_content=$_POST['content'];
	$link=@mysql_connect('localhost','root','3yd.c6lbdnf');
	mysql_select_db('library',$link);
	mysql_query('set names utf8');
	$sql="insert into guestmessage values(null,'$f_method','$f_method_v','$f_title','$f_content',now())";
	echo $sql;
	$res=mysql_query($sql);
	if($res){
		echo '添加留言成功';
	}
	else 
		{echo '添加留言失败';
	}
?>