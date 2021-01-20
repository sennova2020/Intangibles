CREATE TABLE `sennova_formulario`.`fechalimite` ( `id` INT NOT NULL AUTO_INCREMENT ,  `fechaLimite` DATE NOT NULL ,  `motivo` VARCHAR(255) NOT NULL ,  `usuario` VARCHAR(50) NOT NULL ,  `created_at` DATETIME NOT NULL ,    PRIMARY KEY  (`id`)) ENGINE = InnoDB;
ALTER TABLE `x_intangibles_preguntas` ADD `finished` TINYINT(1) NOT NULL DEFAULT '0' AFTER `proyecto_consecutivo`;
DELETE FROM x_intangibles_preguntas WHERE estado=1 AND negativo=1 AND pregunta20 IS NULL
DELETE FROM x_intangibles_preguntas WHERE estado=0
UPDATE x_intangibles_preguntas SET finished=1