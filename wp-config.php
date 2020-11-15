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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'vlog_db' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         ')Z7zr>lRHo89i,[5%6RT&Jl:%3%a; h8u(cBy}^mgd$KB8WEp-&ib_w.F9*eZs!|' );
define( 'SECURE_AUTH_KEY',  'H5nPF&u7ovJp/v6CoTj(0z}BKtsn?d0]01dr}GdSG#$;5hJ)H!x!)az%F*tD<K*8' );
define( 'LOGGED_IN_KEY',    'Zy!LyqAp{%f,H#zt01Ew}W]``FBRCbt[?FWki#f<]|_ ]{K$H~|Al& [*{;w#-A.' );
define( 'NONCE_KEY',        '_S8<0WWP!g]JF3Y@n?#p/hM?}37L7>-Ug=4LPwVfZfxpuMhn8tH43A:hVZ/});lz' );
define( 'AUTH_SALT',        'M276NO#Y)6(f#*8%:&#l. i*Hd5(V~dy[Vx#gd/]pk$OH`u{cN&B/BBc,C_O}dR ' );
define( 'SECURE_AUTH_SALT', '`AzLO=/zV7haPu_+X6l6EDgzyIo5QvbrW>xopDmr4-+_rc$s/iVN~,@_OuiX7Nq<' );
define( 'LOGGED_IN_SALT',   '=lhPR=W7(a8Xp.ob,<L;oZVb~&nq@ud{`#6(DBH0*XB.~[#DQLr/C6W|.Q:]XU!V' );
define( 'NONCE_SALT',       'gPW[:[@=hJUXk_@hpAG{8-d$<*UR+Wwl-0ydV2r3=r0-KFOreAX.L.CabZY,;H ^' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
