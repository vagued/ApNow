-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema apnow
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema apnow
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `apnow` DEFAULT CHARACTER SET utf8 ;
USE `apnow` ;

-- -----------------------------------------------------
-- Table `apnow`.`clients`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `apnow`.`clients` (
  `idclient` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `firstname` VARCHAR(45) NOT NULL,
  `lastname` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idclient`),
  UNIQUE INDEX `username_UNIQUE` (`username` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `apnow`.`apartments`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `apnow`.`apartments` (
  `idapartment` INT NOT NULL,
  `title` VARCHAR(45) NOT NULL,
  `location` VARCHAR(45) NOT NULL,
  `descr` VARCHAR(45) NOT NULL,
  `checkout` DATETIME NOT NULL,
  `idclient` INT NOT NULL,
  UNIQUE INDEX `title_UNIQUE` (`title` ASC),
  PRIMARY KEY (`idapartment`, `idclient`),
  INDEX `fk_apartments_clients_idx` (`idclient` ASC),
  CONSTRAINT `fk_apartments_clients`
    FOREIGN KEY (`idclient`)
    REFERENCES `apnow`.`clients` (`idclient`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `apnow`.`rentings`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `apnow`.`rentings` (
  `idrenting` INT NOT NULL,
  `idclient` INT NOT NULL,
  `idapartment` INT NOT NULL,
  `rating` INT NOT NULL,
  `comment` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idrenting`),
  INDEX `fk_rentings_clients1_idx` (`idclient` ASC),
  INDEX `fk_rentings_apartments1_idx` (`idapartment` ASC),
  CONSTRAINT `fk_rentings_clients1`
    FOREIGN KEY (`idclient`)
    REFERENCES `apnow`.`clients` (`idclient`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_rentings_apartments1`
    FOREIGN KEY (`idapartment`)
    REFERENCES `apnow`.`apartments` (`idapartment`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `apnow` ;

-- -----------------------------------------------------
-- Placeholder table for view `apnow`.`view1`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `apnow`.`view1` (`id` INT);

-- -----------------------------------------------------
--  routine1
-- -----------------------------------------------------

DELIMITER $$
USE `apnow`$$
$$

DELIMITER ;

-- -----------------------------------------------------
-- View `apnow`.`view1`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `apnow`.`view1`;
USE `apnow`;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

CREATE USER 'ApNowUser'@'localhost' IDENTIFIED BY 'Apass!@#';
GRANT ALL PRIVILEGES ON apnow.* TO 'ApNowUser'@'%';
