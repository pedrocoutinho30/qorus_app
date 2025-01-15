-- MySQL dump 10.13  Distrib 8.0.40, for Linux (x86_64)
--
-- Host: localhost    Database: qorus_db
-- ------------------------------------------------------
-- Server version	8.0.40

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int unsigned DEFAULT NULL,
  `order` int NOT NULL DEFAULT '1',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_slug_unique` (`slug`),
  KEY `categories_parent_id_foreign` (`parent_id`),
  CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,NULL,1,'Category 1','category-1','2025-01-09 16:38:23','2025-01-09 16:38:23'),(2,NULL,1,'Category 2','category-2','2025-01-09 16:38:23','2025-01-09 16:38:23');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `data_rows`
--

DROP TABLE IF EXISTS `data_rows`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `data_rows` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `data_type_id` int unsigned NOT NULL,
  `field` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT '0',
  `browse` tinyint(1) NOT NULL DEFAULT '1',
  `read` tinyint(1) NOT NULL DEFAULT '1',
  `edit` tinyint(1) NOT NULL DEFAULT '1',
  `add` tinyint(1) NOT NULL DEFAULT '1',
  `delete` tinyint(1) NOT NULL DEFAULT '1',
  `details` text COLLATE utf8mb4_unicode_ci,
  `order` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `data_rows_data_type_id_foreign` (`data_type_id`),
  CONSTRAINT `data_rows_data_type_id_foreign` FOREIGN KEY (`data_type_id`) REFERENCES `data_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_rows`
--

LOCK TABLES `data_rows` WRITE;
/*!40000 ALTER TABLE `data_rows` DISABLE KEYS */;
INSERT INTO `data_rows` VALUES (1,1,'id','number','ID',1,0,0,0,0,0,NULL,1),(2,1,'name','text','Name',1,1,1,1,1,1,NULL,2),(3,1,'email','text','Email',1,1,1,1,1,1,NULL,3),(4,1,'password','password','Password',1,0,0,1,1,0,NULL,4),(5,1,'remember_token','text','Remember Token',0,0,0,0,0,0,NULL,5),(6,1,'created_at','timestamp','Created At',0,1,1,0,0,0,NULL,6),(7,1,'updated_at','timestamp','Updated At',0,0,0,0,0,0,NULL,7),(8,1,'avatar','image','Avatar',0,1,1,1,1,1,NULL,8),(9,1,'user_belongsto_role_relationship','relationship','Role',0,1,1,1,1,0,'{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsTo\",\"column\":\"role_id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"roles\",\"pivot\":0}',10),(10,1,'user_belongstomany_role_relationship','relationship','Roles',0,1,1,1,1,0,'{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"user_roles\",\"pivot\":\"1\",\"taggable\":\"0\"}',11),(11,1,'settings','hidden','Settings',0,0,0,0,0,0,NULL,12),(12,2,'id','number','ID',1,0,0,0,0,0,NULL,1),(13,2,'name','text','Name',1,1,1,1,1,1,NULL,2),(14,2,'created_at','timestamp','Created At',0,0,0,0,0,0,NULL,3),(15,2,'updated_at','timestamp','Updated At',0,0,0,0,0,0,NULL,4),(16,3,'id','number','ID',1,0,0,0,0,0,NULL,1),(17,3,'name','text','Name',1,1,1,1,1,1,NULL,2),(18,3,'created_at','timestamp','Created At',0,0,0,0,0,0,NULL,3),(19,3,'updated_at','timestamp','Updated At',0,0,0,0,0,0,NULL,4),(20,3,'display_name','text','Display Name',1,1,1,1,1,1,NULL,5),(21,1,'role_id','text','Role',1,1,1,1,1,1,NULL,9),(22,4,'id','number','ID',1,0,0,0,0,0,NULL,1),(23,4,'parent_id','select_dropdown','Parent',0,0,1,1,1,1,'{\"default\":\"\",\"null\":\"\",\"options\":{\"\":\"-- None --\"},\"relationship\":{\"key\":\"id\",\"label\":\"name\"}}',2),(24,4,'order','text','Order',1,1,1,1,1,1,'{\"default\":1}',3),(25,4,'name','text','Name',1,1,1,1,1,1,NULL,4),(26,4,'slug','text','Slug',1,1,1,1,1,1,'{\"slugify\":{\"origin\":\"name\"}}',5),(27,4,'created_at','timestamp','Created At',0,0,1,0,0,0,NULL,6),(28,4,'updated_at','timestamp','Updated At',0,0,0,0,0,0,NULL,7),(29,5,'id','number','ID',1,0,0,0,0,0,NULL,1),(30,5,'author_id','text','Author',1,0,1,1,0,1,NULL,2),(31,5,'category_id','text','Category',1,0,1,1,1,0,NULL,3),(32,5,'title','text','Title',1,1,1,1,1,1,NULL,4),(33,5,'excerpt','text_area','Excerpt',1,0,1,1,1,1,NULL,5),(34,5,'body','rich_text_box','Body',1,0,1,1,1,1,NULL,6),(35,5,'image','image','Post Image',0,1,1,1,1,1,'{\"resize\":{\"width\":\"1000\",\"height\":\"null\"},\"quality\":\"70%\",\"upsize\":true,\"thumbnails\":[{\"name\":\"medium\",\"scale\":\"50%\"},{\"name\":\"small\",\"scale\":\"25%\"},{\"name\":\"cropped\",\"crop\":{\"width\":\"300\",\"height\":\"250\"}}]}',7),(36,5,'slug','text','Slug',1,0,1,1,1,1,'{\"slugify\":{\"origin\":\"title\",\"forceUpdate\":true},\"validation\":{\"rule\":\"unique:posts,slug\"}}',8),(37,5,'meta_description','text_area','Meta Description',1,0,1,1,1,1,NULL,9),(38,5,'meta_keywords','text_area','Meta Keywords',1,0,1,1,1,1,NULL,10),(39,5,'status','select_dropdown','Status',1,1,1,1,1,1,'{\"default\":\"DRAFT\",\"options\":{\"PUBLISHED\":\"published\",\"DRAFT\":\"draft\",\"PENDING\":\"pending\"}}',11),(40,5,'created_at','timestamp','Created At',0,1,1,0,0,0,NULL,12),(41,5,'updated_at','timestamp','Updated At',0,0,0,0,0,0,NULL,13),(42,5,'seo_title','text','SEO Title',0,1,1,1,1,1,NULL,14),(43,5,'featured','checkbox','Featured',1,1,1,1,1,1,NULL,15),(44,6,'id','number','ID',1,1,0,0,0,0,'{}',1),(46,6,'title','text','Título',1,1,1,1,1,1,'{}',2),(47,6,'excerpt','rich_text_box','Resumo',0,0,1,1,1,1,'{}',4),(48,6,'body','rich_text_box','Texto',0,0,1,1,1,1,'{}',5),(49,6,'slug','text','Slug',1,1,1,1,1,1,'{\"slugify\":{\"origin\":\"title\"},\"validation\":{\"rule\":\"unique:pages,slug\"}}',6),(50,6,'meta_description','text','Meta Description',0,0,1,1,1,1,'{}',7),(51,6,'meta_keywords','text','Meta Keywords',0,0,1,1,1,1,'{}',8),(52,6,'status','checkbox','Estado',1,1,1,1,1,1,'{\"0\":\"Inativo\",\"1\":\"Ativo\"}',9),(53,6,'created_at','timestamp','Created At',0,0,0,0,0,0,'{}',10),(54,6,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',12),(56,6,'deleted_at','timestamp','Deleted At',0,0,0,0,0,0,'{}',11),(57,6,'is_menu','checkbox','É Menu',0,1,1,1,1,1,'{\"0\":\"N\\u00e3o\",\"1\":\"Sim\"}',13),(58,6,'menu_order','text','Ordem Menu',0,0,1,1,1,1,'{}',14),(59,6,'image_1','image','Imagem 1',0,0,1,1,1,1,'{}',15),(60,6,'image_1_opacity','checkbox','Opacidade Imagem 1',0,0,1,1,1,1,'{\"0\":\"N\\u00e3o\",\"1\":\"Sim\"}',16),(61,6,'image_1_color','checkbox','Cor Imagem 1 ',0,0,1,1,1,1,'{\"0\":\"N\\u00e3o\",\"1\":\"Sim\"}',17),(62,6,'image_2','image','Imagem 2',0,0,1,1,1,1,'{}',18),(63,6,'image_2_opacity','checkbox','Opacidade Imagem 2',0,0,1,1,1,1,'{\"0\":\"N\\u00e3o\",\"1\":\"Sim\"}',19),(64,6,'image_2_color','checkbox','Cor Imagem 2',0,0,1,1,1,1,'{\"0\":\"N\\u00e3o\",\"1\":\"Sim\"}',20),(67,6,'author_id','text','Author Id',0,0,0,0,0,0,'{}',20);
/*!40000 ALTER TABLE `data_rows` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `data_types`
--

DROP TABLE IF EXISTS `data_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `data_types` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_singular` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_plural` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controller` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generate_permissions` tinyint(1) NOT NULL DEFAULT '0',
  `server_side` tinyint NOT NULL DEFAULT '0',
  `details` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `data_types_name_unique` (`name`),
  UNIQUE KEY `data_types_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_types`
--

