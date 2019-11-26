-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 26-Nov-2019 às 15:14
-- Versão do servidor: 10.1.35-MariaDB
-- versão do PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbo_printer`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_empresa`
--

CREATE TABLE `tab_empresa` (
  `id_empresa` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nome_empresa` varchar(100) NOT NULL,
  `endereco_empresa` varchar(200) NOT NULL,
  `cep_empresa` int(11) NOT NULL,
  `telefone_empresa` varchar(20) NOT NULL,
  `descricao_empresa` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tab_empresa`
--

INSERT INTO `tab_empresa` (`id_empresa`, `id_usuario`, `nome_empresa`, `endereco_empresa`, `cep_empresa`, `telefone_empresa`, `descricao_empresa`) VALUES
(1, 1, 'NeuroCentro', 'Olavo Bilac', 65899633, '00000000', 'Centro de saude e diagnostico completo'),
(2, 1, 'teste', 'rua teste', 0, '0000000', 'Nada, só teste');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_faturamento`
--

CREATE TABLE `tab_faturamento` (
  `id_faturamento` int(11) NOT NULL,
  `id_impressora` int(11) NOT NULL,
  `data_faturamento` date NOT NULL,
  `status_faturamento` varchar(10) NOT NULL DEFAULT 'aberto',
  `pagina_faturamento` int(11) NOT NULL,
  `pagina_amais` int(11) NOT NULL,
  `valor_total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_impressora`
--

CREATE TABLE `tab_impressora` (
  `id_impressora` int(11) NOT NULL,
  `numero_serie` varchar(100) NOT NULL DEFAULT 'sem_serie',
  `modelo_impressora` varchar(100) NOT NULL DEFAULT 'sem_modelo',
  `marca_impressora` varchar(100) NOT NULL DEFAULT 'sem_marca',
  `tombo_impressora` int(11) NOT NULL,
  `status_impressora` varchar(50) NOT NULL DEFAULT 'sem_uso',
  `id_setor` int(11) NOT NULL,
  `regra_impressora` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tab_impressora`
--

INSERT INTO `tab_impressora` (`id_impressora`, `numero_serie`, `modelo_impressora`, `marca_impressora`, `tombo_impressora`, `status_impressora`, `id_setor`, `regra_impressora`) VALUES
(1, 'sem_serie', 'HP Pro 225', 'sem_marca', 1212, 'sem_uso', 1, 1.5),
(2, 'sem_serie', 'SP377 Pro', 'Ricoh', 101, 'sem_uso', 1, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_predio`
--

CREATE TABLE `tab_predio` (
  `id_predio` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `nome_predio` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tab_predio`
--

INSERT INTO `tab_predio` (`id_predio`, `id_empresa`, `nome_predio`) VALUES
(1, 1, 'Luma'),
(2, 1, 'Principal');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_setor`
--

CREATE TABLE `tab_setor` (
  `id_setor` int(11) NOT NULL,
  `id_predio` int(11) NOT NULL,
  `nome_setor` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tab_setor`
--

INSERT INTO `tab_setor` (`id_setor`, `id_predio`, `nome_setor`) VALUES
(1, 1, 'Recepcao');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_usuario`
--

CREATE TABLE `tab_usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome_usuario` varchar(15) NOT NULL,
  `senha_usuario` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tab_usuario`
--

INSERT INTO `tab_usuario` (`id_usuario`, `nome_usuario`, `senha_usuario`) VALUES
(1, 'jardesson', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tab_empresa`
--
ALTER TABLE `tab_empresa`
  ADD PRIMARY KEY (`id_empresa`);

--
-- Indexes for table `tab_faturamento`
--
ALTER TABLE `tab_faturamento`
  ADD PRIMARY KEY (`id_faturamento`),
  ADD KEY `fk_impre` (`id_impressora`);

--
-- Indexes for table `tab_impressora`
--
ALTER TABLE `tab_impressora`
  ADD PRIMARY KEY (`id_impressora`),
  ADD KEY `fk_set` (`id_setor`);

--
-- Indexes for table `tab_predio`
--
ALTER TABLE `tab_predio`
  ADD PRIMARY KEY (`id_predio`),
  ADD KEY `fk_emp` (`id_empresa`);

--
-- Indexes for table `tab_setor`
--
ALTER TABLE `tab_setor`
  ADD PRIMARY KEY (`id_setor`),
  ADD KEY `fk_pred` (`id_predio`);

--
-- Indexes for table `tab_usuario`
--
ALTER TABLE `tab_usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tab_empresa`
--
ALTER TABLE `tab_empresa`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tab_faturamento`
--
ALTER TABLE `tab_faturamento`
  MODIFY `id_faturamento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tab_impressora`
--
ALTER TABLE `tab_impressora`
  MODIFY `id_impressora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tab_predio`
--
ALTER TABLE `tab_predio`
  MODIFY `id_predio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tab_setor`
--
ALTER TABLE `tab_setor`
  MODIFY `id_setor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tab_usuario`
--
ALTER TABLE `tab_usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tab_faturamento`
--
ALTER TABLE `tab_faturamento`
  ADD CONSTRAINT `fk_impre` FOREIGN KEY (`id_impressora`) REFERENCES `tab_impressora` (`id_impressora`);

--
-- Limitadores para a tabela `tab_impressora`
--
ALTER TABLE `tab_impressora`
  ADD CONSTRAINT `fk_set` FOREIGN KEY (`id_setor`) REFERENCES `tab_setor` (`id_setor`);

--
-- Limitadores para a tabela `tab_predio`
--
ALTER TABLE `tab_predio`
  ADD CONSTRAINT `fk_emp` FOREIGN KEY (`id_empresa`) REFERENCES `tab_empresa` (`id_empresa`);

--
-- Limitadores para a tabela `tab_setor`
--
ALTER TABLE `tab_setor`
  ADD CONSTRAINT `fk_pred` FOREIGN KEY (`id_predio`) REFERENCES `tab_predio` (`id_predio`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
