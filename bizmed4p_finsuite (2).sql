-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 21, 2022 at 08:16 AM
-- Server version: 5.7.23-23
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bizmed4p_finsuite`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `created_at`) VALUES
(1, 'neeraj@bizmethsolutions.com', 'eyJpdiI6Im43clJidUJmOE5scHBySFN6RGI0ekE9PSIsInZhbHVlIjoiM24xa0R3Q3FxNFFBZ01sWGFreUFpUT09IiwibWFjIjoiY2MzZWI4M2VhZTMwOThjZTRjMzJkMDM1NjQ3ZTA4OTQ1NmY0OTEwZWM0NWEzOGNkMGY2ZDVkODYxY2JlZWEwZCIsInRhZyI6IiJ9', '2021-09-27 06:17:16');

-- --------------------------------------------------------

--
-- Table structure for table `asset_category`
--

CREATE TABLE `asset_category` (
  `asset_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `account` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `depreciation_method` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `life` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `accumulated_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `depreciation_account` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gain_loss` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `post_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_id` bigint(50) NOT NULL,
  `company_name` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `default_currency` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `industry` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_format` date DEFAULT NULL,
  `fiscal_year` date DEFAULT NULL,
  `decimal_round` int(10) DEFAULT NULL,
  `deminus_amount` int(11) DEFAULT NULL,
  `first_month_depreciation_method` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fixed_assets` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `accumulated` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `track` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gl` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `code` text COLLATE utf8_unicode_ci,
  `realmid` text COLLATE utf8_unicode_ci,
  `refresh_token` text COLLATE utf8_unicode_ci,
  `user_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `company_name`, `default_currency`, `industry`, `date_format`, `fiscal_year`, `decimal_round`, `deminus_amount`, `first_month_depreciation_method`, `fixed_assets`, `accumulated`, `track`, `gl`, `code`, `realmid`, `refresh_token`, `user_id`, `created_at`, `updated_at`) VALUES
(4620816365179390630, 'CLS Sandbox 1', 'USD', 'Family clothing stores', '2022-02-01', '2021-12-31', 0, 0, 'Pro-Rate', '1600 -  Buildings,1620 -  Original cost,1630 -  Fixed Asset Phone,1650 -  Land,1670 -  Original cost,1680 -  Truck,1700 -  Original Cost', '1610 -  Depreciation,1640 -  Accumulated Depreciation - Phone,1660 -  Depreciation,1690 -  Depreciation', 'Depreciation', '4430 -  Other Income', 'AB11644614651Y8YfccaXtQSbVmCAHM9JM8vs22WlGBuobzosN', '4620816365179390630', 'AB11653915951XKCxj0rCvGtI1NZan08OrY8GHJFau1b7hXbaS', 4, '2022-02-11 21:18:13', '2022-02-11 21:18:13'),
(4620816365179439290, 'CLS Sandbox 2', 'USD', 'Software publishers', '2021-06-01', '2022-02-15', 0, 0, 'Pro-Rate', '1650 -  Buildings,1640 -  Computer & Equipment,1660 -  Land,1610 -  Machinery & Equipment - AD,1600 -  Machinery & Equipment - Gross,1670 -  Super Computers,1690 -  Truck,1710 -  Original Cost,1620 -  Vehicles', '1700 -  Depreciation', '7010 -  Depreciation', '4000 -  Billable Expense Income', 'AB116449152047eroZdaIAJQnFAldjyfeTI61t7CAMdfzUecOX', '4620816365179439290', 'AB11653914088PJy8vx4BQVIIY6VuftIVpX8hSVNoies7b3ilu', 1, '2022-02-15 08:47:27', '2022-02-15 08:47:27'),
(4620816365181477320, 'CLS_Sid_Testing', 'USD', 'Software publishers', '2021-05-01', '2022-02-18', 1, 0, 'Pro-Rate', '1610 -  Buildings Cost,1630 -  Fixed Asset Computers,1640 -  Fixed Asset Furniture,1650 -  Fixed Asset Phone Cost,1660 -  Land,1620 -  Truck,1622 -  Original Cost', '1611 -  Building Acc Amort,1632 -  Computer - Acc Dep,1641 -  Furniture Accumulated Amortization,1651 -  Phone Accumulated Amortization,1621 -  Depreciation', '8000 -  Amortization (Exp),8040 -  Amortization Exp 2,Depreciation,8010 -  Depreciation Exp 1,8020 -  Depreciation Exp 2', '8000 -  Amortization (Exp),8040 -  Amortization Exp 2', 'AB11645189971k70Nxuud6cpsYbX0VmAppmGe8d5rVmqSS2WdO', '4620816365181477320', 'AB11654150940rGNDavLuLh1YSH1Ar36Kzy3FCqjjtbhA2dH22', 1, '2022-02-18 13:06:53', '2022-02-18 13:06:53');

-- --------------------------------------------------------

--
-- Table structure for table `company_profile`
--

