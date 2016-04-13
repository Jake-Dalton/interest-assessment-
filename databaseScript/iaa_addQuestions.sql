use iaa;

insert into questions
values (null, 1, 1, 'Sending, receiving, printing and saving email attachments'),
(null, 1,1, 'Using Microsoft office'),
(null, 1,1, 'Go to specific website and navigate through it to find information'),
(null, 1,1, 'Navigate to specific computer drives and to specific folders'),
(null, 1,1, 'Understand the basic functions of computer hardware components such as the CPU, Monitor, Keyboard and file storage');

insert into questions
values (null, 3,1, 'Choose the correct HTML element for the largest heading'),
(null, 3,1, 'What is the correct JavaScript to change the content of the HTML element below?'),
(null, 3,1, 'How do you write "Hello World" in PHP'),
(null, 3,1, 'Which is the correct CSS syntax?'),
(null, 3,1, 'With SQL, how do you select all the columns from a table named "Persons">');

insert into questions
values (null,4, 1, 'When you connect to a secure HTTPS web page, which of the following actions is performed first?'),
(null, 4, 1, 'You need to renew your company’s certificate for its public web server. When should you renew the certificate?'),
(null, 4, 1, 'During a denial-of-service attack, a network administrator blocks the source IP with the firewall, but the attack continues. What is the most likely cause of the problem?'),
(null, 4, 1, 'To further secure your wireless network, you implement MAC address filtering. Which of the following statements describes the wireless network behavior after you enable MAC address filtering?'),
(null, 4, 1, 'You have recently installed antivirus software on several client workstations and performed a full scan of the systems. One of the systems was infected with a virus less than an hour after the installation of the software. Which of the following is the most likely issue?');

select * from questions;