ALTER TABLE `User` ADD COLUMN `code_` VARCHAR(255) NULL AFTER `lastName`;
ALTER TABLE `User` ADD COLUMN `registerDate` DATETIME NULL AFTER `emailAddress`;
