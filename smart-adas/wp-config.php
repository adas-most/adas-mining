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
define('DB_NAME', 'u825104560_ygade');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'mysqlmysql');

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
define('AUTH_KEY',         't0yJShOnhKjhf5fXxoaZUjHRlgUEIhxrFcI1FrTp6N0czzhZr8F0ZaWl6j9GnSvk');
define('SECURE_AUTH_KEY',  'mo0c2IZ82bHy7963lkrDK2e3PJAPYgEPXrlIPmrahrAzdQI57RBL8KABILuxHCWu');
define('LOGGED_IN_KEY',    'Ys7oVYoFtmiJzBZJoWKA1ArIYZy1enbwzUR9IcnRtEpPjdkuSJtxePhVvd7G9FOD');
define('NONCE_KEY',        'EDr8AE4EZtoDzFaDxHseoYom4tSeDcarIhntrlAlSydbySCLxFIfXOtoe2twGiFu');
define('AUTH_SALT',        '1ofMCyZNu4HWVAguNPZwIiDQ9UgF7RuGv75M8VSVviISOSLBnroMrT1k7805Iwq9');
define('SECURE_AUTH_SALT', 'ldniFXdXpMTjAk7kZEYDBPMt33liyx6S74w9ir1Z1bFaUdtGUwWLbuAvUFBLIcR3');
define('LOGGED_IN_SALT',   'LsKfVKHgxtTg9BejdxAdK94bLysf6Jv5yjy2dUsShC5DrrvzqSon6VjFrr6j2C8s');
define('NONCE_SALT',       'ZycmNCr51fk8roWqyXdAwayacbLasdxk2BBs4aIYLrEr2ZCTJjPt929leEesQVLd');

/**
 * Other customizations.
 */
define('FS_METHOD','direct');define('FS_CHMOD_DIR',0755);define('FS_CHMOD_FILE',0644);
define('WP_TEMP_DIR',dirname(__FILE__).'/wp-content/uploads');

/**
 * Turn off automatic updates since these are managed upstream.
 */
define('AUTOMATIC_UPDATER_DISABLED', true);


/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'nb1x_';

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

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
