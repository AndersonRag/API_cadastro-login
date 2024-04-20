-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20-Abr-2024 às 19:45
-- Versão do servidor: 10.4.28-MariaDB
-- versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `aluga_facil`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastro`
--

CREATE TABLE `cadastro` (
  `id_cadastro` int(11) NOT NULL,
  `nome` varchar(20) DEFAULT NULL,
  `sobrenome` varchar(50) DEFAULT NULL,
  `idade` varchar(4) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `senha` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `cadastro`
--

INSERT INTO `cadastro` (`id_cadastro`, `nome`, `sobrenome`, `idade`, `email`, `senha`) VALUES
(1, 'Ivo', 'Ribeiro', '23', 'ivo.ribeiro@gmail.com', 'PHP123'),
(2, 'Anderson', 'ramos', '29', '288082020@eniac.edu.br', '12344'),
(9, 'eniac', 'grupo', '2023', 'eniac@gmail.com', '1234'),
(10, 'anderson ', 'ramos', '1994', 'anderson@gmail.com', '8745');

-- --------------------------------------------------------

--
-- Estrutura da tabela `carrinho`
--

CREATE TABLE `carrinho` (
  `id_carrinho` int(11) NOT NULL,
  `id_produto` int(11) DEFAULT NULL,
  `subtotal` float DEFAULT NULL,
  `total_itens` int(11) DEFAULT NULL,
  `total` float DEFAULT NULL,
  `endereco` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `carrinho`
--

INSERT INTO `carrinho` (`id_carrinho`, `id_produto`, `subtotal`, `total_itens`, `total`, `endereco`) VALUES
(1, 1, 100, 1, 100, '4002 Av. Rito Cadillaco, São Paulo - Guarulhos');

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

CREATE TABLE `login` (
  `codigologin` int(11) NOT NULL,
  `login` varchar(50) DEFAULT NULL,
  `senha` varchar(20) DEFAULT NULL,
  `perfil` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`codigologin`, `login`, `senha`, `perfil`) VALUES
(1, 'ivoadm', 'adm123', 'adm'),
(2, 'andersonsec', 'sec123', 'secretaria');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamentos`
--

CREATE TABLE `pagamentos` (
  `id_pagamento` int(11) NOT NULL,
  `debito` int(1) DEFAULT NULL,
  `credito` int(1) DEFAULT NULL,
  `pix` int(11) DEFAULT NULL,
  `numero_cartao` int(11) DEFAULT NULL,
  `codigo` int(11) DEFAULT NULL,
  `vencimento` date DEFAULT NULL,
  `id_carrinho` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `pagamentos`
--

INSERT INTO `pagamentos` (`id_pagamento`, `debito`, `credito`, `pix`, `numero_cartao`, `codigo`, `vencimento`, `id_carrinho`) VALUES
(1, 1, NULL, NULL, 123456789, 457, '2023-09-12', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id_produto` int(11) NOT NULL,
  `postagem` date DEFAULT NULL,
  `itens` varchar(30) DEFAULT NULL,
  `descricao` longtext DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `preco` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id_produto`, `postagem`, `itens`, `descricao`, `quantidade`, `preco`) VALUES
(1, '2023-09-10', 'Bicicleta', 'Bicicleta usada para período de final de ano', 1, 100),
(6, '2023-09-11', 'Controle de PS4', 'Alugo controle de PS4 por 3 meses ', 1, 30),
(7, '2023-09-12', 'Vestido de noiva', 'Alugo vestido de noiva para casamentos ou festa', 1, 150),
(8, '2023-09-13', 'Alugo Canoa', 'Alugo canoa para praia ou agua doce e bom estado', 2, 200),
(9, '2023-09-14', 'Alugo Jet ski', 'Alugo Jet ski para passeio em alto mar. a pessoa que alugar precisa estar habilitada.', 1, 500),
(10, '2023-09-15', 'Aluguel de Pula Pula', 'Alugo pula pula para festa ou evento por 2 horas e 48 horas.', 1, 80);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cadastro`
--
ALTER TABLE `cadastro`
  ADD PRIMARY KEY (`id_cadastro`);

--
-- Índices para tabela `carrinho`
--
ALTER TABLE `carrinho`
  ADD PRIMARY KEY (`id_carrinho`),
  ADD KEY `FK_carrinho_produto` (`id_produto`);

--
-- Índices para tabela `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`codigologin`);

--
-- Índices para tabela `pagamentos`
--
ALTER TABLE `pagamentos`
  ADD PRIMARY KEY (`id_pagamento`),
  ADD KEY `FK_pagamentos_carrinho` (`id_carrinho`);

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id_produto`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cadastro`
--
ALTER TABLE `cadastro`
  MODIFY `id_cadastro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `carrinho`
--
ALTER TABLE `carrinho`
  MODIFY `id_carrinho` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `login`
--
ALTER TABLE `login`
  MODIFY `codigologin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `pagamentos`
--
ALTER TABLE `pagamentos`
  MODIFY `id_pagamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `carrinho`
--
ALTER TABLE `carrinho`
  ADD CONSTRAINT `FK_carrinho_produto` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id_produto`);

--
-- Limitadores para a tabela `pagamentos`
--
ALTER TABLE `pagamentos`
  ADD CONSTRAINT `FK_pagamentos_carrinho` FOREIGN KEY (`id_carrinho`) REFERENCES `carrinho` (`id_carrinho`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
