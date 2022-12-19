DROP TABLE IF EXISTS `T_Actor_Pelicula`;
DROP TABLE IF EXISTS `T_Peliculas`;
DROP TABLE IF EXISTS `T_Categorias`;
DROP TABLE IF EXISTS `T_Actores`;
DROP TABLE IF EXISTS `T_Directores`;


CREATE TABLE `T_Peliculas`(
	`ID` INTEGER NOT NULL,
    `titulo` VARCHAR(200) DEFAULT NULL,
    `año` INTEGER DEFAULT NULL,
    `duracion` INTEGER DEFAULT NULL,
    `sinopsis` VARCHAR(500) DEFAULT NULL,
    `imagen` VARCHAR(100) DEFAULT NULL,
    `votos` INTEGER DEFAULT '0',
    `id_categoria` INTEGER DEFAULT NULL,
    `id_director` INTEGER DEFAULT NULL,
    PRIMARY KEY (`ID`)
);

CREATE TABLE `T_Categorias`(
	`ID` INTEGER,
    `nombre` VARCHAR(200) DEFAULT NULL,
    PRIMARY KEY (`ID`)
);

CREATE TABLE `T_Actores`(
	`ID` INTEGER,
    `nombre_actor` VARCHAR(200) DEFAULT NULL,
    PRIMARY KEY (`ID`)
);

CREATE TABLE `T_Directores`(
	`ID` INTEGER,
    `nombre_director` VARCHAR(200) DEFAULT NULL,
    PRIMARY KEY (`ID`)
);

CREATE TABLE `T_Actor_Pelicula`(
	`ID_pelicula` INTEGER,
    `ID_actor` INTEGER,
    PRIMARY KEY (`ID_pelicula`, `ID_actor`)
);

ALTER TABLE T_Peliculas ADD FOREIGN KEY (id_categoria) REFERENCES T_Categorias (ID);

ALTER TABLE T_Peliculas ADD FOREIGN KEY (id_director) REFERENCES T_Directores (ID);

ALTER TABLE T_Actor_Pelicula ADD FOREIGN KEY (ID_pelicula) REFERENCES T_Peliculas (ID);

ALTER TABLE T_Actor_Pelicula ADD FOREIGN KEY (ID_actor) REFERENCES T_Actores (ID);

INSERT INTO T_Directores VALUES (1, 'Ridley Scott'),
(2, 'Stanley Kubrick'), (3, 'William Friedkin'), (4, 'Steven Spielberg'), (5, 'Robert Zemeckis'), (6, 'Alfred Hitchcock'), (7, 'James Cameron'), (8, 'Christopher Nolan'), (9, 'Francis Ford Coppola');

INSERT INTO T_Actores VALUES (1, 'Sam Neill'), (2, 'Laura Dern'), (3, 'Michael J. Fox'), (4, 'Lea Thompson'), (5, 'Arnold Schwarzenegger'), (6, 'Linda Hamilton'), (7, 'Leonardo DiCaprio'), (8, 'Elliot Page'), (9, 'Anne Hathaway'), (10, 'Matthew McConaughey'), (11, 'Sigourney Weaver'), (12, 'Veronica Cartwright'), (13, 'Jack Nicholson'), (14, 'Shelley Duvall'), (15, 'Max von Sydow'), (16, 'Linda Blair'), (17, 'John Gavin'), (18, 'Janet Leigh,'), (19, 'Gary Oldman'), (20, 'Winona Ryder');

INSERT INTO T_Categorias VALUES (1, 'Terror'),(2, 'Ciencia-Ficción');

INSERT INTO T_Peliculas VALUES 
(1, 'Alien, el octavo pasajero', 2015, 116, 'La nave comercial Nostromo y su tripulación, siete hombres y mujeres, se disponen a volver a la Tierra transportando un cargamento de mineral importante. Pero cuando se detienen forzosamente en un planeta desierto, el oficial Kane es repentinamente atacado por una forma de vida desconocida, un arácnido que se adhiere a su cara', 'terror1.jpg', 0, 1, 1),

