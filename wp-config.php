<?php
define( 'WP_CACHE', true );
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'u299060877_Wp9gs' );

/** Database username */
define( 'DB_USER', 'u299060877_ySglc' );

/** Database password */
define( 'DB_PASSWORD', '6QQ8vMyiL2' );

/** Database hostname */
define( 'DB_HOST', '127.0.0.1' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          'uq%5acR`Wv>gAdd)dBNGg62_Gr]wcNS(bhyLy^}][2ZwPn#lrlavUIWT/d$FtkGk' );
define( 'SECURE_AUTH_KEY',   'qc!Q4.`}Du`Uc?4(~y~=z=1H^B9-I~~Rn}corVrgqRs0L-R,XIA6N%*b/{xa4TqK' );
define( 'LOGGED_IN_KEY',     '=-x&GaX1wq^d~|?sWlahcNX6^WX)7BJP4-`6IKVID5rqsN)62:(,0?(hy%25aAxM' );
define( 'NONCE_KEY',         'v+%tM K^I~i(aYtnnms+%w{PNIH,cp{@yz,fB]^sK-;-zWY7=W+@|V3B3(W{MGi7' );
define( 'AUTH_SALT',         'egzMzmh.p|*Sn7c?E .9_2Ue/k]S/%I$e[%jor_E#}Qsyn)4tL1x?Y,t OWdo7//' );
define( 'SECURE_AUTH_SALT',  'j88wRA3exW5vE}!y~;wF105wNjm(Lqq<SSu0Hf$@v~wIm+jY0;5FJX7JnT~S#}U7' );
define( 'LOGGED_IN_SALT',    ',eX7sR|bjiIgOR~EcFI>R1 d5[+ yD=^IoW;EVGbXQd+#Nn&3.I6v,?O$Z_Q@!f^' );
define( 'NONCE_SALT',        'U}^FR_lq,vI1=`oO2+F5u-{sK]->QJIf0&lLAm]kJImsr%&SGDhRdn&E}%m1q- ;' );
define( 'WP_CACHE_KEY_SALT', '=)0+pY~]6bv#>p/ej8f5P=e=C8fi+-~H3+Q]5BfmZPS+GA$QsKszDm5FE+H`Y#K-' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define('WP_HOME', 'https://biotane.com.br');
define('WP_SITEURL', 'https://biotane.com.br');

define( 'FS_METHOD', 'direct' );
define( 'WP_AUTO_UPDATE_CORE', 'minor' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
