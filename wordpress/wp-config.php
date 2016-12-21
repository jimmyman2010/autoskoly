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
define('DB_NAME', 'autoskoly');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'XJIR*R0`cC,s6&NquP1<H<?H>GSUU*o%?/x=4nCmP1S>,nO4A:%% G@^=+j[s`=$');
define('SECURE_AUTH_KEY',  '%8C[wOfS+d5=gJ/@@%4?Bzp7&|ArH|h<_w7{&SO8sGkT6:kKbIJl=._C_c@TO[*v');
define('LOGGED_IN_KEY',    '::25*M`EFnFBuT6cLP`9ufJh2r>UNZn)%]|?<d{JhC19P9hjpM>H#|rcn?v{`L$L');
define('NONCE_KEY',        '[&cz#l19j,tJ&9-S9+OFi}M^4%RI`,^~Iky#Pkqf//|HI]txgTR4Q*v68,<y/T=z');
define('AUTH_SALT',        '`<wEO>qdF.->6n&L7(.Ka0aW~-kbHD7Hv*BW:Z[=.==KA+ /bi&fOGR^HN;k$5?^');
define('SECURE_AUTH_SALT', 'ZK5FoT0OxH?+N`e7}Kj~@Ucg2,GH_C&oh!&K[Pq#qOyn>UB,yvE/D>m]C9xyzW+T');
define('LOGGED_IN_SALT',   'TaUAI>h+k.%(M_;AW6ypcME>$e`DZ1>-67WqAzjb>58l4!4:O14T/kJ[:08UWNN!');
define('NONCE_SALT',       'P2)M$Y|HD)5L^l.~F)_TQEM02!3/XuSF#P#Vpx:ZcS&|VVyMJ!uB:-z!*zzzY</v');

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

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
