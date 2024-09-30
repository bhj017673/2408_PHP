<?php

define("MY_MARIADB_HOST", "localhost");
define("MY_MARIADB_PORT", "3306");
define("MY_MARIADB_USER", "root");
define("MY_MARIADB_PASSWORD", "php504");
define("MY_MARIADB_NAME", "blog_board");
define("MY_MARIADB_CHARSET", "utf8mb4");
define("MY_MARIADB_DSN", "mysql:host=".MY_MARIADB_HOST.";port=".MY_MARIADB_PORT.";dbname=".MY_MARIADB_NAME.";charset".MY_MARIADB_CHARSET);

define("MY_PATH_ROOT", $_SERVER["DOCUMENT_ROOT"]."/");
define("MY_PATH_DB_BLOG", MY_PATH_ROOT."lib/db_blog.php");
define("MY_PATH_ERROR", MY_PATH_ROOT."error.php");

define("MY_LIST_COUNT",5);
define("MY_PAGE_BUTTON_COUNT", 5);