(2, 'El resplandor', 1980, 143, 'Un día, Jack acepta un puesto como vigilante en un aislado hotel. El trabajo consiste en pasar todo el invierno allí con su familia, cuidando del recinto. La familia se muda allí, pero lo que no sospechan es que sus vidas van a cambiar en cuanto crucen la puerta del hotel.', 'terror2.jpg', 0, 1, 2),

(3, 'El Exorcista', 1975, 121, 'En Iraq, el Padre Merrin queda profundamente turbado por el descubrimiento de una figurilla del demonio Pazuzu y las macabras visiones que ésta provoca. Mientras tanto, en Washington, en la casa de la actriz Chris MacNeil se están produciendo extraños fenómenos: la despiertan extraños sonidos que vienen del granero y su hija Regan se queja de que su cama se mueve.', 'terror3.jpg', 1, 1, 3),

(4, 'Jurassic Park', 1980, 121, 'John Hammond, magnate propietario de la empresa multinacional en bioingeniería InGen, ha soñado toda su vida con construir el mayor parque de atracciones del mundo. Una isla en Costa Rica donde habiten las criaturas más espectaculares que han pisado la Tierra: los dinosaurios.', 'ciencia-ficcion1.jpg', 0, 2, 4),

(5, 'Regreso al futuro', 1985, 116, 'El joven Marty McFly lleva una existencia anónima con su novia Jennifer. Los únicos problemas son su familia en crisis y un director al que le encantaría expulsarle del instituto, por lo que deberá hacer todo lo que esté en su mano para revertir esa situación y aparentar total normalidad. Amigo del excéntrico profesor Emmett Brown, una noche le acompaña a probar su nuevo experimento: viajar en el tiempo usando un DeLorean modificado.', 'ciencia-ficcion2.jpg', 0, 2, 5),

(6, 'Psicosis', 1961, 109, 'Inspirada en la novela homónima de Robert Bloch, la historia está ambientada en un tétrico motel de carretera llamado cuyo dueño es Norman Bates. Junto al motel hay una casa, tan poco acogedora como el edificio, en la que reside el señor Bates con su madre.', 'terror4.jpg', 2, 1, 6),

(7, 'Terminator 2: El juicio final', 1991, 128, 'Tras fracasar en el intento de eliminar a Sarah Connor, un nuevo androide mejorado, un T-1000, llega del futuro para eliminar a su hijo, John Connor. Será entonces cuando el robot T-800 sea enviado para protegerle.', 'ciencia-ficcion3.jpg', 0, 2, 7),

(8, 'Origen', 2010, 148, 'Dom Cobb es el mejor extractor. Su oficio consiste en introducirse en los sueños de sus víctimas y extraerle secretos del mundo de los negocios para luego venderlos con grandes dividendos. Debido a sus arriesgados métodos, grandes consorcios lo tienen en la mirilla, y ningún escondite le ofrece seguridad.', 'ciencia-ficcion4.jpg', 0, 2, 8),

(9, 'Interstellar', 2014, 169, 'Inspirada en la teoría del experto en relatividad Kip Stepehen Thorne sobre la existencia de los agujeros de gusano, y su función como canal para llevar a cabo los viajes en el tiempo. La historia gira en torno a un grupo de intrépidos exploradores que se adentran por uno de esos agujeros y viajan a través del mismo, encontrándose en otra dimensión. ', 'ciencia-ficcion5.jpg', 0, 2, 8),

(10, 'Drácula de Bram Stoker', 1993, 128, 'En 1890, el abogado Jonathan Harker tiene que viajar a Transilvania, al este de Europa, para solucionar con un tal conde Drácula unos aspectos del contrato de la casa que acababa de adquirir en Londres.El Conde no es el tipo de hombre que el joven Harker esperaba conocer. ', 'terror5.jpg', 0, 1, 9);

INSERT INTO T_Actor_Pelicula VALUES (4, 1), (4, 2), (5, 3), (5, 4), (7, 5), (7, 6), (8,7), (8, 8), (9, 9), (9, 10), (1, 11), (1, 12), (2, 13), (2, 14), (3, 15), (3, 16), (6, 17), (6, 18), (10, 19), (10, 20);

