-- MySQL Workbench Forward Engineering
SET
    @OLD_UNIQUE_CHECKS = @@UNIQUE_CHECKS,
    UNIQUE_CHECKS = 0;
SET
    @OLD_FOREIGN_KEY_CHECKS = @@FOREIGN_KEY_CHECKS,
    FOREIGN_KEY_CHECKS = 0;
SET
    @OLD_SQL_MODE = @@SQL_MODE,
    SQL_MODE = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
    -- -----------------------------------------------------
    -- Schema shell
    -- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `shell` DEFAULT CHARACTER SET utf8mb4; USE
    `shell`;
    -- -----------------------------------------------------
    -- Table `shell`.`admin`
    -- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `shell`.`admin`(
    `idadmin` INT(11) NOT NULL AUTO_INCREMENT,
    `UserName` VARCHAR(45) NOT NULL,
    `Email` VARCHAR(45) NOT NULL,
    `Password` VARCHAR(150) NOT NULL,
    PRIMARY KEY(`idadmin`)
) ENGINE = InnoDB AUTO_INCREMENT = 2 DEFAULT CHARACTER SET = utf8mb4;
-- -----------------------------------------------------
-- Table `mydb`.`Banner`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `shell`.`banner`(
    `idbanner` INT NOT NULL,
    `Description` VARCHAR(250) NOT NULL,
    `admin_idadmin` INT(11) NOT NULL,
    PRIMARY KEY(`idbanner`),
    INDEX `fk_banner_admin_idx`(`admin_idadmin` ASC),
    CONSTRAINT `fk_banner_admin` FOREIGN KEY(`admin_idadmin`) REFERENCES `shell`.`admin`(`idadmin`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB;
-- -----------------------------------------------------
-- Table `shell`.`register`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `shell`.`register`(
    `idregister` INT(11) NOT NULL AUTO_INCREMENT,
    `UserName` VARCHAR(45) NOT NULL,
    `FirstName` VARCHAR(45) NOT NULL,
    `LastName` VARCHAR(45) NOT NULL,
    `BirthDate` DATE NOT NULL,
    `Email` VARCHAR(45) NOT NULL,
    `Password` VARCHAR(150) NOT NULL,
    PRIMARY KEY(`idregister`)
) ENGINE = InnoDB AUTO_INCREMENT = 2 DEFAULT CHARACTER SET = utf8mb4;
-- -----------------------------------------------------
-- Table `mydb`.`User`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `shell`.`user`(
    `iduser` INT NOT NULL,
    `Email` VARCHAR(45) NOT NULL,
    `Password` VARCHAR(45) NOT NULL,
    `register_idregister` INT(11) NOT NULL,
    PRIMARY KEY(`iduser`),
    INDEX `fk_user_register1_idx`(`register_idregister` ASC),
    CONSTRAINT `fk_user_register1` FOREIGN KEY(`register_idregister`) REFERENCES `shell`.`register`(`idregister`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB; USE
    `shell`;
    -- -----------------------------------------------------
    -- Table `shell`.`about`
    -- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `shell`.`about`(
    `idabout` INT(11) NOT NULL AUTO_INCREMENT,
    `DescriptionShort` LONGTEXT NOT NULL,
    `DescriptionComplete` LONGTEXT NOT NULL,
    `admin_idadmin` INT(11) NOT NULL,
    PRIMARY KEY(`idabout`),
    INDEX `fk_about_admin1_idx`(`admin_idadmin` ASC),
    CONSTRAINT `fk_about_admin1` FOREIGN KEY(`admin_idadmin`) REFERENCES `shell`.`admin`(`idadmin`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 4 DEFAULT CHARACTER SET = utf8mb4;
-- -----------------------------------------------------
-- Table `shell`.`discography`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `shell`.`discography`(
    `iddiscography` INT(11) NOT NULL AUTO_INCREMENT,
    `Title` VARCHAR(45) NOT NULL,
    `Image` VARCHAR(200) NOT NULL,
    `SingleAlbum` VARCHAR(10) NOT NULL,
    `Date` DATE NOT NULL,
    `YtLink` VARCHAR(250) NOT NULL,
    `SpotifyLink` VARCHAR(250) NOT NULL,
    `Lyric` LONGTEXT NOT NULL,
    `Explain` LONGTEXT NOT NULL,
    `admin_idadmin` INT(11) NOT NULL,
    PRIMARY KEY(`iddiscography`),
    INDEX `fk_discography_admin1_idx`(`admin_idadmin` ASC),
    CONSTRAINT `fk_discography_admin1` FOREIGN KEY(`admin_idadmin`) REFERENCES `shell`.`admin`(`idadmin`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 11 DEFAULT CHARACTER SET = utf8mb4;
-- -----------------------------------------------------
-- Table `shell`.`merch`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `shell`.`merch`(
    `idmerch` INT(11) NOT NULL AUTO_INCREMENT,
    `Title` VARCHAR(45) NOT NULL,
    `Image` VARCHAR(100) NOT NULL,
    `Price` INT(11) NOT NULL,
    `admin_idadmin` INT(11) NOT NULL,
    PRIMARY KEY(`idmerch`),
    INDEX `fk_merch_admin_idx`(`admin_idadmin` ASC),
    CONSTRAINT `fk_merch_admin` FOREIGN KEY(`admin_idadmin`) REFERENCES `shell`.`admin`(`idadmin`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 10 DEFAULT CHARACTER SET = utf8mb4;
-- -----------------------------------------------------
-- Table `shell`.`news`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `shell`.`news`(
    `idnews` INT(11) NOT NULL AUTO_INCREMENT,
    `Title` VARCHAR(45) NOT NULL,
    `Image` VARCHAR(200) NOT NULL,
    `Description` MEDIUMTEXT NOT NULL,
    `Date` DATE NOT NULL,
    `Fire` INT(11) NOT NULL,
    `Message` INT(11) NOT NULL,
    `DescriptionComplete` LONGTEXT NOT NULL,
    `admin_idadmin` INT(11) NOT NULL,
    PRIMARY KEY(`idnews`),
    INDEX `fk_news_admin1_idx`(`admin_idadmin` ASC),
    CONSTRAINT `fk_news_admin1` FOREIGN KEY(`admin_idadmin`) REFERENCES `shell`.`admin`(`idadmin`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 10 DEFAULT CHARACTER SET = utf8mb4; SET
    SQL_MODE = @OLD_SQL_MODE;
SET
    FOREIGN_KEY_CHECKS = @OLD_FOREIGN_KEY_CHECKS;
SET
    UNIQUE_CHECKS = @OLD_UNIQUE_CHECKS;