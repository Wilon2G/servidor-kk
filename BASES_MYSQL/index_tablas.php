<?php
include "./database.conf.php";

print("Estableciendo conexión...<br>");

try {
  $con = new PDO('mysql:dbname='.DBNAME.';host='.HOST, USERNAME, PASSWORD);
  print("Conexión exitosa<br>");
} catch (PDOException $Exception) {
  if ($Exception->getCode( )==1049) {
    print("La base de datos no existía, creando base de datos...<br>");
    print(  $Exception->getMessage( ) ." --------- ". $Exception->getCode( )."<br>" );
    $con = new PDO('mysql:host='.$host, USERNAME, PASSWORD);
    $sql=("
    CREATE DATABASE ".DBNAME);
    try {
      $con->query($sql);
      print("Base de datos creada correctamente<br>");
    } catch (PDOException $Exception2) {
      print("Error al crear la base de datos<br>");
      throw new Exception( $Exception->getMessage( ) , $Exception->getCode( ) );
        }
  }
  else {
    print("Error con la base de datos:<br>");
    throw new Exception( $Exception->getMessage( ) , $Exception->getCode( ) );
    }
}


$sql= <<<EOT
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `libros`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `book`
--

CREATE TABLE IF NOT EXISTS `book` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `isbn` varchar(13) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `stock` smallint(5) DEFAULT NULL,
  `price` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `book`
--

INSERT INTO `book` (`id`, `isbn`, `title`, `author`, `stock`, `price`) VALUES
(1, '978-3-16-1484', 'Harry Potter y la piedra filosofal', 'J. K. Rowling', 5, 15.99),
(2, '978-4-16-1484', 'La sombre del viento', 'Carlos Ruiz Zafón', 5, 19.99),
(3, '978-5-16-1484', 'Don Quijote de la Mancha', 'Miguel de Cervantes', 5, 9.99),
(4, '978-6-16-1484', 'Drácula', 'Bram Stoker', 5, 15.99),
(5, '978-7-16-1484', 'Frankenstein', 'Mary Shelley', 5, 15.99),
(6, '978-8-16-1484', 'Historia de dos ciudades', 'Charles Dickens', 5, 9.99),
(7, '978-9-16-1484', 'Las aventuras de Alicia en el país de las maravillas', 'Lewis Carroll', 5, 15.99),
(8, '978-2-12-1484', 'El león, la bruja y el armario', 'C. S. Lewis', 5, 15.99),
(9, '978-3-16-7484', 'El principito', 'Antoine de Saint-Exupéry', 5, 9.99),
(10, '958-3-16-1484', 'El guardián entre el centeno', 'J. D. Salinger', 5, 9.99),
(11, '998-3-16-1484', 'El alquimista', 'Paulo Coelho', 5, 5.99),
(12, '973-6-18-1489', 'El nombre de la rosa', 'Umberto Eco', 5, 5.99),
(13, '948-3-16-1484', 'El señor de las moscas', 'William Golding', 5, 19.99),
(14, '178-3-15-1484', 'El señor de los anillos', 'J. R. R. Tolkien', 5, 25.99),
(15, '678-0-06-1484', 'Un mundo feliz', 'Aldous Huxley', 5, 19.99);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `borrowed_books`
--

CREATE TABLE IF NOT EXISTS `borrowed_books` (
  `book_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL,
  PRIMARY KEY (`book_id`,`customer_id`,`start`),
  KEY `customer_id` (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `type` enum('basic','premium') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sale`
--

CREATE TABLE IF NOT EXISTS `sale` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sale_book`
--

CREATE TABLE IF NOT EXISTS `sale_book` (
  `book_id` int(10) NOT NULL,
  `sale_id` int(10) NOT NULL,
  `amount` smallint(5) DEFAULT NULL,
  PRIMARY KEY (`book_id`,`sale_id`),
  KEY `sale_id` (`sale_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `borrowed_books`
--
ALTER TABLE `borrowed_books`
  ADD CONSTRAINT `borrowed_books_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `book` (`id`),
  ADD CONSTRAINT `borrowed_books_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`);

--
-- Filtros para la tabla `sale`
--
ALTER TABLE `sale`
  ADD CONSTRAINT `sale_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`);

--
-- Filtros para la tabla `sale_book`
--
ALTER TABLE `sale_book`
  ADD CONSTRAINT `sale_book_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `book` (`id`),
  ADD CONSTRAINT `sale_book_ibfk_2` FOREIGN KEY (`sale_id`) REFERENCES `sale` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

EOT;

print("Creando tablas...");

$con->query($sql);

print("Tablas creadas con éxito");

//Primeros Intentos, tablas con relaciones fk:

// $sql = "CREATE TABLE IF NOT EXISTS book (
//     id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     isbn VARCHAR(13) NOT NULL,
//     title VARCHAR(255) NOT NULL,
//     author VARCHAR(255) NOT NULL,
//     stock SMALLINT(5) NOT NULL,
//     price FLOAT NOT NULL
//   ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1";

// $con->query($sql);


// $sql = "CREATE TABLE IF NOT EXISTS customer (
//   id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//   firstname VARCHAR(255) NOT NULL,
//   surname VARCHAR(255) NOT NULL,
//   email VARCHAR(255) NOT NULL,
//   type ENUM('basic','premium') NOT NULL
// )ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1";

// $con->query($sql);

// $sql = "CREATE TABLE IF NOT EXISTS borrowed_books (
//   customer_id INT(10) UNSIGNED,
//   book_id INT(10) UNSIGNED,
//   start DATETIME,
//   end DATETIME,
//   FOREIGN KEY (customer_id) REFERENCES customer(id),
//   FOREIGN KEY (book_id) REFERENCES book(id)

// )ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1";

// $con->query($sql);

// $sql = "CREATE TABLE IF NOT EXISTS sale (
//   id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//   customer_id INT(10) UNSIGNED,
//   date DATETIME,
//   FOREIGN KEY (customer_id) REFERENCES customer(id)
// )ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1";

// $con->query($sql);

// $sql = "CREATE TABLE IF NOT EXISTS sale_book (
//   sale_id INT(10) UNSIGNED,
//   book_id INT(10) UNSIGNED,
//   amount SMALLINT(5) NOT NULL,
//   author VARCHAR(255) NOT NULL,
//   FOREIGN KEY (book_id) REFERENCES book(id),
//   FOREIGN KEY (sale_id) REFERENCES sale(id)
// )ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1";

// $con->query($sql);



// $sql = "CREATE TABLE IF NOT EXISTS sale_book (
//     book_id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     isbn VARCHAR(13) NOT NULL,
//     title VARCHAR(255) NOT NULL,
//     author VARCHAR(255) NOT NULL,
//     stock SMALLINT(5) NOT NULL,
//     price FLOAT NOT NULL
//   )";


//Eliminar tablas:

// $sql="DROP TABLE book";
// $bookData->query($sql);



