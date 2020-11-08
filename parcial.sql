-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-11-2020 a las 07:57:33
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `parcial`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `peliculasPaginado` (IN `iniciar` INT(50), IN `npeliculas` INT(50))  SELECT * FROM movies LIMIT iniciar,npeliculas$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `selectAllMovies` ()  SELECT * FROM `movies`$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movies`
--

CREATE TABLE `movies` (
  `id` int(255) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `año` int(4) NOT NULL,
  `puntaje` float NOT NULL,
  `duracion` varchar(10) NOT NULL,
  `genero` varchar(50) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `imagen_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `movies`
--

INSERT INTO `movies` (`id`, `titulo`, `año`, `puntaje`, `duracion`, `genero`, `descripcion`, `imagen_link`) VALUES
(1, 'Lego Dc: Shazam! Magic And Monsters', 2020, 7.9, '81', 'Comedia', '¡Ya es hora de que la Liga de la Justicia tome nota de Shazam! (Sean Astin), pero unirse al mejor equipo de superhéroes del mundo es mucho más difícil cuando todos se han convertido en niños. LEGO DC: ¡Shazam! Magic and Monsters le enseñará a Billy Batson', 'https://somosmovies.com/uploads/poster/47MulUXhof6iC1B31kSW0oGLFGn.jpg'),
(2, 'We Summon The Darkness', 2019, 5.1, '91', 'Terror', 'Año 1988. Los habitantes de los Estados Unidos están aterrorizados por una serie de asesinatos satánicos que se han cometido a lo largo del país, y cuyos responsables parecen ser asistentes a conciertos de heavy metal. Tres chicas en su veintena, Alexis, ', 'https://somosmovies.com/uploads/poster/zXAwq18CJYmzhLZNbLpBf3dG3A5.jpg'),
(3, 'Sueños de libertad', 1994, 9.3, '182', 'Drama', 'Dos hombres encarcelados se unen durante varios años, encontrando consuelo y eventual redención a través de actos de decencia común.', 'https://www.guioteca.com/los-90/files/2016/08/Sueno-de-fuga.jpg'),
(4, 'La lista de Schindler', 1993, 8.9, '195', 'Drama, Historia', 'En la Polonia ocupada por alemania durante la Segunda Guerra Mundial, el industrial Oskar Schindler poco a poco se preocupa por su fuerza de trabajo judía después de presenciar su persecución por los nazis.', 'https://m.media-amazon.com/images/M/MV5BNDE4OTMxMTctNmRhYy00NWE2LTg3YzItYTk3M2UwOTU5Njg4XkEyXkFqcGdeQXVyNjU0OTQ0OTY@._V1_UX182_CR0,0,182,268_AL_.jpg'),
(7, 'El Padrino II', 1974, 9.5, '202', 'Crimen, Drama', 'La vida temprana y la carrera de Vito Corleone en la década de 1920 en Nueva York es retratada, mientras que su hijo, Michael, expande y endurece su control sobre el sindicato del crimen familiar.', 'https://vivirlavidacomoenunapelicula.files.wordpress.com/2018/03/2aac97615c14269b2c5cc4e66ebd9401-60240-godfather2.jpg'),
(8, 'El padrino', 1972, 9.4, '235', 'Crimen, Drama', 'El patriarca envejecido de una dinastía del crimen organizado transfiere el control de su imperio clandestino a su hijo reacio.', 'https://m.media-amazon.com/images/M/MV5BM2MyNjYxNmUtYTAwNi00MTYxLWJmNWYtYzZlODY3ZTk3OTFlXkEyXkFqcGdeQXVyNzkwMjQ5NzM@._V1_UY268_CR3,0,182,268_AL_.jpg'),
(9, 'We Die Young', 2019, 5.5, '93', 'Drama', 'Lucas (Elijah Rodriguez) es un adolescente de 14 años al que la vida de pandillero ha seducido en la ciudad de Washington D.C. Pese a ello, tiene claro que hará todo lo posible por evitar que su hermano de 10 años siga sus mismos pasos', 'https://somosmovies.com/uploads/poster/dB0Dl2nDRmvplaJLeHSfkppJXHs.jpg'),
(10, 'Capone ', 2020, 5, '103', 'Crimen, Drama', 'Tras pasar 10 años en prisión, el gánster Al Capone, de 47 años, comienza a sufrir de demencia y su mente comienza a ser acosada por los recuerdos de su violento pasado.', 'https://somosmovies.com/uploads/poster/b0GO87eW5LL64GTqgRZSj1jroSx.jpg'),
(11, 'Proximity', 2020, 4.4, '105', 'Drama', 'Tras ser abducido por extraterrestres, un joven científico de la NASA se obsesiona con encontrar pistas de lo sucedido al descubrir que nadie cree que su experiencia haya ocurrido realmente.', 'https://somosmovies.com/uploads/poster/yYio7FY9fDsH2DF9utAbK0J94Lc.jpg'),
(12, 'Just A Breath Away', 2018, 5.9, '90', 'Ciencia ficción, Drama, Suspenso', 'Cuando una niebla mortal envuelve París, la gente encuentra refugio en los pisos superiores de los edificios. Sin información, sin electricidad y sin apenas suministros, Mathieu, Anna y su hija Sarah intentan sobrevivir al desastre…', 'https://somosmovies.com/uploads/poster/hjePJQDv7GitTrEU67TANuhbytv.jpg'),
(13, 'Waves', 2019, 7.7, '135', 'Drama, Romance', 'Dos parejas jóvenes navegan a través del campo de minas emocional que supone madurar y enamorarse por primera vez.', 'https://somosmovies.com/uploads/poster/40nIOFe7XXtPyIVFLA6N6RBgHeF.jpg'),
(14, 'Shirley', 2020, 6.4, '107', 'Drama. Suspenso', 'Shirley y Stanley Jackson son un matrimonio que busca empezar un nuevo capítulo en sus vidas. Shirley, una novelista que trata de encontrar su siguiente proyecto, y Stanley, un profesor de universidad, serán testigos de como esas esperanzas se verán disip', 'https://somosmovies.com/uploads/poster/iSwTnNS7TKAS79Sz9LvyqlBxxrU.jpg'),
(15, 'Becky', 2020, 6.2, '93', 'Acción, Terror, Suspense', 'El fin de semana de una adolescente en una casa del lago con su padre empeora cuando un grupo de convictos causa estragos en sus vidas.', 'https://somosmovies.com/uploads/poster/xqbQtMffXwa3oprse4jiHBMBvdW.jpg'),
(16, 'The Plagues Of Breslau', 2018, 5.3, '93', 'Acción, Crimen, Suspenso', 'Todos los días a las 6 de la tarde un asesino en serie mata a una persona. La oficial de policía Helena Rus cree que los asesinatos sólo los lleva a cabo un hombre y decide averiguar su identidad revisando la historia de la ciudad en el siglo XVIII.', 'https://somosmovies.com/uploads/poster/1m68XW6wipfFTRAjg8uELn6iqNX.jpg'),
(17, 'Survive The Night', 2020, 6, '89', 'Acción, Suspenso', 'Un médico deshonrado y su familia son retenidos como rehenes en su casa por delincuentes fugitivos, cuando un robo a mano armada les exige que busquen atención médica inmediata.', 'https://somosmovies.com/uploads/poster/yjrvo1PevQjxi1MlJo61koROp2f.jpg'),
(18, 'Sonic The Hedgehog', 2020, 6.7, '99', 'Acción, Ciencia ficción, Comedia', 'Sonic, el famoso erizo azul de SEGA vivirá su primera aventura en la pantalla grande. En esta adaptación cinematográfica basada en la conocida saga de videojuegos podremos ver a los personajes icónicos de la franquicia. Su protagonista será Sonic, el eriz', 'https://somosmovies.com/uploads/poster/aQvJ5WPzZgYVDrxLX4R6cLJCEaQ.jpg'),
(19, 'Top Gun', 1986, 6.9, '110', 'Acción, Drama', 'La Marina de los Estados Unidos ha creado una escuela de élite para pilotos con el fin de sacar una promoción de expertos en técnicas de combate. En la academia, más conocida como Top Gun, a los mejores se les entrena para ser intrépidos y fríos al mismo ', 'https://somosmovies.com/uploads/poster/3fjMBKgCVMaIwIfS3qOdBLdTezh.jpg'),
(20, 'The Hunt', 2020, 6.4, '90', 'Acción, Suspenso, Terror', 'La historia sigue a un grupo de personas que son perseguidos y cazados uno por uno por un grupo de ricos de élite por deporte, por simple diversión.', 'https://somosmovies.com/uploads/poster/wxPhn4ef1EAo5njxwBkAEVrlJJG.jpg'),
(21, 'Taxi 5', 2018, 4.7, '102', 'Acción, Comedia', 'Sylvain Marot, un súper policía parisino y conductor excepcional, es trasladado contra su voluntad a la policía municipal de Marsella. El ex comisario Gibert, y alcalde de la ciudad, que está en lo más bajo de las encuestas, le confiará la misión de deten', 'https://somosmovies.com/uploads/poster/yUs9qkQz8zPwi910jntTvrOmTOC.jpg'),
(22, 'Downhill', 2020, 4.8, '87', 'Comedia, Drama', 'Apenas escapando de una avalancha durante unas vacaciones familiares de esquí en los Alpes, una pareja casada se ve desarreglada cuando se ven obligados a reevaluar sus vidas y cómo se sienten el uno con el otro.', 'https://somosmovies.com/uploads/poster/8QlNrKg4ZFFyS3Z5jmNl5kJS4il.jpg'),
(23, 'Rich In Love', 2020, 6, '104', 'Comedia, Drama', 'Teto es un joven millonario decidido a probarle a Paula, la chica que le gusta, que es un buen muchacho. Pero una mentira sobre su pasado terminará saliéndose de control.', 'https://somosmovies.com/uploads/poster/u8kRdW12mhOakR9WqVnarQbqGNH.jpg'),
(24, 'The Half Of It', 2020, 7, '104', 'Comedia, Romance', 'Ellie Chu acepta escribir una carta de amor para el cachas del insti, pero lo que no esperaba era hacerse su amiga ni enamorarse de la chica que le gusta.', 'https://somosmovies.com/uploads/poster/jC1PNXGET1ZZQyrJvdFhPfXdPP1.jpg'),
(25, 'Birds Of Prey', 2020, 6.6, '109', 'Comedia, Acción', 'Después de separarse de Joker, Harley Quinn y otras tres heroínas (Canario Negro, Cazadora y Renée Montoya) unen sus fuerzas para salvar a una niña (Cassandra Cain) del malvado rey del crimen Máscara Negra.', 'https://somosmovies.com/uploads/poster/bpsSizzKSe2rzngeVCsThF1PdXJ.jpg'),
(26, 'Scoob!', 2020, 5.9, '94', 'Comedia, Animación', 'Largometraje de animación basado en el popular dibujo animado \"Scooby-Doo\".', 'https://somosmovies.com/uploads/poster/zG2l9Svw4PTldWJAzC171Y3d6G8.jpg'),
(27, 'On A Magical Night', 2019, 6.2, '90', 'Comedia', 'Después de 20 años de matrimonio, María decide dejar a su esposo. Ella se muda a la habitación 212 del hotel al otro lado de la calle, con una vista panorámica de su departamento, su esposo y la vida que compartió con él. Si bien se pregunta si tomó la de', 'https://somosmovies.com/uploads/poster/8UKHFihSkMQT3U6RCpea3F9PjCG.jpg'),
(28, 'The Lovebirds', 2020, 6, '86', 'Comedia, Acción ', 'A punto de separarse, una pareja se enreda involuntariamente en un extraño, divertido y misterioso asesinato. A medida que se acercan al momento de limpiar sus nombres y resolver el caso, necesitan descubrir cómo ellos y su relación pueden sobrevivir a es', 'https://somosmovies.com/uploads/poster/5jdLnvALCpK1NkeQU1z4YvOe2dZ.jpg'),
(29, 'Guns Akimbo', 2019, 6.3, '95', 'Comedia, Acción', 'Miles (Daniel Radcliffe) se siente atascado en la vida: su trabajo no tiene futuro y sigue enamorado de su exnovia Nova. Un día descubre que un grupo de mafiosos llamado \"Skizm\" planea celebrar una peligrosa competición que reúne a extraños de distintos p', 'https://somosmovies.com/uploads/poster/2kNnf7BwRCEm4bcFkdiE0T4U25s.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movies_eliminadas`
--

CREATE TABLE `movies_eliminadas` (
  `id` int(11) NOT NULL,
  `año` int(11) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `duracion` varchar(255) NOT NULL,
  `genero` varchar(350) NOT NULL,
  `imagen_link` varchar(600) NOT NULL,
  `puntaje` float NOT NULL,
  `titulo` varchar(500) NOT NULL,
  `usuario` varchar(500) NOT NULL,
  `fecha` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `usuario` varchar(15) NOT NULL,
  `contrasenia` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `usuario`, `contrasenia`) VALUES
(1, 'admin', 'admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

CREATE TRIGGER EliminarPelicula AFTER DELETE 
ON movies
FOR EACH ROW
INSERT INTO movies_eliminadas(id,año,descripcion,duracion,genero,imagen_link,puntaje,titulo,usuario,fecha)
VALUES(old.id,old.año,old.descripcion,old.duracion,old.genero,old.imagen_link,old.puntaje,old.titulo,USER(),NOW());

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
