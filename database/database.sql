create  database pico;
create table pico.users(id int(10) not null auto_increment, name varchar(100), phone bigint(12), email varchar(100), password varchar(100), profile varchar(300), verified varchar(10),upi varchar(100), primary key (id));
create table pico.posts(id int(10) not null auto_increment, user_id int(10), image_dir varchar(300), price int(10), caption varchar(200), camera varchar(50), lens varchar(20), focal varchar(20), shutter varchar(20), iso varchar(20),primary key (id));
create table pico.likes(id int(10) not null auto_increment, post_id int(10), user_id int(10), primary key (id));
create table pico.comments(id int(10) not null auto_increment, post_id int(10), user_id int(10), comment varchar(200), primary key (id));
create table pico.trend(id int(10) not null auto_increment, post_id int(10), views bigint(10), download bigint(10), primary key (id));
create table pico.report(id int(10) not null auto_increment, post_id int(10), primary key (id));
create table pico.follow(id int(10) not null auto_increment, follower int(10), following int(10), primary key (id));
