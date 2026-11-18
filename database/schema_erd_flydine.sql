-- ========================================================
-- Tabel: tenants
-- ========================================================
CREATE TABLE `tenants` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tenant_code` varchar(30) NOT NULL,
  `name` varchar(120) NOT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `terminal` varchar(10) DEFAULT NULL,
  `zone` varchar(30) DEFAULT NULL,
  `floor_location` varchar(50) DEFAULT NULL,
  `opening_time` time DEFAULT NULL,
  `closing_time` time DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `pic_name` varchar(100) DEFAULT NULL,
  `pic_email` varchar(150) DEFAULT NULL,
  `pic_phone` varchar(20) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `delivery_fee` decimal(12,2) DEFAULT NULL,
  `contract_start` date DEFAULT NULL,
  `contract_end` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tenants_tenant_code_unique` (`tenant_code`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ========================================================
-- Tabel: customers
-- ========================================================
CREATE TABLE `customers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `phone_number` varchar(20) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `first_order_at` datetime DEFAULT NULL,
  `last_order_at` datetime DEFAULT NULL,
  `total_orders` int(10) unsigned NOT NULL DEFAULT 0,
  `is_blocked` tinyint(1) NOT NULL DEFAULT 0,
  `blocked_reason` text DEFAULT NULL,
  `blocked_at` timestamp NULL DEFAULT NULL,
  `unblocked_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `customers_phone_number_unique` (`phone_number`)
) ENGINE=InnoDB AUTO_INCREMENT=821 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ========================================================
-- Tabel: delivery_locations
-- ========================================================
CREATE TABLE `delivery_locations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `terminal` enum('1','2') NOT NULL,
  `name` varchar(150) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ========================================================
-- Tabel: users
-- ========================================================
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('tenant_staff','admin_ops') NOT NULL DEFAULT 'tenant_staff',
  `tenant_id` bigint(20) unsigned DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `is_blocked` tinyint(1) NOT NULL DEFAULT 0,
  `blocked_reason` text DEFAULT NULL,
  `blocked_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_tenant_id_foreign` (`tenant_id`),
  CONSTRAINT `users_tenant_id_foreign` FOREIGN KEY (`tenant_id`) REFERENCES `tenants` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=121 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ========================================================
-- Tabel: products
-- ========================================================
CREATE TABLE `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tenant_id` bigint(20) unsigned NOT NULL,
  `name` varchar(120) NOT NULL,
  `category` varchar(50) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `customization_options` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`customization_options`)),
  `stock` int(11) NOT NULL DEFAULT 0,
  `price` decimal(12,2) NOT NULL,
  `is_available` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `preparation_time` int(11) NOT NULL DEFAULT 15,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_tenant_id_is_available_index` (`tenant_id`,`is_available`),
  CONSTRAINT `products_tenant_id_foreign` FOREIGN KEY (`tenant_id`) REFERENCES `tenants` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `chk_products_price` CHECK (`price` >= 0)
) ENGINE=InnoDB AUTO_INCREMENT=2947 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ========================================================
-- Tabel: product_variant_groups
-- ========================================================
CREATE TABLE `product_variant_groups` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) unsigned NOT NULL,
  `name` varchar(100) NOT NULL,
  `is_required` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_variant_groups_product_id_foreign` (`product_id`),
  CONSTRAINT `product_variant_groups_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ========================================================
