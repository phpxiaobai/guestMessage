<?php
	$link=@mysql_connect('localhost','root','3yd.c6lbdnf');
	mysql_select_db('library',$link);
	mysql_query('set names utf8');
	$res=mysql_query('select * from guestmessage');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
        <title>办公留言系统</title>

        <link type="text/css" href="./css/guest_add.css" rel="stylesheet" /> 


    </head>

    <body>
        <h1>办公留言系统</h1>
        <div class="container">

            <form id="contactform" name="contactform" class="rounded" method="post" action="add_show_act.php" name="message">
                <h3>给我留言</h3>

                <div class="field">
                    <label for="user_name">您的联系方式：</label>
                    <select name="method" class="lxfs">
                        <option value="MSN">MSN</option>
                        <option value="Email">Email</option>
                        <option value="QQ">QQ</option>
                        <option value="mobile">手机</option>
                    </select>
                    <input type="text" class="lxfs" name="method_v" id="user_name" value=""/>
                    <p class="hint">输入您的联系方式(MSN/Email/QQ/手机)</p>
                </div>

                <div class="field">
                    <label for="post_title">留言标题：</label>
                    <input type="text" class="input" name="title" id="post_title" />
                    <p class="hint">输入留言标题</p>
                </div>

                <div class="field">
                    <label for="post_info">留言内容：<br />(最多 70 字)</label>
                    <textarea class="input textarea" name="content" id="post_info"></textarea>
                    <p class="hint">输入留言内容</p>
                </div>

                <div class="field">
                    <label for="yzm"><a name="yzmtp">验证码：</a></label>
                    <img id="re_confirm" src="yanzhengma.png" class="yzm" />
                    <input type="text" class="yzm" name="yzm" id="yzm" />
                    <p class="hint">输入运算结果 <a title="看不清?" href="#yzmtp" >看不清?</a></p>
                </div>
                <input type="submit" name="Submit"  class="button" value="提交" onclick="return check_message()" />
                <br />请不要恶意骚扰，否则您的 IP 将会被添加到黑名单中<br />
            </form>

            <div class="fankui" style="float:right;">
            <script type="text/javascript">

                function show_back_form(mid){
                    document.getElementById('huifu'+mid).style.display="block";
                }
            </script>

		
			<div class="content">
			<?php while($row=mysql_fetch_assoc($res)){
			
			?>
                    <p class="c_title"><span><?echo $row['add_time'];?></span><? echo $row['title'];?></p>
                    <p class="c_content" style="margin-bottom:20px;">
                       <?php
							echo $row['content'];
					   ?>
                    </p>

					<p class="back_btn_p">&nbsp;<input type="button" value="回复" class="back_btn" style="float:right;"/
						onclick=show_back_form(<?php echo $row['id']; ?>);
					>
					</p>					
					<div class="huifu" id="huifu<?php echo $row['id']; ?>" style="display:none;">
                        <p>回复：</p>
                        <div class="huifu_show">
                            <form action="add_back_act.php" method="post">
                                <!--在表单里边制作一个表单域，存放留言id信息，以便通过表单传递给回复使用-->
                                <input type="hidden" name="backid" value="<?php echo $row['id']; ?>" />
                                <input type="text" class="bk_content" name="add_back_content" />
                                <input type="submit" value="回复" class="back_btn" />
                            </form>
                        </div>
                    </div>  
					<?php 
					$sqla="select * from guestback where message_id={$row['id']}";
					//echo $sqla;
					$i=1;
					$resa=@mysql_query($sqla);
					while($row=mysql_fetch_assoc($resa))
				{
				?>
                    <div class="back_content">
                        <strong><?php echo $i;?> 楼</strong>
                        <div class="back_detail">
                            <div class="back_neirong"><?php echo $row['backcontent'];?></div>
                            <div class="back_time"><?php echo $row['backtime'];?></div>
                        </div>
                    </div> 
				<?php
				$i++;
				}
					}
				?>
                </div>
			

				
				<div class="content">
                    <p class="c_title"><span>2013-03-29 11:24</span>雨披评论</p>
                    <p class="c_content" style="margin-bottom:20px;">
                        优　　点：
                            得体、大方
                        不　　足：
                            暂时还没发现缺点哦！
                        心　　得：
                            感觉雨衣有些小，最好大一号就好了
                        购买日期：
                            2013-03-22
                        优　　点：
                            得体、大方
                        不　　足：
                            暂时还没发现缺点哦！
                        心　　得：
                            感觉雨衣有些小，最好大一号就好了
                        购买日期：
                            2013-03-22
                        优　　点：
                            得体、大方
                        不　　足：
                            暂时还没发现缺点哦！
                        心　　得：
                            感觉雨衣有些小，最好大一号就好了
                        购买日期：
                            2013-03-22
                    </p>
                    <p class="back_btn_p">&nbsp;<input type="button" value="回复" class="back_btn" style="float:right;"/></p>
                    <div class="back_content">
                        <strong>2</strong>
                        <div class="back_detail">
                            <div class="back_neirong">款式还可以</div>
                            <div class="back_time">13-3-29 下午2:29</div>
                        </div>
                    </div>
                    <div class="back_content">
                        <strong>2</strong>
                        <div class="back_detail">
                            <div class="back_neirong">款式还可以</div>
                            <div class="back_time">13-3-29 下午2:29</div>
                        </div>
                    </div>
                </div>
			</div>
        </div>
    </body>
</html>