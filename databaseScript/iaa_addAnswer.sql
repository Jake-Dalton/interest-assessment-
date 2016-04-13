use iaa;

insert into answers
values (null, 2, 1, '1'),
(null, 3, 1, '2'),
(null, 4, 1, '3'),
(null, 5, 1, '4'),
(null, 6, 1, '5'),
(null, 7, 0, 'A. <head>'),
(null, 7, 1, 'B. <h1>'),
(null, 7, 0, 'C. <heading>'),
(null, 7, 0, 'D. <h6>'),
(null, 8, 0, 'A. document.getElement("p").innerHTML="Hello World!";'),
(null, 8, 0, 'B. document.getElementByName("p").innerHTML = "Hello World!";'),
(null, 8, 1, 'C. document.getElementById("demo").innerHTML = "Hello World!";'),
(null, 8, 0, 'D. #demo.innerHTML = "Hello World!";'),
(null, 9, 0, 'A. "Hello World";'),
(null, 9, 0, 'B. Document.Write("Hello World");'),
(null, 9, 1, 'C. echo "Hello World"; '),
(null, 10, 0, 'A. {body;color:black;}'),
(null, 10, 0, 'B. body:color=black;'),
(null, 10, 0, 'C. {body:color=black;}'),
(null, 10, 1, 'D. body {color: black;}'),
(null, 11, 1, 'A. SELECT * FROM Persons '),
(null, 11, 0, 'B. SELECT Persons'),
(null, 11, 0, 'C. SELECT *.Persons'),
(null, 11, 0, 'D. SELECT [all] FROM Persons');

insert into answers
values (null, 12, 0, 'A. The username and password are sent for authentication.'),
(null, 12, 1, 'B. A digital certificate establishes the web site identity to the browser.'),
(null, 12, 0, 'C. The web page is displayed, and then authentication is performed.'),
(null, 12, 0, 'D. The client establishes its identity to the web server.'),
(null, 13, 0, 'A. On its expiry date'),
(null, 13, 0, 'B. After it expires'),
(null, 13, 0, 'C. After it’s revoked'),
(null, 13, 1, 'D. Thirty days before expire'),
(null, 14, 0, 'A. The denial-of-service worm has already infected the firewall locally.'),
(null, 14, 1, 'B. The attack is coming from multiple, distributed hosts. '),
(null, 14, 0, 'C. A firewall can’t block denial-of-service attacks.'),
(null, 14, 0, 'D. Antivirus software needs to be installed.'),
(null, 15, 1, 'A. It allows wireless access only for specified MAC addresses.'),
(null, 15, 0, 'B. It prevents wireless access only from specified MAC addresses.'),
(null, 15, 0, 'C. It encrypts only specified wireless device MAC addresses.'),
(null, 15, 0, 'D. It encrypts only MAC addresses not specified.'),
(null, 16, 0, 'A. The virus was already pre-existing on the system.'),
(null, 16, 1, 'B. Antivirus signatures need to be updated.'),
(null, 16, 0, 'C. The virus could only be blocked by a pop-up blocker.'),
(null, 16, 0, 'D. Operating system software was out of date.');

select * from answers;

