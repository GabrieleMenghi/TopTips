SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Creazione schema
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `toptips` DEFAULT CHARACTER SET utf8 ;
USE `toptips` ;

-- -----------------------------------------------------
-- Table `toptips`.`utente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `toptips`.`utente` (
  `idutente` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(100) NOT NULL,
  `password` VARCHAR(512) NOT NULL,
  `nome` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idutente`))
ENGINE = InnoDB;