-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 18. Mai 2022 um 13:00
-- Server-Version: 10.4.20-MariaDB
-- PHP-Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+01:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `ticket_db`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `abteilung`
--

CREATE TABLE `abteilung` (
  `AbteilungsID` int(11) NOT NULL,
  `Abteilung` varchar(30) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Daten für Tabelle `abteilung`
--

INSERT INTO `abteilung` (`AbteilungsID`, `Abteilung`) VALUES
(1, 'IT'),
(2, 'Personal'),
(3, 'Produktion'),
(4, 'Marketing'),
(5, 'Sicherheit'),
(6, 'Einkauf'),
(7, 'Lager');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `benutzer`
--

CREATE TABLE `benutzer` (
  `BenutzerID` int(11) NOT NULL,
  `Benutzername` varchar(50) COLLATE utf8_bin NOT NULL,
  `Name` varchar(25) COLLATE utf8_bin NOT NULL,
  `Vorname` varchar(25) COLLATE utf8_bin NOT NULL,
  `Passwort` varchar(100) COLLATE utf8_bin NOT NULL,
  `EMail` varchar(75) COLLATE utf8_bin NOT NULL,
  `AbteilungsID` int(11) NOT NULL,
  `GruppenID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Daten für Tabelle `benutzer`
--

INSERT INTO `benutzer` (`BenutzerID`, `Benutzername`, `Name`, `Vorname`, `Passwort`, `EMail`, `AbteilungsID`, `GruppenID`) VALUES
(0, 'nassigned', 'Assigned', 'Not', 'RahvgcuMwSr46iL', '', 1, 1),
(1, 'dweigand', 'Weigand', 'Dominik', 'RahvgcuMwSr46iL', 'dominik.weigand@ticketsystem.de', 1, 3);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `benutzergruppen`
--

CREATE TABLE `benutzergruppen` (
  `GruppenID` int(11) NOT NULL,
  `Gruppe` varchar(15) COLLATE utf8_bin NOT NULL,
  `Gruppenbeschreibung` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Daten für Tabelle `benutzergruppen`
--

INSERT INTO `benutzergruppen` (`GruppenID`, `Gruppe`, `Gruppenbeschreibung`) VALUES
(1, 'User', ''),
(2, 'Techniker', ''),
(3, 'Administratoren', '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kategorie`
--

CREATE TABLE `kategorie` (
  `KategorieID` int(11) NOT NULL,
  `Kategorie` varchar(25) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Daten für Tabelle `kategorie`
--

INSERT INTO `kategorie` (`KategorieID`, `Kategorie`) VALUES
(1, 'Software'),
(2, 'Hardware'),
(3, 'Netzwerk');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `priorität`
--

CREATE TABLE `priorität` (
  `PrioID` int(11) NOT NULL,
  `Prio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Daten für Tabelle `priorität`
--

INSERT INTO `priorität` (`PrioID`, `Prio`) VALUES
(1, 1),
(2, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `status`
--

CREATE TABLE `status` (
  `StatusID` int(11) NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Daten für Tabelle `status`
--

INSERT INTO `status` (`StatusID`, `Status`) VALUES
(1, 1),
(2, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tickets`
--

CREATE TABLE `tickets` (
  `TicketID` int(11) NOT NULL,
  `ersteller` varchar(50) COLLATE utf8_bin NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Titel` varchar(50) COLLATE utf8_bin NOT NULL,
  `Text` text COLLATE utf8_bin NOT NULL,
  `BenutzerID` int(11) NOT NULL,
  `PrioID` int(11) NOT NULL,
  `KategorieID` int(11) NOT NULL,
  `StatusID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `vermerk`
--

CREATE TABLE `vermerk` (
  `VermerkID` int(11) NOT NULL,
  `Vermerk` text COLLATE utf8_bin NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

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
  ADD UNIQUE KEY `Benutzername` (`Benutzername`),
  ADD KEY `GruppenID` (`GruppenID`),
  ADD KEY `AbteilungsID` (`AbteilungsID`,`GruppenID`) USING BTREE;

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
  ADD KEY `PrioID` (`PrioID`),
  ADD KEY `KategorieID` (`KategorieID`),
  ADD KEY `BenutzerID` (`BenutzerID`,`PrioID`,`KategorieID`) USING BTREE,
  ADD KEY `StatusID` (`StatusID`) USING BTREE;

--
-- Indizes für die Tabelle `vermerk`
--
ALTER TABLE `vermerk`
  ADD PRIMARY KEY (`VermerkID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `abteilung`
--
ALTER TABLE `abteilung`
  MODIFY `AbteilungsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT für Tabelle `benutzer`
--
ALTER TABLE `benutzer`
  MODIFY `BenutzerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `benutzergruppen`
--
ALTER TABLE `benutzergruppen`
  MODIFY `GruppenID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `kategorie`
--
ALTER TABLE `kategorie`
  MODIFY `KategorieID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `priorität`
--
ALTER TABLE `priorität`
  MODIFY `PrioID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `status`
--
ALTER TABLE `status`
  MODIFY `StatusID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `tickets`
--
ALTER TABLE `tickets`
  MODIFY `TicketID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `vermerk`
--
ALTER TABLE `vermerk`
  MODIFY `VermerkID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `benutzer`
--
ALTER TABLE `benutzer`
  ADD CONSTRAINT `benutzer_ibfk_2` FOREIGN KEY (`AbteilungsID`) REFERENCES `abteilung` (`AbteilungsID`),
  ADD CONSTRAINT `benutzer_ibfk_3` FOREIGN KEY (`GruppenID`) REFERENCES `benutzergruppen` (`GruppenID`);

--
-- Constraints der Tabelle `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_ibfk_6` FOREIGN KEY (`BenutzerID`) REFERENCES `benutzer` (`BenutzerID`),
  ADD CONSTRAINT `tickets_ibfk_7` FOREIGN KEY (`KategorieID`) REFERENCES `kategorie` (`KategorieID`),
  ADD CONSTRAINT `tickets_ibfk_8` FOREIGN KEY (`PrioID`) REFERENCES `priorität` (`PrioID`),
  ADD CONSTRAINT `tickets_ibfk_9` FOREIGN KEY (`StatusID`) REFERENCES `status` (`StatusID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
