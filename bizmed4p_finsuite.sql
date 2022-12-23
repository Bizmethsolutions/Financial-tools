-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 23, 2021 at 05:48 AM
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

INSERT INTO `company` (`company_id`, `company_name`, `default_currency`, `industry`, `date_format`, `fiscal_year`, `decimal_round`, `deminus_amount`, `first_month_depreciation_method`, `code`, `realmid`, `refresh_token`, `user_id`, `created_at`, `updated_at`) VALUES
(4620816365179390630, 'CLS Sandbox 1', 'USD', 'Family clothing stores', NULL, '2021-12-22', NULL, NULL, NULL, 'AB11640160638Mlubm5hH6K1mhYyjicB607LqDuZPkBxHajQ5c', '4620816365179390630', 'AB11648886679oNmeddpVvXhgQZAdHrMrxGcRDwvDqQaKuDxTh', 1, '2021-12-22 08:04:40', '2021-12-22 08:04:40'),
(4620816365179425220, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'AB11640084356nep6TOFiqTh1R5kSkldPBBNHg0bhbBQTUUrIP', '4620816365179425220', 'AB11648810397jVOiXWPmNfKtHNVCJ3YfygA8sCDS7jmzwuyiR', 1, '2021-12-21 10:53:18', '2021-12-21 10:53:18'),
(4620816365179432680, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'AB11639980966Iuhe9Tsk2jHf8utArpKYz5Lr5mmzR21byJV8t', '4620816365179432680', 'AB11648707008gVwX33cbnEqHyDurzUE5YNEx4DJWsPkQVo0Or', 3, '2021-12-20 06:10:10', '2021-12-20 06:10:10'),
(4620816365181477320, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'AB11640010283lX4gIARjEWke8uSnaG31XnBTWblEKGJVSi8yx', '4620816365181477320', 'AB11648736324shdGdnmSRSFQo3wFICXiwc9tHSXfEcENbBMqu', 4, '2021-12-20 14:18:44', '2021-12-20 14:18:44');

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
(1, 'Fixed Asset', 'AccumulatedDepletion', '', '', ''),
(2, 'Fixed Asset', 'AccumulatedDepreciation', '', '', ''),
(3, 'Fixed Asset', 'DepletableAssets', 'Other Fixed Asset', 'Straight-line', '36'),
(4, 'Fixed Asset', 'FixedAssetComputers', 'Computer & Equipment', 'Straight-line', '36'),
(5, 'Fixed Asset', 'FixedAssetCopiers', 'Computer & Equipment', 'Straight-line', '36'),
(6, 'Fixed Asset', 'FixedAssetFurniture', 'Furniture & Fixtures', 'Straight-line', '60'),
(7, 'Fixed Asset', 'FixedAssetPhone', 'Computer & Equipment', 'Straight-line', '36'),
(8, 'Fixed Asset', 'FixedAssetPhotoVideo', 'Computer & Equipment', 'Straight-line', '36'),
(9, 'Fixed Asset', 'FixedAssetSoftware', 'Software', 'Straight-line', '36'),
(10, 'Fixed Asset', 'FixedAssetOtherToolsEquipment', 'Other Fixed Asset', 'Straight-line', '36'),
(11, 'Fixed Asset', 'FurnitureAndFixtures (default)', 'Furniture & Fixtures', 'Straight-line', '60'),
(12, 'Fixed Asset', 'Land', 'Land', 'Do not depreciate', ''),
(13, 'Fixed Asset', 'LeaseholdImprovements', 'Leasehold Improvements', 'Straight-line', '60'),
(14, 'Fixed Asset', 'OtherFixedAssets', 'Other Fixed Asset', 'Straight-line', '36'),
(15, 'Fixed Asset', 'AccumulatedAmortization', '', '', ''),
(16, 'Fixed Asset', 'Buildings', 'Buildings', 'Straight-line', '180'),
(17, 'Fixed Asset', 'IntangibleAssets', 'Intangible Assets', 'Straight-line', '36'),
(18, 'Fixed Asset', 'MachineryAndEquipment', 'Plant & Machinery', 'Straight-line', '60'),
(19, 'Fixed Asset', 'Vehicles', 'Vehicles', 'Straight-line', '60'),
(20, 'Fixed Asset', 'AssetsInCourseOfConstruction', 'Capital WIP', 'Do not depreciate', ''),
(21, 'Fixed Asset', 'CapitalWip', 'Capital WIP', 'Do not depreciate', ''),
(22, 'Fixed Asset', 'CumulativeDepreciationOnIntangibleAssets', '', '', ''),
(23, 'Fixed Asset', 'IntangibleAssetsUnderDevelopment', 'Capital WIP', 'Do not depreciate', ''),
(24, 'Fixed Asset', 'LandAsset', 'Land', 'Do not depreciate', ''),
(25, 'Fixed Asset', 'NonCurrentAssets', 'Other Fixed Asset', 'Straight-line', '36'),
(26, 'Fixed Asset', 'ParticipatingInterests', 'Other Fixed Asset', 'Straight-line', '36'),
(27, 'Fixed Asset', 'ProvisionsFixedAssets', 'Other Fixed Asset', 'Straight-line', '36');

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
(99, 31, 'Accounts Payable', NULL, 'Liability', 'Accounts Payable', 'AccountsPayable', 4620816365179432680),
(100, 90, 'Accounts Payable (A/P) - HKD', NULL, 'Liability', 'Accounts Payable', 'AccountsPayable', 4620816365179432680),
(101, 32, 'Accounts Receivable', NULL, 'Asset', 'Accounts Receivable', 'AccountsReceivable', 4620816365179432680),
(102, 92, 'Accounts Receivable (A/R) - USD', NULL, 'Asset', 'Accounts Receivable', 'AccountsReceivable', 4620816365179432680),
(103, 33, 'Accumulated Depreciation', NULL, 'Asset', 'Fixed Asset', 'AccumulatedDepreciation', 4620816365179432680),
(104, 3, 'Advertising', NULL, 'Expense', 'Expense', 'AdvertisingPromotional', 4620816365179432680),
(105, 34, 'Ask My Accountant', NULL, 'Expense', 'Other Expense', 'OtherMiscellaneousExpense', 4620816365179432680),
(106, 4, 'Bank charges', NULL, 'Expense', 'Expense', 'BankCharges', 4620816365179432680),
(107, 30, 'Billable Expense Income', NULL, 'Revenue', 'Income', 'ServiceFeeIncome', 4620816365179432680),
(108, 35, 'Billable Expenses Income', NULL, 'Revenue', 'Income', 'OtherPrimaryIncome', 4620816365179432680),
(109, 36, 'Business Licenses and Permits', NULL, 'Expense', 'Expense', 'OtherMiscellaneousServiceCost', 4620816365179432680),
(110, 37, 'Charitable Contributions', NULL, 'Expense', 'Expense', 'CharitableContributions', 4620816365179432680),
(111, 38, 'Chequing', NULL, 'Asset', 'Bank', 'Checking', 4620816365179432680),
(112, 39, 'Commission Income', NULL, 'Revenue', 'Income', 'OtherPrimaryIncome', 4620816365179432680),
(113, 5, 'Commissions and fees', NULL, 'Expense', 'Expense', 'OtherMiscellaneousServiceCost', 4620816365179432680),
(114, 40, 'Commissions Paid', NULL, 'Expense', 'Cost of Goods Sold', 'CostOfSales', 4620816365179432680),
(115, 41, 'Computer and Internet Expenses', NULL, 'Expense', 'Expense', 'OtherMiscellaneousServiceCost', 4620816365179432680),
(116, 42, 'Continuing Education', NULL, 'Expense', 'Expense', 'OtherMiscellaneousServiceCost', 4620816365179432680),
(117, 84, 'Cost of Goods Sold', NULL, 'Expense', 'Cost of Goods Sold', 'SuppliesMaterialsCogs', 4620816365179432680),
(118, 43, 'Cost of sales', NULL, 'Expense', 'Cost of Goods Sold', 'SuppliesMaterialsCogs', 4620816365179432680),
(119, 44, 'Cost of Sales - billable expenses', NULL, 'Expense', 'Cost of Goods Sold', 'CostOfSales', 4620816365179432680),
(120, 45, 'Depreciation Expense', NULL, 'Expense', 'Other Expense', 'Depreciation', 4620816365179432680),
(121, 28, 'Discounts given', NULL, 'Revenue', 'Income', 'DiscountsRefundsGiven', 4620816365179432680),
(122, 6, 'Dues and Subscriptions', NULL, 'Expense', 'Expense', 'DuesSubscriptions', 4620816365179432680),
(123, 46, 'Entertainment Booking Fees paid on behalf of clients', NULL, 'Expense', 'Cost of Goods Sold', 'CostOfSales', 4620816365179432680),
(124, 47, 'Equipment rental', NULL, 'Expense', 'Expense', 'EquipmentRental', 4620816365179432680),
(125, 48, 'Exchange Gain or Loss', NULL, 'Expense', 'Other Expense', 'ExchangeGainOrLoss', 4620816365179432680),
(126, 7, 'Fees Billed', NULL, 'Revenue', 'Income', 'OtherPrimaryIncome', 4620816365179432680),
(127, 49, 'Furniture and Equipment', NULL, 'Asset', 'Fixed Asset', 'FurnitureAndFixtures', 4620816365179432680),
(128, 86, 'GST/HST Payable', NULL, 'Liability', 'Other Current Liability', 'GlobalTaxPayable', 4620816365179432680),
(129, 87, 'GST/HST Suspense', NULL, 'Liability', 'Other Current Liability', 'GlobalTaxSuspense', 4620816365179432680),
(130, 8, 'Insurance', NULL, 'Expense', 'Expense', 'Insurance', 4620816365179432680),
(131, 50, 'Insurance Expense', NULL, 'Expense', 'Expense', 'Insurance', 4620816365179432680),
(132, 51, 'Insurance Expense-General Liability Insurance', NULL, 'Expense', 'Expense', 'Insurance', 4620816365179432680),
(133, 52, 'Insurance Expense-Health Insurance', NULL, 'Expense', 'Expense', 'Insurance', 4620816365179432680),
(134, 53, 'Insurance Expense-Life and Disability Insurance', NULL, 'Expense', 'Expense', 'Insurance', 4620816365179432680),
(135, 9, 'Interest earned', NULL, 'Revenue', 'Other Income', 'InterestEarned', 4620816365179432680),
(136, 89, 'Interest expense', NULL, 'Expense', 'Expense', 'InterestPaid', 4620816365179432680),
(137, 85, 'Inventory Asset', NULL, 'Asset', 'Other Current Asset', 'Inventory', 4620816365179432680),
(138, 88, 'Inventory Shrinkage', NULL, 'Expense', 'Cost of Goods Sold', 'SuppliesMaterialsCogs', 4620816365179432680),
(139, 91, 'Janitorial Expense', NULL, 'Expense', 'Expense', 'OtherMiscellaneousServiceCost', 4620816365179432680),
(140, 55, 'Leasehold Improvements', NULL, 'Asset', 'Fixed Asset', 'LeaseholdImprovements', 4620816365179432680),
(141, 10, 'Legal and professional fees', NULL, 'Expense', 'Expense', 'LegalProfessionalFees', 4620816365179432680),
(142, 29, 'Markup', NULL, 'Revenue', 'Income', 'ServiceFeeIncome', 4620816365179432680),
(143, 11, 'Meals and entertainment', NULL, 'Expense', 'Expense', 'EntertainmentMeals', 4620816365179432680),
(144, 56, 'Merchant Account Fees', NULL, 'Expense', 'Cost of Goods Sold', 'CostOfSales', 4620816365179432680),
(145, 12, 'Miscellaneous', NULL, 'Expense', 'Other Expense', 'OtherMiscellaneousExpense', 4620816365179432680),
(146, 57, 'Note Payable', NULL, 'Liability', 'Long Term Liability', 'NotesPayable', 4620816365179432680),
(147, 13, 'Office expenses', NULL, 'Expense', 'Expense', 'SuppliesMaterials', 4620816365179432680),
(148, 58, 'Opening Balance Equity', NULL, 'Equity', 'Equity', 'OpeningBalanceEquity', 4620816365179432680),
(149, 14, 'Other Portfolio Income', NULL, 'Revenue', 'Other Income', 'OtherInvestmentIncome', 4620816365179432680),
(150, 59, 'Owner\'s Equity', NULL, 'Equity', 'Equity', 'OwnersEquity', 4620816365179432680),
(151, 80, 'Owner\'s Equity - Contributions', NULL, 'Equity', 'Equity', 'OwnersEquity', 4620816365179432680),
(152, 81, 'Owner\'s Equity - Draws', NULL, 'Equity', 'Equity', 'OwnersEquity', 4620816365179432680),
(153, 15, 'Penalties and settlements', NULL, 'Expense', 'Other Expense', 'PenaltiesSettlements', 4620816365179432680),
(154, 16, 'Prepaid expenses', NULL, 'Asset', 'Other Current Asset', 'PrepaidExpenses', 4620816365179432680),
(155, 60, 'Printed Materials purchased for clients', NULL, 'Expense', 'Cost of Goods Sold', 'CostOfSales', 4620816365179432680),
(156, 61, 'Printing and Reproduction', NULL, 'Expense', 'Expense', 'OtherMiscellaneousServiceCost', 4620816365179432680),
(157, 62, 'Professional Fees', NULL, 'Expense', 'Expense', 'LegalProfessionalFees', 4620816365179432680),
(158, 17, 'Promotional', NULL, 'Expense', 'Expense', 'PromotionalMeals', 4620816365179432680),
(159, 63, 'Purchases', NULL, 'Expense', 'Expense', 'SuppliesMaterials', 4620816365179432680),
(160, 18, 'Refunds-Allowances', NULL, 'Revenue', 'Income', 'DiscountsRefundsGiven', 4620816365179432680),
(161, 64, 'Rent Expense', NULL, 'Expense', 'Expense', 'RentOrLeaseOfBuildings', 4620816365179432680),
(162, 19, 'Rent or lease payments', NULL, 'Expense', 'Expense', 'RentOrLeaseOfBuildings', 4620816365179432680),
(163, 20, 'Repair and maintenance', NULL, 'Expense', 'Expense', 'RepairMaintenance', 4620816365179432680),
(164, 2, 'Retained Earnings', NULL, 'Equity', 'Equity', 'RetainedEarnings', 4620816365179432680),
(165, 65, 'Sales', NULL, 'Revenue', 'Income', 'OtherPrimaryIncome', 4620816365179432680),
(166, 66, 'Sales Discounts', NULL, 'Revenue', 'Income', 'DiscountsRefundsGiven', 4620816365179432680),
(167, 67, 'Sales of Product Income', NULL, 'Revenue', 'Income', 'SalesOfProductIncome', 4620816365179432680),
(168, 1, 'Services', NULL, 'Revenue', 'Income', 'ServiceFeeIncome', 4620816365179432680),
(169, 21, 'Stationery and printing', NULL, 'Expense', 'Expense', 'SuppliesMaterials', 4620816365179432680),
(170, 68, 'Subcontracted Services', NULL, 'Expense', 'Expense', 'CostOfLabor', 4620816365179432680),
(171, 22, 'Supplies', NULL, 'Expense', 'Expense', 'SuppliesMaterials', 4620816365179432680),
(172, 69, 'Taxes - Property', NULL, 'Expense', 'Expense', 'TaxesPaid', 4620816365179432680),
(173, 23, 'Taxes and Licenses', NULL, 'Expense', 'Expense', 'TaxesPaid', 4620816365179432680),
(174, 70, 'Telephone Expense', NULL, 'Expense', 'Expense', 'OtherMiscellaneousServiceCost', 4620816365179432680),
(175, 24, 'Travel', NULL, 'Expense', 'Expense', 'TravelMeals', 4620816365179432680),
(176, 71, 'Travel Expense', NULL, 'Expense', 'Expense', 'TravelMeals', 4620816365179432680),
(177, 25, 'Travel meals', NULL, 'Expense', 'Expense', 'TravelMeals', 4620816365179432680),
(178, 72, 'Unapplied Cash Bill Payment Expense', NULL, 'Expense', 'Expense', 'UnappliedCashBillPaymentExpense', 4620816365179432680),
(179, 73, 'Unapplied Cash Payment Income', NULL, 'Revenue', 'Income', 'UnappliedCashPaymentIncome', 4620816365179432680),
(180, 74, 'Uncategorised Asset', NULL, 'Asset', 'Other Current Asset', 'OtherCurrentAssets', 4620816365179432680),
(181, 75, 'Uncategorised Expense', NULL, 'Expense', 'Expense', 'OtherMiscellaneousServiceCost', 4620816365179432680),
(182, 76, 'Uncategorised Income', NULL, 'Revenue', 'Income', 'OtherPrimaryIncome', 4620816365179432680),
(183, 93, 'Uncategorized Asset', NULL, 'Asset', 'Other Current Asset', 'OtherCurrentAssets', 4620816365179432680),
(184, 95, 'Uncategorized Expense', NULL, 'Expense', 'Expense', 'OtherMiscellaneousServiceCost', 4620816365179432680),
(185, 94, 'Uncategorized Income', NULL, 'Revenue', 'Income', 'ServiceFeeIncome', 4620816365179432680),
(186, 26, 'Undeposited Funds', NULL, 'Asset', 'Other Current Asset', 'UndepositedFunds', 4620816365179432680),
(187, 27, 'Utilities', NULL, 'Expense', 'Expense', 'Utilities', 4620816365179432680),
(188, 82, 'Utilities - Electric & Gas', NULL, 'Expense', 'Expense', 'Utilities', 4620816365179432680),
(189, 83, 'Utilities - Water', NULL, 'Expense', 'Expense', 'Utilities', 4620816365179432680),
(190, 77, 'Vehicles', NULL, 'Asset', 'Fixed Asset', 'Vehicles', 4620816365179432680),
(191, 78, 'Venue Fees paid on behalf of clients', NULL, 'Expense', 'Cost of Goods Sold', 'CostOfSales', 4620816365179432680),
(192, 79, 'Visa Credit Card', NULL, 'Liability', 'Credit Card', 'CreditCard', 4620816365179432680),
(193, 33, 'Accounts Payable (A/P)', NULL, 'Liability', 'Accounts Payable', 'AccountsPayable', 4620816365181477320),
(194, 84, 'Accounts Receivable (A/R)', NULL, 'Asset', 'Accounts Receivable', 'AccountsReceivable', 4620816365181477320),
(195, 7, 'Advertising', NULL, 'Expense', 'Expense', 'AdvertisingPromotional', 4620816365181477320),
(196, 89, 'Arizona Dept. of Revenue Payable', NULL, 'Liability', 'Other Current Liability', 'GlobalTaxPayable', 4620816365181477320),
(197, 55, 'Automobile', NULL, 'Expense', 'Expense', 'Auto', 4620816365181477320),
(198, 56, 'Fuel', NULL, 'Expense', 'Expense', 'Auto', 4620816365181477320),
(199, 8, 'Bank Charges', NULL, 'Expense', 'Expense', 'BankCharges', 4620816365181477320),
(200, 85, 'Billable Expense Income', NULL, 'Revenue', 'Income', 'ServiceFeeIncome', 4620816365181477320),
(201, 90, 'Board of Equalization Payable', NULL, 'Liability', 'Other Current Liability', 'GlobalTaxPayable', 4620816365181477320),
(202, 91, 'Buildings Cost', '1610', 'Asset', 'Fixed Asset', 'Buildings', 4620816365181477320),
(203, 92, 'Building Acc Amort', '1611', 'Asset', 'Fixed Asset', 'AccumulatedAmortization', 4620816365181477320),
(204, 35, 'Checking', NULL, 'Asset', 'Bank', 'Checking', 4620816365181477320),
(205, 9, 'Commissions & fees', NULL, 'Expense', 'Expense', 'OtherMiscellaneousServiceCost', 4620816365181477320),
(206, 80, 'Cost of Goods Sold', NULL, 'Expense', 'Cost of Goods Sold', 'SuppliesMaterialsCogs', 4620816365181477320),
(207, 40, 'Depreciation', NULL, 'Expense', 'Other Expense', 'Depreciation', 4620816365181477320),
(208, 82, 'Design income', NULL, 'Revenue', 'Income', 'OtherPrimaryIncome', 4620816365181477320),
(209, 86, 'Discounts given', NULL, 'Revenue', 'Income', 'DiscountsRefundsGiven', 4620816365181477320),
(210, 28, 'Disposal Fees', NULL, 'Expense', 'Expense', 'OtherMiscellaneousServiceCost', 4620816365181477320),
(211, 10, 'Dues & Subscriptions', NULL, 'Expense', 'Expense', 'DuesSubscriptions', 4620816365181477320),
(212, 29, 'Equipment Rental', NULL, 'Expense', 'Expense', 'EquipmentRental', 4620816365181477320),
(213, 5, 'Fees Billed', NULL, 'Revenue', 'Income', 'ServiceFeeIncome', 4620816365181477320),
(214, 93, 'Fixed Asset Computers', '1630', 'Asset', 'Fixed Asset', 'FixedAssetComputers', 4620816365181477320),
(215, 94, 'Computer - Acc Dep', '1632', 'Asset', 'Fixed Asset', 'AccumulatedAmortization', 4620816365181477320),
(216, 95, 'Fixed Asset Furniture', '1640', 'Asset', 'Fixed Asset', 'FixedAssetFurniture', 4620816365181477320),
(217, 96, 'Furniture Accumulated Amortization', '1641', 'Asset', 'Fixed Asset', 'AccumulatedAmortization', 4620816365181477320),
(218, 97, 'Fixed Asset Phone Cost', '1650', 'Asset', 'Fixed Asset', 'FixedAssetPhone', 4620816365181477320),
(219, 98, 'Phone Accumulated Amortization', '1651', 'Asset', 'Fixed Asset', 'AccumulatedAmortization', 4620816365181477320),
(220, 11, 'Insurance', NULL, 'Expense', 'Expense', 'Insurance', 4620816365181477320),
(221, 57, 'Workers Compensation', NULL, 'Expense', 'Expense', 'Insurance', 4620816365181477320),
(222, 25, 'Interest Earned', NULL, 'Revenue', 'Other Income', 'InterestEarned', 4620816365181477320),
(223, 81, 'Inventory Asset', NULL, 'Asset', 'Other Current Asset', 'Inventory', 4620816365181477320),
(224, 58, 'Job Expenses', NULL, 'Expense', 'Expense', 'OtherMiscellaneousServiceCost', 4620816365181477320),
(225, 59, 'Cost of Labor', NULL, 'Expense', 'Expense', 'OtherMiscellaneousServiceCost', 4620816365181477320),
(226, 60, 'Installation', NULL, 'Expense', 'Expense', 'OtherMiscellaneousServiceCost', 4620816365181477320),
(227, 61, 'Maintenance and Repairs', NULL, 'Expense', 'Expense', 'OtherMiscellaneousServiceCost', 4620816365181477320),
(228, 62, 'Equipment Rental', NULL, 'Expense', 'Expense', 'EquipmentRental', 4620816365181477320),
(229, 63, 'Job Materials', NULL, 'Expense', 'Expense', 'SuppliesMaterials', 4620816365181477320),
(230, 64, 'Decks and Patios', NULL, 'Expense', 'Expense', 'SuppliesMaterials', 4620816365181477320),
(231, 65, 'Fountain and Garden Lighting', NULL, 'Expense', 'Expense', 'SuppliesMaterials', 4620816365181477320),
(232, 66, 'Plants and Soil', NULL, 'Expense', 'Expense', 'SuppliesMaterials', 4620816365181477320),
(233, 67, 'Sprinklers and Drip Systems', NULL, 'Expense', 'Expense', 'SuppliesMaterials', 4620816365181477320),
(234, 68, 'Permits', NULL, 'Expense', 'Expense', 'OtherMiscellaneousServiceCost', 4620816365181477320),
(235, 45, 'Landscaping Services', NULL, 'Revenue', 'Income', 'OtherPrimaryIncome', 4620816365181477320),
(236, 46, 'Job Materials', NULL, 'Revenue', 'Income', 'OtherPrimaryIncome', 4620816365181477320),
(237, 47, 'Decks and Patios', NULL, 'Revenue', 'Income', 'OtherPrimaryIncome', 4620816365181477320),
(238, 48, 'Fountains and Garden Lighting', NULL, 'Revenue', 'Income', 'OtherPrimaryIncome', 4620816365181477320),
(239, 49, 'Plants and Soil', NULL, 'Revenue', 'Income', 'OtherPrimaryIncome', 4620816365181477320),
(240, 50, 'Sprinklers and Drip Systems', NULL, 'Revenue', 'Income', 'OtherPrimaryIncome', 4620816365181477320),
(241, 51, 'Labor', NULL, 'Revenue', 'Income', 'OtherPrimaryIncome', 4620816365181477320),
(242, 52, 'Installation', NULL, 'Revenue', 'Income', 'OtherPrimaryIncome', 4620816365181477320),
(243, 53, 'Maintenance and Repair', NULL, 'Revenue', 'Income', 'OtherPrimaryIncome', 4620816365181477320),
(244, 12, 'Legal & Professional Fees', NULL, 'Expense', 'Expense', 'LegalProfessionalFees', 4620816365181477320),
(245, 69, 'Accounting', NULL, 'Expense', 'Expense', 'LegalProfessionalFees', 4620816365181477320),
(246, 70, 'Bookkeeper', NULL, 'Expense', 'Expense', 'LegalProfessionalFees', 4620816365181477320),
(247, 71, 'Lawyer', NULL, 'Expense', 'Expense', 'LegalProfessionalFees', 4620816365181477320),
(248, 43, 'Loan Payable', NULL, 'Liability', 'Other Current Liability', 'OtherCurrentLiabilities', 4620816365181477320),
(249, 72, 'Maintenance and Repair', NULL, 'Expense', 'Expense', 'RepairMaintenance', 4620816365181477320),
(250, 73, 'Building Repairs', NULL, 'Expense', 'Expense', 'RepairMaintenance', 4620816365181477320),
(251, 74, 'Computer Repairs', NULL, 'Expense', 'Expense', 'RepairMaintenance', 4620816365181477320),
(252, 75, 'Equipment Repairs', NULL, 'Expense', 'Expense', 'RepairMaintenance', 4620816365181477320),
(253, 41, 'Mastercard', NULL, 'Liability', 'Credit Card', 'CreditCard', 4620816365181477320),
(254, 13, 'Meals and Entertainment', NULL, 'Expense', 'Expense', 'EntertainmentMeals', 4620816365181477320),
(255, 14, 'Miscellaneous', NULL, 'Expense', 'Other Expense', 'OtherMiscellaneousExpense', 4620816365181477320),
(256, 44, 'Notes Payable', NULL, 'Liability', 'Long Term Liability', 'OtherLongTermLiabilities', 4620816365181477320),
(257, 15, 'Office Expenses', NULL, 'Expense', 'Expense', 'OfficeGeneralAdministrativeExpenses', 4620816365181477320),
(258, 34, 'Opening Balance Equity', NULL, 'Equity', 'Equity', 'OpeningBalanceEquity', 4620816365181477320),
(259, 83, 'Other Income', NULL, 'Revenue', 'Income', 'OtherPrimaryIncome', 4620816365181477320),
(260, 26, 'Other Portfolio Income', NULL, 'Revenue', 'Other Income', 'OtherMiscellaneousIncome', 4620816365181477320),
(261, 27, 'Penalties & Settlements', NULL, 'Expense', 'Other Expense', 'PenaltiesSettlements', 4620816365181477320),
(262, 54, 'Pest Control Services', NULL, 'Revenue', 'Income', 'OtherPrimaryIncome', 4620816365181477320),
(263, 3, 'Prepaid Expenses', NULL, 'Asset', 'Other Current Asset', 'PrepaidExpenses', 4620816365181477320),
(264, 16, 'Promotional', NULL, 'Expense', 'Expense', 'AdvertisingPromotional', 4620816365181477320),
(265, 78, 'Purchases', NULL, 'Expense', 'Expense', 'SuppliesMaterials', 4620816365181477320),
(266, 6, 'Refunds-Allowances', NULL, 'Revenue', 'Income', 'DiscountsRefundsGiven', 4620816365181477320),
(267, 17, 'Rent or Lease', NULL, 'Expense', 'Expense', 'RentOrLeaseOfBuildings', 4620816365181477320),
(268, 2, 'Retained Earnings', NULL, 'Equity', 'Equity', 'RetainedEarnings', 4620816365181477320),
(269, 79, 'Sales of Product Income', NULL, 'Revenue', 'Income', 'SalesOfProductIncome', 4620816365181477320),
(270, 36, 'Savings', NULL, 'Asset', 'Bank', 'Savings', 4620816365181477320),
(271, 1, 'Services', NULL, 'Revenue', 'Income', 'ServiceFeeIncome', 4620816365181477320),
(272, 19, 'Stationery & Printing', NULL, 'Expense', 'Expense', 'OfficeGeneralAdministrativeExpenses', 4620816365181477320),
(273, 20, 'Supplies', NULL, 'Expense', 'Expense', 'SuppliesMaterials', 4620816365181477320),
(274, 21, 'Taxes & Licenses', NULL, 'Expense', 'Expense', 'TaxesPaid', 4620816365181477320),
(275, 22, 'Travel', NULL, 'Expense', 'Expense', 'Travel', 4620816365181477320),
(276, 23, 'Travel Meals', NULL, 'Expense', 'Expense', 'TravelMeals', 4620816365181477320),
(277, 37, 'Truck', '1620', 'Asset', 'Fixed Asset', 'Vehicles', 4620816365181477320),
(278, 39, 'Depreciation', '1621', 'Asset', 'Fixed Asset', 'AccumulatedDepreciation', 4620816365181477320),
(279, 38, 'Original Cost', '1622', 'Asset', 'Fixed Asset', 'Vehicles', 4620816365181477320),
(280, 88, 'Unapplied Cash Bill Payment Expense', NULL, 'Expense', 'Expense', 'UnappliedCashBillPaymentExpense', 4620816365181477320),
(281, 87, 'Unapplied Cash Payment Income', NULL, 'Revenue', 'Income', 'UnappliedCashPaymentIncome', 4620816365181477320),
(282, 32, 'Uncategorized Asset', NULL, 'Asset', 'Other Current Asset', 'OtherCurrentAssets', 4620816365181477320),
(283, 31, 'Uncategorized Expense', NULL, 'Expense', 'Expense', 'OtherMiscellaneousServiceCost', 4620816365181477320),
(284, 30, 'Uncategorized Income', NULL, 'Revenue', 'Income', 'ServiceFeeIncome', 4620816365181477320),
(285, 4, 'Undeposited Funds', NULL, 'Asset', 'Other Current Asset', 'UndepositedFunds', 4620816365181477320),
(286, 24, 'Utilities', NULL, 'Expense', 'Expense', 'Utilities', 4620816365181477320),
(287, 76, 'Gas and Electric', NULL, 'Expense', 'Expense', 'Utilities', 4620816365181477320),
(288, 77, 'Telephone', NULL, 'Expense', 'Expense', 'Utilities', 4620816365181477320),
(289, 42, 'Visa', NULL, 'Liability', 'Credit Card', 'CreditCard', 4620816365181477320),
(290, 33, 'Accounts Payable (A/P)', NULL, 'Liability', 'Accounts Payable', 'AccountsPayable', 4620816365179425220),
(291, 84, 'Accounts Receivable (A/R)', NULL, 'Asset', 'Accounts Receivable', 'AccountsReceivable', 4620816365179425220),
(292, 7, 'Advertising', NULL, 'Expense', 'Expense', 'AdvertisingPromotional', 4620816365179425220),
(293, 89, 'Arizona Dept. of Revenue Payable', NULL, 'Liability', 'Other Current Liability', 'GlobalTaxPayable', 4620816365179425220),
(294, 55, 'Automobile', NULL, 'Expense', 'Expense', 'Auto', 4620816365179425220),
(295, 56, 'Fuel', NULL, 'Expense', 'Expense', 'Auto', 4620816365179425220),
(296, 8, 'Bank Charges', NULL, 'Expense', 'Expense', 'BankCharges', 4620816365179425220),
(297, 85, 'Billable Expense Income', NULL, 'Revenue', 'Income', 'ServiceFeeIncome', 4620816365179425220),
(298, 90, 'Board of Equalization Payable', NULL, 'Liability', 'Other Current Liability', 'GlobalTaxPayable', 4620816365179425220),
(299, 35, 'Checking', NULL, 'Asset', 'Bank', 'Checking', 4620816365179425220),
(300, 9, 'Commissions & fees', NULL, 'Expense', 'Expense', 'OtherMiscellaneousServiceCost', 4620816365179425220),
(301, 80, 'Cost of Goods Sold', NULL, 'Expense', 'Cost of Goods Sold', 'SuppliesMaterialsCogs', 4620816365179425220),
(302, 40, 'Depreciation', NULL, 'Expense', 'Other Expense', 'Depreciation', 4620816365179425220),
(303, 82, 'Design income', NULL, 'Revenue', 'Income', 'OtherPrimaryIncome', 4620816365179425220),
(304, 86, 'Discounts given', NULL, 'Revenue', 'Income', 'DiscountsRefundsGiven', 4620816365179425220),
(305, 28, 'Disposal Fees', NULL, 'Expense', 'Expense', 'OtherMiscellaneousServiceCost', 4620816365179425220),
(306, 10, 'Dues & Subscriptions', NULL, 'Expense', 'Expense', 'DuesSubscriptions', 4620816365179425220),
(307, 29, 'Equipment Rental', NULL, 'Expense', 'Expense', 'EquipmentRental', 4620816365179425220),
(308, 5, 'Fees Billed', NULL, 'Revenue', 'Income', 'ServiceFeeIncome', 4620816365179425220),
(309, 11, 'Insurance', NULL, 'Expense', 'Expense', 'Insurance', 4620816365179425220),
(310, 57, 'Workers Compensation', NULL, 'Expense', 'Expense', 'Insurance', 4620816365179425220),
(311, 25, 'Interest Earned', NULL, 'Revenue', 'Other Income', 'InterestEarned', 4620816365179425220),
(312, 81, 'Inventory Asset', NULL, 'Asset', 'Other Current Asset', 'Inventory', 4620816365179425220),
(313, 58, 'Job Expenses', NULL, 'Expense', 'Expense', 'OtherMiscellaneousServiceCost', 4620816365179425220),
(314, 59, 'Cost of Labor', NULL, 'Expense', 'Expense', 'OtherMiscellaneousServiceCost', 4620816365179425220),
(315, 60, 'Installation', NULL, 'Expense', 'Expense', 'OtherMiscellaneousServiceCost', 4620816365179425220),
(316, 61, 'Maintenance and Repairs', NULL, 'Expense', 'Expense', 'OtherMiscellaneousServiceCost', 4620816365179425220),
(317, 62, 'Equipment Rental', NULL, 'Expense', 'Expense', 'EquipmentRental', 4620816365179425220),
(318, 63, 'Job Materials', NULL, 'Expense', 'Expense', 'SuppliesMaterials', 4620816365179425220),
(319, 64, 'Decks and Patios', NULL, 'Expense', 'Expense', 'SuppliesMaterials', 4620816365179425220),
(320, 65, 'Fountain and Garden Lighting', NULL, 'Expense', 'Expense', 'SuppliesMaterials', 4620816365179425220),
(321, 66, 'Plants and Soil', NULL, 'Expense', 'Expense', 'SuppliesMaterials', 4620816365179425220),
(322, 67, 'Sprinklers and Drip Systems', NULL, 'Expense', 'Expense', 'SuppliesMaterials', 4620816365179425220),
(323, 68, 'Permits', NULL, 'Expense', 'Expense', 'OtherMiscellaneousServiceCost', 4620816365179425220),
(324, 45, 'Landscaping Services', NULL, 'Revenue', 'Income', 'OtherPrimaryIncome', 4620816365179425220),
(325, 46, 'Job Materials', NULL, 'Revenue', 'Income', 'OtherPrimaryIncome', 4620816365179425220),
(326, 47, 'Decks and Patios', NULL, 'Revenue', 'Income', 'OtherPrimaryIncome', 4620816365179425220),
(327, 48, 'Fountains and Garden Lighting', NULL, 'Revenue', 'Income', 'OtherPrimaryIncome', 4620816365179425220),
(328, 49, 'Plants and Soil', NULL, 'Revenue', 'Income', 'OtherPrimaryIncome', 4620816365179425220),
(329, 50, 'Sprinklers and Drip Systems', NULL, 'Revenue', 'Income', 'OtherPrimaryIncome', 4620816365179425220),
(330, 51, 'Labor', NULL, 'Revenue', 'Income', 'OtherPrimaryIncome', 4620816365179425220),
(331, 52, 'Installation', NULL, 'Revenue', 'Income', 'OtherPrimaryIncome', 4620816365179425220),
(332, 53, 'Maintenance and Repair', NULL, 'Revenue', 'Income', 'OtherPrimaryIncome', 4620816365179425220),
(333, 12, 'Legal & Professional Fees', NULL, 'Expense', 'Expense', 'LegalProfessionalFees', 4620816365179425220),
(334, 69, 'Accounting', NULL, 'Expense', 'Expense', 'LegalProfessionalFees', 4620816365179425220),
(335, 70, 'Bookkeeper', NULL, 'Expense', 'Expense', 'LegalProfessionalFees', 4620816365179425220),
(336, 71, 'Lawyer', NULL, 'Expense', 'Expense', 'LegalProfessionalFees', 4620816365179425220),
(337, 43, 'Loan Payable', NULL, 'Liability', 'Other Current Liability', 'OtherCurrentLiabilities', 4620816365179425220),
(338, 72, 'Maintenance and Repair', NULL, 'Expense', 'Expense', 'RepairMaintenance', 4620816365179425220),
(339, 73, 'Building Repairs', NULL, 'Expense', 'Expense', 'RepairMaintenance', 4620816365179425220),
(340, 74, 'Computer Repairs', NULL, 'Expense', 'Expense', 'RepairMaintenance', 4620816365179425220),
(341, 75, 'Equipment Repairs', NULL, 'Expense', 'Expense', 'RepairMaintenance', 4620816365179425220),
(342, 41, 'Mastercard', NULL, 'Liability', 'Credit Card', 'CreditCard', 4620816365179425220),
(343, 13, 'Meals and Entertainment', NULL, 'Expense', 'Expense', 'EntertainmentMeals', 4620816365179425220),
(344, 14, 'Miscellaneous', NULL, 'Expense', 'Other Expense', 'OtherMiscellaneousExpense', 4620816365179425220),
(345, 91, 'MyJobs_test', NULL, 'Asset', 'Accounts Receivable', 'AccountsReceivable', 4620816365179425220),
(346, 44, 'Notes Payable', NULL, 'Liability', 'Long Term Liability', 'OtherLongTermLiabilities', 4620816365179425220),
(347, 15, 'Office Expenses', NULL, 'Expense', 'Expense', 'OfficeGeneralAdministrativeExpenses', 4620816365179425220),
(348, 34, 'Opening Balance Equity', NULL, 'Equity', 'Equity', 'OpeningBalanceEquity', 4620816365179425220),
(349, 83, 'Other Income', NULL, 'Revenue', 'Income', 'OtherPrimaryIncome', 4620816365179425220),
(350, 26, 'Other Portfolio Income', NULL, 'Revenue', 'Other Income', 'OtherMiscellaneousIncome', 4620816365179425220),
(351, 27, 'Penalties & Settlements', NULL, 'Expense', 'Other Expense', 'PenaltiesSettlements', 4620816365179425220),
(352, 54, 'Pest Control Services', NULL, 'Revenue', 'Income', 'OtherPrimaryIncome', 4620816365179425220),
(353, 3, 'Prepaid Expenses', NULL, 'Asset', 'Other Current Asset', 'PrepaidExpenses', 4620816365179425220),
(354, 16, 'Promotional', NULL, 'Expense', 'Expense', 'AdvertisingPromotional', 4620816365179425220),
(355, 78, 'Purchases', NULL, 'Expense', 'Expense', 'SuppliesMaterials', 4620816365179425220),
(356, 6, 'Refunds-Allowances', NULL, 'Revenue', 'Income', 'DiscountsRefundsGiven', 4620816365179425220),
(357, 17, 'Rent or Lease', NULL, 'Expense', 'Expense', 'RentOrLeaseOfBuildings', 4620816365179425220),
(358, 2, 'Retained Earnings', NULL, 'Equity', 'Equity', 'RetainedEarnings', 4620816365179425220),
(359, 79, 'Sales of Product Income', NULL, 'Revenue', 'Income', 'SalesOfProductIncome', 4620816365179425220),
(360, 36, 'Savings', NULL, 'Asset', 'Bank', 'Savings', 4620816365179425220),
(361, 1, 'Services', NULL, 'Revenue', 'Income', 'ServiceFeeIncome', 4620816365179425220),
(362, 19, 'Stationery & Printing', NULL, 'Expense', 'Expense', 'OfficeGeneralAdministrativeExpenses', 4620816365179425220),
(363, 20, 'Supplies', NULL, 'Expense', 'Expense', 'SuppliesMaterials', 4620816365179425220),
(364, 21, 'Taxes & Licenses', NULL, 'Expense', 'Expense', 'TaxesPaid', 4620816365179425220),
(365, 22, 'Travel', NULL, 'Expense', 'Expense', 'Travel', 4620816365179425220),
(366, 23, 'Travel Meals', NULL, 'Expense', 'Expense', 'TravelMeals', 4620816365179425220),
(367, 37, 'Truck', NULL, 'Asset', 'Fixed Asset', 'Vehicles', 4620816365179425220),
(368, 39, 'Depreciation', NULL, 'Asset', 'Fixed Asset', 'AccumulatedDepreciation', 4620816365179425220),
(369, 38, 'Original Cost', NULL, 'Asset', 'Fixed Asset', 'Vehicles', 4620816365179425220),
(370, 88, 'Unapplied Cash Bill Payment Expense', NULL, 'Expense', 'Expense', 'UnappliedCashBillPaymentExpense', 4620816365179425220),
(371, 87, 'Unapplied Cash Payment Income', NULL, 'Revenue', 'Income', 'UnappliedCashPaymentIncome', 4620816365179425220),
(372, 32, 'Uncategorized Asset', NULL, 'Asset', 'Other Current Asset', 'OtherCurrentAssets', 4620816365179425220),
(373, 31, 'Uncategorized Expense', NULL, 'Expense', 'Expense', 'OtherMiscellaneousServiceCost', 4620816365179425220),
(374, 30, 'Uncategorized Income', NULL, 'Revenue', 'Income', 'ServiceFeeIncome', 4620816365179425220),
(375, 4, 'Undeposited Funds', NULL, 'Asset', 'Other Current Asset', 'UndepositedFunds', 4620816365179425220),
(376, 24, 'Utilities', NULL, 'Expense', 'Expense', 'Utilities', 4620816365179425220),
(377, 76, 'Gas and Electric', NULL, 'Expense', 'Expense', 'Utilities', 4620816365179425220),
(378, 77, 'Telephone', NULL, 'Expense', 'Expense', 'Utilities', 4620816365179425220),
(379, 42, 'Visa', NULL, 'Liability', 'Credit Card', 'CreditCard', 4620816365179425220);

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
  `default_life` int(11) NOT NULL,
  `company_id` bigint(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `company_id` bigint(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(1, NULL, 'Neeraj', 'Dandotiya', 'neeraj@bizmethsolutions.com', NULL, 'eyJpdiI6IlhyT3BmbFhEQms0Y0Y5bWhKdzJLb2c9PSIsInZhbHVlIjoiVi9GMXhNNWIxRUFkem8xeXcya2xVQ3BvMkpiSTF3STU5R29NSy8vYmMrYz0iLCJtYWMiOiI5ZDY3MWQwODlkZmE4MjMzMGUzODQ2NGM0NTQzYmMxMWJmYTQyYWY1OThhMzE3NGNmZjJiMjcwMDM3NzgyNGMwIiwidGFnIjoiIn0=', NULL, NULL, NULL, NULL, NULL, '2021-12-17 14:18:55', '2021-12-17 14:18:55'),
(2, NULL, 'pranjal', 'mathur', 'Pranjalm35@gmail.com', NULL, 'eyJpdiI6IlJsWlRzdzllSVJBUEdhZldpMXEzbVE9PSIsInZhbHVlIjoiUmltaDJsdTNOcVVmd1VqdWFrZlRBdz09IiwibWFjIjoiNTljZTNlMTg0NzQ5OTU2NWRhMmM5ODAxYWFmYTk0Mzc2NDdkMzJiZjAwMTYwZDVkNTZlNWM0ZjUzODQ3NDYzNyIsInRhZyI6IiJ9', NULL, NULL, NULL, NULL, NULL, '2021-12-19 18:44:04', '2021-12-19 18:44:04'),
(3, NULL, 'pranjal', 'mathur', 'development1@gmail.com', NULL, 'eyJpdiI6ImZLM0k4NGc4djVoem9YajAwZ1ZTQ2c9PSIsInZhbHVlIjoiLzBtUXdPbUVhY0g4NjlqZHdIUXFJQT09IiwibWFjIjoiY2QxMGI0NGEwNWI3MjcyOGVkM2Y5ZTEyMWQ4MDc0NmQzZTBjZjAwYmZmZDQ3NDIxNmVhZWUxMTY1YmNjZDE3YiIsInRhZyI6IiJ9', NULL, NULL, NULL, NULL, NULL, '2021-12-20 06:09:10', '2021-12-20 06:09:10'),
(4, NULL, 'Siddharth', 'Jain', 'sid@finsuite.io', NULL, 'eyJpdiI6IjRIaE9PRGVMQnk5TFg1WDJaMUtSN3c9PSIsInZhbHVlIjoiN0tnRmJXV0VhZzM1M3k1alpwZEpRRUNvOCtBNkM0V3FBRkEzRjQvOFdmST0iLCJtYWMiOiI4ZDg5Nzc3ZWI5Zjk1MGEwZGEyMjVlZDUwNzRhYmE0NTNiNTMzMzhmNjExYWE3NDNhZmZhMDc2ZmM0ZjkyY2M0IiwidGFnIjoiIn0=', NULL, NULL, NULL, NULL, NULL, '2021-12-20 14:18:06', '2021-12-20 14:18:06');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `QBO_Account`
--
ALTER TABLE `QBO_Account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=380;

--
-- AUTO_INCREMENT for table `rules`
--
ALTER TABLE `rules`
  MODIFY `rules_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `asset_key` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