-- Tabel: product_variant_options
-- ========================================================
CREATE TABLE `product_variant_options` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `variant_group_id` bigint(20) unsigned NOT NULL,
  `name` varchar(100) NOT NULL,
  `additional_price` decimal(12,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_variant_options_variant_group_id_foreign` (`variant_group_id`),
  CONSTRAINT `product_variant_options_variant_group_id_foreign` FOREIGN KEY (`variant_group_id`) REFERENCES `product_variant_groups` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ========================================================
-- Tabel: orders
-- ========================================================
CREATE TABLE `orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `order_code` varchar(40) NOT NULL,
  `tenant_id` bigint(20) unsigned DEFAULT NULL,
  `customer_id` bigint(20) unsigned NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `flight_number` varchar(15) DEFAULT NULL,
  `gate` varchar(255) DEFAULT NULL,
  `boarding_time` datetime DEFAULT NULL,
  `notes` varchar(100) DEFAULT NULL,
  `status` enum('menunggu','diproses','siap','selesai','dibatalkan') NOT NULL DEFAULT 'menunggu',
  `payment_method` varchar(255) DEFAULT NULL,
  `is_paid` tinyint(1) NOT NULL DEFAULT 0,
  `pickup_method` enum('ambil_sendiri','diantar') NOT NULL DEFAULT 'ambil_sendiri',
  `heading_to_tenant_at` datetime DEFAULT NULL,
  `ready_at` datetime DEFAULT NULL,
  `auto_cancel_at` datetime NOT NULL,
  `total_amount` decimal(12,2) NOT NULL DEFAULT 0.00,
  `ordered_at` datetime NOT NULL,
  `completed_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `delivery_location_id` bigint(20) unsigned DEFAULT NULL,
  `delivery_fee` decimal(12,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `orders_order_code_unique` (`order_code`),
  KEY `orders_customer_id_foreign` (`customer_id`),
  KEY `orders_tenant_id_status_ordered_at_index` (`tenant_id`,`status`,`ordered_at`),
  KEY `orders_auto_cancel_at_index` (`auto_cancel_at`),
  KEY `orders_ordered_at_index` (`ordered_at`),
  KEY `orders_delivery_location_id_foreign` (`delivery_location_id`),
  KEY `idx_orders_tenant_ordered` (`tenant_id`,`ordered_at`),
  KEY `idx_orders_status_ordered` (`status`,`ordered_at`),
  CONSTRAINT `orders_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `orders_delivery_location_id_foreign` FOREIGN KEY (`delivery_location_id`) REFERENCES `delivery_locations` (`id`) ON DELETE SET NULL,
  CONSTRAINT `orders_tenant_id_foreign` FOREIGN KEY (`tenant_id`) REFERENCES `tenants` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `chk_orders_total_amount` CHECK (`total_amount` >= 0)
) ENGINE=InnoDB AUTO_INCREMENT=773 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ========================================================
-- Tabel: order_items
-- ========================================================
CREATE TABLE `order_items` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) unsigned NOT NULL,
  `product_id` bigint(20) unsigned NOT NULL,
  `product_name_snapshot` varchar(120) NOT NULL,
  `quantity` smallint(5) unsigned NOT NULL,
  `unit_price` decimal(12,2) NOT NULL,
  `subtotal` decimal(12,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `order_items_order_id_foreign` (`order_id`),
  KEY `order_items_product_id_foreign` (`product_id`),
  CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `chk_order_items_quantity` CHECK (`quantity` > 0),
  CONSTRAINT `chk_order_items_unit_price` CHECK (`unit_price` >= 0),
  CONSTRAINT `chk_order_items_subtotal` CHECK (`subtotal` >= 0)
) ENGINE=InnoDB AUTO_INCREMENT=774 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ========================================================
-- Tabel: complaints
-- ========================================================
CREATE TABLE `complaints` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `complaint_code` varchar(40) NOT NULL,
  `order_id` bigint(20) unsigned DEFAULT NULL,
  `reporter_name` varchar(100) NOT NULL,
  `reporter_contact` varchar(50) NOT NULL,
  `category` enum('pesanan_salah','status_tidak_update','lainnya') NOT NULL,
  `description` text NOT NULL,
  `status` enum('open','in_progress','resolved','closed') NOT NULL DEFAULT 'open',
  `handled_by_user_id` bigint(20) unsigned DEFAULT NULL,
  `resolved_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `complaints_complaint_code_unique` (`complaint_code`),
  KEY `complaints_handled_by_user_id_foreign` (`handled_by_user_id`),
  KEY `complaints_status_created_at_index` (`status`,`created_at`),
  KEY `complaints_order_id_foreign` (`order_id`),
  CONSTRAINT `complaints_handled_by_user_id_foreign` FOREIGN KEY (`handled_by_user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `complaints_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ========================================================
-- Tabel: activity_logs
-- ========================================================
CREATE TABLE `activity_logs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `action` varchar(255) NOT NULL,
  `table_name` varchar(255) DEFAULT NULL,
  `record_id` bigint(20) unsigned DEFAULT NULL,
  `description` text DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `activity_logs_user_id_foreign` (`user_id`),
  CONSTRAINT `activity_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=826 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ========================================================
-- Tabel: daily_tenant_summaries
-- ========================================================
CREATE TABLE `daily_tenant_summaries` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `summary_date` date NOT NULL,
  `tenant_id` bigint(20) unsigned NOT NULL,
  `total_orders` int(10) unsigned NOT NULL DEFAULT 0,
  `paid_orders` int(10) unsigned NOT NULL DEFAULT 0,
  `cancelled_orders` int(10) unsigned NOT NULL DEFAULT 0,
  `total_revenue` decimal(14,2) NOT NULL DEFAULT 0.00,
  `ready_orders` int(10) unsigned NOT NULL DEFAULT 0,
  `sla_compliant_orders` int(10) unsigned NOT NULL DEFAULT 0,
  `avg_sla_minutes` decimal(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `daily_tenant_summaries_summary_date_tenant_id_unique` (`summary_date`,`tenant_id`),
  KEY `daily_tenant_summaries_tenant_id_foreign` (`tenant_id`),
  KEY `daily_tenant_summaries_summary_date_index` (`summary_date`),
  CONSTRAINT `daily_tenant_summaries_tenant_id_foreign` FOREIGN KEY (`tenant_id`) REFERENCES `tenants` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

