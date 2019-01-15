-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2018 at 07:34 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `patient_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `assistant`
--

CREATE TABLE `assistant` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assistant`
--

INSERT INTO `assistant` (`id`, `name`, `email`, `password`, `type`) VALUES
(2, 'assistant', 'assistant@gmail.com', '12345678', 2),
(4, 'saaas', 'saasdsa', 'adsadsad', 1);

-- --------------------------------------------------------

--
-- Table structure for table `diseases`
--

CREATE TABLE `diseases` (
  `disease_id` int(11) NOT NULL,
  `disease_name` varchar(500) NOT NULL,
  `disease_description` varchar(1050) NOT NULL,
  `disease_remedy` varchar(1050) NOT NULL,
  `medicine_name` varchar(500) NOT NULL,
  `medicine_usage` varchar(1050) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diseases`
--

INSERT INTO `diseases` (`disease_id`, `disease_name`, `disease_description`, `disease_remedy`, `medicine_name`, `medicine_usage`) VALUES
(1, 'malaria', 'Your doctor will be able to diagnose malaria. During your appointment, your doctor will review your health history, including any recent travel to tropical climates. A physical exam will also be performed. Your doctor will be able to determine if you have an enlarged spleen or liver. If you have symptoms of malaria, your doctor may order additional blood tests to confirm your diagnosis.', 'Malaria can be a life-threatening condition, especially if you have P. falciparum. Treatment for the disease is typically provided in a hospital. Your doctor will prescribe medications based on the type of parasite that you have. In some instances, the medication prescribed may not clear the infection because of parasite resistance to drugs. If this occurs, your doctor may need to use more than one medication or change medications altogether to treat your condition. Additionally, certain types of malaria, such as P. vivax and P. ovale, have liver stages where the parasite can live in your body for an extended period of time and reactivate at a later date causing a relapse of the infection. If you are found to have one of these types of malaria, you will be given a second medication to prevent a relapse in the future.', '1.	Chloroquine (Aralen)\r\n2.	Quinine sulfate (Qualaquin)\r\n3.	Hydroxychloroquine (Plaquenil)\r\n4.	Mefloquine\r\n', '•	Chloroquine (Aralen)to be used after meals three times a at 6 hourly interval for 10 days\r\n•	Quinine sulfate (Qualaquin) to be used once daily for 7 days\r\n•	Hydroxychloroquineto be used once daily for 2 weeks\r\n•	Mefloquine to be used twice daily after meals for 3 days\r\n'),
(2, 'hypertension', 'Hypertension (HTN or HT), also known as high blood pressure (HBP), is a long-term medical condition in which the blood pressure in the arteries is persistently elevated. High blood pressure usually does not cause symptoms.Blood pressure is the force exerted by the blood against the walls of the blood vessels. The pressure depends on the work being done by the heart and the resistance of the blood vessels.While blood pressure is best regulated through the diet before it reaches the stage of hypertension, there is a range of treatment options. Lifestyle adjustments are the standard first-line treatment for hypertension.', 'Doctors recommend that patients with hypertension engage in 30 minutes of moderate-intensity, dynamic, aerobic exercise. This can include walking, jogging, cycling, or swimming on 5 to 7 days of the week.\r\n\r\n(i) Do not build up mental tension. \r\n(ii) Low fat diet should be taken.\r\n(iii) Weight of the body must be kept under control.\r\n(iv)Good eating habits should be cultivated.\r\n', '1.	Bumetanide (Bumex)\r\n2.	Chlorthalidone (Hygroton)\r\n3.	Chlorothiazide (Diuril)\r\n4.	Ethacrynate (Edecrin)\r\n5.	Furosemide (Lasix)\r\n', '•	Bumetanide (Bumex) to be taken twice daily with milk for 7 days\r\n•	Chlorthalidone (Hygroton)to be taken twice daily before lunch and dinner for 2 weeks\r\n•	Chlorothiazide (Diuril)to be used once daily for 7 days\r\n•	Ethacrynate (Edecrin) to be used once daily for 5 days\r\n'),
(3, 'hepatitisC', 'Hepatitis C: Inflammation of the liver due to the hepatitis C virus (HCV), which is usually spread via blood transfusion (rare), hemodialysis, and needle sticks. The damage hepatitis C does to the liver can lead to cirrhosis and its complications as well as cancer. Transmission of the virus by sexual contact is rare.', 'o	Take a few fresh leaves of Phyllanthus Niruri\r\no	Take a few fresh leaves of Cassia sophera\r\no	Wash the leaves and grind them into a fine paste\r\no	Swallow a teaspoon of this paste\r\no	Wash it down with a glass of warm water\r\no	Continue this process twice daily for 10 to 12 days\r\n', '1.	Pegylated interferon (Peg-IFN)\r\n2.	Ribavirin (RBV)\r\n3.	VICTRELIS (boceprevir) \r\n4.	INCIVEK (telaprevir)\r\n5.	OLYSIO (simeprevir)\r\n6.	SOVALDI (sofosbuvir)\r\n', 'Pegylated interferonto be used once daily for 2 weeks\r\nRibavirin (RBV)to be used twice daily on 12 hourly interval for 7 days\r\nINCIVEK (telaprevir)to be injected once daily for 4 days\r\n'),
(4, 'typhoid', 'Typhoid is an infection caused by the bacterium Salmonella typhimurium (S. typhi).The bacterium lives in the intestines and bloodstream of humans. It spreads between individuals by direct contact with the feces of an infected person. No animals carry this disease, so transmission is always human to human.\r\nIf untreated, around 1 in 5 cases of typhoid can be fatal. With treatment, fewer than 4 in 100 cases are fatal.\r\n', 'Treatment at home. If typhoid fever is diagnosed in its early stages, a course of antibiotic tablets may be prescribed for you. Most people need to take these for 7 to 14 days. Some strains of the Salmonella typhi bacteria that cause typhoid fever have developed a resistance to one or more types of antibiotics.', '1.	Chloramphenicol (Chloromycetin)\r\n2.	Amoxicillin (Trimox, Amoxil, Biomox)\r\n3.	Trimethoprim and sulfamethoxazole (Bactrim DS, Septra)\r\n4.	Ciprofloxacin (Cipro)\r\n5.	Azithromycin (Zithromax)\r\n', '•	Chloramphenicol (Chloromycetin)to be taken twice daily with milk for 7 days\r\n•	Amoxicillin (Trimox, Amoxil, Biomox)to be taken twice daily before lunch and dinner for 2 weeks\r\n•	Ciprofloxacin to be used once daily for 7 days\r\n•	Azithromycin (Zithromax)to be used once daily for 5 days\r\n'),
(5, 'migraine', 'A migraine is a primary headache disorder characterized by recurrent headaches that are moderate to severe. Typically, the headaches affect one half of the head, are pulsating in nature, and last from two to 72 hours. Associated symptoms may include nausea, vomiting, and sensitivity to light, sound, or smell.', 'Ice Packs: Always opt for cold rather than heat to stop migraine pain. \"Ice is an anti-inflammatory,\" says Carolyn Bernstein, MD, clinical director of Harvard Medical Faculty Physicians Comprehensive Headache Center at Beth Israel Deaconess Medical Center.\r\nSupplements: In a recent study, patients who took 400 mg of riboflavin (vitamin B2) daily experienced significantly fewer migraines after 3 months. CoQ10, another supplement, also proved effective in preventing migraines in a clinical study.\r\n', '1.	Ibuprofen\r\n2.	Aspirin \r\n3.	Acetaminophen \r\n4.	Naproxen\r\n', '•	Aspirin to be taken twice daily with milk for 7 days\r\n•	Acetaminophen to be taken twice daily before lunch and dinner for 2 weeks\r\n•	naproxen to be used once daily for 7 days\r\n•	Decloron (injection) to be injected once daily for 4 days\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `disease_symtoms`
--

CREATE TABLE `disease_symtoms` (
  `id` int(11) NOT NULL,
  `symtoms_id` int(25) NOT NULL,
  `disease_id` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `disease_symtoms`
--

INSERT INTO `disease_symtoms` (`id`, `symtoms_id`, `disease_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 6, 1),
(7, 7, 1),
(8, 8, 2),
(9, 9, 2),
(10, 10, 2),
(11, 11, 2),
(12, 12, 2),
(13, 13, 2),
(14, 14, 2),
(15, 15, 3),
(16, 16, 3),
(17, 17, 3),
(18, 18, 3),
(19, 19, 3),
(20, 20, 3),
(21, 21, 3),
(22, 3, 4),
(23, 22, 4),
(24, 23, 4),
(25, 24, 4),
(26, 25, 4),
(27, 26, 4),
(28, 27, 4);

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `name`, `email`, `password`, `type`) VALUES
(1, 'doctor', 'doctor@gmail.com', '12345678', 1),
(4, 'ali12', 'ali1@gmail.com', 'ali12345', 1),
(5, 'fhjgfhf', 'fjhg@gmail.com', 'asdf1234', 1);

