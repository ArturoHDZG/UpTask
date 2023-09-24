/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE TABLE `proyectos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `proyecto` varchar(60) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `url` varchar(32) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `propietarioId` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `propietarioId` (`propietarioId`),
  CONSTRAINT `proyectos_ibfk_1` FOREIGN KEY (`propietarioId`) REFERENCES `usuarios` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

CREATE TABLE `tareas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  `proyectoId` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `proyectoId` (`proyectoId`),
  CONSTRAINT `tareas_ibfk_1` FOREIGN KEY (`proyectoId`) REFERENCES `proyectos` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb3;

CREATE TABLE `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `email` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `password` varchar(60) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `token` varchar(15) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `confirmado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

INSERT INTO `proyectos` (`id`, `proyecto`, `url`, `propietarioId`) VALUES
(1, ' Tienda Virtual', '33362324fdce9f21794a7c73c55f0702', 1);
INSERT INTO `proyectos` (`id`, `proyecto`, `url`, `propietarioId`) VALUES
(2, ' Api Google', '4a9048df0cb9329f23c80483dae74b25', 1);
INSERT INTO `proyectos` (`id`, `proyecto`, `url`, `propietarioId`) VALUES
(3, ' Diseñar Logo', '2f6c9ef06c18aad198af720c5a7f060c', 1);
INSERT INTO `proyectos` (`id`, `proyecto`, `url`, `propietarioId`) VALUES
(4, ' Proyecto Pruebas', 'd2b333d2d6aa8d17fc5acfce6caa5476', 1);

INSERT INTO `tareas` (`id`, `nombre`, `estado`, `proyectoId`) VALUES
(1, 'Investigar mejor Hosting', 0, 1);
INSERT INTO `tareas` (`id`, `nombre`, `estado`, `proyectoId`) VALUES
(2, ' Configurar PayPal', 0, 1);
INSERT INTO `tareas` (`id`, `nombre`, `estado`, `proyectoId`) VALUES
(4, ' Investigar cómo funciona', 0, 2);
INSERT INTO `tareas` (`id`, `nombre`, `estado`, `proyectoId`) VALUES
(5, ' Como Implementar la API en el proyecto', 0, 2),
(6, ' Añadir API de mapas', 0, 2),
(7, ' Buscar nombre', 0, 3),
(8, ' Investigar colores atractivos', 0, 3),
(9, ' Buscar logos del mismo tipo de negocio', 0, 3),
(14, ' Investigar sobre e-Commerce', 1, 1),
(15, ' Tarea de prueba', 0, 1);

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `password`, `token`, `confirmado`) VALUES
(1, ' Arturo Hdz', 'arturo_hdzg@hotmail.com', '$2y$10$hQL/NY5VYM1pPQuJ5P2N7e04tYy2/olNqOwYMXuHr3dBbKsOtR8Ny', '', 1);



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;