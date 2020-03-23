-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 18-Mar-2020 às 17:06
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `kyoto`
--
CREATE DATABASE kyoto;
USE kyoto;
-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_tarefas`
--

CREATE TABLE `tb_tarefas` (
  `id_tarefa` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `titulo` varchar(75) NOT NULL,
  `descricao` text DEFAULT NULL,
  `data_hora` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_tarefas`
--

INSERT INTO `tb_tarefas` (`id_tarefa`, `id_user`, `titulo`, `descricao`, `data_hora`) VALUES
(10, 1, 'Lavar o banheiro', 'Deixar o banheiro bem limpinho', '2020-02-27 10:00:00'),
(11, 1, 'Ir no mercado', 'Comprar algumas coisas', '2020-02-27 11:00:00'),
(12, 1, 'Cozinhar', 'Fazer arroz', '2020-02-27 11:30:00'),
(15, 1, 'Teste', 'Estou sem paciência', '0000-00-00 00:00:00'),
(16, 1, 'TEste2', 'bora ver agora', '0000-00-00 00:00:00'),
(17, 1, 'de novo...', 'Basquete', '0000-00-00 00:00:00'),
(18, 1, 'de novo...', 'Basquete', '0000-00-00 00:00:00'),
(19, 1, 'again and again', 'sdasgasgasg', '0000-00-00 00:00:00'),
(20, 1, 'again and again', 'sdasgasgasg', '0000-00-00 00:00:00'),
(21, 1, 'again and again', 'sdasgasgasg', '0000-00-00 00:00:00'),
(22, 1, 'again and again', 'sdasgasgasg', '0000-00-00 00:00:00'),
(23, 1, 'Reginaldo', 'dfasgagag', '0000-00-00 00:00:00'),
(24, 1, 'Bom dia', 'Vamos fazer mais um teste', '0000-00-00 00:00:00'),
(25, 1, '3AM', 'Mais um teste kkkkkk', '0000-00-00 00:00:00'),
(26, 1, '4AM', 'IT\'S FOUR IN THE MOURNIIIIINNNNG YOU GOT ONE MORE CHANCE TO DIE!!!!', '0000-00-00 00:00:00'),
(27, 1, '4AM', 'IT\'S FOUR IN THE MOURNIIIIINNNNG YOU GOT ONE MORE CHANCE TO DIE!!!!', '0000-00-00 00:00:00'),
(28, 1, '5AM', 'Sair de casa', '0000-00-00 00:00:00'),
(29, 1, '5AM', 'Sair de casa', '0000-00-00 00:00:00'),
(30, 1, '5AM', 'Sair de casa', '0000-00-00 00:00:00'),
(32, 1, 'hgjhgfjhfgfdhg', 'dterterteywsweyutouyuihuhj', '0000-00-00 00:00:00'),
(35, 1, '5a', 'sdfgasgagasg', '0000-00-00 00:00:00'),
(36, 1, '', '', '0000-00-00 00:00:00'),
(37, 1, 'Vamo ver se pega', 'Testando', '0000-00-00 00:00:00'),
(38, 1, 'Vamo ver se pega', 'Testando', '2020-03-23 00:00:00'),
(39, 1, 'Mais um teste, véi', 'Aleatorio, tudo doido', '2021-02-02 21:20:00'),
(40, 1, '', '', '0000-00-00 00:00:00'),
(41, 1, '', '', '0000-00-00 00:00:00'),
(42, 1, '', '', '0000-00-00 00:00:00'),
(43, 1, '', '', '0000-00-00 00:00:00'),
(44, 1, '', '', '0000-00-00 00:00:00'),
(45, 1, '', '', '0000-00-00 00:00:00'),
(46, 1, '', '', '0000-00-00 00:00:00'),
(47, 1, '', '', '0000-00-00 00:00:00'),
(48, 1, '', '', '0000-00-00 00:00:00'),
(49, 1, '', '', '0000-00-00 00:00:00'),
(50, 1, '', '', '0000-00-00 00:00:00'),
(51, 1, 'dsdaDSD', '', '0000-00-00 00:00:00'),
(52, 1, 'Entregar o projeto', 'O mais rápido o possível', '2020-03-16 00:00:00'),
(53, 1, '', '', '0000-00-00 00:00:00'),
(54, 1, 'agora eu resolvo..', 'dsafsfgsa\r\n', '2000-02-26 03:02:00'),
(55, 1, 'qwrwqerrqt', 'fsadf', '2020-12-02 00:00:00'),
(56, 1, 'fwdfsadfadf', '', '2020-03-19 00:00:00'),
(57, 1, 'fwdfsadfadf', '', '2020-03-19 00:00:00'),
(58, 1, 'fwdfsadfadf', '', '2020-03-19 00:00:00'),
(59, 1, 'teste das 22h', 'Agora deu certo porra', '2020-03-19 00:00:00'),
(60, 1, 'Teste 10h', 'Fazendo mais uma bateria de testes', '2020-03-19 10:00:00'),
(61, 1, 'Teste 10h', 'Fazendo mais uma bateria de testes', '2020-03-19 10:00:00'),
(62, 1, 'dfsaffsaf', 'Fazendo mais uma bateria de testes', '2020-03-19 10:00:00'),
(63, 1, 'dfsaffsaf', 'Fazendo mais uma bateria de testes', '2020-03-19 10:00:00'),
(64, 1, 'dfsaffsaf', 'Fazendo mais uma bateria de testes', '2020-03-19 10:00:00'),
(65, 1, 'dfsaffsaf', 'Fazendo mais uma bateria de testes', '2020-03-19 10:00:00'),
(66, 1, 'dfsaffsaf', 'Fazendo mais uma bateria de testes', '2020-03-19 10:00:00'),
(67, 1, 'dfsaffsaf', 'Fazendo mais uma bateria de testes', '2020-03-19 10:00:00'),
(68, 1, 'dfsaffsaf', 'Fazendo mais uma bateria de testes', '2020-03-19 10:00:00'),
(69, 1, 'dfsaffsaf', 'Fazendo mais uma bateria de testes', '2020-03-19 10:00:00'),
(70, 1, 'dfsaffsaf', 'Fazendo mais uma bateria de testes', '2020-03-19 10:00:00'),
(71, 1, 'Titulo1', 'Fazendo mais uma bateria de testes', '2020-10-25 02:00:00'),
(72, 1, 'Titulo1', 'Fazendo mais uma bateria de testes', '2020-10-25 02:00:00'),
(73, 1, 'Titulo1', 'Fazendo mais uma bateria de testes', '2020-10-25 02:00:00'),
(74, 1, 'Titulo1', 'Fazendo mais uma bateria de testes', '2020-10-25 02:00:00'),
(75, 1, 'Aniversário', '', '2020-12-23 10:00:00'),
(76, 1, 'Aniversário', '', '2020-12-23 10:00:00'),
(77, 1, 'Estágio', 'Tentar entregar o que me falta até o dia 23/03', '2020-03-23 08:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuarios`
--

CREATE TABLE `tb_usuarios` (
  `id_user` int(11) NOT NULL,
  `email` varchar(70) NOT NULL,
  `senha` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_usuarios`
--

INSERT INTO `tb_usuarios` (`id_user`, `email`, `senha`) VALUES
(1, 'vinicius.vdes@gmail.com', 'aleatoria1'),
(2, 'ricardo_cavaleiro@teste.com', 'fresco'),
(3, 'kyotoloja@gmail.com', 'aleatoria2');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_tarefas`
--
ALTER TABLE `tb_tarefas`
  ADD PRIMARY KEY (`id_tarefa`),
  ADD KEY `id_user` (`id_user`);

--
-- Índices para tabela `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_tarefas`
--
ALTER TABLE `tb_tarefas`
  MODIFY `id_tarefa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT de tabela `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tb_tarefas`
--
ALTER TABLE `tb_tarefas`
  ADD CONSTRAINT `tb_tarefas_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_usuarios` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