LOCK TABLES `data_types` WRITE;
/*!40000 ALTER TABLE `data_types` DISABLE KEYS */;
INSERT INTO `data_types` VALUES (1,'users','users','User','Users','voyager-person','TCG\\Voyager\\Models\\User','TCG\\Voyager\\Policies\\UserPolicy','TCG\\Voyager\\Http\\Controllers\\VoyagerUserController','',1,0,NULL,'2025-01-09 16:38:06','2025-01-09 16:38:06'),(2,'menus','menus','Menu','Menus','voyager-list','TCG\\Voyager\\Models\\Menu',NULL,'','',1,0,NULL,'2025-01-09 16:38:06','2025-01-09 16:38:06'),(3,'roles','roles','Role','Roles','voyager-lock','TCG\\Voyager\\Models\\Role',NULL,'TCG\\Voyager\\Http\\Controllers\\VoyagerRoleController','',1,0,NULL,'2025-01-09 16:38:06','2025-01-09 16:38:06'),(4,'categories','categories','Category','Categories','voyager-categories','TCG\\Voyager\\Models\\Category',NULL,'','',1,0,NULL,'2025-01-09 16:38:23','2025-01-09 16:38:23'),(5,'posts','posts','Post','Posts','voyager-news','TCG\\Voyager\\Models\\Post','TCG\\Voyager\\Policies\\PostPolicy','','',1,0,NULL,'2025-01-09 16:38:23','2025-01-09 16:38:23'),(6,'pages','pages','Page','Pages','voyager-file-text','TCG\\Voyager\\Models\\Page',NULL,NULL,NULL,1,0,'{\"order_column\":\"id\",\"order_display_column\":\"id\",\"order_direction\":\"desc\",\"default_search_key\":null,\"scope\":null}','2025-01-09 16:38:23','2025-01-09 19:25:36');
/*!40000 ALTER TABLE `data_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu_items`
--

DROP TABLE IF EXISTS `menu_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menu_items` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` int unsigned DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `icon_class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int DEFAULT NULL,
  `order` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameters` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `menu_items_menu_id_foreign` (`menu_id`),
  CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu_items`
--

LOCK TABLES `menu_items` WRITE;
/*!40000 ALTER TABLE `menu_items` DISABLE KEYS */;
INSERT INTO `menu_items` VALUES (1,1,'Dashboard','','_self','voyager-boat',NULL,NULL,1,'2025-01-09 16:38:06','2025-01-09 16:38:06','voyager.dashboard',NULL),(2,1,'Media','','_self','voyager-images',NULL,NULL,5,'2025-01-09 16:38:06','2025-01-09 16:38:06','voyager.media.index',NULL),(3,1,'Users','','_self','voyager-person',NULL,NULL,3,'2025-01-09 16:38:06','2025-01-09 16:38:06','voyager.users.index',NULL),(4,1,'Roles','','_self','voyager-lock',NULL,NULL,2,'2025-01-09 16:38:06','2025-01-09 16:38:06','voyager.roles.index',NULL),(5,1,'Tools','','_self','voyager-tools',NULL,NULL,9,'2025-01-09 16:38:06','2025-01-09 16:38:06',NULL,NULL),(6,1,'Menu Builder','','_self','voyager-list',NULL,5,10,'2025-01-09 16:38:06','2025-01-09 16:38:06','voyager.menus.index',NULL),(7,1,'Database','','_self','voyager-data',NULL,5,11,'2025-01-09 16:38:06','2025-01-09 16:38:06','voyager.database.index',NULL),(8,1,'Compass','','_self','voyager-compass',NULL,5,12,'2025-01-09 16:38:06','2025-01-09 16:38:06','voyager.compass.index',NULL),(9,1,'BREAD','','_self','voyager-bread',NULL,5,13,'2025-01-09 16:38:06','2025-01-09 16:38:06','voyager.bread.index',NULL),(10,1,'Settings','','_self','voyager-settings',NULL,NULL,14,'2025-01-09 16:38:06','2025-01-09 16:38:06','voyager.settings.index',NULL),(11,1,'Categories','','_self','voyager-categories',NULL,NULL,8,'2025-01-09 16:38:23','2025-01-09 16:38:23','voyager.categories.index',NULL),(12,1,'Posts','','_self','voyager-news',NULL,NULL,6,'2025-01-09 16:38:23','2025-01-09 16:38:23','voyager.posts.index',NULL),(13,1,'Pages','','_self','voyager-file-text',NULL,NULL,7,'2025-01-09 16:38:24','2025-01-09 16:38:24','voyager.pages.index',NULL);
/*!40000 ALTER TABLE `menu_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menus` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `menus_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menus`
--

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT INTO `menus` VALUES (1,'admin','2025-01-09 16:38:06','2025-01-09 16:38:06');
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2016_01_01_000000_add_voyager_user_fields',1),(4,'2016_01_01_000000_create_data_types_table',1),(5,'2016_05_19_173453_create_menu_table',1),(6,'2016_10_21_190000_create_roles_table',1),(7,'2016_10_21_190000_create_settings_table',1),(8,'2016_11_30_135954_create_permission_table',1),(9,'2016_11_30_141208_create_permission_role_table',1),(10,'2016_12_26_201236_data_types__add__server_side',1),(11,'2017_01_13_000000_add_route_to_menu_items_table',1),(12,'2017_01_14_005015_create_translations_table',1),(13,'2017_01_15_000000_make_table_name_nullable_in_permissions_table',1),(14,'2017_03_06_000000_add_controller_to_data_types_table',1),(15,'2017_04_21_000000_add_order_to_data_rows_table',1),(16,'2017_07_05_210000_add_policyname_to_data_types_table',1),(17,'2017_08_05_000000_add_group_to_settings_table',1),(18,'2017_11_26_013050_add_user_role_relationship',1),(19,'2017_11_26_015000_create_user_roles_table',1),(20,'2018_03_11_000000_add_user_settings',1),(21,'2018_03_14_000000_add_details_to_data_types_table',1),(22,'2018_03_16_000000_make_settings_value_nullable',1),(23,'2019_08_19_000000_create_failed_jobs_table',1),(24,'2019_12_14_000001_create_personal_access_tokens_table',1),(25,'2016_01_01_000000_create_pages_table',2),(26,'2016_01_01_000000_create_posts_table',2),(27,'2016_02_15_204651_create_categories_table',2),(28,'2017_04_11_000000_alter_post_nullable_fields_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pages` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci,
  `body` text COLLATE utf8mb4_unicode_ci,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `is_menu` binary(255) DEFAULT NULL,
  `menu_order` int DEFAULT NULL,
  `image_1` text COLLATE utf8mb4_unicode_ci,
  `image_1_opacity` int DEFAULT NULL,
  `image_1_color` int DEFAULT NULL,
  `image_2` text COLLATE utf8mb4_unicode_ci,
  `image_2_opacity` int DEFAULT NULL,
  `image_2_color` int DEFAULT NULL,
  `author_id` int DEFAULT NULL,
  `status` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pages_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pages`
--

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
INSERT INTO `pages` VALUES (1,'Sobre a Qorus','<p>A Qorus &eacute; uma empresa de constru&ccedil;&atilde;o reconhecida pelo seu compromisso com a excel&ecirc;ncia e inova&ccedil;&atilde;o. Atuando em diversos segmentos do mercado, a Qorus se destaca por entregar projetos que combinam qualidade, efici&ecirc;ncia e sustentabilidade, sempre atendendo &agrave;s expectativas dos clientes. Seja em obras residenciais, comerciais ou industriais, a empresa busca criar solu&ccedil;&otilde;es personalizadas que agreguem valor e durabilidade.</p>','<p>Com uma equipe altamente qualificada e o uso de tecnologias avan&ccedil;adas, a Qorus garante que cada projeto seja conclu&iacute;do dentro dos prazos estabelecidos e com os mais altos padr&otilde;es de seguran&ccedil;a. A empresa prioriza o acompanhamento pr&oacute;ximo de todas as etapas das obras, garantindo transpar&ecirc;ncia e confian&ccedil;a ao longo do processo. Esse foco nos detalhes faz da Qorus uma refer&ecirc;ncia no setor da constru&ccedil;&atilde;o.</p>\n<p>Al&eacute;m disso, a Qorus tem um forte compromisso com a sustentabilidade, integrando pr&aacute;ticas que minimizam o impacto ambiental em seus projetos. Desde a escolha de materiais at&eacute; a implementa&ccedil;&atilde;o de sistemas de efici&ecirc;ncia energ&eacute;tica, a empresa est&aacute; alinhada com as demandas de um futuro mais verde e respons&aacute;vel. Esse equil&iacute;brio entre inova&ccedil;&atilde;o, responsabilidade e qualidade &eacute; o que solidifica a reputa&ccedil;&atilde;o da Qorus como uma parceira confi&aacute;vel no mercado da constru&ccedil;&atilde;o.</p>','sobre-a-qorus','','','2025-01-09 18:18:37','2025-01-09 19:31:06',NULL,_binary '1\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0',1,'pages/January2025/QryaYbsZLHIt78itjgrl.png',1,1,'pages/January2025/XQsHiUaiFMkKVoWIPRHX.jpg',0,0,2,49),(4,'Engenharia e Construção','<p>A Qorus &eacute; mais do que uma empresa de constru&ccedil;&atilde;o; &eacute; um s&iacute;mbolo de excel&ecirc;ncia em engenharia. Combinando t&eacute;cnicas modernas e solu&ccedil;&otilde;es inteligentes, a Qorus transforma desafios estruturais em oportunidades para criar obras marcantes. A empresa utiliza ferramentas avan&ccedil;adas de modelagem e an&aacute;lise estrutural, garantindo precis&atilde;o em cada etapa do projeto, desde o conceito at&eacute; a entrega final.</p>','<p>A engenharia desempenha um papel central no sucesso dos projetos da Qorus, que s&atilde;o marcados pela integra&ccedil;&atilde;o entre est&eacute;tica, funcionalidade e seguran&ccedil;a. A equipe de engenheiros da empresa trabalha em sinergia com arquitetos e gestores de obra para assegurar que cada constru&ccedil;&atilde;o atenda aos mais altos padr&otilde;es t&eacute;cnicos. Esse alinhamento &eacute; essencial para garantir n&atilde;o apenas a solidez das estruturas, mas tamb&eacute;m a efici&ecirc;ncia no uso de recursos e o cumprimento dos prazos.</p>\n<p>Com uma abordagem inovadora, a Qorus aplica as melhores pr&aacute;ticas de engenharia e constru&ccedil;&atilde;o para atender &agrave;s necessidades dos clientes. Seja na cria&ccedil;&atilde;o de edif&iacute;cios residenciais modernos, infraestruturas urbanas ou complexos industriais, a empresa prioriza solu&ccedil;&otilde;es que sejam tecnicamente robustas e sustent&aacute;veis. Essa uni&atilde;o entre engenharia de ponta e constru&ccedil;&atilde;o de qualidade &eacute; o que torna a Qorus uma refer&ecirc;ncia no setor.</p>','engenharia-e-construcao','','','2025-01-09 18:32:09','2025-01-09 18:58:41',NULL,_binary '1\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0',2,'pages/January2025/0jmFyrx7fvucItSLpMPX.png',0,0,'pages/January2025/9ixjJlUfpLofsOmzpNKJ.png',1,0,2,49),(5,'Inovação e Sustentabilidade','<p>A inova&ccedil;&atilde;o e a sustentabilidade s&atilde;o pilares fundamentais para a Qorus, que se dedica a implementar solu&ccedil;&otilde;es inovadoras em todos os seus projetos. A empresa investe constantemente em tecnologias de ponta, como sistemas de automa&ccedil;&atilde;o e ferramentas de modelagem 3D, para otimizar processos e melhorar a efici&ecirc;ncia de suas constru&ccedil;&otilde;es. Esse foco em inova&ccedil;&atilde;o permite &agrave; Qorus oferecer solu&ccedil;&otilde;es criativas e adapt&aacute;veis, atendendo &agrave;s necessidades dos clientes de maneira eficiente e moderna.</p>','<p>Em paralelo, a sustentabilidade &eacute; um valor central para a Qorus, que adota pr&aacute;ticas respons&aacute;veis em cada etapa do ciclo de constru&ccedil;&atilde;o. A empresa se compromete a utilizar materiais ecol&oacute;gicos, a reduzir o consumo de recursos naturais e a minimizar o impacto ambiental de suas obras. A Qorus est&aacute; atenta &agrave;s novas tend&ecirc;ncias de constru&ccedil;&atilde;o verde, integrando solu&ccedil;&otilde;es como sistemas de energia renov&aacute;vel, aproveitamento da &aacute;gua da chuva e t&eacute;cnicas de isolamento t&eacute;rmico, que resultam em edifica&ccedil;&otilde;es mais eficientes e de baixo impacto ambiental.</p>\n<p>A combina&ccedil;&atilde;o de inova&ccedil;&atilde;o e sustentabilidade n&atilde;o apenas fortalece a posi&ccedil;&atilde;o da Qorus no mercado, mas tamb&eacute;m reflete seu compromisso com um futuro mais consciente e respons&aacute;vel. A empresa acredita que &eacute; poss&iacute;vel construir o amanh&atilde; com respeito ao meio ambiente, criando espa&ccedil;os que atendem &agrave;s exig&ecirc;ncias de funcionalidade e conforto, ao mesmo tempo em que preservam os recursos naturais para as gera&ccedil;&otilde;es futuras. Esse compromisso com o futuro &eacute; o que diferencia a Qorus como l&iacute;der no setor de constru&ccedil;&atilde;o.</p>','inovacao-e-sustentabilidade','','','2025-01-09 18:59:57','2025-01-09 19:02:11',NULL,_binary '1\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0',3,'pages/January2025/Rw4Xx6jyspUs4cjxEE1v.png',0,1,'pages/January2025/jx3OAT0fnG0Awl00tjOn.png',0,1,2,49),(6,'Consultoria','<p>A Qorus tamb&eacute;m se destaca no mercado com seus servi&ccedil;os de consultoria em engenharia e constru&ccedil;&atilde;o, oferecendo solu&ccedil;&otilde;es estrat&eacute;gicas para empresas e clientes que buscam otimizar seus projetos. A equipe de consultores da Qorus possui uma vasta experi&ecirc;ncia no setor e est&aacute; preparada para ajudar em todas as fases do processo construtivo, desde o planejamento at&eacute; a execu&ccedil;&atilde;o. A consultoria visa proporcionar uma an&aacute;lise aprofundada das necessidades do cliente, identificando oportunidades de melhoria, redu&ccedil;&atilde;o de custos e maximiza&ccedil;&atilde;o da efici&ecirc;ncia dos projetos.</p>\n<p>&nbsp;</p>','<p>Al&eacute;m disso, a Qorus oferece consultoria especializada em sustentabilidade e inova&ccedil;&atilde;o, orientando seus clientes sobre as melhores pr&aacute;ticas ambientais e tecnol&oacute;gicas a serem aplicadas nas constru&ccedil;&otilde;es. Com a crescente demanda por projetos verdes e eficientes, a empresa ajuda as organiza&ccedil;&otilde;es a implementar solu&ccedil;&otilde;es sustent&aacute;veis que atendam &agrave;s exig&ecirc;ncias regulamentares e reduzam o impacto ambiental. A consultoria da Qorus assegura que as constru&ccedil;&otilde;es sejam n&atilde;o apenas funcionais, mas tamb&eacute;m alinhadas com as necessidades de um futuro mais ecol&oacute;gico e respons&aacute;vel.</p>\n<p>A consultoria da Qorus &eacute; baseada na confian&ccedil;a, transpar&ecirc;ncia e no compromisso com a excel&ecirc;ncia. Com um olhar atento &agrave;s tend&ecirc;ncias do setor e &agrave;s demandas dos clientes, a empresa trabalha lado a lado com seus parceiros para garantir que os projetos sejam entregues com qualidade, dentro do prazo e com resultados duradouros. Esse servi&ccedil;o especializado refor&ccedil;a a posi&ccedil;&atilde;o da Qorus como uma refer&ecirc;ncia em engenharia e constru&ccedil;&atilde;o, pronta para enfrentar os desafios do mercado atual.</p>','consultoria','','','2025-01-09 19:10:08','2025-01-09 19:40:26',NULL,_binary '1\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0',4,'pages/January2025/NNNdx9rB27lpBJsggSEO.png',1,1,'pages/January2025/FErquqtbR0HMwvBn88DV.png',1,1,2,1),(7,'Termos e condições','','<p>Bem-vindo ao nosso website. Ao acessar e utilizar os nossos servi&ccedil;os, voc&ecirc; concorda em cumprir os seguintes Termos e Condi&ccedil;&otilde;es. Caso n&atilde;o concorde com qualquer parte destes termos, pedimos que n&atilde;o utilize o nosso website.</p>\n<h3><strong>1. Defini&ccedil;&otilde;es</strong></h3>\n<ul>\n<li><strong>\"Servi&ccedil;os\":</strong> Refere-se aos servi&ccedil;os disponibilizados por n&oacute;s, incluindo o uso deste website e produtos relacionados.</li>\n<li><strong>\"Usu&aacute;rio\":</strong> Qualquer pessoa que acesse ou utilize os nossos servi&ccedil;os.</li>\n<li><strong>\"N&oacute;s\" ou \"Nosso\":</strong> Refere-se &agrave; empresa propriet&aacute;ria deste website e dos servi&ccedil;os oferecidos.</li>\n</ul>\n<h3><strong>2. Uso do Website</strong></h3>\n<p>2.1. O uso deste website &eacute; permitido apenas para maiores de 18 anos ou menores acompanhados de respons&aacute;veis legais.</p>\n<p>2.2. Voc&ecirc; concorda em utilizar o website apenas para fins legais e de acordo com estes Termos e Condi&ccedil;&otilde;es.</p>\n<p>2.3. &Eacute; proibido:</p>\n<ul>\n<li>Realizar atividades que possam comprometer a seguran&ccedil;a ou funcionamento do website;</li>\n<li>Utilizar o website para prop&oacute;sitos fraudulentos ou para distribuir conte&uacute;do ilegal;</li>\n<li>Modificar, copiar ou distribuir conte&uacute;do do website sem nossa autoriza&ccedil;&atilde;o.</li>\n</ul>\n<h3><strong>3. Conta do Usu&aacute;rio</strong></h3>\n<p>3.1. Para acessar certos servi&ccedil;os, pode ser necess&aacute;rio criar uma conta. Voc&ecirc; &eacute; respons&aacute;vel por manter a confidencialidade das informa&ccedil;&otilde;es da sua conta e por todas as atividades realizadas na mesma.</p>\n<p>3.2. Reservamo-nos o direito de suspender ou encerrar contas que violem estes Termos e Condi&ccedil;&otilde;es.</p>\n<h3><strong>4. Propriedade Intelectual</strong></h3>\n<p>4.1. Todo o conte&uacute;do do website, incluindo textos, gr&aacute;ficos, logotipos, &eacute; propriedade nossa ou de nossos licenciadores e est&aacute; protegido por leis de direitos autorais.</p>\n<p>4.2. Voc&ecirc; n&atilde;o tem permiss&atilde;o para reproduzir, distribuir ou criar trabalhos derivados do conte&uacute;do do website sem consentimento pr&eacute;vio.</p>\n<h3><strong>5. Limita&ccedil;&atilde;o de Responsabilidade</strong></h3>\n<p>5.1. O website &eacute; fornecido \"como est&aacute;\". N&atilde;o garantimos que os servi&ccedil;os estar&atilde;o livres de erros ou interrup&ccedil;&otilde;es.</p>\n<p>5.2. Em nenhuma circunst&acirc;ncia seremos respons&aacute;veis por danos indiretos, incidentais ou consequentes decorrentes do uso ou incapacidade de uso do website.</p>\n<h3><strong>6. Modifica&ccedil;&otilde;es nos Termos</strong></h3>\n<p>6.1. Reservamo-nos o direito de atualizar ou modificar estes Termos e Condi&ccedil;&otilde;es a qualquer momento. As altera&ccedil;&otilde;es entrar&atilde;o em vigor imediatamente ap&oacute;s a publica&ccedil;&atilde;o no website.</p>\n<p>6.2. &Eacute; sua responsabilidade revisar periodicamente os Termos e Condi&ccedil;&otilde;es para se manter informado sobre as mudan&ccedil;as.</p>\n<h3><strong>7. Legisla&ccedil;&atilde;o Aplic&aacute;vel</strong></h3>\n<p>Estes Termos e Condi&ccedil;&otilde;es s&atilde;o regidos pelas leis de Portugal. Qualquer disputa ser&aacute; resolvida nos tribunais competentes do pa&iacute;s.</p>\n<h3><strong>8. Contato</strong></h3>\n<p>Para quest&otilde;es ou d&uacute;vidas sobre estes Termos e Condi&ccedil;&otilde;es, entre em contato conosco:</p>\n<ul>\n<li><strong>E-mail:</strong> <a href=\"mailto:suporte@exemplo.com\">suporte@exemplo.com</a></li>\n<li><strong>Telefone:</strong> +351 123 456 789</li>\n<li><strong>Endere&ccedil;o:</strong> Rua Exemplo, 123, 1000-000 Lisboa, Portugal</li>\n</ul>','termos-e-condicoes','','','2025-01-09 21:13:04','2025-01-09 21:29:58',NULL,_binary '0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0',NULL,NULL,0,0,NULL,0,0,2,1),(8,'Política de privacidade','','<p><strong>Pol&iacute;tica de Privacidade</strong></p>\n<p>A sua privacidade &eacute; importante para n&oacute;s. Esta Pol&iacute;tica de Privacidade explica como coletamos, usamos, compartilhamos e protegemos as suas informa&ccedil;&otilde;es pessoais ao utilizar o nosso website e servi&ccedil;os. Ao acessar ou utilizar os nossos servi&ccedil;os, voc&ecirc; concorda com os termos desta pol&iacute;tica.</p>\n<h3><strong>1. Informa&ccedil;&otilde;es que Coletamos</strong></h3>\n<p>Podemos coletar as seguintes categorias de informa&ccedil;&otilde;es:</p>\n<h4><strong>1.1. Informa&ccedil;&otilde;es Fornecidas pelo Usu&aacute;rio:</strong></h4>\n<ul>\n<li>Nome completo</li>\n<li>Endere&ccedil;o de e-mail</li>\n<li>N&uacute;mero de telefone</li>\n<li>Endere&ccedil;o residencial ou comercial</li>\n<li>Outras informa&ccedil;&otilde;es que voc&ecirc; nos fornece voluntariamente ao preencher formul&aacute;rios ou interagir conosco.</li>\n</ul>\n<h4><strong>1.2. Informa&ccedil;&otilde;es Coletadas Automaticamente:</strong></h4>\n<ul>\n<li>Endere&ccedil;o IP</li>\n<li>Dados de localiza&ccedil;&atilde;o geogr&aacute;fica (quando autorizado pelo usu&aacute;rio)</li>\n<li>Tipo de dispositivo e navegador utilizado</li>\n<li>Hist&oacute;rico de navega&ccedil;&atilde;o e intera&ccedil;&atilde;o no site</li>\n<li>Cookies e tecnologias semelhantes (ver Se&ccedil;&atilde;o 6 para mais detalhes).</li>\n</ul>\n<h3><strong>2. Como Utilizamos as Suas Informa&ccedil;&otilde;es</strong></h3>\n<p>Utilizamos as informa&ccedil;&otilde;es coletadas para os seguintes fins:</p>\n<ul>\n<li>Fornecer, operar e melhorar os nossos servi&ccedil;os;</li>\n<li>Personalizar a sua experi&ecirc;ncia no site;</li>\n<li>Processar pedidos, pagamentos e transa&ccedil;&otilde;es realizadas pelo usu&aacute;rio;</li>\n<li>Comunicar informa&ccedil;&otilde;es importantes, como atualiza&ccedil;&otilde;es nos servi&ccedil;os e pol&iacute;ticas;</li>\n<li>Responder a consultas, pedidos de suporte ou outras intera&ccedil;&otilde;es do usu&aacute;rio;</li>\n<li>Cumprir obriga&ccedil;&otilde;es legais e regulat&oacute;rias.</li>\n</ul>\n<h3><strong>3. Compartilhamento de Informa&ccedil;&otilde;es com Terceiros</strong></h3>\n<p>Podemos compartilhar as suas informa&ccedil;&otilde;es com terceiros apenas nas seguintes situa&ccedil;&otilde;es:</p>\n<ul>\n<li><strong>Provedores de servi&ccedil;os:</strong> Empresas que fornecem servi&ccedil;os em nosso nome, como hospedagem, processamento de pagamentos ou an&aacute;lise de dados.</li>\n<li><strong>Requisitos legais:</strong> Quando exigido por lei ou para proteger os nossos direitos, seguran&ccedil;a e propriedade.</li>\n<li><strong>Consentimento:</strong> Quando voc&ecirc; nos autorizar explicitamente a compartilhar as suas informa&ccedil;&otilde;es.</li>\n</ul>\n<h3><strong>4. Reten&ccedil;&atilde;o de Dados</strong></h3>\n<p>Reteremos as suas informa&ccedil;&otilde;es pessoais apenas pelo tempo necess&aacute;rio para cumprir os fins descritos nesta pol&iacute;tica, salvo exig&ecirc;ncia legal ou regulat&oacute;ria em contr&aacute;rio.</p>\n<h3><strong>5. Seus Direitos</strong></h3>\n<p>Voc&ecirc; tem os seguintes direitos em rela&ccedil;&atilde;o &agrave;s suas informa&ccedil;&otilde;es pessoais:</p>\n<ul>\n<li>Acessar as informa&ccedil;&otilde;es que mantemos sobre voc&ecirc;;</li>\n<li>Solicitar a corre&ccedil;&atilde;o ou atualiza&ccedil;&atilde;o das suas informa&ccedil;&otilde;es;</li>\n<li>Solicitar a exclus&atilde;o das suas informa&ccedil;&otilde;es (salvo quando houver obriga&ccedil;&atilde;o legal de reten&ccedil;&atilde;o);</li>\n<li>Opor-se ao uso de suas informa&ccedil;&otilde;es para certos fins;</li>\n<li>Solicitar a transfer&ecirc;ncia de suas informa&ccedil;&otilde;es para outra organiza&ccedil;&atilde;o.</li>\n</ul>\n<p>Para exercer esses direitos, entre em contato conosco utilizando as informa&ccedil;&otilde;es de contato fornecidas abaixo.</p>\n<h3><strong>6. Cookies e Tecnologias Semelhantes</strong></h3>\n<p>Utilizamos cookies e tecnologias semelhantes para:</p>\n<ul>\n<li>Melhorar a funcionalidade do site;</li>\n<li>Analisar o tr&aacute;fego e comportamento dos usu&aacute;rios;</li>\n<li>Personalizar conte&uacute;do e publicidade.</li>\n</ul>\n<p>Voc&ecirc; pode controlar o uso de cookies por meio das configura&ccedil;&otilde;es do seu navegador.</p>\n<h3><strong>7. Seguran&ccedil;a das Informa&ccedil;&otilde;es</strong></h3>\n<p>Implementamos medidas de seguran&ccedil;a t&eacute;cnicas e organizacionais para proteger as suas informa&ccedil;&otilde;es pessoais contra acesso, uso ou divulga&ccedil;&atilde;o n&atilde;o autorizados. No entanto, nenhuma transmiss&atilde;o ou armazenamento de dados &eacute; completamente seguro, e n&atilde;o podemos garantir a seguran&ccedil;a absoluta.</p>\n<h3><strong>8. Altera&ccedil;&otilde;es a Esta Pol&iacute;tica</strong></h3>\n<p>Reservamo-nos o direito de atualizar esta Pol&iacute;tica de Privacidade a qualquer momento. Notificaremos sobre mudan&ccedil;as significativas atrav&eacute;s do nosso site ou outros meios adequados. Recomendamos que revise esta pol&iacute;tica periodicamente.</p>\n<h3><strong>9. Contato</strong></h3>\n<p>Se tiver alguma d&uacute;vida ou solicita&ccedil;&atilde;o relacionada a esta Pol&iacute;tica de Privacidade, entre em contato conosco:</p>\n<ul>\n<li><strong>E-mail:</strong> <a href=\"mailto:suporte@exemplo.com\">suporte@exemplo.com</a></li>\n<li><strong>Telefone:</strong> +351 123 456 789</li>\n<li><strong>Endere&ccedil;o:</strong> Rua Exemplo, 123, 1000-000 Lisboa, Portugal</li>\n</ul>','politica-de-privacidade','','','2025-01-09 21:13:41','2025-01-09 21:29:49',NULL,_binary '0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0',NULL,NULL,0,0,NULL,0,0,2,1);
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permission_role` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_permission_id_index` (`permission_id`),
  KEY `permission_role_role_id_index` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission_role`
--

LOCK TABLES `permission_role` WRITE;
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
INSERT INTO `permission_role` VALUES (1,1),(2,1),(3,1),(4,1),(5,1),(6,1),(7,1),(8,1),(9,1),(10,1),(11,1),(12,1),(13,1),(14,1),(15,1),(16,1),(17,1),(18,1),(19,1),(20,1),(21,1),(22,1),(23,1),(24,1),(25,1),(26,1),(27,1),(28,1),(29,1),(30,1),(31,1),(32,1),(33,1),(34,1),(35,1),(36,1),(37,1),(38,1),(39,1),(40,1);
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permissions_key_index` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'browse_admin',NULL,'2025-01-09 16:38:06','2025-01-09 16:38:06'),(2,'browse_bread',NULL,'2025-01-09 16:38:06','2025-01-09 16:38:06'),(3,'browse_database',NULL,'2025-01-09 16:38:06','2025-01-09 16:38:06'),(4,'browse_media',NULL,'2025-01-09 16:38:06','2025-01-09 16:38:06'),(5,'browse_compass',NULL,'2025-01-09 16:38:06','2025-01-09 16:38:06'),(6,'browse_menus','menus','2025-01-09 16:38:06','2025-01-09 16:38:06'),(7,'read_menus','menus','2025-01-09 16:38:06','2025-01-09 16:38:06'),(8,'edit_menus','menus','2025-01-09 16:38:06','2025-01-09 16:38:06'),(9,'add_menus','menus','2025-01-09 16:38:06','2025-01-09 16:38:06'),(10,'delete_menus','menus','2025-01-09 16:38:06','2025-01-09 16:38:06'),(11,'browse_roles','roles','2025-01-09 16:38:06','2025-01-09 16:38:06'),(12,'read_roles','roles','2025-01-09 16:38:06','2025-01-09 16:38:06'),(13,'edit_roles','roles','2025-01-09 16:38:06','2025-01-09 16:38:06'),(14,'add_roles','roles','2025-01-09 16:38:06','2025-01-09 16:38:06'),(15,'delete_roles','roles','2025-01-09 16:38:06','2025-01-09 16:38:06'),(16,'browse_users','users','2025-01-09 16:38:06','2025-01-09 16:38:06'),(17,'read_users','users','2025-01-09 16:38:06','2025-01-09 16:38:06'),(18,'edit_users','users','2025-01-09 16:38:06','2025-01-09 16:38:06'),(19,'add_users','users','2025-01-09 16:38:06','2025-01-09 16:38:06'),(20,'delete_users','users','2025-01-09 16:38:06','2025-01-09 16:38:06'),(21,'browse_settings','settings','2025-01-09 16:38:06','2025-01-09 16:38:06'),(22,'read_settings','settings','2025-01-09 16:38:06','2025-01-09 16:38:06'),(23,'edit_settings','settings','2025-01-09 16:38:06','2025-01-09 16:38:06'),(24,'add_settings','settings','2025-01-09 16:38:06','2025-01-09 16:38:06'),(25,'delete_settings','settings','2025-01-09 16:38:06','2025-01-09 16:38:06'),(26,'browse_categories','categories','2025-01-09 16:38:23','2025-01-09 16:38:23'),(27,'read_categories','categories','2025-01-09 16:38:23','2025-01-09 16:38:23'),(28,'edit_categories','categories','2025-01-09 16:38:23','2025-01-09 16:38:23'),(29,'add_categories','categories','2025-01-09 16:38:23','2025-01-09 16:38:23'),(30,'delete_categories','categories','2025-01-09 16:38:23','2025-01-09 16:38:23'),(31,'browse_posts','posts','2025-01-09 16:38:23','2025-01-09 16:38:23'),(32,'read_posts','posts','2025-01-09 16:38:23','2025-01-09 16:38:23'),(33,'edit_posts','posts','2025-01-09 16:38:23','2025-01-09 16:38:23'),(34,'add_posts','posts','2025-01-09 16:38:23','2025-01-09 16:38:23'),(35,'delete_posts','posts','2025-01-09 16:38:23','2025-01-09 16:38:23'),(36,'browse_pages','pages','2025-01-09 16:38:24','2025-01-09 16:38:24'),(37,'read_pages','pages','2025-01-09 16:38:24','2025-01-09 16:38:24'),(38,'edit_pages','pages','2025-01-09 16:38:24','2025-01-09 16:38:24'),(39,'add_pages','pages','2025-01-09 16:38:24','2025-01-09 16:38:24'),(40,'delete_pages','pages','2025-01-09 16:38:24','2025-01-09 16:38:24');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `posts` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `author_id` int NOT NULL,
  `category_id` int DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` enum('PUBLISHED','DRAFT','PENDING') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'DRAFT',
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `posts_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,0,NULL,'Lorem Ipsum Post',NULL,'This is the excerpt for the Lorem Ipsum Post','<p>This is the body of the lorem ipsum post</p>','posts/post1.jpg','lorem-ipsum-post','This is the meta description','keyword1, keyword2, keyword3','PUBLISHED',0,'2025-01-09 16:38:23','2025-01-09 16:38:23'),(2,0,NULL,'My Sample Post',NULL,'This is the excerpt for the sample Post','<p>This is the body for the sample post, which includes the body.</p>\n                <h2>We can use all kinds of format!</h2>\n                <p>And include a bunch of other stuff.</p>','posts/post2.jpg','my-sample-post','Meta Description for sample post','keyword1, keyword2, keyword3','PUBLISHED',0,'2025-01-09 16:38:23','2025-01-09 16:38:23'),(3,0,NULL,'Latest Post',NULL,'This is the excerpt for the latest post','<p>This is the body for the latest post</p>','posts/post3.jpg','latest-post','This is the meta description','keyword1, keyword2, keyword3','PUBLISHED',0,'2025-01-09 16:38:23','2025-01-09 16:38:23'),(4,0,NULL,'Yarr Post',NULL,'Reef sails nipperkin bring a spring upon her cable coffer jury mast spike marooned Pieces of Eight poop deck pillage. Clipper driver coxswain galleon hempen halter come about pressgang gangplank boatswain swing the lead. Nipperkin yard skysail swab lanyard Blimey bilge water ho quarter Buccaneer.','<p>Swab deadlights Buccaneer fire ship square-rigged dance the hempen jig weigh anchor cackle fruit grog furl. Crack Jennys tea cup chase guns pressgang hearties spirits hogshead Gold Road six pounders fathom measured fer yer chains. Main sheet provost come about trysail barkadeer crimp scuttle mizzenmast brig plunder.</p>\n<p>Mizzen league keelhaul galleon tender cog chase Barbary Coast doubloon crack Jennys tea cup. Blow the man down lugsail fire ship pinnace cackle fruit line warp Admiral of the Black strike colors doubloon. Tackle Jack Ketch come about crimp rum draft scuppers run a shot across the bow haul wind maroon.</p>\n<p>Interloper heave down list driver pressgang holystone scuppers tackle scallywag bilged on her anchor. Jack Tar interloper draught grapple mizzenmast hulk knave cable transom hogshead. Gaff pillage to go on account grog aft chase guns piracy yardarm knave clap of thunder.</p>','posts/post4.jpg','yarr-post','this be a meta descript','keyword1, keyword2, keyword3','PUBLISHED',0,'2025-01-09 16:38:23','2025-01-09 16:38:23');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin','Administrator','2025-01-09 16:38:06','2025-01-09 16:38:06'),(2,'user','Normal User','2025-01-09 16:38:06','2025-01-09 16:38:06');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `settings` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `details` text COLLATE utf8mb4_unicode_ci,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int NOT NULL DEFAULT '1',
  `group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `settings_key_unique` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES (1,'site.title','Site Title','Qorus Group','','text',1,'Site'),(2,'site.description','Site Description',NULL,'','text',2,'Site'),(3,'site.logo','Site Logo','settings/January2025/DYIAWwRnw6sWkSUcjpJI.png','','image',3,'Site'),(4,'site.google_analytics_tracking_id','Google Analytics Tracking ID',NULL,'','text',4,'Site'),(5,'admin.bg_image','Admin Background Image','settings/January2025/5bfP52jd9QQd4KOpivHs.png','','image',5,'Admin'),(6,'admin.title','Admin Title','Qorus','','text',1,'Admin'),(7,'admin.description','Admin Description','Welcome to Voyager. The Missing Admin for Laravel','','text',2,'Admin'),(8,'admin.loader','Admin Loader','settings/January2025/Zw0CVFAVZ3aVMp80fIoU.png','','image',3,'Admin'),(9,'admin.icon_image','Admin Icon Image','settings/January2025/cw9FERO55IVBjC9SMIu8.png','','image',4,'Admin'),(10,'admin.google_analytics_client_id','Google Analytics Client ID (used for admin dashboard)',NULL,'','text',1,'Admin');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `translations`
--

DROP TABLE IF EXISTS `translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `translations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `column_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foreign_key` int unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `translations_table_name_column_name_foreign_key_locale_unique` (`table_name`,`column_name`,`foreign_key`,`locale`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `translations`
--

LOCK TABLES `translations` WRITE;
/*!40000 ALTER TABLE `translations` DISABLE KEYS */;
INSERT INTO `translations` VALUES (1,'data_types','display_name_singular',5,'pt','Post','2025-01-09 16:38:24','2025-01-09 16:38:24'),(2,'data_types','display_name_singular',6,'pt','Página','2025-01-09 16:38:24','2025-01-09 16:38:24'),(3,'data_types','display_name_singular',1,'pt','Utilizador','2025-01-09 16:38:24','2025-01-09 16:38:24'),(4,'data_types','display_name_singular',4,'pt','Categoria','2025-01-09 16:38:24','2025-01-09 16:38:24'),(5,'data_types','display_name_singular',2,'pt','Menu','2025-01-09 16:38:24','2025-01-09 16:38:24'),(6,'data_types','display_name_singular',3,'pt','Função','2025-01-09 16:38:24','2025-01-09 16:38:24'),(7,'data_types','display_name_plural',5,'pt','Posts','2025-01-09 16:38:24','2025-01-09 16:38:24'),(8,'data_types','display_name_plural',6,'pt','Páginas','2025-01-09 16:38:24','2025-01-09 16:38:24'),(9,'data_types','display_name_plural',1,'pt','Utilizadores','2025-01-09 16:38:24','2025-01-09 16:38:24'),(10,'data_types','display_name_plural',4,'pt','Categorias','2025-01-09 16:38:24','2025-01-09 16:38:24'),(11,'data_types','display_name_plural',2,'pt','Menus','2025-01-09 16:38:24','2025-01-09 16:38:24'),(12,'data_types','display_name_plural',3,'pt','Funções','2025-01-09 16:38:24','2025-01-09 16:38:24'),(13,'categories','slug',1,'pt','categoria-1','2025-01-09 16:38:24','2025-01-09 16:38:24'),(14,'categories','name',1,'pt','Categoria 1','2025-01-09 16:38:24','2025-01-09 16:38:24'),(15,'categories','slug',2,'pt','categoria-2','2025-01-09 16:38:24','2025-01-09 16:38:24'),(16,'categories','name',2,'pt','Categoria 2','2025-01-09 16:38:24','2025-01-09 16:38:24'),(20,'menu_items','title',1,'pt','Painel de Controle','2025-01-09 16:38:24','2025-01-09 16:38:24'),(21,'menu_items','title',2,'pt','Media','2025-01-09 16:38:24','2025-01-09 16:38:24'),(22,'menu_items','title',12,'pt','Publicações','2025-01-09 16:38:24','2025-01-09 16:38:24'),(23,'menu_items','title',3,'pt','Utilizadores','2025-01-09 16:38:24','2025-01-09 16:38:24'),(24,'menu_items','title',11,'pt','Categorias','2025-01-09 16:38:24','2025-01-09 16:38:24'),(25,'menu_items','title',13,'pt','Páginas','2025-01-09 16:38:24','2025-01-09 16:38:24'),(26,'menu_items','title',4,'pt','Funções','2025-01-09 16:38:24','2025-01-09 16:38:24'),(27,'menu_items','title',5,'pt','Ferramentas','2025-01-09 16:38:24','2025-01-09 16:38:24'),(28,'menu_items','title',6,'pt','Menus','2025-01-09 16:38:24','2025-01-09 16:38:24'),(29,'menu_items','title',7,'pt','Base de dados','2025-01-09 16:38:24','2025-01-09 16:38:24'),(30,'menu_items','title',10,'pt','Configurações','2025-01-09 16:38:24','2025-01-09 16:38:24'),(31,'data_rows','display_name',44,'en','ID','2025-01-09 18:06:26','2025-01-09 18:06:26'),(32,'data_rows','display_name',46,'en','Title','2025-01-09 18:06:26','2025-01-09 18:06:26'),(33,'data_rows','display_name',47,'en','Excerpt','2025-01-09 18:06:26','2025-01-09 18:06:26'),(34,'data_rows','display_name',48,'en','Body','2025-01-09 18:06:26','2025-01-09 18:06:26'),(35,'data_rows','display_name',49,'en','Slug','2025-01-09 18:06:26','2025-01-09 18:06:26'),(36,'data_rows','display_name',50,'en','Meta Description','2025-01-09 18:06:26','2025-01-09 18:06:26'),(37,'data_rows','display_name',51,'en','Meta Keywords','2025-01-09 18:06:26','2025-01-09 18:06:26'),(38,'data_rows','display_name',52,'en','Status','2025-01-09 18:06:26','2025-01-09 18:06:26'),(39,'data_rows','display_name',53,'en','Created At','2025-01-09 18:06:26','2025-01-09 18:06:26'),(40,'data_rows','display_name',54,'en','Updated At','2025-01-09 18:06:26','2025-01-09 18:06:26'),(41,'data_types','display_name_singular',6,'en','Page','2025-01-09 18:06:26','2025-01-09 18:06:26'),(42,'data_types','display_name_plural',6,'en','Pages','2025-01-09 18:06:26','2025-01-09 18:06:26'),(43,'data_rows','display_name',56,'en','Deleted At','2025-01-09 18:10:25','2025-01-09 18:10:25'),(44,'data_rows','display_name',57,'en','Is Menu','2025-01-09 18:10:25','2025-01-09 18:10:25'),(45,'data_rows','display_name',58,'en','Menu Order','2025-01-09 18:10:25','2025-01-09 18:10:25'),(46,'data_rows','display_name',59,'en','Imagem 1','2025-01-09 18:10:25','2025-01-09 18:10:25'),(47,'data_rows','display_name',60,'en','Opacidade Imagem 1','2025-01-09 18:10:25','2025-01-09 18:10:25'),(48,'data_rows','display_name',61,'en','Cor Imagem 1 ','2025-01-09 18:10:25','2025-01-09 18:10:25'),(49,'data_rows','display_name',62,'en','Imagem 2','2025-01-09 18:10:25','2025-01-09 18:10:25'),(50,'data_rows','display_name',63,'en','Opacidade Imagem 2','2025-01-09 18:10:25','2025-01-09 18:10:25'),(51,'data_rows','display_name',64,'en','Cor Imagem 2','2025-01-09 18:10:25','2025-01-09 18:10:25'),(52,'data_rows','display_name',65,'en','Author Id','2025-01-09 18:22:07','2025-01-09 18:22:07'),(55,'pages','title',1,'en','About Qorus','2025-01-09 18:27:55','2025-01-09 18:27:55'),(56,'pages','body',1,'en','<p>A qorus em en</p>','2025-01-09 18:27:55','2025-01-09 18:27:55'),(57,'pages','slug',1,'en','sobre-a-qorus','2025-01-09 18:27:55','2025-01-09 18:27:55'),(58,'pages','title',4,'en','Engineering and Construction','2025-01-09 18:32:09','2025-01-09 18:32:09'),(59,'pages','body',4,'en','<p>Engineering plays a central role in the success of Qorus projects, which are marked by the integration between aesthetics, functionality and safety. The company\'s team of engineers works in synergy with architects and construction managers to ensure that each construction meets the highest technical standards. This alignment is essential to ensure not only the solidity of structures, but also efficient use of resources and compliance with deadlines.</p>\n<p>With an innovative approach, Qorus applies best engineering and construction practices to meet customer needs. Whether creating modern residential buildings, urban infrastructures or industrial complexes, the company prioritizes solutions that are technically robust and sustainable. This union between cutting-edge engineering and quality construction is what makes Qorus a reference in the sector.</p>','2025-01-09 18:32:09','2025-01-09 18:32:09'),(60,'pages','slug',4,'en','engineering-and-construction','2025-01-09 18:32:09','2025-01-09 18:32:09'),(61,'data_rows','display_name',66,'en','Sub Titulo','2025-01-09 18:44:40','2025-01-09 18:44:40'),(62,'pages','excerpt',4,'en','<p>Qorus is more than a construction company; It is a symbol of engineering excellence. Combining modern techniques and intelligent solutions, Qorus transforms structural challenges into opportunities to create striking works. The company uses advanced modeling and structural analysis tools, ensuring precision at each stage of the project, from concept to final delivery.</p>','2025-01-09 18:58:41','2025-01-09 18:58:41'),(63,'pages','excerpt',1,'en','<p>Qorus is a construction company recognized for its commitment to excellence and innovation. Operating in different market segments, Qorus stands out for delivering projects that combine quality, efficiency and sustainability, always meeting customer expectations. Whether in residential, commercial or industrial works, the company seeks to create personalized solutions that add value and durability.</p>','2025-01-09 18:59:13','2025-01-09 18:59:13'),(64,'pages','title',5,'en','Innovation and Sustainability','2025-01-09 19:02:11','2025-01-09 19:02:11'),(65,'pages','excerpt',5,'en','<p>Innovation and sustainability are fundamental pillars for Qorus, which is dedicated to implementing innovative solutions in all its projects. The company constantly invests in cutting-edge technologies, such as automation systems and 3D modeling tools, to optimize processes and improve the efficiency of its constructions. This focus on innovation allows Qorus to offer creative and adaptable solutions, meeting customer needs in an efficient and modern way.</p>\n<pre id=\"tw-target-text\" class=\"tw-data-text tw-text-large tw-ta\" dir=\"ltr\" data-placeholder=\"Tradu&ccedil;&atilde;o\" data-ved=\"2ahUKEwi9oO6inemKAxWgSfEDHd0lJ-QQ3ewLegQIDRAU\" aria-label=\"Texto traduzido: Innovation and sustainability are fundamental pillars for Qorus, which is dedicated to implementing innovative solutions in all its projects. The company constantly invests in cutting-edge technologies, such as automation systems and 3D modeling tools, to optimize processes and improve the efficiency of its constructions. This focus on innovation allows Qorus to offer creative and adaptable solutions, meeting customer needs in an efficient and modern way.\n\nIn parallel, sustainability is a core value for Qorus, which adopts responsible practices at each stage of the construction cycle. The company is committed to using ecological materials, reducing the consumption of natural resources and minimizing the environmental impact of its works. Qorus is attentive to new trends in green construction, integrating solutions such as renewable energy systems, use of rainwater and thermal insulation techniques, which result in more efficient buildings with low environmental impact.\n\nThe combination of innovation and sustainability not only strengthens Qorus\' position in the market, but also reflects its commitment to a more conscious and responsible future. The company believes that it is possible to build tomorrow with respect for the environment, creating spaces that meet the demands of functionality and comfort, while preserving natural resources for future generations. This commitment to the future is what sets Qorus apart as a leader in the construction industry.\"></pre>','2025-01-09 19:02:11','2025-01-09 19:02:11'),(66,'pages','body',5,'en','<p>In parallel, sustainability is a core value for Qorus, which adopts responsible practices at each stage of the construction cycle. The company is committed to using ecological materials, reducing the consumption of natural resources and minimizing the environmental impact of its works. Qorus is attentive to new trends in green construction, integrating solutions such as renewable energy systems, use of rainwater and thermal insulation techniques, which result in more efficient buildings with low environmental impact.</p>\n<p>The combination of innovation and sustainability not only strengthens Qorus\' position in the market, but also reflects its commitment to a more conscious and responsible future. The company believes that it is possible to build tomorrow with respect for the environment, creating spaces that meet the demands of functionality and comfort, while preserving natural resources for future generations. This commitment to the future is what sets Qorus apart as a leader in the construction industry.</p>\n<pre id=\"tw-target-text\" class=\"tw-data-text tw-text-large tw-ta\" dir=\"ltr\" data-placeholder=\"Tradu&ccedil;&atilde;o\" data-ved=\"2ahUKEwi9oO6inemKAxWgSfEDHd0lJ-QQ3ewLegQIDRAU\" aria-label=\"Texto traduzido: Innovation and sustainability are fundamental pillars for Qorus, which is dedicated to implementing innovative solutions in all its projects. The company constantly invests in cutting-edge technologies, such as automation systems and 3D modeling tools, to optimize processes and improve the efficiency of its constructions. This focus on innovation allows Qorus to offer creative and adaptable solutions, meeting customer needs in an efficient and modern way.\n\nIn parallel, sustainability is a core value for Qorus, which adopts responsible practices at each stage of the construction cycle. The company is committed to using ecological materials, reducing the consumption of natural resources and minimizing the environmental impact of its works. Qorus is attentive to new trends in green construction, integrating solutions such as renewable energy systems, use of rainwater and thermal insulation techniques, which result in more efficient buildings with low environmental impact.\n\nThe combination of innovation and sustainability not only strengthens Qorus\' position in the market, but also reflects its commitment to a more conscious and responsible future. The company believes that it is possible to build tomorrow with respect for the environment, creating spaces that meet the demands of functionality and comfort, while preserving natural resources for future generations. This commitment to the future is what sets Qorus apart as a leader in the construction industry.\"></pre>','2025-01-09 19:02:11','2025-01-09 19:02:11'),(67,'pages','slug',5,'en','inovacao-e-sustentabilidade','2025-01-09 19:02:11','2025-01-09 19:02:11'),(68,'pages','title',6,'en','Consultancy','2025-01-09 19:10:08','2025-01-09 19:10:08'),(69,'pages','excerpt',6,'en','<p>Qorus also stands out in the market with its engineering and construction consultancy services, offering strategic solutions for companies and clients seeking to optimize their projects. Qorus\' team of consultants has extensive experience in the sector and is prepared to help in all phases of the construction process, from planning to execution. The consultancy aims to provide an in-depth analysis of the client\'s needs, identifying opportunities for improvement, cost reduction and maximizing project efficiency.</p>\n<p>&nbsp;</p>','2025-01-09 19:10:08','2025-01-09 19:10:08'),(70,'pages','body',6,'en','<p>In addition, Qorus offers specialized consultancy in sustainability and innovation, guiding its clients on the best environmental and technological practices to be applied in construction. With the growing demand for green and efficient projects, the company helps organizations implement sustainable solutions that meet regulatory requirements and reduce environmental impact. Qorus consultancy ensures that buildings are not only functional, but also aligned with the needs of a more ecological and responsible future.</p>\n<p>Qorus consultancy is based on trust, transparency and a commitment to excellence. With a close eye on industry trends and customer demands, the company works hand in hand with its partners to ensure that projects are delivered with quality, on time and with lasting results. This specialized service reinforces Qorus\' position as a reference in engineering and construction, ready to face the challenges of the current market.</p>','2025-01-09 19:10:08','2025-01-09 19:10:08'),(71,'pages','slug',6,'en','consultancy','2025-01-09 19:10:08','2025-01-09 19:10:08'),(72,'data_rows','display_name',67,'en','Author Id','2025-01-09 19:24:17','2025-01-09 19:24:17'),(73,'pages','title',7,'en','Terms and conditions','2025-01-09 21:13:04','2025-01-09 21:13:04'),(74,'pages','slug',7,'en','terms-and-conditions','2025-01-09 21:13:04','2025-01-09 21:13:04'),(75,'pages','title',8,'en','Privacy Policy','2025-01-09 21:13:41','2025-01-09 21:13:41'),(76,'pages','slug',8,'en','privacy-policy','2025-01-09 21:13:41','2025-01-09 21:13:41'),(77,'pages','body',8,'en','<p><strong>Pol&iacute;tica de Privacidade</strong></p>\n<p>A sua privacidade &eacute; importante para n&oacute;s. Esta Pol&iacute;tica de Privacidade explica como coletamos, usamos, compartilhamos e protegemos as suas informa&ccedil;&otilde;es pessoais ao utilizar o nosso website e servi&ccedil;os. Ao acessar ou utilizar os nossos servi&ccedil;os, voc&ecirc; concorda com os termos desta pol&iacute;tica.</p>\n<h3><strong>1. Informa&ccedil;&otilde;es que Coletamos</strong></h3>\n<p>Podemos coletar as seguintes categorias de informa&ccedil;&otilde;es:</p>\n<h4><strong>1.1. Informa&ccedil;&otilde;es Fornecidas pelo Usu&aacute;rio:</strong></h4>\n<ul>\n<li>Nome completo</li>\n<li>Endere&ccedil;o de e-mail</li>\n<li>N&uacute;mero de telefone</li>\n<li>Endere&ccedil;o residencial ou comercial</li>\n<li>Outras informa&ccedil;&otilde;es que voc&ecirc; nos fornece voluntariamente ao preencher formul&aacute;rios ou interagir conosco.</li>\n</ul>\n<h4><strong>1.2. Informa&ccedil;&otilde;es Coletadas Automaticamente:</strong></h4>\n<ul>\n<li>Endere&ccedil;o IP</li>\n<li>Dados de localiza&ccedil;&atilde;o geogr&aacute;fica (quando autorizado pelo usu&aacute;rio)</li>\n<li>Tipo de dispositivo e navegador utilizado</li>\n<li>Hist&oacute;rico de navega&ccedil;&atilde;o e intera&ccedil;&atilde;o no site</li>\n<li>Cookies e tecnologias semelhantes (ver Se&ccedil;&atilde;o 6 para mais detalhes).</li>\n</ul>\n<h3><strong>2. Como Utilizamos as Suas Informa&ccedil;&otilde;es</strong></h3>\n<p>Utilizamos as informa&ccedil;&otilde;es coletadas para os seguintes fins:</p>\n<ul>\n<li>Fornecer, operar e melhorar os nossos servi&ccedil;os;</li>\n<li>Personalizar a sua experi&ecirc;ncia no site;</li>\n<li>Processar pedidos, pagamentos e transa&ccedil;&otilde;es realizadas pelo usu&aacute;rio;</li>\n<li>Comunicar informa&ccedil;&otilde;es importantes, como atualiza&ccedil;&otilde;es nos servi&ccedil;os e pol&iacute;ticas;</li>\n<li>Responder a consultas, pedidos de suporte ou outras intera&ccedil;&otilde;es do usu&aacute;rio;</li>\n<li>Cumprir obriga&ccedil;&otilde;es legais e regulat&oacute;rias.</li>\n</ul>\n<h3><strong>3. Compartilhamento de Informa&ccedil;&otilde;es com Terceiros</strong></h3>\n<p>Podemos compartilhar as suas informa&ccedil;&otilde;es com terceiros apenas nas seguintes situa&ccedil;&otilde;es:</p>\n<ul>\n<li><strong>Provedores de servi&ccedil;os:</strong> Empresas que fornecem servi&ccedil;os em nosso nome, como hospedagem, processamento de pagamentos ou an&aacute;lise de dados.</li>\n<li><strong>Requisitos legais:</strong> Quando exigido por lei ou para proteger os nossos direitos, seguran&ccedil;a e propriedade.</li>\n<li><strong>Consentimento:</strong> Quando voc&ecirc; nos autorizar explicitamente a compartilhar as suas informa&ccedil;&otilde;es.</li>\n</ul>\n<h3><strong>4. Reten&ccedil;&atilde;o de Dados</strong></h3>\n<p>Reteremos as suas informa&ccedil;&otilde;es pessoais apenas pelo tempo necess&aacute;rio para cumprir os fins descritos nesta pol&iacute;tica, salvo exig&ecirc;ncia legal ou regulat&oacute;ria em contr&aacute;rio.</p>\n<h3><strong>5. Seus Direitos</strong></h3>\n<p>Voc&ecirc; tem os seguintes direitos em rela&ccedil;&atilde;o &agrave;s suas informa&ccedil;&otilde;es pessoais:</p>\n<ul>\n<li>Acessar as informa&ccedil;&otilde;es que mantemos sobre voc&ecirc;;</li>\n<li>Solicitar a corre&ccedil;&atilde;o ou atualiza&ccedil;&atilde;o das suas informa&ccedil;&otilde;es;</li>\n<li>Solicitar a exclus&atilde;o das suas informa&ccedil;&otilde;es (salvo quando houver obriga&ccedil;&atilde;o legal de reten&ccedil;&atilde;o);</li>\n<li>Opor-se ao uso de suas informa&ccedil;&otilde;es para certos fins;</li>\n<li>Solicitar a transfer&ecirc;ncia de suas informa&ccedil;&otilde;es para outra organiza&ccedil;&atilde;o.</li>\n</ul>\n<p>Para exercer esses direitos, entre em contato conosco utilizando as informa&ccedil;&otilde;es de contato fornecidas abaixo.</p>\n<h3><strong>6. Cookies e Tecnologias Semelhantes</strong></h3>\n<p>Utilizamos cookies e tecnologias semelhantes para:</p>\n<ul>\n<li>Melhorar a funcionalidade do site;</li>\n<li>Analisar o tr&aacute;fego e comportamento dos usu&aacute;rios;</li>\n<li>Personalizar conte&uacute;do e publicidade.</li>\n</ul>\n<p>Voc&ecirc; pode controlar o uso de cookies por meio das configura&ccedil;&otilde;es do seu navegador.</p>\n<h3><strong>7. Seguran&ccedil;a das Informa&ccedil;&otilde;es</strong></h3>\n<p>Implementamos medidas de seguran&ccedil;a t&eacute;cnicas e organizacionais para proteger as suas informa&ccedil;&otilde;es pessoais contra acesso, uso ou divulga&ccedil;&atilde;o n&atilde;o autorizados. No entanto, nenhuma transmiss&atilde;o ou armazenamento de dados &eacute; completamente seguro, e n&atilde;o podemos garantir a seguran&ccedil;a absoluta.</p>\n<h3><strong>8. Altera&ccedil;&otilde;es a Esta Pol&iacute;tica</strong></h3>\n<p>Reservamo-nos o direito de atualizar esta Pol&iacute;tica de Privacidade a qualquer momento. Notificaremos sobre mudan&ccedil;as significativas atrav&eacute;s do nosso site ou outros meios adequados. Recomendamos que revise esta pol&iacute;tica periodicamente.</p>\n<h3><strong>9. Contato</strong></h3>\n<p>Se tiver alguma d&uacute;vida ou solicita&ccedil;&atilde;o relacionada a esta Pol&iacute;tica de Privacidade, entre em contato conosco:</p>\n<ul>\n<li><strong>E-mail:</strong> <a href=\"mailto:suporte@exemplo.com\">suporte@exemplo.com</a></li>\n<li><strong>Telefone:</strong> +351 123 456 789</li>\n<li><strong>Endere&ccedil;o:</strong> Rua Exemplo, 123, 1000-000 Lisboa, Portugal</li>\n</ul>','2025-01-09 21:29:49','2025-01-09 21:29:49'),(78,'pages','body',7,'en','<p>Bem-vindo ao nosso website. Ao acessar e utilizar os nossos servi&ccedil;os, voc&ecirc; concorda em cumprir os seguintes Termos e Condi&ccedil;&otilde;es. Caso n&atilde;o concorde com qualquer parte destes termos, pedimos que n&atilde;o utilize o nosso website.</p>\n<h3><strong>1. Defini&ccedil;&otilde;es</strong></h3>\n<ul>\n<li><strong>\"Servi&ccedil;os\":</strong> Refere-se aos servi&ccedil;os disponibilizados por n&oacute;s, incluindo o uso deste website e produtos relacionados.</li>\n<li><strong>\"Usu&aacute;rio\":</strong> Qualquer pessoa que acesse ou utilize os nossos servi&ccedil;os.</li>\n<li><strong>\"N&oacute;s\" ou \"Nosso\":</strong> Refere-se &agrave; empresa propriet&aacute;ria deste website e dos servi&ccedil;os oferecidos.</li>\n</ul>\n<h3><strong>2. Uso do Website</strong></h3>\n<p>2.1. O uso deste website &eacute; permitido apenas para maiores de 18 anos ou menores acompanhados de respons&aacute;veis legais.</p>\n<p>2.2. Voc&ecirc; concorda em utilizar o website apenas para fins legais e de acordo com estes Termos e Condi&ccedil;&otilde;es.</p>\n<p>2.3. &Eacute; proibido:</p>\n<ul>\n<li>Realizar atividades que possam comprometer a seguran&ccedil;a ou funcionamento do website;</li>\n<li>Utilizar o website para prop&oacute;sitos fraudulentos ou para distribuir conte&uacute;do ilegal;</li>\n<li>Modificar, copiar ou distribuir conte&uacute;do do website sem nossa autoriza&ccedil;&atilde;o.</li>\n</ul>\n<h3><strong>3. Conta do Usu&aacute;rio</strong></h3>\n<p>3.1. Para acessar certos servi&ccedil;os, pode ser necess&aacute;rio criar uma conta. Voc&ecirc; &eacute; respons&aacute;vel por manter a confidencialidade das informa&ccedil;&otilde;es da sua conta e por todas as atividades realizadas na mesma.</p>\n<p>3.2. Reservamo-nos o direito de suspender ou encerrar contas que violem estes Termos e Condi&ccedil;&otilde;es.</p>\n<h3><strong>4. Propriedade Intelectual</strong></h3>\n<p>4.1. Todo o conte&uacute;do do website, incluindo textos, gr&aacute;ficos, logotipos, &eacute; propriedade nossa ou de nossos licenciadores e est&aacute; protegido por leis de direitos autorais.</p>\n<p>4.2. Voc&ecirc; n&atilde;o tem permiss&atilde;o para reproduzir, distribuir ou criar trabalhos derivados do conte&uacute;do do website sem consentimento pr&eacute;vio.</p>\n<h3><strong>5. Limita&ccedil;&atilde;o de Responsabilidade</strong></h3>\n<p>5.1. O website &eacute; fornecido \"como est&aacute;\". N&atilde;o garantimos que os servi&ccedil;os estar&atilde;o livres de erros ou interrup&ccedil;&otilde;es.</p>\n<p>5.2. Em nenhuma circunst&acirc;ncia seremos respons&aacute;veis por danos indiretos, incidentais ou consequentes decorrentes do uso ou incapacidade de uso do website.</p>\n<h3><strong>6. Modifica&ccedil;&otilde;es nos Termos</strong></h3>\n<p>6.1. Reservamo-nos o direito de atualizar ou modificar estes Termos e Condi&ccedil;&otilde;es a qualquer momento. As altera&ccedil;&otilde;es entrar&atilde;o em vigor imediatamente ap&oacute;s a publica&ccedil;&atilde;o no website.</p>\n<p>6.2. &Eacute; sua responsabilidade revisar periodicamente os Termos e Condi&ccedil;&otilde;es para se manter informado sobre as mudan&ccedil;as.</p>\n<h3><strong>7. Legisla&ccedil;&atilde;o Aplic&aacute;vel</strong></h3>\n<p>Estes Termos e Condi&ccedil;&otilde;es s&atilde;o regidos pelas leis de Portugal. Qualquer disputa ser&aacute; resolvida nos tribunais competentes do pa&iacute;s.</p>\n<h3><strong>8. Contato</strong></h3>\n<p>Para quest&otilde;es ou d&uacute;vidas sobre estes Termos e Condi&ccedil;&otilde;es, entre em contato conosco:</p>\n<ul>\n<li><strong>E-mail:</strong> <a href=\"mailto:suporte@exemplo.com\">suporte@exemplo.com</a></li>\n<li><strong>Telefone:</strong> +351 123 456 789</li>\n<li><strong>Endere&ccedil;o:</strong> Rua Exemplo, 123, 1000-000 Lisboa, Portugal</li>\n</ul>','2025-01-09 21:29:58','2025-01-09 21:29:58');
/*!40000 ALTER TABLE `translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_roles`
--

DROP TABLE IF EXISTS `user_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_roles` (
  `user_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `user_roles_user_id_index` (`user_id`),
  KEY `user_roles_role_id_index` (`role_id`),
  CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_roles`
--

LOCK TABLES `user_roles` WRITE;
/*!40000 ALTER TABLE `user_roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `role_id` bigint unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'users/default.png',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `settings` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_foreign` (`role_id`),
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,1,'Admin','admin@admin.com','users/default.png',NULL,'$2y$10$UOvDhKpHxwSZlmxC1fdvfOHMz7RALGsM1M.fnxZcI2xp9jXBHhRwa','GxXdIzYlK8SjUuXaeljCk9AfF7zR9ekH6Lg274dEah4C6G7wiNQNNWPEBE4Y',NULL,'2025-01-09 16:38:23','2025-01-09 16:38:23'),(2,1,'Pedro','pedro@admin.com','users/default.png',NULL,'$2y$10$SuuCckyi6JvNO5QHUw0PluT9svUyH0AwLpsucSi5lntowZDzA8kTi',NULL,NULL,'2025-01-09 16:39:13','2025-01-09 16:39:13');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-01-10  8:27:05
