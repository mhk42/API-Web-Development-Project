CREATE TABLE Dogs (
    `id`          INT AUTO_INCREMENT NOT NULL,
    `user_id`     INT,
    `name`        VARCHAR(20),
    `breed_name`  VARCHAR(50),
    `hp`          INT,
    `attack`      INT,
    `defense`     INT,
    `image_url`   VARCHAR(255),
    `is_favorite` BOOLEAN DEFAULT false,
    `created`     TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `modified`    TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
);