-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2024 at 12:50 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `estagioteste`
--

-- --------------------------------------------------------

--
-- Table structure for table `comentarios`
--

CREATE TABLE `comentarios` (
  `idComentario` int(11) NOT NULL,
  `dataHora` datetime DEFAULT NULL,
  `comentario` varchar(250) DEFAULT NULL,
  `idEstagio` int(11) DEFAULT NULL,
  `idProfessorOrientador` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comentarios`
--

INSERT INTO `comentarios` (`idComentario`, `dataHora`, `comentario`, `idEstagio`, `idProfessorOrientador`) VALUES
(1, '2024-06-11 11:40:38', 'ok', 2, 1),
(2, '2024-06-11 11:45:52', 'agora vai', 2, 1),
(3, '2024-06-11 12:36:22', 'ivan zika', 2, 1),
(4, '2024-06-11 19:19:04', 'alguma coisa', 2, 1),
(5, '2024-06-11 21:26:17', 'batata', 2, 1),
(6, '2024-06-14 10:34:56', 'Termo Correto', 4, 1),
(7, '2024-06-17 18:34:31', 'dddddd', 3, 1),
(8, '2024-06-26 18:18:42', 'Favor corrigir termo, data incorreta.', 5, 1),
(9, '2024-06-26 20:23:59', 'Documento com nome incorreto', 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `documentos`
--

CREATE TABLE `documentos` (
  `idDocumento` int(11) NOT NULL,
  `idEstagio` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `statusDocumento` varchar(255) DEFAULT 'Em análise',
  `pdfarquivo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `documentos`
--

INSERT INTO `documentos` (`idDocumento`, `idEstagio`, `descricao`, `statusDocumento`, `pdfarquivo`) VALUES
(14, 2, 'Termo de Compromisso', 'Aprovado', 'uploads/666d9d307f1ca.pdf'),
(16, 3, 'Plano de Atividade', 'Aprovado', 'uploads/6670ab8270851.pdf'),
(17, 5, 'Termo de Compromisso', 'Rejeitado', 'uploads/667c8525808cf.pdf'),
(18, 5, 'Plano de Atividade', 'Aprovado', 'uploads/667c8534389ae.pdf'),
(19, 5, 'Relatório Parcial', 'Em análise', 'uploads/667c8562a93df.pdf'),
(20, 5, 'Relatório Final', 'Em análise', 'uploads/667c856e9d888.pdf'),
(21, 6, 'Termo de Compromisso', 'Aprovado', 'uploads/667ca2ba9e52b.pdf'),
(23, 6, 'Plano de Atividade', 'Aprovado', 'uploads/667ca3335245f.pdf'),
(24, 6, 'Relatório Final', 'Aprovado', 'uploads/667ca35252021.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `empresas`
--

CREATE TABLE `empresas` (
  `idEmpresa` int(11) NOT NULL,
  `nomeEmpresa` varchar(45) DEFAULT NULL,
  `representanteEstagio` varchar(45) DEFAULT NULL,
  `cargoRepresentante` varchar(45) NOT NULL,
  `telefone` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `cpfRepresentante` varchar(45) DEFAULT NULL,
  `endereco` varchar(45) DEFAULT NULL,
  `cnpj` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `empresas`
--

INSERT INTO `empresas` (`idEmpresa`, `nomeEmpresa`, `representanteEstagio`, `cargoRepresentante`, `telefone`, `email`, `cpfRepresentante`, `endereco`, `cnpj`) VALUES
(10, 'Macacos Albinos', 'Geenivaldo', 'Diretor', '(19) 99966-1955', 'pfspedrofsantos@gmail.com', '54851515228', 'rua aquela mesmo', '12312522'),
(11, 'Insanes INC.', 'Bartolomeu', 'Analista de TI', '19299526996', 'exsjfai@gmail.com', '4368959548', 'rua tabajara', '5266325000156'),
(12, 'JJ Leto', 'March', 'Programador Senior', '19388565992', 'gjdijagojo@gmail.com', '54851515228', 'rua aquela mesmo', '282562000156'),
(13, 'JJ Leto', 'Bartolomeu', 'Analista de TI', '(19) 99966-1955', 'pedro.junior08@gmail.com', '54851515228', 'rua aquela mesmo', '5266325000156'),
(14, 'JJ Leto', 'Geenivaldo', 'Diretor', '1921828636', 'pedro.junior08@gmail.com', '54851515228', 'rua aquela mesmo', '5266325000156');

-- --------------------------------------------------------

--
-- Table structure for table `estagios`
--

CREATE TABLE `estagios` (
  `idEstagio` int(11) NOT NULL,
  `situacaoEstagio` varchar(250) DEFAULT NULL,
  `dataInicio` date DEFAULT NULL,
  `dataFim` date DEFAULT NULL,
  `notaFinal` varchar(45) DEFAULT NULL,
  `idEstudante` int(11) DEFAULT NULL,
  `idProfessorOrientador` int(11) DEFAULT NULL,
  `idEmpresa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `estagios`
--

INSERT INTO `estagios` (`idEstagio`, `situacaoEstagio`, `dataInicio`, `dataFim`, `notaFinal`, `idEstudante`, `idProfessorOrientador`, `idEmpresa`) VALUES
(2, 'Concluído', '2024-06-12', '2024-06-12', '', 1, 1, 10),
(3, 'Iniciado', NULL, NULL, '', 2, 0, 0),
(4, 'Iniciado', NULL, NULL, '', 4, 0, 12),
(5, 'Iniciado', '2024-06-26', '2024-06-30', '', 5, 0, 11),
(6, 'Em execução', '2024-06-26', '2024-06-29', '', 6, 0, 11);

-- --------------------------------------------------------

--
-- Table structure for table `estudantes`
--

CREATE TABLE `estudantes` (
  `idEstudante` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `RG` varchar(45) DEFAULT NULL,
  `RA` varchar(45) NOT NULL,
  `logradouro` varchar(100) DEFAULT NULL,
  `numeroResidencia` int(10) DEFAULT NULL,
  `cidade` varchar(50) DEFAULT NULL,
  `bairro` varchar(60) DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `estudantes`
--

INSERT INTO `estudantes` (`idEstudante`, `nome`, `RG`, `RA`, `logradouro`, `numeroResidencia`, `cidade`, `bairro`, `idUsuario`) VALUES
(1, 'João da Silva', '987654321', '27815525896', 'Av. Paulista', 1, 'Itapira', 'Prados', 1),
(2, 'Ivan Ambrogi', '35665895', '27825524862023', 'rua batatais', 1234, 'mogi guaçu', 'sto antonio', 4),
(4, 'Tatiana Cristina', '36585129', '27825528632', 'rua batatais', 158, 'mogi guaçu', 'sto antonio', 6),
(5, 'Lucas Silva', '789654123', '2782552904', 'Av. Brasil', 100, 'Itapira', 'Jardim América', 8),
(6, 'Mariana Costa', '654321987', '2782552905', 'Rua das Flores', 101, 'Itapira', 'Vila Nova', 9),
(7, 'Carlos Souza', '123987456', '2782552906', 'Rua dos Lírios', 102, 'Itapira', 'Centro', 10),
(8, 'Ana Paula', '987456321', '2782552907', 'Rua das Palmeiras', 103, 'Itapira', 'Bela Vista', 11),
(9, 'João Pedro', '321654987', '2782552908', 'Rua das Acácias', 104, 'Itapira', 'Jardim Europa', 12);

-- --------------------------------------------------------

--
-- Table structure for table `professoresorientador`
--

CREATE TABLE `professoresorientador` (
  `idProfessorOrientador` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `curso` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `professoresorientador`
--

INSERT INTO `professoresorientador` (`idProfessorOrientador`, `idUsuario`, `nome`, `curso`) VALUES
(1, 3, 'Jubirildo Junior', 'DSM');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `senha` varchar(80) DEFAULT NULL,
  `tipoUsuario` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `email`, `senha`, `tipoUsuario`) VALUES
(1, 'aluno', '1234', 'aluno'),
(3, 'professor', '1234', 'prof'),
(4, 'aluno2', '1234', 'aluno'),
(6, 'aluno3', '1234', 'aluno'),
(8, 'aluno4', '1234', 'aluno'),
(9, 'aluno5', '1234', 'aluno'),
(10, 'aluno6', '1234', 'aluno'),
(11, 'aluno7', '1234', 'aluno'),
(12, 'aluno8', '1234', 'aluno');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`idComentario`);

--
-- Indexes for table `documentos`
--
ALTER TABLE `documentos`
  ADD PRIMARY KEY (`idDocumento`),
  ADD KEY `idEstagio` (`idEstagio`);

--
-- Indexes for table `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`idEmpresa`);

--
-- Indexes for table `estagios`
--
ALTER TABLE `estagios`
  ADD PRIMARY KEY (`idEstagio`);

--
-- Indexes for table `estudantes`
--
ALTER TABLE `estudantes`
  ADD PRIMARY KEY (`idEstudante`);

--
-- Indexes for table `professoresorientador`
--
ALTER TABLE `professoresorientador`
  ADD PRIMARY KEY (`idProfessorOrientador`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `idComentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `documentos`
--
ALTER TABLE `documentos`
  MODIFY `idDocumento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `empresas`
--
ALTER TABLE `empresas`
  MODIFY `idEmpresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `estagios`
--
ALTER TABLE `estagios`
  MODIFY `idEstagio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `estudantes`
--
ALTER TABLE `estudantes`
  MODIFY `idEstudante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `professoresorientador`
--
ALTER TABLE `professoresorientador`
  MODIFY `idProfessorOrientador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `documentos`
--
ALTER TABLE `documentos`
  ADD CONSTRAINT `documentos_ibfk_1` FOREIGN KEY (`idEstagio`) REFERENCES `estagios` (`idEstagio`);

--
-- Constraints for table `professoresorientador`
--
ALTER TABLE `professoresorientador`
  ADD CONSTRAINT `professoresorientador_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
