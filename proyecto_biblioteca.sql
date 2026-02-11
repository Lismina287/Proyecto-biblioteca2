-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Servidor: bbdd
-- Tiempo de generación: 05-02-2026 a las 18:37:33
-- Versión del servidor: 5.7.44
-- Versión de PHP: 8.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto_biblioteca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autores`
--

CREATE TABLE `autores` (
  `ID` int(11) NOT NULL,
  `NOMBRE` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `FECHA_NACIMIENTO` date NOT NULL,
  `LUGAR` varchar(30) COLLATE utf8mb4_bin NOT NULL,
  `FECHA_DEFUNCION` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Volcado de datos para la tabla `autores`
--

INSERT INTO `autores` (`ID`, `NOMBRE`, `FECHA_NACIMIENTO`, `LUGAR`, `FECHA_DEFUNCION`) VALUES
(1, 'J. R. R. Tolkien', '1892-01-03', 'Bloemfontein', '1973-09-02'),
(2, 'Ernest Hemingway', '1899-07-21', 'Oak Park', '1961-07-02'),
(3, 'C. S. Lewis', '1898-11-29', 'Belfast', '1963-11-22'),
(4, 'Susan E. Hinton', '1948-07-22', 'Tulsa', NULL),
(5, 'J. K. Rowling', '1965-07-31', 'Yate', NULL),
(6, 'George R. R. Martin', '1948-09-20', 'Bayonne', NULL),
(7, 'Fred Uhlman', '1901-01-19', 'Stuttgart', '1985-04-11'),
(8, 'Joël Dicker', '1985-06-16', 'Ginebra', NULL),
(9, 'Mary Ann Shaffer', '1934-12-13', 'Martinsburg', '2008-02-16'),
(10, 'Patricia García-Rojo', '1984-09-24', 'Jaén', NULL),
(11, 'Mark Haddon', '1962-10-28', 'Northampton', NULL),
(12, 'Berlie Doherty', '1943-11-06', 'Knotty Ash', NULL),
(13, 'Jane Austen', '1775-12-16', 'Steventon', '1817-07-18'),
(14, 'Mitch Albom', '1958-05-23', 'Passaic', NULL),
(15, 'David Lozano', '1974-10-30', 'Zaragoza', NULL),
(16, 'María Menéndez-Ponte', '1962-01-01', 'Coruña', NULL),
(17, 'Gabriel García Márquez', '1927-03-06', 'Aracataca', '2014-04-17'),
(18, 'Patrick Rothfuss', '1973-06-06', 'Madison', NULL),
(19, 'Michael Ende', '1929-11-12', 'Garmisch-Partenkirchen', '1995-08-28'),
(20, 'Brandon Sanderson', '1975-12-19', 'Lincoln', NULL),
(21, 'Philip K. Dick', '1928-12-16', 'Illinois', '1982-03-02'),
(22, 'Carlos Ruiz Zafón', '1964-09-25', 'Barcelona', '2020-06-19'),
(23, 'Laura Gallego', '1977-10-11', 'Cuart de Poblet', NULL),
(24, 'R. L. Stevenson', '1850-11-13', 'Edimburgo', '1894-12-03'),
(25, 'Roald Dahl', '1916-09-13', 'Llandaff', '1990-11-23'),
(26, 'Scott Fitzgerald', '1986-09-26', 'Minnesota', '1940-12-21'),
(27, 'Ray Bradbury ', '1920-08-22', 'Illinois', '2012-06-05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `ID` int(11) NOT NULL,
  `NOMBRE` varchar(30) COLLATE utf8mb4_bin NOT NULL,
  `APELLIDOS` varchar(30) COLLATE utf8mb4_bin NOT NULL,
  `FECHA_NACIMIENTO` date NOT NULL,
  `LOCALIDAD` varchar(30) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`ID`, `NOMBRE`, `APELLIDOS`, `FECHA_NACIMIENTO`, `LOCALIDAD`) VALUES
(1, 'Pedro', 'Díaz', '1990-01-01', 'Gijón'),
(2, 'Guillermo', 'Rosas', '1985-03-01', 'Gijón'),
(3, 'Martina', 'Martínez', '1984-07-25', 'Avilés'),
(4, 'Francisco', 'Villalba', '1996-03-02', 'Oviedo'),
(5, 'Lorena', 'López', '1997-04-15', 'Langreo'),
(6, 'Fernanda', 'Fernández', '1992-02-15', 'Mieres'),
(7, 'Roberto', 'Ibáñez', '1990-08-31', 'Grado'),
(8, 'Alejandra', 'Álvarez', '2006-06-06', 'Oviedo'),
(9, 'Marcos', 'Llorente', '2001-01-02', 'Grado'),
(10, 'Jorge', 'Molina', '1900-01-05', 'Gijón'),
(11, 'Luis', 'Hernández', '1985-05-05', 'Gijón'),
(12, 'Fernando', 'Torres', '2003-02-23', 'Avilés'),
(13, 'Santiago', 'Arias', '1986-06-16', 'Oviedo'),
(14, 'Rodrigo', 'Moreno', '1990-02-14', 'Oviedo'),
(15, 'Manuel', 'García', '1980-03-30', 'Oviedo'),
(16, 'Ángela', 'Sánchez', '1973-09-11', 'Mieres'),
(17, 'Lucía', 'López', '1985-12-25', 'Grado'),
(18, 'Míriam', 'Fernández', '1986-12-31', 'Avilés'),
(19, 'Daniel', 'Menéndez', '1980-08-08', 'Avilés'),
(20, 'Juan', 'Guzmán', '1990-04-23', 'Grado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `ID` int(11) NOT NULL,
  `TITULO` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `AUTOR_ID` int(11) NOT NULL,
  `GÉNERO` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `EDITORIAL` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `PÁGINAS` int(11) NOT NULL,
  `AÑO` date NOT NULL,
  `PRECIO` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`ID`, `TITULO`, `AUTOR_ID`, `GÉNERO`, `EDITORIAL`, `PÁGINAS`, `AÑO`, `PRECIO`) VALUES
(1, 'El Señor de los anillos: La comunidad del anillo', 1, 'Fantástico', 'Minotauro', 488, '1954-01-01', 18.00),
(2, 'El viejo y el mar', 2, 'Novela', 'Debolsillo', 208, '1952-01-01', 10.95),
(3, 'Las Crónicas de Narnia: El león, la bruja y el armario', 3, 'Fantástico', 'Destino', 240, '1950-01-01', 15.00),
(4, 'Rebeldes', 4, 'Drama', 'Alfaguara', 224, '1967-01-01', 12.00),
(5, 'Harry Potter y la prisionero de Azkaban', 5, 'Fantástico', 'Salamandra', 264, '1999-01-01', 18.00),
(6, 'Canción de hielo y fuego: Juego de Tronos', 6, 'Fantástico', 'Planeta', 800, '1996-01-01', 20.00),
(7, 'Reencuentro', 7, 'Drama', 'Tusquets', 128, '1971-01-01', 10.00),
(8, 'La verdad sobre el caso Harry Quebert', 8, 'Policíaco', 'Alfaguara', 672, '2012-01-01', 12.95),
(9, 'La sociedad literaria y el pastel de piel de patata de Guernsey', 9, 'Novela epistolar', 'Salamandra', 274, '2007-01-01', 10.00),
(10, 'El mar', 10, 'Fantástico', 'SM', 260, '2015-01-01', 12.95),
(11, 'El curioso incidente del perro a medianoche', 11, 'Novela', 'Salamandra', 270, '2003-01-01', 10.00),
(12, 'La hija del mar', 12, 'Fantástico', 'SM', 112, '1996-01-01', 10.00),
(13, 'Orgullo y prejuicio', 13, 'Novela', 'Penguin', 448, '1813-01-01', 12.00),
(14, 'Martes con mi viejo profesor', 14, 'Novela biográfica', 'Maeva', 143, '1997-01-01', 13.00),
(15, 'Desconocidos', 15, 'Policíaco', 'Edebé', 221, '2018-01-01', 12.00),
(16, 'Nunca seré tu héroe', 16, 'Novela', 'SM', 192, '1998-01-01', 10.95),
(17, 'Crónica de una muerte anunciada', 17, 'Policíaco', 'Debolsillo', 156, '1981-01-01', 9.95),
(18, 'El nombre del viento', 18, 'Fantástico', 'Debolsillo', 880, '2007-01-01', 22.00),
(19, 'La historia interminable', 19, 'Fantástico', 'Alfaguara', 496, '1979-01-01', 15.00),
(20, 'La ley de la calle', 4, 'Drama', 'Alfaguara', 112, '1975-01-01', 10.00),
(21, 'Nacidos de la bruma: El imperio final', 20, 'Fantástico', 'Nova', 841, '2006-01-01', 20.00),
(22, '¿Sueñan los androides con ovejas eléctricas?', 21, 'Ciencia ficción', 'Minotauro', 272, '1968-01-01', 10.00),
(23, 'El príncipe de la niebla', 22, 'Fantástico', 'Edebé', 240, '1993-01-01', 14.00),
(24, 'La leyenda del rey errante', 23, 'Fantástico', 'SM', 560, '2004-01-01', 21.00),
(25, 'La isla del tesoro', 24, 'Aventuras', 'Edelvives', 288, '1883-01-01', 24.90),
(26, 'Matilda', 25, 'Infantil', 'Loqueleo', 288, '1988-01-01', 10.00),
(27, 'El gran Gatsby', 26, 'Drama', 'Austral', 224, '1925-01-01', 11.50),
(28, 'Fahrenheit 451', 27, 'Ciencia ficción', 'Debolsillo', 192, '1953-01-01', 12.50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE `peliculas` (
  `ID` int(11) NOT NULL,
  `TITULO` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `AÑO_ESTRENO` date NOT NULL,
  `DIRECTOR` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `ACTORES` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `GENERO` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `TIPO_ADAPTACION` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `ADAPTACION_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Volcado de datos para la tabla `peliculas`
