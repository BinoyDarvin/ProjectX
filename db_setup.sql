CREATE DATABASE `projectx`;

CREATE TABLE `acc_details` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `user_id` int(11) NOT NULL,
 `bank_name` varchar(20) NOT NULL,
 `balance` int(11) NOT NULL,
 `act_no` varchar(20) NOT NULL,
 `mob_number` varchar(20) NOT NULL,
 `ifsc` varchar(20) NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=latin1



CREATE TABLE `loan_details` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `bank_name` varchar(11) NOT NULL,
 `user_id` int(11) NOT NULL,
 `loan_amount` int(20) NOT NULL,
 `type` varchar(20) NOT NULL,
 `paid_amount` int(20) NOT NULL,
 `due_amount` int(11) NOT NULL,
 `interest` int(20) NOT NULL,
 `duration` varchar(11) NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1




CREATE TABLE `login_tokens` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `token` char(64) NOT NULL,
 `user_id` int(11) NOT NULL,
 PRIMARY KEY (`id`),
 UNIQUE KEY `token` (`token`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1



CREATE TABLE `main` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `user_id` int(11) NOT NULL,
 `bank_details_id` int(11) NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=latin1




CREATE TABLE `transactions` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `user_id` int(11) NOT NULL,
 `act_no` varchar(20) NOT NULL,
 `amt` int(11) NOT NULL,
 `type` varchar(10) NOT NULL,
 `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=256 DEFAULT CHARSET=latin1




CREATE TABLE `users` (
 `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
 `username` varchar(32) NOT NULL,
 `password` varchar(60) NOT NULL,
 `email` text NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1



-----------------------------
MOTHER DATABASE
_______________________________

CREATE DATABASE `universal_open_bank` /*!40100 DEFAULT CHARACTER SET latin1 */


	
CREATE TABLE `loan` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `bank_name` varchar(11) NOT NULL,
 `user_id` int(11) NOT NULL,
 `loan_amount` int(20) NOT NULL,
 `act_no` varchar(20) NOT NULL,
 `type` varchar(20) NOT NULL,
 `paid_amount` int(20) NOT NULL,
 `due_amount` int(11) NOT NULL,
 `interest` int(20) NOT NULL,
 `duration` varchar(11) NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1



CREATE TABLE `transactions` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `user_id` int(11) NOT NULL,
 `act_no` varchar(20) NOT NULL,
 `transaction` int(11) NOT NULL,
 `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
 `type` varchar(10) NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1


CREATE TABLE `users` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `name` varchar(25) NOT NULL,
 `act_no` varchar(20) NOT NULL,
 `bank_name` varchar(20) NOT NULL,
 `ifsc` varchar(20) NOT NULL,
 `mobile_no` varchar(20) NOT NULL,
 `balance` int(11) NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1