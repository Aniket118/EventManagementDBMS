create table event_type(type_id number(10) primary key, type_title varchar(100));

create table events(event_id number(2) primary key, event_title varchar(100),event_price number(20), type_id number(10) references event_type);

create table participant(fullname varchar(100),email varchar(100), mobile number(10),college varchar(100), branch varchar(15), event_id number(2) references events);

insert into event_type values (1,'Technical Event');
insert into event_type values (2,'Gaming Event');
insert into event_type values (3,'On Stage Event');
insert into event_type values (4,'Off Stage Event');

insert into events values (1,'pubg',50,2);
insert into events values (2,'tech quiz',150,4);
insert into events values (3,'counter strike',100,2);
insert into events values (4,'Competitive Coding',350,1);
insert into events values (5,'seminar',0,3);
