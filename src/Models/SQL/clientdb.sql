CREATE TABLE client_db
(
  id        INT AUTO_INCREMENT
    PRIMARY KEY,
  firstname VARCHAR(50)                   NOT NULL,
  lastname  VARCHAR(50)                   NOT NULL,
  email     VARCHAR(150)                  NOT NULL,
  password  VARCHAR(200)                  NOT NULL,
  status    VARCHAR(50) DEFAULT 'pending' NULL,
  CONSTRAINT client_db_id_uindex
  UNIQUE (id),
  CONSTRAINT client_db_email_uindex
  UNIQUE (email)
)
  COMMENT 'Database for storing client login info';