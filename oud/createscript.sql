SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`role`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`role` (
  `role` VARCHAR(10) NOT NULL,
  PRIMARY KEY (`role`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`users` (
  `userid` VARCHAR(16) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `firstname` VARCHAR(45) NOT NULL,
  `lastname` VARCHAR(45) NOT NULL,
  `phonenumber` INT NOT NULL,
  `address` VARCHAR(55) NOT NULL,
  `postalcode` VARCHAR(6) NOT NULL,
  `role_role` VARCHAR(10) NOT NULL,
  PRIMARY KEY (`userid`),
  INDEX `fk_users_role1_idx` (`role_role` ASC),
  CONSTRAINT `fk_users_role1`
    FOREIGN KEY (`role_role`)
    REFERENCES `mydb`.`role` (`role`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`categories`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`categories` (
  `idcategories` VARCHAR(45) NOT NULL,
  `subCatOf` VARCHAR(45) NULL,
  PRIMARY KEY (`idcategories`),
  INDEX `fk_categories_categories1_idx` (`subCatOf` ASC),
  CONSTRAINT `fk_categories_categories1`
    FOREIGN KEY (`subCatOf`)
    REFERENCES `mydb`.`categories` (`idcategories`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`products`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`products` (
  `productid` INT NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  `price` DOUBLE NOT NULL,
  `size` VARCHAR(45) NOT NULL,
  `summary` VARCHAR(200) NULL,
  `description` VARCHAR(500) NULL,
  `pictureSmall` VARCHAR(100) NULL,
  `pictureBig` VARCHAR(100) NULL,
  `categories_idcategories` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`productid`),
  INDEX `fk_products_categories1_idx` (`categories_idcategories` ASC),
  CONSTRAINT `fk_products_categories1`
    FOREIGN KEY (`categories_idcategories`)
    REFERENCES `mydb`.`categories` (`idcategories`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`purchases`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`purchases` (
  `users_userid` INT NOT NULL,
  `products_productid` INT NOT NULL,
  `date` DATETIME NOT NULL DEFAULT now(),
  `haspaid` TINYINT(1) NOT NULL DEFAULT false,
  PRIMARY KEY (`users_userid`, `products_productid`),
  INDEX `fk_users_has_products_products1_idx` (`products_productid` ASC),
  INDEX `fk_users_has_products_users_idx` (`users_userid` ASC),
  CONSTRAINT `fk_users_has_products_users`
    FOREIGN KEY (`users_userid`)
    REFERENCES `mydb`.`users` (`userid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_has_products_products1`
    FOREIGN KEY (`products_productid`)
    REFERENCES `mydb`.`products` (`productid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