-- 

INSERT INTO `peliculas` (`ID`, `TITULO`, `AÑO_ESTRENO`, `DIRECTOR`, `ACTORES`, `GENERO`, `TIPO_ADAPTACION`, `ADAPTACION_ID`) VALUES
(1, 'El editor de libros', '2016-01-01', 'Michael Grandage', 'Colin Firth, Jude Law, Nicole Kidman', 'Biografía', 'Película', NULL),
(2, 'La historia interminable', '1984-01-01', 'Wolfgang Petersen', 'Barret Oliver, Noah Hathaway, Moses Gunn', 'Fantasía', 'Película', 19),
(3, 'La ladrona de libros', '2013-01-01', 'Brian Percival', 'Sophie Nélisse, Geoffrey Rush, Emily Watson, Nico Liersch', 'Drama', 'Película', NULL),
(4, 'La bruja novata', '1971-01-01', 'Robert Stevenson', 'Angela Lansbury, David Tomlinson, Roddy McDowall', 'Fantasía', 'Película', NULL),
(5, 'Harry Potter y el prisionero de Azkaban', '2004-01-01', 'Alfonso Cuarón', 'Daniel Radcliffe, Rupert Grint, Emma Watson', 'Fantasía', 'Película', 5),
(6, 'El señor de los anillos: La comunidad del anillo', '2001-01-01', 'Peter Jackson', 'Elijah Wood, Ian McKellen, Viggo Mortensen', 'Fantasía', 'Película', 1),
(7, 'Charlie y la fábrica de chocolate', '2005-01-01', 'Tim Burton', 'Johnny Depp, Freddie Highmore, David Kelly, Deep Roy', 'Fantasía', 'Película', NULL),
(8, 'Las Crónicas de Narnia: El león, la bruja y el armario', '2005-01-01', 'Andrew Adamson', 'Georgie Henley, William Moseley, Skandar Keynes, Anna Popplewell, Tilda Swinton', 'Fantasía', 'Película', NULL),
(9, 'Rebeldes', '1983-01-01', 'Francis Ford Coppola', 'C. Thomas Howell, Matt Dillon, Ralph Macchio, Diane Lane, Rob Lowe, Patrick Swayze, Emilio Estévez, Tom Cruise', 'Drama', 'Película', 4),
(10, 'Juego de Tronos: Temporada 1', '2011-01-01', 'David Benioff, D.B. Weiss', 'Emilia Clarke, Kit Harington, Lena Headey, Peter Dinklage, Maisie Williams, Nikolaj Coster-Waldau, Sophie Turner', 'Fantasía', 'Serie', 6),
(11, 'La verdad sobre el caso Harry Quebert', '2018-01-01', 'Jean-Jacques Annaud', 'Patrick Dempsey, Ben Schnetzer, Kristine Froseth, Damon Wayans Jr.', 'Policíaco', 'Serie', 8),
(12, 'La sociedad literaria y el pastel de piel de patata de Guernsey', '2018-01-01', 'Mike Newell', 'Lily James, Michiel Huisman, Glen Powell, Jessica Brown Findlay, Matthew Goode', 'Drama', 'Película', 9),
(13, 'Orgullo y prejuicio', '2005-01-01', 'Joe Wright', 'Keira Knightley, Matthew Macfadyen, Brenda Blethyn, Donald Sutherland', 'Romance', 'Película', 13),
(14, 'Orgullo y prejuicio', '1995-01-01', 'Simon Langton', 'Colin Firth, Jennifer Ehle, David Bamber, Crispin Bonham-carter, Anna Chancellor', 'Romance', 'Serie', 13),
(15, 'Crónica de una muerte anunciada', '1987-01-01', 'Francesco Rosi', 'Anthony Delon, Rupert Everett, Lucía Bosé, Ornella Muti, Gian Maria Volonté', 'Drama', 'Película', NULL),
(16, 'La ley de la calle', '1983-01-01', 'Francis Ford Coppola', 'Matt Dillon, Mickey Rourke, Diane Lane, Dennis Hopper, Nicolas Cage', 'Drama', 'Película', 20),
(17, 'Blade Runner', '1982-01-01', 'Ridley Scott', 'Harrison Ford, Rutger Hauer, Sean Young, Daryl Hannah, Edward James Olmos', 'Ciencia ficción', 'Película', 22),
(18, 'La isla del tesoro', '1934-01-01', 'Victor Fleming', 'Jackie Cooper, Wallace Beery, Lewis Stone, Lionel Barrymore, Otto Kruger', 'Aventuras', 'Película', 25),
(19, 'La isla del tesoro', '1950-01-01', 'Byron Haskin', 'Bobby Driscoll, Robert Newton, Basil Sydney, Walter Fitzgerald, Denis O\'Dea', 'Aventuras', 'Película', 25),
(20, 'La isla del tesoro', '1990-01-01', 'Fraser Clarke Heston', 'Charlton Heston, Christian Bale, Oliver Reed, Christopher Lee, Richard Johnson', 'Aventuras', 'Serie', 25),
(21, 'Matilda', '1996-01-01', 'Danny DeVito', 'Mara Wilson, Danny DeVito, Rhea Perlman, Embeth Davidtz, Pam Ferris', 'Infantil', 'Película', NULL),
(22, 'Un mundo de fantasía', '1971-01-01', 'Mel Stuart', 'Gene Wilder, Jack Albertson, Peter Ostrum, Roy Kinnear, Michael Bollner', 'Infantil', 'Película', NULL),
(23, 'Por quién doblan las campanas', '1943-01-01', 'Sam Wood', 'Gary Cooper, Ingrid Bergman, Akim Tamiroff, Arturo de Córdova, Vladimir Sokoloff', 'Drama', 'Película', NULL),
(24, 'Harry Potter y el cáliz de fuego', '2005-01-01', 'Mike Newell', 'Daniel Radcliffe, Rupert Grint, Emma Watson, Robbie Coltrane, Michael Gambon', 'Fantasía', 'Película', NULL),
(25, 'El gran Gatsby', '1949-01-01', 'Elliott Nugent', 'Alan Ladd, Betty Field, Macdonald Carey, Ruth Hussey, Barry Sullivan', 'Drama', 'Película', 27),
(26, 'El gran Gatsby', '1974-01-01', 'Jack Clayton', 'Robert Redford, Mia Farrow, Bruce Dern, Karen Black, Scott Wilson', 'Drama', 'Película', 27),
(27, 'El gran Gatsby', '2000-01-01', 'Robert Markowitz', 'Mira Sorvino, Toby Stephens, Paul Rudd, Martin Donovan, Francie Swift', 'Drama', 'Serie', 27),
(28, 'El gran Gatsby', '2013-01-01', 'Baz Luhrmann', 'Leonardo DiCaprio, Tobey Maguire, Carey Mulligan, Joel Edgerton, Isla Fisher', 'Drama', 'Película', 27),
(29, 'Fahrenheit 451', '1966-01-01', 'François Truffaut', 'Julie Christie, Oskar Werner, Cyril Cusack, Anton Diffring, Jeremy Spenser, Ann Bell', 'Ciencia ficción', 'Película', 26),
(30, 'Fahrenheit 451', '2018-01-01', 'Ramin Bahrani', 'Michael B. Jordan, Michael Shannon, Sofia Boutella, Laura Harrier, Lilly Singh', 'Ciencia ficción', 'Película', 26);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `ID_CLIENTE` int(11) NOT NULL,
  `ID_LIBRO` int(11) NOT NULL,
  `ID_PELICULA` int(11) NOT NULL,
  `FECHA_RESERVA` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`ID_CLIENTE`, `ID_LIBRO`, `ID_PELICULA`, `FECHA_RESERVA`) VALUES
