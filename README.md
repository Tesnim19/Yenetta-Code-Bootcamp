# Yenetta-Code-Bootcamp
This project is done for Yenetta Code Bootcamp. It is a simple task management system that performs all CRUD operations.

## Task Manegment System :memo:

### Database Operation Code

Database: `eked_task_manegment`
Tables: `users` and `tasks`
```ruby
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL UNIQUE,
  `email` varchar(255) NOT NULL UNIQUE,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
)

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `task` varchar(255) NOT NULL,
  `due_date` varchar(128) NOT NULL,
  `status` varchar(128) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
  FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) 

```
### How to run the program
Download XAMMP web server. Then create a folder (eg.Task) inside **htdocs** folder in _xampp_ directory and copy the above files inside that folder. Then open XAMMP CONTROL PANEL and start Apache and MySQL. Finally visit localhost/_foldername_/login.php in your browser.  
