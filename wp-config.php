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
define('DB_NAME', 'mywp');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         'C[THRNjtW],L/~|x<Rj=S2N m8<I4--Kn7db}AYd^yOx@#4378dr[Ll4Ks&dKB03');
define('SECURE_AUTH_KEY',  '|||^1@[z`v4# ^6q73I!TKD/3*c=8QR2RDI?];vA5Pb6G}cC*8BRRjgP}zLA|.Y@');
define('LOGGED_IN_KEY',    '[O0yZeHkAj33}4 T1[5 nGu6c]*3a8aQ >kk+|&o]Ng@i|%F}sGLJEhnH2be_pQ)');
define('NONCE_KEY',        '@4$I{ D0.o7u0.;rh.}t}>Hiy@$<rf-hf5Y~P?dYP&VOg<9Q!f{D;T(J*BNH-J8Y');
define('AUTH_SALT',        'ueZO}sSVOg,zNAOZaP9+!&0=#}8&%y-glC~5b+4&V])_$G!5ULN|u$/:zd;[64n1');
define('SECURE_AUTH_SALT', 'PPg _M@_Wo7fBar}h)q 6/|@|Ew;)P+#xlq[O|q;>h{;p3Xrs | 3|SS51Hu$Ydu');
define('LOGGED_IN_SALT',   'J!|hX|A|)Z-c~uqBMbt+/{[nR Y#&;A*Z@QVq6dcp_bVhh_$`f+)5l,f#jP-|b4-');
define('NONCE_SALT',       'c rT4yvMBf_[A4Y<zg+)Gj5QF%oURNi-RCRBWc:~;@*Zm|Tb-B&%/D|*K4p)S8`=');

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
