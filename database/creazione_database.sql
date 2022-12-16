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
  `username` VARCHAR(100) UNIQUE NOT NULL,
  `password` VARCHAR(512) NOT NULL,
  `nome` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idutente`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `toptips`.`post`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `toptips`.`post` (
  `idpost` INT NOT NULL AUTO_INCREMENT,
  `titolopost` VARCHAR(100) NOT NULL,
  `testopost` MEDIUMTEXT NOT NULL,
  `datapost` DATE NOT NULL,
  `anteprimapost` TINYTEXT NOT NULL,
  `numeroimmagini` INT NOT NULL,
  `img1` VARCHAR(50) NOT NULL, 
  `img2` VARCHAR(50) NOT NULL, 
  `img3` VARCHAR(50),
  `img4` VARCHAR(50), 
  `utente` INT NOT NULL,
  PRIMARY KEY (`idpost`),
  INDEX `fk_post_utente_idx` (`utente` ASC),
  CONSTRAINT `fk_post_utente`
    FOREIGN KEY (`utente`)
    REFERENCES `toptips`.`utente` (`idutente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;