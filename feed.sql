-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 03, 2018 at 05:19 PM
-- Server version: 5.7.21-0ubuntu0.17.10.1
-- PHP Version: 7.1.15-0ubuntu0.17.10.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `feed`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`) VALUES
(1, 'سیاسی', 'اخبار-سیاسی'),
(2, 'ورزشی', 'اخبار-ورزشی'),
(3, 'اقتصادی', 'اخبار-اقتصادی'),
(4, 'فناوری و اطلاعات', 'فناوری-و-اطلاعات'),
(5, 'حوادث', 'حوادث'),
(6, 'سلامت', 'اخبار-سلامت');

-- --------------------------------------------------------

--
-- Table structure for table `category_rss`
--

CREATE TABLE `category_rss` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `rss_id` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_rss`
--

INSERT INTO `category_rss` (`id`, `category_id`, `rss_id`) VALUES
(1, 1, 1),
(9, 4, 7);

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
(3, '2018_03_25_150311_create_rss_table', 1),
(4, '2018_03_25_150846_create_categories_table', 1),
(5, '2018_03_25_150904_create_stores_table', 1),
(6, '2018_03_25_151109_create_roles_table', 1),
(7, '2018_03_26_071624_create_categoryrss_table', 2),
(8, '2018_03_29_201313_create_rsshistory_table', 3),
(9, '2018_03_30_085227_create_tags_table', 3),
(10, '2018_03_30_164818_create_posts_table', 4);

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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT '1',
  `rss_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `excerpt` longtext COLLATE utf8mb4_unicode_ci,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'publish',
  `comment_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'open',
  `post_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'post',
  `permalink` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_tag`
--

CREATE TABLE `post_tag` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `tag_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `rss`
--

CREATE TABLE `rss` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `url` varchar(255) NOT NULL,
  `homepage` varchar(255) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `user_id` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rss`
--

INSERT INTO `rss` (`id`, `name`, `url`, `homepage`, `logo`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'خبرگزاری فارس', 'http://www.farsnews.com/rss/politics', 'http://farsnews.com', 'http://www.farsnews.com/shares/img/PLogo.jpg', 1, '2018-03-26 02:55:27', '2018-03-26 02:55:27'),
(3, 'تجارت نیوز', 'https://tejaratnews.com/feed', 'https://tejaratnews.com', 'http://tejaratnews.com/wp-content/uploads/2017/05/favicon-2.png', 1, '2018-03-27 03:26:52', '2018-03-27 05:05:44'),
(7, 'کلیک', 'https://click.ir/feed', 'https://click.ir', 'https://click.ir/wp-content/uploads/2017/11/click-footer-1.png', 1, '2018-03-30 01:37:38', '2018-03-30 01:37:38');

-- --------------------------------------------------------

--
-- Table structure for table `rsshistory`
--

