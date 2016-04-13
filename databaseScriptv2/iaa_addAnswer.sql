use iaa;

insert into answers
values 
(null, 1, 1, '1'),
(null, 1, 1, '2'),
(null, 1, 1, '3'),
(null, 1, 1, '4'),
(null, 1, 1, '5'),

(null, 2, 1, '1'),
(null, 2, 1, '2'),
(null, 2, 1, '3'),
(null, 2, 1, '4'),
(null, 2, 1, '5'),

(null, 3, 1, '1'),
(null, 3, 1, '2'),
(null, 3, 1, '3'),
(null, 3, 1, '4'),
(null, 3, 1, '5'),

(null, 4, 1, '1'),
(null, 4, 1, '2'),
(null, 4, 1, '3'),
(null, 4, 1, '4'),
(null, 4, 1, '5'),

(null, 5, 1, '1'),
(null, 5, 1, '2'),
(null, 5, 1, '3'),
(null, 5, 1, '4'),
(null, 5, 1, '5'),

(null, 6, 0, 'Network'),
(null, 6, 0, 'Controller'),
(null, 6, 0, 'Supplier'),
(null, 6, 1, 'Third '),

(null, 7, 0, 'Application'),
(null, 7, 1, 'Security'),
(null, 7, 0, 'System'),
(null, 7, 0, 'Web'),

(null, 8, 0, 'Entering a password'),
(null, 8, 0, 'Turning on the computer'),
(null, 8, 0, 'Username'),
(null, 8, 1, 'Entering a username and a password'),

(null, 9, 0, 'CTRL'),
(null, 9, 0, 'SHIFT'),
(null, 9, 1, 'ALT'),
(null, 9, 0, 'TAB'),

(null, 10, 0, 'Network'),
(null, 10, 0, 'Controller'),
(null, 10, 0, 'Supplier'),
(null, 10, 1, 'Third'),

(null, 11, 0, '<head>'),
(null, 11, 1, '<h1>'),
(null, 11, 0, '<heading>'),
(null, 11, 0, '<h6>'),

(null, 12, 0, 'document.getElement("p").innerHTML="Hello World!";'),
(null, 12, 0, 'document.getElementByName("p").innerHTML = "Hello World!";'),
(null, 12, 1, 'document.getElementById("demo").innerHTML = "Hello World!";'),
(null, 12, 0, '#demo.innerHTML = "Hello World!";'),

(null, 13, 0, '"Hello World";'),
(null, 13, 0, 'Document.Write("Hello World");'),
(null, 13, 1, 'echo "Hello World"; '),

(null, 14, 0, '{body;color:black;}'),
(null, 14, 0, 'body:color=black;'),
(null, 14, 0, '{body:color=black;}'),
(null, 14, 1, 'body {color: black;}'),

(null, 15, 1, 'SELECT * FROM Persons '),
(null, 15, 0, 'SELECT Persons'),
(null, 15, 0, 'SELECT *.Persons'),
(null, 15, 0, 'SELECT [all] FROM Persons'),

(null, 16, 0, 'The username and password are sent for authentication.'),
(null, 16, 1, 'A digital certificate establishes the web site identity to the browser.'),
(null, 16, 0, 'The web page is displayed, and then authentication is performed.'),
(null, 16, 0, 'The client establishes its identity to the web server.'),

(null, 17, 0, ' On its expiry date'),
(null, 17, 0, 'After it expires'),
(null, 17, 0, 'After it’s revoked'),
(null, 17, 1, 'Thirty days before expire'),

(null, 18, 0, 'The denial-of-service worm has already infected the firewall locally.'),
(null, 18, 1, 'The attack is coming from multiple, distributed hosts. '),
(null, 18, 0, 'A firewall can’t block denial-of-service attacks.'),
(null, 18, 0, 'Antivirus software needs to be installed.'),

(null, 19, 1, 'It allows wireless access only for specified MAC addresses.'),
(null, 19, 0, 'It prevents wireless access only from specified MAC addresses.'),
(null, 19, 0, 'It encrypts only specified wireless device MAC addresses.'),
(null, 19, 0, 'It encrypts only MAC addresses not specified.'),

(null, 20, 0, 'The virus was already pre-existing on the system.'),
(null, 20, 1, 'Antivirus signatures need to be updated.'),
(null, 20, 0, 'The virus could only be blocked by a pop-up blocker.'),
(null, 20, 0, 'Operating system software was out of date.');

select * from answers;

