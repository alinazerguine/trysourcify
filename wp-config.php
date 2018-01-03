<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'trysourcify');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'xpifyhuzmtnbfutfes0pcc6ildyr5diz3zqshx7wgwg1yroj66sz5xldjeec2yti');
define('SECURE_AUTH_KEY',  'asflshdfhe4pklyzenqiman0aho6qpveemmu9syrjjqvirn0zku3j56idjwyqlmc');
define('LOGGED_IN_KEY',    '80djs4uxmfitm17h6vxgzyfofwsjaeo9feiec6jhkyk0yakxsnfgmdpj1bbga3i8');
define('NONCE_KEY',        'ptur3awqyo1ro5cxos7xr7ztukwrgcxg2l1olkhjiag0h1tl0cn1n523vjd6iaih');
define('AUTH_SALT',        'mlkiwukc18snn9zz0kwxnvltl7jd4wwus9yo2puyrm7o3qsjayzbxp5twvqrfmzj');
define('SECURE_AUTH_SALT', 'hbyulwvd6swoe3yiwrhipuvwhkjrlf55cvpojxfbm9u4zbpmph8cqcyweikpbddk');
define('LOGGED_IN_SALT',   'tqoetpzko4sjyi6pmfjdwj9ewenggfi7pqh2vpyfw0jz5fc15n6kikcblopmf9ms');
define('NONCE_SALT',       'myyti5yjg1nmzizwjmmge3owjhndgxy2jhognknmm4yzyxytgxmgi1mdvlyziwyt');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);
define('FS_METHOD', 'direct');
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
