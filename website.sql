CREATE TABLE `users` (
	`user_id` INT NOT NULL AUTO_INCREMENT,
	`username` VARCHAR(255)NOT NULL,
	`password` VARCHAR(255)NOT NULL,
	`birthday` VARCHAR(255)NOT NULL AUTO_INCREMENT,
	`about_me` VARCHAR(255),
	`name` VARCHAR(255) NOT NULL,
	PRIMARY KEY (`user_id`)
);

CREATE TABLE `games` (
	`appid` INT NOT NULL,
	`game_name` VARCHAR(255)NOT NULL,
	PRIMARY KEY (`appid`)
);

CREATE TABLE `game_news` (
	`game_appid_news` BINARY NOT NULL,
	`appid_news` VARCHAR(255) NOT NULL
);

CREATE TABLE `user_games` (
	`user_games_id` INT NOT NULL,
	`followed_games` INT NOT NULL
);

CREATE TABLE `Friends` (
	`user_friends` BINARY NOT NULL,
	`friend_id` BINARY NOT NULL
);

ALTER TABLE `game_news` ADD CONSTRAINT `game_news_fk0` FOREIGN KEY (`game_appid_news`) REFERENCES `games`(`appid`);

ALTER TABLE `user_games` ADD CONSTRAINT `user_games_fk0` FOREIGN KEY (`user_games_id`) REFERENCES `users`(`user_id`);

ALTER TABLE `user_games` ADD CONSTRAINT `user_games_fk1` FOREIGN KEY (`followed_games`) REFERENCES `games`(`appid`);