-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2025 at 04:08 PM
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
-- Database: `autumnmaple`
--

-- --------------------------------------------------------

--
-- Table structure for table `belian`
--

CREATE TABLE `belian` (
  `idBelian` int(11) NOT NULL,
  `idPelanggan` int(11) NOT NULL,
  `info_belian` text NOT NULL,
  `jumlah_harga` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `belian`
--

INSERT INTO `belian` (`idBelian`, `idPelanggan`, `info_belian`, `jumlah_harga`) VALUES
(12, 1, '', NULL),
(13, 1, '', NULL),
(14, 1, '', NULL),
(15, 1, '', NULL),
(16, 1, 'Cappuccino x 2', NULL),
(17, 1, 'Americano x 1', NULL),
(18, 1, 'Cappuccino x 1', NULL),
(19, 1, 'Cappuccino x 2', NULL),
(20, 1, 'Americano x 1, Cappuccino x 1', NULL),
(21, 1, 'Cappuccino x 1, Americano x 1, Espresso x 1', 31.00),
(22, 1, 'Cappuccino x 5', 65.00),
(23, 1, 'Cappuccino x 5, Americano x 5', 115.00),
(24, 1, 'Cappuccino x 1, Caffè Latte x 1', 27.00),
(25, 1, 'Caffè Latte x 3', 42.00),
(26, 1, 'Cappuccino x 3', 39.00),
(27, 1, 'Americano x 1, Cappuccino x 1', 23.00),
(28, 1, 'Classic Cheesecake x 1', 15.00);

-- --------------------------------------------------------

--
-- Table structure for table `meja`
--

CREATE TABLE `meja` (
  `noMeja` int(11) NOT NULL,
  `info` varchar(100) NOT NULL,
  `tersedia` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `meja`
--

INSERT INTO `meja` (`noMeja`, `info`, `tersedia`) VALUES
(1, 'Meja 1 - Untuk 2 orang', 1),
(2, 'Meja 2 - Untuk 4 orang', 1),
(3, 'Meja 3 - Untuk 2 orang', 1),
(4, 'Meja 4 - Untuk 6 orang', 1),
(5, 'Meja 5 - Untuk 4 orang', 1),
(6, 'Meja 6 - Untuk 2 orang', 1),
(7, 'Meja 7 - Untuk 4 orang', 1),
(8, 'Meja 8 - Untuk 2 orang', 1),
(9, 'Meja 9 - Untuk 6 orang', 1),
(10, 'Meja 10 - Untuk 4 orang', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL,
  `nomhp` varchar(15) NOT NULL,
  `namaPelanggan` varchar(100) NOT NULL,
  `emel` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `nomhp`, `namaPelanggan`, `emel`, `password`) VALUES
(1, '12312312312', 'Fish', 'abc@gmail.com', '$2y$10$UnBfw/LVQDxXC4zN3V3xROKg6FLb1bGPEpJWs2cJZ3MqjvKKUq8.O');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `bil` int(11) NOT NULL,
  `tarikh` date NOT NULL,
  `status` varchar(20) NOT NULL,
  `idPelanggan` int(11) NOT NULL,
  `noMeja` int(11) DEFAULT NULL,
  `cara` enum('Dine In','Take Away') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`bil`, `tarikh`, `status`, `idPelanggan`, `noMeja`, `cara`) VALUES
(28, '2025-03-18', 'Pending', 1, 1, 'Dine In'),
(29, '2025-03-18', 'Pending', 1, 1, 'Dine In'),
(31, '2025-03-18', 'Pending', 1, NULL, 'Take Away'),
(32, '2025-03-18', 'Pending', 1, NULL, 'Take Away'),
(33, '2025-03-18', 'Pending', 1, 1, 'Dine In'),
(34, '2025-03-18', 'Pending', 1, NULL, 'Take Away');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `idProduk` int(11) NOT NULL,
  `namaProduk` varchar(100) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `detail` text DEFAULT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`idProduk`, `namaProduk`, `kategori`, `harga`, `detail`, `gambar`) VALUES
