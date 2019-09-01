CREATE Database `two-read`;

use `two-read`;

CREATE TABLE `usuario` (
  `id` integer NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(50) NOT NULL
);

CREATE TABLE `textos` (
  `id_txt` integer NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nome_txt` varchar(36) NOT NULL,
  `txt` text NOT NULL,
  `id_user` integer NOT NULL,
  `txt_eng` text NOT NULL
);
