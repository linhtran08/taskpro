use student;
truncate student;
select * from student;
insert into student values(S001,'trung','nguyen',6.9),
(S002,'linh','tran',9.6);

create database student;
use student;
create table users(
	id int auto_increment primary key,
    username varchar(50),
    password varchar(50)
)

select * from users;
select * from student;

insert into student values('S001','Trung','Nguyen','trung.nguyen@gmail.com',9.0),
('S002','Trung02','Nguyen','trung.nguyen02@gmail.com',9.6),
('S003','Trung03','Nguyen','trung.nguyen03@gmail.com',6.9);
-- lab07

create database employee;
use employee;

drop table employee;

create table employee(
	rollno varchar(50),
    name varchar(50),
    department varchar(50),
    img varchar(100)
);

select * from employee;

-- pretest 01
create database assignment02;
use assignment02;

create table tbBook(
		code int auto_increment primary key,
    name varchar(50) not null,
    price float not null,
    author varchar(30)
);

insert into tbBook(name, price, author) values
('Java fundamental',16.25, 'Sun system'),
('C# in depth',20,'Jon Skee'),
('Programming with Python', 12.5, 'Techonology Diver'),
('Mongo DB: Definitive guide', 17.27, 'Agus Kurniawan');

select * from tbBook;
truncate tbBook;
-- assignment03
create database assignment03;
use assignment03;
create table tbEmployee(
    empID VARCHAR(3) PRIMARY key,
    password VARCHAR(30) not NULL,
    fullname VARCHAR(50) not null,
    email varchar(30) not null,
    UNIQUE(email),
    role TINYINT,
    check(role in(1, 2)),
    salary int not null,
    check (salary between 100 and 10000)
);

insert into tbEmployee(empID, password, fullname, email, role, salary) values
('E01','pass01','Kim Bui','kim.bui@one-line.com',2,1500),
('E02','pass02','Trung Nguyen','trung.nguyen@one-line.com',1,1200),
('E03','pass03','Chi Dang','chi.dang@one-line.com',1,800);

select * from tbEmployee;
