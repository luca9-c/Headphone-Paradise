-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Gen 31, 2022 alle 19:08
-- Versione del server: 10.4.14-MariaDB
-- Versione PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `es_saw`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `headphone`
--

CREATE TABLE `headphone` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `immagine` varchar(20) NOT NULL,
  `prezzo` decimal(12,2) NOT NULL,
  `disponibilita` int(11) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `produttore` varchar(50) NOT NULL,
  `modello` varchar(50) NOT NULL,
  `dimensioni` varchar(50) NOT NULL,
  `anno` year(4) NOT NULL,
  `microfono` tinyint(1) NOT NULL,
  `connettori` varchar(25) NOT NULL,
  `peso` decimal(6,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `headphone`
--

INSERT INTO `headphone` (`id`, `nome`, `immagine`, `prezzo`, `disponibilita`, `marca`, `produttore`, `modello`, `dimensioni`, `anno`, `microfono`, `connettori`, `peso`) VALUES
(1, 'Sony MDR-ZX110AP, Nero ', 'pr1.jpg', '19.99', 10, 'Sony ', 'Sony ', 'MDRZX110APB.CE7 ', '5 x 5 x 5 cm', 2014, 1, 'Cablato', '120.0'),
(2, 'JBL Tune500BT, Nero ', 'pr2.jpg', '29.99', 10, 'JBL', 'Harman', '‎JBLT500BTBLK ', '22.4 x 5 x 20.5 cm', 2018, 1, 'Cablato', '155.0'),
(3, 'Razer Kraken X, Nero', 'pr3.jpg', '59.99', 10, 'Razer', 'Razer Inc.', 'RZ04-02890100-R3M1 ', '16 x 21 x 8.8 cm', 2019, 1, 'Sconosciuto', '265.0'),
(4, 'Bose Noise Cancelling Headphones 700, Argento ', 'pr4.jpg', '399.99', 10, 'Bose', 'Bose', '‎794297-0300 ', '5.08 x 16.51 x 20.32 cm', 2019, 1, 'Senza fili', '249.0'),
(5, 'Srhythm NC25 ANC, Verde', 'pr5.jpg', '59.99', 10, '‎Srhythm', '‎Srhythm', '‎NC25', '‎22.6 x 15.5 x 5.65 cm', 2019, 1, 'Senza fili', '180.0'),
(6, 'Sony Wh-Ch710N, Nero', 'pr6.jpg', '68.99', 10, 'Sony', 'Sony', 'WHCH710NB.CE7', '‎23.1 x 22.2 x 6.7 cm', 2020, 1, 'Cablato, senza fili', '223.0'),
(7, 'Philips Over Ear PH805BK/00, Nero', 'pr7.jpg', '179.99', 10, '‎PHILIPS AUDIO ', 'Philips', 'TAPH805BK/00', '7 x 19 x 11 cm', 2019, 1, 'Senza fili', '40.0'),
(8, 'Soundcore Anker Life Q20+, Nero', 'pr8.jpg', '69.99', 10, 'Soundcore', 'Anker', '‎A3045011', '16.8 x 22.3 x 8 cm', 2019, 1, 'Senza fili', '281.0'),
(9, 'KVIDIO Cuffie Wireless, Nero', 'pr9.jpg', '26.99', 10, 'KVIDIO ', 'KVIDIO ', '‎WH201A ', '16.3 x 9.2 x 13.3 cm', 2021, 1, 'Cablato, Senza fili', '205.0'),
(10, 'Infurture Noise Cancelling, Nero', 'pr10.jpg', '39.99', 10, 'INFURTURE', 'WERPOWER', 'BN601A', '16 x 7.62 x 19.3 cm', 2021, 1, 'Senza fili', '320.0'),
(11, 'Sony MDR-RF895RK', 'pr11.jpg', '73.99', 10, 'Sony', 'Sony', 'MDRRF895RK.EU8', '31 x 25 x 20 cm', 2017, 0, 'Cablato', '275.0'),
(12, 'Sennheiser HD 350BT, Nero', 'pr12.jpg', '99.99', 10, 'Sennheiser', 'Sennheiser', 'HD 350Bt', '18 x 18 x 10 cm', 2020, 1, '‎Senza fili ', '238.0'),
(13, 'Logitech G435, Nero', 'pr13.jpg', '59.99', 10, 'Logitech G ', 'Logitech G ', '981-001050', '16.3 x 8.1 x 17 cm', 2021, 1, 'Senza fili ', '379.0'),
(14, 'BINNUNE', 'pr14.jpg', '44.99', 10, 'BINNUNE ', 'BINNUNE ', 'BW02-PRO', '20.2 x 19.2 x 10.7 cm', 2021, 1, 'Sconosciuto', '420.0'),
(15, 'Panasonic RP-HT090, Grigio/Silver', 'pr15.jpg', '17.99', 10, '‎Panasonic', 'Panasonic Italia', 'RP-HT090E-H', 'Sconosciuto', 2008, 1, 'Cablato ', '99.8'),
(16, 'DOQAUS C1', 'pr16.jpg', '44.99', 10, '‎DOQAUS ', 'DOQAUS ', 'DQBH001AB', '19.1 x 17.2 x 9.1 cm', 2021, 1, 'Senza fili ', '254.0'),
(17, 'JIUHUFH Bluetooth 5.0, Nero', 'pr17.jpg', '23.99', 10, 'JIUHUFH', 'JIUHUFH', 'B07KQ6TR7T', '17.5 x 7.7 x 17 cm', 2018, 1, 'Senza fili', '194.0'),
(18, 'Philips SHP2500, Grigio ', 'pr18.jpg', '24.99', 10, 'PHILIPS ', 'Philips Audio Italy ', 'SHP2500/37', '19 x 17.5 x 9.5 cm', 2011, 0, 'Cablato', '298.0'),
(19, 'CSOOPAR, Nero', 'pr19.jpg', '21.99', 10, 'CSOOPAR ', 'CSOOPAR ', 'WH201A ', '16.2 x 13.3 x 9.2 cm', 2021, 1, 'Cablato, Senza fili ', '300.0'),
(20, 'Sennheiser HD 300', 'pr20.jpg', '41.99', 10, 'Sennheiser', 'Sennheiser', '508597 ', '14 x 1.5 x 0.03 cm', 2019, 0, 'Cablato ', '182.0'),
(21, 'Thomson, Nero ', 'pr21.jpg', '20.00', 10, 'Thomson ', 'Thomson ', '00132469 ', '23 x 16.2 x 9.2 cm', 2016, 1, 'Cablato', '240.0'),
(22, 'Cuffie Wireless ANC', 'pr22.jpg', '56.99', 10, 'FAKEME ', 'FAKEME ', 'FM-BH085 ', '15.3 x 10.1 x 15.3 cm', 2021, 1, 'Senza fili ', '350.0'),
(23, 'Trust Cuffie Gaming GXT 307, Nero/Rosso ', 'pr23.jpg', '19.99', 10, 'Trust Gaming ', 'Trust', '22450 ', '10 x 23 x 21 cm', 2018, 1, 'Cablato ', '289.0'),
(24, 'Apple AirPods Max, Grigio siderale', 'pr24.jpg', '629.00', 10, 'Apple', 'Apple', 'Sconosciuto', '24 x 24.3 x 8 cm', 2020, 0, 'Senza fili', '384.8'),
(25, '8S Cuffie Bluetooth, Grigio', 'pr25.jpg', '25.99', 10, 'Prtukyt', 'Gold Shelf ', '8s Cuffie Bluetooth Over Ear', '15.3 x 15.2 x 8.3 cm', 2021, 1, 'Senza fili ', '218.0'),
(26, 'Superlux HD-681', 'pr26.jpg', '37.98', 10, 'P&R Howard', 'P&R Howard', 'HD681', '10.7 x 18.7 x 20 cm', 2012, 0, 'Cablato', '276.0'),
(27, 'Philips Fidelio, Nero', 'pr27.jpg', '137.00', 10, 'PHILIPS ', 'Philips Audio Italy', 'X2HR/00 ', '12 x 24 x 32 cm', 2017, 0, 'Cablato', '379.0'),
(28, 'RUNOLIM, Nero', 'pr28.jpg', '25.99', 10, 'RUNOLIM', 'RUNOLIM', 'RM-201 ', '16.3 x 13.3 x 9.2 cm', 2021, 1, 'Senza fili ', '310.0'),
(29, 'LOBKIN, Blu', 'pr29.jpg', '19.99', 10, 'LOBKIN ', 'LOBKIN ', '580 ', '15.9 x 13.4 x 8.7 cm', 2017, 1, 'Cablato', '310.0'),
(30, 'Sony Wh-Xb900N, Nero', 'pr30.jpg', '149.99', 10, 'Sony ', 'Sony ', 'WHXB900NB.CE7 ', '26 x 22 x 8 cm', 2019, 1, 'Cablato, Senza fili ', '254.0');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `headphone`
--
ALTER TABLE `headphone`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `headphone`
--
ALTER TABLE `headphone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
