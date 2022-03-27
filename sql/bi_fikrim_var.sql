-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 27 Mar 2022, 10:39:16
-- Sunucu sürümü: 10.4.11-MariaDB
-- PHP Sürümü: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `bi_fikrim_var`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `havuz_parasi`
--

CREATE TABLE `havuz_parasi` (
  `para` int(11) NOT NULL,
  `max_para` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `project`
--

CREATE TABLE `project` (
  `id` int(5) NOT NULL,
  `project_name` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `goal_money` int(7) NOT NULL,
  `collected_money` int(7) NOT NULL,
  `user_id` int(5) NOT NULL,
  `like_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `project`
--

INSERT INTO `project` (`id`, `project_name`, `description`, `goal_money`, `collected_money`, `user_id`, `like_count`) VALUES
(3, 'Az Enerji Harcayan Manyetik Ocak', 'Bu projede basit bir mıknatıs sistemiyle oluşturulabilecek, çok fazla elektrik enerjisi ve doğal gaz kullanmadan evlerimizde kullanabileceğimiz ısıtıcı ocak yapmayı amaçladık. Projemizde öncelikle tab', 10000, 0, 26, 0),
(4, 'Deniz Üzerindeki Katı Atıkları Toplayan Akıllı Rob', 'Deniz üzerindeki katı atıkları toplamak için görüntü işleme yöntemini kullanarak gerçekleştirdiğimiz projemiz; karada hareket ettirilen robotların dışında denizde de etkin şekilde robot kullanımını ya', 25000, 0, 26, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user`
--

CREATE TABLE `user` (
  `id` int(5) NOT NULL,
  `name` varchar(20) NOT NULL,
  `surname` varchar(20) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL,
  `city` varchar(30) NOT NULL,
  `school` varchar(30) NOT NULL,
  `wallet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `user`
--

INSERT INTO `user` (`id`, `name`, `surname`, `mail`, `password`, `city`, `school`, `wallet`) VALUES
(26, 'Ziya Borahan', 'Çelik', 'ziya@gmail.com', '123', '35', ' ', 0);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Tablo için indeksler `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `project`
--
ALTER TABLE `project`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
