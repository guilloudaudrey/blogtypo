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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'admin1');

/** MySQL database password */
define('DB_PASSWORD', 'simplon');

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
define('AUTH_KEY',         '| {l OF9[Xbo,LM|.HI__-5SG5&}nCNHweMDJ~Wo{M!7@R(e!7sa${)`W:a3pow-');
define('SECURE_AUTH_KEY',  '?$UvBcU!p23L$_]rLbizi~$j/m9e[<NJ#9@ _~yX;~~M=vKk,kuEUawR^^lF~0JI');
define('LOGGED_IN_KEY',    'k# 2F4Hz:ElgPy `E9%FkJ2)^ypH_IH)2Ok1PjM#^/QXwm24::`{b*.Ix+W}[a&1');
define('NONCE_KEY',        'bk&j7v1V5v^s,1>&fe~Io5tBzJ$O5`-D0%xrP9SmCdV~u]>RJap`cRL]2JcJ:h8R');
define('AUTH_SALT',        'FVQ]p#D^POGOqy21mg7=LU3;{c&m9aPF-`F=SR6M.X:HDn=b;R)3a,k6O1<X,I? ');
define('SECURE_AUTH_SALT', ')S.mRlk$G8r`>pI?0}aj%Lm3xVR2uU`Tg2GO3`P7S;0M^[kyr;wxg`Nu]Kw{H#[Y');
define('LOGGED_IN_SALT',   'F}fm&:a5QNHtNKWoSW2KU?cn.81#z3+FpT;H<FIaNJ!v+wG<+ VjQ`iS?./_}G:n');
define('NONCE_SALT',       'cLO,?HCD<)zb=4YdqwMqe34rc#T{z=J+x`+;]N)IG~FtFo!_w&^UG Rb2zE@cu!g');

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

define('FS_METHOD', 'direct');

