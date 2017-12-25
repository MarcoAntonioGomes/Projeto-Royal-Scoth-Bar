-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 07-Dez-2017 às 20:58
-- Versão do servidor: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb2`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `idCliente` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `rg` varchar(11) DEFAULT NULL,
  `endereco` varchar(120) DEFAULT NULL,
  `complemento` varchar(60) DEFAULT NULL,
  `cidade` varchar(60) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `cep` varchar(9) DEFAULT NULL,
  `telefone` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `forma_pagamento`
--

CREATE TABLE `forma_pagamento` (
  `idForma_Pagamento` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `forma_pagamento`
--

INSERT INTO `forma_pagamento` (`idForma_Pagamento`, `nome`) VALUES
(1, 'Cartao Credito'),
(2, 'Cartao Debito'),
(3, 'A vista'),
(4, 'A ver');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor`
--

CREATE TABLE `fornecedor` (
  `idFornecedor` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `cnpj` varchar(18) NOT NULL,
  `endereco` varchar(120) DEFAULT NULL,
  `cidade` varchar(60) DEFAULT NULL,
  `estado` varchar(60) DEFAULT NULL,
  `complemento` varchar(60) DEFAULT NULL,
  `cep` varchar(9) DEFAULT NULL,
  `telefone` varchar(16) DEFAULT NULL,
  `idForma_Pagamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `idFuncionario` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `rg` varchar(11) DEFAULT NULL,
  `telefone` varchar(16) DEFAULT NULL,
  `endereco` varchar(120) DEFAULT NULL,
  `complemento` varchar(60) DEFAULT NULL,
  `cidade` varchar(60) DEFAULT NULL,
  `estado` varchar(60) DEFAULT NULL,
  `cep` varchar(9) DEFAULT NULL,
  `salario` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`idFuncionario`, `nome`, `usuario`, `senha`, `cpf`, `rg`, `telefone`, `endereco`, `complemento`, `cidade`, `estado`, `cep`, `salario`) VALUES
(1, 'admin', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', '111.111.111-11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `planocontas_capa`
--

CREATE TABLE `planocontas_capa` (
  `idPlanoContas_Capa` int(11) NOT NULL,
  `data` date DEFAULT NULL,
  `entrada` char(1) NOT NULL,
  `idForma_Pagamento` int(11) NOT NULL,
  `idFornecedor` int(11) NOT NULL,
  `situacao` char(1) DEFAULT NULL,
  `valor_total` float DEFAULT NULL,
  `observacao` varchar(500) NOT NULL,
  `titulo` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `planocontas_itens`
--

CREATE TABLE `planocontas_itens` (
  `idPlanoContas_Itens` int(11) NOT NULL,
  `idPlanoContas_Capa` int(11) NOT NULL,
  `idProduto` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `idProduto` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `preco_custo` float NOT NULL,
  `margem` float NOT NULL,
  `preco_final` float NOT NULL,
  `quantidade` int(11) NOT NULL,
  `codigo_barras` varchar(45) DEFAULT NULL,
  `observacao` varchar(100) DEFAULT NULL,
  `idFornecedor` int(11) NOT NULL,
  `idForma_Pagamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda_capa`
--

CREATE TABLE `venda_capa` (
  `idVenda_Capa` int(11) NOT NULL,
  `data` date NOT NULL,
  `idForma_Pagamento` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `valor_total` float DEFAULT NULL,
  `status` char(1) NOT NULL,
  `pre_venda` char(1) NOT NULL,
  `comanda` varchar(15) DEFAULT NULL,
  `idFuncionario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda_itens`
--

CREATE TABLE `venda_itens` (
  `idVenda_Itens` int(11) NOT NULL,
  `idVenda_Capa` int(11) NOT NULL,
  `idProduto` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`);

--
-- Indexes for table `forma_pagamento`
--
ALTER TABLE `forma_pagamento`
  ADD PRIMARY KEY (`idForma_Pagamento`);

--
-- Indexes for table `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD PRIMARY KEY (`idFornecedor`,`idForma_Pagamento`),
  ADD KEY `fk_Fornecedor_Forma_Pagamento1_idx` (`idForma_Pagamento`);

--
-- Indexes for table `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`idFuncionario`);

--
-- Indexes for table `planocontas_capa`
--
ALTER TABLE `planocontas_capa`
  ADD PRIMARY KEY (`idPlanoContas_Capa`,`idForma_Pagamento`,`idFornecedor`),
  ADD KEY `fk_PlanoContas_Capa_Forma_Pagamento1_idx` (`idForma_Pagamento`),
  ADD KEY `fk_PlanoContas_Capa_Entrada_Fornecedor1_idx` (`idFornecedor`);

--
-- Indexes for table `planocontas_itens`
--
ALTER TABLE `planocontas_itens`
  ADD PRIMARY KEY (`idPlanoContas_Itens`,`idPlanoContas_Capa`,`idProduto`),
  ADD KEY `fk_PlanoContas_Itens_PlanoContas_Capa1_idx` (`idPlanoContas_Capa`),
  ADD KEY `fk_PlanoContas_Itens_Produto1_idx` (`idProduto`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`idProduto`,`idFornecedor`,`idForma_Pagamento`),
  ADD KEY `fk_Produto_Fornecedor1_idx` (`idFornecedor`,`idForma_Pagamento`);

--
-- Indexes for table `venda_capa`
--
ALTER TABLE `venda_capa`
  ADD PRIMARY KEY (`idVenda_Capa`,`idForma_Pagamento`,`idCliente`,`idFuncionario`),
  ADD KEY `fk_Venda_Capa_Forma_Pagamento1_idx` (`idForma_Pagamento`),
  ADD KEY `fk_Venda_Capa_Cliente1_idx` (`idCliente`),
  ADD KEY `fk_Venda_Capa_Funcionario1_idx` (`idFuncionario`);

--
-- Indexes for table `venda_itens`
--
ALTER TABLE `venda_itens`
  ADD PRIMARY KEY (`idVenda_Itens`,`idVenda_Capa`,`idProduto`),
  ADD KEY `fk_Venda_Itens_Venda_Capa1_idx` (`idVenda_Capa`),
  ADD KEY `fk_Venda_Itens_Produto1_idx` (`idProduto`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `forma_pagamento`
--
ALTER TABLE `forma_pagamento`
  MODIFY `idForma_Pagamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `fornecedor`
--
ALTER TABLE `fornecedor`
  MODIFY `idFornecedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `idFuncionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `planocontas_capa`
--
ALTER TABLE `planocontas_capa`
  MODIFY `idPlanoContas_Capa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `planocontas_itens`
--
ALTER TABLE `planocontas_itens`
  MODIFY `idPlanoContas_Itens` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `idProduto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `venda_capa`
--
ALTER TABLE `venda_capa`
  MODIFY `idVenda_Capa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `venda_itens`
--
ALTER TABLE `venda_itens`
  MODIFY `idVenda_Itens` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
