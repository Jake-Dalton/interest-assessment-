use iaa;

alter table quizzes
add foreign key (instructorID)
references instructors(instructorID);

alter table questions
add foreign key (quizID)
references quizzes(quizID);

alter table answers
add foreign key (questionID)
references questions(questionID);