(1, 4, 16, '2026-01-28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID` int(11) NOT NULL,
  `USUARIO` varchar(20) COLLATE utf8mb4_bin NOT NULL,
  `CONTRASEÑA` varchar(300) COLLATE utf8mb4_bin NOT NULL,
  `EMAIL` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `FECHA_NACIMIENTO` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID`, `USUARIO`, `CONTRASEÑA`, `EMAIL`, `FECHA_NACIMIENTO`) VALUES
(1, 'admin', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'admin@admin.net', '2000-07-31');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autores`
--
ALTER TABLE `autores`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `AUTOR_ID` (`AUTOR_ID`);

--
-- Indices de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ADAPTACION_ID` (`ADAPTACION_ID`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD KEY `ID_CLIENTE` (`ID_CLIENTE`),
  ADD KEY `ID_LIBRO` (`ID_LIBRO`),
  ADD KEY `ID_PELICULA` (`ID_PELICULA`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autores`
--
ALTER TABLE `autores`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `libros`
--
ALTER TABLE `libros`
  ADD CONSTRAINT `libros_ibfk_1` FOREIGN KEY (`AUTOR_ID`) REFERENCES `autores` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD CONSTRAINT `peliculas_ibfk_1` FOREIGN KEY (`ADAPTACION_ID`) REFERENCES `libros` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `reservas_ibfk_1` FOREIGN KEY (`ID_CLIENTE`) REFERENCES `clientes` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservas_ibfk_2` FOREIGN KEY (`ID_LIBRO`) REFERENCES `libros` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservas_ibfk_3` FOREIGN KEY (`ID_PELICULA`) REFERENCES `peliculas` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
