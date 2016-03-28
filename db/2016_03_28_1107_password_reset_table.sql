CREATE TABLE `PasswordReset` (`passwordResetId` INT NOT NULL AUTO_INCREMENT, `userId` INT NULL, `code` VARCHAR(45) NULL, `validity` DATETIME NULL, PRIMARY KEY (`passwordResetId`));