CREATE TABLE `company_profile` (
  `company_id` int(11) NOT NULL,
  `Co_Address1` int(11) NOT NULL,
  `Co_Address2` int(11) NOT NULL,
  `Co_City` int(11) NOT NULL,
  `Co_State` int(11) NOT NULL,
  `Co_Country` int(11) NOT NULL,
  `Co_Zip` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company_user`
--

CREATE TABLE `company_user` (
  `id` int(11) NOT NULL,
  `company_id` bigint(30) NOT NULL,
  `user_email` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `flag` int(11) NOT NULL DEFAULT '0' COMMENT '0 = Not Link 1 = Link '
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `FA_depreciation_schedule`
--

CREATE TABLE `FA_depreciation_schedule` (
  `id` int(11) NOT NULL,
  `asset_key` int(11) NOT NULL,
  `month` date NOT NULL,
  `opening_bal` decimal(10,2) NOT NULL,
  `closing_bal` decimal(10,2) NOT NULL,
  `period_dep` decimal(10,2) DEFAULT NULL,
  `write_off_amount` decimal(10,2) DEFAULT NULL,
  `is_dep_posted` tinyint(1) DEFAULT NULL,
  `is_dep_hist` tinyint(1) DEFAULT NULL,
  `is_asset_write_off` tinyint(1) DEFAULT NULL,
  `is_asset_sold_for_cons` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `FA_historical_transaction`
--

CREATE TABLE `FA_historical_transaction` (
  `asset_key` int(11) NOT NULL,
  `asset_name` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `Purchase_Price` double(10,2) NOT NULL,
  `Purchase_month` date NOT NULL,
  `Acc_Dep_PY` int(11) NOT NULL,
  `Acc_Dep_CY` int(11) NOT NULL,
  `Dep_Method` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Life` int(11) NOT NULL,
  `Next_Dep_Month` date NOT NULL,
  `asset_serial` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `asset_location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `asset_memo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `asset_warranty_end` date DEFAULT NULL,
  `asset_fa_account` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company_id` bigint(50) NOT NULL,
  `remaining_life` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `QBO_txn_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `FA_Record`
--

CREATE TABLE `FA_Record` (
  `asset_key` int(11) NOT NULL,
  `asset_pur_price` int(11) NOT NULL,
  `asset_salvage` int(11) NOT NULL,
  `asset_life` int(11) NOT NULL,
  `asset_qbo_class_id` int(11) DEFAULT NULL,
  `asset_qbo_dept_id` int(11) DEFAULT NULL,
  `asset_purch_date` date NOT NULL,
  `asset_serial` int(11) NOT NULL,
  `asset_location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `asset_warranty_end` int(11) NOT NULL,
  `asset_memo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pre_assets`
--

CREATE TABLE `pre_assets` (
  `id` int(11) NOT NULL,
  `account_type` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `account_sub_type` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `asset_category` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `default_method` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `default_life` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pre_assets`
--

INSERT INTO `pre_assets` (`id`, `account_type`, `account_sub_type`, `asset_category`, `default_method`, `default_life`) VALUES
(1, 'Fixed Asset', 'AccumulatedDepletion', '', '', '0'),
(2, 'Fixed Asset', 'AccumulatedDepreciation', '', '', '0'),
(3, 'Fixed Asset', 'DepletableAssets', 'Other Fixed Asset', 'Straight-line', '36'),
(4, 'Fixed Asset', 'FixedAssetComputers', 'Computer & Equipment', 'Straight-line', '36'),
(5, 'Fixed Asset', 'FixedAssetCopiers', 'Computer & Equipment', 'Straight-line', '36'),
(6, 'Fixed Asset', 'FixedAssetFurniture', 'Furniture & Fixtures', 'Straight-line', '60'),
(7, 'Fixed Asset', 'FixedAssetPhone', 'Computer & Equipment', 'Straight-line', '36'),
(8, 'Fixed Asset', 'FixedAssetPhotoVideo', 'Computer & Equipment', 'Straight-line', '36'),
(9, 'Fixed Asset', 'FixedAssetSoftware', 'Software', 'Straight-line', '36'),
(10, 'Fixed Asset', 'FixedAssetOtherToolsEquipment', 'Other Fixed Asset', 'Straight-line', '36'),
(11, 'Fixed Asset', 'FurnitureAndFixtures (default)', 'Furniture & Fixtures', 'Straight-line', '60'),
(12, 'Fixed Asset', 'Land', 'Land', 'Do not depreciate', '0'),
(13, 'Fixed Asset', 'LeaseholdImprovements', 'Leasehold Improvements', 'Straight-line', '60'),
(14, 'Fixed Asset', 'OtherFixedAssets', 'Other Fixed Asset', 'Straight-line', '36'),
(15, 'Fixed Asset', 'AccumulatedAmortization', '', '', '0'),
(16, 'Fixed Asset', 'Buildings', 'Buildings', 'Straight-line', '180'),
(17, 'Fixed Asset', 'IntangibleAssets', 'Intangible Assets', 'Straight-line', '36'),
(18, 'Fixed Asset', 'MachineryAndEquipment', 'Plant & Machinery', 'Straight-line', '60'),
(19, 'Fixed Asset', 'Vehicles', 'Vehicles', 'Straight-line', '60'),
(20, 'Fixed Asset', 'AssetsInCourseOfConstruction', 'Capital WIP', 'Do not depreciate', '0'),
(21, 'Fixed Asset', 'CapitalWip', 'Capital WIP', 'Do not depreciate', '0'),
(22, 'Fixed Asset', 'CumulativeDepreciationOnIntangibleAssets', '', '', '0'),
(23, 'Fixed Asset', 'IntangibleAssetsUnderDevelopment', 'Capital WIP', 'Do not depreciate', '0'),
(24, 'Fixed Asset', 'LandAsset', 'Land', 'Do not depreciate', '0'),
(25, 'Fixed Asset', 'NonCurrentAssets', 'Other Fixed Asset', 'Straight-line', '36'),
(26, 'Fixed Asset', 'ParticipatingInterests', 'Other Fixed Asset', 'Straight-line', '36'),
(27, 'Fixed Asset', 'ProvisionsFixedAssets', 'Other Fixed Asset', 'Straight-line', '36'),
(28, 'Other Expense', 'Depreciation', 'Depreciation', '', '0'),
(29, 'Other Expense', 'Amortization', 'Depreciation', '', '0'),
(30, 'Other Income', 'GainLossOnSaleOfFixedAssets', 'Gain / Loss of Fixed Asset', '', '0'),
(31, 'Other Income', 'LossOnDisposalOfAssets', 'Gain / Loss of Fixed Asset', '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `QBO_Account`
--

CREATE TABLE `QBO_Account` (
  `id` int(11) NOT NULL,
  `QBO_account_id` int(20) NOT NULL,
  `QBO_ac_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `QBO_ac_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `classification` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `account_type` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `account_subtype` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `company_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `QBO_Account`
--

INSERT INTO `QBO_Account` (`id`, `QBO_account_id`, `QBO_ac_name`, `QBO_ac_number`, `classification`, `account_type`, `account_subtype`, `company_id`) VALUES
(1, 33, 'Accounts Payable (A/P)', '2000', 'Liability', 'Accounts Payable', 'AccountsPayable', 4620816365179390630),
(2, 84, 'Accounts Receivable (A/R)', '1200', 'Asset', 'Accounts Receivable', 'AccountsReceivable', 4620816365179390630),
(3, 7, 'Advertising', '5100', 'Expense', 'Expense', 'AdvertisingPromotional', 4620816365179390630),
(4, 89, 'Arizona Dept. of Revenue Payable', '2030', 'Liability', 'Other Current Liability', 'GlobalTaxPayable', 4620816365179390630),
(5, 55, 'Automobile', '5200', 'Expense', 'Expense', 'Auto', 4620816365179390630),
(6, 56, 'Fuel', '5300', 'Expense', 'Expense', 'Auto', 4620816365179390630),
(7, 8, 'Bank Charges', '5400', 'Expense', 'Expense', 'BankCharges', 4620816365179390630),
(8, 85, 'Billable Expense Income', '4000', 'Revenue', 'Income', 'ServiceFeeIncome', 4620816365179390630),
(9, 90, 'Board of Equalization Payable', '2040', 'Liability', 'Other Current Liability', 'GlobalTaxPayable', 4620816365179390630),
(10, 91, 'Buildings', '1600', 'Asset', 'Fixed Asset', 'Buildings', 4620816365179390630),
(11, 93, 'Depreciation', '1610', 'Asset', 'Fixed Asset', 'AccumulatedDepreciation', 4620816365179390630),
(12, 92, 'Original cost', '1620', 'Asset', 'Fixed Asset', 'Buildings', 4620816365179390630),
(13, 35, 'Checking', '1000', 'Asset', 'Bank', 'Checking', 4620816365179390630),
(14, 9, 'Commissions & fees', '5500', 'Expense', 'Expense', 'OtherMiscellaneousServiceCost', 4620816365179390630),
(15, 80, 'Cost of Goods Sold', '5000', 'Expense', 'Cost of Goods Sold', 'SuppliesMaterialsCogs', 4620816365179390630),
(16, 40, 'Depreciation', NULL, 'Expense', 'Other Expense', 'Depreciation', 4620816365179390630),
(17, 82, 'Design income', '4100', 'Revenue', 'Income', 'OtherPrimaryIncome', 4620816365179390630),
(18, 86, 'Discounts given', '4200', 'Revenue', 'Income', 'DiscountsRefundsGiven', 4620816365179390630),
(19, 28, 'Disposal Fees', '5600', 'Expense', 'Expense', 'OtherMiscellaneousServiceCost', 4620816365179390630),
(20, 10, 'Dues & Subscriptions', '5700', 'Expense', 'Expense', 'DuesSubscriptions', 4620816365179390630),
(21, 29, 'Equipment Rental', '5800', 'Expense', 'Expense', 'EquipmentRental', 4620816365179390630),
(22, 5, 'Fees Billed', '4300', 'Revenue', 'Income', 'ServiceFeeIncome', 4620816365179390630),
(23, 97, 'Fixed Asset Phone', '1630', 'Asset', 'Fixed Asset', 'FixedAssetPhone', 4620816365179390630),
(24, 98, 'Accumulated Depreciation - Phone', '1640', 'Asset', 'Fixed Asset', 'AccumulatedDepreciation', 4620816365179390630),
(25, 11, 'Insurance', NULL, 'Expense', 'Expense', 'Insurance', 4620816365179390630),
(26, 57, 'Workers Compensation', NULL, 'Expense', 'Expense', 'Insurance', 4620816365179390630),
(27, 25, 'Interest Earned', NULL, 'Revenue', 'Other Income', 'InterestEarned', 4620816365179390630),
(28, 81, 'Inventory Asset', '1300', 'Asset', 'Other Current Asset', 'Inventory', 4620816365179390630),
(29, 58, 'Job Expenses', NULL, 'Expense', 'Expense', 'OtherMiscellaneousServiceCost', 4620816365179390630),
(30, 59, 'Cost of Labor', NULL, 'Expense', 'Expense', 'OtherMiscellaneousServiceCost', 4620816365179390630),
(31, 60, 'Installation', NULL, 'Expense', 'Expense', 'OtherMiscellaneousServiceCost', 4620816365179390630),
(32, 61, 'Maintenance and Repairs', NULL, 'Expense', 'Expense', 'OtherMiscellaneousServiceCost', 4620816365179390630),
(33, 62, 'Equipment Rental', NULL, 'Expense', 'Expense', 'EquipmentRental', 4620816365179390630),
(34, 63, 'Job Materials', NULL, 'Expense', 'Expense', 'SuppliesMaterials', 4620816365179390630),
(35, 64, 'Decks and Patios', NULL, 'Expense', 'Expense', 'SuppliesMaterials', 4620816365179390630),
(36, 65, 'Fountain and Garden Lighting', NULL, 'Expense', 'Expense', 'SuppliesMaterials', 4620816365179390630),
(37, 66, 'Plants and Soil', NULL, 'Expense', 'Expense', 'SuppliesMaterials', 4620816365179390630),
(38, 67, 'Sprinklers and Drip Systems', NULL, 'Expense', 'Expense', 'SuppliesMaterials', 4620816365179390630),
(39, 68, 'Permits', NULL, 'Expense', 'Expense', 'OtherMiscellaneousServiceCost', 4620816365179390630),
(40, 94, 'Land', '1650', 'Asset', 'Fixed Asset', 'Land', 4620816365179390630),
(41, 96, 'Depreciation', '1660', 'Asset', 'Fixed Asset', 'AccumulatedDepreciation', 4620816365179390630),
(42, 95, 'Original cost', '1670', 'Asset', 'Fixed Asset', 'Land', 4620816365179390630),
(43, 45, 'Landscaping Services', '4400', 'Revenue', 'Income', 'OtherPrimaryIncome', 4620816365179390630),
(44, 46, 'Job Materials', '4410', 'Revenue', 'Income', 'OtherPrimaryIncome', 4620816365179390630),
(45, 47, 'Decks and Patios', '4411', 'Revenue', 'Income', 'OtherPrimaryIncome', 4620816365179390630),
(46, 48, 'Fountains and Garden Lighting', '4412', 'Revenue', 'Income', 'OtherPrimaryIncome', 4620816365179390630),
(47, 49, 'Plants and Soil', '4413', 'Revenue', 'Income', 'OtherPrimaryIncome', 4620816365179390630),
(48, 50, 'Sprinklers and Drip Systems', '4414', 'Revenue', 'Income', 'OtherPrimaryIncome', 4620816365179390630),
(49, 51, 'Labor', '4420', 'Revenue', 'Income', 'OtherPrimaryIncome', 4620816365179390630),
(50, 52, 'Installation', '4421', 'Revenue', 'Income', 'OtherPrimaryIncome', 4620816365179390630),
(51, 53, 'Maintenance and Repair', '4422', 'Revenue', 'Income', 'OtherPrimaryIncome', 4620816365179390630),
(52, 12, 'Legal & Professional Fees', NULL, 'Expense', 'Expense', 'LegalProfessionalFees', 4620816365179390630),
(53, 69, 'Accounting', NULL, 'Expense', 'Expense', 'LegalProfessionalFees', 4620816365179390630),
(54, 70, 'Bookkeeper', NULL, 'Expense', 'Expense', 'LegalProfessionalFees', 4620816365179390630),
(55, 71, 'Lawyer', NULL, 'Expense', 'Expense', 'LegalProfessionalFees', 4620816365179390630),
(56, 43, 'Loan Payable', '2100', 'Liability', 'Other Current Liability', 'OtherCurrentLiabilities', 4620816365179390630),
(57, 72, 'Maintenance and Repair', NULL, 'Expense', 'Expense', 'RepairMaintenance', 4620816365179390630),
(58, 73, 'Building Repairs', NULL, 'Expense', 'Expense', 'RepairMaintenance', 4620816365179390630),
(59, 74, 'Computer Repairs', NULL, 'Expense', 'Expense', 'RepairMaintenance', 4620816365179390630),
(60, 75, 'Equipment Repairs', NULL, 'Expense', 'Expense', 'RepairMaintenance', 4620816365179390630),
(61, 41, 'Mastercard', '2010', 'Liability', 'Credit Card', 'CreditCard', 4620816365179390630),
(62, 13, 'Meals and Entertainment', NULL, 'Expense', 'Expense', 'EntertainmentMeals', 4620816365179390630),
(63, 14, 'Miscellaneous', NULL, 'Expense', 'Other Expense', 'OtherMiscellaneousExpense', 4620816365179390630),
(64, 99, 'MyJobs_test', NULL, 'Asset', 'Accounts Receivable', 'AccountsReceivable', 4620816365179390630),
(65, 44, 'Notes Payable', '2200', 'Liability', 'Long Term Liability', 'OtherLongTermLiabilities', 4620816365179390630),
(66, 15, 'Office Expenses', NULL, 'Expense', 'Expense', 'OfficeGeneralAdministrativeExpenses', 4620816365179390630),
(67, 34, 'Opening Balance Equity', '3000', 'Equity', 'Equity', 'OpeningBalanceEquity', 4620816365179390630),
(68, 83, 'Other Income', '4430', 'Revenue', 'Income', 'OtherPrimaryIncome', 4620816365179390630),
(69, 26, 'Other Portfolio Income', NULL, 'Revenue', 'Other Income', 'OtherMiscellaneousIncome', 4620816365179390630),
(70, 27, 'Penalties & Settlements', NULL, 'Expense', 'Other Expense', 'PenaltiesSettlements', 4620816365179390630),
(71, 54, 'Pest Control Services', '4440', 'Revenue', 'Income', 'OtherPrimaryIncome', 4620816365179390630),
(72, 3, 'Prepaid Expenses', '1400', 'Asset', 'Other Current Asset', 'PrepaidExpenses', 4620816365179390630),
(73, 16, 'Promotional', NULL, 'Expense', 'Expense', 'AdvertisingPromotional', 4620816365179390630),
(74, 78, 'Purchases', NULL, 'Expense', 'Expense', 'SuppliesMaterials', 4620816365179390630),
(75, 6, 'Refunds-Allowances', '4450', 'Revenue', 'Income', 'DiscountsRefundsGiven', 4620816365179390630),
(76, 17, 'Rent or Lease', NULL, 'Expense', 'Expense', 'RentOrLeaseOfBuildings', 4620816365179390630),
(77, 2, 'Retained Earnings', '3100', 'Equity', 'Equity', 'RetainedEarnings', 4620816365179390630),
(78, 79, 'Sales of Product Income', '4460', 'Revenue', 'Income', 'SalesOfProductIncome', 4620816365179390630),
(79, 36, 'Savings', '1010', 'Asset', 'Bank', 'Savings', 4620816365179390630),
(80, 1, 'Services', '4470', 'Revenue', 'Income', 'ServiceFeeIncome', 4620816365179390630),
(81, 19, 'Stationery & Printing', NULL, 'Expense', 'Expense', 'OfficeGeneralAdministrativeExpenses', 4620816365179390630),
(82, 20, 'Supplies', NULL, 'Expense', 'Expense', 'SuppliesMaterials', 4620816365179390630),
(83, 21, 'Taxes & Licenses', NULL, 'Expense', 'Expense', 'TaxesPaid', 4620816365179390630),
(84, 22, 'Travel', NULL, 'Expense', 'Expense', 'Travel', 4620816365179390630),
(85, 23, 'Travel Meals', NULL, 'Expense', 'Expense', 'TravelMeals', 4620816365179390630),
(86, 37, 'Truck', '1680', 'Asset', 'Fixed Asset', 'Vehicles', 4620816365179390630),
(87, 39, 'Depreciation', '1690', 'Asset', 'Fixed Asset', 'AccumulatedDepreciation', 4620816365179390630),
(88, 38, 'Original Cost', '1700', 'Asset', 'Fixed Asset', 'Vehicles', 4620816365179390630),
(89, 88, 'Unapplied Cash Bill Payment Expense', NULL, 'Expense', 'Expense', 'UnappliedCashBillPaymentExpense', 4620816365179390630),
(90, 87, 'Unapplied Cash Payment Income', '4480', 'Revenue', 'Income', 'UnappliedCashPaymentIncome', 4620816365179390630),
(91, 32, 'Uncategorized Asset', '1450', 'Asset', 'Other Current Asset', 'OtherCurrentAssets', 4620816365179390630),
(92, 31, 'Uncategorized Expense', NULL, 'Expense', 'Expense', 'OtherMiscellaneousServiceCost', 4620816365179390630),
(93, 30, 'Uncategorized Income', '4490', 'Revenue', 'Income', 'ServiceFeeIncome', 4620816365179390630),
(94, 4, 'Undeposited Funds', '1500', 'Asset', 'Other Current Asset', 'UndepositedFunds', 4620816365179390630),
(95, 24, 'Utilities', NULL, 'Expense', 'Expense', 'Utilities', 4620816365179390630),
(96, 76, 'Gas and Electric', NULL, 'Expense', 'Expense', 'Utilities', 4620816365179390630),
(97, 77, 'Telephone', NULL, 'Expense', 'Expense', 'Utilities', 4620816365179390630),
(98, 42, 'Visa', '2020', 'Liability', 'Credit Card', 'CreditCard', 4620816365179390630),
(99, 33, 'Accounts Payable (A/P)', '2000', 'Liability', 'Accounts Payable', 'AccountsPayable', 4620816365179439290),
(100, 84, 'Accounts Receivable (A/R)', '1100', 'Asset', 'Accounts Receivable', 'AccountsReceivable', 4620816365179439290),
(101, 7, 'Advertising', '6000', 'Expense', 'Expense', 'AdvertisingPromotional', 4620816365179439290),
(102, 89, 'Arizona Dept. of Revenue Payable', '2030', 'Liability', 'Other Current Liability', 'GlobalTaxPayable', 4620816365179439290),
(103, 55, 'Automobile', '6010', 'Expense', 'Expense', 'Auto', 4620816365179439290),
(104, 56, 'Fuel', '6020', 'Expense', 'Expense', 'Auto', 4620816365179439290),
(105, 8, 'Bank Charges', '6030', 'Expense', 'Expense', 'BankCharges', 4620816365179439290),
(106, 85, 'Billable Expense Income', '4000', 'Revenue', 'Income', 'ServiceFeeIncome', 4620816365179439290),
(107, 90, 'Board of Equalization Payable', '2040', 'Liability', 'Other Current Liability', 'GlobalTaxPayable', 4620816365179439290),
(108, 96, 'Buildings', '1650', 'Asset', 'Fixed Asset', 'Buildings', 4620816365179439290),
(109, 35, 'Checking', '1000', 'Asset', 'Bank', 'Checking', 4620816365179439290),
(110, 9, 'Commissions & fees', '6040', 'Expense', 'Expense', 'OtherMiscellaneousServiceCost', 4620816365179439290),
(111, 95, 'Computer & Equipment', '1640', 'Asset', 'Fixed Asset', 'OtherFixedAssets', 4620816365179439290),
(112, 80, 'Cost of Goods Sold', '5000', 'Expense', 'Cost of Goods Sold', 'SuppliesMaterialsCogs', 4620816365179439290),
(113, 40, 'Depreciation', '7010', 'Expense', 'Other Expense', 'Depreciation', 4620816365179439290),
(114, 82, 'Design income', '4010', 'Revenue', 'Income', 'OtherPrimaryIncome', 4620816365179439290),
(115, 86, 'Discounts given', '4020', 'Revenue', 'Income', 'DiscountsRefundsGiven', 4620816365179439290),
(116, 28, 'Disposal Fees', '6050', 'Expense', 'Expense', 'OtherMiscellaneousServiceCost', 4620816365179439290),
(117, 10, 'Dues & Subscriptions', '6060', 'Expense', 'Expense', 'DuesSubscriptions', 4620816365179439290),
(118, 29, 'Equipment Rental', '6070', 'Expense', 'Expense', 'EquipmentRental', 4620816365179439290),
(119, 5, 'Fees Billed', '4030', 'Revenue', 'Income', 'ServiceFeeIncome', 4620816365179439290),
(120, 11, 'Insurance', '6080', 'Expense', 'Expense', 'Insurance', 4620816365179439290),
(121, 57, 'Workers Compensation', '6090', 'Expense', 'Expense', 'Insurance', 4620816365179439290),
(122, 25, 'Interest Earned', '7020', 'Revenue', 'Other Income', 'InterestEarned', 4620816365179439290),
(123, 81, 'Inventory Asset', '1200', 'Asset', 'Other Current Asset', 'Inventory', 4620816365179439290),
(124, 58, 'Job Expenses', '6100', 'Expense', 'Expense', 'OtherMiscellaneousServiceCost', 4620816365179439290),
(125, 59, 'Cost of Labor', '6110', 'Expense', 'Expense', 'OtherMiscellaneousServiceCost', 4620816365179439290),
(126, 60, 'Installation', '6120', 'Expense', 'Expense', 'OtherMiscellaneousServiceCost', 4620816365179439290),
(127, 61, 'Maintenance and Repairs', '6130', 'Expense', 'Expense', 'OtherMiscellaneousServiceCost', 4620816365179439290),
(128, 62, 'Equipment Rental', '6140', 'Expense', 'Expense', 'EquipmentRental', 4620816365179439290),
(129, 63, 'Job Materials', '6150', 'Expense', 'Expense', 'SuppliesMaterials', 4620816365179439290),
(130, 64, 'Decks and Patios', '6160', 'Expense', 'Expense', 'SuppliesMaterials', 4620816365179439290),
(131, 65, 'Fountain and Garden Lighting', '6170', 'Expense', 'Expense', 'SuppliesMaterials', 4620816365179439290),
(132, 66, 'Plants and Soil', '6180', 'Expense', 'Expense', 'SuppliesMaterials', 4620816365179439290),
(133, 67, 'Sprinklers and Drip Systems', '6190', 'Expense', 'Expense', 'SuppliesMaterials', 4620816365179439290),
(134, 68, 'Permits', '6200', 'Expense', 'Expense', 'OtherMiscellaneousServiceCost', 4620816365179439290),
(135, 97, 'Land', '1660', 'Asset', 'Fixed Asset', 'Land', 4620816365179439290),
(136, 45, 'Landscaping Services', '4040', 'Revenue', 'Income', 'OtherPrimaryIncome', 4620816365179439290),
(137, 46, 'Job Materials', '4050', 'Revenue', 'Income', 'OtherPrimaryIncome', 4620816365179439290),
(138, 47, 'Decks and Patios', '4060', 'Revenue', 'Income', 'OtherPrimaryIncome', 4620816365179439290),
(139, 48, 'Fountains and Garden Lighting', '4070', 'Revenue', 'Income', 'OtherPrimaryIncome', 4620816365179439290),
(140, 49, 'Plants and Soil', '4080', 'Revenue', 'Income', 'OtherPrimaryIncome', 4620816365179439290),
(141, 50, 'Sprinklers and Drip Systems', '4090', 'Revenue', 'Income', 'OtherPrimaryIncome', 4620816365179439290),
(142, 51, 'Labor', '4100', 'Revenue', 'Income', 'OtherPrimaryIncome', 4620816365179439290),
(143, 52, 'Installation', '4110', 'Revenue', 'Income', 'OtherPrimaryIncome', 4620816365179439290),
(144, 53, 'Maintenance and Repair', '4120', 'Revenue', 'Income', 'OtherPrimaryIncome', 4620816365179439290),
(145, 12, 'Legal & Professional Fees', '6210', 'Expense', 'Expense', 'LegalProfessionalFees', 4620816365179439290),
(146, 69, 'Accounting', '6220', 'Expense', 'Expense', 'LegalProfessionalFees', 4620816365179439290),
(147, 70, 'Bookkeeper', '6230', 'Expense', 'Expense', 'LegalProfessionalFees', 4620816365179439290),
(148, 71, 'Lawyer', '6240', 'Expense', 'Expense', 'LegalProfessionalFees', 4620816365179439290),
(149, 43, 'Loan Payable', '2100', 'Liability', 'Other Current Liability', 'OtherCurrentLiabilities', 4620816365179439290),
(150, 92, 'Machinery & Equipment - AD', '1610', 'Asset', 'Fixed Asset', 'MachineryAndEquipment', 4620816365179439290),
(151, 91, 'Machinery & Equipment - Gross', '1600', 'Asset', 'Fixed Asset', 'MachineryAndEquipment', 4620816365179439290),
(152, 72, 'Maintenance and Repair', '6250', 'Expense', 'Expense', 'RepairMaintenance', 4620816365179439290),
(153, 73, 'Building Repairs', '6260', 'Expense', 'Expense', 'RepairMaintenance', 4620816365179439290),
(154, 74, 'Computer Repairs', '6270', 'Expense', 'Expense', 'RepairMaintenance', 4620816365179439290),
(155, 75, 'Equipment Repairs', '6280', 'Expense', 'Expense', 'RepairMaintenance', 4620816365179439290),
(156, 41, 'Mastercard', '2010', 'Liability', 'Credit Card', 'CreditCard', 4620816365179439290),
(157, 13, 'Meals and Entertainment', '6290', 'Expense', 'Expense', 'EntertainmentMeals', 4620816365179439290),
(158, 14, 'Miscellaneous', '7100', 'Expense', 'Other Expense', 'OtherMiscellaneousExpense', 4620816365179439290),
(159, 44, 'Notes Payable', '2110', 'Liability', 'Long Term Liability', 'OtherLongTermLiabilities', 4620816365179439290),
(160, 15, 'Office Expenses', '6300', 'Expense', 'Expense', 'OfficeGeneralAdministrativeExpenses', 4620816365179439290),
(161, 34, 'Opening Balance Equity', '3000', 'Equity', 'Equity', 'OpeningBalanceEquity', 4620816365179439290),
(162, 83, 'Other Income', '4130', 'Revenue', 'Income', 'OtherPrimaryIncome', 4620816365179439290),
(163, 26, 'Other Portfolio Income', '7000', 'Revenue', 'Other Income', 'OtherMiscellaneousIncome', 4620816365179439290),
(164, 27, 'Penalties & Settlements', '7110', 'Expense', 'Other Expense', 'PenaltiesSettlements', 4620816365179439290),
(165, 54, 'Pest Control Services', '4140', 'Revenue', 'Income', 'OtherPrimaryIncome', 4620816365179439290),
(166, 3, 'Prepaid Expenses', '1300', 'Asset', 'Other Current Asset', 'PrepaidExpenses', 4620816365179439290),
(167, 16, 'Promotional', '6310', 'Expense', 'Expense', 'AdvertisingPromotional', 4620816365179439290),
(168, 78, 'Purchases', '6320', 'Expense', 'Expense', 'SuppliesMaterials', 4620816365179439290),
(169, 6, 'Refunds-Allowances', '4150', 'Revenue', 'Income', 'DiscountsRefundsGiven', 4620816365179439290),
(170, 17, 'Rent or Lease', '6330', 'Expense', 'Expense', 'RentOrLeaseOfBuildings', 4620816365179439290),
(171, 2, 'Retained Earnings', '3010', 'Equity', 'Equity', 'RetainedEarnings', 4620816365179439290),
(172, 79, 'Sales of Product Income', '4160', 'Revenue', 'Income', 'SalesOfProductIncome', 4620816365179439290),
(173, 36, 'Savings', '1010', 'Asset', 'Bank', 'Savings', 4620816365179439290),
(174, 1, 'Services', '4170', 'Revenue', 'Income', 'ServiceFeeIncome', 4620816365179439290),
(175, 19, 'Stationery & Printing', '6340', 'Expense', 'Expense', 'OfficeGeneralAdministrativeExpenses', 4620816365179439290),
(176, 98, 'Super Computers', '1670', 'Asset', 'Fixed Asset', 'OtherFixedAssets', 4620816365179439290),
(177, 99, 'Accumulated Amortization General', '1680', 'Asset', 'Fixed Asset', 'AccumulatedAmortization', 4620816365179439290),
(178, 20, 'Supplies', '6350', 'Expense', 'Expense', 'SuppliesMaterials', 4620816365179439290),
(179, 21, 'Taxes & Licenses', '6360', 'Expense', 'Expense', 'TaxesPaid', 4620816365179439290),
(180, 22, 'Travel', '6370', 'Expense', 'Expense', 'Travel', 4620816365179439290),
(181, 23, 'Travel Meals', '6380', 'Expense', 'Expense', 'TravelMeals', 4620816365179439290),
(182, 37, 'Truck', '1690', 'Asset', 'Fixed Asset', 'Vehicles', 4620816365179439290),
(183, 39, 'Depreciation', '1700', 'Asset', 'Fixed Asset', 'AccumulatedDepreciation', 4620816365179439290),
(184, 38, 'Original Cost', '1710', 'Asset', 'Fixed Asset', 'Vehicles', 4620816365179439290),
(185, 88, 'Unapplied Cash Bill Payment Expense', '6390', 'Expense', 'Expense', 'UnappliedCashBillPaymentExpense', 4620816365179439290),
(186, 87, 'Unapplied Cash Payment Income', '4180', 'Revenue', 'Income', 'UnappliedCashPaymentIncome', 4620816365179439290),
(187, 32, 'Uncategorized Asset', '1400', 'Asset', 'Other Current Asset', 'OtherCurrentAssets', 4620816365179439290),
(188, 31, 'Uncategorized Expense', '6400', 'Expense', 'Expense', 'OtherMiscellaneousServiceCost', 4620816365179439290),
(189, 30, 'Uncategorized Income', '4190', 'Revenue', 'Income', 'ServiceFeeIncome', 4620816365179439290),
(190, 4, 'Undeposited Funds', '1410', 'Asset', 'Other Current Asset', 'UndepositedFunds', 4620816365179439290),
(191, 24, 'Utilities', '6410', 'Expense', 'Expense', 'Utilities', 4620816365179439290),
(192, 76, 'Gas and Electric', '6420', 'Expense', 'Expense', 'Utilities', 4620816365179439290),
(193, 77, 'Telephone', '6430', 'Expense', 'Expense', 'Utilities', 4620816365179439290),
(194, 93, 'Vehicles', '1620', 'Asset', 'Fixed Asset', 'Vehicles', 4620816365179439290),
(195, 94, 'Vehicles - AD', '1630', 'Asset', 'Fixed Asset', 'AccumulatedAmortization', 4620816365179439290),
(196, 42, 'Visa', '2020', 'Liability', 'Credit Card', 'CreditCard', 4620816365179439290),
(495, 33, 'Accounts Payable (A/P)', NULL, 'Liability', 'Accounts Payable', 'AccountsPayable', 4620816365181477320),
(496, 84, 'Accounts Receivable (A/R)', NULL, 'Asset', 'Accounts Receivable', 'AccountsReceivable', 4620816365181477320),
(497, 7, 'Advertising', NULL, 'Expense', 'Expense', 'AdvertisingPromotional', 4620816365181477320),
(498, 100, 'Amortization (Exp)', '8000', 'Expense', 'Other Expense', 'Amortization', 4620816365181477320),
(499, 103, 'Amortization Exp 2', '8040', 'Expense', 'Other Expense', 'Amortization', 4620816365181477320),
(500, 89, 'Arizona Dept. of Revenue Payable', NULL, 'Liability', 'Other Current Liability', 'GlobalTaxPayable', 4620816365181477320),
(501, 55, 'Automobile', NULL, 'Expense', 'Expense', 'Auto', 4620816365181477320),
(502, 56, 'Fuel', NULL, 'Expense', 'Expense', 'Auto', 4620816365181477320),
(503, 8, 'Bank Charges', NULL, 'Expense', 'Expense', 'BankCharges', 4620816365181477320),
(504, 85, 'Billable Expense Income', NULL, 'Revenue', 'Income', 'ServiceFeeIncome', 4620816365181477320),
(505, 90, 'Board of Equalization Payable', NULL, 'Liability', 'Other Current Liability', 'GlobalTaxPayable', 4620816365181477320),
(506, 91, 'Buildings Cost', '1610', 'Asset', 'Fixed Asset', 'Buildings', 4620816365181477320),
(507, 92, 'Building Acc Amort', '1611', 'Asset', 'Fixed Asset', 'AccumulatedDepletion', 4620816365181477320),
(508, 35, 'Checking', NULL, 'Asset', 'Bank', 'Checking', 4620816365181477320),
(509, 9, 'Commissions & fees', NULL, 'Expense', 'Expense', 'OtherMiscellaneousServiceCost', 4620816365181477320),
(510, 80, 'Cost of Goods Sold', NULL, 'Expense', 'Cost of Goods Sold', 'SuppliesMaterialsCogs', 4620816365181477320),
(511, 40, 'Depreciation', NULL, 'Expense', 'Other Expense', 'Depreciation', 4620816365181477320),
(512, 101, 'Depreciation Exp 1', '8010', 'Expense', 'Other Expense', 'Depreciation', 4620816365181477320),
(513, 102, 'Depreciation Exp 2', '8020', 'Expense', 'Other Expense', 'Depreciation', 4620816365181477320),
(514, 82, 'Design income', NULL, 'Revenue', 'Income', 'OtherPrimaryIncome', 4620816365181477320),
(515, 86, 'Discounts given', NULL, 'Revenue', 'Income', 'DiscountsRefundsGiven', 4620816365181477320),
(516, 28, 'Disposal Fees', NULL, 'Expense', 'Expense', 'OtherMiscellaneousServiceCost', 4620816365181477320),
(517, 10, 'Dues & Subscriptions', NULL, 'Expense', 'Expense', 'DuesSubscriptions', 4620816365181477320),
(518, 29, 'Equipment Rental', NULL, 'Expense', 'Expense', 'EquipmentRental', 4620816365181477320),
(519, 5, 'Fees Billed', NULL, 'Revenue', 'Income', 'ServiceFeeIncome', 4620816365181477320),
(520, 93, 'Fixed Asset Computers', '1630', 'Asset', 'Fixed Asset', 'FixedAssetComputers', 4620816365181477320),
(521, 94, 'Computer - Acc Dep', '1632', 'Asset', 'Fixed Asset', 'AccumulatedAmortization', 4620816365181477320),
(522, 95, 'Fixed Asset Furniture', '1640', 'Asset', 'Fixed Asset', 'FixedAssetFurniture', 4620816365181477320),
(523, 96, 'Furniture Accumulated Amortization', '1641', 'Asset', 'Fixed Asset', 'AccumulatedAmortization', 4620816365181477320),
(524, 97, 'Fixed Asset Phone Cost', '1650', 'Asset', 'Fixed Asset', 'FixedAssetPhone', 4620816365181477320),
(525, 98, 'Phone Accumulated Amortization', '1651', 'Asset', 'Fixed Asset', 'AccumulatedAmortization', 4620816365181477320),
(526, 11, 'Insurance', NULL, 'Expense', 'Expense', 'Insurance', 4620816365181477320),
(527, 57, 'Workers Compensation', NULL, 'Expense', 'Expense', 'Insurance', 4620816365181477320),
(528, 25, 'Interest Earned', NULL, 'Revenue', 'Other Income', 'InterestEarned', 4620816365181477320),
(529, 81, 'Inventory Asset', NULL, 'Asset', 'Other Current Asset', 'Inventory', 4620816365181477320),
(530, 58, 'Job Expenses', NULL, 'Expense', 'Expense', 'OtherMiscellaneousServiceCost', 4620816365181477320),
(531, 59, 'Cost of Labor', NULL, 'Expense', 'Expense', 'OtherMiscellaneousServiceCost', 4620816365181477320),
(532, 60, 'Installation', NULL, 'Expense', 'Expense', 'OtherMiscellaneousServiceCost', 4620816365181477320),
(533, 61, 'Maintenance and Repairs', NULL, 'Expense', 'Expense', 'OtherMiscellaneousServiceCost', 4620816365181477320),
(534, 62, 'Equipment Rental', NULL, 'Expense', 'Expense', 'EquipmentRental', 4620816365181477320),
(535, 63, 'Job Materials', NULL, 'Expense', 'Expense', 'SuppliesMaterials', 4620816365181477320),
(536, 64, 'Decks and Patios', NULL, 'Expense', 'Expense', 'SuppliesMaterials', 4620816365181477320),
(537, 65, 'Fountain and Garden Lighting', NULL, 'Expense', 'Expense', 'SuppliesMaterials', 4620816365181477320),
(538, 66, 'Plants and Soil', NULL, 'Expense', 'Expense', 'SuppliesMaterials', 4620816365181477320),
(539, 67, 'Sprinklers and Drip Systems', NULL, 'Expense', 'Expense', 'SuppliesMaterials', 4620816365181477320),
(540, 68, 'Permits', NULL, 'Expense', 'Expense', 'OtherMiscellaneousServiceCost', 4620816365181477320),
(541, 99, 'Land', '1660', 'Asset', 'Fixed Asset', 'Land', 4620816365181477320),
(542, 45, 'Landscaping Services', NULL, 'Revenue', 'Income', 'OtherPrimaryIncome', 4620816365181477320),
(543, 46, 'Job Materials', NULL, 'Revenue', 'Income', 'OtherPrimaryIncome', 4620816365181477320),
(544, 47, 'Decks and Patios', NULL, 'Revenue', 'Income', 'OtherPrimaryIncome', 4620816365181477320),
(545, 48, 'Fountains and Garden Lighting', NULL, 'Revenue', 'Income', 'OtherPrimaryIncome', 4620816365181477320),
(546, 49, 'Plants and Soil', NULL, 'Revenue', 'Income', 'OtherPrimaryIncome', 4620816365181477320),
(547, 50, 'Sprinklers and Drip Systems', NULL, 'Revenue', 'Income', 'OtherPrimaryIncome', 4620816365181477320),
(548, 51, 'Labor', NULL, 'Revenue', 'Income', 'OtherPrimaryIncome', 4620816365181477320),
(549, 52, 'Installation', NULL, 'Revenue', 'Income', 'OtherPrimaryIncome', 4620816365181477320),
(550, 53, 'Maintenance and Repair', NULL, 'Revenue', 'Income', 'OtherPrimaryIncome', 4620816365181477320),
(551, 12, 'Legal & Professional Fees', NULL, 'Expense', 'Expense', 'LegalProfessionalFees', 4620816365181477320),
(552, 69, 'Accounting', NULL, 'Expense', 'Expense', 'LegalProfessionalFees', 4620816365181477320),
(553, 70, 'Bookkeeper', NULL, 'Expense', 'Expense', 'LegalProfessionalFees', 4620816365181477320),
(554, 71, 'Lawyer', NULL, 'Expense', 'Expense', 'LegalProfessionalFees', 4620816365181477320),
(555, 43, 'Loan Payable', NULL, 'Liability', 'Other Current Liability', 'OtherCurrentLiabilities', 4620816365181477320),
(556, 72, 'Maintenance and Repair', NULL, 'Expense', 'Expense', 'RepairMaintenance', 4620816365181477320),
(557, 73, 'Building Repairs', NULL, 'Expense', 'Expense', 'RepairMaintenance', 4620816365181477320),
(558, 74, 'Computer Repairs', NULL, 'Expense', 'Expense', 'RepairMaintenance', 4620816365181477320),
(559, 75, 'Equipment Repairs', NULL, 'Expense', 'Expense', 'RepairMaintenance', 4620816365181477320),
(560, 41, 'Mastercard', NULL, 'Liability', 'Credit Card', 'CreditCard', 4620816365181477320),
(561, 13, 'Meals and Entertainment', NULL, 'Expense', 'Expense', 'EntertainmentMeals', 4620816365181477320),
(562, 14, 'Miscellaneous', NULL, 'Expense', 'Other Expense', 'OtherMiscellaneousExpense', 4620816365181477320),
(563, 44, 'Notes Payable', NULL, 'Liability', 'Long Term Liability', 'OtherLongTermLiabilities', 4620816365181477320),
(564, 15, 'Office Expenses', NULL, 'Expense', 'Expense', 'OfficeGeneralAdministrativeExpenses', 4620816365181477320),
(565, 34, 'Opening Balance Equity', NULL, 'Equity', 'Equity', 'OpeningBalanceEquity', 4620816365181477320),
(566, 83, 'Other Income', NULL, 'Revenue', 'Income', 'OtherPrimaryIncome', 4620816365181477320),
(567, 26, 'Other Portfolio Income', NULL, 'Revenue', 'Other Income', 'OtherMiscellaneousIncome', 4620816365181477320),
(568, 27, 'Penalties & Settlements', NULL, 'Expense', 'Other Expense', 'PenaltiesSettlements', 4620816365181477320),
(569, 54, 'Pest Control Services', NULL, 'Revenue', 'Income', 'OtherPrimaryIncome', 4620816365181477320),
(570, 3, 'Prepaid Expenses', NULL, 'Asset', 'Other Current Asset', 'PrepaidExpenses', 4620816365181477320),
(571, 16, 'Promotional', NULL, 'Expense', 'Expense', 'AdvertisingPromotional', 4620816365181477320),
(572, 78, 'Purchases', NULL, 'Expense', 'Expense', 'SuppliesMaterials', 4620816365181477320),
(573, 6, 'Refunds-Allowances', NULL, 'Revenue', 'Income', 'DiscountsRefundsGiven', 4620816365181477320),
(574, 17, 'Rent or Lease', NULL, 'Expense', 'Expense', 'RentOrLeaseOfBuildings', 4620816365181477320),
(575, 2, 'Retained Earnings', NULL, 'Equity', 'Equity', 'RetainedEarnings', 4620816365181477320),
(576, 79, 'Sales of Product Income', NULL, 'Revenue', 'Income', 'SalesOfProductIncome', 4620816365181477320),
(577, 36, 'Savings', NULL, 'Asset', 'Bank', 'Savings', 4620816365181477320),
(578, 1, 'Services', NULL, 'Revenue', 'Income', 'ServiceFeeIncome', 4620816365181477320),
(579, 19, 'Stationery & Printing', NULL, 'Expense', 'Expense', 'OfficeGeneralAdministrativeExpenses', 4620816365181477320),
(580, 20, 'Supplies', NULL, 'Expense', 'Expense', 'SuppliesMaterials', 4620816365181477320),
(581, 21, 'Taxes & Licenses', NULL, 'Expense', 'Expense', 'TaxesPaid', 4620816365181477320),
(582, 22, 'Travel', NULL, 'Expense', 'Expense', 'Travel', 4620816365181477320),
(583, 23, 'Travel Meals', NULL, 'Expense', 'Expense', 'TravelMeals', 4620816365181477320),
(584, 37, 'Truck', '1620', 'Asset', 'Fixed Asset', 'Vehicles', 4620816365181477320),
(585, 39, 'Depreciation', '1621', 'Asset', 'Fixed Asset', 'AccumulatedDepreciation', 4620816365181477320),
(586, 38, 'Original Cost', '1622', 'Asset', 'Fixed Asset', 'Vehicles', 4620816365181477320),
(587, 88, 'Unapplied Cash Bill Payment Expense', NULL, 'Expense', 'Expense', 'UnappliedCashBillPaymentExpense', 4620816365181477320),
(588, 87, 'Unapplied Cash Payment Income', NULL, 'Revenue', 'Income', 'UnappliedCashPaymentIncome', 4620816365181477320),
(589, 32, 'Uncategorized Asset', NULL, 'Asset', 'Other Current Asset', 'OtherCurrentAssets', 4620816365181477320),
(590, 31, 'Uncategorized Expense', NULL, 'Expense', 'Expense', 'OtherMiscellaneousServiceCost', 4620816365181477320),
(591, 30, 'Uncategorized Income', NULL, 'Revenue', 'Income', 'ServiceFeeIncome', 4620816365181477320),
(592, 4, 'Undeposited Funds', NULL, 'Asset', 'Other Current Asset', 'UndepositedFunds', 4620816365181477320),
(593, 24, 'Utilities', NULL, 'Expense', 'Expense', 'Utilities', 4620816365181477320),
(594, 76, 'Gas and Electric', NULL, 'Expense', 'Expense', 'Utilities', 4620816365181477320);

-- --------------------------------------------------------

--
-- Table structure for table `rules`
--

CREATE TABLE `rules` (
  `rules_id` int(11) NOT NULL,
  `asse_category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `QBO_FA_ac_id` int(11) NOT NULL,
  `QBO_acc_dep_ac` int(11) NOT NULL,
  `QBO_dep_ac` int(11) NOT NULL,
  `QBO_gain_loss_ac` int(11) NOT NULL,
  `dep_method` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `default_life` int(11) DEFAULT NULL,
  `company_id` bigint(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rules`
--

INSERT INTO `rules` (`rules_id`, `asse_category`, `QBO_FA_ac_id`, `QBO_acc_dep_ac`, `QBO_dep_ac`, `QBO_gain_loss_ac`, `dep_method`, `default_life`, `company_id`, `created_at`) VALUES
(1, 'Computer & Equipment', 97, 93, 93, 83, 'Straight-line', 36, 4620816365179390630, '2022-02-11 21:22:00'),
(2, 'Buildings', 91, 98, 93, 83, 'Straight-line', 180, 4620816365179390630, '2022-02-11 21:22:00'),
(3, 'Land', 94, 93, 93, 83, 'Do not depreciate', 0, 4620816365179390630, '2022-02-11 21:22:00'),
(4, 'Land', 92, 93, 93, 83, 'Do not depreciate', 0, 4620816365179390630, '2022-02-11 21:22:00'),
(5, 'Buildings', 92, 93, 93, 83, 'Straight-line', 180, 4620816365179390630, '2022-02-11 21:22:00'),
(6, 'Vehicles', 92, 93, 93, 83, 'Straight-line', 60, 4620816365179390630, '2022-02-11 21:22:00'),
(7, 'Vehicles', 37, 93, 93, 83, 'Straight-line', 60, 4620816365179390630, '2022-02-11 21:22:00'),
(8, 'Other Fixed Asset', 95, 40, 40, 85, 'Straight-line', 36, 4620816365179439290, '2022-02-15 08:48:14'),
(9, 'Plant & Machinery', 91, 40, 40, 85, 'Straight-line', 60, 4620816365179439290, '2022-02-15 08:48:14'),
(10, 'Land', 97, 40, 40, 85, 'Do not depreciate', 0, 4620816365179439290, '2022-02-15 08:48:14'),
(11, 'Plant & Machinery', 92, 40, 40, 85, 'Straight-line', 60, 4620816365179439290, '2022-02-15 08:48:14'),
(12, 'Buildings', 96, 40, 40, 85, 'Straight-line', 180, 4620816365179439290, '2022-02-15 08:48:14'),
(13, 'Other Fixed Asset', 98, 40, 40, 85, 'Straight-line', 36, 4620816365179439290, '2022-02-15 08:48:14'),
(14, 'Vehicles', 38, 40, 40, 85, 'Straight-line', 60, 4620816365179439290, '2022-02-15 08:48:14'),
(15, 'Vehicles', 37, 40, 40, 85, 'Straight-line', 60, 4620816365179439290, '2022-02-15 08:48:14'),
(16, 'Vehicles', 93, 40, 40, 85, 'Straight-line', 60, 4620816365179439290, '2022-02-15 08:48:14'),
(31, 'Computer & Equipment', 97, 92, 100, 100, 'Straight-line', 36, 4620816365181477320, '2022-02-18 13:15:21'),
(32, 'Vehicles', 37, 92, 100, 100, 'Straight-line', 60, 4620816365181477320, '2022-02-18 13:15:21'),
(33, 'Furniture & Fixtures', 95, 92, 100, 100, 'Straight-line', 60, 4620816365181477320, '2022-02-18 13:15:21'),
(34, 'Land', 99, 92, 100, 100, 'Do not depreciate', 0, 4620816365181477320, '2022-02-18 13:15:21'),
(35, 'Buildings', 91, 92, 100, 100, 'Straight-line', 180, 4620816365181477320, '2022-02-18 13:15:21'),
(36, 'Vehicles', 38, 92, 100, 100, 'Straight-line', 60, 4620816365181477320, '2022-02-18 13:15:21'),
(37, 'Computer & Equipment', 93, 92, 100, 100, 'Straight-line', 36, 4620816365181477320, '2022-02-18 13:15:21');

-- --------------------------------------------------------

--
-- Table structure for table `temp`
--

CREATE TABLE `temp` (
  `id` int(11) NOT NULL,
  `asset_key` int(11) NOT NULL,
  `month` date NOT NULL,
  `opening_bal` decimal(10,2) NOT NULL,
  `closing_bal` decimal(10,2) NOT NULL,
  `period_dep` decimal(10,2) DEFAULT NULL,
  `write_off_amount` decimal(10,2) DEFAULT NULL,
  `is_dep_posted` tinyint(1) DEFAULT NULL,
  `is_dep_hist` tinyint(1) DEFAULT NULL,
  `is_asset_write_off` tinyint(1) DEFAULT NULL,
  `is_asset_sold_for_cons` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `temp`
--

INSERT INTO `temp` (`id`, `asset_key`, `month`, `opening_bal`, `closing_bal`, `period_dep`, `write_off_amount`, `is_dep_posted`, `is_dep_hist`, `is_asset_write_off`, `is_asset_sold_for_cons`) VALUES
(1, 1, '2022-02-28', 1500.00, 1469.87, 30.13, NULL, NULL, NULL, NULL, NULL),
(2, 1, '2022-03-31', 1469.87, 1438.62, 31.25, NULL, NULL, NULL, NULL, NULL),
(3, 1, '2022-04-30', 1438.62, 1407.37, 31.25, NULL, NULL, NULL, NULL, NULL),
(4, 1, '2022-05-31', 1407.37, 1376.12, 31.25, NULL, NULL, NULL, NULL, NULL),
(5, 1, '2022-06-30', 1376.12, 1344.87, 31.25, NULL, NULL, NULL, NULL, NULL),
(6, 1, '2022-07-31', 1344.87, 1313.62, 31.25, NULL, NULL, NULL, NULL, NULL),
(7, 1, '2022-08-31', 1313.62, 1282.37, 31.25, NULL, NULL, NULL, NULL, NULL),
(8, 1, '2022-09-30', 1282.37, 1251.12, 31.25, NULL, NULL, NULL, NULL, NULL),
(9, 1, '2022-10-31', 1251.12, 1219.87, 31.25, NULL, NULL, NULL, NULL, NULL),
(10, 1, '2022-11-30', 1219.87, 1188.62, 31.25, NULL, NULL, NULL, NULL, NULL),
(11, 1, '2022-12-31', 1188.62, 1157.37, 31.25, NULL, NULL, NULL, NULL, NULL),
(12, 1, '2023-01-31', 1157.37, 1126.12, 31.25, NULL, NULL, NULL, NULL, NULL),
(13, 1, '2023-02-28', 1126.12, 1094.87, 31.25, NULL, NULL, NULL, NULL, NULL),
(14, 1, '2023-03-31', 1094.87, 1063.62, 31.25, NULL, NULL, NULL, NULL, NULL),
(15, 1, '2023-04-30', 1063.62, 1032.37, 31.25, NULL, NULL, NULL, NULL, NULL),
(16, 1, '2023-05-31', 1032.37, 1001.12, 31.25, NULL, NULL, NULL, NULL, NULL),
(17, 1, '2023-06-30', 1001.12, 969.87, 31.25, NULL, NULL, NULL, NULL, NULL),
(18, 1, '2023-07-31', 969.87, 938.62, 31.25, NULL, NULL, NULL, NULL, NULL),
(19, 1, '2023-08-31', 938.62, 907.37, 31.25, NULL, NULL, NULL, NULL, NULL),
(20, 1, '2023-09-30', 907.37, 876.12, 31.25, NULL, NULL, NULL, NULL, NULL),
(21, 1, '2023-10-31', 876.12, 844.87, 31.25, NULL, NULL, NULL, NULL, NULL),
(22, 1, '2023-11-30', 844.87, 813.62, 31.25, NULL, NULL, NULL, NULL, NULL),
(23, 1, '2023-12-31', 813.62, 782.37, 31.25, NULL, NULL, NULL, NULL, NULL),
(24, 1, '2024-01-31', 782.37, 751.12, 31.25, NULL, NULL, NULL, NULL, NULL),
(25, 1, '2024-02-29', 751.12, 719.87, 31.25, NULL, NULL, NULL, NULL, NULL),
(26, 1, '2024-03-31', 719.87, 688.62, 31.25, NULL, NULL, NULL, NULL, NULL),
(27, 1, '2024-04-30', 688.62, 657.37, 31.25, NULL, NULL, NULL, NULL, NULL),
(28, 1, '2024-05-31', 657.37, 626.12, 31.25, NULL, NULL, NULL, NULL, NULL),
(29, 1, '2024-06-30', 626.12, 594.87, 31.25, NULL, NULL, NULL, NULL, NULL),
(30, 1, '2024-07-31', 594.87, 563.62, 31.25, NULL, NULL, NULL, NULL, NULL),
(31, 1, '2024-08-31', 563.62, 532.37, 31.25, NULL, NULL, NULL, NULL, NULL),
(32, 1, '2024-09-30', 532.37, 501.12, 31.25, NULL, NULL, NULL, NULL, NULL),
(33, 1, '2024-10-31', 501.12, 469.87, 31.25, NULL, NULL, NULL, NULL, NULL),
(34, 1, '2024-11-30', 469.87, 438.62, 31.25, NULL, NULL, NULL, NULL, NULL),
(35, 1, '2024-12-31', 438.62, 407.37, 31.25, NULL, NULL, NULL, NULL, NULL),
(36, 1, '2025-01-31', 407.37, 376.12, 31.25, NULL, NULL, NULL, NULL, NULL),
(37, 1, '2025-02-28', 376.12, 344.87, 31.25, NULL, NULL, NULL, NULL, NULL),
(38, 1, '2025-03-31', 344.87, 313.62, 31.25, NULL, NULL, NULL, NULL, NULL),
(39, 1, '2025-04-30', 313.62, 282.37, 31.25, NULL, NULL, NULL, NULL, NULL),
(40, 1, '2025-05-31', 282.37, 251.12, 31.25, NULL, NULL, NULL, NULL, NULL),
(41, 1, '2025-06-30', 251.12, 219.87, 31.25, NULL, NULL, NULL, NULL, NULL),
(42, 1, '2025-07-31', 219.87, 188.62, 31.25, NULL, NULL, NULL, NULL, NULL),
(43, 1, '2025-08-31', 188.62, 157.37, 31.25, NULL, NULL, NULL, NULL, NULL),
(44, 1, '2025-09-30', 157.37, 126.12, 31.25, NULL, NULL, NULL, NULL, NULL),
(45, 1, '2025-10-31', 126.12, 94.87, 31.25, NULL, NULL, NULL, NULL, NULL),
(46, 1, '2025-11-30', 94.87, 63.62, 31.25, NULL, NULL, NULL, NULL, NULL),
(47, 1, '2025-12-31', 63.62, 32.37, 31.25, NULL, NULL, NULL, NULL, NULL),
(48, 1, '2026-01-31', 32.37, 1.12, 31.25, NULL, NULL, NULL, NULL, NULL),
(49, 1, '2026-02-28', 1.12, 0.00, 1.12, NULL, NULL, NULL, NULL, NULL),
(50, 17, '2021-08-31', 13495.00, 13342.38, 152.62, NULL, NULL, NULL, NULL, NULL),
(51, 17, '2021-09-30', 13342.38, 13117.46, 224.92, NULL, NULL, NULL, NULL, NULL),
(52, 17, '2021-10-31', 13117.46, 12892.54, 224.92, NULL, NULL, NULL, NULL, NULL),
(53, 17, '2021-11-30', 12892.54, 12667.62, 224.92, NULL, NULL, NULL, NULL, NULL),
(54, 17, '2021-12-31', 12667.62, 12442.70, 224.92, NULL, NULL, NULL, NULL, NULL),
(55, 17, '2022-01-31', 12442.70, 12217.78, 224.92, NULL, NULL, NULL, NULL, NULL),
(56, 17, '2022-02-28', 12217.78, 11992.86, 224.92, NULL, NULL, NULL, NULL, NULL),
(57, 17, '2022-03-31', 11992.86, 11767.94, 224.92, NULL, NULL, NULL, NULL, NULL),
(58, 17, '2022-04-30', 11767.94, 11543.02, 224.92, NULL, NULL, NULL, NULL, NULL),
(59, 17, '2022-05-31', 11543.02, 11318.10, 224.92, NULL, NULL, NULL, NULL, NULL),
(60, 17, '2022-06-30', 11318.10, 11093.18, 224.92, NULL, NULL, NULL, NULL, NULL),
(61, 17, '2022-07-31', 11093.18, 10868.26, 224.92, NULL, NULL, NULL, NULL, NULL),
(62, 17, '2022-08-31', 10868.26, 10643.34, 224.92, NULL, NULL, NULL, NULL, NULL),
(63, 17, '2022-09-30', 10643.34, 10418.42, 224.92, NULL, NULL, NULL, NULL, NULL),
(64, 17, '2022-10-31', 10418.42, 10193.50, 224.92, NULL, NULL, NULL, NULL, NULL),
(65, 17, '2022-11-30', 10193.50, 9968.58, 224.92, NULL, NULL, NULL, NULL, NULL),
(66, 17, '2022-12-31', 9968.58, 9743.66, 224.92, NULL, NULL, NULL, NULL, NULL),
(67, 17, '2023-01-31', 9743.66, 9518.74, 224.92, NULL, NULL, NULL, NULL, NULL),
(68, 17, '2023-02-28', 9518.74, 9293.82, 224.92, NULL, NULL, NULL, NULL, NULL),
(69, 17, '2023-03-31', 9293.82, 9068.90, 224.92, NULL, NULL, NULL, NULL, NULL),
(70, 17, '2023-04-30', 9068.90, 8843.98, 224.92, NULL, NULL, NULL, NULL, NULL),
(71, 17, '2023-05-31', 8843.98, 8619.06, 224.92, NULL, NULL, NULL, NULL, NULL),
(72, 17, '2023-06-30', 8619.06, 8394.14, 224.92, NULL, NULL, NULL, NULL, NULL),
(73, 17, '2023-07-31', 8394.14, 8169.22, 224.92, NULL, NULL, NULL, NULL, NULL),
(74, 17, '2023-08-31', 8169.22, 7944.30, 224.92, NULL, NULL, NULL, NULL, NULL),
(75, 17, '2023-09-30', 7944.30, 7719.38, 224.92, NULL, NULL, NULL, NULL, NULL),
(76, 17, '2023-10-31', 7719.38, 7494.46, 224.92, NULL, NULL, NULL, NULL, NULL),
(77, 17, '2023-11-30', 7494.46, 7269.54, 224.92, NULL, NULL, NULL, NULL, NULL),
(78, 17, '2023-12-31', 7269.54, 7044.62, 224.92, NULL, NULL, NULL, NULL, NULL),
(79, 17, '2024-01-31', 7044.62, 6819.70, 224.92, NULL, NULL, NULL, NULL, NULL),
(80, 17, '2024-02-29', 6819.70, 6594.78, 224.92, NULL, NULL, NULL, NULL, NULL),
(81, 17, '2024-03-31', 6594.78, 6369.86, 224.92, NULL, NULL, NULL, NULL, NULL),
(82, 17, '2024-04-30', 6369.86, 6144.94, 224.92, NULL, NULL, NULL, NULL, NULL),
(83, 17, '2024-05-31', 6144.94, 5920.02, 224.92, NULL, NULL, NULL, NULL, NULL),
(84, 17, '2024-06-30', 5920.02, 5695.10, 224.92, NULL, NULL, NULL, NULL, NULL),
(85, 17, '2024-07-31', 5695.10, 5470.18, 224.92, NULL, NULL, NULL, NULL, NULL),
(86, 17, '2024-08-31', 5470.18, 5245.26, 224.92, NULL, NULL, NULL, NULL, NULL),
(87, 17, '2024-09-30', 5245.26, 5020.34, 224.92, NULL, NULL, NULL, NULL, NULL),
(88, 17, '2024-10-31', 5020.34, 4795.42, 224.92, NULL, NULL, NULL, NULL, NULL),
(89, 17, '2024-11-30', 4795.42, 4570.50, 224.92, NULL, NULL, NULL, NULL, NULL),
(90, 17, '2024-12-31', 4570.50, 4345.58, 224.92, NULL, NULL, NULL, NULL, NULL),
(91, 17, '2025-01-31', 4345.58, 4120.66, 224.92, NULL, NULL, NULL, NULL, NULL),
(92, 17, '2025-02-28', 4120.66, 3895.74, 224.92, NULL, NULL, NULL, NULL, NULL),
(93, 17, '2025-03-31', 3895.74, 3670.82, 224.92, NULL, NULL, NULL, NULL, NULL),
(94, 17, '2025-04-30', 3670.82, 3445.90, 224.92, NULL, NULL, NULL, NULL, NULL),
(95, 17, '2025-05-31', 3445.90, 3220.98, 224.92, NULL, NULL, NULL, NULL, NULL),
(96, 17, '2025-06-30', 3220.98, 2996.06, 224.92, NULL, NULL, NULL, NULL, NULL),
(97, 17, '2025-07-31', 2996.06, 2771.14, 224.92, NULL, NULL, NULL, NULL, NULL),
(98, 17, '2025-08-31', 2771.14, 2546.22, 224.92, NULL, NULL, NULL, NULL, NULL),
(99, 17, '2025-09-30', 2546.22, 2321.30, 224.92, NULL, NULL, NULL, NULL, NULL),
(100, 17, '2025-10-31', 2321.30, 2096.38, 224.92, NULL, NULL, NULL, NULL, NULL),
(101, 17, '2025-11-30', 2096.38, 1871.46, 224.92, NULL, NULL, NULL, NULL, NULL),
(102, 17, '2025-12-31', 1871.46, 1646.54, 224.92, NULL, NULL, NULL, NULL, NULL),
(103, 17, '2026-01-31', 1646.54, 1421.62, 224.92, NULL, NULL, NULL, NULL, NULL),
(104, 17, '2026-02-28', 1421.62, 1196.70, 224.92, NULL, NULL, NULL, NULL, NULL),
(105, 17, '2026-03-31', 1196.70, 971.78, 224.92, NULL, NULL, NULL, NULL, NULL),
(106, 17, '2026-04-30', 971.78, 746.86, 224.92, NULL, NULL, NULL, NULL, NULL),
(107, 17, '2026-05-31', 746.86, 521.94, 224.92, NULL, NULL, NULL, NULL, NULL),
(108, 17, '2026-06-30', 521.94, 297.02, 224.92, NULL, NULL, NULL, NULL, NULL),
(109, 17, '2026-07-31', 297.02, 72.10, 224.92, NULL, NULL, NULL, NULL, NULL),
(110, 17, '2026-08-31', 72.10, 0.00, 72.10, NULL, NULL, NULL, NULL, NULL),
(111, 18, '2022-02-28', 8000.00, 7885.71, 114.29, NULL, NULL, NULL, NULL, NULL),
(112, 18, '2022-03-31', 7885.71, 7752.38, 133.33, NULL, NULL, NULL, NULL, NULL),
(113, 18, '2022-04-30', 7752.38, 7619.05, 133.33, NULL, NULL, NULL, NULL, NULL),
(114, 18, '2022-05-31', 7619.05, 7485.72, 133.33, NULL, NULL, NULL, NULL, NULL),
(115, 18, '2022-06-30', 7485.72, 7352.39, 133.33, NULL, NULL, NULL, NULL, NULL),
(116, 18, '2022-07-31', 7352.39, 7219.06, 133.33, NULL, NULL, NULL, NULL, NULL),
(117, 18, '2022-08-31', 7219.06, 7085.73, 133.33, NULL, NULL, NULL, NULL, NULL),
(118, 18, '2022-09-30', 7085.73, 6952.40, 133.33, NULL, NULL, NULL, NULL, NULL),
(119, 18, '2022-10-31', 6952.40, 6819.07, 133.33, NULL, NULL, NULL, NULL, NULL),
(120, 18, '2022-11-30', 6819.07, 6685.74, 133.33, NULL, NULL, NULL, NULL, NULL),
(121, 18, '2022-12-31', 6685.74, 6552.41, 133.33, NULL, NULL, NULL, NULL, NULL),
(122, 18, '2023-01-31', 6552.41, 6419.08, 133.33, NULL, NULL, NULL, NULL, NULL),
(123, 18, '2023-02-28', 6419.08, 6285.75, 133.33, NULL, NULL, NULL, NULL, NULL),
(124, 18, '2023-03-31', 6285.75, 6152.42, 133.33, NULL, NULL, NULL, NULL, NULL),
(125, 18, '2023-04-30', 6152.42, 6019.09, 133.33, NULL, NULL, NULL, NULL, NULL),
(126, 18, '2023-05-31', 6019.09, 5885.76, 133.33, NULL, NULL, NULL, NULL, NULL),
(127, 18, '2023-06-30', 5885.76, 5752.43, 133.33, NULL, NULL, NULL, NULL, NULL),
(128, 18, '2023-07-31', 5752.43, 5619.10, 133.33, NULL, NULL, NULL, NULL, NULL),
(129, 18, '2023-08-31', 5619.10, 5485.77, 133.33, NULL, NULL, NULL, NULL, NULL),
(130, 18, '2023-09-30', 5485.77, 5352.44, 133.33, NULL, NULL, NULL, NULL, NULL),
(131, 18, '2023-10-31', 5352.44, 5219.11, 133.33, NULL, NULL, NULL, NULL, NULL),
(132, 18, '2023-11-30', 5219.11, 5085.78, 133.33, NULL, NULL, NULL, NULL, NULL),
(133, 18, '2023-12-31', 5085.78, 4952.45, 133.33, NULL, NULL, NULL, NULL, NULL),
(134, 18, '2024-01-31', 4952.45, 4819.12, 133.33, NULL, NULL, NULL, NULL, NULL),
(135, 18, '2024-02-29', 4819.12, 4685.79, 133.33, NULL, NULL, NULL, NULL, NULL),
(136, 18, '2024-03-31', 4685.79, 4552.46, 133.33, NULL, NULL, NULL, NULL, NULL),
(137, 18, '2024-04-30', 4552.46, 4419.13, 133.33, NULL, NULL, NULL, NULL, NULL),
(138, 18, '2024-05-31', 4419.13, 4285.80, 133.33, NULL, NULL, NULL, NULL, NULL),
(139, 18, '2024-06-30', 4285.80, 4152.47, 133.33, NULL, NULL, NULL, NULL, NULL),
(140, 18, '2024-07-31', 4152.47, 4019.14, 133.33, NULL, NULL, NULL, NULL, NULL),
(141, 18, '2024-08-31', 4019.14, 3885.81, 133.33, NULL, NULL, NULL, NULL, NULL),
(142, 18, '2024-09-30', 3885.81, 3752.48, 133.33, NULL, NULL, NULL, NULL, NULL),
(143, 18, '2024-10-31', 3752.48, 3619.15, 133.33, NULL, NULL, NULL, NULL, NULL),
(144, 18, '2024-11-30', 3619.15, 3485.82, 133.33, NULL, NULL, NULL, NULL, NULL),
(145, 18, '2024-12-31', 3485.82, 3352.49, 133.33, NULL, NULL, NULL, NULL, NULL),
(146, 18, '2025-01-31', 3352.49, 3219.16, 133.33, NULL, NULL, NULL, NULL, NULL),
(147, 18, '2025-02-28', 3219.16, 3085.83, 133.33, NULL, NULL, NULL, NULL, NULL),
(148, 18, '2025-03-31', 3085.83, 2952.50, 133.33, NULL, NULL, NULL, NULL, NULL),
(149, 18, '2025-04-30', 2952.50, 2819.17, 133.33, NULL, NULL, NULL, NULL, NULL),
(150, 18, '2025-05-31', 2819.17, 2685.84, 133.33, NULL, NULL, NULL, NULL, NULL),
(151, 18, '2025-06-30', 2685.84, 2552.51, 133.33, NULL, NULL, NULL, NULL, NULL),
(152, 18, '2025-07-31', 2552.51, 2419.18, 133.33, NULL, NULL, NULL, NULL, NULL),
(153, 18, '2025-08-31', 2419.18, 2285.85, 133.33, NULL, NULL, NULL, NULL, NULL),
(154, 18, '2025-09-30', 2285.85, 2152.52, 133.33, NULL, NULL, NULL, NULL, NULL),
(155, 18, '2025-10-31', 2152.52, 2019.19, 133.33, NULL, NULL, NULL, NULL, NULL),
(156, 18, '2025-11-30', 2019.19, 1885.86, 133.33, NULL, NULL, NULL, NULL, NULL),
(157, 18, '2025-12-31', 1885.86, 1752.53, 133.33, NULL, NULL, NULL, NULL, NULL),
(158, 18, '2026-01-31', 1752.53, 1619.20, 133.33, NULL, NULL, NULL, NULL, NULL),
(159, 18, '2026-02-28', 1619.20, 1485.87, 133.33, NULL, NULL, NULL, NULL, NULL),
(160, 18, '2026-03-31', 1485.87, 1352.54, 133.33, NULL, NULL, NULL, NULL, NULL),
(161, 18, '2026-04-30', 1352.54, 1219.21, 133.33, NULL, NULL, NULL, NULL, NULL),
(162, 18, '2026-05-31', 1219.21, 1085.88, 133.33, NULL, NULL, NULL, NULL, NULL),
(163, 18, '2026-06-30', 1085.88, 952.55, 133.33, NULL, NULL, NULL, NULL, NULL),
(164, 18, '2026-07-31', 952.55, 819.22, 133.33, NULL, NULL, NULL, NULL, NULL),
(165, 18, '2026-08-31', 819.22, 685.89, 133.33, NULL, NULL, NULL, NULL, NULL),
(166, 18, '2026-09-30', 685.89, 552.56, 133.33, NULL, NULL, NULL, NULL, NULL),
(167, 18, '2026-10-31', 552.56, 419.23, 133.33, NULL, NULL, NULL, NULL, NULL),
(168, 18, '2026-11-30', 419.23, 285.90, 133.33, NULL, NULL, NULL, NULL, NULL),
(169, 18, '2026-12-31', 285.90, 152.57, 133.33, NULL, NULL, NULL, NULL, NULL),
(170, 18, '2027-01-31', 152.57, 19.24, 133.33, NULL, NULL, NULL, NULL, NULL),
(171, 18, '2027-02-28', 19.24, 0.00, 19.24, NULL, NULL, NULL, NULL, NULL),
(172, 20, '2021-06-30', 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL),
(173, 20, '2021-07-31', 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL),
(174, 20, '2021-08-31', 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL),
(175, 20, '2021-09-30', 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL),
(176, 20, '2021-10-31', 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL),
(177, 20, '2021-11-30', 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL),
(178, 20, '2021-12-31', 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL),
(179, 20, '2022-01-31', 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL),
(180, 20, '2022-02-28', 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL),
(181, 20, '2022-03-31', 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL),
(182, 20, '2022-04-30', 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL),
(183, 20, '2022-05-31', 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL),
(184, 20, '2022-06-30', 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL),
(185, 20, '2022-07-31', 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL),
(186, 20, '2022-08-31', 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL),
(187, 20, '2022-09-30', 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL),
(188, 20, '2022-10-31', 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL),
(189, 20, '2022-11-30', 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL),
(190, 20, '2022-12-31', 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL),
(191, 20, '2023-01-31', 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL),
(192, 20, '2023-02-28', 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL),
(193, 20, '2023-03-31', 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL),
(194, 20, '2023-04-30', 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL),
(195, 20, '2023-05-31', 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL),
(196, 20, '2023-06-30', 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL),
(197, 20, '2023-07-31', 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL),
(198, 20, '2023-08-31', 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL),
(199, 20, '2023-09-30', 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL),
(200, 20, '2023-10-31', 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL),
(201, 20, '2023-11-30', 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL),
(202, 20, '2023-12-31', 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL),
(203, 20, '2024-01-31', 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL),
(204, 20, '2024-02-29', 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL),
(205, 20, '2024-03-31', 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL),
(206, 20, '2024-04-30', 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL),
(207, 20, '2024-05-31', 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL),
(208, 20, '2024-06-30', 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL),
(209, 22, '2021-06-30', 30000.00, 29821.43, 178.57, NULL, NULL, NULL, NULL, NULL),
(210, 22, '2021-07-31', 29821.43, 28988.10, 833.33, NULL, NULL, NULL, NULL, NULL),
(211, 22, '2021-08-31', 28988.10, 28154.77, 833.33, NULL, NULL, NULL, NULL, NULL),
(212, 22, '2021-09-30', 28154.77, 27321.44, 833.33, NULL, NULL, NULL, NULL, NULL),
(213, 22, '2021-10-31', 27321.44, 26488.11, 833.33, NULL, NULL, NULL, NULL, NULL),
(214, 22, '2021-11-30', 26488.11, 25654.78, 833.33, NULL, NULL, NULL, NULL, NULL),
(215, 22, '2021-12-31', 25654.78, 24821.45, 833.33, NULL, NULL, NULL, NULL, NULL),
(216, 22, '2022-01-31', 24821.45, 23988.12, 833.33, NULL, NULL, NULL, NULL, NULL),
(217, 22, '2022-02-28', 23988.12, 23154.79, 833.33, NULL, NULL, NULL, NULL, NULL),
(218, 22, '2022-03-31', 23154.79, 22321.46, 833.33, NULL, NULL, NULL, NULL, NULL),
(219, 22, '2022-04-30', 22321.46, 21488.13, 833.33, NULL, NULL, NULL, NULL, NULL),
(220, 22, '2022-05-31', 21488.13, 20654.80, 833.33, NULL, NULL, NULL, NULL, NULL),
(221, 22, '2022-06-30', 20654.80, 19821.47, 833.33, NULL, NULL, NULL, NULL, NULL),
(222, 22, '2022-07-31', 19821.47, 18988.14, 833.33, NULL, NULL, NULL, NULL, NULL),
(223, 22, '2022-08-31', 18988.14, 18154.81, 833.33, NULL, NULL, NULL, NULL, NULL),
(224, 22, '2022-09-30', 18154.81, 17321.48, 833.33, NULL, NULL, NULL, NULL, NULL),
(225, 22, '2022-10-31', 17321.48, 16488.15, 833.33, NULL, NULL, NULL, NULL, NULL),
(226, 22, '2022-11-30', 16488.15, 15654.82, 833.33, NULL, NULL, NULL, NULL, NULL),
(227, 22, '2022-12-31', 15654.82, 14821.49, 833.33, NULL, NULL, NULL, NULL, NULL),
(228, 22, '2023-01-31', 14821.49, 13988.16, 833.33, NULL, NULL, NULL, NULL, NULL),
(229, 22, '2023-02-28', 13988.16, 13154.83, 833.33, NULL, NULL, NULL, NULL, NULL),
(230, 22, '2023-03-31', 13154.83, 12321.50, 833.33, NULL, NULL, NULL, NULL, NULL),
(231, 22, '2023-04-30', 12321.50, 11488.17, 833.33, NULL, NULL, NULL, NULL, NULL),
(232, 22, '2023-05-31', 11488.17, 10654.84, 833.33, NULL, NULL, NULL, NULL, NULL),
(233, 22, '2023-06-30', 10654.84, 9821.51, 833.33, NULL, NULL, NULL, NULL, NULL),
(234, 22, '2023-07-31', 9821.51, 8988.18, 833.33, NULL, NULL, NULL, NULL, NULL),
(235, 22, '2023-08-31', 8988.18, 8154.85, 833.33, NULL, NULL, NULL, NULL, NULL),
(236, 22, '2023-09-30', 8154.85, 7321.52, 833.33, NULL, NULL, NULL, NULL, NULL),
(237, 22, '2023-10-31', 7321.52, 6488.19, 833.33, NULL, NULL, NULL, NULL, NULL),
(238, 22, '2023-11-30', 6488.19, 5654.86, 833.33, NULL, NULL, NULL, NULL, NULL),
(239, 22, '2023-12-31', 5654.86, 4821.53, 833.33, NULL, NULL, NULL, NULL, NULL),
(240, 22, '2024-01-31', 4821.53, 3988.20, 833.33, NULL, NULL, NULL, NULL, NULL),
(241, 22, '2024-02-29', 3988.20, 3154.87, 833.33, NULL, NULL, NULL, NULL, NULL),
(242, 22, '2024-03-31', 3154.87, 2321.54, 833.33, NULL, NULL, NULL, NULL, NULL),
(243, 22, '2024-04-30', 2321.54, 1488.21, 833.33, NULL, NULL, NULL, NULL, NULL),
(244, 22, '2024-05-31', 1488.21, 654.88, 833.33, NULL, NULL, NULL, NULL, NULL),
(245, 22, '2024-06-30', 654.88, 0.00, 654.88, NULL, NULL, NULL, NULL, NULL),
(246, 23, '2021-06-30', 12000.00, 11940.48, 59.52, NULL, NULL, NULL, NULL, NULL),
(247, 23, '2021-07-31', 11940.48, 11607.15, 333.33, NULL, NULL, NULL, NULL, NULL),
(248, 23, '2021-08-31', 11607.15, 11273.82, 333.33, NULL, NULL, NULL, NULL, NULL),
(249, 23, '2021-09-30', 11273.82, 10940.49, 333.33, NULL, NULL, NULL, NULL, NULL),
(250, 23, '2021-10-31', 10940.49, 10607.16, 333.33, NULL, NULL, NULL, NULL, NULL),
(251, 23, '2021-11-30', 10607.16, 10273.83, 333.33, NULL, NULL, NULL, NULL, NULL),
(252, 23, '2021-12-31', 10273.83, 9940.50, 333.33, NULL, NULL, NULL, NULL, NULL),
(253, 23, '2022-01-31', 9940.50, 9607.17, 333.33, NULL, NULL, NULL, NULL, NULL),
(254, 23, '2022-02-28', 9607.17, 9273.84, 333.33, NULL, NULL, NULL, NULL, NULL),
(255, 23, '2022-03-31', 9273.84, 8940.51, 333.33, NULL, NULL, NULL, NULL, NULL),
(256, 23, '2022-04-30', 8940.51, 8607.18, 333.33, NULL, NULL, NULL, NULL, NULL),
(257, 23, '2022-05-31', 8607.18, 8273.85, 333.33, NULL, NULL, NULL, NULL, NULL),
(258, 23, '2022-06-30', 8273.85, 7940.52, 333.33, NULL, NULL, NULL, NULL, NULL),
(259, 23, '2022-07-31', 7940.52, 7607.19, 333.33, NULL, NULL, NULL, NULL, NULL),
(260, 23, '2022-08-31', 7607.19, 7273.86, 333.33, NULL, NULL, NULL, NULL, NULL),
(261, 23, '2022-09-30', 7273.86, 6940.53, 333.33, NULL, NULL, NULL, NULL, NULL),
(262, 23, '2022-10-31', 6940.53, 6607.20, 333.33, NULL, NULL, NULL, NULL, NULL),
(263, 23, '2022-11-30', 6607.20, 6273.87, 333.33, NULL, NULL, NULL, NULL, NULL),
(264, 23, '2022-12-31', 6273.87, 5940.54, 333.33, NULL, NULL, NULL, NULL, NULL),
(265, 23, '2023-01-31', 5940.54, 5607.21, 333.33, NULL, NULL, NULL, NULL, NULL),
(266, 23, '2023-02-28', 5607.21, 5273.88, 333.33, NULL, NULL, NULL, NULL, NULL),
(267, 23, '2023-03-31', 5273.88, 4940.55, 333.33, NULL, NULL, NULL, NULL, NULL),
(268, 23, '2023-04-30', 4940.55, 4607.22, 333.33, NULL, NULL, NULL, NULL, NULL),
(269, 23, '2023-05-31', 4607.22, 4273.89, 333.33, NULL, NULL, NULL, NULL, NULL),
(270, 23, '2023-06-30', 4273.89, 3940.56, 333.33, NULL, NULL, NULL, NULL, NULL),
(271, 23, '2023-07-31', 3940.56, 3607.23, 333.33, NULL, NULL, NULL, NULL, NULL),
(272, 23, '2023-08-31', 3607.23, 3273.90, 333.33, NULL, NULL, NULL, NULL, NULL),
(273, 23, '2023-09-30', 3273.90, 2940.57, 333.33, NULL, NULL, NULL, NULL, NULL),
(274, 23, '2023-10-31', 2940.57, 2607.24, 333.33, NULL, NULL, NULL, NULL, NULL),
(275, 23, '2023-11-30', 2607.24, 2273.91, 333.33, NULL, NULL, NULL, NULL, NULL),
(276, 23, '2023-12-31', 2273.91, 1940.58, 333.33, NULL, NULL, NULL, NULL, NULL),
(277, 23, '2024-01-31', 1940.58, 1607.25, 333.33, NULL, NULL, NULL, NULL, NULL),
(278, 23, '2024-02-29', 1607.25, 1273.92, 333.33, NULL, NULL, NULL, NULL, NULL),
(279, 23, '2024-03-31', 1273.92, 940.59, 333.33, NULL, NULL, NULL, NULL, NULL),
(280, 23, '2024-04-30', 940.59, 607.26, 333.33, NULL, NULL, NULL, NULL, NULL),
(281, 23, '2024-05-31', 607.26, 273.93, 333.33, NULL, NULL, NULL, NULL, NULL),
(282, 23, '2024-06-30', 273.93, 0.00, 273.93, NULL, NULL, NULL, NULL, NULL),
(283, 19, '2021-06-30', 28000.00, 27437.50, 562.50, NULL, NULL, NULL, NULL, NULL),
(284, 19, '2021-07-31', 27437.50, 26854.17, 583.33, NULL, NULL, NULL, NULL, NULL),
(285, 19, '2021-08-31', 26854.17, 26270.84, 583.33, NULL, NULL, NULL, NULL, NULL),
(286, 19, '2021-09-30', 26270.84, 25687.51, 583.33, NULL, NULL, NULL, NULL, NULL),
(287, 19, '2021-10-31', 25687.51, 25104.18, 583.33, NULL, NULL, NULL, NULL, NULL),
(288, 19, '2021-11-30', 25104.18, 24520.85, 583.33, NULL, NULL, NULL, NULL, NULL),
(289, 19, '2021-12-31', 24520.85, 23937.52, 583.33, NULL, NULL, NULL, NULL, NULL),
(290, 19, '2022-01-31', 23937.52, 23354.19, 583.33, NULL, NULL, NULL, NULL, NULL),
(291, 19, '2022-02-28', 23354.19, 22770.86, 583.33, NULL, NULL, NULL, NULL, NULL),
(292, 19, '2022-03-31', 22770.86, 22187.53, 583.33, NULL, NULL, NULL, NULL, NULL),
(293, 19, '2022-04-30', 22187.53, 21604.20, 583.33, NULL, NULL, NULL, NULL, NULL),
(294, 19, '2022-05-31', 21604.20, 21020.87, 583.33, NULL, NULL, NULL, NULL, NULL),
(295, 19, '2022-06-30', 21020.87, 20437.54, 583.33, NULL, NULL, NULL, NULL, NULL),
(296, 19, '2022-07-31', 20437.54, 19854.21, 583.33, NULL, NULL, NULL, NULL, NULL),
(297, 19, '2022-08-31', 19854.21, 19270.88, 583.33, NULL, NULL, NULL, NULL, NULL),
(298, 19, '2022-09-30', 19270.88, 18687.55, 583.33, NULL, NULL, NULL, NULL, NULL),
(299, 19, '2022-10-31', 18687.55, 18104.22, 583.33, NULL, NULL, NULL, NULL, NULL),
(300, 19, '2022-11-30', 18104.22, 17520.89, 583.33, NULL, NULL, NULL, NULL, NULL),
(301, 19, '2022-12-31', 17520.89, 16937.56, 583.33, NULL, NULL, NULL, NULL, NULL),
(302, 19, '2023-01-31', 16937.56, 16354.23, 583.33, NULL, NULL, NULL, NULL, NULL),
(303, 19, '2023-02-28', 16354.23, 15770.90, 583.33, NULL, NULL, NULL, NULL, NULL),
(304, 19, '2023-03-31', 15770.90, 15187.57, 583.33, NULL, NULL, NULL, NULL, NULL),
(305, 19, '2023-04-30', 15187.57, 14604.24, 583.33, NULL, NULL, NULL, NULL, NULL),
(306, 19, '2023-05-31', 14604.24, 14020.91, 583.33, NULL, NULL, NULL, NULL, NULL),
(307, 19, '2023-06-30', 14020.91, 13437.58, 583.33, NULL, NULL, NULL, NULL, NULL),
(308, 19, '2023-07-31', 13437.58, 12854.25, 583.33, NULL, NULL, NULL, NULL, NULL),
(309, 19, '2023-08-31', 12854.25, 12270.92, 583.33, NULL, NULL, NULL, NULL, NULL),
(310, 19, '2023-09-30', 12270.92, 11687.59, 583.33, NULL, NULL, NULL, NULL, NULL),
(311, 19, '2023-10-31', 11687.59, 11104.26, 583.33, NULL, NULL, NULL, NULL, NULL),
(312, 19, '2023-11-30', 11104.26, 10520.93, 583.33, NULL, NULL, NULL, NULL, NULL),
(313, 19, '2023-12-31', 10520.93, 9937.60, 583.33, NULL, NULL, NULL, NULL, NULL),
(314, 19, '2024-01-31', 9937.60, 9354.27, 583.33, NULL, NULL, NULL, NULL, NULL),
(315, 19, '2024-02-29', 9354.27, 8770.94, 583.33, NULL, NULL, NULL, NULL, NULL),
(316, 19, '2024-03-31', 8770.94, 8187.61, 583.33, NULL, NULL, NULL, NULL, NULL),
(317, 19, '2024-04-30', 8187.61, 7604.28, 583.33, NULL, NULL, NULL, NULL, NULL),
(318, 19, '2024-05-31', 7604.28, 7020.95, 583.33, NULL, NULL, NULL, NULL, NULL),
(319, 19, '2024-06-30', 7020.95, 6437.62, 583.33, NULL, NULL, NULL, NULL, NULL),
(320, 19, '2024-07-31', 6437.62, 5854.29, 583.33, NULL, NULL, NULL, NULL, NULL),
(321, 19, '2024-08-31', 5854.29, 5270.96, 583.33, NULL, NULL, NULL, NULL, NULL),
(322, 19, '2024-09-30', 5270.96, 4687.63, 583.33, NULL, NULL, NULL, NULL, NULL),
(323, 19, '2024-10-31', 4687.63, 4104.30, 583.33, NULL, NULL, NULL, NULL, NULL),
(324, 19, '2024-11-30', 4104.30, 3520.97, 583.33, NULL, NULL, NULL, NULL, NULL),
(325, 19, '2024-12-31', 3520.97, 2937.64, 583.33, NULL, NULL, NULL, NULL, NULL),
(326, 19, '2025-01-31', 2937.64, 2354.31, 583.33, NULL, NULL, NULL, NULL, NULL),
(327, 19, '2025-02-28', 2354.31, 1770.98, 583.33, NULL, NULL, NULL, NULL, NULL),
(328, 19, '2025-03-31', 1770.98, 1187.65, 583.33, NULL, NULL, NULL, NULL, NULL),
(329, 19, '2025-04-30', 1187.65, 604.32, 583.33, NULL, NULL, NULL, NULL, NULL),
(330, 19, '2025-05-31', 604.32, 20.99, 583.33, NULL, NULL, NULL, NULL, NULL),
(331, 19, '2025-06-30', 20.99, 0.00, 20.99, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `asset_key` int(11) NOT NULL,
  `QBO_txn_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `txn_date` date DEFAULT NULL,
  `name` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `account_name` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `txn_type` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `memo` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dep_method` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `default_life` int(11) DEFAULT NULL,
  `asset_category` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `salvage_value` int(11) DEFAULT NULL,
  `warrenty_end_date` date DEFAULT NULL,
  `serial_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `warrenty_details` text COLLATE utf8_unicode_ci,
  `other_memo` text COLLATE utf8_unicode_ci,
  `is_txn_processed` tinyint(1) NOT NULL COMMENT '0=new 1=process 2=ignored',
  `QBO_FA_ac_id` int(11) NOT NULL,
  `debt_amt` decimal(10,2) DEFAULT NULL,
  `credit_amt` decimal(10,2) DEFAULT NULL,
  `company_id` bigint(50) NOT NULL,
  `is_historical` int(11) DEFAULT NULL,
  `remaining_life` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`asset_key`, `QBO_txn_id`, `txn_date`, `name`, `account_name`, `txn_type`, `memo`, `dep_method`, `default_life`, `asset_category`, `salvage_value`, `warrenty_end_date`, `serial_number`, `warrenty_details`, `other_memo`, `is_txn_processed`, `QBO_FA_ac_id`, `debt_amt`, `credit_amt`, `company_id`, `is_historical`, `remaining_life`, `start_date`) VALUES
(1, '20220201Bill97', '2022-02-01', 'Computers by Jenni', '1630 Fixed Asset Phone', 'Bill', 'purchase of Iphone', 'Straight-line', 48, 'Computer & Equipment', NULL, NULL, NULL, NULL, NULL, 1, 97, 1500.00, 0.00, 4620816365179390630, NULL, NULL, NULL),
(2, '20220201Bill37', '2022-02-01', 'Computers by Jenni', '1680 Truck', 'Bill', '', 'Straight-line', 60, 'Vehicles', NULL, NULL, NULL, NULL, NULL, 0, 37, 2500.00, 0.00, 4620816365179390630, NULL, NULL, NULL),
(3, '20220211Bill37', '2022-02-11', 'Bob\'s Burger Joint', '1680 Truck', 'Bill', 'bill purchase buildings', 'Straight-line', 60, 'Vehicles', NULL, NULL, NULL, NULL, NULL, 0, 37, 2000.00, 0.00, 4620816365179390630, NULL, NULL, NULL),
(14, '20220202Bill91', '2022-02-02', 'Cal Telephone', '1600 Machinery & Equipment - Gross', 'Bill', '', 'Straight-line', 60, 'Plant & Machinery', NULL, NULL, NULL, NULL, NULL, 0, 91, 1500.00, 0.00, 4620816365179439290, NULL, NULL, '2022-02-01'),
(15, '20220202Bill97', '2022-02-02', 'PG&E', '1660 Land', 'Bill', '', 'Do not depreciate', 0, 'Land', NULL, NULL, NULL, NULL, NULL, 0, 97, 15000.00, 0.00, 4620816365179439290, NULL, NULL, '2022-02-02'),
(16, '20220202Bill96', '2022-02-02', 'Chin\'s Gas and Oil', '1650 Buildings', 'Bill', '', 'Straight-line', 180, 'Buildings', NULL, NULL, NULL, NULL, NULL, 0, 96, 10000.00, 0.00, 4620816365179439290, NULL, NULL, '2022-02-02'),
(17, '20210809Journal Entry38', '2021-08-09', '', '1710 Truck:Original Cost', 'Journal Entry', 'Opening Balance', 'Straight-line', 60, 'Vehicles', NULL, NULL, NULL, NULL, NULL, 1, 38, 13495.00, 0.00, 4620816365179439290, NULL, NULL, '2021-08-09'),
(18, '20220204Bill37', '2022-02-04', 'Robertson & Associates', '1690 Truck', 'Bill', '', 'Straight-line', 60, 'Vehicles', NULL, NULL, NULL, NULL, NULL, 1, 37, 8000.00, 0.00, 4620816365179439290, NULL, NULL, '2022-02-04'),
(19, '20210601Bill97', '2021-06-01', 'Books by Bessie', '1650 Fixed Asset Phone Cost', 'Bill', 'purchase of phone', 'Straight-line', 48, 'Computer & Equipment', NULL, NULL, NULL, NULL, NULL, 1, 97, 28000.00, 0.00, 4620816365181477320, NULL, NULL, '2021-06-15'),
(20, '20210603Credit Card Credit97', '2021-06-03', 'Brosnahan Insurance Agency', '1650 Fixed Asset Phone Cost', 'Credit Card Credit', 'purchase of phone', 'Straight-line', 36, 'Computer & Equipment', NULL, NULL, NULL, NULL, NULL, 1, 97, 0.00, 2000.00, 4620816365181477320, NULL, NULL, '2021-06-03'),
(21, '20210609Journal Entry97', '2021-06-09', '', '1650 Fixed Asset Phone Cost', 'Journal Entry', 'purchse of phone', 'Straight-line', 36, 'Computer & Equipment', NULL, NULL, NULL, NULL, NULL, 0, 97, 12345.00, 0.00, 4620816365181477320, NULL, NULL, '2021-06-09'),
(22, '20210622Journal Entry97', '2021-06-22', '', '1650 Fixed Asset Phone Cost', 'Journal Entry', 'purchse of phone', 'Straight-line', 36, 'Computer & Equipment', NULL, NULL, NULL, NULL, NULL, 1, 97, 30000.00, 0.00, 4620816365181477320, NULL, NULL, '2021-06-22'),
(23, '20210623Bill97', '2021-06-23', 'Squeaky Kleen Car Wash', '1650 Fixed Asset Phone Cost', 'Bill', 'purchase of phone', 'Straight-line', 36, 'Computer & Equipment', NULL, NULL, NULL, NULL, NULL, 1, 97, 12000.00, 0.00, 4620816365181477320, NULL, NULL, '2021-06-23'),
(24, '20210623Journal Entry97', '2021-06-23', '', '1650 Fixed Asset Phone Cost', 'Journal Entry', 'purchase of phone', 'Straight-line', 36, 'Computer & Equipment', NULL, NULL, NULL, NULL, NULL, 0, 97, 2000.00, 0.00, 4620816365181477320, NULL, NULL, '2021-06-23'),
(25, '20210705Journal Entry97', '2021-07-05', '', '1650 Fixed Asset Phone Cost', 'Journal Entry', 'purchse of phone', 'Straight-line', 36, 'Computer & Equipment', NULL, NULL, NULL, NULL, NULL, 0, 97, 22000.00, 0.00, 4620816365181477320, NULL, NULL, '2021-07-05'),
(26, '20210706Bill97', '2021-07-06', 'PG&E', '1650 Fixed Asset Phone Cost', 'Bill', 'purchase of phone', 'Straight-line', 36, 'Computer & Equipment', NULL, NULL, NULL, NULL, NULL, 0, 97, 9000.00, 0.00, 4620816365181477320, NULL, NULL, '2021-07-06'),
(27, '20210713Credit Card Credit97', '2021-07-13', 'Brosnahan Insurance Agency', '1650 Fixed Asset Phone Cost', 'Credit Card Credit', 'purchase of phone', 'Straight-line', 36, 'Computer & Equipment', NULL, NULL, NULL, NULL, NULL, 0, 97, 0.00, 4054.00, 4620816365181477320, NULL, NULL, '2021-07-13'),
(28, '20210721Bill97', '2021-07-21', 'Tania\'s Nursery', '1650 Fixed Asset Phone Cost', 'Bill', 'purchase of phone', 'Straight-line', 36, 'Computer & Equipment', NULL, NULL, NULL, NULL, NULL, 0, 97, 6789.00, 0.00, 4620816365181477320, NULL, NULL, '2021-07-21'),
(29, '20210728Journal Entry97', '2021-07-28', '', '1650 Fixed Asset Phone Cost', 'Journal Entry', 'purchse of phone', 'Straight-line', 36, 'Computer & Equipment', NULL, NULL, NULL, NULL, NULL, 0, 97, 5490.00, 0.00, 4620816365181477320, NULL, NULL, '2021-07-28'),
(30, '20210803Bill97', '2021-08-03', 'Pam Seitz', '1650 Fixed Asset Phone Cost', 'Bill', 'purchase of phone', 'Straight-line', 36, 'Computer & Equipment', NULL, NULL, NULL, NULL, NULL, 0, 97, 13500.00, 0.00, 4620816365181477320, NULL, NULL, '2021-08-03'),
(31, '20210810Journal Entry97', '2021-08-10', '', '1650 Fixed Asset Phone Cost', 'Journal Entry', 'purchse of phone', 'Straight-line', 36, 'Computer & Equipment', NULL, NULL, NULL, NULL, NULL, 0, 97, 15000.00, 0.00, 4620816365181477320, NULL, NULL, '2021-08-10'),
(32, '20210810Credit Card Credit97', '2021-08-10', 'Chin\'s Gas and Oil', '1650 Fixed Asset Phone Cost', 'Credit Card Credit', 'purchse of phone', 'Straight-line', 36, 'Computer & Equipment', NULL, NULL, NULL, NULL, NULL, 0, 97, 0.00, 5000.00, 4620816365181477320, NULL, NULL, '2021-08-10'),
(33, '20210825Journal Entry97', '2021-08-25', '', '1650 Fixed Asset Phone Cost', 'Journal Entry', 'purchse of phone', 'Straight-line', 36, 'Computer & Equipment', NULL, NULL, NULL, NULL, NULL, 0, 97, 18000.00, 0.00, 4620816365181477320, NULL, NULL, '2021-08-25'),
(34, '20210825Bill97', '2021-08-25', 'Hall Properties', '1650 Fixed Asset Phone Cost', 'Bill', 'purchase of phone', 'Straight-line', 36, 'Computer & Equipment', NULL, NULL, NULL, NULL, NULL, 0, 97, 28000.00, 0.00, 4620816365181477320, NULL, NULL, '2021-08-25'),
(35, '20210907Bill97', '2021-09-07', 'Fidelity', '1650 Fixed Asset Phone Cost', 'Bill', 'purchase of phone', 'Straight-line', 36, 'Computer & Equipment', NULL, NULL, NULL, NULL, NULL, 0, 97, 24000.00, 0.00, 4620816365181477320, NULL, NULL, '2021-09-07'),
(36, '20210908Journal Entry97', '2021-09-08', '', '1650 Fixed Asset Phone Cost', 'Journal Entry', 'purchse of phone', 'Straight-line', 36, 'Computer & Equipment', NULL, NULL, NULL, NULL, NULL, 0, 97, 22000.00, 0.00, 4620816365181477320, NULL, NULL, '2021-09-08'),
(37, '20210922Credit Card Credit97', '2021-09-22', 'Cigna Health Care', '1650 Fixed Asset Phone Cost', 'Credit Card Credit', 'purchase of phone', 'Straight-line', 36, 'Computer & Equipment', NULL, NULL, NULL, NULL, NULL, 0, 97, 0.00, 5678.00, 4620816365181477320, NULL, NULL, '2021-09-22'),
(38, '20210922Bill97', '2021-09-22', 'Squeaky Kleen Car Wash', '1650 Fixed Asset Phone Cost', 'Bill', 'purchase of phone', 'Straight-line', 36, 'Computer & Equipment', NULL, NULL, NULL, NULL, NULL, 0, 97, 1543.00, 0.00, 4620816365181477320, NULL, NULL, '2021-09-22'),
(39, '20210923Journal Entry97', '2021-09-23', '', '1650 Fixed Asset Phone Cost', 'Journal Entry', 'purchse of phone', 'Straight-line', 36, 'Computer & Equipment', NULL, NULL, NULL, NULL, NULL, 0, 97, 25000.00, 0.00, 4620816365181477320, NULL, NULL, '2021-09-23'),
(40, '20211006Bill97', '2021-10-06', 'Squeaky Kleen Car Wash', '1650 Fixed Asset Phone Cost', 'Bill', 'purchase of phone', 'Straight-line', 36, 'Computer & Equipment', NULL, NULL, NULL, NULL, NULL, 0, 97, 13000.00, 0.00, 4620816365181477320, NULL, NULL, '2021-10-06'),
(41, '20211012Journal Entry97', '2021-10-12', '', '1650 Fixed Asset Phone Cost', 'Journal Entry', 'purchse of phone', 'Straight-line', 36, 'Computer & Equipment', NULL, NULL, NULL, NULL, NULL, 0, 97, 23456.00, 0.00, 4620816365181477320, NULL, NULL, '2021-10-12'),
(42, '20211013Credit Card Credit97', '2021-10-13', 'Bob\'s Burger Joint', '1650 Fixed Asset Phone Cost', 'Credit Card Credit', 'purchase of phone', 'Straight-line', 36, 'Computer & Equipment', NULL, NULL, NULL, NULL, NULL, 0, 97, 0.00, 10000.00, 4620816365181477320, NULL, NULL, '2021-10-13'),
(43, '20211020Bill97', '2021-10-20', 'Robertson & Associates', '1650 Fixed Asset Phone Cost', 'Bill', 'purchase of phone', 'Straight-line', 36, 'Computer & Equipment', NULL, NULL, NULL, NULL, NULL, 0, 97, 10000.00, 0.00, 4620816365181477320, NULL, NULL, '2021-10-20'),
(44, '20211028Journal Entry97', '2021-10-28', '', '1650 Fixed Asset Phone Cost', 'Journal Entry', 'purchse of phone', 'Straight-line', 36, 'Computer & Equipment', NULL, NULL, NULL, NULL, NULL, 0, 97, 2698.00, 0.00, 4620816365181477320, NULL, NULL, '2021-10-28'),
(45, '20211108Bill97', '2021-11-08', 'Bob\'s Burger Joint', '1650 Fixed Asset Phone Cost', 'Bill', 'purchase of phone', 'Straight-line', 36, 'Computer & Equipment', NULL, NULL, NULL, NULL, NULL, 0, 97, 1234.00, 0.00, 4620816365181477320, NULL, NULL, '2021-11-08'),
(46, '20211109Journal Entry97', '2021-11-09', '', '1650 Fixed Asset Phone Cost', 'Journal Entry', 'purchse of phone', 'Straight-line', 36, 'Computer & Equipment', NULL, NULL, NULL, NULL, NULL, 0, 97, 31000.00, 0.00, 4620816365181477320, NULL, NULL, '2021-11-09'),
(47, '20211117Credit Card Credit97', '2021-11-17', 'Books by Bessie', '1650 Fixed Asset Phone Cost', 'Credit Card Credit', 'purchase of phone', 'Straight-line', 36, 'Computer & Equipment', NULL, NULL, NULL, NULL, NULL, 0, 97, 0.00, 12543.00, 4620816365181477320, NULL, NULL, '2021-11-17'),
(48, '20211124Journal Entry97', '2021-11-24', '', '1650 Fixed Asset Phone Cost', 'Journal Entry', 'purchse of phone', 'Straight-line', 36, 'Computer & Equipment', NULL, NULL, NULL, NULL, NULL, 0, 97, 12000.00, 0.00, 4620816365181477320, NULL, NULL, '2021-11-24'),
(49, '20211124Bill97', '2021-11-24', 'Brosnahan Insurance Agency', '1650 Fixed Asset Phone Cost', 'Bill', 'purchase of phone', 'Straight-line', 36, 'Computer & Equipment', NULL, NULL, NULL, NULL, NULL, 0, 97, 1367.00, 0.00, 4620816365181477320, NULL, NULL, '2021-11-24'),
(50, '20211207Bill97', '2021-12-07', 'Squeaky Kleen Car Wash', '1650 Fixed Asset Phone Cost', 'Bill', 'purchase of phone', 'Straight-line', 36, 'Computer & Equipment', NULL, NULL, NULL, NULL, NULL, 0, 97, 9700.00, 0.00, 4620816365181477320, NULL, NULL, '2021-12-07'),
(51, '20211208Journal Entry97', '2021-12-08', '', '1650 Fixed Asset Phone Cost', 'Journal Entry', 'purchse of phone', 'Straight-line', 36, 'Computer & Equipment', NULL, NULL, NULL, NULL, NULL, 0, 97, 16000.00, 0.00, 4620816365181477320, NULL, NULL, '2021-12-08'),
(52, '20211216Credit Card Credit97', '2021-12-16', 'Chin\'s Gas and Oil', '1650 Fixed Asset Phone Cost', 'Credit Card Credit', 'purchse of phone', 'Straight-line', 36, 'Computer & Equipment', NULL, NULL, NULL, NULL, NULL, 0, 97, 0.00, 23000.00, 4620816365181477320, NULL, NULL, '2021-12-16'),
(53, '20211221Journal Entry97', '2021-12-21', '', '1650 Fixed Asset Phone Cost', 'Journal Entry', 'purchse of phone', 'Straight-line', 36, 'Computer & Equipment', NULL, NULL, NULL, NULL, NULL, 0, 97, 15000.00, 0.00, 4620816365181477320, NULL, NULL, '2021-12-21'),
(54, '20211222Bill97', '2021-12-22', 'Lee Advertising', '1650 Fixed Asset Phone Cost', 'Bill', 'purchase of phone', 'Straight-line', 36, 'Computer & Equipment', NULL, NULL, NULL, NULL, NULL, 0, 97, 10985.00, 0.00, 4620816365181477320, NULL, NULL, '2021-12-22'),
(55, '20210601Credit Card Credit37', '2021-06-01', 'Bob\'s Burger Joint', '1620 Truck', 'Credit Card Credit', 'purchase of truck', 'Straight-line', 60, 'Vehicles', NULL, NULL, NULL, NULL, NULL, 0, 37, 0.00, 9000.00, 4620816365181477320, NULL, NULL, '2021-06-01'),
(56, '20210714Credit Card Credit37', '2021-07-14', 'Brosnahan Insurance Agency', '1620 Truck', 'Credit Card Credit', 'purchase of truck', 'Straight-line', 60, 'Vehicles', NULL, NULL, NULL, NULL, NULL, 0, 37, 0.00, 9865.00, 4620816365181477320, NULL, NULL, '2021-07-14'),
(57, '20210721Bill37', '2021-07-21', 'EDD', '1620 Truck', 'Bill', 'purchase of truck', 'Straight-line', 60, 'Vehicles', NULL, NULL, NULL, NULL, NULL, 0, 37, 9000.00, 0.00, 4620816365181477320, NULL, NULL, '2021-07-21'),
(58, '20210810Bill37', '2021-08-10', 'Chin\'s Gas and Oil', '1620 Truck', 'Bill', 'purchase of truck', 'Straight-line', 60, 'Vehicles', NULL, NULL, NULL, NULL, NULL, 0, 37, 26098.00, 0.00, 4620816365181477320, NULL, NULL, '2021-08-10'),
(59, '20210811Credit Card Credit37', '2021-08-11', 'Computers by Jenni', '1620 Truck', 'Credit Card Credit', 'purchase of truck', 'Straight-line', 60, 'Vehicles', NULL, NULL, NULL, NULL, NULL, 0, 37, 0.00, 50000.00, 4620816365181477320, NULL, NULL, '2021-08-11'),
(60, '20210825Bill37', '2021-08-25', 'Cigna Health Care', '1620 Truck', 'Bill', 'purchase of truck', 'Straight-line', 60, 'Vehicles', NULL, NULL, NULL, NULL, NULL, 0, 37, 26876.00, 0.00, 4620816365181477320, NULL, NULL, '2021-08-25'),
(61, '20210914Bill37', '2021-09-14', 'Hicks Hardware', '1620 Truck', 'Bill', 'purchase of truck', 'Straight-line', 60, 'Vehicles', NULL, NULL, NULL, NULL, NULL, 0, 37, 34876.00, 0.00, 4620816365181477320, NULL, NULL, '2021-09-14'),
(62, '20210922Credit Card Credit37', '2021-09-22', 'Hall Properties', '1620 Truck', 'Credit Card Credit', 'purchase of truck', 'Straight-line', 60, 'Vehicles', NULL, NULL, NULL, NULL, NULL, 0, 37, 0.00, 20000.00, 4620816365181477320, NULL, NULL, '2021-09-22'),
(63, '20210929Bill37', '2021-09-29', 'Lee Advertising', '1620 Truck', 'Bill', 'purchase of truck', 'Straight-line', 60, 'Vehicles', NULL, NULL, NULL, NULL, NULL, 0, 37, 5676.00, 0.00, 4620816365181477320, NULL, NULL, '2021-09-29'),
(64, '20211006Bill37', '2021-10-06', 'Lee Advertising', '1620 Truck', 'Bill', 'purchase of truck', 'Straight-line', 60, 'Vehicles', NULL, NULL, NULL, NULL, NULL, 0, 37, 7234.00, 0.00, 4620816365181477320, NULL, NULL, '2021-10-06'),
(65, '20211013Credit Card Credit37', '2021-10-13', 'National Eye Care', '1620 Truck', 'Credit Card Credit', 'purchase of truck', 'Straight-line', 60, 'Vehicles', NULL, NULL, NULL, NULL, NULL, 0, 37, 0.00, 28765.00, 4620816365181477320, NULL, NULL, '2021-10-13'),
(66, '20211020Bill37', '2021-10-20', 'Cal Telephone', '1620 Truck', 'Bill', 'purchase of truck', 'Straight-line', 60, 'Vehicles', NULL, NULL, NULL, NULL, NULL, 0, 37, 48000.00, 0.00, 4620816365181477320, NULL, NULL, '2021-10-20'),
(67, '20211116Bill37', '2021-11-16', 'Met Life Dental', '1620 Truck', 'Bill', 'purchase of truck', 'Straight-line', 60, 'Vehicles', NULL, NULL, NULL, NULL, NULL, 0, 37, 5698.00, 0.00, 4620816365181477320, NULL, NULL, '2021-11-16'),
(68, '20211117Credit Card Credit37', '2021-11-17', 'Norton Lumber and Building Materials', '1620 Truck', 'Credit Card Credit', 'purchase of truck', 'Straight-line', 60, 'Vehicles', NULL, NULL, NULL, NULL, NULL, 0, 37, 0.00, 14000.00, 4620816365181477320, NULL, NULL, '2021-11-17'),
(69, '20211124Bill37', '2021-11-24', 'Tania\'s Nursery', '1620 Truck', 'Bill', 'purchase of truck', 'Straight-line', 60, 'Vehicles', NULL, NULL, NULL, NULL, NULL, 0, 37, 2376.00, 0.00, 4620816365181477320, NULL, NULL, '2021-11-24'),
(70, '20211213Journal Entry37', '2021-12-13', '', '1620 Truck', 'Journal Entry', 'purchase of truck', 'Straight-line', 60, 'Vehicles', NULL, NULL, NULL, NULL, NULL, 0, 37, 12654.00, 0.00, 4620816365181477320, NULL, NULL, '2021-12-13'),
(71, '20211215Journal Entry37', '2021-12-15', '', '1620 Truck', 'Journal Entry', 'purchase of truck', 'Straight-line', 60, 'Vehicles', NULL, NULL, NULL, NULL, NULL, 0, 37, 12765.00, 0.00, 4620816365181477320, NULL, NULL, '2021-12-15'),
(72, '20211221Bill37', '2021-12-21', 'Robertson & Associates', '1620 Truck', 'Bill', 'purchase of truck', 'Straight-line', 60, 'Vehicles', NULL, NULL, NULL, NULL, NULL, 0, 37, 25000.00, 0.00, 4620816365181477320, NULL, NULL, '2021-12-21'),
(73, '20211222Credit Card Credit37', '2021-12-22', 'Computers by Jenni', '1620 Truck', 'Credit Card Credit', 'purchase of truck', 'Straight-line', 60, 'Vehicles', NULL, NULL, NULL, NULL, NULL, 0, 37, 0.00, 20000.00, 4620816365181477320, NULL, NULL, '2021-12-22'),
(74, '20211222Bill37', '2021-12-22', 'Mahoney Mugs', '1620 Truck', 'Bill', 'purchase of truck', 'Straight-line', 60, 'Vehicles', NULL, NULL, NULL, NULL, NULL, 0, 37, 12567.00, 0.00, 4620816365181477320, NULL, NULL, '2021-12-22'),
(75, '20210602Journal Entry95', '2021-06-02', '', '1640 Fixed Asset Furniture', 'Journal Entry', 'purchase of furniture', 'Straight-line', 60, 'Furniture & Fixtures', NULL, NULL, NULL, NULL, NULL, 0, 95, 5423.00, 0.00, 4620816365181477320, NULL, NULL, '2021-06-02'),
(76, '20210608Credit Card Credit95', '2021-06-08', 'Hicks Hardware', '1640 Fixed Asset Furniture', 'Credit Card Credit', 'purchase of furniture', 'Straight-line', 60, 'Furniture & Fixtures', NULL, NULL, NULL, NULL, NULL, 0, 95, 0.00, 1290.00, 4620816365181477320, NULL, NULL, '2021-06-08'),
(77, '20210608Bill95', '2021-06-08', 'Brosnahan Insurance Agency', '1640 Fixed Asset Furniture', 'Bill', 'purchase of furniture', 'Straight-line', 60, 'Furniture & Fixtures', NULL, NULL, NULL, NULL, NULL, 0, 95, 12000.00, 0.00, 4620816365181477320, NULL, NULL, '2021-06-08'),
(78, '20210617Journal Entry95', '2021-06-17', '', '1640 Fixed Asset Furniture', 'Journal Entry', 'purchase of furniture', 'Straight-line', 60, 'Furniture & Fixtures', NULL, NULL, NULL, NULL, NULL, 0, 95, 5687.00, 0.00, 4620816365181477320, NULL, NULL, '2021-06-17'),
(79, '20210630Bill95', '2021-06-30', 'Mahoney Mugs', '1640 Fixed Asset Furniture', 'Bill', 'purchase of furniture', 'Straight-line', 60, 'Furniture & Fixtures', NULL, NULL, NULL, NULL, NULL, 0, 95, 45000.00, 0.00, 4620816365181477320, NULL, NULL, '2021-06-30'),
(80, '20210708Bill95', '2021-07-08', 'Fidelity', '1640 Fixed Asset Furniture', 'Bill', 'purchase of furniture', 'Straight-line', 60, 'Furniture & Fixtures', NULL, NULL, NULL, NULL, NULL, 0, 95, 23000.00, 0.00, 4620816365181477320, NULL, NULL, '2021-07-08'),
(81, '20210713Credit Card Credit95', '2021-07-13', 'Cal Telephone', '1640 Fixed Asset Furniture', 'Credit Card Credit', 'purchase of furniture', 'Straight-line', 60, 'Furniture & Fixtures', NULL, NULL, NULL, NULL, NULL, 0, 95, 0.00, 14000.00, 4620816365181477320, NULL, NULL, '2021-07-13'),
(82, '20210715Journal Entry95', '2021-07-15', '', '1640 Fixed Asset Furniture', 'Journal Entry', 'purchase of furniture', 'Straight-line', 60, 'Furniture & Fixtures', NULL, NULL, NULL, NULL, NULL, 0, 95, 15000.00, 0.00, 4620816365181477320, NULL, NULL, '2021-07-15'),
(83, '20210728Bill95', '2021-07-28', 'National Eye Care', '1640 Fixed Asset Furniture', 'Bill', 'purchase of furniture', 'Straight-line', 60, 'Furniture & Fixtures', NULL, NULL, NULL, NULL, NULL, 0, 95, 13423.00, 0.00, 4620816365181477320, NULL, NULL, '2021-07-28'),
(84, '20210728Journal Entry95', '2021-07-28', '', '1640 Fixed Asset Furniture', 'Journal Entry', 'purchase of furniture', 'Straight-line', 60, 'Furniture & Fixtures', NULL, NULL, NULL, NULL, NULL, 0, 95, 16700.00, 0.00, 4620816365181477320, NULL, NULL, '2021-07-28'),
(85, '20210804Bill95', '2021-08-04', 'Robertson & Associates', '1640 Fixed Asset Furniture', 'Bill', 'purchase of furniture', 'Straight-line', 60, 'Furniture & Fixtures', NULL, NULL, NULL, NULL, NULL, 0, 95, 13455.00, 0.00, 4620816365181477320, NULL, NULL, '2021-08-04'),
(86, '20210805Journal Entry95', '2021-08-05', '', '1640 Fixed Asset Furniture', 'Journal Entry', 'purchase of furniture', 'Straight-line', 60, 'Furniture & Fixtures', NULL, NULL, NULL, NULL, NULL, 0, 95, 20000.00, 0.00, 4620816365181477320, NULL, NULL, '2021-08-05'),
(87, '20210810Credit Card Credit95', '2021-08-10', 'Brosnahan Insurance Agency', '1640 Fixed Asset Furniture', 'Credit Card Credit', 'purchase of furniture', 'Straight-line', 60, 'Furniture & Fixtures', NULL, NULL, NULL, NULL, NULL, 0, 95, 0.00, 5000.00, 4620816365181477320, NULL, NULL, '2021-08-10'),
(88, '20210825Bill95', '2021-08-25', 'Pam Seitz', '1640 Fixed Asset Furniture', 'Bill', 'purchase of furniture', 'Straight-line', 60, 'Furniture & Fixtures', NULL, NULL, NULL, NULL, NULL, 0, 95, 12567.00, 0.00, 4620816365181477320, NULL, NULL, '2021-08-25'),
(89, '20210825Journal Entry95', '2021-08-25', '', '1640 Fixed Asset Furniture', 'Journal Entry', 'purchase of furniture', 'Straight-line', 60, 'Furniture & Fixtures', NULL, NULL, NULL, NULL, NULL, 0, 95, 6523.00, 0.00, 4620816365181477320, NULL, NULL, '2021-08-25'),
(90, '20210907Bill95', '2021-09-07', 'Cal Telephone', '1640 Fixed Asset Furniture', 'Bill', 'purchase of furniture', 'Straight-line', 60, 'Furniture & Fixtures', NULL, NULL, NULL, NULL, NULL, 0, 95, 12500.00, 0.00, 4620816365181477320, NULL, NULL, '2021-09-07'),
(91, '20210909Journal Entry95', '2021-09-09', '', '1640 Fixed Asset Furniture', 'Journal Entry', 'purchase of furniture', 'Straight-line', 60, 'Furniture & Fixtures', NULL, NULL, NULL, NULL, NULL, 0, 95, 23000.00, 0.00, 4620816365181477320, NULL, NULL, '2021-09-09'),
(92, '20210914Credit Card Credit95', '2021-09-14', 'Chin\'s Gas and Oil', '1640 Fixed Asset Furniture', 'Credit Card Credit', 'purchase of furniture', 'Straight-line', 60, 'Furniture & Fixtures', NULL, NULL, NULL, NULL, NULL, 0, 95, 0.00, 16587.00, 4620816365181477320, NULL, NULL, '2021-09-14'),
(93, '20210922Bill95', '2021-09-22', 'National Eye Care', '1640 Fixed Asset Furniture', 'Bill', 'purchase of furniture', 'Straight-line', 60, 'Furniture & Fixtures', NULL, NULL, NULL, NULL, NULL, 0, 95, 12453.00, 0.00, 4620816365181477320, NULL, NULL, '2021-09-22'),
(94, '20210923Journal Entry95', '2021-09-23', '', '1640 Fixed Asset Furniture', 'Journal Entry', 'purchase of furniture', 'Straight-line', 60, 'Furniture & Fixtures', NULL, NULL, NULL, NULL, NULL, 0, 95, 12000.00, 0.00, 4620816365181477320, NULL, NULL, '2021-09-23'),
(95, '20211005Bill95', '2021-10-05', 'Mahoney Mugs', '1640 Fixed Asset Furniture', 'Bill', 'purchase of furniture', 'Straight-line', 60, 'Furniture & Fixtures', NULL, NULL, NULL, NULL, NULL, 0, 95, 50000.00, 0.00, 4620816365181477320, NULL, NULL, '2021-10-05'),
(96, '20211005Journal Entry95', '2021-10-05', '', '1640 Fixed Asset Furniture', 'Journal Entry', 'purchase of furniture', 'Straight-line', 60, 'Furniture & Fixtures', NULL, NULL, NULL, NULL, NULL, 0, 95, 3480.00, 0.00, 4620816365181477320, NULL, NULL, '2021-10-05'),
(97, '20211019Credit Card Credit95', '2021-10-19', 'Computers by Jenni', '1640 Fixed Asset Furniture', 'Credit Card Credit', 'purchase of furniture', 'Straight-line', 60, 'Furniture & Fixtures', NULL, NULL, NULL, NULL, NULL, 0, 95, 0.00, 15467.00, 4620816365181477320, NULL, NULL, '2021-10-19'),
(98, '20211020Journal Entry95', '2021-10-20', '', '1640 Fixed Asset Furniture', 'Journal Entry', 'purchase of furniture', 'Straight-line', 60, 'Furniture & Fixtures', NULL, NULL, NULL, NULL, NULL, 0, 95, 2340.00, 0.00, 4620816365181477320, NULL, NULL, '2021-10-20'),
(99, '20211026Bill95', '2021-10-26', 'National Eye Care', '1640 Fixed Asset Furniture', 'Bill', 'purchase of furniture', 'Straight-line', 60, 'Furniture & Fixtures', NULL, NULL, NULL, NULL, NULL, 0, 95, 16000.00, 0.00, 4620816365181477320, NULL, NULL, '2021-10-26'),
(100, '20211110Bill95', '2021-11-10', 'Lee Advertising', '1640 Fixed Asset Furniture', 'Bill', 'purchase of furniture', 'Straight-line', 60, 'Furniture & Fixtures', NULL, NULL, NULL, NULL, NULL, 0, 95, 8000.00, 0.00, 4620816365181477320, NULL, NULL, '2021-11-10'),
(101, '20211110Journal Entry95', '2021-11-10', '', '1640 Fixed Asset Furniture', 'Journal Entry', 'purchase of furniture', 'Straight-line', 60, 'Furniture & Fixtures', NULL, NULL, NULL, NULL, NULL, 0, 95, 27000.00, 0.00, 4620816365181477320, NULL, NULL, '2021-11-10'),
(102, '20211117Credit Card Credit95', '2021-11-17', 'Lee Advertising', '1640 Fixed Asset Furniture', 'Credit Card Credit', 'purchase of furniture', 'Straight-line', 60, 'Furniture & Fixtures', NULL, NULL, NULL, NULL, NULL, 0, 95, 0.00, 12356.00, 4620816365181477320, NULL, NULL, '2021-11-17'),
(103, '20211124Bill95', '2021-11-24', 'PG&E', '1640 Fixed Asset Furniture', 'Bill', 'purchase of furniture', 'Straight-line', 60, 'Furniture & Fixtures', NULL, NULL, NULL, NULL, NULL, 0, 95, 12875.00, 0.00, 4620816365181477320, NULL, NULL, '2021-11-24'),
(104, '20211126Journal Entry95', '2021-11-26', '', '1640 Fixed Asset Furniture', 'Journal Entry', 'purchase of furniture', 'Straight-line', 60, 'Furniture & Fixtures', NULL, NULL, NULL, NULL, NULL, 0, 95, 23900.00, 0.00, 4620816365181477320, NULL, NULL, '2021-11-26'),
(105, '20211207Bill95', '2021-12-07', 'Hall Properties', '1640 Fixed Asset Furniture', 'Bill', 'purchase of furniture', 'Straight-line', 60, 'Furniture & Fixtures', NULL, NULL, NULL, NULL, NULL, 0, 95, 30000.00, 0.00, 4620816365181477320, NULL, NULL, '2021-12-07'),
(106, '20211208Journal Entry95', '2021-12-08', '', '1640 Fixed Asset Furniture', 'Journal Entry', 'purchase of furniture', 'Straight-line', 60, 'Furniture & Fixtures', NULL, NULL, NULL, NULL, NULL, 0, 95, 28876.00, 0.00, 4620816365181477320, NULL, NULL, '2021-12-08'),
(107, '20211215Credit Card Credit95', '2021-12-15', 'Pam Seitz', '1640 Fixed Asset Furniture', 'Credit Card Credit', 'purchase of furniture', 'Straight-line', 60, 'Furniture & Fixtures', NULL, NULL, NULL, NULL, NULL, 0, 95, 0.00, 16700.00, 4620816365181477320, NULL, NULL, '2021-12-15'),
(108, '20211223Journal Entry95', '2021-12-23', '', '1640 Fixed Asset Furniture', 'Journal Entry', 'purchse of furniture', 'Straight-line', 60, 'Furniture & Fixtures', NULL, NULL, NULL, NULL, NULL, 0, 95, 17654.00, 0.00, 4620816365181477320, NULL, NULL, '2021-12-23'),
(109, '20211228Bill95', '2021-12-28', 'Robertson & Associates', '1640 Fixed Asset Furniture', 'Bill', 'purchase of furniture', 'Straight-line', 60, 'Furniture & Fixtures', NULL, NULL, NULL, NULL, NULL, 0, 95, 15000.00, 0.00, 4620816365181477320, NULL, NULL, '2021-12-28'),
(110, '20211229Journal Entry95', '2021-12-29', '', '1640 Fixed Asset Furniture', 'Journal Entry', 'purchase of furniture', 'Straight-line', 60, 'Furniture & Fixtures', NULL, NULL, NULL, NULL, NULL, 0, 95, 5478.00, 0.00, 4620816365181477320, NULL, NULL, '2021-12-29'),
(111, '20210601Journal Entry91', '2021-06-01', '', '1610 Buildings Cost', 'Journal Entry', 'purchase of buiding', 'Straight-line', 180, 'Buildings', NULL, NULL, NULL, NULL, NULL, 0, 91, 12346.00, 0.00, 4620816365181477320, NULL, NULL, '2021-06-01'),
(112, '20210615Bill91', '2021-06-15', 'Cal Telephone', '1610 Buildings Cost', 'Bill', 'purchase of building', 'Straight-line', 180, 'Buildings', NULL, NULL, NULL, NULL, NULL, 0, 91, 47000.00, 0.00, 4620816365181477320, NULL, NULL, '2021-06-15'),
(113, '20210615Credit Card Credit91', '2021-06-15', 'Chin\'s Gas and Oil', '1610 Buildings Cost', 'Credit Card Credit', 'purchase of building', 'Straight-line', 180, 'Buildings', NULL, NULL, NULL, NULL, NULL, 0, 91, 0.00, 17000.00, 4620816365181477320, NULL, NULL, '2021-06-15'),
(114, '20210623Bill91', '2021-06-23', 'Brosnahan Insurance Agency', '1610 Buildings Cost', 'Bill', 'purchase of building', 'Straight-line', 180, 'Buildings', NULL, NULL, NULL, NULL, NULL, 0, 91, 24000.00, 0.00, 4620816365181477320, NULL, NULL, '2021-06-23'),
(115, '20210624Journal Entry91', '2021-06-24', '', '1610 Buildings Cost', 'Journal Entry', 'purchase of building', 'Straight-line', 180, 'Buildings', NULL, NULL, NULL, NULL, NULL, 0, 91, 6754.00, 0.00, 4620816365181477320, NULL, NULL, '2021-06-24'),
(116, '20210702Journal Entry91', '2021-07-02', '', '1610 Buildings Cost', 'Journal Entry', 'purchase of building', 'Straight-line', 180, 'Buildings', NULL, NULL, NULL, NULL, NULL, 0, 91, 7234.00, 0.00, 4620816365181477320, NULL, NULL, '2021-07-02'),
(117, '20210706Bill91', '2021-07-06', 'Books by Bessie', '1610 Buildings Cost', 'Bill', 'purchase of building', 'Straight-line', 180, 'Buildings', NULL, NULL, NULL, NULL, NULL, 0, 91, 33000.00, 0.00, 4620816365181477320, NULL, NULL, '2021-07-06'),
(118, '20210714Credit Card Credit91', '2021-07-14', 'Cigna Health Care', '1610 Buildings Cost', 'Credit Card Credit', 'purchase of building', 'Straight-line', 180, 'Buildings', NULL, NULL, NULL, NULL, NULL, 0, 91, 0.00, 6879.00, 4620816365181477320, NULL, NULL, '2021-07-14'),
(119, '20210715Journal Entry91', '2021-07-15', '', '1610 Buildings Cost', 'Journal Entry', 'purchase of building', 'Straight-line', 180, 'Buildings', NULL, NULL, NULL, NULL, NULL, 0, 91, 8765.00, 0.00, 4620816365181477320, NULL, NULL, '2021-07-15'),
(120, '20210721Bill91', '2021-07-21', 'Mahoney Mugs', '1610 Buildings Cost', 'Bill', 'purchase of buiding', 'Straight-line', 180, 'Buildings', NULL, NULL, NULL, NULL, NULL, 0, 91, 15675.00, 0.00, 4620816365181477320, NULL, NULL, '2021-07-21'),
(121, '20210806Journal Entry91', '2021-08-06', '', '1610 Buildings Cost', 'Journal Entry', 'purchase of building', 'Straight-line', 180, 'Buildings', NULL, NULL, NULL, NULL, NULL, 0, 91, 8765.00, 0.00, 4620816365181477320, NULL, NULL, '2021-08-06'),
(122, '20210810Bill91', '2021-08-10', 'Books by Bessie', '1610 Buildings Cost', 'Bill', 'purchase of building', 'Straight-line', 180, 'Buildings', NULL, NULL, NULL, NULL, NULL, 0, 91, 30000.00, 0.00, 4620816365181477320, NULL, NULL, '2021-08-10'),
(123, '20210819Journal Entry91', '2021-08-19', '', '1610 Buildings Cost', 'Journal Entry', 'purchase of building', 'Straight-line', 180, 'Buildings', NULL, NULL, NULL, NULL, NULL, 0, 91, 11600.00, 0.00, 4620816365181477320, NULL, NULL, '2021-08-19'),
(124, '20210825Credit Card Credit91', '2021-08-25', 'Diego\'s Road Warrior Bodyshop', '1610 Buildings Cost', 'Credit Card Credit', 'purchase of building', 'Straight-line', 180, 'Buildings', NULL, NULL, NULL, NULL, NULL, 0, 91, 0.00, 16500.00, 4620816365181477320, NULL, NULL, '2021-08-25'),
(125, '20210825Bill91', '2021-08-25', 'Cigna Health Care', '1610 Buildings Cost', 'Bill', 'purchase of buiding', 'Straight-line', 180, 'Buildings', NULL, NULL, NULL, NULL, NULL, 0, 91, 45698.00, 0.00, 4620816365181477320, NULL, NULL, '2021-08-25'),
(126, '20210908Journal Entry91', '2021-09-08', '', '1610 Buildings Cost', 'Journal Entry', 'purchase of building', 'Straight-line', 180, 'Buildings', NULL, NULL, NULL, NULL, NULL, 0, 91, 11678.00, 0.00, 4620816365181477320, NULL, NULL, '2021-09-08'),
(127, '20210914Bill91', '2021-09-14', 'Computers by Jenni', '1610 Buildings Cost', 'Bill', 'purchase of building', 'Straight-line', 180, 'Buildings', NULL, NULL, NULL, NULL, NULL, 0, 91, 23456.00, 0.00, 4620816365181477320, NULL, NULL, '2021-09-14'),
(128, '20210915Credit Card Credit91', '2021-09-15', 'Met Life Dental', '1610 Buildings Cost', 'Credit Card Credit', 'purchase of building', 'Straight-line', 180, 'Buildings', NULL, NULL, NULL, NULL, NULL, 0, 91, 0.00, 20000.00, 4620816365181477320, NULL, NULL, '2021-09-15'),
(129, '20210923Bill91', '2021-09-23', 'Met Life Dental', '1610 Buildings Cost', 'Bill', 'purchase of buildig', 'Straight-line', 180, 'Buildings', NULL, NULL, NULL, NULL, NULL, 0, 91, 25000.00, 0.00, 4620816365181477320, NULL, NULL, '2021-09-23'),
(130, '20210924Journal Entry91', '2021-09-24', '', '1610 Buildings Cost', 'Journal Entry', 'purchase of building', 'Straight-line', 180, 'Buildings', NULL, NULL, NULL, NULL, NULL, 0, 91, 4598.00, 0.00, 4620816365181477320, NULL, NULL, '2021-09-24'),
(131, '20211006Bill91', '2021-10-06', 'Tania\'s Nursery', '1610 Buildings Cost', 'Bill', 'purchase of building', 'Straight-line', 180, 'Buildings', NULL, NULL, NULL, NULL, NULL, 0, 91, 34567.00, 0.00, 4620816365181477320, NULL, NULL, '2021-10-06'),
(132, '20211012Journal Entry91', '2021-10-12', '', '1610 Buildings Cost', 'Journal Entry', 'purchase of building', 'Straight-line', 180, 'Buildings', NULL, NULL, NULL, NULL, NULL, 0, 91, 8764.00, 0.00, 4620816365181477320, NULL, NULL, '2021-10-12'),
(133, '20211020Credit Card Credit91', '2021-10-20', 'Norton Lumber and Building Materials', '1610 Buildings Cost', 'Credit Card Credit', 'purchase of building', 'Straight-line', 180, 'Buildings', NULL, NULL, NULL, NULL, NULL, 0, 91, 0.00, 12890.00, 4620816365181477320, NULL, NULL, '2021-10-20'),
(134, '20211027Bill91', '2021-10-27', 'Pam Seitz', '1610 Buildings Cost', 'Bill', 'purchase of building', 'Straight-line', 180, 'Buildings', NULL, NULL, NULL, NULL, NULL, 0, 91, 23564.00, 0.00, 4620816365181477320, NULL, NULL, '2021-10-27'),
(135, '20211028Journal Entry91', '2021-10-28', '', '1610 Buildings Cost', 'Journal Entry', 'purchase of building', 'Straight-line', 180, 'Buildings', NULL, NULL, NULL, NULL, NULL, 0, 91, 1267.00, 0.00, 4620816365181477320, NULL, NULL, '2021-10-28'),
(136, '20211110Journal Entry91', '2021-11-10', '', '1610 Buildings Cost', 'Journal Entry', 'purchase of building', 'Straight-line', 180, 'Buildings', NULL, NULL, NULL, NULL, NULL, 0, 91, 13500.00, 0.00, 4620816365181477320, NULL, NULL, '2021-11-10'),
(137, '20211110Bill91', '2021-11-10', 'Robertson & Associates', '1610 Buildings Cost', 'Bill', 'purchase of building', 'Straight-line', 180, 'Buildings', NULL, NULL, NULL, NULL, NULL, 0, 91, 23546.00, 0.00, 4620816365181477320, NULL, NULL, '2021-11-10'),
(138, '20211117Credit Card Credit91', '2021-11-17', 'National Eye Care', '1610 Buildings Cost', 'Credit Card Credit', 'purchase of building', 'Straight-line', 180, 'Buildings', NULL, NULL, NULL, NULL, NULL, 0, 91, 0.00, 15000.00, 4620816365181477320, NULL, NULL, '2021-11-17'),
(139, '20211124Bill91', '2021-11-24', 'Mahoney Mugs', '1610 Buildings Cost', 'Bill', 'purchase of buiding', 'Straight-line', 180, 'Buildings', NULL, NULL, NULL, NULL, NULL, 0, 91, 6578.00, 0.00, 4620816365181477320, NULL, NULL, '2021-11-24'),
(140, '20211125Journal Entry91', '2021-11-25', '', '1610 Buildings Cost', 'Journal Entry', 'purchase of building', 'Straight-line', 180, 'Buildings', NULL, NULL, NULL, NULL, NULL, 0, 91, 7864.00, 0.00, 4620816365181477320, NULL, NULL, '2021-11-25'),
(141, '20211208Bill91', '2021-12-08', 'National Eye Care', '1610 Buildings Cost', 'Bill', 'purchase of building', 'Straight-line', 180, 'Buildings', NULL, NULL, NULL, NULL, NULL, 0, 91, 23456.00, 0.00, 4620816365181477320, NULL, NULL, '2021-12-08'),
(142, '20211210Journal Entry91', '2021-12-10', '', '1610 Buildings Cost', 'Journal Entry', 'purchase of building', 'Straight-line', 180, 'Buildings', NULL, NULL, NULL, NULL, NULL, 0, 91, 6790.00, 0.00, 4620816365181477320, NULL, NULL, '2021-12-10'),
(143, '20211215Credit Card Credit91', '2021-12-15', 'PG&E', '1610 Buildings Cost', 'Credit Card Credit', 'purchase of building', 'Straight-line', 180, 'Buildings', NULL, NULL, NULL, NULL, NULL, 0, 91, 0.00, 17658.00, 4620816365181477320, NULL, NULL, '2021-12-15'),
(144, '20211221Journal Entry91', '2021-12-21', '', '1610 Buildings Cost', 'Journal Entry', 'purchase of building', 'Straight-line', 180, 'Buildings', NULL, NULL, NULL, NULL, NULL, 0, 91, 24000.00, 0.00, 4620816365181477320, NULL, NULL, '2021-12-21'),
(145, '20211222Bill91', '2021-12-22', 'Tania\'s Nursery', '1610 Buildings Cost', 'Bill', 'purchase of building', 'Straight-line', 180, 'Buildings', NULL, NULL, NULL, NULL, NULL, 0, 91, 5467.00, 0.00, 4620816365181477320, NULL, NULL, '2021-12-22'),
(146, '20211230Journal Entry91', '2021-12-30', '', '1610 Buildings Cost', 'Journal Entry', 'purchase of building', 'Straight-line', 180, 'Buildings', NULL, NULL, NULL, NULL, NULL, 0, 91, 8743.00, 0.00, 4620816365181477320, NULL, NULL, '2021-12-30'),
(147, '20210601Journal Entry38', '2021-06-01', '', '1622 Truck:Original Cost', 'Journal Entry', 'purchase of truck', 'Straight-line', 60, 'Vehicles', NULL, NULL, NULL, NULL, NULL, 0, 38, 10000.00, 0.00, 4620816365181477320, NULL, NULL, '2021-06-01'),
(148, '20210603Bill38', '2021-06-03', 'Books by Bessie', '1622 Truck:Original Cost', 'Bill', 'purchase of truck', 'Straight-line', 60, 'Vehicles', NULL, NULL, NULL, NULL, NULL, 0, 38, 9000.00, 0.00, 4620816365181477320, NULL, NULL, '2021-06-03'),
(149, '20210609Journal Entry38', '2021-06-09', '', '1622 Truck:Original Cost', 'Journal Entry', 'purchase of truck', 'Straight-line', 60, 'Vehicles', NULL, NULL, NULL, NULL, NULL, 0, 38, 12000.00, 0.00, 4620816365181477320, NULL, NULL, '2021-06-09'),
(150, '20210629Bill38', '2021-06-29', 'Books by Bessie', '1622 Truck:Original Cost', 'Bill', 'purchase of truck', 'Straight-line', 60, 'Vehicles', NULL, NULL, NULL, NULL, NULL, 0, 38, 6543.00, 0.00, 4620816365181477320, NULL, NULL, '2021-06-29'),
(151, '20210701Journal Entry38', '2021-07-01', '', '1622 Truck:Original Cost', 'Journal Entry', 'purchase of truck', 'Straight-line', 60, 'Vehicles', NULL, NULL, NULL, NULL, NULL, 0, 38, 4000.00, 0.00, 4620816365181477320, NULL, NULL, '2021-07-01'),
(152, '20210714Journal Entry38', '2021-07-14', '', '1622 Truck:Original Cost', 'Journal Entry', 'purchase of truck', 'Straight-line', 60, 'Vehicles', NULL, NULL, NULL, NULL, NULL, 0, 38, 18000.00, 0.00, 4620816365181477320, NULL, NULL, '2021-07-14'),
(153, '20210801Journal Entry38', '2021-08-01', '', '1622 Truck:Original Cost', 'Journal Entry', 'purchase of truck', 'Straight-line', 60, 'Vehicles', NULL, NULL, NULL, NULL, NULL, 0, 38, 22000.00, 0.00, 4620816365181477320, NULL, NULL, '2021-08-01'),
(154, '20210802Journal Entry38', '2021-08-02', '', '1622 Truck:Original Cost', 'Journal Entry', 'purchase of truck', 'Straight-line', 60, 'Vehicles', NULL, NULL, NULL, NULL, NULL, 0, 38, 28000.00, 0.00, 4620816365181477320, NULL, NULL, '2021-08-02'),
(155, '20210811Journal Entry38', '2021-08-11', '', '1622 Truck:Original Cost', 'Journal Entry', 'purchase of truck', 'Straight-line', 60, 'Vehicles', NULL, NULL, NULL, NULL, NULL, 0, 38, 13600.00, 0.00, 4620816365181477320, NULL, NULL, '2021-08-11'),
(156, '20210902Journal Entry38', '2021-09-02', '', '1622 Truck:Original Cost', 'Journal Entry', 'purchase of truck', 'Straight-line', 60, 'Vehicles', NULL, NULL, NULL, NULL, NULL, 0, 38, 7689.00, 0.00, 4620816365181477320, NULL, NULL, '2021-09-02'),
(157, '20210923Journal Entry38', '2021-09-23', '', '1622 Truck:Original Cost', 'Journal Entry', 'purchase of truck', 'Straight-line', 60, 'Vehicles', NULL, NULL, NULL, NULL, NULL, 0, 38, 6578.00, 0.00, 4620816365181477320, NULL, NULL, '2021-09-23'),
(158, '20211001Journal Entry38', '2021-10-01', '', '1622 Truck:Original Cost', 'Journal Entry', 'purchase of truck', 'Straight-line', 60, 'Vehicles', NULL, NULL, NULL, NULL, NULL, 0, 38, 15000.00, 0.00, 4620816365181477320, NULL, NULL, '2021-10-01'),
(159, '20211020Journal Entry38', '2021-10-20', '', '1622 Truck:Original Cost', 'Journal Entry', 'purchase of truck', 'Straight-line', 60, 'Vehicles', NULL, NULL, NULL, NULL, NULL, 0, 38, 12000.00, 0.00, 4620816365181477320, NULL, NULL, '2021-10-20'),
(160, '20211103Journal Entry38', '2021-11-03', '', '1622 Truck:Original Cost', 'Journal Entry', 'purchase of truck', 'Straight-line', 60, 'Vehicles', NULL, NULL, NULL, NULL, NULL, 0, 38, 16786.00, 0.00, 4620816365181477320, NULL, NULL, '2021-11-03'),
(161, '20211107Journal Entry38', '2021-11-07', '', '1622 Truck:Original Cost', 'Journal Entry', 'Opening Balance', 'Straight-line', 60, 'Vehicles', NULL, NULL, NULL, NULL, NULL, 0, 38, 13495.00, 0.00, 4620816365181477320, NULL, NULL, '2021-11-07'),
(162, '20211125Journal Entry38', '2021-11-25', '', '1622 Truck:Original Cost', 'Journal Entry', 'purchase of truck', 'Straight-line', 60, 'Vehicles', NULL, NULL, NULL, NULL, NULL, 0, 38, 45678.00, 0.00, 4620816365181477320, NULL, NULL, '2021-11-25'),
(163, '20210603Journal Entry93', '2021-06-03', '', '1630 Fixed Asset Computers', 'Journal Entry', 'purchase of computer', 'Straight-line', 36, 'Computer & Equipment', NULL, NULL, NULL, NULL, NULL, 0, 93, 1598.00, 0.00, 4620816365181477320, NULL, NULL, '2021-06-03'),
(164, '20210608Bill93', '2021-06-08', 'Cal Telephone', '1630 Fixed Asset Computers', 'Bill', 'purchase of computer', 'Straight-line', 36, 'Computer & Equipment', NULL, NULL, NULL, NULL, NULL, 0, 93, 12456.00, 0.00, 4620816365181477320, NULL, NULL, '2021-06-08'),
(165, '20210616Credit Card Credit93', '2021-06-16', 'Bob\'s Burger Joint', '1630 Fixed Asset Computers', 'Credit Card Credit', 'purchase of computer', 'Straight-line', 36, 'Computer & Equipment', NULL, NULL, NULL, NULL, NULL, 0, 93, 0.00, 8790.00, 4620816365181477320, NULL, NULL, '2021-06-16'),
(166, '20210624Bill93', '2021-06-24', 'Cigna Health Care', '1630 Fixed Asset Computers', 'Bill', 'purchase of computer', 'Straight-line', 36, 'Computer & Equipment', NULL, NULL, NULL, NULL, NULL, 0, 93, 12500.00, 0.00, 4620816365181477320, NULL, NULL, '2021-06-24'),
(167, '20210624Journal Entry93', '2021-06-24', '', '1630 Fixed Asset Computers', 'Journal Entry', 'purchase of computer', 'Straight-line', 36, 'Computer & Equipment', NULL, NULL, NULL, NULL, NULL, 0, 93, 6798.00, 0.00, 4620816365181477320, NULL, NULL, '2021-06-24'),
(168, '20210708Journal Entry93', '2021-07-08', '', '1630 Fixed Asset Computers', 'Journal Entry', 'purchase of computer', 'Straight-line', 36, 'Computer & Equipment', NULL, NULL, NULL, NULL, NULL, 0, 93, 44300.00, 0.00, 4620816365181477320, NULL, NULL, '2021-07-08'),
(169, '20210721Credit Card Credit93', '2021-07-21', 'Lee Advertising', '1630 Fixed Asset Computers', 'Credit Card Credit', 'purchase of computer', 'Straight-line', 36, 'Computer & Equipment', NULL, NULL, NULL, NULL, NULL, 0, 93, 0.00, 50000.00, 4620816365181477320, NULL, NULL, '2021-07-21'),
(170, '20210721Bill93', '2021-07-21', 'Tim Philip Masonry', '1630 Fixed Asset Computers', 'Bill', 'purchase of computer', 'Straight-line', 36, 'Computer & Equipment', NULL, NULL, NULL, NULL, NULL, 0, 93, 34587.00, 0.00, 4620816365181477320, NULL, NULL, '2021-07-21'),
(171, '20210722Journal Entry93', '2021-07-22', '', '1630 Fixed Asset Computers', 'Journal Entry', 'purchase of computer', 'Straight-line', 36, 'Computer & Equipment', NULL, NULL, NULL, NULL, NULL, 0, 93, 7654.00, 0.00, 4620816365181477320, NULL, NULL, '2021-07-22'),
(172, '20210728Bill93', '2021-07-28', 'Tony Rondonuwu', '1630 Fixed Asset Computers', 'Bill', 'purchase of computer', 'Straight-line', 36, 'Computer & Equipment', NULL, NULL, NULL, NULL, NULL, 0, 93, 23456.00, 0.00, 4620816365181477320, NULL, NULL, '2021-07-28'),
(173, '20210804Journal Entry93', '2021-08-04', '', '1630 Fixed Asset Computers', 'Journal Entry', 'purchase of computer', 'Straight-line', 36, 'Computer & Equipment', NULL, NULL, NULL, NULL, NULL, 0, 93, 12400.00, 0.00, 4620816365181477320, NULL, NULL, '2021-08-04'),
(174, '20210810Bill93', '2021-08-10', 'Pam Seitz', '1630 Fixed Asset Computers', 'Bill', 'purchase of computer', 'Straight-line', 36, 'Computer & Equipment', NULL, NULL, NULL, NULL, NULL, 0, 93, 25000.00, 0.00, 4620816365181477320, NULL, NULL, '2021-08-10'),
(175, '20210817Credit Card Credit93', '2021-08-17', 'PG&E', '1630 Fixed Asset Computers', 'Credit Card Credit', 'purchase of computer', 'Straight-line', 36, 'Computer & Equipment', NULL, NULL, NULL, NULL, NULL, 0, 93, 0.00, 13450.00, 4620816365181477320, NULL, NULL, '2021-08-17'),
(176, '20210825Bill93', '2021-08-25', 'Tim Philip Masonry', '1630 Fixed Asset Computers', 'Bill', 'purchase of computer', 'Straight-line', 36, 'Computer & Equipment', NULL, NULL, NULL, NULL, NULL, 0, 93, 34987.00, 0.00, 4620816365181477320, NULL, NULL, '2021-08-25'),
(177, '20210826Journal Entry93', '2021-08-26', '', '1630 Fixed Asset Computers', 'Journal Entry', 'purchase of computer', 'Straight-line', 36, 'Computer & Equipment', NULL, NULL, NULL, NULL, NULL, 0, 93, 18900.00, 0.00, 4620816365181477320, NULL, NULL, '2021-08-26'),
(178, '20210908Bill93', '2021-09-08', 'Tania\'s Nursery', '1630 Fixed Asset Computers', 'Bill', 'purchase of computer', 'Straight-line', 36, 'Computer & Equipment', NULL, NULL, NULL, NULL, NULL, 0, 93, 7689.00, 0.00, 4620816365181477320, NULL, NULL, '2021-09-08'),
(179, '20210910Journal Entry93', '2021-09-10', '', '1630 Fixed Asset Computers', 'Journal Entry', 'purchase of computer', 'Straight-line', 36, 'Computer & Equipment', NULL, NULL, NULL, NULL, NULL, 0, 93, 22000.00, 0.00, 4620816365181477320, NULL, NULL, '2021-09-10'),
(180, '20210921Credit Card Credit93', '2021-09-21', 'Pam Seitz', '1630 Fixed Asset Computers', 'Credit Card Credit', 'purchase of computer', 'Straight-line', 36, 'Computer & Equipment', NULL, NULL, NULL, NULL, NULL, 0, 93, 0.00, 17800.00, 4620816365181477320, NULL, NULL, '2021-09-21'),
(181, '20210923Journal Entry93', '2021-09-23', '', '1630 Fixed Asset Computers', 'Journal Entry', 'purchase of computer', 'Straight-line', 36, 'Computer & Equipment', NULL, NULL, NULL, NULL, NULL, 0, 93, 2000.00, 0.00, 4620816365181477320, NULL, NULL, '2021-09-23'),
(182, '20210929Bill93', '2021-09-29', 'Tania\'s Nursery', '1630 Fixed Asset Computers', 'Bill', 'purchase of computer', 'Straight-line', 36, 'Computer & Equipment', NULL, NULL, NULL, NULL, NULL, 0, 93, 45000.00, 0.00, 4620816365181477320, NULL, NULL, '2021-09-29'),
(183, '20211010Journal Entry93', '2021-10-10', '', '1630 Fixed Asset Computers', 'Journal Entry', 'purchase of computer', 'Straight-line', 36, 'Computer & Equipment', NULL, NULL, NULL, NULL, NULL, 0, 93, 5609.00, 0.00, 4620816365181477320, NULL, NULL, '2021-10-10'),
(184, '20211013Bill93', '2021-10-13', 'Tania\'s Nursery', '1630 Fixed Asset Computers', 'Bill', 'purchase of computer', 'Straight-line', 36, 'Computer & Equipment', NULL, NULL, NULL, NULL, NULL, 0, 93, 43000.00, 0.00, 4620816365181477320, NULL, NULL, '2021-10-13'),
(185, '20211019Credit Card Credit93', '2021-10-19', 'Robertson & Associates', '1630 Fixed Asset Computers', 'Credit Card Credit', 'purchase of computer', 'Straight-line', 36, 'Computer & Equipment', NULL, NULL, NULL, NULL, NULL, 0, 93, 0.00, 12500.00, 4620816365181477320, NULL, NULL, '2021-10-19'),
(186, '20211021Journal Entry93', '2021-10-21', '', '1630 Fixed Asset Computers', 'Journal Entry', 'purchase of computer', 'Straight-line', 36, 'Computer & Equipment', NULL, NULL, NULL, NULL, NULL, 0, 93, 6598.00, 0.00, 4620816365181477320, NULL, NULL, '2021-10-21'),
(187, '20211027Bill93', '2021-10-27', 'Cal Telephone', '1630 Fixed Asset Computers', 'Bill', 'purchase of computer', 'Straight-line', 36, 'Computer & Equipment', NULL, NULL, NULL, NULL, NULL, 0, 93, 12432.00, 0.00, 4620816365181477320, NULL, NULL, '2021-10-27'),
(188, '20211110Bill93', '2021-11-10', 'Tony Rondonuwu', '1630 Fixed Asset Computers', 'Bill', 'purchase of computer', 'Straight-line', 36, 'Computer & Equipment', NULL, NULL, NULL, NULL, NULL, 0, 93, 20000.00, 0.00, 4620816365181477320, NULL, NULL, '2021-11-10'),
(189, '20211110Journal Entry93', '2021-11-10', '', '1630 Fixed Asset Computers', 'Journal Entry', 'purchase of computer', 'Straight-line', 36, 'Computer & Equipment', NULL, NULL, NULL, NULL, NULL, 0, 93, 4500.00, 0.00, 4620816365181477320, NULL, NULL, '2021-11-10'),
(190, '20211110Credit Card Credit93', '2021-11-10', 'Met Life Dental', '1630 Fixed Asset Computers', 'Credit Card Credit', 'purchase of computer', 'Straight-line', 36, 'Computer & Equipment', NULL, NULL, NULL, NULL, NULL, 0, 93, 0.00, 16789.00, 4620816365181477320, NULL, NULL, '2021-11-10'),
(191, '20211124Bill93', '2021-11-24', 'PG&E', '1630 Fixed Asset Computers', 'Bill', 'purchase of computer', 'Straight-line', 36, 'Computer & Equipment', NULL, NULL, NULL, NULL, NULL, 0, 93, 23459.00, 0.00, 4620816365181477320, NULL, NULL, '2021-11-24'),
(192, '20211125Journal Entry93', '2021-11-25', '', '1630 Fixed Asset Computers', 'Journal Entry', 'purchase of computer', 'Straight-line', 36, 'Computer & Equipment', NULL, NULL, NULL, NULL, NULL, 0, 93, 26000.00, 0.00, 4620816365181477320, NULL, NULL, '2021-11-25'),
(193, '20211207Bill93', '2021-12-07', 'Hall Properties', '1630 Fixed Asset Computers', 'Bill', 'purchase of computer', 'Straight-line', 36, 'Computer & Equipment', NULL, NULL, NULL, NULL, NULL, 0, 93, 34569.00, 0.00, 4620816365181477320, NULL, NULL, '2021-12-07'),
(194, '20211208Journal Entry93', '2021-12-08', '', '1630 Fixed Asset Computers', 'Journal Entry', 'purchase of computer', 'Straight-line', 36, 'Computer & Equipment', NULL, NULL, NULL, NULL, NULL, 0, 93, 27000.00, 0.00, 4620816365181477320, NULL, NULL, '2021-12-08'),
(195, '20211222Credit Card Credit93', '2021-12-22', 'Mahoney Mugs', '1630 Fixed Asset Computers', 'Credit Card Credit', 'purchase of computer', 'Straight-line', 36, 'Computer & Equipment', NULL, NULL, NULL, NULL, NULL, 0, 93, 0.00, 15678.00, 4620816365181477320, NULL, NULL, '2021-12-22'),
(196, '20211228Bill93', '2021-12-28', 'Tony Rondonuwu', '1630 Fixed Asset Computers', 'Bill', 'purchase of computer', 'Straight-line', 36, 'Computer & Equipment', NULL, NULL, NULL, NULL, NULL, 0, 93, 21500.00, 0.00, 4620816365181477320, NULL, NULL, '2021-12-28'),
(197, '20211228Journal Entry93', '2021-12-28', '', '1630 Fixed Asset Computers', 'Journal Entry', 'purchase of computer', 'Straight-line', 36, 'Computer & Equipment', NULL, NULL, NULL, NULL, NULL, 0, 93, 28000.00, 0.00, 4620816365181477320, NULL, NULL, '2021-12-28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor` int(11) DEFAULT NULL,
  `otp` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `title`, `fname`, `lname`, `email`, `email_verified_at`, `password`, `remember_token`, `profile`, `role`, `two_factor`, `otp`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Neeraj', 'Dandotiya', 'neeraj@bizmethsolutions.com', NULL, '$2y$10$QAbQVKUSAKf5nTWstbozze/ja39KbTWF1x3eDz7D5O8/uVPBHLPWe', NULL, NULL, NULL, NULL, NULL, '2021-12-17 14:18:55', '2021-12-17 14:18:55'),
(2, NULL, 'pranjal', 'mathur', 'Pranjalm35@gmail.com', NULL, 'eyJpdiI6IlJsWlRzdzllSVJBUEdhZldpMXEzbVE9PSIsInZhbHVlIjoiUmltaDJsdTNOcVVmd1VqdWFrZlRBdz09IiwibWFjIjoiNTljZTNlMTg0NzQ5OTU2NWRhMmM5ODAxYWFmYTk0Mzc2NDdkMzJiZjAwMTYwZDVkNTZlNWM0ZjUzODQ3NDYzNyIsInRhZyI6IiJ9', NULL, NULL, NULL, NULL, NULL, '2021-12-19 18:44:04', '2021-12-19 18:44:04'),
(3, NULL, 'pranjal', 'mathur', 'development1@gmail.com', NULL, 'eyJpdiI6ImZLM0k4NGc4djVoem9YajAwZ1ZTQ2c9PSIsInZhbHVlIjoiLzBtUXdPbUVhY0g4NjlqZHdIUXFJQT09IiwibWFjIjoiY2QxMGI0NGEwNWI3MjcyOGVkM2Y5ZTEyMWQ4MDc0NmQzZTBjZjAwYmZmZDQ3NDIxNmVhZWUxMTY1YmNjZDE3YiIsInRhZyI6IiJ9', NULL, NULL, NULL, NULL, NULL, '2021-12-20 06:09:10', '2021-12-20 06:09:10'),
(4, NULL, 'Siddharth', 'Jain', 'sid@finsuite.io', NULL, '$2y$10$vnDUAO0aLSx3Mpds1yjY7.zdqWSzQeKSyvOc4A/JKneeFmrzyoiUy', NULL, NULL, NULL, NULL, NULL, '2021-12-20 14:18:06', '2021-12-20 14:18:06'),
(5, NULL, 'Mansi', 'Sogani', 'mansisogani1207@gmail.com', NULL, 'eyJpdiI6IjBBTTRXSE1oV3JrYjE0Rm84WnVPM0E9PSIsInZhbHVlIjoiUURqOTk4dWhkQ2tocEtBanJVZUVYdz09IiwibWFjIjoiYzAxNzNmODRkMTMyOWZkNDU4NGI3MTBkZWViMTIyODI2ODM4Y2RhMjllNGE5NDJiMDU0OGViMWJlZGRlNjU4YSIsInRhZyI6IiJ9', NULL, NULL, NULL, NULL, NULL, '2021-12-23 12:41:07', '2021-12-23 12:41:07'),
(6, NULL, 'pranjal', 'mathur', 'test789@gmail.com', NULL, 'eyJpdiI6Ii9pYWNKSms1TE4vdGM3MHBSYzhKRlE9PSIsInZhbHVlIjoiNCs1dDVtd1ZYWmtITHhhQ1RIekxUZz09IiwibWFjIjoiYTQ1Mjg1ODY3YjQyZjcyODA5NTFiZDliYzc3MmI3MmZjNjdiZWIxZmJlNjE3OTFjNTBhZDEwY2MxMDQ3ZjkwYSIsInRhZyI6IiJ9', NULL, NULL, NULL, NULL, NULL, '2021-12-31 11:54:16', '2021-12-31 11:54:16'),
(7, NULL, 'Neeraj', 'Dandotiya', 'er.neerajdandotiya@gmail.com', NULL, '$2y$10$Y4bZRYlaIG5Pb59zNQ2fYeXHK0iD4Tgg7EfWuo3.tcvYYaH9qEFCS', NULL, NULL, NULL, NULL, NULL, '2022-01-17 17:34:30', '2022-01-17 17:34:30'),
(8, NULL, 'Pranjal', 'Mathur', 'Pm@gmail.com', NULL, '$2y$10$hh8tcsiJxEC0FS7du6VnhO1iMIc6V6YhaoxwXyvkFueJrMlJJj7Aq', NULL, NULL, NULL, NULL, NULL, '2022-01-28 07:39:20', '2022-01-28 07:39:20'),
(9, NULL, 'Siddharth', 'Jain', 'info@finsuite.io', NULL, '$2y$10$oD5PWTMogfw8VVeY4dgB/e4UZZqzNcF.1atZBF3V/x8eyUoPClPaW', NULL, NULL, NULL, NULL, NULL, '2022-02-06 19:40:49', '2022-02-06 19:40:49'),
(10, NULL, 'pranjal', 'mathur', 'Pm456@gmail.com', NULL, '$2y$10$WPYMTV3tfu1NEX2rMlJFY.PiGNgSte/99ZSkdO9t8MIvCCm1NBtKG', NULL, NULL, NULL, NULL, NULL, '2022-02-07 05:19:37', '2022-02-07 05:19:37'),
(11, NULL, 'pranjal', 'mathur', 'development@bizmethsolutions.com', NULL, '$2y$10$plbLvsRl0V7jXjQKFyAB8OekjJMKjA9HVGTq5c9f1iaYdA2knKvqe', NULL, NULL, NULL, NULL, NULL, '2022-02-08 11:52:58', '2022-02-08 11:52:58'),
(12, NULL, 'Sid', 'Jain', 'sid+test@finsuite.io', NULL, '$2y$10$zACad8wI5rLn8uMW1vYlvO0RB2Zgym56yL3UYkc7ESOI2guuIOg1q', NULL, NULL, NULL, NULL, NULL, '2022-02-08 13:06:41', '2022-02-08 13:06:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `asset_category`
--
ALTER TABLE `asset_category`
  ADD PRIMARY KEY (`asset_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `company_profile`
--
ALTER TABLE `company_profile`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `company_user`
--
ALTER TABLE `company_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `FA_depreciation_schedule`
--
ALTER TABLE `FA_depreciation_schedule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_asset_key` (`asset_key`);

--
-- Indexes for table `FA_historical_transaction`
--
ALTER TABLE `FA_historical_transaction`
  ADD PRIMARY KEY (`asset_key`);

--
-- Indexes for table `FA_Record`
--
ALTER TABLE `FA_Record`
  ADD PRIMARY KEY (`asset_key`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pre_assets`
--
ALTER TABLE `pre_assets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `QBO_Account`
--
ALTER TABLE `QBO_Account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rules`
--
ALTER TABLE `rules`
  ADD PRIMARY KEY (`rules_id`),
  ADD KEY `company_id` (`company_id`),
  ADD KEY `QBO_FA_ac_id` (`QBO_FA_ac_id`),
  ADD KEY `FK_acc_dep_ac` (`QBO_acc_dep_ac`),
  ADD KEY `FK_dep_ac` (`QBO_dep_ac`),
  ADD KEY `FK_gain_loss_ac` (`QBO_gain_loss_ac`);

--
-- Indexes for table `temp`
--
ALTER TABLE `temp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_asset_key` (`asset_key`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`asset_key`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `asset_category`
--
ALTER TABLE `asset_category`
  MODIFY `asset_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company_user`
--
ALTER TABLE `company_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `FA_depreciation_schedule`
--
ALTER TABLE `FA_depreciation_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `FA_historical_transaction`
--
ALTER TABLE `FA_historical_transaction`
  MODIFY `asset_key` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `FA_Record`
--
ALTER TABLE `FA_Record`
  MODIFY `asset_key` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pre_assets`
--
ALTER TABLE `pre_assets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `QBO_Account`
--
ALTER TABLE `QBO_Account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=595;

--
-- AUTO_INCREMENT for table `rules`
--
ALTER TABLE `rules`
  MODIFY `rules_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `temp`
--
ALTER TABLE `temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=332;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `asset_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=198;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `FA_depreciation_schedule`
--
ALTER TABLE `FA_depreciation_schedule`
  ADD CONSTRAINT `FK_asset_key` FOREIGN KEY (`asset_key`) REFERENCES `transactions` (`asset_key`);

--
-- Constraints for table `rules`
--
ALTER TABLE `rules`
  ADD CONSTRAINT `FK_ac_id` FOREIGN KEY (`QBO_FA_ac_id`) REFERENCES `QBO_Account` (`id`),
  ADD CONSTRAINT `FK_acc_dep_ac` FOREIGN KEY (`QBO_acc_dep_ac`) REFERENCES `QBO_Account` (`id`),
  ADD CONSTRAINT `FK_dep_ac` FOREIGN KEY (`QBO_dep_ac`) REFERENCES `QBO_Account` (`id`),
  ADD CONSTRAINT `FK_gain_loss_ac` FOREIGN KEY (`QBO_gain_loss_ac`) REFERENCES `QBO_Account` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