CREATE TABLE `rsshistory` (
  `id` int(10) UNSIGNED NOT NULL,
  `rss_id` int(10) UNSIGNED NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci,
  `version` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `latest_version` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rsshistory`
--

INSERT INTO `rsshistory` (`id`, `rss_id`, `body`, `version`, `latest_version`) VALUES
(1, 1, '﻿<?xml version=\"1.0\" encoding=\"utf-8\"?><rss version=\"2.0\"><channel><title>Fars News Agency</title><link>http://www.farsnews.com/</link><description>Fars News Agency (FNA) RSS service</description><language>Fa</language><image><url>http://www.farsnews.com/shares/img/PLogo.jpg</url><title>Fars News Agency</title><link>http://www.farsnews.com/</link><width>190</width><height>59</height><description>Fars News Agency (FNA) RSS service</description></image><copyright>Copyright 2018, Fars News Agency.</copyright><managingEditor>info@farsnews.ir</managingEditor><webMaster>morsali@farsnews.ir</webMaster><lastBuildDate>Tue, 3 Apr 2018 16:59:37</lastBuildDate><item><title>اظهارات ولیعهد عربستان درباره اسرائیل اوج رذالت اوست/ جنایات صهیونیست‌ها با چراغ سبز آمریکا و عربستان رخ داد</title><description>عضو هیأت علمی دانشگاه صنعتی امیرکبیر گفت: ولیعهد عربستان مدعی شده که رژیم صهیونیستی باید برای خود دولتی داشته باشد زیرا با ما منافع مشترک زیادی دارد که بیان چنین مسائلی اوج رذالت را نشان می‌دهد.</description><link>http://www.farsnews.com/13970114001062</link><pubDate>Tue, 3 Apr 2018 16:28:00</pubDate></item><item><title>سرلشکر جعفری درگذشت فرزند فرمانده هوانیروز سپاه را تسلیت گفت</title><description>فرمانده کل سپاه در پیامی درگذشت فرزند سردار محمد رحمانی فرمانده هوانیروز سپاه را به وی تسلیت گفت.</description><link>http://www.farsnews.com/13970114001057</link><pubDate>Tue, 3 Apr 2018 16:05:00</pubDate></item><item><title>افزایش تولید و رونق آن داروی بخشی از بیماری‌های اقتصادی است/ این حجم از قاچاق قابل قبول نیست</title><description>نماینده مردم تهران در مجلس گفت: افزایش تولید و رونق آن می‌تواند دارو و حلال یکی از مشکلات و پیچیدگی‌های موجود در اقتصاد کشور باشد.</description><link>http://www.farsnews.com/13970114000963</link><pubDate>Tue, 3 Apr 2018 15:25:00</pubDate></item><item><title>سرلشکر باقری درگذشت فرزند فرمانده هوانیروز سپاه را تسلیت گفت</title><description>رئیس ستاد کل نیروهای مسلح در پیامی درگذشت فرزند سردار محمد رحمانی فرمانده هوانیروز سپاه را به وی تسلیت گفت.</description><link>http://www.farsnews.com/13970114000964</link><pubDate>Tue, 3 Apr 2018 15:06:00</pubDate></item><item><title>راه حل خروج از وضعیت کنونی مردم فلسطین مبارزه است نه مذاکره</title><description>عضو هیأت علمی دانشگاه علم و صنعت گفت: راه حل مردم فلسطین برای خروج از وضعیت کنونی مبارزه در مقابل آمریکا، اسرائیل و عربستان است نه مذاکره.</description><link>http://www.farsnews.com/13970114000825</link><pubDate>Tue, 3 Apr 2018 14:53:00</pubDate></item><item><title>گمنام بودن قهرمانانی همچون شما فرصت جولان دادن برای قهرمانان بدلی را فراهم می‌کند</title><description>عضو مجمع تشخیص مصلحت نظام خطاب به عزت‌شاهی گفت:‌ وقتی قهرمانانی مانند شما گمنام باقی بمانند، قهرمانان بدلی مجال جولان دادن پیدا می‌کنند و وظیفه ما این است مجاهدت های امثال شما و رزمندگان دفاع مقدس را به نسل جدید نشان دهیم.</description><link>http://www.farsnews.com/13970114000933</link><pubDate>Tue, 3 Apr 2018 14:51:00</pubDate></item><item><title>بار کج مقامات در منزل می‌‌ماند؟/ مخالفانی با امضای موافق</title><description>برخی نمایندگان مجلس اعلام می‌کنند تعدادی ازامضاکنندگان طرح «اعاده اموال نامشروع مسؤولان»، مخالف این طرح هستند و برای اقناع افکار عمومی در حوزه‌های انتخابیه آن را به تصویب رسانده‌اند.</description><link>http://www.farsnews.com/13970114000794</link><pubDate>Tue, 3 Apr 2018 14:43:00</pubDate></item><item><title>نسخه‌های امنیتی منطقه باید درون منطقه پیچیده شود/ محور مقاومت با پشتیبانی روسیه داعش را شکست داد</title><description>وزیر دفاع و پشتیبانی نیروهای مسلح گفت: نسخه‌های امنیتی منطقه باید درون منطقه پیچیده شود و نسخه‌هایی که بیرون منطقه پیچیده می‌شود، غیرقابل تحقق و غیرقابل پذیرش است.</description><link>http://www.farsnews.com/13970114000896</link><pubDate>Tue, 3 Apr 2018 14:36:00</pubDate></item><item><title>باید با خرید کالای ایرانی در راستای به حرکت درآوردن اقتصاد داخلی اقدام کنیم</title><description>نماینده مردم کاشان در مجلس گفت: با خرید کالای ایرانی که محصول و دسترنج کارگر داخلی است، باید در جهت به حرکت درآوردن اقتصاد داخلی اقدام کنیم.</description><link>http://www.farsnews.com/13970114000878</link><pubDate>Tue, 3 Apr 2018 14:17:00</pubDate></item><item><title>رمزگشایی از استعفای تحمیلی نجفی</title><description>ماجرا این است که پدرخوانده‌ها و افراد پشت‌ پرده اصلاحات و همان‌هایی که لیست شورا را بسته‌اند، تصمیم به عزل نجفی گرفته‌اند اما برای اینکه موضوع عزل به سبد رأی اصلاح‌طلبان و اعتمادی که مردم به این لیست کرده‌اند خدشه‌ وارد نکند، باید با طرح مباحث حاشیه‌ای، تبعات این عزل را کنترل کنند.</description><link>http://www.farsnews.com/13970114000696</link><pubDate>Tue, 3 Apr 2018 14:16:00</pubDate></item><item><title>هدف از ایجاد و تقویت نرم‌افزارها و پیام‌رسان‌های داخلی رفع انحصار است نه فیلتر</title><description>رئیس جمهور تاکید کرد: هدف از ایجاد و تقویت نرم افزارها و پیام رسان های داخلی فیلتر و یا مسدود کردن دسترسی ها نباید باشد، بلکه باید با هدف رفع انحصار در پیام‌رسان‌ها انجام شود.</description><link>http://www.farsnews.com/13970114000782</link><pubDate>Tue, 3 Apr 2018 13:17:00</pubDate></item><item><title>لازمه حل مشکلات کشور انسجام داخلی و وفاق ملی است</title><description>معاون اول رئیس جمهور تاکید کرد: لازمه حل مشکلات کشور انسجام داخلی و وفاق ملی است.</description><link>http://www.farsnews.com/13970114000761</link><pubDate>Tue, 3 Apr 2018 13:12:00</pubDate></item><item><title>قطار اردوی جهادی نوروز 97 به ایستگاه پایانی خود نزدیک می‌شود</title><description>با پایان یافتن تعطیلات نورروزی و بازگشایی دانشگاه‌ها گروه‌های جهادی در حال بازگشت هستند، آخرین گروه‌های اعزام شده 18 فروردین به شهرهای خود بازمی‌گردند.</description><link>http://www.farsnews.com/13970114000363</link><pubDate>Tue, 3 Apr 2018 10:57:00</pubDate></item><item><title>وزیر دفاع به روسیه سفر کرد</title><description>امیر حاتمی، صبح امروز به دعوت رسمی وزیر دفاع جمهوری فدراسیون روسیه به مسکو سفر کرد و در کنفرانس امنیتی مسکو سخنرانی خواهد کرد.</description><link>http://www.farsnews.com/13970114000301</link><pubDate>Tue, 3 Apr 2018 10:08:00</pubDate></item><item><title>نظر آیت‌الله خامنه‌ای ‌این است که تعدد زوجات جایز است اما استحباب ندارد/این نظر دارای پشتوانه قوی فقهی میان متقدمین و برخی معاصرین است</title><description>نظر آیت‌الله العظمی خامنه‌ای ‌این است که تعدد زوجات جایز است اما ثواب و استحباب ندارد. ‌این نظر نه تنها دارای پشتوانه قوی فقهی است و مطابق نظر مشهور فقهای متقدم و برخی از متاخرین و معاصرین می‌باشد بلکه براین نظر و بر استحباب اکتفاء به یک همسر، شیخ طوسی ادعای اجماع کرده است.</description><link>http://www.farsnews.com/13970113000571</link><pubDate>Mon, 2 Apr 2018 18:11:00</pubDate></item><item><title>اجرای قانون حمایت از تولید ملی چه شد؟!</title><description>قانون حداکثر استفاده از توان تولیدی کشور و اصلاح ماده 104 قانون مالیات‌ها همه راهبرد این شعار حیاتی و کلیدی را تکفل کرده است. فقط نیاز به \"عمل\"و \"اجرا\" دارد، بسم‌ الله.</description><link>http://www.farsnews.com/13970113000500</link><pubDate>Mon, 2 Apr 2018 14:26:00</pubDate></item><item><title>تلاش‌ها برای لغو بررسی ۲ فوریتی طرح اعاده اموال نامشروع مسئولان</title><description>نماینده مردم خمینی‌شهر در مجلس گفت: با وجود تلاش عده‌ای از نمایندگان مجلس جهت یک‌فوریتی بررسی شدن طرح اعاده اموال نامشروع مسئولان، ‌ما معتقدیم طرح باید به‌صورت ۲ فوریتی در دستور قرار گیرد.</description><link>http://www.farsnews.com/13970113000418</link><pubDate>Mon, 2 Apr 2018 12:57:00</pubDate></item><item><title>تلگرام بستر بخشی از تهدیدهای امنیتی و در چند کشور فیلتر است/ با وجود ارتباط دولت با مدیر تلگرام آنها با ایران همکاری نکردند</title><description>رئیس کمیسیون امنیت ملی و سیاست خارجی مجلس گفت: اطلاعات رد و بدل‌شده در تلگرام در اختیار انگلیس، آلمان و رژیم صهیونیستی قرار می‌گیرد بنابراین باید با ایجاد اعتماد مردم به شبکه‌های داخلی و اطلاع‌رسانی پاسخگوی نیاز مردم در چارچوب قانون باشیم.</description><link>http://www.farsnews.com/13970113000324</link><pubDate>Mon, 2 Apr 2018 11:10:00</pubDate></item><item><title>آزادی‌خواهان جهان پیام حرکت مردم مظلوم فلسطین را دریافت کردند/ به خاک و خون کشیدن فلسطینی‌ها نشانه واهمه از جبهه مقاومت بود</title><description>مشاور رهبر انقلاب در امور بین‌الملل نوشت: آزادی‌خواهان جهان، پیام حرکت مردم فلسطین را دریافت نموده و ضمن محکومیت این اقدام جنایتکارانه، از ملت مظلوم فلسطین حمایت می‌کنند.</description><link>http://www.farsnews.com/13970113000322</link><pubDate>Mon, 2 Apr 2018 11:10:00</pubDate></item><item><title>عامل اصلی گستاخی صهیونیست‌ها، ادعای آمریکا در انتقال سفارت به قدس است</title><description>دستیار ویژه رئیس مجلس در امور بین الملل گفت: ادعای آمریکا برای انتقال سفارت خود به بیت‌‌المقدس عامل اصلی گستاخی و قساوت رژیم اسرائیل علیه فلسطینیان است.</description><link>http://www.farsnews.com/13970113000315</link><pubDate>Mon, 2 Apr 2018 11:10:00</pubDate></item><item><title>تروریست‌های حاکم بر تل‌آویو تنها زبان قدرت را می‌فهمند/ مجالس کشورهای اسلامی تدابیر لازم را اتخاذ کنند</title><description>رئیس اتحادیه مجالس کشورهای عضو سازمان همکاری اسلامی اقدام جنایتکارانه رژیم نامشروع صهیونیستی علیه راهپیمایی ملت فلسطین را قویا محکوم کرد.</description><link>http://www.farsnews.com/13970113000320</link><pubDate>Mon, 2 Apr 2018 11:09:00</pubDate></item><item><title>مسیری که احمدی‌نژاد پیش گرفته در تناقض با عدالت است/ نمی‌شود خارج از مجاری قانونی ادعای عدالت‌طلبی داشت</title><description>استاندار اسبق گیلان با اشاره به اقدامات اخیر احمدی‌نژاد گفت: عدالت طلبی در حیطه‌ای که من آن را قبول دارم و برخلاف قوانین است، دیگر عدالت طلبی نیست. ادعای عدالت طلبی داشتن و خلاف مجاری قانون حرکت کردن، دیگر عدالت نیست.</description><link>http://www.farsnews.com/13970113000313</link><pubDate>Mon, 2 Apr 2018 11:09:00</pubDate></item><item><title>ریاست آیت‌الله اعرافی بر قوه قضاییه شایعه است و قویاً تکذیب می‌شود/ می‌خواهند ارکان نظام را متزلزل کنند</title><description>مسئول دفتر آیت‌الله اعرافی گفت: خبر انتصاب آیت‌الله اعرافی به ریاست قوه قضائیه قویاً تکذیب می‌شود و هیچ گفت‌وگویی در این مورد انجام نشده است.</description><link>http://www.farsnews.com/13970113000307</link><pubDate>Mon, 2 Apr 2018 11:02:00</pubDate></item><item><title>شیوه‌ای که احمدی‌نژاد در پیش گرفته قطعاً با سیره امام (ره)فاصله دارد/ بنی‌صدر هم شبیه این ادبیات را در زمان امام به کار می‌برد</title><description>استاندار مازندران در دولت احمدی‌نژاد گفت: به نظر بنده، مسیری که آقای احمدی‌نژاد انتخاب کرده، قطعاً با سیره حکومتی امام خمینی و وصیت نامه امام که برگرفته از سیره حضرت علی بود، فاصله دارد.</description><link>http://www.farsnews.com/13970113000304</link><pubDate>Mon, 2 Apr 2018 11:02:00</pubDate></item><item><title>سپاه از هیچ تلاشی برای کمک به مردم مسلمان فلسطین دریغ نخواهد کرد/ رویای تثبیت اسرائیل تحقق ناپذیر است</title><description>سپاه پاسداران انقلاب اسلامی در بیانیه‌ای تاکید کرد که به عنوان «دست قدرتمند ملت ایران» از هیچ تلاشی برای کمک به مردم مسلمان فلسطین دریغ نکرده و ظرفیت‌های در اختیار را برای استیفای حقوق فلسطینی های عزیز فعالتر خواهد ساخت.</description><link>http://www.farsnews.com/13970113000314</link><pubDate>Mon, 2 Apr 2018 11:01:00</pubDate></item><item><title>روحانی برای به‌کارگیری پول ملی در مبادلات تهران ـ باکو اعلام آمادگی کرد/ علی‌اف: هیچ نیروی خارجی نباید در منطقه مداخله کند</title><description>رئیس‌جمهور، تقویت بیش از پیش همکاری‌های بانکی میان ایران و جمهوری آذربایجان را ضروری خواند و با اعلام آمادگی برای به‌کارگیری پول ملی در مبادلات مشترک افزود: تسهیل روابط بانکی، کلید توسعه همه‌جانبه روابط است.</description><link>http://www.farsnews.com/13970113000299</link><pubDate>Mon, 2 Apr 2018 11:01:00</pubDate></item><item><title>انتشار سند منتشر نشده درباره آیت‌الله منتظری برای نخستین بار+تصاویر</title><description>به مناسبت ایام صدور نامه ۶ فروردین حضرت امام‌خمینی(ره) و عزل آیت‌الله منتظری توسط ایشان، برای اولین بار سندی تاریخی در این باره منتشر شد.</description><link>http://www.farsnews.com/13970113000298</link><pubDate>Mon, 2 Apr 2018 10:57:00</pubDate></item><item><title>جان بولتون گربه‌ای است که ادای پلنگ درمی‌آورد!</title><description>حسین شریعتمداری، گفت: بولتون در میان سیاستمداران آمریکائی قبل از آن که به تندروی و جنگ‌طلبی شهرت داشته باشد به \"مترسک\" معروف است.</description><link>http://www.farsnews.com/13970113000294</link><pubDate>Mon, 2 Apr 2018 10:54:00</pubDate></item><item><title>رفتارهای سیاسی احمدی‌نژاد کاملاً اشتباه است/ از همکاران دولت نهم و دهم فقط چند نفر با او مانده‌اند</title><description>استاندار قم و همدان در دولت دهم گفت: رفتارهای سیاسی احمدی‌نژاد کاملاً اشتباه است و نه فایده‌ای برای خودش و گروهکش دارد و نه منجر به نتیجه‌ای می‌شود.</description><link>http://www.farsnews.com/13970113000288</link><pubDate>Mon, 2 Apr 2018 10:54:00</pubDate></item><item><title>تهران و عشق‌آباد ۱۳ سند و یادداشت تفاهم همکاری امضا کردند</title><description>ایران و ترکمنستان امروز در جریان سفر رئیس جمهور به عشق‌آباد و در راستای توسعه مناسبات و همکاری‌های فی ما بین، ۱۳ سند و یادداشت همکاری مشترک امضا کردند.</description><link>http://www.farsnews.com/13970113000287</link><pubDate>Mon, 2 Apr 2018 10:52:00</pubDate></item><item><title>دولت بخش صادرات کشور را از خودتحریمی خارج کند/ انتقاد از مشارکت دادن شرکت‌های خارجی در مناقصه‌ها</title><description>معاون پارلمانی دولت دهم گفت: در زمینه حمایت از کالای ایرانی مسئولیت مسئولان بیشتر است و موانع تولید کالای ایرانی و صادرات و عرضه آن باید برطرف شود چرا که به نظر می‌رسد ما در این زمینه دچار نوعی خودتحریمی هستیم.</description><link>http://www.farsnews.com/13970113000285</link><pubDate>Mon, 2 Apr 2018 10:49:00</pubDate></item><item><title>حمایت از تولیدکنندگان داخلی امنیت اقتصادی و رفاه اجتماعی را به ارمغان می‌آورد</title><description>نماینده مردم مبارکه در مجلس گفت: حمایت از تولیدکنندگان داخلی، امنیت اقتصادی و رفاه اجتماعی را به دنبال خواهد داشت.</description><link>http://www.farsnews.com/13970113000283</link><pubDate>Mon, 2 Apr 2018 10:48:00</pubDate></item><item><title>پسندیده شدن مواضع احمدی‌نژاد از سوی دشمن برای ما تلخ است/ اثرگذاری همراهان مرموز و مشکوک بر روی احمدی‌نژاد</title><description>دبیر هیأت عالی گزینش کل کشور در دولت دهم با اشاره به اثرگذاری دوستان مرموز و مشکوک احمدی‌نژاد بر روی وی گفت: مرحوم آیت‌الله خوشوقت، مرحوم حائری شیرازی و همچنین آیت‌الله مصباح یزدی خیلی تلاش کردند احمدی‌نژاد را حفظ کنند اما نشد.</description><link>http://www.farsnews.com/13970113000282</link><pubDate>Mon, 2 Apr 2018 10:48:00</pubDate></item><item><title>مسئولان با شعارهای نمادین حمایت از کالای ایرانی را از گردن خود ساقط نکنند/ با خرید کالای ایرانی بیکاری کاهش می‌یابد</title><description>نماینده مردم ابهر و خرمدره گفت: حمایت از کالای ایرانی و بکارگیری نیروی جوان باید بیش از پیش توسط دولتمردان مورد توجه قرار گیرد نه اینکه صرفا با شعارهای نمادین و لفظا درمناسبت‌های مختلف این مهم را از گردن خود ساقط کنند.</description><link>http://www.farsnews.com/13970113000280</link><pubDate>Mon, 2 Apr 2018 10:48:00</pubDate></item><item><title>خلاف‌های بقایی روشن است/ نمی‌خواهیم احمدی‌نژاد اپوزیسیون شود</title><description>رئیس سابق شورای فرهنگی نهاد ریاست جمهوری با بیان اینکه نمی‌خواهیم احمدی‌نژاد اپوزیسیون شود، گفت: پیش‌بینی ما این است که احمدی‌نژاد از نظام دورتر می‌شود.</description><link>http://www.farsnews.com/13970113000279</link><pubDate>Mon, 2 Apr 2018 10:47:00</pubDate></item><item><title>حل مشکلات معیشتی مردم باید بیش از پیش مورد توجه قرار گیرد/ اصول مورد تاکید قوا در حمایت از تولیدات داخلی</title><description>رئیس جمهور گفت: حل مشکلات معیشت مردم، کارگران، روستائیان و همه کسانی که باید به زندگی آنان از لحاظ اقتصادی بیشتر رسیدگی شود، مورد تأکید جلسه امروز سران قوا بود.</description><link>http://www.farsnews.com/13970113000277</link><pubDate>Mon, 2 Apr 2018 10:47:00</pubDate></item><item><title>باید موانع رونق تولید را برطرف کنیم/ تولیدکنندگان داخلی کالاهای دارای کیفیت و با قیمت رقابتی تولید کنند</title><description>رئیس‌جمهور با تأکید بر اینکه برای ایجاد فضای مناسب جهت جذب سرمایه داخلی و خارجی همه قوا باید دست به دست هم دهند، گفت: تولیدکنندگان داخلی کالاهای با کیفیت و با قیمت رقابتی تولید کنند.</description><link>http://www.farsnews.com/13970113000273</link><pubDate>Mon, 2 Apr 2018 10:42:00</pubDate></item><item><title>متأسفانه به جوانان میدان داده نمی‌شود/ وجود تنقلات با مارک‌های خارجی روی میز برخی مدیران دولتی</title><description>نماینده مردم مشهد در مجلس گفت: وقتی جوانان را برای ارائه پروژه‌هایشان در حوزه‌های مختلف به دستگاه‌های ذیربط معرفی می‌کنیم بعضاً شاهد به سرقت رفتن پروژه‌های آنان و ارائه آن به نام فرد دیگری هستیم.</description><link>http://www.farsnews.com/13970113000272</link><pubDate>Mon, 2 Apr 2018 10:41:00</pubDate></item><item><title>دولت باید جلوی اجحاف بانک‌ها به تولیدکنندگان را بگیرد</title><description>عضو هیأت رئیسه مجلس گفت: در راستای حمایت از کالای ایرانی دولت باید جلوی اجحاف بانک‌ها، بیمه‌ها ، گمرک و اداره مالیاتی به تولیدکنندگان را بگیرد.</description><link>http://www.farsnews.com/13970113000270</link><pubDate>Mon, 2 Apr 2018 10:41:00</pubDate></item><item><title>ناامیدی ویروس فلج‌کننده تولید داخلی است/ جوانان ما کمتر از جوانان اروپایی و آمریکایی نیستند</title><description>عضو هیأت رئیسه مجلس با بیان اینکه یأس و ناامیدی ویروس فلج‌کننده تولید داخلی است، گفت: جوانان ما چیزی کمتر از جوانان کشورهای دیگر و از جمله جوانان کشورهای اروپایی و آمریکایی ندارند.</description><link>http://www.farsnews.com/13970113000266</link><pubDate>Mon, 2 Apr 2018 10:39:00</pubDate></item><item><title>اگر با فساد در قوای سه‌گانه برخورد نشود مجموعه نظام در معرض خطر قرار خواهد گرفت</title><description>نماینده مردم بناب در مجلس با بیان اینکه هر یک از قوای سه‌گانه در زمینه برخورد با فساد تقصیراتی دارند، گفت: فساد در دستگاه‌های اجرایی، تقنینی و قضایی کشور رخنه کرده و اگر با آن مقابله نشود مجموعه نظام را در معرض خطر قرار خواهد داد.</description><link>http://www.farsnews.com/13970113000268</link><pubDate>Mon, 2 Apr 2018 10:38:00</pubDate></item><item><title>مردم تصور بهتر بودن کالای خارجی از کالای ایرانی را کنار بگذارند</title><description>فعال سیاسی اصلاح طلب گفت: مردم باید از این فضای ذهنی بیرون بیایند که کالای خارجی لزوماً بهتر از کالای ایرانی است از این رو در یک فرآیند چند ساله می‌توان یک کار جدی برای شکستن این ذهنیت نادرست ایجاد کرد.</description><link>http://www.farsnews.com/13970113000267</link><pubDate>Mon, 2 Apr 2018 10:38:00</pubDate></item><item><title>امیدوارم سال ۹۷ لبریز از پیشرفت و رفاه روزافزون برای همه ملت‌ها باشد/مقابله با تهدیدات پیش رو در گرو تعامل نزدیک همه کشورهای منطقه</title><description>رئیس مجلس، در پیامی عید باستانی نوروز را به همتایان خود در کشورهای افغانستان، تاجیکستان، ترکیه، پاکستان، ازبکستان، آذربایجان، قرقیزستان، قزاقستان و عراق تبریک و تهنیت گفت.</description><link>http://www.farsnews.com/13970113000260</link><pubDate>Mon, 2 Apr 2018 10:38:00</pubDate></item><item><title>دولت موظف است سمت‌ و سوی بانک‌ها را به‌طرف تقویت تولید داخلی ببرد/ انتقاد از ورود کالاهای بنجل به اسم طلب برجام</title><description>دبیرکل جمعیت رهپویان با اشاره به لزوم حمایت مردم از کالای ایرانی گفت: مسئولان باید از مردم حمایت کرده و اجازه ندهند برای کسانی که به اسم تولیدکننده بر اقتصاد کشور چنبره زده‌اند حاشیه امن و امکان حیات وجود داشته باشد.</description><link>http://www.farsnews.com/13970113000262</link><pubDate>Mon, 2 Apr 2018 10:37:00</pubDate></item><item><title>فرهنگ غلط ترویج کالای خارجی در کشور وجود دارد/ منافع برخی‌ در ایجاد بی‌اعتمادی نسبت به کالای داخلی است</title><description>عضو کمیسیون برنامه بودجه و محاسبات مجلس با تاکید بر لزوم استفاده از کالاهای تولید داخل در کشور گفت: برخی افراد منافع خود را در واردات کالای خارجی می‌دانند.</description><link>http://www.farsnews.com/13970113000261</link><pubDate>Mon, 2 Apr 2018 10:37:00</pubDate></item><item><title>خواهان تداوم رویکرد آلمان در اجرای کامل برجام و مقابله با زیاده خواهی نامشروع در این مسیر هستیم</title><description>رئیس جمهور کشورمان در پیامی چهارمین دور انتصاب آنگلا مرکل به عنوان صدراعظم جمهوری فدرال آلمان، را تبریک گفت و تاکید کرد: خواهان تداوم رویکرد سازنده آلمان در اجرای کامل برجام و مقابله با زیاده خواهی نامشروع در این مسیر هستیم.</description><link>http://www.farsnews.com/13970113000258</link><pubDate>Mon, 2 Apr 2018 10:35:00</pubDate></item><item><title>«حمایت از کالای ایرانی» کشور را در برابر تحریم‌ها بیمه می‌کند/ مسئولان جلوگیری از واردات بی‌رویه و قاچاق کالا را وظیفه قانونى و شرعى بدانند</title><description>دبیرکل کانون دانشگاهیان ایران با بیان اینکه «حمایت از کالای ایرانی» کشور را در برابر تحریم‌ها، تکانه‌ها و التهابات بیمه می‌کند، گفت: مسئولان جلوگیری از واردات بی‌رویه و قاچاق کالا را وظیفه قانونى و شرعى خود بدانند.</description><link>http://www.farsnews.com/13970113000256</link><pubDate>Mon, 2 Apr 2018 10:34:00</pubDate></item><item><title>راه مقابله با بیکاری حمایت از کالای ایرانی است/ باید ریشه فساد را خشکاند</title><description>نماینده مردم بندرلنگه در مجلس با تاکید بر لزوم برخورد با فساد در کشور گفت: با بگیر و ببند نمی‌توان با فساد مبارزه کرد و باید زمینه‌های آن در کشور برطرف شده و ریشه‌هایش خشکانده شود.</description><link>http://www.farsnews.com/13970113000257</link><pubDate>Mon, 2 Apr 2018 10:33:00</pubDate></item><item><title>شعار «حمایت از کالای ایرانی» جایی برای استنکاف از مطالبات رهبری و مردم باقی نمی‌گذارد/کالای ایرانی دیگر یک پدیده اقتصادی محض نیست</title><description>یک اقتصاددان با تاکید بر اینکه کالای ایرانی دیگر یک پدیده اقتصادی محض نیست، گفت: وقتی در مورد کالای ایرانی حرف می‌زنیم منظورمان بخش بزرگی از سبک زندگی ایرانی و نیازهای بازار ماست که در منطقه جایگاه بالایی دارد.</description><link>http://www.farsnews.com/13970113000254</link><pubDate>Mon, 2 Apr 2018 10:32:00</pubDate></item><item><title>شکست تکفیری‌ها در منطقه بدون حضور ایران میسر نبود/ باید خرید کالای ایرانی مبنا باشد</title><description>نماینده کلیمیان ایران در مجلس گفت: اگر ایران نبود شکست تکفیری‌ها در منطقه محقق نمی‌شد و ما امروز شاهد سلطه مرتجعین بر سوریه و عراق بودیم.</description><link>http://www.farsnews.com/13970113000251</link><pubDate>Mon, 2 Apr 2018 10:30:00</pubDate></item></channel></rss>', '493', '493'),
(5, 7, '<?xml version=\"1.0\" encoding=\"UTF-8\"?><rss version=\"2.0\"\n	xmlns:content=\"http://purl.org/rss/1.0/modules/content/\"\n	xmlns:wfw=\"http://wellformedweb.org/CommentAPI/\"\n	xmlns:dc=\"http://purl.org/dc/elements/1.1/\"\n	xmlns:atom=\"http://www.w3.org/2005/Atom\"\n	xmlns:sy=\"http://purl.org/rss/1.0/modules/syndication/\"\n	xmlns:slash=\"http://purl.org/rss/1.0/modules/slash/\"\n	>\n\n<channel>\n	<title>رسانه کلیک</title>\n	<atom:link href=\"https://click.ir/feed/\" rel=\"self\" type=\"application/rss+xml\" />\n	<link>https://click.ir</link>\n	<description>نبض فناوری و اطلاعات</description>\n	<lastBuildDate>Tue, 03 Apr 2018 16:30:07 +0430</lastBuildDate>\n	<language>fa-IR</language>\n	<sy:updatePeriod>hourly</sy:updatePeriod>\n	<sy:updateFrequency>1</sy:updateFrequency>\n	\n\n<image>\n	<url>https://click.ir/wp-content/uploads/2017/11/cropped-click-icon-1-32x32.png</url>\n	<title>رسانه کلیک</title>\n	<link>https://click.ir</link>\n	<width>32</width>\n	<height>32</height>\n</image> \n	<item>\n		<title>مشخصات نوکیا 9 فاش شد؛ دوربین اصلی سه گانه به همراه 8 گیگابایت رم</title>\n		<link>https://click.ir/1397/01/14/nokia-9-full-specs-leaked-triple-camera/</link>\n		<comments>https://click.ir/1397/01/14/nokia-9-full-specs-leaked-triple-camera/#respond</comments>\n		<pubDate>Tue, 03 Apr 2018 16:30:07 +0000</pubDate>\n		<dc:creator><![CDATA[محمد قریشی]]></dc:creator>\n				<category><![CDATA[فید]]></category>\n		<category><![CDATA[موبایل]]></category>\n		<category><![CDATA[دوربین سه گانه]]></category>\n		<category><![CDATA[مشخصات نوکیا 9]]></category>\n		<category><![CDATA[نوکیا]]></category>\n		<category><![CDATA[نوکیا 9]]></category>\n		<category><![CDATA[گوشی Nokia 9]]></category>\n\n		<guid isPermaLink=\"false\">https://click.ir/?p=161398</guid>\n		<description><![CDATA[<p>رسانه کلیک &#8211; بر اساس مشخصات نوکیا 9 که به تازگی فاش شده است، این دستگاه به دوربین اصلی سه گانه مجهز خواهد شد. در گذشته گزارشاتی منتشر شده بود مبنی بر اینکه HMD Global از گوشی نوکیا 9 در ماه سپتامبر سال جاری میلادی رونمایی می کند. اخیرا یک فایل پی دی اف در [&#8230;]</p>\n<p>نوشته <a rel=\"nofollow\" href=\"https://click.ir/1397/01/14/nokia-9-full-specs-leaked-triple-camera/\">مشخصات نوکیا 9 فاش شد؛ دوربین اصلی سه گانه به همراه 8 گیگابایت رم</a> اولین بار در <a rel=\"nofollow\" href=\"https://click.ir\">رسانه کلیک</a> پدیدار شد.</p>\n]]></description>\n		<wfw:commentRss>https://click.ir/1397/01/14/nokia-9-full-specs-leaked-triple-camera/feed/</wfw:commentRss>\n		<slash:comments>0</slash:comments>\n		</item>\n		<item>\n		<title>تلگرام 50 میلیارد دلار ارز از کشور خارج کرد/ تاکید رییس جمهور بر خروج کشور از انحصار پیام رسان های خارجی</title>\n		<link>https://click.ir/1397/01/14/telegram-undermined-iran-economy/</link>\n		<comments>https://click.ir/1397/01/14/telegram-undermined-iran-economy/#respond</comments>\n		<pubDate>Tue, 03 Apr 2018 15:41:58 +0000</pubDate>\n		<dc:creator><![CDATA[محمد تقی فرهادپور]]></dc:creator>\n				<category><![CDATA[شبکه‌های اجتماعی]]></category>\n		<category><![CDATA[فید]]></category>\n		<category><![CDATA[تلگرام]]></category>\n		<category><![CDATA[شورای عالی فضای مجازی]]></category>\n		<category><![CDATA[فضای مجازی]]></category>\n		<category><![CDATA[فیلتر تلگرام]]></category>\n		<category><![CDATA[فیلترینگ تلگرام]]></category>\n		<category><![CDATA[پول مجازی]]></category>\n		<category><![CDATA[پیام رسان بومی]]></category>\n\n		<guid isPermaLink=\"false\">https://click.ir/?p=161368</guid>\n		<description><![CDATA[<p>رسانه کلیک &#8211; دبیر شورای عالی فضای مجازی گفت: با توجه به معضلات عدیده پیام رسان تلگرام در شورای عالی فضای مجازی به این نتیجه رسیدیم که حتما باید پیام رسان بومی داشته باشیم. به گزارش کلیک به نقل از تسنیم؛ دبیر شورای عالی و رییس مرکز ملی فضای مجازی عنوان کرد: با توجه به معضلات [&#8230;]</p>\n<p>نوشته <a rel=\"nofollow\" href=\"https://click.ir/1397/01/14/telegram-undermined-iran-economy/\">تلگرام 50 میلیارد دلار ارز از کشور خارج کرد/ تاکید رییس جمهور بر خروج کشور از انحصار پیام رسان های خارجی</a> اولین بار در <a rel=\"nofollow\" href=\"https://click.ir\">رسانه کلیک</a> پدیدار شد.</p>\n]]></description>\n		<wfw:commentRss>https://click.ir/1397/01/14/telegram-undermined-iran-economy/feed/</wfw:commentRss>\n		<slash:comments>0</slash:comments>\n		</item>\n		<item>\n		<title>آپدیت جدید تلگرام ایکس چه امکاناتی به کاربران می دهد؟</title>\n		<link>https://click.ir/1397/01/14/telegram-x-new-update/</link>\n		<comments>https://click.ir/1397/01/14/telegram-x-new-update/#respond</comments>\n		<pubDate>Tue, 03 Apr 2018 15:30:49 +0000</pubDate>\n		<dc:creator><![CDATA[محمد قریشی]]></dc:creator>\n				<category><![CDATA[اپلیکیشن‌ها]]></category>\n		<category><![CDATA[فید]]></category>\n		<category><![CDATA[آپدیت تلگرام X]]></category>\n		<category><![CDATA[آپدیت تلگرام ایکس]]></category>\n		<category><![CDATA[بروزرسانی تلگرام X]]></category>\n		<category><![CDATA[بروزرسانی تلگرام ایکس]]></category>\n		<category><![CDATA[تلگرام X]]></category>\n		<category><![CDATA[تلگرام ایکس]]></category>\n		<category><![CDATA[ویژه]]></category>\n\n		<guid isPermaLink=\"false\">https://click.ir/?p=161342</guid>\n		<description><![CDATA[<p>رسانه کلیک &#8211; تلگرام در گذشته از نسخه جدیدی از پیام رسان خود تحت نام تلگرام ایکس رونمایی کرد. حال شاهد انتشار آپدیت جدید تلگرام ایکس هستیم. در این مطلب به بررسی آپدیت جدید تلگرام ایکس و تغییرات صورت گرفته در آن می پردازیم، با رسانه کلیک همراه باشید. امکان استفاده از چند حساب کاربری [&#8230;]</p>\n<p>نوشته <a rel=\"nofollow\" href=\"https://click.ir/1397/01/14/telegram-x-new-update/\">آپدیت جدید تلگرام ایکس چه امکاناتی به کاربران می دهد؟</a> اولین بار در <a rel=\"nofollow\" href=\"https://click.ir\">رسانه کلیک</a> پدیدار شد.</p>\n]]></description>\n		<wfw:commentRss>https://click.ir/1397/01/14/telegram-x-new-update/feed/</wfw:commentRss>\n		<slash:comments>0</slash:comments>\n<enclosure url=\"https://click.ir/wp-content/uploads/2018/04/b5c91022ee59a50edca5c.mp4\" length=\"933051\" type=\"video/mp4\" />\n<enclosure url=\"https://click.ir/wp-content/uploads/2018/04/dd002367ae90eb5254bc8.mp4\" length=\"761877\" type=\"video/mp4\" />\n<enclosure url=\"https://click.ir/wp-content/uploads/2018/04/8da0e05d03286bcc464df.mp4\" length=\"1027899\" type=\"video/mp4\" />\n<enclosure url=\"https://click.ir/wp-content/uploads/2018/04/d8c4aaee05f1af6d54234.mp4\" length=\"880652\" type=\"video/mp4\" />\n<enclosure url=\"https://click.ir/wp-content/uploads/2018/04/b93f019dba952efe49e93.mp4\" length=\"718559\" type=\"video/mp4\" />\n<enclosure url=\"https://click.ir/wp-content/uploads/2018/04/99fb04f0daef3643c3f9f.mp4\" length=\"96803\" type=\"video/mp4\" />\n<enclosure url=\"https://click.ir/wp-content/uploads/2018/04/e0f808d9ab7da19ba441c.mp4\" length=\"188714\" type=\"video/mp4\" />\n<enclosure url=\"https://click.ir/wp-content/uploads/2018/04/8ba5130ffe622e423acc7.mp4\" length=\"467502\" type=\"video/mp4\" />\n<enclosure url=\"https://click.ir/wp-content/uploads/2018/04/e5fe58af3d9fc6bd437fa.mp4\" length=\"618711\" type=\"video/mp4\" />\n<enclosure url=\"https://click.ir/wp-content/uploads/2018/04/423b3d2edf6fc597764b1.mp4\" length=\"523320\" type=\"video/mp4\" />\n		</item>\n		<item>\n		<title>جایزه 100 هزار دلاری بازی زولا، خبر هیجان انگیز برای گیمرهای ایران</title>\n		<link>https://click.ir/1397/01/14/zula-online-game-match/</link>\n		<comments>https://click.ir/1397/01/14/zula-online-game-match/#respond</comments>\n		<pubDate>Tue, 03 Apr 2018 14:51:44 +0000</pubDate>\n		<dc:creator><![CDATA[دانیال رضایی]]></dc:creator>\n				<category><![CDATA[رپورتاژ آگهی]]></category>\n		<category><![CDATA[فید]]></category>\n		<category><![CDATA[بازی آنلاین]]></category>\n		<category><![CDATA[بازی های اینترنتی]]></category>\n		<category><![CDATA[بازی کامپیوتری زولا]]></category>\n		<category><![CDATA[مسابقات جام جهانی zula]]></category>\n\n		<guid isPermaLink=\"false\">https://click.ir/?p=161400</guid>\n		<description><![CDATA[<p>رسانه کلیک &#8211; بازی کامپیوتری معروف زولا که از معدود بازی های بین المللی است که مستقیما از گیمرهای ایرانی پشتیبانی می کند، اخیرا فرصتی را فراهم کرده تا بازیکن های ایرانی بتوانند در مسابقات جام جهانی زولا در استانبول شرکت کرده و برنده نیم میلیارد تومان جایزه شوند! مسابقات جهانی زولا که هر ساله [&#8230;]</p>\n<p>نوشته <a rel=\"nofollow\" href=\"https://click.ir/1397/01/14/zula-online-game-match/\">جایزه 100 هزار دلاری بازی زولا، خبر هیجان انگیز برای گیمرهای ایران</a> اولین بار در <a rel=\"nofollow\" href=\"https://click.ir\">رسانه کلیک</a> پدیدار شد.</p>\n]]></description>\n		<wfw:commentRss>https://click.ir/1397/01/14/zula-online-game-match/feed/</wfw:commentRss>\n		<slash:comments>0</slash:comments>\n		</item>\n		<item>\n		<title>تصویر رسمی گوشی وان پلاس 6 از برآمدگی بالای نمایشگر خبر می دهد!</title>\n		<link>https://click.ir/1397/01/14/oneplus-6-pic-notch/</link>\n		<comments>https://click.ir/1397/01/14/oneplus-6-pic-notch/#respond</comments>\n		<pubDate>Tue, 03 Apr 2018 14:30:34 +0000</pubDate>\n		<dc:creator><![CDATA[راضیه چنگیز نائین]]></dc:creator>\n				<category><![CDATA[فید]]></category>\n		<category><![CDATA[موبایل]]></category>\n		<category><![CDATA[آیفون X]]></category>\n		<category><![CDATA[برش بالای نمایشگر]]></category>\n		<category><![CDATA[بریدگی بالای صفحه نمایش]]></category>\n		<category><![CDATA[شکاف]]></category>\n		<category><![CDATA[وان پلاس 6]]></category>\n		<category><![CDATA[گوشی OnePlus 6]]></category>\n\n		<guid isPermaLink=\"false\">https://click.ir/?p=161222</guid>\n		<description><![CDATA[<p> رسانه کلیک &#8211; تصویر رسمی گوشی وان پلاس 6 منتشر شد تا این دستگاه هم به جرگه گوشی های هوشمندی بپیوندد که مشخصاتش پیش از عرضه و معرفی فاش می شود. دو شرکت OPPO و Vivo که در تولید گوشی های پرطرفدار دستی بر آتش دارند و متعلق به کمپانی تحت عنوان BBK Electronics نیز هستند [&#8230;]</p>\n<p>نوشته <a rel=\"nofollow\" href=\"https://click.ir/1397/01/14/oneplus-6-pic-notch/\">تصویر رسمی گوشی وان پلاس 6 از برآمدگی بالای نمایشگر خبر می دهد!</a> اولین بار در <a rel=\"nofollow\" href=\"https://click.ir\">رسانه کلیک</a> پدیدار شد.</p>\n]]></description>\n		<wfw:commentRss>https://click.ir/1397/01/14/oneplus-6-pic-notch/feed/</wfw:commentRss>\n		<slash:comments>0</slash:comments>\n		</item>\n		<item>\n		<title>تلگرام از منظر حفظ امنیت ملی باید فیلتر شود</title>\n		<link>https://click.ir/1397/01/14/telegram-filtering-national-security/</link>\n		<comments>https://click.ir/1397/01/14/telegram-filtering-national-security/#comments</comments>\n		<pubDate>Tue, 03 Apr 2018 13:53:05 +0000</pubDate>\n		<dc:creator><![CDATA[پارسا منش]]></dc:creator>\n				<category><![CDATA[شبکه‌های اجتماعی]]></category>\n		<category><![CDATA[فید]]></category>\n		<category><![CDATA[Telegram]]></category>\n		<category><![CDATA[بروجردی]]></category>\n		<category><![CDATA[شورای عالی فضای مجازی]]></category>\n		<category><![CDATA[فضای مجازی]]></category>\n		<category><![CDATA[فیلتر تلگرام]]></category>\n		<category><![CDATA[فیلترینگ تلگرام]]></category>\n		<category><![CDATA[پیام رسان های داخلی]]></category>\n\n		<guid isPermaLink=\"false\">https://click.ir/?p=161349</guid>\n		<description><![CDATA[<p>رسانه کلیک &#8211; رییس کمیسیون امنیت ملی و سیاست خارجی مجلس شورای اسلامی با تاکید بر این که بخشی از تهدیدهای امنیت کشور در تلگرام رقم می خورد، گفت: مسئله فیلترینگ شبکه پیام رسان تلگرام باید از منظر منافع ملی و امنیت ملی بررسی شود. به گزارش کلیک به نقل از آفتاب‌‌ نیوز؛ علاءالدین بروجردی رییس کمیسیون [&#8230;]</p>\n<p>نوشته <a rel=\"nofollow\" href=\"https://click.ir/1397/01/14/telegram-filtering-national-security/\">تلگرام از منظر حفظ امنیت ملی باید فیلتر شود</a> اولین بار در <a rel=\"nofollow\" href=\"https://click.ir\">رسانه کلیک</a> پدیدار شد.</p>\n]]></description>\n		<wfw:commentRss>https://click.ir/1397/01/14/telegram-filtering-national-security/feed/</wfw:commentRss>\n		<slash:comments>2</slash:comments>\n		</item>\n		<item>\n		<title>گوشی آنر 7A به صورت رسمی معرفی شد؛ دوربین اصلی دوگانه و قیمت استثنایی</title>\n		<link>https://click.ir/1397/01/14/honor-7a-is-official-with-dual-cameras/</link>\n		<comments>https://click.ir/1397/01/14/honor-7a-is-official-with-dual-cameras/#respond</comments>\n		<pubDate>Tue, 03 Apr 2018 13:30:10 +0000</pubDate>\n		<dc:creator><![CDATA[محمد قریشی]]></dc:creator>\n				<category><![CDATA[فید]]></category>\n		<category><![CDATA[موبایل]]></category>\n		<category><![CDATA[Huawei]]></category>\n		<category><![CDATA[آنر]]></category>\n		<category><![CDATA[آنر 7A]]></category>\n		<category><![CDATA[آنر ۷ ای]]></category>\n		<category><![CDATA[هواوی]]></category>\n		<category><![CDATA[گوشی آنر 7A]]></category>\n\n		<guid isPermaLink=\"false\">https://click.ir/?p=161292</guid>\n		<description><![CDATA[<p>رسانه کلیک &#8211; آنر که زیر مجموعه شرکت هواوی محسوب می شود از یک محصول جدید رونمایی کرده است. گوشی آنر 7A یک دستگاه اقتصادی بوده که از دوربین اصلی دوگانه بهره می برد. شرکت آنر از گوشی آنر 7A به صورت رسمی رونمایی کرد. این محصول اقتصادی که از طراحی تمام صفحه و دوربین [&#8230;]</p>\n<p>نوشته <a rel=\"nofollow\" href=\"https://click.ir/1397/01/14/honor-7a-is-official-with-dual-cameras/\">گوشی آنر 7A به صورت رسمی معرفی شد؛ دوربین اصلی دوگانه و قیمت استثنایی</a> اولین بار در <a rel=\"nofollow\" href=\"https://click.ir\">رسانه کلیک</a> پدیدار شد.</p>\n]]></description>\n		<wfw:commentRss>https://click.ir/1397/01/14/honor-7a-is-official-with-dual-cameras/feed/</wfw:commentRss>\n		<slash:comments>0</slash:comments>\n		</item>\n		<item>\n		<title>روحانی مخالفت خود را با فیلتر شدن تلگرام اعلام کرد</title>\n		<link>https://click.ir/1397/01/14/iran-president-statement-telegram-filtering/</link>\n		<comments>https://click.ir/1397/01/14/iran-president-statement-telegram-filtering/#respond</comments>\n		<pubDate>Tue, 03 Apr 2018 13:21:22 +0000</pubDate>\n		<dc:creator><![CDATA[محمد تقی فرهادپور]]></dc:creator>\n				<category><![CDATA[شبکه‌های اجتماعی]]></category>\n		<category><![CDATA[فید]]></category>\n		<category><![CDATA[Telegram]]></category>\n		<category><![CDATA[شبکه اجتماعی تلگرام]]></category>\n		<category><![CDATA[شورای عالی فضای مجازی]]></category>\n		<category><![CDATA[فضای مجازی]]></category>\n		<category><![CDATA[فیلتر تلگرام]]></category>\n		<category><![CDATA[فیلترینگ تلگرام]]></category>\n		<category><![CDATA[پیام‌ رسان‌ تلگرام]]></category>\n\n		<guid isPermaLink=\"false\">https://click.ir/?p=161328</guid>\n		<description><![CDATA[<p>رسانه کلیک &#8211; رییس جمهور در دیدار با جمعی از مدیران ارشد کشوری، در واکنش به خبرهای مطرح شده درخصوص احتمال فیلتر شبکه اجتماعی تلگرام گفت: بنای نظام بر رفع انحصار از فضای پیام‌ رسان‌ ها بوده است نه فیلتر و بستن فضای مجازی. به گزارش کلیک به نقل از ایتنا؛ با مطرح شدن موضوع [&#8230;]</p>\n<p>نوشته <a rel=\"nofollow\" href=\"https://click.ir/1397/01/14/iran-president-statement-telegram-filtering/\">روحانی مخالفت خود را با فیلتر شدن تلگرام اعلام کرد</a> اولین بار در <a rel=\"nofollow\" href=\"https://click.ir\">رسانه کلیک</a> پدیدار شد.</p>\n]]></description>\n		<wfw:commentRss>https://click.ir/1397/01/14/iran-president-statement-telegram-filtering/feed/</wfw:commentRss>\n		<slash:comments>0</slash:comments>\n		</item>\n		<item>\n		<title>زیست‌ بوم‌ های ایجاد اشتغال در فضای مجازی نیازمند اصلاح است</title>\n		<link>https://click.ir/1397/01/14/employment-cyberspace-internet/</link>\n		<comments>https://click.ir/1397/01/14/employment-cyberspace-internet/#respond</comments>\n		<pubDate>Tue, 03 Apr 2018 12:55:49 +0000</pubDate>\n		<dc:creator><![CDATA[سامیه صوفی]]></dc:creator>\n				<category><![CDATA[ارتباطات]]></category>\n		<category><![CDATA[فید]]></category>\n		<category><![CDATA[آذری‌ جهرمی]]></category>\n		<category><![CDATA[اشتغال]]></category>\n		<category><![CDATA[اینترنت]]></category>\n		<category><![CDATA[زیرساخت‌ های ارتباطی]]></category>\n		<category><![CDATA[زیست بوم اینترنت]]></category>\n		<category><![CDATA[فضای مجازی]]></category>\n		<category><![CDATA[وزارت ارتباطات]]></category>\n		<category><![CDATA[وزیر ارتباطات]]></category>\n		<category><![CDATA[پهن‌ باند]]></category>\n\n		<guid isPermaLink=\"false\">https://click.ir/?p=161299</guid>\n		<description><![CDATA[<p>رسانه کلیک &#8211; وزیر ارتباطات عنوان کرد: اصلاح زیست‌ بوم‌ های ایجاد اشتغال در فضای مجازی باید در دستور کار قرار گیرد. به گزارش کلیک به نقل از باشگاه خبرنگاران جوان؛ محمدجواد آذری‌ جهرمی وزیر ارتباطات و فناوری اطلاعات درباره اقدامات وزارتخانه متبوعش برای تحقق شعار اقتصاد مقاومتی و تولید و اشتغال در سال 96 عنوان [&#8230;]</p>\n<p>نوشته <a rel=\"nofollow\" href=\"https://click.ir/1397/01/14/employment-cyberspace-internet/\">زیست‌ بوم‌ های ایجاد اشتغال در فضای مجازی نیازمند اصلاح است</a> اولین بار در <a rel=\"nofollow\" href=\"https://click.ir\">رسانه کلیک</a> پدیدار شد.</p>\n]]></description>\n		<wfw:commentRss>https://click.ir/1397/01/14/employment-cyberspace-internet/feed/</wfw:commentRss>\n		<slash:comments>0</slash:comments>\n		</item>\n		<item>\n		<title>وزارت ارتباطات هر هفته یک محصول ایرانی باکیفیت معرفی می کند</title>\n		<link>https://click.ir/1397/01/14/department-of-telecommunications-iranian-goods/</link>\n		<comments>https://click.ir/1397/01/14/department-of-telecommunications-iranian-goods/#respond</comments>\n		<pubDate>Tue, 03 Apr 2018 12:40:39 +0000</pubDate>\n		<dc:creator><![CDATA[محمد تقی فرهادپور]]></dc:creator>\n				<category><![CDATA[ارتباطات]]></category>\n		<category><![CDATA[فید]]></category>\n		<category><![CDATA[آذری جهرمی]]></category>\n		<category><![CDATA[محصول ایرانی]]></category>\n		<category><![CDATA[وزارت ارتباطات]]></category>\n		<category><![CDATA[وزیر ارتباطات]]></category>\n\n		<guid isPermaLink=\"false\">https://click.ir/?p=161319</guid>\n		<description><![CDATA[<p>رسانه کلیک &#8211; وزیر ارتباطات و فناوری اطلاعات با اشاره به نامگذاری سال 97 به نام سال حمایت از کالای ایرانی گفت: این وزارتخانه امسال هر هفته یک محصول ایرانی را که از کیفیت بالا و قدرت رقابت در عرصه جهانی برخوردار باشد، معرفی می کند. به گزارش کلیک به نقل از ایرنا؛ محمد جواد [&#8230;]</p>\n<p>نوشته <a rel=\"nofollow\" href=\"https://click.ir/1397/01/14/department-of-telecommunications-iranian-goods/\">وزارت ارتباطات هر هفته یک محصول ایرانی باکیفیت معرفی می کند</a> اولین بار در <a rel=\"nofollow\" href=\"https://click.ir\">رسانه کلیک</a> پدیدار شد.</p>\n]]></description>\n		<wfw:commentRss>https://click.ir/1397/01/14/department-of-telecommunications-iranian-goods/feed/</wfw:commentRss>\n		<slash:comments>0</slash:comments>\n		</item>\n	</channel>\n</rss>\n', '50', '50'),
(8, 3, '', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `authority` varchar(255) NOT NULL,
  `refid` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(250) CHARACTER SET utf8 COLLATE utf8_persian_ci DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `fname` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci DEFAULT NULL,
  `lname` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT '0',
  `role_id` int(10) NOT NULL DEFAULT '2',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `fname`, `lname`, `mobile`, `amount`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 'Saeed Rahimi Manesh', 'Rahimimanesh.saeeid@gmail.com', '$2y$10$KOtxGUEPgintmy30z5HVZ.bWPQ8S3mzjLIGx2S2zWAtFDrfdoq4ie', 'kGghla8VciArhae4V91wmL2ee9y4xWgFnR6DGapXngHujbIFXHAE2L1Ajmyf', 'Saeed', 'Rahimi Manesh', '09193350901', '0', 1, '2018-03-26 01:39:25', '2018-03-29 15:35:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_rss`
--
ALTER TABLE `category_rss`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoryrss_category_id_foreign` (`category_id`),
  ADD KEY `categoryrss_rss_id_foreign` (`rss_id`);

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
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rss`
--
ALTER TABLE `rss`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rssuser` (`user_id`);

--
-- Indexes for table `rsshistory`
--
ALTER TABLE `rsshistory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `storeuser` (`user_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `roleuser` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `category_rss`
--
ALTER TABLE `category_rss`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `post_tag`
--
ALTER TABLE `post_tag`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `rss`
--
ALTER TABLE `rss`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `rsshistory`
--
ALTER TABLE `rsshistory`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `rss`
--
ALTER TABLE `rss`
  ADD CONSTRAINT `rssuser` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `stores`
--
ALTER TABLE `stores`
  ADD CONSTRAINT `storeuser` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `roleuser` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