-- --------------------------------------------------------

--
-- Table structure for table `medical_assistant`
--

CREATE TABLE `medical_assistant` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `cnic` int(255) NOT NULL,
  `disease_name` varchar(255) NOT NULL,
  `disease_description` varchar(1050) NOT NULL,
  `disease_remedy` varchar(1050) NOT NULL,
  `medicine_name` varchar(1050) NOT NULL,
  `medicine_usage` varchar(1050) NOT NULL,
  `doctor_message` varchar(1050) NOT NULL,
  `illness` varchar(1050) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medical_assistant`
--

INSERT INTO `medical_assistant` (`id`, `name`, `cnic`, `disease_name`, `disease_description`, `disease_remedy`, `medicine_name`, `medicine_usage`, `doctor_message`, `illness`) VALUES
(1, 'amiro', 0, 'malaria', 'Your doctor will be able to diagnose malaria. During your appointment, your doctor will review your health history, including any recent travel to tropical climates. A physical exam will also be performed. Your doctor will be able to determine if you have an enlarged spleen or liver. If you have symptoms of malaria, your doctor may order additional blood tests to confirm your diagnosis.', 'Malaria can be a life-threatening condition, especially if you have P. falciparum. Treatment for the disease is typically provided in a hospital. Your doctor will prescribe medications based on the type of parasite that you have. In some instances, the medication prescribed may not clear the infection because of parasite resistance to drugs. If this occurs, your doctor may need to use more than one medication or change medications altogether to treat your condition. Additionally, certain types of malaria, such as P. vivax and P. ovale, have liver stages where the parasite can live in your body for an extended period of time and reactivate at a later date causing a relapse of the infection. If you are found to have one of these types of malaria, you will be given a second medication to prevent a relapse in the future.', '1.	Chloroquine (Aralen)\r\n2.	Quinine sulfate (Qualaquin)\r\n3.	Hydroxychloroquine (Plaquenil)\r\n4.	Mefloquine\r\n', '•	Chloroquine (Aralen)to be used after meals three times a at 6 hourly interval for 10 days\r\n•	Quinine sulfate (Qualaquin) to be used once daily for 7 days\r\n•	Hydroxychloroquineto be used once daily for 2 weeks\r\n•	Mefloquine to be used twice daily after meals for 3 days\r\n', 'dsadsadasdas', ''),
(2, 'khan', 0, 'malaria', 'Your doctor will be able to diagnose malaria. During your appointment, your doctor will review your health history, including any recent travel to tropical climates. A physical exam will also be performed. Your doctor will be able to determine if you have an enlarged spleen or liver. If you have symptoms of malaria, your doctor may order additional blood tests to confirm your diagnosis.', 'Malaria can be a life-threatening condition, especially if you have P. falciparum. Treatment for the disease is typically provided in a hospital. Your doctor will prescribe medications based on the type of parasite that you have. In some instances, the medication prescribed may not clear the infection because of parasite resistance to drugs. If this occurs, your doctor may need to use more than one medication or change medications altogether to treat your condition. Additionally, certain types of malaria, such as P. vivax and P. ovale, have liver stages where the parasite can live in your body for an extended period of time and reactivate at a later date causing a relapse of the infection. If you are found to have one of these types of malaria, you will be given a second medication to prevent a relapse in the future.', '1.	Chloroquine (Aralen)\r\n2.	Quinine sulfate (Qualaquin)\r\n3.	Hydroxychloroquine (Plaquenil)\r\n4.	Mefloquine\r\n', '•	Chloroquine (Aralen)to be used after meals three times a at 6 hourly interval for 10 days\r\n•	Quinine sulfate (Qualaquin) to be used once daily for 7 days\r\n•	Hydroxychloroquineto be used once daily for 2 weeks\r\n•	Mefloquine to be used twice daily after meals for 3 days\r\n', 'szgadhasgdhasg', ''),
(3, 'sam', 0, 'malaria', 'Your doctor will be able to diagnose malaria. During your appointment, your doctor will review your health history, including any recent travel to tropical climates. A physical exam will also be performed. Your doctor will be able to determine if you have an enlarged spleen or liver. If you have symptoms of malaria, your doctor may order additional blood tests to confirm your diagnosis.', 'Malaria can be a life-threatening condition, especially if you have P. falciparum. Treatment for the disease is typically provided in a hospital. Your doctor will prescribe medications based on the type of parasite that you have. In some instances, the medication prescribed may not clear the infection because of parasite resistance to drugs. If this occurs, your doctor may need to use more than one medication or change medications altogether to treat your condition. Additionally, certain types of malaria, such as P. vivax and P. ovale, have liver stages where the parasite can live in your body for an extended period of time and reactivate at a later date causing a relapse of the infection. If you are found to have one of these types of malaria, you will be given a second medication to prevent a relapse in the future.', '1.	Chloroquine (Aralen)\r\n2.	Quinine sulfate (Qualaquin)\r\n3.	Hydroxychloroquine (Plaquenil)\r\n4.	Mefloquine\r\n', '•	Chloroquine (Aralen)to be used after meals three times a at 6 hourly interval for 10 days\r\n•	Quinine sulfate (Qualaquin) to be used once daily for 7 days\r\n•	Hydroxychloroquineto be used once daily for 2 weeks\r\n•	Mefloquine to be used twice daily after meals for 3 days\r\n', 'hfhchcvc', ''),
(4, 'sam', 0, 'malaria', 'Your doctor will be able to diagnose malaria. During your appointment, your doctor will review your health history, including any recent travel to tropical climates. A physical exam will also be performed. Your doctor will be able to determine if you have an enlarged spleen or liver. If you have symptoms of malaria, your doctor may order additional blood tests to confirm your diagnosis.', 'Malaria can be a life-threatening condition, especially if you have P. falciparum. Treatment for the disease is typically provided in a hospital. Your doctor will prescribe medications based on the type of parasite that you have. In some instances, the medication prescribed may not clear the infection because of parasite resistance to drugs. If this occurs, your doctor may need to use more than one medication or change medications altogether to treat your condition. Additionally, certain types of malaria, such as P. vivax and P. ovale, have liver stages where the parasite can live in your body for an extended period of time and reactivate at a later date causing a relapse of the infection. If you are found to have one of these types of malaria, you will be given a second medication to prevent a relapse in the future.', '1.	Chloroquine (Aralen)\r\n2.	Quinine sulfate (Qualaquin)\r\n3.	Hydroxychloroquine (Plaquenil)\r\n4.	Mefloquine\r\n', '•	Chloroquine (Aralen)to be used after meals three times a at 6 hourly interval for 10 days\r\n•	Quinine sulfate (Qualaquin) to be used once daily for 7 days\r\n•	Hydroxychloroquineto be used once daily for 2 weeks\r\n•	Mefloquine to be used twice daily after meals for 3 days\r\n', 'dsadasd', ''),
(5, 'services1', 0, 'malaria', 'Your doctor will be able to diagnose malaria. During your appointment, your doctor will review your health history, including any recent travel to tropical climates. A physical exam will also be performed. Your doctor will be able to determine if you have an enlarged spleen or liver. If you have symptoms of malaria, your doctor may order additional blood tests to confirm your diagnosis.', 'Malaria can be a life-threatening condition, especially if you have P. falciparum. Treatment for the disease is typically provided in a hospital. Your doctor will prescribe medications based on the type of parasite that you have. In some instances, the medication prescribed may not clear the infection because of parasite resistance to drugs. If this occurs, your doctor may need to use more than one medication or change medications altogether to treat your condition. Additionally, certain types of malaria, such as P. vivax and P. ovale, have liver stages where the parasite can live in your body for an extended period of time and reactivate at a later date causing a relapse of the infection. If you are found to have one of these types of malaria, you will be given a second medication to prevent a relapse in the future.', '1.	Chloroquine (Aralen)\r\n2.	Quinine sulfate (Qualaquin)\r\n3.	Hydroxychloroquine (Plaquenil)\r\n4.	Mefloquine\r\n', '•	Chloroquine (Aralen)to be used after meals three times a at 6 hourly interval for 10 days\r\n•	Quinine sulfate (Qualaquin) to be used once daily for 7 days\r\n•	Hydroxychloroquineto be used once daily for 2 weeks\r\n•	Mefloquine to be used twice daily after meals for 3 days\r\n', 'fgdcfdf', ''),
(6, 'aaaa', 0, 'malaria', 'Your doctor will be able to diagnose malaria. During your appointment, your doctor will review your health history, including any recent travel to tropical climates. A physical exam will also be performed. Your doctor will be able to determine if you have an enlarged spleen or liver. If you have symptoms of malaria, your doctor may order additional blood tests to confirm your diagnosis.', 'Malaria can be a life-threatening condition, especially if you have P. falciparum. Treatment for the disease is typically provided in a hospital. Your doctor will prescribe medications based on the type of parasite that you have. In some instances, the medication prescribed may not clear the infection because of parasite resistance to drugs. If this occurs, your doctor may need to use more than one medication or change medications altogether to treat your condition. Additionally, certain types of malaria, such as P. vivax and P. ovale, have liver stages where the parasite can live in your body for an extended period of time and reactivate at a later date causing a relapse of the infection. If you are found to have one of these types of malaria, you will be given a second medication to prevent a relapse in the future.', '1.	Chloroquine (Aralen)\r\n2.	Quinine sulfate (Qualaquin)\r\n3.	Hydroxychloroquine (Plaquenil)\r\n4.	Mefloquine\r\n', '•	Chloroquine (Aralen)to be used after meals three times a at 6 hourly interval for 10 days\r\n•	Quinine sulfate (Qualaquin) to be used once daily for 7 days\r\n•	Hydroxychloroquineto be used once daily for 2 weeks\r\n•	Mefloquine to be used twice daily after meals for 3 days\r\n', 'tyatrytrsy', ''),
(7, 'ali', 0, 'malaria', 'Your doctor will be able to diagnose malaria. During your appointment, your doctor will review your health history, including any recent travel to tropical climates. A physical exam will also be performed. Your doctor will be able to determine if you have an enlarged spleen or liver. If you have symptoms of malaria, your doctor may order additional blood tests to confirm your diagnosis.', 'Malaria can be a life-threatening condition, especially if you have P. falciparum. Treatment for the disease is typically provided in a hospital. Your doctor will prescribe medications based on the type of parasite that you have. In some instances, the medication prescribed may not clear the infection because of parasite resistance to drugs. If this occurs, your doctor may need to use more than one medication or change medications altogether to treat your condition. Additionally, certain types of malaria, such as P. vivax and P. ovale, have liver stages where the parasite can live in your body for an extended period of time and reactivate at a later date causing a relapse of the infection. If you are found to have one of these types of malaria, you will be given a second medication to prevent a relapse in the future.', '1.	Chloroquine (Aralen)\r\n2.	Quinine sulfate (Qualaquin)\r\n3.	Hydroxychloroquine (Plaquenil)\r\n4.	Mefloquine\r\n', '•	Chloroquine (Aralen)to be used after meals three times a at 6 hourly interval for 10 days\r\n•	Quinine sulfate (Qualaquin) to be used once daily for 7 days\r\n•	Hydroxychloroquineto be used once daily for 2 weeks\r\n•	Mefloquine to be used twice daily after meals for 3 days\r\n', 'sahjashdj', 'umer'),
(8, 'ali', 0, 'malaria', 'Your doctor will be able to diagnose malaria. During your appointment, your doctor will review your health history, including any recent travel to tropical climates. A physical exam will also be performed. Your doctor will be able to determine if you have an enlarged spleen or liver. If you have symptoms of malaria, your doctor may order additional blood tests to confirm your diagnosis.', 'Malaria can be a life-threatening condition, especially if you have P. falciparum. Treatment for the disease is typically provided in a hospital. Your doctor will prescribe medications based on the type of parasite that you have. In some instances, the medication prescribed may not clear the infection because of parasite resistance to drugs. If this occurs, your doctor may need to use more than one medication or change medications altogether to treat your condition. Additionally, certain types of malaria, such as P. vivax and P. ovale, have liver stages where the parasite can live in your body for an extended period of time and reactivate at a later date causing a relapse of the infection. If you are found to have one of these types of malaria, you will be given a second medication to prevent a relapse in the future.', '1.	Chloroquine (Aralen)\r\n2.	Quinine sulfate (Qualaquin)\r\n3.	Hydroxychloroquine (Plaquenil)\r\n4.	Mefloquine\r\n', '•	Chloroquine (Aralen)to be used after meals three times a at 6 hourly interval for 10 days\r\n•	Quinine sulfate (Qualaquin) to be used once daily for 7 days\r\n•	Hydroxychloroquineto be used once daily for 2 weeks\r\n•	Mefloquine to be used twice daily after meals for 3 days\r\n', 'sahjashdj', 'umer'),
(9, 'ali', 2147483647, 'malaria', 'Your doctor will be able to diagnose malaria. During your appointment, your doctor will review your health history, including any recent travel to tropical climates. A physical exam will also be performed. Your doctor will be able to determine if you have an enlarged spleen or liver. If you have symptoms of malaria, your doctor may order additional blood tests to confirm your diagnosis.', 'Malaria can be a life-threatening condition, especially if you have P. falciparum. Treatment for the disease is typically provided in a hospital. Your doctor will prescribe medications based on the type of parasite that you have. In some instances, the medication prescribed may not clear the infection because of parasite resistance to drugs. If this occurs, your doctor may need to use more than one medication or change medications altogether to treat your condition. Additionally, certain types of malaria, such as P. vivax and P. ovale, have liver stages where the parasite can live in your body for an extended period of time and reactivate at a later date causing a relapse of the infection. If you are found to have one of these types of malaria, you will be given a second medication to prevent a relapse in the future.', '1.	Chloroquine (Aralen)\r\n2.	Quinine sulfate (Qualaquin)\r\n3.	Hydroxychloroquine (Plaquenil)\r\n4.	Mefloquine\r\n', '•	Chloroquine (Aralen)to be used after meals three times a at 6 hourly interval for 10 days\r\n•	Quinine sulfate (Qualaquin) to be used once daily for 7 days\r\n•	Hydroxychloroquineto be used once daily for 2 weeks\r\n•	Mefloquine to be used twice daily after meals for 3 days\r\n', 'sggsadf', 'kdkdkfdsnmfndsmanf'),
(10, 'ali', 2147483647, 'malaria', 'Your doctor will be able to diagnose malaria. During your appointment, your doctor will review your health history, including any recent travel to tropical climates. A physical exam will also be performed. Your doctor will be able to determine if you have an enlarged spleen or liver. If you have symptoms of malaria, your doctor may order additional blood tests to confirm your diagnosis.', 'Malaria can be a life-threatening condition, especially if you have P. falciparum. Treatment for the disease is typically provided in a hospital. Your doctor will prescribe medications based on the type of parasite that you have. In some instances, the medication prescribed may not clear the infection because of parasite resistance to drugs. If this occurs, your doctor may need to use more than one medication or change medications altogether to treat your condition. Additionally, certain types of malaria, such as P. vivax and P. ovale, have liver stages where the parasite can live in your body for an extended period of time and reactivate at a later date causing a relapse of the infection. If you are found to have one of these types of malaria, you will be given a second medication to prevent a relapse in the future.', '1.	Chloroquine (Aralen)\r\n2.	Quinine sulfate (Qualaquin)\r\n3.	Hydroxychloroquine (Plaquenil)\r\n4.	Mefloquine\r\n', '•	Chloroquine (Aralen)to be used after meals three times a at 6 hourly interval for 10 days\r\n•	Quinine sulfate (Qualaquin) to be used once daily for 7 days\r\n•	Hydroxychloroquineto be used once daily for 2 weeks\r\n•	Mefloquine to be used twice daily after meals for 3 days\r\n', 'fdhdghfdhgf', 'shadjdgshadgsha');

-- --------------------------------------------------------

--
-- Table structure for table `medical_history`
--

CREATE TABLE `medical_history` (
  `id` int(11) NOT NULL,
  `illness` varchar(1050) NOT NULL,
  `reporting_date` date NOT NULL,
  `patient_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medical_history`
--

INSERT INTO `medical_history` (`id`, `illness`, `reporting_date`, `patient_id`) VALUES
(1, 'sasdsdsadasda', '2018-05-11', 139),
(2, 'ali', '2018-05-11', 140),
(3, 'ali', '2018-05-11', 140),
(4, 'ali', '2018-05-11', 140),
(5, 'ali', '2018-05-11', 140),
(6, 'ali', '2018-05-11', 140),
(7, 'ali', '2018-05-11', 140),
(8, 'umer', '2018-05-11', 141),
(9, 'shadjdgshadgsha', '2018-05-12', 143),
(10, 'shadjdgshadgsha', '2018-05-12', 143),
(11, 'shadjdgshadgsha', '2018-05-12', 143),
(12, 'asffsghfgfasgdfg', '2018-05-12', 191),
(13, 'asffsghfgfasgdfg', '2018-05-12', 191),
(14, 'asffsghfgfasgdfg', '2018-05-12', 191),
(15, 'asffsghfgfasgdfg', '2018-05-12', 191),
(16, 'asffsghfgfasgdfg', '2018-05-12', 191),
(17, 'asffsghfgfasgdfg', '2018-05-12', 191),
(18, 'kdkdkfdsnmfndsmanf', '2018-05-13', 195),
(19, '', '2018-05-13', 199),
(20, '', '2018-05-13', 199),
(21, '', '2018-05-13', 199),
(22, '', '2018-05-13', 199);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `assitant_id` int(11) NOT NULL,
  `admin_read_status` tinyint(1) NOT NULL,
  `emergency` tinyint(1) NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `title`, `message`, `assitant_id`, `admin_read_status`, `emergency`, `created_date`) VALUES
(1, 'New Disease check', 'new disease checked', 1, 1, 0, '2018-05-02'),
(2, 'New Disease check', 'new disease checked', 1, 1, 0, '2018-05-02'),
(3, 'New Disease check', 'new disease checked', 1, 1, 0, '2018-05-02'),
(4, 'New Disease', 'New Disease', 3, 1, 1, '0000-00-00'),
(5, 'New Disease', 'New Disease', 4, 1, 1, '0000-00-00'),
(6, 'New Patient Check', 'New Patient Checked', 5, 1, 1, '2005-08-18'),
(7, 'New Patient Check', 'New Patient Checked', 6, 1, 1, '0000-00-00'),
(8, 'New Patient Check', 'New Patient Checked', 7, 1, 1, '2008-05-18'),
(9, 'New Patient Check', 'New Patient Checked', 8, 1, 1, '2018-05-08'),
(10, 'New Patient Check', 'New Patient Checked', 9, 1, 1, '2018-05-08'),
(11, 'New Patient Check', 'New Patient Checked', 10, 1, 1, '2018-05-08'),
(12, 'New Patient Check', 'New Patient Checked', 10, 1, 1, '2018-05-08'),
(13, 'New Disease check', 'new disease checked', 1, 1, 0, '2018-05-02'),
(14, 'New Patient Check', 'New Patient Checked', 11, 1, 1, '2018-05-08'),
(15, 'New Patient Check', 'New Patient Checked', 12, 1, 0, '2018-05-09'),
(16, 'New Patient Check', 'New Patient Checked', 13, 1, 1, '2018-05-09'),
(17, 'New Patient Check', 'New Patient Checked', 14, 1, 0, '2018-05-11'),
(18, 'New Patient Check', 'New Patient Checked', 15, 1, 0, '2018-05-11'),
(19, 'New Patient Check', 'New Patient Checked', 16, 1, 1, '2018-05-12'),
(20, 'New Patient Check', 'New Patient Checked', 17, 1, 0, '2018-05-12'),
(21, 'New Patient Check', 'New Patient Checked', 18, 1, 0, '2018-05-13'),
(22, 'New Patient Check', 'New Patient Checked', 19, 0, 0, '2018-05-13');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `cnic` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `phone` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `name`, `address`, `cnic`, `gender`, `phone`) VALUES
(1, 'amir', 'I 9/4 islamabad.', '1234567890124', 'male', 12345678),
(3, 'aila', 'I 10/4 islamabad.', '2145454545645', 'female', 2147483647),
(4, 'umer', 'St#35B, I-9/4 islamabad.', '4554564564564', 'male', 2147483647),
(5, 'ali', 'I 10/4 islamabad.', '1234567890124', 'male', 12345678),
(6, 'ali', 'I 10/4 islamabad.', '1234567890124', 'male', 12345678),
(7, 'ali', 'I 10/4 islamabad.', '1234567890124', 'female', 12345678),
(8, 'ali', 'I 10/4 islamabad.', '1234567890124', 'female', 12345678),
(9, 'ali', 'I 10/4 islamabad.', '1234567890124', 'female', 12345678),
(10, 'ali', 'I 10/4 islamabad.', '1234567890124', 'female', 12345678),
(11, 'ali', 'I 10/4 islamabad.', '1234567890124', 'female', 12345678),
(12, 'ali', 'I 10/4 islamabad.', '1234567890124', 'female', 12345678),
(13, 'ali', 'I 10/4 islamabad.', '1234567890124', 'female', 12345678),
(14, 'ali', 'I 10/4 islamabad.', '1234567890124', 'female', 12345678),
(15, 'ali', 'I 10/4 islamabad.', '1234567890124', 'female', 12345678),
(16, 'ali', 'I 10/4 islamabad.', '1234567890124', 'female', 12345678),
(17, 'ali', 'I 10/4 islamabad.', '1234567890124', 'female', 12345678),
(18, 'basit', 'I 10/4 islamabad.', '1234567890124', 'male', 232323),
(19, 'basit', 'I 10/4 islamabad.', '1234567890124', 'male', 232323),
(20, 'bilal', 'I 10/4 islamabad.', '1234567890124', 'male', 12345678),
(21, 'bilal', 'I 10/4 islamabad.', '1234567890124', 'male', 12345678),
(22, 'bilal', 'I 10/4 islamabad.', '1234567890124', 'male', 12345678),
(23, 'bilal', 'I 10/4 islamabad.', '1234567890124', 'male', 12345678),
(24, 'bilal', 'I 10/4 islamabad.', '1234567890124', 'male', 12345678),
(25, 'bilal', 'I 10/4 islamabad.', '1234567890124', 'male', 12345678),
(26, 'sam', 'I 9/4 islamabad.', '1234567890124', 'male', 12345678),
(27, 'ali', 'I 10/4 islamabad.', '1234567890124', 'male', 12345678),
(28, 'rtrt', 'r', 'rt', 'male', 0),
(29, 'yuyu', 't', 'ytrt', 'male', 0),
(30, 'rtr', 'rtrt', 'rt', 'male', 0),
(31, 'as', 'g', 'hgh', 'male', 0),
(32, 'as', 'g', 'hgh', 'male', 0),
(33, 'as', 'g', 'hgh', 'male', 0),
(34, 'as', 'g', 'hgh', 'male', 0),
(35, 'as', 'g', 'hgh', 'male', 0),
(36, 'as', 'g', 'hgh', 'male', 0),
(37, 'nb', 'b', '', 'male', 0),
(38, '', '', '', 'male', 0),
(39, 'erre', 'ewrwer', '233322132', 'male', 3123213),
(40, 'sami', 'I 10/4 islamabad.', '2145454545645', 'male', 12345678),
(41, 'sami', 'I 10/4 islamabad.', '1234567890124', 'male', 21321312),
(42, 'sami', 'I 10/4 islamabad.', '1234567890124', 'male', 21321312),
(43, 'sami', 'I 9/4 islamabad.', '1234567890124', 'male', 12345678),
(44, 'sami', 'I 9/4 islamabad.', '1234567890124', 'male', 12345678),
(45, 'ali', 'I 10/4 islamabad.', '1234567890124', 'male', 12345678),
(46, 'ali', 'I 10/4 islamabad.', '1234567890124', 'male', 12345678),
(47, 'osama', 'I 10/4 islamabad.', '1234567890124', 'male', 12345678),
(48, 'khan', 'I 9/4 islamabad.', '1234567890124', 'male', 12345678),
(49, 'khan', 'I 9/4 islamabad.', '1234567890124', 'male', 12345678),
(50, 'khan', 'I 9/4 islamabad.', '1234567890124', 'male', 12345678),
(51, 'khan', 'I 9/4 islamabad.', '1234567890124', 'male', 12345678),
(52, 'khan', 'I 9/4 islamabad.', '1234567890124', 'male', 12345678),
(53, 'khan', 'I 10/4 islamabad.', '1234567890124', 'male', 12345678),
(54, 'khan', 'I 10/4 islamabad.', '1234567890124', 'male', 12345678),
(55, 'khan', 'I 10/4 islamabad.', '1234567890124', 'male', 12345678),
(56, 'ali', 'I 10/4 islamabad.', '1234567890124', 'male', 12345678),
(57, 'ali', 'I 10/4 islamabad.', '1234567890124', 'male', 12345678),
(58, 'ali', 'I 10/4 islamabad.', '37405-6262656-1', 'male', 12345678),
(59, 'ali', 'I 10/4 islamabad.', '37405-6262656-1', 'male', 12345678),
(60, 'ali', 'I 10/4 islamabad.', '37405-6262656-1', 'male', 12345678),
(61, 'khan', 'I 10/4 islamabad.', '1234567890124', 'male', 12345678),
(62, 'khan', 'I 10/4 islamabad.', '1234567890124', 'male', 12345678),
(63, 'ali', 'I 9/4 islamabad.', '1234567890124', 'male', 12345678),
(64, 'khan', 'I 10/4 islamabad.', '1234567890124', 'male', 12345678),
(65, 'ali', 'I 10/4 islamabad.', '1234567890124', 'male', 12345678),
(66, 'ali', 'I 10/4 islamabad.', '1234567890124', 'male', 12345678),
(67, 'sami', 'I 10/4 islamabad.', '1234567890124', 'male', 12345678),
(68, 'sufiyan', 'I 9/4 islamabad.', '2145454545645', 'male', 12345678),
(69, 'ali', 'I 9/4 islamabad.', '1234567890124', 'male', 12345678),
(70, 'ali', 'I 9/4 islamabad.', '1234567890124', 'male', 12345678),
(71, 'sas', 'dsdsad', '', 'male', 0),
(72, 'khan', 'I 9/4 islamabad.', '2145454545645', 'male', 12345678),
(73, 'khan', 'I 9/4 islamabad.', '2145454545645', 'male', 12345678),
(74, 'khan', 'I 10/4 islamabad.', '2145454545645', 'male', 12345678),
(75, 'khan', 'I 10/4 islamabad.', '2145454545645', 'male', 12345678),
(76, '', '', '', 'male', 0),
(77, 'khan', 'I 9/4 islamabad.', '2145454545645', 'male', 12345678),
(78, 'khan', 'I 10/4 islamabad.', '2145454545645', 'male', 12345678),
(79, 'ali', 'I 9/4 islamabad.', '2145454545645', 'male', 12345678),
(80, 'khan', 'I 10/4 islamabad.', '1234567890124', 'male', 12345678),
(81, 'khan', 'I 10/4 islamabad.', '1234567890124', 'male', 12345678),
(82, 'khan', 'I 10/4 islamabad.', '3740563636561', 'male', 12345678),
(83, 'khan', 'I 10/4 islamabad.', '3740563636561', 'male', 12345678),
(84, 'khan', 'I 10/4 islamabad.', '3740563636561', 'male', 12345678),
(85, 'sufiyan', 'I 10/4 islamabad.', '3740563636561', 'male', 12345678),
(86, 'ali', 'I 9/4 islamabad.', '2145454545645', 'male', 12345678),
(87, 'ali', 'I 9/4 islamabad.', '2145454545645', 'male', 12345678),
(88, 'sasa', 'I 10/4 islamabad.', '2145454545645', 'male', 12345678),
(89, 'umer', 'I 10/4 islamabad.', '3740563636561', 'male', 12345678),
(90, 'osama', 'I 10/4 islamabad.', '2145454545645', 'male', 12345678),
(91, 'wahab', 'I 10/4 islamabad.', '2145454545645', 'male', 12345678),
(92, 'amiro', 'I 9/4 islamabad.', '2145454545645', 'male', 12345678),
(93, 'amiro', 'I 10/4 islamabad.', '2145454545645', 'male', 12345678),
(94, 'amiro', 'I 10/4 islamabad.', '2145454545645', 'male', 12345678),
(95, 'ali', 'I 10/4 islamabad.', '2145454545645', 'male', 12345678),
(96, 'ali', 'I 10/4 islamabad.', '2145454545645', 'male', 12345678),
(97, 'sam', 'I 10/4 islamabad.', '2145454545645', 'male', 12345678),
(98, 'ali', 'I 10/4 islamabad.', '2145454545645', 'male', 12345678),
(99, 'khan', 'I 10/4 islamabad.', '1234567890124', 'male', 12345678),
(100, 'khan', 'I 9/4 islamabad.', '2145454545645', 'male', 12345678),
(101, 'sas', 'sdda', 'sdadas', 'male', 0),
(102, 'sas', 'sdda', 'sdadas', 'male', 0),
(103, 'services1', 'I 10/4 islamabad.', '3740563636561', 'male', 12345678),
(104, '', '', '', 'male', 0),
(105, '', '', '', 'male', 0),
(106, '', '', '', 'male', 0),
(107, '', '', '', 'male', 0),
(108, '', '', '', 'male', 0),
(109, 'ali', 'i 10 ', '11111111111', 'male', 111111111),
(110, '11111', 'wqeqwewqewqeqwe', '1111111', 'male', 2147483647),
(111, '11111', 'SASASADS', '344234234234234', 'male', 2147483647),
(112, '1111111', 'sadasdasd', '1111111111111', 'male', 2147483647),
(113, 'qqqqq', '', '', 'male', 0),
(114, 'aaa', '', '', 'male', 0),
(115, 'assas', '', '', 'male', 0),
(116, 'aaaa', '', '', 'male', 0),
(117, 'qqq', '', '', 'male', 0),
(118, 'aaaaa', '', '', 'male', 0),
(119, '1111', 'qwewqq', '1111111111111', 'male', 2147483647),
(120, '111111', 'i 10', '1111111111111', 'male', 2147483647),
(121, 'aaaaa', 'i islamabad', '1111111111111', 'male', 2147483647),
(122, 'aaaaa', 'i islamabad', '1111111111111', 'male', 2147483647),
(123, 'aaaaa', 'i islamabad', '1111111111111', 'male', 2147483647),
(124, 'aaaaa', 'i islamabad', '1111111111111', 'male', 2147483647),
(125, 'aaaaa', 'i islamabad', '1111111111111', 'male', 2147483647),
(126, 'aaaaa', 'i islamabad', '1111111111111', 'male', 2147483647),
(127, 'aaaaa', 'i islamabad', '1111111111111', 'male', 2147483647),
(128, 'aaaaa', 'i islamabad', '1111111111111', 'male', 2147483647),
(129, 'aaa', 'i islamabad', '1111111111111', 'male', 2147483647),
(130, 'aausya', 'jashsahjd', '1111111111111', 'male', 2147483647),
(131, 'ali', 'i islamabad', '1111111111111', 'male', 2147483647),
(132, 'asasasasd', 'gashgdh', '1111111111111', 'male', 2147483647),
(133, 'asa', 'gsdadgsah', '1111111111111', 'male', 2147483647),
(134, 'asa', 'gsdadgsah', '1111111111111', 'male', 2147483647),
(135, '', '', '', '', 0),
(136, 'ali', 'i islamabad', '1111111111111', 'male', 2147483647),
(137, 'ali', 'i islamabad', '1111111111111', 'male', 2147483647),
(138, 'khan', 'i islamabad', '1111111111111', 'male', 2147483647),
(139, 'khan', 'i islamabad', '1111111111111', 'male', 2147483647),
(140, 'aaaa', 'i islamabad', '1111111111111', 'male', 2147483647),
(141, 'ali', 'i 10', '1111111111111', 'male', 2147483647),
(142, 'ali', 'i ', '1111111111111', 'male', 2147483647),
(143, 'ali', 'i ', '1111111111111', 'male', 2147483647),
(144, 'ali', 'uyyiuy', '1111111111111', 'male', 2147483647),
(145, 'ali', 'uyyiuy', '1111111111111', 'male', 2147483647),
(146, 'ali', 'uyyiuy', '1111111111111', 'male', 2147483647),
(147, 'ali', 'uyyiuy', '1111111111111', 'male', 2147483647),
(148, 'ali', 'uyyiuy', '1111111111111', 'male', 2147483647),
(149, 'ali', 'uyyiuy', '1111111111111', 'male', 2147483647),
(150, 'ali', 'uyyiuy', '1111111111111', 'male', 2147483647),
(151, 'ali', 'uyyiuy', '1111111111111', 'male', 2147483647),
(152, 'ali', 'uyyiuy', '1111111111111', 'male', 2147483647),
(153, 'ali', 'uyyiuy', '1111111111111', 'male', 2147483647),
(154, 'ali', 'uyyiuy', '1111111111111', 'male', 2147483647),
(155, 'ali', 'uyyiuy', '1111111111111', 'male', 2147483647),
(156, 'ali', 'uyyiuy', '1111111111111', 'male', 2147483647),
(157, 'ali', 'uyyiuy', '1111111111111', 'male', 2147483647),
(158, 'ali', 'uyyiuy', '1111111111111', 'male', 2147483647),
(159, 'ali', 'uyyiuy', '1111111111111', 'male', 2147483647),
(160, 'ali', 'uyyiuy', '1111111111111', 'male', 2147483647),
(161, 'ali', 'uyyiuy', '1111111111111', 'male', 2147483647),
(162, 'ali', 'uyyiuy', '1111111111111', 'male', 2147483647),
(163, 'ali', 'uyyiuy', '1111111111111', 'male', 2147483647),
(164, 'ali', 'uyyiuy', '1111111111111', 'male', 2147483647),
(165, 'ali', 'uyyiuy', '1111111111111', 'male', 2147483647),
(166, 'ali', 'uyyiuy', '1111111111111', 'male', 2147483647),
(167, 'ali', 'uyyiuy', '1111111111111', 'male', 2147483647),
(168, 'ali', 'uyyiuy', '1111111111111', 'male', 2147483647),
(169, 'ali', 'uyyiuy', '1111111111111', 'male', 2147483647),
(170, 'ali', 'uyyiuy', '1111111111111', 'male', 2147483647),
(171, 'ali', 'uyyiuy', '1111111111111', 'male', 2147483647),
(172, 'ali', 'uyyiuy', '1111111111111', 'male', 2147483647),
(173, 'ali', 'uyyiuy', '1111111111111', 'male', 2147483647),
(174, 'ali', 'uyyiuy', '1111111111111', 'male', 2147483647),
(175, 'ali', 'uyyiuy', '1111111111111', 'male', 2147483647),
(176, 'ali', 'uyyiuy', '1111111111111', 'male', 2147483647),
(177, 'ali', 'uyyiuy', '1111111111111', 'male', 2147483647),
(178, 'ali', 'uyyiuy', '1111111111111', 'male', 2147483647),
(179, 'ali', 'uyyiuy', '1111111111111', 'male', 2147483647),
(180, 'ali', 'uyyiuy', '1111111111111', 'male', 2147483647),
(181, 'ali', 'uyyiuy', '1111111111111', 'male', 2147483647),
(182, 'ali', 'uyyiuy', '1111111111111', 'male', 2147483647),
(183, 'ali', 'uyyiuy', '1111111111111', 'male', 2147483647),
(184, 'ali', 'uyyiuy', '1111111111111', 'male', 2147483647),
(185, 'ali', 'uyyiuy', '1111111111111', 'male', 2147483647),
(186, 'ali', 'uyyiuy', '1111111111111', 'male', 2147483647),
(187, 'ali', 'uyyiuy', '1111111111111', 'male', 2147483647),
(188, 'ali', 'uyyiuy', '1111111111111', 'male', 2147483647),
(189, 'ali', 'uyyiuy', '1111111111111', 'male', 2147483647),
(190, 'ali', 'uyyiuy', '1111111111111', 'male', 2147483647),
(191, 'ali', 'uyyiuy', '1111111111111', 'male', 2147483647),
(192, 'Amir Khan', 'gfjgjhg', '6110192558717', 'male', 2147483647),
(193, 'Amir Khan', 'fgdfgdfcgf', '6110192558717', 'male', 2147483647),
(194, 'ali', 'djsdkjak', '1111111111111', 'male', 2147483647),
(195, 'ali', 'i islamabad', '1234567801221', 'male', 2147483647),
(196, 'Amir Khan', 'h-92 35-b i94', '6110192558716', 'male', 2147483647),
(197, 'Amir Khan', 'h-92 35-b i94', '6110192558716', 'male', 2147483647),
(198, 'wrewregws', 'werwrewre', '1234254325432', 'male', 2147483647),
(199, 'wrewregws', 'werwrewre', '1234254325432', 'male', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `patient_disease`
--

CREATE TABLE `patient_disease` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `disease_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient_disease`
--

INSERT INTO `patient_disease` (`id`, `patient_id`, `disease_id`) VALUES
(1, 88, 1),
(2, 89, 1),
(3, 89, 1),
(4, 90, 1),
(5, 91, 1),
(6, 92, 1),
(7, 94, 1),
(8, 95, 3),
(9, 96, 1),
(10, 97, 1),
(11, 100, 1),
(12, 102, 1),
(13, 103, 1),
(14, 140, 1),
(15, 141, 1),
(16, 143, 1),
(17, 191, 1),
(18, 195, 1),
(19, 199, 1);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `name`, `email`, `password`, `type`) VALUES
(71, 'admin', 'admin@gmail.com', 'admin12345', 3),
(74, 'khan', 'khan@gmail.com', 'khan12345', 1),
(75, 'medical', 'medical@gmail.com', 'medical1234', 2),
(76, 'ali', 'ali@gmail.com', 'ali123456', 2),
(78, 'ali', 'ali12@gmail.com', 'ali12345', 1),
(79, 'umer', 'umer12@gmail.com', 'umer1234', 1),
(80, 'asst', 'asst@gmail.com', 'asst1234', 2),
(81, 'doctor11', 'doctor11@gmail.com', 'doctor1234', 1),
(82, 'saaas', 'saasdsa', 'adsadsad', 1),
(93, 'fhjgfhf', 'fjhg@gmail.com', 'asdf1234', 1);

-- --------------------------------------------------------

--
-- Table structure for table `symtoms`
--

CREATE TABLE `symtoms` (
  `symtoms_id` int(11) NOT NULL,
  `symtoms_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `symtoms`
