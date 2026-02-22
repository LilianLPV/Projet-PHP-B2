SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- Insertion des films (Correction des erreurs précédentes incluse)
INSERT INTO `Film` (`id_film`, `name`, `description`, `actors`, `date`, `affiche`, `realisateur`) VALUES
                                                                                                      (1, 'Inception', 'Un voleur s''empare de secrets des rêves.', 'Leonardo DiCaprio, Cillian Murphy', '2010-07-21', 'inception.jpg', 'Christopher Nolan'),
                                                                                                      (2, 'Interstellar', 'Une équipe d''explorateurs voyage à travers un trou de ver.', 'Matthew McConaughey, Anne Hathaway', '2014-11-05', 'interstellar.jpg', 'Christopher Nolan'),
                                                                                                      (3, 'Le Roi Lion', 'Le lionceau Simba est exilé.', 'Donald Glover, Beyoncé', '2019-07-17', 'lion_king.jpg', 'Jon Favreau'),
                                                                                                      (4, 'Joker', 'À Gotham City, un comédien raté bascule dans la folie.', 'Joaquin Phoenix, Robert De Niro', '2019-10-09', 'joker.jpg', 'Todd Phillips'),
                                                                                                      (5, 'Dune', 'Paul Atreides doit se rendre sur la planète la plus dangereuse.', 'Timothée Chalamet, Zendaya', '2021-09-15', 'dune.jpg', 'Denis Villeneuve'),
                                                                                                      (6, 'Avengers: Endgame', 'Les Avengers doivent ramener leurs alliés vaincus.', 'Robert Downey Jr., Chris Evans', '2019-04-24', 'avengers.jpg', 'Russo Brothers'),
                                                                                                      (7, 'Parasite', 'Toute la famille de Ki-taek est au chômage.', 'Song Kang-ho, Lee Sun-kyun', '2019-06-05', 'parasite.jpg', 'Bong Joon-ho'),
                                                                                                      (8, 'Top Gun: Maverick', 'Pete Mitchell repousse encore les limites.', 'Tom Cruise, Jennifer Connelly', '2022-05-25', 'topgun.jpg', 'Joseph Kosinski'),
                                                                                                      (9, 'Marty Supreme', 'Un athlète de tennis de table aspire à la gloire.', 'Timothée Chalamet, Gwyneth Paltrow', '2025-02-13', 'marty_supreme.jpg', 'Josh Safdie'),
-- Tes nouveaux films demandés :
                                                                                                      (10, 'Sharknado', 'Une tornade géante soulève des requins de l''océan et les lâche sur Los Angeles.', 'Ian Ziering, Tara Reid', '2013-07-11', 'sharknado.jpg', 'Anthony C. Ferrante'),
                                                                                                      (11, 'Jeruzalem', 'Deux étudiantes américaines en vacances à Jérusalem sont piégées lors d''une apocalypse biblique.', 'Yael Grobglas, Yon Tumarkin', '2015-07-10', 'jeruzalem.jpg', 'Doron Paz, Yoav Paz');

-- Tables de structure
INSERT INTO `Salle` (`id_salle`, `nbr_place`) VALUES
                                                  (1, 50),
                                                  (2, 120);

INSERT INTO `Seat` (`id_seat`, `numero_seat`, `fk_salle`) VALUES
                                                              (1, 'A1', 1), (2, 'A2', 1), (3, 'A3', 1), (4, 'B1', 1), (5, 'B2', 1),
                                                              (6, 'F10', 2), (7, 'F11', 2);

-- Ajout de séances pour tes nouveaux films
INSERT INTO `Seance` (`id_seance`, `cinema`, `horaires`, `fk_film`, `fk_salle`) VALUES
                                                                                    (1, 'Pathé Plan de Campagne', '2024-06-15 14:00:00', 1, 1),
                                                                                    (2, 'Pathé Plan de Campagne', '2024-06-15 18:00:00', 10, 1), -- Sharknado à 18h
                                                                                    (3, 'Pathé Plan de Campagne', '2024-06-15 22:30:00', 11, 2); -- Jeruzalem en séance de nuit

-- Utilisateurs et une réservation de test
INSERT INTO `User` (`id_user`, `role`, `username`, `password`) VALUES
                                                                   (1, 'admin', 'admin', 'admin123'),
                                                                   (2, 'client', 'thomas_anderson', 'matrix123'),
                                                                   (3, 'client', 'john_wick', 'dog123');

INSERT INTO `Reservation` (`id_reservation`, `price`, `fk_user`, `fk_seat`, `fk_seance`) VALUES
    (1, 12.50, 2, 1, 1);

COMMIT;