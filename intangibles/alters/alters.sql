CREATE TABLE `sennova_formulario`.`fechalimite` ( `id` INT NOT NULL AUTO_INCREMENT ,  `fechaLimite` DATE NOT NULL ,  `motivo` VARCHAR(255) NOT NULL ,  `usuario` VARCHAR(50) NOT NULL ,  `created_at` DATETIME NOT NULL ,    PRIMARY KEY  (`id`)) ENGINE = InnoDB;
INSERT INTO fechaLimite (fechaLimite,motivo,usuario,created_at) VALUES ('2020/12/17','Fecha de inicio',1193141687,NOW())
ALTER TABLE `x_intangibles_preguntas` ADD `finished` TINYINT(1) NOT NULL DEFAULT '0' AFTER `proyecto_consecutivo`;
DELETE FROM x_intangibles_preguntas WHERE estado=1 AND negativo=1 AND pregunta20 IS NULL
DELETE FROM x_intangibles_preguntas WHERE estado=0
UPDATE x_intangibles_preguntas SET finished=1

ALTER TABLE `usuarioslider` ADD `rol` TINYINT(1) NOT NULL AFTER `contrasena2`;
UPDATE usuarioslider SET rol = 2


/* Falta Asegurar las validaciones de entradas forzadas por medio de url a las listas de chequeo*/
/*Falta ajustar las funciones de fecha limite en las listas de chequeo*/