--

INSERT INTO `symtoms` (`symtoms_id`, `symtoms_name`) VALUES
(1, 'high fever'),
(2, 'profuse sweating'),
(3, 'headache'),
(4, 'nausea'),
(5, 'vomiting'),
(6, 'abdominal pain'),
(7, 'diarrhea'),
(8, 'severe headache'),
(9, 'fatigue or confusion'),
(10, 'vision problems'),
(11, 'chest pain'),
(12, 'difficulty breathing'),
(13, 'blood in urine'),
(14, 'irregular heartbeat'),
(15, 'feeling very tired'),
(16, 'sore muscles'),
(17, 'joint pain'),
(18, 'fever'),
(19, 'burning urine'),
(20, 'stomach pain'),
(21, 'itchy skin'),
(22, 'generalized aches and pains'),
(23, 'high fever, often up to 104 F'),
(24, 'lethargy(usually only if untreated)'),
(25, 'intestinal bleeding or perforation (after two to three weeks of the disease)'),
(26, 'diarrhea or constipation'),
(27, 'peritonitis');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assistant`
--
ALTER TABLE `assistant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diseases`
--
ALTER TABLE `diseases`
  ADD PRIMARY KEY (`disease_id`);

--
-- Indexes for table `disease_symtoms`
--
ALTER TABLE `disease_symtoms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medical_assistant`
--
ALTER TABLE `medical_assistant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medical_history`
--
ALTER TABLE `medical_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_disease`
--
ALTER TABLE `patient_disease`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `symtoms`
--
ALTER TABLE `symtoms`
  ADD PRIMARY KEY (`symtoms_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assistant`
--
ALTER TABLE `assistant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `diseases`
--
ALTER TABLE `diseases`
  MODIFY `disease_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `disease_symtoms`
--
ALTER TABLE `disease_symtoms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `medical_assistant`
--
ALTER TABLE `medical_assistant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `medical_history`
--
ALTER TABLE `medical_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200;

--
-- AUTO_INCREMENT for table `patient_disease`
--
ALTER TABLE `patient_disease`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `symtoms`
--
ALTER TABLE `symtoms`
  MODIFY `symtoms_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
