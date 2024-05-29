-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 29 mai 2024 à 12:50
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `islamda`
--

-- --------------------------------------------------------

--
-- Structure de la table `beach`
--

CREATE TABLE `beach` (
  `PlaceID` int(11) NOT NULL,
  `Category` varchar(21) DEFAULT NULL,
  `SandType` varchar(10) DEFAULT NULL,
  `WaterType` varchar(20) DEFAULT NULL,
  `LifeguardAvailability` tinyint(1) DEFAULT NULL,
  `ActivitiesAvailable` varchar(300) DEFAULT NULL,
  `accessibility` text DEFAULT NULL,
  `SuggestedDuration` varchar(20) DEFAULT NULL,
  `BeachLength` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `beach`
--

INSERT INTO `beach` (`PlaceID`, `Category`, `SandType`, `WaterType`, `LifeguardAvailability`, `ActivitiesAvailable`, `accessibility`, `SuggestedDuration`, `BeachLength`) VALUES
(12, 'famillial', 'Golder san', 'black', 1, 'Swimming, Sunbathing', 'N/A', '1day', 2.00),
(66, 'Family-Friendly', 'Golden san', 'Clear water', 1, 'Swimming, Sunbathing, Beach Volleyball', 'Wheelchair accessible', '1 day', 5.20);

-- --------------------------------------------------------

--
-- Structure de la table `cities`
--

CREATE TABLE `cities` (
  `CityID` int(4) NOT NULL,
  `CityName` varchar(20) DEFAULT NULL,
  `WilliyaID` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `cities`
--

INSERT INTO `cities` (`CityID`, `CityName`, `WilliyaID`) VALUES
(1901, ' SETIF City', 19),
(1921, 'DJEMILA', 19),
(2301, 'ANNABA CITY', 23),
(2305, 'El Bouni', 23),
(2308, 'SERADI', 23),
(2419, 'HAMAMA DEBAGH', 24),
(2501, ' CONSTANTINE', 25),
(2504, 'ZIGHOUD YOUCEF', 25),
(3605, 'EL KALA', 36);

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `CommentID` int(11) NOT NULL,
  `Comment` text DEFAULT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `UserID` int(11) DEFAULT NULL,
  `PlaceID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`CommentID`, `Comment`, `Timestamp`, `UserID`, `PlaceID`) VALUES
(3, 'hight claas hotel', '2024-04-13 04:38:51', 8, 6),
(4, 'bad service room', '2024-04-13 07:23:49', 8, 6),
(5, 'bad room service', '2024-04-13 07:39:27', 8, 27),
(6, 'good view city and music ', '2024-04-25 14:45:03', 8, 27),
(7, 'good view and good place for take picturs', '2024-04-25 14:48:01', 8, 16),
(8, 'this palce is greate ', '2024-05-29 10:05:54', 8, 61);

-- --------------------------------------------------------

--
-- Structure de la table `favorite`
--

CREATE TABLE `favorite` (
  `UserID` int(11) NOT NULL,
  `PlaceID` int(11) NOT NULL,
  `TripID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `favorite`
--

INSERT INTO `favorite` (`UserID`, `PlaceID`, `TripID`) VALUES
(8, 7, 1),
(8, 17, 1),
(8, 11, 6),
(8, 40, 6),
(8, 14, 7),
(8, 16, 7),
(8, 6, 8),
(8, 12, 8),
(8, 19, 8),
(8, 21, 8),
(8, 25, 8);

-- --------------------------------------------------------

--
-- Structure de la table `historicalmonuments`
--

CREATE TABLE `historicalmonuments` (
  `PlaceID` int(11) NOT NULL,
  `Monument_Type` varchar(17) DEFAULT NULL,
  `Historical_Background` text DEFAULT NULL,
  `Architect` varchar(17) DEFAULT NULL,
  `YearBuilt` varchar(30) DEFAULT NULL,
  `CurrentCondition` varchar(24) DEFAULT NULL,
  `CulturalSignificance` text DEFAULT NULL,
  `Ownership` varchar(22) DEFAULT NULL,
  `HistoricalSignificance` text DEFAULT NULL,
  `SuggestedDuration` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `historicalmonuments`
--

INSERT INTO `historicalmonuments` (`PlaceID`, `Monument_Type`, `Historical_Background`, `Architect`, `YearBuilt`, `CurrentCondition`, `CulturalSignificance`, `Ownership`, `HistoricalSignificance`, `SuggestedDuration`) VALUES
(61, 'Fountain', 'Ain El Fouara is a famous fountain in Setif, Algeria, known for its distinctive statue and cultural significance. It has been a central gathering spot for locals and visitors for many decades.', 'Francis de Saint-', '1898', 'Well-maintained', 'Ain El Fouara is a symbol of Setif and is considered a significant cultural landmark, attracting many tourists and playing a central role in local celebrations.', 'Public', 'The fountain is not only an architectural piece but also a cultural icon, representing the artistic and historical heritage of Setif. It is frequently mentioned in local folklore and literature.', '15-30min');

-- --------------------------------------------------------

--
-- Structure de la table `hotel`
--

CREATE TABLE `hotel` (
  `PlaceID` int(11) NOT NULL,
  `HotelStyle` varchar(18) DEFAULT NULL,
  `HotelClass` int(1) DEFAULT NULL,
  `RoomFeatures` varchar(400) CHARACTER SET utf8 COLLATE utf8_croatian_mysql561_ci DEFAULT NULL,
  `RoomType` varchar(50) DEFAULT NULL,
  `RoomView` varchar(50) DEFAULT NULL,
  `Website` varchar(80) DEFAULT NULL,
  `PhoneNumber` varchar(15) DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `FeaturedHotel` text DEFAULT NULL,
  `LANG-SPEAK` varchar(25) DEFAULT NULL,
  `LowPrice` decimal(10,2) DEFAULT NULL,
  `HighPrice` decimal(10,2) DEFAULT NULL,
  `typehotel` varchar(10) DEFAULT NULL,
  `SpecialOffers` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `hotel`
--

INSERT INTO `hotel` (`PlaceID`, `HotelStyle`, `HotelClass`, `RoomFeatures`, `RoomType`, `RoomView`, `Website`, `PhoneNumber`, `Email`, `FeaturedHotel`, `LANG-SPEAK`, `LowPrice`, `HighPrice`, `typehotel`, `SpecialOffers`) VALUES
(6, 'Affaires', 5, 'Climatisation, Bureau, Service en chambre, Coffre-fort, Television ? ?cran plat, Douche ? l italienne, Baignoire / douche', 'Chambres non-fumeurs, Suites', 'Vue sur la ville', 'https://www.marriott.com/hotels/travel/aaasi-sheraton-annaba-hotel/', '00 1 844-631-05', 'orset.gmail.com', NULL, 'Anglais, Francais, Arabe', 100.00, 200.00, 'hotel', '-20%'),
(7, 'Business', 5, 'Air conditioning, Room service, Flatscreen TV', 'Non-smoking rooms', NULL, NULL, '0645453444', 'oro.gmail.com', NULL, NULL, 49.00, NULL, 'hotel', '-20%'),
(25, NULL, 4, 'room service,telvsion,air conditnionr', 'smoking rooms,Non-smoking rooms', 'city view ', NULL, '0666319210', 'complex@gmail.com', NULL, 'Anglais, Francais, Arabe', 5000.00, 40000.00, NULL, '-20%'),
(27, NULL, 4, 'Air conditioning ,television ,Room service ,', 'smoking rooms,Non-smoking rooms', 'city view', NULL, '0666319210', 'seybous@gmail.com', NULL, 'english, French, Arabe', 29293.00, 400000.00, NULL, NULL),
(41, 'family', 4, 'room serveice ,tv,', 'smoking rooms,Non-smoking rooms', 'beatful view ,mountain view and beach , all city a', NULL, '0666319210', 'Mountazah@gmail.com', NULL, 'French, Arabe', 3000.00, 10000.00, 'hotel', NULL),
(50, 'Luxury', 5, 'Luxury accommodations, Pool, Spa, Fitness center', 'Suites, Deluxe Rooms', 'City View, Pool View, Sea View', 'https://www.le-majestic.com', '+213 555 1234', 'contact@le-majestic.com', 'Luxury hotel with exquisite amenities', 'English, French, Arabic', 150.00, 500.00, 'hotel', 'Stay 3 nights, get 1 free!');

-- --------------------------------------------------------

--
-- Structure de la table `museum`
--

CREATE TABLE `museum` (
  `PlaceID` int(11) NOT NULL,
  `MuseumType` varchar(27) DEFAULT NULL,
  `TicketPrice` decimal(10,2) DEFAULT NULL,
  `TypeExhibits` varchar(160) DEFAULT NULL,
  `SpecialFeatures` varchar(400) DEFAULT NULL,
  `HistoricalBackground` text DEFAULT NULL,
  `Architect` varchar(17) DEFAULT NULL,
  `YearBuilt` int(4) DEFAULT NULL,
  `Significance` varchar(100) DEFAULT NULL,
  `openHour` time DEFAULT NULL,
  `closeHour` time DEFAULT NULL,
  `ClosingDays` varchar(50) DEFAULT NULL,
  `InteractiveExhibits` tinyint(1) DEFAULT 0,
  `AudioGuideAvailability` tinyint(1) DEFAULT NULL,
  `SuggestedDuration` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `museum`
--

INSERT INTO `museum` (`PlaceID`, `MuseumType`, `TicketPrice`, `TypeExhibits`, `SpecialFeatures`, `HistoricalBackground`, `Architect`, `YearBuilt`, `Significance`, `openHour`, `closeHour`, `ClosingDays`, `InteractiveExhibits`, `AudioGuideAvailability`, `SuggestedDuration`) VALUES
(17, 'Archaeological Museum', 20.00, 'The Roman Theatre of Guelma hous', 'Garden special exhibits', NULL, 'Roman', NULL, NULL, '08:00:08', '504:00:00', 'sunday', 0, 1, NULL),
(21, 'History Museum', 40.00, ' numide, romaine, hafside, ottom', '3 exhibition halls, 2 protected exhibits halls with laboratory, library, and reading room', 'Established in 1950 and opened to the public in 1968. The museum has an area of approximately 1794 square meters.', 'Roman', NULL, 'This museum is one of the most important archaeological and historical landmarks in Annaba city. It ', '12:00:00', '00:00:23', 'sunday', 0, 0, NULL),
(22, 'Archaeological Museum', 60.00, 'Antiquities, Ceramics, Sculpture', 'Garden, Courtyard, Three covered exhibition halls', 'The Djemila Museum is located in the heart of the ancient city of Djemila, also known as Cuicul, in the Sétif province of Algeria. It showcases archaeological pieces discovered within this Roman city, which was founded during the reign of Emperor Nerva and has been designated as a UNESCO World Heritage Site since 1982. The museum comprises a garden, courtyard, and three covered exhibition halls.', NULL, 1911, NULL, NULL, NULL, 'sunfay', 0, 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `park`
--

CREATE TABLE `park` (
  `PlaceID` int(11) NOT NULL,
  `ParkSurface` varchar(100) DEFAULT NULL,
  `Park_Type` varchar(15) DEFAULT NULL,
  `Activity` varchar(300) DEFAULT NULL,
  `OpenHour` time DEFAULT NULL,
  `CloseHour` time DEFAULT NULL,
  `is_always_open` tinyint(1) DEFAULT NULL,
  `ClosedDay` varchar(40) DEFAULT NULL,
  `SuggestedDuration` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `park`
--

INSERT INTO `park` (`PlaceID`, `ParkSurface`, `Park_Type`, `Activity`, `OpenHour`, `CloseHour`, `is_always_open`, `ClosedDay`, `SuggestedDuration`) VALUES
(19, '', 'Thermal complex', 'Hot spring bathing, Sightseeing', '08:00:00', '23:53:33', 0, 'Sunday', '3hour'),
(40, '150 acres', 'forest garden ', 'Plant viewing , Hiking, Bird watching Water slides\'', '08:00:00', '21:00:00', 1, NULL, '2 H      '),
(52, '200 aces', 'game park ,Parc', NULL, '08:00:00', '23:53:33', 0, 'sunday , monday ', 'half Day or 3H ');

-- --------------------------------------------------------

--
-- Structure de la table `places`
--

CREATE TABLE `places` (
  `PlaceID` int(11) NOT NULL,
  `PlaceName` varchar(20) DEFAULT NULL,
  `Description` text DEFAULT NULL,
  `Address` varchar(50) DEFAULT NULL,
  `Features` varchar(400) DEFAULT NULL,
  `CityID` int(11) DEFAULT NULL,
  `Image` varchar(80) DEFAULT NULL,
  `longitude` decimal(10,8) DEFAULT NULL,
  `latitude` decimal(10,8) DEFAULT NULL,
  `paymentgratuit` enum('free','non_free') NOT NULL DEFAULT 'non_free',
  `distance_to_center` varchar(20) DEFAULT NULL,
  `distance_to_airport` varchar(20) DEFAULT NULL,
  `nearest_airport` varchar(100) DEFAULT NULL,
  `TravelInformation` text DEFAULT NULL,
  `HowToReach` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `places`
--

INSERT INTO `places` (`PlaceID`, `PlaceName`, `Description`, `Address`, `Features`, `CityID`, `Image`, `longitude`, `latitude`, `paymentgratuit`, `distance_to_center`, `distance_to_airport`, `nearest_airport`, `TravelInformation`, `HowToReach`) VALUES
(6, 'Sheraton Annaba Hote', 'A luxurious hotel located in the heart of Annaba.', 'Boulevard Victor Hugo, Annaba 23000, Algeria', 'Luxury accommodations, Pool, Spa, Fitness center', 2301, 'assets/sheratone.jpg\n', 7.76227800, 36.90246500, 'non_free', '5M', '15KM', 'rabah bitata annaba ', 'good place for night highh classs hotel room good for buinses and make buisnes', 'in the cneter of annaba near to cours '),
(7, 'Hotel Le Majestic', 'Located in the center city of Annaba, two blocks away from large institutions.', '1954 11 Boulevard Du 1er Novembre, Annaba 23000 Al', 'Central location, Wi-Fi, Parking', 2301, 'assets/unnamed.jpg', 7.59282969, 36.66648564, 'non_free', '10M', '15KM', 'annaba aierport', 'Public transportation options are available nearby...good for night and family only', 'easy to reach in the center of annaba reach to hotel seybous'),
(8, 'L\'Olivier', '53 avis', '1 Cite Belle Vue Seraidi, Annaba 23000 Algerie', 'Restaurant, , Free breakfast', 2301, 'assets/fb-img-1503780221825.jpg', 5.00000000, 40.00000000, 'non_free', '5KM', '20KM', 'Rabah bitat arieoprt', 'Public transportation options are available nearbY', 'Public transportation options are available nearb NEXT to hotel sheratone you can find it Easy why in the route by foot or by taxi'),
(10, 'Le Pecheur', 'Restaurant algérien.', '1 Rue De L\'Avant Port, Annaba 23000 Algeria', 'Seafood, Outdoor seating', 2301, 'assets/restaurant-la-renaissance.jpg', NULL, NULL, 'non_free', '5KM', '10KM', 'Rabah bitat arieoprt', 'Public transportation options are available nearbY ', 'Easy to Reach'),
(11, 'Bigben Town', 'Restaurant proposant une cuisine marocaine, des pizzas et méditerranéenne.', 'Rue Banbou el Aide N° 133 cite Rizi Omor Annaba', 'Moroccan cuisine, Pizza, Mediterranean cuisine', 2301, 'assets/nouveau-decor-pour-la.jpg', NULL, NULL, 'non_free', '5KM', '19KM', 'Rabah bitat arieoprt', 'nearst transport  shopping mall    , and also nearst shop hotel resturnat parks', NULL),
(12, 'Ain Achir Beach', 'Plage pittoresque située à Ain Achir.', 'Ain Achir, Annaba', 'Scenic views, Beach access', 2301, 'assets/ain.jpg', NULL, NULL, 'free', '10KM', '20KM', NULL, 'Best time to visit is during the spring and fall. Ensure you carry enough water and wear comfortable shoes', 'By Car: Drive towards the coast of Annaba, following signs to Ain Achir Beach. The beach is accessible by car, and there are parking facilities available nearby.\nBy Taxi: Taxis are readily available in Annaba and can take you directly to Ain Achir Beach. Simply tell the driver your destination, and they will drop you off at the nearest access point.\nOn Foot: Depending on your location in Annaba, you may be able to walk to Ain Achir Beach if you\'re staying nearby or exploring the coastal area. The beach is within walking distance from some central locations in the city.'),
(14, 'Mosquée Emir Abdelka', 'La mosquée Emir Abdelkader est un lieu de culte islamique situé à Constantine, en Algérie.', 'Constantine, Algeria', 'Historic site, Religious site', 2501, 'assets/photo0jpg.jpg', 6.60300000, 36.34600000, 'free', '40KM', '30KM', 'Constontineu aireport', 'you need to respect clothes for the relgion mosque and take the Hijab ', 'By Car: Navigate towards the city center of Constantine and follow signs to the Emir Abdelkader Mosque. Parking may be available nearby.\nBy Taxi: Taxis are a convenient mode of transportation in Constantine and can drop you off directly at the mosque.\nOn Foot: If you\'re already in the city center, you can easily walk to the mosque as it is centrally located and accessible by foot'),
(15, 'Mosquée Sidi Bou Mer', 'La Mosquée de Bou Merouane est une mosquée située à Annaba en Algérie. Elle a été bâtie en 1033 par le souverain ziride: Al-Muizz ben Badis.', 'Annaba, Algérie', 'Historic site, Religious site', 2301, 'assets/1.jpg', 7.76472200, 36.89888900, 'free', '5KM', '20km', 'rabah bitate aireport annaba aireport', 'bSidi Bou Mer Mosque is a historic mosque located in Annaba, offering visitors a glimpse into the city\'s cultural and religious heritage. The mosque is known for its architectural beauty and serene atmosphere.', 'HowToReach:\n\nBy Car: Drive towards the area where Sidi Bou Mer Mosque is situated in Annaba. Parking may be available nearby.\nBy Taxi: Taxis can take you directly to Sidi Bou Mer Mosque from anywhere in Annaba.\nOn Foot: If you\'re exploring Annaba city center or nearby attractions, you can walk to Sidi Bou Mer Mosque as it is within walking distance from many central locations. '),
(16, 'Saint Augustin Basil', 'Built in 1881 on a hilltop in Annaba in honor of the illustrious physician Saint Augustine, the Basilica of Saint Augustine is one of Annaba\'s most distinctive monuments, providing a glimpse into the state and the history of Christianity in this part of the country. The church is characterized by breathtaking beauty and resplendent architecture that wonderfully combines the Byzantine Moorish style and Gothic architecture.', 'Chem. de la Basilique St Augustin, Annaba, Algeria', 'Historic site, Religious site', 2305, 'assets/caption.jpg', 7.74416700, 36.88485900, 'free', '12KM', '11KM', NULL, 'you need respect the relgion and people and stay calm', NULL),
(17, 'Roman Theatre of Gue', 'The Roman Theatre of Guelma is an ancient theater located in Guelma, Algeria. It was built in the early 3rd century with the financing of a priestess of the imperial cult. Completely destroyed, it was rebuilt in the early 20th century, which explains its excellent condition. Today, the theater houses the Roman museum of Guelma.', 'Guelma', 'Historic site, Religious site', 2419, 'assets/2.jpg', 0.00000000, NULL, 'free', '10KM', '19KM', NULL, NULL, 'General instructions on reaching the site from the airport'),
(19, 'Hammam Maskhoutine', 'A thermal complex known for its dramatic, multicolored travertine walls and hot springs.', 'Hammam Debagh, Guelma Province, Algeria', 'Historic site, Religious site', 2419, 'assets/dbagh.jpg', 7.26370000, 36.46130000, 'free', '18KM', '45KM', NULL, NULL, 'Easy to find'),
(21, 'Hippone Museum', 'Hippone Museum is located near the Roman Catholic Church of Saint Augustine in Annaba, Algeria. It houses numerous important historical artifacts.', 'Near Saint Augustine Church', 'Historic site, Religious site', 2305, 'assets/b1.jpg', 7.75201304, 36.88207644, 'non_free', '9KM', '15KM', 'Rabah bitat arieoprt', 'nearst transport  shopping mall    , and also nearst shop hotel resturnat parks', NULL),
(22, 'Djemila museum', 'Djemila, also known as Cuicul, is an ancient Roman city located in the Sétif Province of Algeria. It was founded during the reign of Emperor Nerva in the 1st century AD. Djemila is a UNESCO World Heritage Site and is famous for its well-preserved ruins, including a forum, temples, basilicas, and houses. The site offers a glimpse into Roman architecture and urban planning in North Africa.', 'Djemila, Sétif Province, Algeria', 'Historic site, Religious site', 1921, 'assets/5.jpg', 5.75000000, 36.32000000, 'non_free', '10KM', '29KM', 'City International Airport', 'Public transportation options are available nearbY', 'Easy to Reach in El bouni ville next to relgious sites for christance lala Bouna in the forest Easy to see it you can take taxi or online taxi or ask people '),
(25, 'Complexe Thermal El ', 'good hotel in oueld ali geulma city hotel ', 'lis Hammam Ouled Ali, Heliopolis 24142 Algeria', 'parking ,resturnart,hot hub,childeren places to play,', 2419, 'assets/complex (2).jpg', NULL, NULL, 'non_free', '19KM', '20KM', NULL, 'Public transportation options are available nearby nearby city shoping and more', NULL),
(27, 'Hotel Seybouse ', 'Very good hotel city veiw This hotel is located in walking distance from the city center. At the hotel\r\n.', '54 1, Blvd du 1er Novembre 1954, Annaba 23000 Alge', 'Free internet', 2301, 'assets/Hotel-Seybousse-Annaba-1.jpg', NULL, NULL, 'non_free', '10M', '16KM', 'rabah bitat aireport', 'Public transportation options are available nearby...', 'easy to rich in the center of annaba '),
(40, 'El Kala Tonga Park', 'A beautiful park with diverse wildlife and lakes.', 'El Kala, Algeria', 'Walking trails, Picnic areas', 3605, 'assets/6.jpg', 8.49677500, 36.88118000, 'free', '30KM', '50KM', '', '', ''),
(41, 'Hotel el mountazah', 'Located in the mountain seradi with beautful view for all annaba beach and city view , ', 'Annaba ,Seradi', 'Central location, Wi-Fi, free Parking,family,resturant,free entery', 2308, 'assets/moun.jpg', NULL, NULL, 'non_free', '20KM', '30KM', 'aierport annaba rabah bitiat', 'Public transportation options are available nearby...good for night and family only ,family hotel with beautful view free entry', 'in seardi mountain '),
(50, 'Hotel Marriot ', 'Hotel located in constotnie Good hotel for night        family hotel   with good service dished include many fauture \r\n', 'route costonnitnue  123  cosntonine nouvell vilee ', 'free parking     , neart  transoport ', 2501, 'images\\hotel-2.jpg', NULL, NULL, 'non_free', '20KM', '50KM', 'aireport constontinue ville ', 'nearst transport  shopping mall    , and also nearst shop hotel resturnat parks ', 'Easy to Reach next to Hotel el keouba  in left trasonoert park '),
(52, 'Aqua Park - Amira La', NULL, 'route costonnitnue  ZIGHOUD 123  cosntonine nouvel', 'free parking , kids play , game kids , game for old , park , ', 2504, 'assets/HHH.jpg', NULL, NULL, 'non_free', '20KM', '50KM', 'aireport cneter ville constontine ', 'nearst transport , only family with kidss alowed to enter , park , family ', 'reach next to hotel el berka       in cneter zighoud yousef consotinue   '),
(53, 'Restaurant CAP BON e', 'There aren\'t enough food, service, value or atmosphere ratings for Le Roi Du Bourek yet. Be one of the first to write a review! Resturant Mediterranean, Tunisian, Algerian good Resurnat with beautful view  also fast food is avalible', 'Rue 24 Avril, El Kala 36001 Algeria', NULL, 3605, 'assets/HHHH.jpg', NULL, NULL, 'non_free', '20KM', '30KM', 'EL TARF Aireport', NULL, 'Easy to Reach '),
(55, 'Restaurant Makoulet ', 'Resturnat familly Traditional and Algerian and Tunsien Food in El kala with beautful view', 'Corniche Front Mer, El Kala 36002 Algeria', 'Free parking , outdorseting ,       ', 3605, 'assets/magnifique-endroit-tres.jpg', NULL, NULL, 'non_free', '10M', '30KM', 'EL TARF AIreport or Annaba Aireport', 'nearst transport avaliable     beatful view nature is avalibale with beautful park garden and more ', 'General instructions on reaching the site from the airport'),
(60, 'Restaurant Bab El Ha', NULL, 'Rue Bouatoura Meryem, Setif Algeria', NULL, 1901, 'assets/restaurant-bab-el-hara.jpg', NULL, NULL, 'non_free', '10M', '15KM', ' abou rizi aireport ', 'nearst trapsnort avalivble , nearst musuem also parks and shoping city cneter ', 'in the cneter of city setif next to shop mall park mall for setif only 16 Meter '),
(61, 'Ain El Fouara', 'in El Fouara is an iconic fountain in Setif, renowned for its artistic design and historical importance. The fountain features a beautiful statue that has become a symbol of the city.', ' Setif City Center, Setif, Algeria', 'Ornate statue, Public gathering spot, Historical landmark, Tourist attraction', 1901, 'assets/Ain_El_Fouara).jpg', NULL, NULL, 'free', '10M', '10KM', 'setift ain aris aireport', 'Easily accessible by public transportation, with nearby parking available for visitors traveling by car. The fountain is located in the heart of Setif, making it a convenient stop for tourists exploring the city.', '\r\n\r\nBy Car: Follow the main roads to Setif city center where parking is available nearby.\r\nBy Bus: Take any bus route that stops at Setif city center.\r\nBy Train: Arrive at Setif Railway Station, then walk or take a short taxi ride to the city center.\r\nOn Foot: Located in the city center, Ain El Fouara is easily reachable on foot from most central locations in Setif'),
(66, 'Wadi Boukrat Beach', 'Wadi Boukrat Beach is located in the municipality of Seraidi and is one of the most beautiful beaches in Annaba, attracting many visitors.', 'route annaba Seradi Annaba 23034 Algeria', NULL, 2308, 'assets/f1.jpg', NULL, NULL, 'free', '10KM', '30KM', 'rabah biatat aireport', 'The beach can be accessed by various means of transportation. Visitors can reach Annaba by air through Rabah Bitat Airport, which serves domestic and international flights. From Annaba city center, travelers can take a taxi or private car to reach Wad Boukrate Beach. Additionally, there may be local buses or minibusses available for transportation to the beach area', 'By Road: Visitors can also reach Annaba by road from other cities in Algeria. The road network in Algeria connects major cities, and Annaba is accessible by well-maintained highways. Once in Annaba, travelers can take a taxi or private car to Wad Boukrate Beach.\r\n\r\nPublic Transportation: Annaba may have local buses or minibusses that provide transportation within the city. Travelers can inquire at the local bus station or with residents for information on bus routes that pass near the beach area. However, availability and frequency of public transportation may vary, so it\'s advisable to check schedules in advance.\r\n\r\nTaxi or Private Car: Taxis are a convenient mode of transportation within Annaba. Visitors can easily find taxis in the city center or request one through a taxi app. Alternatively, renting a car provides flexibility for exploring the region at one\'s own pace.');

-- --------------------------------------------------------

--
-- Structure de la table `religious_sites`
--

CREATE TABLE `religious_sites` (
  `PlaceID` int(11) NOT NULL,
  `type_RelgionSite` varchar(9) DEFAULT NULL,
  `Religion` varchar(12) DEFAULT NULL,
  `HistoricalBackground` text DEFAULT NULL,
  `dominant_style` varchar(17) DEFAULT NULL,
  `Year_Built` int(4) DEFAULT NULL,
  `Significance` varchar(100) DEFAULT NULL,
  `SuggestedDuration` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `religious_sites`
--

INSERT INTO `religious_sites` (`PlaceID`, `type_RelgionSite`, `Religion`, `HistoricalBackground`, `dominant_style`, `Year_Built`, `Significance`, `SuggestedDuration`) VALUES
(14, 'Mosquée', 'Islam', 'The Emir Abdelkader Mosque (A) is a mosque located in Constantine, the capital of Constantine province, Algeria.[1] It is the second largest mosque in Algeria after Djamaa Al Djazair.', 'Islamique', 1994, 'Lieu de culte important à Constantine, Algérie.', '1hour'),
(15, 'Islam', 'Mosquée', 'La Mosquée de Bou Merouane est une mosquée située à Annaba en Algérie. Elle a été bâtie en 1033 par le souverain ziride: Al-Muizz ben Badis.', 'Ziride', 1033, 'Mosquée historique de l\'epoque ziride.', '30min'),
(16, 'Church', 'Catholic Chu', 'Construction of the basilica began in 1881 and finished on March 29, 1900, led by Abbe Pougnet. The church was dedicated April 24, 1914 and dedicated to Saint Augustine of Hippo. It was built not far from the remains of the Basilica Pacis built by Saint Augustine, where he died while the city was besieged by Vandals. The statue of St. Augustine in the basilica contains one of his arm bones. It is under the circumscription of the Diocese of Constantine.', 'Roman, Byzantine ', 1900, 'Active basilica and parish church.', '2hour');

-- --------------------------------------------------------

--
-- Structure de la table `restaurant`
--

CREATE TABLE `restaurant` (
  `PlaceID` int(11) NOT NULL,
  `Menu` text DEFAULT NULL,
  `Meals` varchar(50) DEFAULT NULL,
  `Cuisine` text DEFAULT NULL,
  `Res_type` varchar(18) DEFAULT NULL,
  `PhoneNumber` varchar(15) DEFAULT NULL,
  `LowPrice` decimal(10,2) DEFAULT NULL,
  `HighPrice` decimal(10,2) DEFAULT NULL,
  `SpecialDiets` text DEFAULT NULL,
  `Website` varchar(100) DEFAULT NULL,
  `ReservationRequired` tinyint(1) DEFAULT NULL,
  `OpenHour` time DEFAULT NULL,
  `CloseHour` time DEFAULT NULL,
  `Dishes` text DEFAULT NULL,
  `Ambiance` text DEFAULT NULL,
  `OutdoorSeating` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `restaurant`
--

INSERT INTO `restaurant` (`PlaceID`, `Menu`, `Meals`, `Cuisine`, `Res_type`, `PhoneNumber`, `LowPrice`, `HighPrice`, `SpecialDiets`, `Website`, `ReservationRequired`, `OpenHour`, `CloseHour`, `Dishes`, `Ambiance`, `OutdoorSeating`) VALUES
(8, 'Juicy grilled chicken served with roasted vegetables', 'Déjeuner, Dîner', 'Française, Américaine, Allemande, Africaine, Arabe', 'Resturnat', '+213 666 02 11 ', 30.00, 400.00, 'Vegetriance ,Gym Food', NULL, 1, '10:06:10', '00:00:00', 'sald,pizza,buuger,', NULL, 1),
(10, NULL, 'Lunch, Dinner', 'Algérienne', 'fast food ', '+213 659 31 14 ', 250.00, 5000.00, 'GYM food ', 'Website', 0, '00:00:00', '00:00:12', 'pizza,salad,tacous,burger,', NULL, 0),
(11, 'Sample menu for restaurant in Annaba', 'Lunch, Dinner', 'French, Italian', 'Restaurant', '+123456789', 20.00, 50.00, 'Vegetarian options available', 'http://www.restaurant-annaba.com', 1, '10:00:00', '22:00:00', 'Pasta, Pizza, Salad', 'Cozy atmosphere with indoor and outdoor seating', 1),
(53, NULL, 'Breakfast, Lunch, Dinner', 'Mediterranean, Tunisian, Algerian', 'Resturat Traditina', '+213 659 40 64 ', 20.00, 5000.00, 'GYM FOOD , Healthy Food are avaliable ', NULL, NULL, '10:00:00', '23:53:33', NULL, NULL, 1),
(55, NULL, NULL, 'Algerien ,Mediterranean, Tunisian ', 'Resturat Traditina', '+213 659 40 64 ', 200.00, 10000.00, 'healthuy Food', NULL, 0, '10:00:00', '23:00:00', 'traditinal dishes avaliable Tunisnes Dishes and also fast food food    healthy food ', NULL, 1),
(60, 'Seafood platter, gourmet burgers, fresh salads, and homemade desserts', 'Breakfast, Lunch, Dinner', 'International, Mediterranean, Algerian', 'Bistro', '+213 771 123 45', 15.00, 150.00, 'Vegetarian, Vegan, Gluten-Free', 'http://www.seasidebistro-setif.com', 1, '08:00:00', '23:00:00', 'grilled fish, gourmet burger, garden salad, tiramisu', 'Cozy, Modern, Family-Friendly', 1);

-- --------------------------------------------------------

--
-- Structure de la table `savedplaces`
--

CREATE TABLE `savedplaces` (
  `UserID` int(11) NOT NULL,
  `PlaceID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `savedplaces`
--

INSERT INTO `savedplaces` (`UserID`, `PlaceID`) VALUES
(8, 6),
(8, 7),
(8, 8),
(8, 10),
(8, 12),
(8, 19),
(8, 21),
(8, 22),
(8, 25),
(8, 27),
(8, 40),
(8, 61);

-- --------------------------------------------------------

--
-- Structure de la table `trip`
--

CREATE TABLE `trip` (
  `TripID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `TripName` varchar(255) DEFAULT NULL,
  `Description` text DEFAULT NULL,
  `StartDate` date DEFAULT NULL,
  `Duration` int(11) DEFAULT NULL,
  `WilliyaID` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `trip`
--

INSERT INTO `trip` (`TripID`, `UserID`, `TripName`, `Description`, `StartDate`, `Duration`, `WilliyaID`) VALUES
(1, 8, 'trip to aananaba', 'fefea', '2024-04-22', 4, 23),
(6, 8, 'trip to aananaba', NULL, '2024-05-04', 3, 23),
(7, 8, 'trip to algeria', 'efe', '2024-04-26', 5, 24),
(8, 8, 'trip to algeria', NULL, '2024-04-26', 5, 24),
(10, 8, 'trip to guelma', NULL, '2024-04-23', 6, 24),
(12, 8, 'trip to aananaba', NULL, '2024-04-25', 5, 36),
(13, 8, 'trip to aananaba', NULL, '2024-04-25', 5, 36),
(14, 8, 'trip to aananaba', NULL, '2024-04-25', 5, 36),
(15, 8, 'trip to aananaba', NULL, '2024-04-25', 5, 36),
(16, 8, 'trip to aananaba', NULL, '2024-04-25', 5, 36),
(17, 8, 'trip to aananaba', NULL, '2024-04-25', 5, 36),
(18, 8, 'trip to aananaba', NULL, '2024-04-25', 5, 36),
(19, 8, 'trip to aananaba', NULL, '2024-04-25', 5, 36),
(20, 8, 'trip to aananaba', NULL, '2024-04-11', 2, 36),
(21, 8, 'trip to aananaba', NULL, '2024-04-11', 2, 36),
(22, 8, 'trip to aananaba', NULL, '2024-04-11', 2, 36),
(23, 8, 'trip to aananaba', NULL, '2024-04-11', 2, 36),
(24, 8, 'trip to aananaba', NULL, '2024-04-11', 2, 36),
(25, 8, 'trip to aananaba', NULL, '2024-04-11', 2, 36),
(26, 8, 'trip to aananaba', NULL, '2024-04-11', 2, 36),
(27, 8, 'trip to aananaba', NULL, '2024-04-11', 2, 36),
(28, 8, 'trip to aananaba', NULL, '2024-04-11', 2, 36),
(29, 8, 'trip to aananaba', NULL, '2024-04-11', 2, 36),
(30, 8, 'trip to aananaba', NULL, '2024-04-11', 2, 36),
(31, 8, 'trip to aananaba', NULL, '2024-04-11', 2, 36),
(32, 8, 'trip to aananaba', NULL, '2024-04-26', 3, 36),
(33, 8, 'trip to aananaba', NULL, '2024-04-26', 3, 36),
(34, 8, 'trip to aananaba', NULL, '2024-04-26', 3, 36),
(35, 8, 'trip to aananaba', NULL, '2024-04-26', 3, 36),
(36, 8, 'trip to aananaba', NULL, '2024-04-26', 3, 36),
(37, 8, 'trip to aananaba', NULL, '2024-04-26', 3, 36),
(38, 8, 'trip to aananaba', NULL, '2024-04-26', 3, 36),
(39, 8, 'trip to aanislem', NULL, '2024-04-26', 3, 36),
(40, 8, 'trip to aanislem', NULL, '2024-04-26', 3, 36),
(41, 8, 'trip to aanislem', NULL, '2024-04-26', 3, 36),
(42, 8, 'trip to guelma', NULL, '0000-00-00', 3, 23),
(43, 8, 'trip to guelma', NULL, '0000-00-00', 3, 23),
(44, 8, 'trip to guelma', NULL, '0000-00-00', 3, 23),
(45, 8, 'trip to guelma', NULL, '0000-00-00', 3, 23),
(46, 8, 'trip to guelma', NULL, '0000-00-00', 3, 23),
(47, 8, 'trip to guelma', NULL, '0000-00-00', 3, 23),
(48, 8, 'trip to guelma', NULL, '0000-00-00', 3, 23),
(49, 8, 'trip to guelma', NULL, '0000-00-00', 3, 23),
(50, 8, 'trip to guelma', NULL, '0000-00-00', 3, 23),
(51, 8, 'trip to guelma', NULL, '0000-00-00', 3, 23),
(52, 8, 'trip to guelma', NULL, '2024-04-27', 3, 23),
(53, 8, 'trip to guelma', NULL, '2024-04-27', 3, 23),
(54, 8, 'trip to guelma', NULL, '2024-04-27', 3, 23),
(55, 8, 'trip to guelma', NULL, '2024-04-27', 3, 23),
(56, 8, 'trip to guelma', NULL, '2024-04-27', 3, 23),
(57, 8, 'trip to guelma', NULL, '2024-04-27', 3, 23),
(58, 8, 'trip to guelma', NULL, '2024-04-27', 3, 23),
(59, 8, 'trip to aananaba', NULL, '0000-00-00', 12, 23),
(60, 8, 'trip to aananaba', NULL, '2024-04-25', 12, 23),
(61, 8, 'trip to aananaba', NULL, '2024-04-25', 12, 23),
(62, 8, 'trip to aananaba', NULL, '2024-04-25', 12, 23),
(63, 8, 'trip to aananaba', NULL, '2024-04-25', 12, 23),
(64, 8, 'trip to aananaba', NULL, '2024-04-25', 12, 23),
(65, 8, 'trip to aananaba', NULL, '2024-04-24', 2, 23),
(66, 8, 'trip to aananaba', NULL, '2024-04-24', 2, 23),
(67, 8, 'trip to aananaba', NULL, '2024-04-24', 2, 23),
(68, 8, 'trip to aananaba', NULL, '2024-04-24', 2, 23),
(69, 8, 'trip to aananaba', NULL, '2024-04-24', 2, 23),
(70, 8, 'trip to aananaba', NULL, '2024-04-24', 2, 23),
(71, 8, 'trip to aananaba', NULL, '2024-04-24', 2, 23);

-- --------------------------------------------------------

--
-- Structure de la table `tripday`
--

CREATE TABLE `tripday` (
  `TripDayID` int(11) NOT NULL,
  `TripID` int(11) DEFAULT NULL,
  `Date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tripplace`
--

CREATE TABLE `tripplace` (
  `TripDayID` int(11) NOT NULL,
  `PlaceID` int(11) NOT NULL,
  `Order` int(11) DEFAULT NULL,
  `Description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(30) DEFAULT NULL,
  `PasswordHash` varchar(100) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`UserID`, `Username`, `PasswordHash`, `Email`) VALUES
(1, 'admin1', '$2y$10$nQQAdq7Il4ec079D.qD6M.6mq8aOYM286u9D5j4q/zZTKpJTDj2q6', 'admin1@example.com'),
(2, 'user1', 'user123', 'user1@example.com'),
(3, 'user2', 'user456', 'user2@example.com'),
(4, 'user3', 'user789', 'user3@example.com'),
(5, 'ISLEM', '$2y$10$ES.nDIXNj5b8fhKN4FbOOeKC5zZcZGA2GKjtXGC2qEqfTzl6lyQlO', 'islamaiouni@gmail.com'),
(6, 'islamaioun', '$2y$10$5I8jR04Xo4GHmVdhZMDST.UWafFv327WzxPG9..uYAqI1VC9yM0N.', 'islamaiouni@gmail.com'),
(7, 'islamaiouni', '$2y$10$TppvKNa7umHYt8S/..YPlO61jeVHxY1ZMqwavoJfvpy0QsmDi6u8G', 'islamaiouni@gmail.com'),
(8, 'kama', '$2y$10$fUTM46zmVcrCh1jKuhay8ezv/HRRS5nS6YUknv1KIjE2/xLbrYDZa', 'islamaiouni@gmail.com'),
(9, 'kamagfea', '$2y$10$RZRF2Sl3KrRSyKaZlXj/GuJek6Z3Z/t0UeQbrvLTjWGdKwLTfYUg.', 'islamaiouni@gmail.com'),
(10, 'test', '$2y$10$O/WOqa1LeYOlao4T4JeKLeHiDbosdvqwUDbp0nWKDmO64tbvA8Oce', 'islamaiouni@gmail.com'),
(11, 'jad', '$2y$10$kanNjI42yZW/pYywE0KCQe5qSYz0EWCvm0Sds50UBxuedJJAa0BQO', 'islamaiouni@gmail.com'),
(12, 'jade', '$2y$10$feMAclT4nH2a724lnXfuv.EXN0vJH2Zd5wd1Z9Tdp80c8SMaMuM.S', 'islamaiouni@gmail.com'),
(13, 'abdou', '$2y$10$GDiXytPJulcvugCFtZYeqOTJ8XfnobaAdl4SqFnqkG8EmpW7/fuJK', 'islamaiouni@gmail.com'),
(14, 'TESTSF', '$2y$10$iTJumHfDSCsogeTFWlIku.IOpa8EVxNJ9ucA6Fd7UtpGuAF6aJZq6', 'islamaiouni@gmail.com'),
(15, 'TESTSF', '$2y$10$OV.VpMbSn6pJ7Re4bsm4CepI4.3CFftvTCoAU4brjjRpwkykbFoPG', 'islamaiouni@gmail.com'),
(16, 'TESTSF', '$2y$10$.amI7lL1eXuHhniFsjv.Ku0EiPMApeEw7d6KUVrqwE.Anpvd.QTX2', 'islamaiouni@gmail.com'),
(17, 'kama234', '$2y$10$34zcXQDfMMvF6qAu2vXYS.qCY3QGBN7K60/qH8/SdElmUGOIKXJD6', 'islamaiouni@gmail.com'),
(18, 'kama', '$2y$10$KD9xuAg9nWepfUzGc85fM.AUhrH3SvWrCrfKh8vHBJ.Rjlzd9IH9a', 'islamaiouni@gmail.com'),
(19, 'QED', '$2y$10$9oPGZPDZmTzgOqTFzDibU.dprE1Rfct8WrGbY704GWn.oDYMlxiJu', 'islamaiouni@gmail.com'),
(20, 'TESTSF', '$2y$10$2qB2UMvEBm1ux5Sgqcd2G.G6n3bNszF0uk6FbgqyV9TNGqR2fN9Wa', 'islamaioun23i@gmail.com'),
(21, 'islamaiouniZZ', '$2y$10$c8ao.0BKCB6JHOfnKjOqiOQiyTCVy6GgjobqpLGiMQT9Y2uIy6TBS', 'islamaiouni@gmail.com'),
(22, 'kama', '$2y$10$2sO4DpOzaT7j7ik8oIri8eqchpj.oKZX9F.FntbUwVXLvy1cV.7u.', 'islamaiouniedededc@gmail.com'),
(23, 'TESTSF', '$2y$10$BELHmxw4hyun1s.slo2o3ewDH8CqF9FtnQbmnLmvEF2QB/Xn1RIfe', 'islamaiouniszzs@gmail.com'),
(24, 'TESTSF', '$2y$10$Rn3.XGeajUWVoFvbiYetJePbbOpxqkubfGr6twd7Xycx2nkMQpRR6', 'islamaiounisxs@gmail.com'),
(25, 'KAMATROG', '$2y$10$9Xm64dk4c1HcC/nGw5lNdOOKUjFswFZ7eeCEK7SEf2pNMT8r6tdtm', 'islemaaiouni123@gmail.com'),
(26, 'lotfi', '$2y$10$w1Aaf2Pd2obdbEJt44UkneP3MzYoOdxA7gQuoNHCV0baiLqohnr2y', 'islamaiouniszxq@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `williyas`
--

CREATE TABLE `williyas` (
  `WilliyaID` int(2) NOT NULL,
  `WilliyaName` varchar(18) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `williyas`
--

INSERT INTO `williyas` (`WilliyaID`, `WilliyaName`) VALUES
(19, 'Setif'),
(23, 'Annaba'),
(24, 'Guelma'),
(25, 'Constontine'),
(36, 'EL Tarf');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `beach`
--
ALTER TABLE `beach`
  ADD PRIMARY KEY (`PlaceID`),
  ADD UNIQUE KEY `unique_placeid_beach` (`PlaceID`);

--
-- Index pour la table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`CityID`),
  ADD KEY `WilliyaID` (`WilliyaID`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`CommentID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `PlaceID` (`PlaceID`);

--
-- Index pour la table `favorite`
--
ALTER TABLE `favorite`
  ADD PRIMARY KEY (`UserID`,`PlaceID`),
  ADD KEY `PlaceID` (`PlaceID`),
  ADD KEY `TripID` (`TripID`);

--
-- Index pour la table `historicalmonuments`
--
ALTER TABLE `historicalmonuments`
  ADD PRIMARY KEY (`PlaceID`);

--
-- Index pour la table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`PlaceID`),
  ADD UNIQUE KEY `unique_placeid_hotel` (`PlaceID`);

--
-- Index pour la table `museum`
--
ALTER TABLE `museum`
  ADD PRIMARY KEY (`PlaceID`);

--
-- Index pour la table `park`
--
ALTER TABLE `park`
  ADD PRIMARY KEY (`PlaceID`);

--
-- Index pour la table `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`PlaceID`),
  ADD KEY `CityID` (`CityID`);

--
-- Index pour la table `religious_sites`
--
ALTER TABLE `religious_sites`
  ADD PRIMARY KEY (`PlaceID`);

--
-- Index pour la table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`PlaceID`);

--
-- Index pour la table `savedplaces`
--
ALTER TABLE `savedplaces`
  ADD PRIMARY KEY (`UserID`,`PlaceID`),
  ADD KEY `PlaceID` (`PlaceID`);

--
-- Index pour la table `trip`
--
ALTER TABLE `trip`
  ADD PRIMARY KEY (`TripID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `fk_trip_williyas` (`WilliyaID`);

--
-- Index pour la table `tripday`
--
ALTER TABLE `tripday`
  ADD PRIMARY KEY (`TripDayID`),
  ADD KEY `TripID` (`TripID`);

--
-- Index pour la table `tripplace`
--
ALTER TABLE `tripplace`
  ADD PRIMARY KEY (`TripDayID`,`PlaceID`),
  ADD KEY `PlaceID` (`PlaceID`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- Index pour la table `williyas`
--
ALTER TABLE `williyas`
  ADD PRIMARY KEY (`WilliyaID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `CommentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `places`
--
ALTER TABLE `places`
  MODIFY `PlaceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT pour la table `trip`
--
ALTER TABLE `trip`
  MODIFY `TripID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `beach`
--
ALTER TABLE `beach`
  ADD CONSTRAINT `beach_ibfk_1` FOREIGN KEY (`PlaceID`) REFERENCES `places` (`PlaceID`);

--
-- Contraintes pour la table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_ibfk_1` FOREIGN KEY (`WilliyaID`) REFERENCES `williyas` (`WilliyaID`);

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`PlaceID`) REFERENCES `places` (`PlaceID`);

--
-- Contraintes pour la table `favorite`
--
ALTER TABLE `favorite`
  ADD CONSTRAINT `favorite_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`),
  ADD CONSTRAINT `favorite_ibfk_2` FOREIGN KEY (`PlaceID`) REFERENCES `places` (`PlaceID`),
  ADD CONSTRAINT `favorite_ibfk_3` FOREIGN KEY (`TripID`) REFERENCES `trip` (`TripID`);

--
-- Contraintes pour la table `historicalmonuments`
--
ALTER TABLE `historicalmonuments`
  ADD CONSTRAINT `fk_PlaceID` FOREIGN KEY (`PlaceID`) REFERENCES `places` (`PlaceID`);

--
-- Contraintes pour la table `hotel`
--
ALTER TABLE `hotel`
  ADD CONSTRAINT `fk_hotel_place` FOREIGN KEY (`PlaceID`) REFERENCES `places` (`PlaceID`);

--
-- Contraintes pour la table `museum`
--
ALTER TABLE `museum`
  ADD CONSTRAINT `fk_museum_places` FOREIGN KEY (`PlaceID`) REFERENCES `places` (`PlaceID`);

--
-- Contraintes pour la table `park`
--
ALTER TABLE `park`
  ADD CONSTRAINT `park_ibfk_1` FOREIGN KEY (`PlaceID`) REFERENCES `places` (`PlaceID`);

--
-- Contraintes pour la table `places`
--
ALTER TABLE `places`
  ADD CONSTRAINT `places_ibfk_1` FOREIGN KEY (`CityID`) REFERENCES `cities` (`CityID`);

--
-- Contraintes pour la table `religious_sites`
--
ALTER TABLE `religious_sites`
  ADD CONSTRAINT `fk_religious_sites_places` FOREIGN KEY (`PlaceID`) REFERENCES `places` (`PlaceID`);

--
-- Contraintes pour la table `restaurant`
--
ALTER TABLE `restaurant`
  ADD CONSTRAINT `restaurant_ibfk_1` FOREIGN KEY (`PlaceID`) REFERENCES `places` (`PlaceID`);

--
-- Contraintes pour la table `savedplaces`
--
ALTER TABLE `savedplaces`
  ADD CONSTRAINT `savedplaces_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`),
  ADD CONSTRAINT `savedplaces_ibfk_2` FOREIGN KEY (`PlaceID`) REFERENCES `places` (`PlaceID`);

--
-- Contraintes pour la table `trip`
--
ALTER TABLE `trip`
  ADD CONSTRAINT `fk_trip_williyas` FOREIGN KEY (`WilliyaID`) REFERENCES `williyas` (`WilliyaID`),
  ADD CONSTRAINT `trip_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);

--
-- Contraintes pour la table `tripday`
--
ALTER TABLE `tripday`
  ADD CONSTRAINT `tripday_ibfk_1` FOREIGN KEY (`TripID`) REFERENCES `trip` (`TripID`);

--
-- Contraintes pour la table `tripplace`
--
ALTER TABLE `tripplace`
  ADD CONSTRAINT `tripplace_ibfk_1` FOREIGN KEY (`TripDayID`) REFERENCES `tripday` (`TripDayID`),
  ADD CONSTRAINT `tripplace_ibfk_2` FOREIGN KEY (`PlaceID`) REFERENCES `places` (`PlaceID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
