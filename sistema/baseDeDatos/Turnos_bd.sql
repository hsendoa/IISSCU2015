SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `turnos_odon` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `turnos_odon` ;

-- -----------------------------------------------------
-- Table `turnos_odon`.`turno_x_dia`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `turnos_odon`.`turno_x_dia` (
  `idturno` INT NOT NULL AUTO_INCREMENT ,
  `fecha` DATE NOT NULL ,
  `manana_tarde_noche` VARCHAR(45) NULL ,
  PRIMARY KEY (`idturno`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `turnos_odon`.`paciente`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `turnos_odon`.`paciente` (
  `id_paciente` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NULL ,
  `apellidos` VARCHAR(45) NULL ,
  `cedula_identidad` VARCHAR(45) NULL ,
  `estado` VARCHAR(45) NULL ,
  PRIMARY KEY (`id_paciente`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `turnos_odon`.`horario_x_turno`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `turnos_odon`.`horario_x_turno` (
  `idturno` INT NOT NULL ,
  `idhorario` INT NOT NULL ,
  `id_paciente` INT NULL ,
  `hora_desde` VARCHAR(15) NOT NULL ,
  `hora_hasta` VARCHAR(15) NOT NULL ,
  `estado` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`idturno`, `idhorario`) ,
  INDEX `fk_horario_turno_idx` (`idturno` ASC) ,
  INDEX `fk_horario_x_turno_paciente1_idx` (`id_paciente` ASC) ,
  CONSTRAINT `fk_horario_turno`
    FOREIGN KEY (`idturno` )
    REFERENCES `turnos_odon`.`turno_x_dia` (`idturno` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_horario_x_turno_paciente1`
    FOREIGN KEY (`id_paciente` )
    REFERENCES `turnos_odon`.`paciente` (`id_paciente` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `turnos_odon` ;

-- -----------------------------------------------------
-- Table `turnos_odon`.`rol`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `turnos_odon`.`rol` (
  `id_rol` INT NOT NULL AUTO_INCREMENT ,
  `descripcion` VARCHAR(45) NULL ,
  PRIMARY KEY (`id_rol`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `turnos_odon`.`usuario`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `turnos_odon`.`usuario` (
  `id_usuario` INT NOT NULL AUTO_INCREMENT ,
  `nick` VARCHAR(45) NULL ,
  `password` VARCHAR(45) NULL ,
  `id_rol` INT NOT NULL ,
  `paciente_id_paciente` INT NOT NULL ,
  PRIMARY KEY (`id_usuario`, `id_rol`, `paciente_id_paciente`) ,
  INDEX `fk_usuario_rol1_idx` (`id_rol` ASC) ,
  INDEX `fk_usuario_paciente1` (`paciente_id_paciente` ASC) ,
  CONSTRAINT `fk_usuario_rol1`
    FOREIGN KEY (`id_rol` )
    REFERENCES `turnos_odon`.`rol` (`id_rol` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_paciente1`
    FOREIGN KEY (`paciente_id_paciente` )
    REFERENCES `turnos_odon`.`paciente` (`id_paciente` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;






SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
