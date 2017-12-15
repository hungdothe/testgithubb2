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
define('DB_NAME', 'webdemo');

/** MySQL database username */
define('DB_USER', 'webdemo');

/** MySQL database password */
define('DB_PASSWORD', '0123Hung');

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
define('AUTH_KEY',         'g4y^K`Q]P#:keblB PE.ag^C;>},Z(.Y>Q6_7D*Jb#lhezKi3pM{6>;CTO)XEl?:');
define('SECURE_AUTH_KEY',  'c4%x4/^j Xa*KDEJrr^a}7<GvSue(#cEp%#d!>*U4&l q|eVJe9A=3YiW*8sJ{E#');
define('LOGGED_IN_KEY',    'CsK _=t$Qq|T3hh264]x&:10J-~M~w??jhd,_td*ga3FDs<CrA:tCE+~;][jm3L8');
define('NONCE_KEY',        '4:B]H*U{Sz*6k-olB-ru4Sss*71<V/Q2.:-2aHNq&Qj,,p5o%,)OxcR?SE3QYckJ');
define('AUTH_SALT',        '7GjLIC(rk`zsHb77*G]!9yrph_[kQ]`YB0sOk!~C #aAki[]Mr:HTULA2PwL)>X#');
define('SECURE_AUTH_SALT', 's7WIUVbKy+^9JZt8?C;AMa79q%g;6 muF|!Wf`I: 1CG%$|thyce;MZ)^l??5eNA');
define('LOGGED_IN_SALT',   'G?R?|r:QjZyok)>Kq}u|YX>hPtih%IWAPyqo(-US#aZ1|y)b]_[[?o/X(d?CBiCM');
define('NONCE_SALT',       '(ahEk$Y~3bF@_s}|}N,eF:{N$57+@J/|i_7`.eICl;Rzw1%38?/b+)udKb^^`t@H');

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
