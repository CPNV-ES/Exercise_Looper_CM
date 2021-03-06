-- MySQL Script generated by MySQL Workbench
-- Tue Sep  8 13:48:28 2020
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema ExerciceLooper
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `ExerciceLooper` ;

-- -----------------------------------------------------
-- Schema ExerciceLooper
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `ExerciceLooper` DEFAULT CHARACTER SET utf8 ;
USE `ExerciceLooper` ;

-- -----------------------------------------------------
-- Table `ExerciceLooper`.`Exercises`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ExerciceLooper`.`Exercises` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `Title` TEXT NOT NULL,
  `State` ENUM('Building', 'Answering', 'Closed') DEFAULT 'Building',
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ExerciceLooper`.`Fields`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ExerciceLooper`.`Fields` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `Label` VARCHAR(255) NOT NULL,
  `ValueKind` ENUM('Single_line_text', 'List_of_single_lines', 'Multi-line_text') NOT NULL,
  `Exercises_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_Fields_Exercises1`
    FOREIGN KEY (`Exercises_id`)
    REFERENCES `ExerciceLooper`.`Exercises` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ExerciceLooper`.`TimeStamp`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ExerciceLooper`.`TimeStamp` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `Exercises_id` INT NOT NULL,
  `TimeStamp` TIMESTAMP NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_TimeStamp_Exercises1`
    FOREIGN KEY (`Exercises_id`)
    REFERENCES `ExerciceLooper`.`Exercises` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ExerciceLooper`.`Answers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ExerciceLooper`.`Answers` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `Response` TEXT NULL,
  `Exercises_id` INT NOT NULL,
  `TimeStamp_id` INT NOT NULL,
  `Fields_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_Answers_Exercises1`
    FOREIGN KEY (`Exercises_id`)
    REFERENCES `ExerciceLooper`.`Exercises` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Answers_TimeStamp1`
    FOREIGN KEY (`TimeStamp_id`)
    REFERENCES `ExerciceLooper`.`TimeStamp` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
    CONSTRAINT `fk_Answers_Fields1`
    FOREIGN KEY (`Fields_id`)
    REFERENCES `ExerciceLooper`.`Fields` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
