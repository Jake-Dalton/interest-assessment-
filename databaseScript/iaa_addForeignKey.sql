use iaa;

alter table quiz
add foreign key (userID)
references users(userID);

alter table questions
add foreign key (quizID)
references quiz(quizID);

alter table answers
add foreign key (questionID)
references questions(questionID);