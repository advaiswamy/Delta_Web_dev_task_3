CREATE TABLE `users` (
	`id` int(100) NOT NULL AUTO_INCREMENT,
	`username` varchar(255) NOT NULL UNIQUE,
	`password` varchar(255) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `invitation` (
	`user_id` int(100) NOT NULL,
	`inv_id` int(100) NOT NULL AUTO_INCREMENT,
	`template` varchar(255) NOT NULL,
	`status` varchar(255) NOT NULL,
	`header` varchar(255) NOT NULL,
	`message` varchar(255) NOT NULL,
	`footer` varchar(255) NOT NULL,
	`date_inv` DATE NOT NULL,
	`deadline` DATETIME NOT NULL,
	PRIMARY KEY (`inv_id`)
);

CREATE TABLE `style` (
	`inv_id` int(100) NOT NULL,
	`font` varchar(100) NOT NULL,
	`font_color` varchar(100) NOT NULL
);

CREATE TABLE `inv_status` (
	`user_id` int(100) NOT NULL,
	`inv_id` int(100) NOT NULL,
	`approval` varchar(255) NOT NULL,
	`response` varchar(500) NOT NULL,
	`deadline` DATETIME NOT NULL,
	`end_user` int NOT NULL
);

CREATE TABLE `created_evnts` (
	`user_id` int(100) NOT NULL,
	`inv_id` int(100) NOT NULL,
	`evt_name` varchar(255) NOT NULL,
	`strt_time` TIME NOT NULL,
	`end_time` TIME NOT NULL
);

ALTER TABLE `invitation` ADD CONSTRAINT `invitation_fk0` FOREIGN KEY (`user_id`) REFERENCES `users`(`id`);

ALTER TABLE `style` ADD CONSTRAINT `style_fk0` FOREIGN KEY (`inv_id`) REFERENCES `invitation`(`inv_id`);

ALTER TABLE `inv_status` ADD CONSTRAINT `inv_status_fk0` FOREIGN KEY (`user_id`) REFERENCES `users`(`id`);

ALTER TABLE `inv_status` ADD CONSTRAINT `inv_status_fk1` FOREIGN KEY (`inv_id`) REFERENCES `invitation`(`inv_id`);

ALTER TABLE `inv_status` ADD CONSTRAINT `inv_status_fk2` FOREIGN KEY (`deadline`) REFERENCES `invitation`(`deadline`);

ALTER TABLE `created_evnts` ADD CONSTRAINT `created_evnts_fk0` FOREIGN KEY (`user_id`) REFERENCES `invitation`(`user_id`);

ALTER TABLE `created_evnts` ADD CONSTRAINT `created_evnts_fk1` FOREIGN KEY (`inv_id`) REFERENCES `invitation`(`inv_id`);

