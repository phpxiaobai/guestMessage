<?php
	//echo "I am update page";
	//print_r($_GET);
	$f_message_id=$_GET['message_id'];
	$link=@mysql_connect('localhost','root','3yd.c6lbdnf');
	mysql_select_db('library',$link);
	mysql_query('set names utf8');
	$sql="select * from guestmessage where id={$f_message_id}";
	echo $sql;
	$res=mysql_query($sql);
	$row=mysql_fetch_assoc($res);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="description" content="留言板后台管理" />
        <meta name="keywords" content="留言板,后台管理" />

        <title>留言板后台管理</title>

        <link type="text/css" href="../css/guest.css" rel="stylesheet" />


    </head>
    <body>
        <h1>办公留言系统</h1>
        <div id="whatever">
            <ul class="tabbarlevel1" id="tabpage1"> 
                <li class="selected"><a href="admin_index.php">留言管理</a></li>
                <li><a href="admin_setting.php">系统设置</a></li>
                <li><a href="admin_changepass.php">修改密码</a></li>
                <li><a href="./login.php">退出管理</a></li> 
            </ul>
        </div>
        <div class="hackbox">

            
            <form action="updata_message_act.php" method="post" name="myform">
                <h2>修改留言</h2>
                <div class="default_top_centercontent">
                    <table cellpadding="3" style="width: 100%">
                        <tr>
                            <td  class="default_update" width="25%">
                                联系方式：
                            </td>

                            <td class="default_update" width="75%">
                                <select name="method" class="upfang" >
                                    <option value="MSN" <?php if($row['method']=="MSN"){echo "selected";}?>>MSN</option>
                                    <option value="Email" <?php if($row['method']=="Email"){echo "selected";}?>>Email</option>
                                    <option value="QQ" <?php if($row['method']=="QQ"){echo "selected";}?>>QQ</option>
                                    <option value="mobile" <?php if($row['method']=="mobile"){echo "selected";}?>>手机</option>
                                </select>&nbsp;&nbsp;&nbsp;
                                <input type="text" name="method_v" id="method_v" value="9273298734" class="upfang"/>
                            </td>
                        </tr>
                        <tr>
                            <td  class="default_update">
                                留言标题：
                            </td>
                            <td class="default_update">
                                <input type="text" value= "<?php echo $row['title'];?>" size="55px;" class="upfang" name="title"/>
                            </td>

                        </tr>
                        <tr>
                            <td class="default_update">
                                留言内容：
                            </td>
                            <td class="default_update">
                                <textarea class="upfang" name="content"><?php echo $row['content'];?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td  class="default_update" colspan="2">
                                <input name="submit" type="submit" value="修改" />
                            </td>
                        </tr>
                    </table>
                </div>
            </form>
        </div>
    </body>
</html>