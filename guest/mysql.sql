-- 创建留言表 guestmessage；
create table guestmessage(
id int unsigned primary key auto_increment,
method varchar(10) not null,
method_v varchar(20) not null,
title varchar(64) not null,
content varchar(200) not null,
add_time varchar(20) not null
)charset utf8;


-- 插入几条数据
insert into guestmessage values(
null,'QQ','1343887845','明天出去玩','可以去上海迪士尼乐园',now()
)，
(null,'MSN','13788671247','有好看的韩剧吗','思悼不错，看完后好感慨',now()),
(null,'Email','1903238@qq.com','PHP工作找好了吗','我在上海找前端',now());

insert into guestmessage values(null,'Email','1903238@qq.com','PHP工作找好了吗','我在上海找前端',now());
alter table guestmessage modify method_v varchar(32) not null; 


-- 创建回复表单guestback
create table guestback(
	id int primary key auto_increment,
	backcontent varchar(200) not null,
	backtime datetime not null,
	message_id int not null
)charset utf8;

insert into guestback values(
null,'明天几点，我们一起去。',now(),1),
(
null,'好呀，上午8点到学校门口集合',now(),1),
(
null,'PHP工作前期真不好找',now(),2);