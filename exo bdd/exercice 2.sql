-- MySQL Script generated by MySQL Workbench
-- Wed Sep 14 13:14:05 2022
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`Types`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Types` (
  `id_Types` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(45) NOT NULL,
  `charge` INT NULL,
  PRIMARY KEY (`id_Types`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Logements`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Logements` (
  `id_Logements` INT NOT NULL AUTO_INCREMENT,
  `adresse` VARCHAR(45) NOT NULL,
  `superficie` INT NULL,
  `loyer` INT NULL,
  `Types_id_Types` INT NOT NULL,
  PRIMARY KEY (`id_Logements`),
  INDEX `fk_Logements_Types_idx` (`Types_id_Types` ASC) VISIBLE,
  CONSTRAINT `fk_Logements_Types`
    FOREIGN KEY (`Types_id_Types`)
    REFERENCES `mydb`.`Types` (`id_Types`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Personnes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Personnes` (
  `id_Personnes` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(45) NOT NULL,
  `prenom` VARCHAR(45) NOT NULL,
  `date_naissance` DATE NOT NULL,
  `telephone` VARCHAR(10) NULL,
  `Logements_id_Logements` INT NOT NULL,
  PRIMARY KEY (`id_Personnes`),
  INDEX `fk_Personnes_Logements1_idx` (`Logements_id_Logements` ASC) VISIBLE,
  CONSTRAINT `fk_Personnes_Logements1`
    FOREIGN KEY (`Logements_id_Logements`)
    REFERENCES `mydb`.`Logements` (`id_Logements`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Communes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Communes` (
  `id_Communes` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(45) NOT NULL,
  `distance_agence` INT NULL,
  `nbre_hab` INT NULL,
  PRIMARY KEY (`id_Communes`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Quartiers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Quartiers` (
  `id_Quartiers` INT NOT NULL AUTO_INCREMENT,
  `libelle` VARCHAR(45) NULL,
  `Logements_id_Logements` INT NOT NULL,
  `Communes_id_Communes` INT NOT NULL,
  PRIMARY KEY (`id_Quartiers`),
  INDEX `fk_Quartiers_Logements1_idx` (`Logements_id_Logements` ASC) VISIBLE,
  INDEX `fk_Quartiers_Communes1_idx` (`Communes_id_Communes` ASC) VISIBLE,
  CONSTRAINT `fk_Quartiers_Logements1`
    FOREIGN KEY (`Logements_id_Logements`)
    REFERENCES `mydb`.`Logements` (`id_Logements`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Quartiers_Communes1`
    FOREIGN KEY (`Communes_id_Communes`)
    REFERENCES `mydb`.`Communes` (`id_Communes`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
