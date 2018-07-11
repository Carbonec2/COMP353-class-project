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
  `middleInitial` VARCHAR(1) NULL,
  `lastName` VARCHAR(255) NULL,
  `Department_departmentName` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Employee_Department1_idx` (`Department_departmentName` ASC),
  CONSTRAINT `fk_Employee_Department1`
    FOREIGN KEY (`Department_departmentName`)
    REFERENCES `mydb`.`Department` (`departmentName`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Department`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Department` (
  `departmentName` VARCHAR(45) NOT NULL,
  `managerId` INT NULL,
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
  `responsibleMiddleInitial` VARCHAR(1) NULL,
  `responsibleLastName` VARCHAR(255) NULL,
  `responsibleEmail` VARCHAR(45) NULL,
  `responsiblePhoneNumber` VARCHAR(45) NULL,
  `address` VARCHAR(255) NULL,
  `province` VARCHAR(25) NULL,
  `postalCode` VARCHAR(7) NULL,
  `annualContractValue` DOUBLE NULL,
  `initialAmount` DOUBLE NULL,
  `serviceStartDate` DATE NULL DEFAULT NOW(),
  `serviceType` VARCHAR(45) NOT NULL,
  `companyName` VARCHAR(45) NULL,
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


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `mydb`.`Employee`
-- -----------------------------------------------------
START TRANSACTION;
USE `mydb`;
INSERT INTO `mydb`.`Employee` (`id`, `firstName`, `middleInitial`, `lastName`, `Department_departmentName`) VALUES (1, 'Bob', 'B', 'Gratton', 'QA');
INSERT INTO `mydb`.`Employee` (`id`, `firstName`, `middleInitial`, `lastName`, `Department_departmentName`) VALUES (2, 'Octave', 'B', 'Crémazie', 'UI');
INSERT INTO `mydb`.`Employee` (`id`, `firstName`, `middleInitial`, `lastName`, `Department_departmentName`) VALUES (3, 'Gaétan', 'B', 'Soucy', 'Design');
INSERT INTO `mydb`.`Employee` (`id`, `firstName`, `middleInitial`, `lastName`, `Department_departmentName`) VALUES (4, 'Gabrielle', 'B', 'Arcand', 'Development');
INSERT INTO `mydb`.`Employee` (`id`, `firstName`, `middleInitial`, `lastName`, `Department_departmentName`) VALUES (5, 'Claude', 'H', 'Grignon', 'Business Intelligence');
INSERT INTO `mydb`.`Employee` (`id`, `firstName`, `middleInitial`, `lastName`, `Department_departmentName`) VALUES (6, 'Réjean', 'D', 'Ducharme', 'Networking');
INSERT INTO `mydb`.`Employee` (`id`, `firstName`, `middleInitial`, `lastName`, `Department_departmentName`) VALUES (7, 'Séraphin', 'J', 'Poudrier', 'Networking');
INSERT INTO `mydb`.`Employee` (`id`, `firstName`, `middleInitial`, `lastName`, `Department_departmentName`) VALUES (8, 'Antoine', 'J', 'Labelle', 'Business Intelligence');
INSERT INTO `mydb`.`Employee` (`id`, `firstName`, `middleInitial`, `lastName`, `Department_departmentName`) VALUES (9, 'Honoré', 'J', 'Mercier', 'Business Intelligence');
INSERT INTO `mydb`.`Employee` (`id`, `firstName`, `middleInitial`, `lastName`, `Department_departmentName`) VALUES (10, 'René', 'J', 'Chaloult', 'UI');

COMMIT;


-- -----------------------------------------------------
-- Data for table `mydb`.`Department`
-- -----------------------------------------------------
START TRANSACTION;
USE `mydb`;
INSERT INTO `mydb`.`Department` (`departmentName`, `managerId`) VALUES ('Development', 4);
INSERT INTO `mydb`.`Department` (`departmentName`, `managerId`) VALUES ('QA', 1);
INSERT INTO `mydb`.`Department` (`departmentName`, `managerId`) VALUES ('UI', 2);
INSERT INTO `mydb`.`Department` (`departmentName`, `managerId`) VALUES ('Design', 3);
INSERT INTO `mydb`.`Department` (`departmentName`, `managerId`) VALUES ('Business Intelligence', 5);
INSERT INTO `mydb`.`Department` (`departmentName`, `managerId`) VALUES ('Networking', 6);

COMMIT;


-- -----------------------------------------------------
-- Data for table `mydb`.`ContractType`
-- -----------------------------------------------------
START TRANSACTION;
USE `mydb`;
INSERT INTO `mydb`.`ContractType` (`Type`) VALUES ('Premium');
INSERT INTO `mydb`.`ContractType` (`Type`) VALUES ('Gold');
INSERT INTO `mydb`.`ContractType` (`Type`) VALUES ('Diamond');
INSERT INTO `mydb`.`ContractType` (`Type`) VALUES ('Silver');

COMMIT;


-- -----------------------------------------------------
-- Data for table `mydb`.`ServiceType`
-- -----------------------------------------------------
START TRANSACTION;
USE `mydb`;
INSERT INTO `mydb`.`ServiceType` (`serviceType`) VALUES ('Cloud');
INSERT INTO `mydb`.`ServiceType` (`serviceType`) VALUES ('On-premises');

COMMIT;
