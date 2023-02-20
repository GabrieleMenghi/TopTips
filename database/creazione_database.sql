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
  `datapost` DATETIME NOT NULL,
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
  `imgprofilo` VARCHAR(50) NOT NULL,
  `datipersonali` VARCHAR(1000) NOT NULL, 
  `utente` INT NOT NULL,
  PRIMARY KEY (`idprofilo`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `toptips`.`immagine`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `toptips`.`immagine` (
  `image_id` INT NOT NULL AUTO_INCREMENT,
  `filename` VARCHAR(50) NOT NULL,
  `descrizione` VARCHAR(100) NOT NULL,
  `votes` INT NOT NULL,
  PRIMARY KEY (`image_id`)
)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `toptips`.`followers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `toptips`.`followers` (
  `idazione` INT NOT NULL AUTO_INCREMENT, -- id relazione/azione follow --
  `follower_id` INT NOT NULL, -- id dell'utente che segue un altro utente = id di colui che intraprende l'azione di follower --
  `following_id` INT NOT NULL, -- id dell'utente che viene seguito --
  PRIMARY KEY (`idazione`)
  )
  ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `toptips`.`notifica`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `toptips`.`notifica` (
  `idnotifica` INT NOT NULL AUTO_INCREMENT,
  `testo` VARCHAR(50) NOT NULL,
  `letta` INT NOT NULL,
  `utentenotificante` INT NOT NULL,
  `utentenotificato` INT NOT NULL,
  `datanotifica` DATETIME NOT NULL,
  PRIMARY KEY (`idnotifica`)
)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `toptips`.`post_profilo_voti`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `toptips`.`post_profilo_voti` (
  `idpost` INT NOT NULL,
  `idprofilo` INT NOT NULL,
  PRIMARY KEY (`idpost`, `idprofilo`)
)
ENGINE = InnoDB;