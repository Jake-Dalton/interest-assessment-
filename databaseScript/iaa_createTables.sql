use iaa;

create table users(
userID int auto_increment primary key not null,
role nvarchar(30) not null,
username nvarchar(50) not null,
userPassword nvarchar(20) not null,
userEmail nvarchar(30) not null,
userPhone int not null
);

create table quiz(
quizID int auto_increment primary key not null,
userID int not null,
quizName nvarchar(30) not null
);

create table questions (
questionID int auto_increment primary key not null,
quizID int not null,
hasAnswer boolean not null,
questionContent nvarchar(1000) not null
);

create table answers (
answerID int auto_increment primary key not null,
questionID int not null,
isCorrect boolean not null,
answerContent nvarchar(1000) not null
);

create table responses (
responseID int auto_increment primary key not null,
quizID int not null,
studentEmail nvarchar(30) not null,
studentFirst nvarchar(30) not null,
studentLast nvarchar(30) not null,
studentCwiID int,
submitTime datetime not null
);

alter table responses
add selectedAnswer1 int null,
add selectedAnswer2 int null,
add selectedAnswer3 int null,
add selectedAnswer4 int null,
add selectedAnswer5 int null,
add selectedAnswer6 int null,
add selectedAnswer7 int null,
add selectedAnswer8 int null,
add selectedAnswer9 int null,
add selectedAnswer10 int null,
add selectedAnswer11 int null,
add selectedAnswer12 int null,
add selectedAnswer13 int null,
add selectedAnswer14 int null,
add selectedAnswer15 int null,
add selectedAnswer16 int null,
add selectedAnswer17 int null,
add selectedAnswer18 int null,
add selectedAnswer19 int null,
add selectedAnswer20 int null,
add selectedAnswer21 int null,
add selectedAnswer22 int null,
add selectedAnswer23 int null,
add selectedAnswer24 int null,
add selectedAnswer25 int null,
add selectedAnswer26 int null,
add selectedAnswer27 int null,
add selectedAnswer28 int null,
add selectedAnswer29 int null,
add selectedAnswer30 int null,
add selectedAnswer31 int null,
add selectedAnswer32 int null,
add selectedAnswer33 int null,
add selectedAnswer34 int null,
add selectedAnswer35 int null,
add selectedAnswer36 int null,
add selectedAnswer37 int null,
add selectedAnswer38 int null,
add selectedAnswer39 int null,
add selectedAnswer40 int null,
add selectedAnswer41 int null,
add selectedAnswer42 int null,
add selectedAnswer43 int null,
add selectedAnswer44 int null,
add selectedAnswer45 int null,
add selectedAnswer46 int null,
add selectedAnswer47 int null,
add selectedAnswer48 int null,
add selectedAnswer49 int null,
add selectedAnswer50 int null;

select *from responses;
