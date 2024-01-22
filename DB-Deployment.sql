--
-- Database : `db_IOmart`
--
CREATE DATABASE IF NOT EXISTS `db_IOmart`;
USE `db_IOmart`;

-- ------------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS `credentials`
(
    `id_credentials` INT PRIMARY KEY AUTO_INCREMENT,
    `username`       VARCHAR(255),
    `password_hash`  VARCHAR(255)
) ENGINE = InnoDB;

-- ------------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS `person`
(
    `id_user`            INT PRIMARY KEY AUTO_INCREMENT,
    `employee_number`    INT,
    `first_name`         VARCHAR(255),
    `last_name`          VARCHAR(255),
    `email`              VARCHAR(255),
    `telephone`          INT,
    `address`            VARCHAR(255),
    `date_of_birth`      DATE,
    `date_of_employment` DATE,
    `credentials_id`     INT,
    CONSTRAINT `fk_credentials_id` FOREIGN KEY (`credentials_id`) REFERENCES `credentials` (`id_credentials`)
) ENGINE = InnoDB;

-- ------------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS `position_type`
(
    `id_position` INT PRIMARY KEY AUTO_INCREMENT,
    `name`        VARCHAR(255)
) ENGINE = InnoDB;


-- ------------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS `store`
(
    `id_store` INT PRIMARY KEY AUTO_INCREMENT,
    `name`     VARCHAR(255),
    `address`  VARCHAR(255)
) ENGINE = InnoDB;


-- ------------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS `position`
(
    `id_position`   INT PRIMARY KEY AUTO_INCREMENT,
    `user_id`       INT,
    `store_id`      INT,
    `position_type` INT,
    CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `person` (`ID_user`),
    CONSTRAINT `fk_store_id` FOREIGN KEY (`store_id`) REFERENCES `store` (`ID_store`) ON DELETE CASCADE,
    CONSTRAINT `fk_position_type` FOREIGN KEY (`position_type`) REFERENCES `position_type` (`ID_position`)
) ENGINE = InnoDB;

-- ------------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS `section`
(
    `id_section` INT PRIMARY KEY AUTO_INCREMENT,
    `store_id`   INT,
    `name`       VARCHAR(255),
    CONSTRAINT `fk_store_section_id` FOREIGN KEY (`store_id`) REFERENCES `store` (`id_store`) ON DELETE CASCADE
) ENGINE = InnoDB;


-- ------------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS `device_type`
(
    `id_type`   INT PRIMARY KEY AUTO_INCREMENT,
    `name`      VARCHAR(255),
    `value`     INT,
    `min_value` INT,
    `max_value` INT
) ENGINE = InnoDB;


-- ------------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS `device`
(
    `id_device`         INT PRIMARY KEY AUTO_INCREMENT,
    `device_section_id` INT,
    `name`              VARCHAR(255),
    `device_type_id`    INT,
    `state`             BOOLEAN,
    `maintenance`       DATE,
    CONSTRAINT `fk_device_type_id` FOREIGN KEY (`device_type_id`) REFERENCES `device_type` (`id_type`),
    CONSTRAINT `fk_device_section_id` FOREIGN KEY (`device_section_id`) REFERENCES `section` (`id_section`) ON DELETE CASCADE
) ENGINE = InnoDB;


-- ------------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS `sensor_type`
(
    `id_type` INT PRIMARY KEY AUTO_INCREMENT,
    `type`    VARCHAR(255),
    `unit`    VARCHAR(255)
) ENGINE = InnoDB;


-- ------------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS `sensor`
(
    `id_sensor`         INT PRIMARY KEY AUTO_INCREMENT,
    `sensor_type_id`    INT,
    `sensor_section_id` INT,
    `name`              VARCHAR(255),
    CONSTRAINT `fk_sensor_type_id` FOREIGN KEY (`sensor_type_id`) REFERENCES `sensor_type` (`id_type`),
    CONSTRAINT `fk_sensor_section_id` FOREIGN KEY (`sensor_section_id`) REFERENCES `section` (`id_section`) ON DELETE CASCADE
) ENGINE = InnoDB;

-- ------------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS `sensor_data`
(
    `id_data`   INT PRIMARY KEY AUTO_INCREMENT,
    `sensor_id` INT,
    `value`     FLOAT,
    `time`      TIMESTAMP,
    CONSTRAINT `fk_sensor_id` FOREIGN KEY (`sensor_id`) REFERENCES `sensor` (`id_sensor`) ON DELETE CASCADE
) ENGINE = InnoDB;


-- ------------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS `control_type`
(
    `id_control` INT PRIMARY KEY AUTO_INCREMENT,
    `sensor_id`  INT,
    `device_id`  INT,
    `set_value`  INT,
    CONSTRAINT `fk_control_sensor_id` FOREIGN KEY (`sensor_id`) REFERENCES `sensor` (`id_sensor`) ON DELETE CASCADE,
    CONSTRAINT `fk_device_id` FOREIGN KEY (`device_id`) REFERENCES `device` (`id_device`) ON DELETE CASCADE
) ENGINE = InnoDB;

-- ------------------------------------------------------------------------------
