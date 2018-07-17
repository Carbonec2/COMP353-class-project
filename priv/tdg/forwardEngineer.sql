-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`Employee`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Employee` (
  `id` INT NOT NULL,
  `firstName` VARCHAR(255) NULL,
  `lastName` VARCHAR(255) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Department`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Department` (
  `departmentName` VARCHAR(45) NOT NULL,
  `managerId` INT NOT NULL,
  PRIMARY KEY (`departmentName`),
  INDEX `fk_Department_Employee1_idx` (`managerId` ASC),
  CONSTRAINT `fk_Department_Employee1`
    FOREIGN KEY (`managerId`)
    REFERENCES `mydb`.`Employee` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`ContractType`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`ContractType` (
  `Type` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`Type`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`ServiceType`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`ServiceType` (
  `serviceType` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`serviceType`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Contract`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Contract` (
  `ID` INT NOT NULL,
  `Type` VARCHAR(45) NOT NULL,
  `managerId` INT NOT NULL,
  `responsibleFirstName` VARCHAR(255) NULL,
  `responsibleLastName` VARCHAR(255) NULL,
  `responsibleEmail` VARCHAR(45) NULL,
  `address` VARCHAR(255) NULL,
  `province` VARCHAR(25) NULL,
  `postalCode` VARCHAR(7) NULL,
  `annualContractValue` DOUBLE NULL,
  `initialAmount` DOUBLE NULL,
  `serviceStartDate` DATE NULL,
  `serviceType` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_Contract_ContractType_idx` (`Type` ASC),
  INDEX `fk_Contract_Employee1_idx` (`managerId` ASC),
  INDEX `fk_Contract_ServiceType1_idx` (`serviceType` ASC),
  CONSTRAINT `fk_Contract_ContractType`
    FOREIGN KEY (`Type`)
    REFERENCES `mydb`.`ContractType` (`Type`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Contract_Employee1`
    FOREIGN KEY (`managerId`)
    REFERENCES `mydb`.`Employee` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Contract_ServiceType1`
    FOREIGN KEY (`serviceType`)
    REFERENCES `mydb`.`ServiceType` (`serviceType`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Department_Employee`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Department_Employee` (
  `Department_departmentName` VARCHAR(45) NOT NULL,
  `Employee_id` INT NOT NULL,
  PRIMARY KEY (`Department_departmentName`, `Employee_id`),
  INDEX `fk_Department_has_Employee_Employee1_idx` (`Employee_id` ASC),
  INDEX `fk_Department_has_Employee_Department1_idx` (`Department_departmentName` ASC),
  CONSTRAINT `fk_Department_has_Employee_Department1`
    FOREIGN KEY (`Department_departmentName`)
    REFERENCES `mydb`.`Department` (`departmentName`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Department_has_Employee_Employee1`
    FOREIGN KEY (`Employee_id`)
    REFERENCES `mydb`.`Employee` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;


-- d1)
INSERT INTO 'ContractType' VALUES ('On Premise');

INSERT INTO Contract VALUES ('123', 'Premium', '1', 'John', 'S', 'Smith',  'GSCCorporation@gmail.com', '514-222-2222', '8080 Saint-Denis, Montreal', 'Quebec', 'Q1Q 1Q1', '90000.10', '10000.12', NOW(), 'On-premises', "GSC Corporation");
-- d2)

-- d3)

-- d4) 

-- d5)
SELECT * from 'Contract' WHERE Contract.ID=Employee.id AND Employee.firstName='Juan' AND Employee.lastName='Vasquez';