(1, 'Espresso', 'kopi', 8.00, 'Satu tembakan kuat kopi tulen.', 'https://www.digitalassets.starbucks.eu/sites/starbucks-medialibrary/files/Espresso---Feb-2023.jpeg'),
(2, 'Americano', 'kopi', 10.00, 'Espresso dicairkan dengan air panas untuk rasa yang lebih ringan.', 'https://www.digitalassets.starbucks.eu/sites/starbucks-medialibrary/files/Americano---Feb-2023.jpeg'),
(3, 'Cappuccino', 'kopi', 13.00, 'Campuran seimbang espresso, susu kukus, dan buih.', 'https://www.digitalassets.starbucks.eu/sites/starbucks-medialibrary/files/Cappuccino---Feb-2023.jpeg'),
(4, 'Caffè Latte', 'kopi', 14.00, 'Espresso dengan susu kukus dan lapisan buih yang ringan.', 'https://www.digitalassets.starbucks.eu/sites/starbucks-medialibrary/files/Latte-Mug---Feb-2023.jpeg'),
(5, 'Flat White', 'kopi', 14.00, 'Susu kukus yang lembut di atas dua tembakan espresso.', 'https://www.digitalassets.starbucks.eu/sites/starbucks-medialibrary/files/Flat-White---Feb-2023.jpeg'),
(6, 'Caramel Macchiato', 'kopi', 16.00, 'Lapisan sirap vanila, espresso, dan sos karamel.', 'https://www.digitalassets.starbucks.eu/sites/starbucks-medialibrary/files/Caramel-Macchiato---Feb-2023.jpeg'),
(7, 'Mocha', 'kopi', 16.00, 'Espresso, sirap coklat, dan susu kukus dengan krim putar.', 'https://www.digitalassets.starbucks.eu/sites/starbucks-medialibrary/files/Mocha--Feb-2023.jpeg'),
(8, 'Espresso Macchiato', 'kopi', 9.00, 'Satu tembakan espresso dengan satu sudu susu kukus.', 'https://www.digitalassets.starbucks.eu/sites/starbucks-medialibrary/files/Espresso-Macchiato---Feb-2023.jpeg'),
(9, 'Espresso Con Panna', 'kopi', 10.00, 'Espresso ditambah dengan krim putar.', 'https://www.digitalassets.starbucks.eu/sites/starbucks-medialibrary/files/Espresso-Con-Pana---Feb-2023.jpeg'),
(10, 'Iced Americano', 'kopi', 10.00, 'Espresso sejuk dengan air di atas ais.', 'https://www.digitalassets.starbucks.eu/sites/starbucks-medialibrary/files/Iced-Americano---Feb-2023.jpeg'),
(11, 'Iced Latte', 'kopi', 14.00, 'Espresso dituangkan di atas ais dan susu.', 'https://www.digitalassets.starbucks.eu/sites/starbucks-medialibrary/files/Iced-Cafe-Latte---Feb-2023.jpeg'),
(12, 'Iced Caramel Macchiato', 'kopi', 16.00, 'Susu sejuk, ais, espresso, vanila, dan sos karamel.', 'https://www.digitalassets.starbucks.eu/sites/starbucks-medialibrary/files/Iced-Caramel-Macchiato---Feb-2023.jpeg'),
(13, 'Iced Mocha', 'kopi', 16.00, 'Espresso sejuk, coklat, susu, dan ais, ditambah dengan krim putar.', 'https://www.digitalassets.starbucks.eu/sites/starbucks-medialibrary/files/Iced-Mocha---Feb-2023.jpeg'),
(14, 'Iced Blonde Vanilla Latte', 'kopi', 0.00, 'Espresso blonde ringan, sirap vanila, susu, dan ais.', 'https://globalassets.starbucks.com/digitalassets/products/bev/SBX20190422_IcedVanillaLatte.jpg?impolicy=1by1_wide_topcrop_630'),
(15, 'Dark Roast Coffee', 'kopi', 8.00, 'Kopi drip panggang gelap yang kuat dan berani.', 'https://www.digitalassets.starbucks.eu/sites/starbucks-medialibrary/files/Fresh-Brewed-Coffee---Feb-2023.jpeg'),
(16, 'Caffè Misto', 'kopi', 12.00, 'Separuh kopi yang diseduh, separuh susu kukus.', 'https://www.digitalassets.starbucks.eu/sites/starbucks-medialibrary/files/Misto---Feb-2023.jpeg'),
(17, 'Cold Brew Coffee', 'kopi', 12.00, 'Kopi yang diseduh perlahan dan disajikan sejuk.', 'https://www.digitalassets.starbucks.eu/sites/starbucks-medialibrary/files/Cold-Brew---Feb-2023.jpeg'),
(18, 'Cold Brew Latte', 'kopi', 9.00, 'Latte yang diseduh sejuk dengan ais.', 'https://www.digitalassets.starbucks.eu/sites/starbucks-medialibrary/files/Cold-Brew-Latte--Feb-2023.jpeg'),
(19, 'Nitro Cold Brew', 'kopi', 14.00, 'Cold brew berkrim yang diinfusi dengan nitrogen untuk tekstur yang kaya.', 'https://globalassets.starbucks.com/digitalassets/products/bev/SBX20190410_NitroColdBrew.jpg?impolicy=1by1_wide_topcrop_630'),
(20, 'Classic Donut', 'roti', 6.00, 'Donut goreng klasik yang dilapisi dengan lapisan gula yang banyak, dengan interior yang lembut dan gebu.', 'https://www.digitalassets.starbucks.eu/sites/starbucks-medialibrary/files/CH-AT-MOP-Sugar-Donut.jpeg'),
(21, 'Plain Bagel', 'roti', 7.00, 'Bagel klasik yang lembut dan kenyal, sempurna untuk dipadankan dengan krim keju, mentega, atau dinikmati sendiri.', 'https://globalassets.starbucks.com/digitalassets/products/food/SBX20190715_PlainBagel.jpg?impolicy=1by1_medium_630'),
(22, 'Multigrain Bagel', 'roti', 7.50, 'Bagel yang sihat dan berkhasiat dibuat dengan campuran bijirin dan biji.', 'https://globalassets.starbucks.com/digitalassets/products/food/SBX20190821_EverythingBagel_US.jpg?impolicy=1by1_medium_630'),
(23, 'Ham & Cheese Roll', 'roti', 8.50, 'Roti gulung masin yang diisi dengan hirisan ham dan keju cair, dibakar hingga keemasan.', 'https://globalassets.starbucks.com/digitalassets/products/food/HamAndSwissCroissant.jpg?impolicy=1by1_medium_630'),
(24, 'Plain Scone', 'roti', 8.00, 'Scone klasik yang rapuh dengan sedikit rasa manis, sempurna apabila dipadankan dengan mentega atau jem.', 'https://globalassets.starbucks.com/digitalassets/products/food/SBX20230406_PetiteVanillaScone.jpg?impolicy=1by1_medium_630'),
(25, 'Blueberry Scone', 'roti', 9.00, 'Scone keemasan yang rapuh dengan blueberry segar untuk rasa buah yang menyegarkan dalam setiap gigitan.', 'https://globalassets.starbucks.com/digitalassets/products/food/SBX20181219_BlueberryScone.jpg?impolicy=1by1_medium_630'),
(26, 'Cheese Scone', 'roti', 9.00, 'Scone masin yang dibakar dengan keju cheddar tajam untuk snek yang lazat dengan sedikit kekayaan.', 'https://globalassets.starbucks.com/digitalassets/products/food/SBX20190422_PumpkinScone.jpg?impolicy=1by1_medium_630'),
(27, 'Raisin Scone', 'roti', 9.00, 'Scone yang lembut dan sedikit manis dengan kismis yang plump, sempurna untuk waktu teh.', 'https://globalassets.starbucks.com/digitalassets/products/food/SBX20200630_CranberryOrangeScone.jpg?impolicy=1by1_medium_630'),
(28, 'Cinnamon Roll', 'roti', 11.00, 'Gulung lembut dan gebu yang dipintal dengan banyak gula kayu manis dan ditambah dengan glas manis.', 'https://www.digitalassets.starbucks.eu/sites/starbucks-medialibrary/files/CH-AT-MOP-Cinnamon-Swirl.jpeg'),
(29, 'Chocolate Croissant', 'roti', 9.00, 'Croissant yang mentega dan berlapis yang diisi dengan coklat yang kaya dan halus, sempurna untuk snek ringan atau sarapan.', 'https://globalassets.starbucks.com/digitalassets/products/food/SBX20220607_ChocolateCroissant-onGreen.jpg?impolicy=1by1_medium_630'),
(30, 'Almond Croissant', 'roti', 10.00, 'Croissant yang halus dan keemasan diisi dengan pes badam manis, ditambah dengan hirisan badam.', 'https://globalassets.starbucks.com/digitalassets/products/food/SBX20190715_40001-AlmondCroissant.jpg?impolicy=1by1_medium_630'),
(31, 'Cheese Danish', 'roti', 10.00, 'Pastri Danish yang rapuh diisi dengan pengisian keju krim dan sedikit disalut untuk keseimbangan manis dan masin yang sempurna.', 'https://globalassets.starbucks.com/digitalassets/products/food/SBX20220125_CheeseDanish-onGreen.jpg?impolicy=1by1_medium_630'),
(32, 'Banana Nut Bread', 'roti', 12.00, 'Roti pisang yang lembap dan lembut dibuat dengan pisang masak dan walnut rangup untuk gabungan rasa yang menyenangkan.', 'https://globalassets.starbucks.com/digitalassets/products/food/SBX20190729_BananaNutBread_US.jpg?impolicy=1by1_medium_630'),
(33, 'Blueberry Muffin', 'roti', 10.00, 'Muffin lembut dan mentega yang dipenuhi dengan blueberry berair dan sedikit vanila untuk hidangan yang memuaskan.', 'https://globalassets.starbucks.com/digitalassets/products/food/SBX20220125_BlueberryMuffin_US.jpg?impolicy=1by1_medium_630'),
(34, 'Chocolate Chip Muffin', 'roti', 10.00, 'Muffin klasik yang rapuh dengan sedikit rasa manis, sempurna apabila dipadankan dengan mentega atau jem.', 'https://www.digitalassets.starbucks.eu/sites/starbucks-medialibrary/files/AT-MOP-Triple-Chocolate-Muffin.jpeg'),
(35, 'Classic Cheesecake', 'kek', 15.00, 'Cheesecake yang kaya dan krim dengan kerak biskut graham yang mentega, sempurna untuk indulgensi.', 'https://www.digitalassets.starbucks.eu/sites/starbucks-medialibrary/files/AT-MOP-New-York-Cheesecake.jpeg'),
(36, 'Tiramisu', 'kek', 16.00, 'Lapisan kek span yang direndam espresso, krim mascarpone, dan serbuk koko, sempurna untuk pencinta kopi.', 'https://www.starbucks.com.hk/media/catalog/product/4/c/4ce5ff0e-7946-4a65-83c4-f8983842f62d.jpg'),
(37, 'Red Velvet Cake', 'kek', 15.00, 'Kek lembap dan lembut dengan lapisan krim keju, menawarkan keseimbangan sempurna antara manis dan masam.', 'https://www.digitalassets.starbucks.eu/sites/starbucks-medialibrary/files/Red-Velvet-Loaf-Cake-_0.jpeg'),
(38, 'Chocolate Fudge Cake', 'kek', 16.00, 'Lapisan kek span coklat yang kaya diisi dengan frosting fudge coklat yang lembut.', 'https://www.starbucks.co.th/stb-media/2020/08/Chocolate-Cake-1080.png'),
(39, 'Carrot Cake', 'kek', 14.00, 'Kek lobak yang lembap dengan walnut dan frosting krim keju yang lazat.', 'https://www.digitalassets.starbucks.eu/sites/starbucks-medialibrary/files/Carrot-Cake_0.jpeg'),
(40, 'Lemon Loaf Cake', 'kek', 0.00, 'Kek lembap yang berperisa lemon dengan glas lemon yang masam, menawarkan letupan sitrus dalam setiap gigitan.', 'https://www.digitalassets.starbucks.eu/sites/starbucks-medialibrary/files/Lemon-Loaf-Cake---Feb-2023.jpeg'),
(41, 'Chocolate Brownie', 'kek', 13.00, 'Brownie yang kaya dan fudgy dengan kepingan coklat untuk hidangan yang memuaskan.', 'https://globalassets.starbucks.com/digitalassets/products/food/SBX20190715_DoubleChocolateChunkBrownie.jpg?impolicy=1by1_medium_630');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `belian`
--
ALTER TABLE `belian`
  ADD PRIMARY KEY (`idBelian`),
  ADD KEY `idPelanggan` (`idPelanggan`);

--
-- Indexes for table `meja`
--
ALTER TABLE `meja`
  ADD PRIMARY KEY (`noMeja`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `emel` (`emel`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`bil`),
  ADD KEY `idPelanggan` (`idPelanggan`),
  ADD KEY `noMeja` (`noMeja`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`idProduk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `belian`
--
ALTER TABLE `belian`
  MODIFY `idBelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `bil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `idProduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `belian`
--
ALTER TABLE `belian`
  ADD CONSTRAINT `belian_ibfk_1` FOREIGN KEY (`idPelanggan`) REFERENCES `pelanggan` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`idPelanggan`) REFERENCES `pelanggan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pesanan_ibfk_2` FOREIGN KEY (`noMeja`) REFERENCES `meja` (`noMeja`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
