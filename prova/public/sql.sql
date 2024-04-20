CREATE TABLE `projeto`.`bebe` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  `peso` DECIMAL(10,2) NOT NULL,
  `sexo` INT NOT NULL,
  PRIMARY KEY (`id`));

CREATE TABLE `projeto`.`mae` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  `idade` INT NOT NULL,
  `numero` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`));

CREATE TABLE `projeto`.`medico` (
`id` INT NOT NULL AUTO_INCREMENT,
`nome` VARCHAR(255) NOT NULL,
`crm` INT NOT NULL,
`numero` VARCHAR(45) NOT NULL,
PRIMARY KEY (`id`));

CREATE TABLE `projeto`.`vinculacao` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `medico_id` INT NOT NULL,
  `mae_id` INT NOT NULL,
  `bebe_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_vinculacao_medico_idx` (`medico_id` ASC),
  INDEX `fk_vinculacao_bebe_idx` (`bebe_id` ASC),
  INDEX `fk_vinculacao_mae_idx` (`mae_id` ASC),
  CONSTRAINT `fk_vinculacao_medico`
    FOREIGN KEY (`medico_id`)
    REFERENCES `projeto`.`medico` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_vinculacao_bebe`
    FOREIGN KEY (`bebe_id`)
    REFERENCES `projeto`.`bebe` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_vinculacao_mae`
    FOREIGN KEY (`mae_id`)
    REFERENCES `projeto`.`mae` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

