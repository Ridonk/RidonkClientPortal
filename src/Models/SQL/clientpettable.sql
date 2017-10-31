CREATE TABLE client_pet_table
(
  id              INT PRIMARY KEY AUTO_INCREMENT,
  email           VARCHAR(50),
  pet_description TEXT,
  pet_food        TEXT,
  pet_medical     TEXT,
  pet_vet_name    VARCHAR(50),
  pet_vet_phone   INT,
  pet_vet_address VARCHAR(100),
  pet_vet_zip     INT
);
CREATE UNIQUE INDEX client_pet_table_id_uindex
  ON client_pet_table (id);
CREATE UNIQUE INDEX client_pet_table_email_uindex
  ON client_pet_table (email);