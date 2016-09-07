<?php
	echo "I am delete page";
	$f_message_id=$_GET['message_id'];
	$link=@mysql_connect('localhost','root','3yd.c6lbdnf');
	mysql_select_db('library',$link);
	mysql_query('set names utf8');
	$sql="delete from guestmessage where id={$f_message_id}";
	echo $sql;
	$res=mysql_query($sql);
	if($res){
		echo "删除成功";
	}
	else{
		echo "删除失败";
	}
	
?>