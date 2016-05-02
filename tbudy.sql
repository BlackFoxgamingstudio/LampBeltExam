-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema tbuddy
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema tbuddy
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `tbuddy` DEFAULT CHARACTER SET utf8 ;
USE `tbuddy` ;

-- -----------------------------------------------------
-- Table `tbuddy`.`trip_schedules`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tbuddy`.`trip_schedules` ;

CREATE TABLE IF NOT EXISTS `tbuddy`.`trip_schedules` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `destination` VARCHAR(100) NOT NULL,
  `description` TEXT NOT NULL,
  `date_from` DATE NOT NULL,
  `date_to` DATE NOT NULL,
  `created_by_id` INT(11) NOT NULL,
  `created_at` DATETIME NOT NULL,
  `updated_at` DATETIME NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `tbuddy`.`users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tbuddy`.`users` ;

CREATE TABLE IF NOT EXISTS `tbuddy`.`users` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `username` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `salt` VARCHAR(45) NOT NULL,
  `created_at` DATETIME NOT NULL,
  `updated_at` DATETIME NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `tbuddy`.`travel_plans`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tbuddy`.`travel_plans` ;

CREATE TABLE IF NOT EXISTS `tbuddy`.`travel_plans` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `created_at` DATETIME NOT NULL,
  `updated_at` DATETIME NOT NULL,
  `user_id` INT(11) NOT NULL,
  `trip_schedule_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_travel_plans_users_idx` (`user_id` ASC),
  INDEX `fk_travel_plans_trip_schedules1_idx` (`trip_schedule_id` ASC),
  CONSTRAINT `fk_travel_plans_trip_schedules1`
    FOREIGN KEY (`trip_schedule_id`)
    REFERENCES `tbuddy`.`trip_schedules` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_travel_plans_users`
    FOREIGN KEY (`user_id`)
    REFERENCES `tbuddy`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
