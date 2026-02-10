CREATE DATABASE IF NOT EXISTS cinema_booking;
USE cinema_booking;
-- 1. Création de la table Film
CREATE TABLE Film (
                      id_film INT PRIMARY KEY AUTO_INCREMENT,
                      name VARCHAR(255) NOT NULL,
                      description TEXT,
                      actors TEXT,
                      date DATE,
                      affiche VARCHAR(255)
);

-- 2. Création de la table Salle
CREATE TABLE Salle (
                       id_salle INT PRIMARY KEY AUTO_INCREMENT,
                       nbr_place INT NOT NULL
);

-- 3. Création de la table Seat (Siège)
CREATE TABLE Seat (
                      id_seat INT PRIMARY KEY AUTO_INCREMENT,
                      numero_seat VARCHAR(10) NOT NULL,
                      fk_salle INT NOT NULL,
                      CONSTRAINT fk_seat_salle FOREIGN KEY (fk_salle) REFERENCES Salle(id_salle) ON DELETE CASCADE,
                      CONSTRAINT unique_seat_salle UNIQUE (fk_salle, numero_seat)
);

-- 4. Création de la table Seance
CREATE TABLE Seance (
                        id_seance INT PRIMARY KEY AUTO_INCREMENT,
                        cinema VARCHAR(255),
                        horaires DATETIME NOT NULL,
                        fk_film INT NOT NULL,
                        fk_salle INT NOT NULL,
                        CONSTRAINT fk_seance_film FOREIGN KEY (fk_film) REFERENCES Film(id_film) ON DELETE CASCADE,
                        CONSTRAINT fk_seance_salle FOREIGN KEY (fk_salle) REFERENCES Salle(id_salle) ON DELETE CASCADE
);

-- 5. Création de la table User
CREATE TABLE User (
                      id_user INT PRIMARY KEY AUTO_INCREMENT,
                      role VARCHAR(50) DEFAULT 'client',
                      username VARCHAR(100) NOT NULL UNIQUE,
                      password VARCHAR(255) NOT NULL
);

-- 6. Création de la table Reservation
CREATE TABLE Reservation (
                             id_reservation INT PRIMARY KEY AUTO_INCREMENT,
                             price DECIMAL(10, 2) NOT NULL,
                             fk_user INT NOT NULL,
                             fk_seat INT NOT NULL,
                             fk_seance INT NOT NULL,
                             CONSTRAINT fk_res_user FOREIGN KEY (fk_user) REFERENCES User(id_user) ON DELETE CASCADE,
                             CONSTRAINT fk_res_seat FOREIGN KEY (fk_seat) REFERENCES Seat(id_seat) ON DELETE CASCADE,
                             CONSTRAINT fk_res_seance FOREIGN KEY (fk_seance) REFERENCES Seance(id_seance) ON DELETE CASCADE,
                             CONSTRAINT unique_reservation UNIQUE (fk_seance, fk_seat)

);