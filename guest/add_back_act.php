<?
	//该页面接收回复信息，并保存到数据库guestback;

	//post方式接收
	$f_message_id=$_POST['backid'];
	$f_content=$_POST['add_back_content'];

	$link=@mysql_connect('localhost','root','3yd.c6lbdnf');
	mysql_select_db('library',$link);
	mysql_query('set names utf8');
	$sql="insert into guestback (backcontent,message_id,backtime) values ('{$f_content}',{$f_message_id},now())";
	//echo $sql;
	$res=mysql_query($sql);
	//var_dump($res);
	if($res){
		echo "添加回复成功";
	}
	else{
		echo "添加回复失败";
	}

?>