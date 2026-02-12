
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

INSERT INTO `film` (`id_film`, `name`, `description`, `actors`, `date`, `affiche`) VALUES
                                                                                       (1, 'Inception', 'Un voleur s\'empare de secrets des rêves.', 'Leonardo DiCaprio, Cillian Murphy', '2010-07-21', 'inception.jpg'),
(2, 'Interstellar', 'Une équipe d\'explorateurs voyage à travers un trou de ver.', 'Matthew McConaughey, Anne Hathaway', '2014-11-05', 'interstellar.jpg'),
                                                                                       (3, 'Le Roi Lion', 'Le lionceau Simba est exilé.', 'Donald Glover, Beyoncé', '2019-07-17', 'lion_king.jpg'),
                                                                                       (4, 'Joker', 'À Gotham City, un comédien raté bascule dans la folie et devient le criminel grimaçant.', 'Joaquin Phoenix, Robert De Niro', '2019-10-09', 'joker.jpg'),
                                                                                       (5, 'Dune', 'Paul Atreides, un jeune homme brillant, doit se rendre sur la planète la plus dangereuse de l\'univers.', 'Timothée Chalamet, Zendaya', '2021-09-15', 'dune.jpg'),
(6, 'Avengers: Endgame', 'Les Avengers restants doivent trouver un moyen de ramener leurs alliés vaincus pour une confrontation épique.', 'Robert Downey Jr., Chris Evans', '2019-04-24', 'avengers.jpg'),
(7, 'Parasite', 'Toute la famille de Ki-taek est au chômage. Elle s’intéresse particulièrement au train de vie de la richissime famille Park.', 'Song Kang-ho, Lee Sun-kyun', '2019-06-05', 'parasite.jpg'),
(8, 'Top Gun: Maverick', 'Après plus de 30 ans de service, Pete Mitchell, dit Maverick, repousse encore les limites en tant que pilote d\'essai.', 'Tom Cruise, Jennifer Connelly', '2022-05-25', 'topgun.jpg');



INSERT INTO `reservation` (`id_reservation`, `price`, `fk_user`, `fk_seat`, `fk_seance`) VALUES
    (1, 12.50, 2, 1, 1);


INSERT INTO `salle` (`id_salle`, `nbr_place`) VALUES
                                                  (1, 50),
                                                  (2, 120);


INSERT INTO `seance` (`id_seance`, `cinema`, `horaires`, `fk_film`, `fk_salle`) VALUES
                                                                                    (1, 'Pathé Plan de Campagne', '2024-06-15 14:00:00', 1, 1),
                                                                                    (2, 'Pathé Plan de Campagne', '2024-06-15 18:00:00', 1, 1),
                                                                                    (3, 'Pathé Plan de Campagne', '2024-06-15 20:30:00', 2, 2);


INSERT INTO `seat` (`id_seat`, `numero_seat`, `fk_salle`) VALUES
                                                              (1, 'A1', 1),
                                                              (2, 'A2', 1),
                                                              (3, 'A3', 1),
                                                              (4, 'B1', 1),
                                                              (5, 'B2', 1),
                                                              (6, 'F10', 2),
                                                              (7, 'F11', 2);



INSERT INTO `user` (`id_user`, `role`, `username`, `password`) VALUES
                                                                   (1, 'admin', 'admin', 'admin123'),
                                                                   (2, 'client', 'thomas_anderson', 'matrix123'),
                                                                   (3, 'client', 'john_wick', 'dog123');
COMMIT;
