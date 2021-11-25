-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-11-2021 a las 16:42:12
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `project`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`admin_id`, `email`, `password`) VALUES
(2, 'hola@admin.com', '1234abcd..');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `answer`
--

CREATE TABLE `answer` (
  `qid` text NOT NULL,
  `ansid` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `answer`
--

INSERT INTO `answer` (`qid`, `ansid`) VALUES
('5f88b43712884', '5f88b43714dbe'),
('5f88b43761aa1', '5f88b437621f3'),
('60b1bfcdd5b6b', '60b1bfcdeb924'),
('60b1bfce33684', '60b1bfce3cccd'),
('60b1c1744c7a8', '60b1c174a76b3'),
('60b1c174eedb3', '60b1c17504545'),
('60b1c17545a31', '60b1c1754c56f'),
('60b43bb543107', '60b43bb56e2fd'),
('60b43bb5a3478', '60b43bb5af3f7'),
('60b43bb608839', '60b43bb61ffa3'),
('60b43bb641d71', '60b43bb648e0f'),
('60b43bb67c6cf', '60b43bb685d89'),
('60b43bb6ad6b1', '60b43bb6b6f36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `feedback`
--

CREATE TABLE `feedback` (
  `id` text NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(500) NOT NULL,
  `feedback` varchar(500) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `subject`, `feedback`, `date`, `time`) VALUES
('5f87ca01c593b', 'Usuario', 'configuroweb@gmail.com', 'problemas con la pregunta 3', 'no estoy de acuerdo con la pregunta 3, no me parece una opción exacta, sería mejor una pregunta abierta.', '2020-10-15', '06:03:13am');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `history`
--

CREATE TABLE `history` (
  `email` varchar(50) NOT NULL,
  `eid` text NOT NULL,
  `score` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `sahi` int(11) NOT NULL,
  `wrong` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `history`
--

INSERT INTO `history` (`email`, `eid`, `score`, `level`, `sahi`, `wrong`, `date`) VALUES
('oralia.suarez@up.ac.pa', '60b1c134568da', 15, 3, 3, 0, '2021-05-29 04:33:36'),
('oralia.suarez@up.ac.pa', '60b1be6dcaf49', 2, 2, 2, 0, '2021-05-29 04:55:52'),
('suyitza@mail.com', '60b43adbd1d85', 25, 6, 5, 1, '2021-05-31 01:31:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `options`
--

CREATE TABLE `options` (
  `qid` varchar(50) NOT NULL,
  `option` varchar(5000) NOT NULL,
  `optionid` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `options`
--

INSERT INTO `options` (`qid`, `option`, `optionid`) VALUES
('5f88b43712884', 'p', '5f88b43714dba'),
('5f88b43712884', 'print', '5f88b43714dbe'),
('5f88b43712884', 'echo', '5f88b43714dbf'),
('5f88b43712884', 'console.log', '5f88b43714dc0'),
('5f88b43761aa1', '#', '5f88b437621f3'),
('5f88b43761aa1', '*', '5f88b437621f8'),
('5f88b43761aa1', '//', '5f88b437621fa'),
('5f88b43761aa1', '--', '5f88b437621fb'),
('60b1bfcdd5b6b', '10', '60b1bfcdeb924'),
('60b1bfcdd5b6b', '9', '60b1bfcdeb92c'),
('60b1bfcdd5b6b', '8', '60b1bfcdeb92d'),
('60b1bfcdd5b6b', '11', '60b1bfcdeb92e'),
('60b1bfce33684', '6 M', '60b1bfce3ccc4'),
('60b1bfce33684', '5 M', '60b1bfce3cccb'),
('60b1bfce33684', '4 M', '60b1bfce3cccd'),
('60b1bfce33684', '2 M', '60b1bfce3ccce'),
('60b1c1744c7a8', '2', '60b1c174a76b3'),
('60b1c1744c7a8', '5', '60b1c174a76b8'),
('60b1c1744c7a8', '8', '60b1c174a76b9'),
('60b1c1744c7a8', '10', '60b1c174a76ba'),
('60b1c174eedb3', '1', '60b1c1750453d'),
('60b1c174eedb3', '15', '60b1c17504543'),
('60b1c174eedb3', '2', '60b1c17504544'),
('60b1c174eedb3', '4', '60b1c17504545'),
('60b1c17545a31', '9', '60b1c1754c569'),
('60b1c17545a31', '6', '60b1c1754c56f'),
('60b1c17545a31', '4', '60b1c1754c570'),
('60b1c17545a31', '1', '60b1c1754c571'),
('60b43bb543107', 'e', '60b43bb56e2f1'),
('60b43bb543107', 'i', '60b43bb56e2fa'),
('60b43bb543107', 'u', '60b43bb56e2fb'),
('60b43bb543107', 'a', '60b43bb56e2fd'),
('60b43bb5a3478', 'e', '60b43bb5af3f7'),
('60b43bb5a3478', 'i', '60b43bb5af405'),
('60b43bb5a3478', 'u', '60b43bb5af407'),
('60b43bb5a3478', 'o', '60b43bb5af409'),
('60b43bb608839', 'a', '60b43bb61ff9a'),
('60b43bb608839', 'i', '60b43bb61ffa3'),
('60b43bb608839', 'o', '60b43bb61ffa5'),
('60b43bb608839', 'u', '60b43bb61ffa6'),
('60b43bb641d71', 'a', '60b43bb648e03'),
('60b43bb641d71', 'i', '60b43bb648e0d'),
('60b43bb641d71', 'o', '60b43bb648e0f'),
('60b43bb641d71', 'u', '60b43bb648e10'),
('60b43bb67c6cf', 'u', '60b43bb685d89'),
('60b43bb67c6cf', 'i', '60b43bb685d92'),
('60b43bb67c6cf', 'o', '60b43bb685d94'),
('60b43bb67c6cf', 'a', '60b43bb685d95'),
('60b43bb6ad6b1', 'a', '60b43bb6b6f36'),
('60b43bb6ad6b1', 'a', '60b43bb6b6f3f'),
('60b43bb6ad6b1', 'a', '60b43bb6b6f41'),
('60b43bb6ad6b1', 'a', '60b43bb6b6f43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prof`
--

CREATE TABLE `prof` (
  `prof_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `prof`
--

INSERT INTO `prof` (`prof_id`, `email`, `password`) VALUES
(1393, 'maximo@mail.com', '123.abc.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `questions`
--

CREATE TABLE `questions` (
  `eid` text NOT NULL,
  `qid` text NOT NULL,
  `qns` text NOT NULL,
  `choice` int(10) NOT NULL,
  `sn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `questions`
--

INSERT INTO `questions` (`eid`, `qid`, `qns`, `choice`, `sn`) VALUES
('5f88b3cd0a5d9', '5f88b43712884', 'Para mostrar texto en la consola usamos el comando', 4, 1),
('5f88b3cd0a5d9', '5f88b43761aa1', '¿Qué símbolo se utiliza para comentar una línea de código?', 4, 2),
('60b1be6dcaf49', '60b1bfcdd5b6b', 'Cuantas provincias tiene panamá', 4, 1),
('60b1be6dcaf49', '60b1bfce33684', 'Cuanta población hay actualmente', 4, 2),
('60b1c134568da', '60b1c1744c7a8', '1 + 1', 4, 1),
('60b1c134568da', '60b1c174eedb3', '2 + 2', 4, 2),
('60b1c134568da', '60b1c17545a31', '3 + 3', 4, 3),
('60b43adbd1d85', '60b43bb543107', 'Cual es la primer vocal', 4, 1),
('60b43adbd1d85', '60b43bb5a3478', 'Cual es la segunda vocal', 4, 2),
('60b43adbd1d85', '60b43bb608839', 'Cual es la tercera Vocal', 4, 3),
('60b43adbd1d85', '60b43bb641d71', 'Cual es la cuarta vocal', 4, 4),
('60b43adbd1d85', '60b43bb67c6cf', 'Cual es la quinta vocal', 4, 5),
('60b43adbd1d85', '60b43bb6ad6b1', 'sfdsfkjsdfkjds', 4, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `quiz`
--

CREATE TABLE `quiz` (
  `eid` text NOT NULL,
  `title` varchar(100) NOT NULL,
  `sahi` int(11) NOT NULL,
  `wrong` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `time` bigint(20) NOT NULL,
  `intro` text NOT NULL,
  `tag` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `quiz`
--

INSERT INTO `quiz` (`eid`, `title`, `sahi`, `wrong`, `total`, `time`, `intro`, `tag`, `date`) VALUES
('5f88b3cd0a5d9', 'Python Básico', 1, 1, 2, 5, 'Examen básico de Python', '#pythontest', '2020-10-16 02:24:50'),
('60b1be6dcaf49', 'Historia De Panam??', 1, 0, 2, 2, 'Esto es una prueba', '#hsitoria', '2021-05-29 04:09:17'),
('60b1c134568da', 'Matematicas Para Noob', 5, 0, 3, 3, 'matebruticas', '#matematicas', '2021-05-29 04:21:08'),
('60b43adbd1d85', 'Examen De Espa??ol ', 5, 0, 6, 2, 'Este es un examen de español', '#Español', '2021-05-31 01:24:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rank`
--

CREATE TABLE `rank` (
  `email` varchar(50) NOT NULL,
  `score` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rank`
--

INSERT INTO `rank` (`email`, `score`, `time`) VALUES
('operador@cweb.com', 1, '2020-10-15 09:25:31'),
('oralia.suarez@up.ac.pa', 17, '2021-05-29 04:55:53'),
('suyitza@mail.com', 25, '2021-05-31 01:31:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `name` varchar(50) NOT NULL,
  `gender` varchar(5) NOT NULL,
  `college` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mob` bigint(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`name`, `gender`, `college`, `email`, `mob`, `password`) VALUES
('Operador', 'M', 'operador', 'operador@cweb.com', 3122344523, '4b67deeb9aba04a5b54632ad19934f26'),
('Oralia Suarez', 'F', 'Universidad de Panamá', 'oralia.suarez@up.ac.pa', 0, '3028879ab8d5c87dc023049fa5bb5c1a'),
('Suyitza Castillo', 'M', 'Golden Lion', 'suyitza@mail.com', 66655544, '3aac3ec89835b5d0a457a45fccd03e52'),
('Usuario', 'M', 'usuario', 'usuario@cweb.com', 3102451327, '4b67deeb9aba04a5b54632ad19934f26');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
