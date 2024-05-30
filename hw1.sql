-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 30, 2024 alle 22:35
-- Versione del server: 10.4.32-MariaDB
-- Versione PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hw1`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `carrelli`
--

CREATE TABLE `carrelli` (
  `user_id` varchar(255) NOT NULL,
  `prodotto_id` int(11) NOT NULL,
  `quantita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `prodotti`
--

CREATE TABLE `prodotti` (
  `id` int(11) NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `immagine_url` varchar(255) NOT NULL,
  `dettagli_url` varchar(255) NOT NULL,
  `descrizione` varchar(255) NOT NULL,
  `prezzo` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `prodotti`
--

INSERT INTO `prodotti` (`id`, `categoria`, `nome`, `immagine_url`, `dettagli_url`, `descrizione`, `prezzo`) VALUES
(1, 'notebook', 'Latitude 5540', 'Immagini\\Shop\\latitude5540.png', 'latitude5540.php?page=latitude5540', 'descrizione', 1300),
(2, 'notebook', 'Inspiron 16', 'Immagini\\Shop\\inspiron16.png', 'inspiron16.php?page=inspiron16', 'descrizione', 700),
(3, 'desktop', 'Inspiron 27', 'Immagini\\Shop\\inspiron27.png', 'inspiron27.php?page=inspiron27', 'descrizione', 1150),
(4, 'workstation', 'Precision 3360 Tower', 'Immagini\\Shop\\Precision3660.png', 'precision3660.php?page=precision3660', 'descrizione', 1800),
(5, 'server', 'Poweredge T150 tower', 'Immagini\\Shop\\PowerEdge T150.png', 'poweredgeT150.php?page=poweredgeT150', 'descrizione', 1500),
(6, 'monitor', 'Dell 24', 'Immagini\\Shop\\Dell24_ S2425HS.png', 'dell24.php?page=dell24', 'descrizione', 300);

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE `utenti` (
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `carrelli`
--
ALTER TABLE `carrelli`
  ADD PRIMARY KEY (`user_id`,`prodotto_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `prodotto_id` (`prodotto_id`),
  ADD KEY `user_id_2` (`user_id`);

--
-- Indici per le tabelle `prodotti`
--
ALTER TABLE `prodotti`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `prodotti`
--
ALTER TABLE `prodotti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `carrelli`
--
ALTER TABLE `carrelli`
  ADD CONSTRAINT `carrelli_ibfk_1` FOREIGN KEY (`prodotto_id`) REFERENCES `prodotti` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `carrelli_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `utenti` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
