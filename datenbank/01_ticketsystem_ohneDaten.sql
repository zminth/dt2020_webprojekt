-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 05. Mai 2022 um 09:26
-- Server-Version: 10.4.22-MariaDB
-- PHP-Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `ticketsystem`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `abteilung`
--

CREATE TABLE `abteilung` (
  `AbteilungsID` int(11) NOT NULL,
  `Abteilung` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `benutzer`
--

CREATE TABLE `benutzer` (
  `Name` varchar(25) NOT NULL,
  `Vorname` varchar(25) NOT NULL,
  `AbteilungsID` int(11) NOT NULL,
  `BenutzerID` int(11) NOT NULL,
  `Benutzername` varchar(50) NOT NULL,
  `Passwort` varchar(100) NOT NULL,
  `GruppenID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `benutzergruppen`
--

CREATE TABLE `benutzergruppen` (
  `GruppenID` int(11) NOT NULL,
  `Gruppe` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kategorie`
--

CREATE TABLE `kategorie` (
  `KategorieID` int(11) NOT NULL,
  `Kategorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `priorität`
--

CREATE TABLE `priorität` (
  `PrioID` int(11) NOT NULL,
  `Prio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `status`
--

CREATE TABLE `status` (
  `StatusID` int(11) NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tickets`
--

CREATE TABLE `tickets` (
  `TicketID` int(11) NOT NULL,
  `Titel` varchar(50) NOT NULL,
  `Text` text NOT NULL,
  `BenutzerID` int(11) NOT NULL,
  `PrioID` int(11) NOT NULL,
  `KategorieID` int(11) NOT NULL,
  `VermerkID` int(11) NOT NULL,
  `StatusID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `vermerk`
--

CREATE TABLE `vermerk` (
  `VermerkID` int(11) NOT NULL,
  `Vermerk` text NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `abteilung`
--
ALTER TABLE `abteilung`
  ADD PRIMARY KEY (`AbteilungsID`);

--
-- Indizes für die Tabelle `benutzer`
--
ALTER TABLE `benutzer`
  ADD PRIMARY KEY (`BenutzerID`),
  ADD UNIQUE KEY `AbteilungsID` (`AbteilungsID`,`GruppenID`),
  ADD KEY `GruppenID` (`GruppenID`);

--
-- Indizes für die Tabelle `benutzergruppen`
--
ALTER TABLE `benutzergruppen`
  ADD PRIMARY KEY (`GruppenID`);

--
-- Indizes für die Tabelle `kategorie`
--
ALTER TABLE `kategorie`
  ADD PRIMARY KEY (`KategorieID`);

--
-- Indizes für die Tabelle `priorität`
--
ALTER TABLE `priorität`
  ADD PRIMARY KEY (`PrioID`);

--
-- Indizes für die Tabelle `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`StatusID`);

--
-- Indizes für die Tabelle `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`TicketID`),
  ADD UNIQUE KEY `BenutzerID` (`BenutzerID`,`PrioID`,`KategorieID`,`VermerkID`),
  ADD UNIQUE KEY `StatusID` (`StatusID`),
  ADD KEY `PrioID` (`PrioID`),
  ADD KEY `VermerkID` (`VermerkID`),
  ADD KEY `KategorieID` (`KategorieID`);

--
-- Indizes für die Tabelle `vermerk`
--
ALTER TABLE `vermerk`
  ADD PRIMARY KEY (`VermerkID`);

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `benutzer`
--
ALTER TABLE `benutzer`
  ADD CONSTRAINT `benutzer_ibfk_1` FOREIGN KEY (`GruppenID`) REFERENCES `benutzergruppen` (`GruppenID`),
  ADD CONSTRAINT `benutzer_ibfk_2` FOREIGN KEY (`AbteilungsID`) REFERENCES `abteilung` (`AbteilungsID`);

--
-- Constraints der Tabelle `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`PrioID`) REFERENCES `priorität` (`PrioID`),
  ADD CONSTRAINT `tickets_ibfk_2` FOREIGN KEY (`VermerkID`) REFERENCES `vermerk` (`VermerkID`),
  ADD CONSTRAINT `tickets_ibfk_3` FOREIGN KEY (`BenutzerID`) REFERENCES `benutzer` (`BenutzerID`),
  ADD CONSTRAINT `tickets_ibfk_4` FOREIGN KEY (`KategorieID`) REFERENCES `kategorie` (`KategorieID`),
  ADD CONSTRAINT `tickets_ibfk_5` FOREIGN KEY (`StatusID`) REFERENCES `status` (`StatusID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
