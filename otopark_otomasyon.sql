-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 06 Şub 2024, 23:49:11
-- Sunucu sürümü: 10.4.32-MariaDB
-- PHP Sürümü: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `otopark_otomasyon`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `arac_kayit`
--

CREATE TABLE `arac_kayit` (
  `arac_id` int(11) NOT NULL,
  `arac_plaka` varchar(30) NOT NULL,
  `arac_kat` varchar(30) NOT NULL,
  `arac_blok` varchar(30) NOT NULL,
  `arac_giris_tarih` datetime NOT NULL DEFAULT current_timestamp(),
  `arac_cikis_tarih` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `arac_kayit`
--

INSERT INTO `arac_kayit` (`arac_id`, `arac_plaka`, `arac_kat`, `arac_blok`, `arac_giris_tarih`, `arac_cikis_tarih`) VALUES
(1, '22 bf 22', 'KAT 2', 'B BLOK', '2024-02-07 01:42:06', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici_giris`
--

CREATE TABLE `kullanici_giris` (
  `id` int(11) NOT NULL,
  `adsoyad` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `sifre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `kullanici_giris`
--

INSERT INTO `kullanici_giris` (`id`, `adsoyad`, `mail`, `sifre`) VALUES
(1, 'Mehmet Reşit Akın', 'resit.akin96@gmail.com', '123456');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `arac_kayit`
--
ALTER TABLE `arac_kayit`
  ADD PRIMARY KEY (`arac_id`);

--
-- Tablo için indeksler `kullanici_giris`
--
ALTER TABLE `kullanici_giris`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `arac_kayit`
--
ALTER TABLE `arac_kayit`
  MODIFY `arac_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `kullanici_giris`
--
ALTER TABLE `kullanici_giris`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
