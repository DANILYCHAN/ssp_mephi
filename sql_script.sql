CREATE TABLE `contract` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `conclusionDate` varchar(10) NOT NULL,
  `price` int(10) NOT NULL,
  `term_months` int(2) NOT NULL,
  `insurance_type` int(2) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `insurance_type` (`insurance_type`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `contract_ibfk_1` FOREIGN KEY (`insurance_type`) REFERENCES `insurance_type` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `contract_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8

CREATE TABLE `insurance_type` (
                                  `id` int(2) NOT NULL,
                                  `insurance_name` varchar(20) NOT NULL,
                                  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8

CREATE TABLE `users` (
                         `id` int(11) NOT NULL AUTO_INCREMENT,
                         `full_name` varchar(355) DEFAULT NULL,
                         `email` varchar(255) DEFAULT NULL,
                         `password` varchar(500) DEFAULT NULL,
                         `phone_number` varchar(10) DEFAULT NULL,
                         `birth_date` varchar(10) DEFAULT NULL,
                         `inn` varchar(12) DEFAULT NULL,
                         PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8

CREATE TABLE `users_parameters` (
                                    `id` int(11) NOT NULL AUTO_INCREMENT,
                                    `user_id` int(11) NOT NULL,
                                    `TB` int(4) DEFAULT NULL,
                                    `KT` float DEFAULT NULL,
                                    `KBM` float DEFAULT NULL,
                                    `KBC` float DEFAULT NULL,
                                    `KO` float DEFAULT NULL,
                                    `KM` float DEFAULT NULL,
                                    `KC` float DEFAULT NULL,
                                    `KP` float DEFAULT NULL,
                                    `gosNomer` varchar(10) DEFAULT NULL,
                                    `sum_of_ins` int(10) DEFAULT NULL,
                                    `otdelka` int(10) DEFAULT NULL,
                                    `property` int(11) DEFAULT NULL,
                                    `otvetstvenntost` int(11) DEFAULT NULL,
                                    PRIMARY KEY (`id`),
                                    KEY `user_id` (`user_id`),
                                    CONSTRAINT `users_parameters_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8