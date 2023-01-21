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
  `email` VARCHAR(55) NOT NULL,
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
  `img1` INT NOT NULL, 
  `img2` INT NOT NULL, 
  `img3` INT,
  `img4` INT, 
  `utente` INT NOT NULL,
  PRIMARY KEY (`idpost`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `toptips`.`commento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `toptips`.`commento` (
  `post` INT NOT NULL,
  `utente` INT NOT NULL,
  `datacommento` DATETIME NOT NULL,
  `testo` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`post`, `utente`, `datacommento`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `toptips`.`profilo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `toptips`.`profilo` (
  `idprofilo` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(100) UNIQUE NOT NULL,
  `imgprofilo` VARCHAR(50) NOT NULL,  
  `utente` INT NOT NULL,
  PRIMARY KEY (`idprofilo`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `toptips`.`immagine`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `toptips`.`immagine` (
  `image_id` INT NOT NULL AUTO_INCREMENT,
  `filename` VARCHAR(50) NOT NULL,
  `votes` INT NOT NULL,
  PRIMARY KEY (`image_id`)
)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `toptips`.`segue`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `toptips`.`segue` (
  `utente1` INT NOT NULL,
  `utente2` INT NOT NULL,
  PRIMARY KEY (`utente1`, `utente2`)
)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `toptips`.`seguito`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `toptips`.`seguito` (
  `utente2` INT NOT NULL,
  `utente1` INT NOT NULL,
  PRIMARY KEY (`utente2`, `utente1`)
)
ENGINE = InnoDB;