<?php
/**
 * Site configuration, this file is changed by user per site.
 *
 */
 
 
 
 /**
 * Set level of error reporting
 */
error_reporting(-1);
ini_set('display_errors', 1);


/**
 * Set what to show as debug or developer information in the get_debug() theme helper.
 */
$ly->config['debug']['lydia'] = false;
$ly->config['debug']['session'] = false;
$ly->config['debug']['db-num-queries'] = false;
$ly->config['debug']['db-queries'] = false;
$ly->config['debug']['timer'] = false;


 
 /**
 * Define the controllers, their classname and enable/disable them.
 *
 * The array-key is matched against the url, for example: 
* the url 'developer/dump' would instantiate the controller with the key "developer", that is 
* CCDeveloper and call the method "dump" in that class. This process is managed in:
 * $ly->FrontControllerRoute();
 * which is called in the frontcontroller phase from index.php.
 */
$ly->config['controllers'] = array(
  'index'     => array('enabled' => true,'class' => 'CCIndex'),
  'developer' => array('enabled' => true,'class' => 'CCDeveloper'),
  'guestbook' => array('enabled' => true,'class' => 'CCGuestbook'),
  'user'      => array('enabled' => true,'class' => 'CCUser'),
  'acp'       => array('enabled' => true,'class' => 'CCAdminControlPanel'),
  'content'   => array('enabled' => true,'class' => 'CCContent'),
  'blog'      => array('enabled' => true,'class' => 'CCBlog'),
  'page'      => array('enabled' => true,'class' => 'CCPage'),
  'theme'     => array('enabled' => true,'class' => 'CCTheme'),
  'modules'   => array('enabled' => true,'class' => 'CCModules'),
  'my'        => array('enabled' => true,'class' => 'CCMycontroller'),
  'pics'      => array('enabled' => true,'class' => 'CCPics'),

);

/**
 * Define a routing table for urls.
 *
 * Route custom urls to a defined controller/method/arguments
 */
$ly->config['routing'] = array(
  'home' => array('enabled' => true, 'url' => 'index/index'),
);


/**
 * Allow or disallow creation of new user accounts.
 */
$ly->config['create_new_users'] = true;

/**
 * Set database(s).
 */
$ly->config['database'][0]['dsn'] = 'sqlite:' . LYDIA_SITE_PATH . '/data/.ht.sqlite';



/**
 * What type of urls should be used?
 * 
* default      = 0      => index.php/controller/method/arg1/arg2/arg3
 * clean        = 1      => controller/method/arg1/arg2/arg3
 * querystring  = 2      => index.php?q=controller/method/arg1/arg2/arg3
 */
$ly->config['url_type'] = 1;

/**
 * Set a base_url to use another than the default calculated
 */
$ly->config['base_url'] = null;





/**
 * Settings for the theme. The theme may have a parent theme.
 *
 * When a parent theme is used the parent's functions.php will be included before the current
 * theme's functions.php. The parent stylesheet can be included in the current stylesheet
 * by an @import clause. See site/themes/mytheme for an example of a child/parent theme.
 * Template files can reside in the parent or current theme, the CLydia::ThemeEngineRender()
 * looks for the template-file in the current theme first, then it looks in the parent theme.
 *
 * There are two useful theme helpers defined in themes/functions.php.
 *  theme_url($url): Prepends the current theme url to $url to make an absolute url. 
*  theme_parent_url($url): Prepends the parent theme url to $url to make an absolute url. 
*
 * path: Path to current theme, relativly LYDIA_INSTALL_PATH, for example themes/grid or site/themes/mytheme.
 * parent: Path to parent theme, same structure as 'path'. Can be left out or set to null.
 * stylesheet: The stylesheet to include, always part of the current theme, use @import to include the parent stylesheet.
 * template_file: Set the default template file, defaults to default.tpl.php.
 * regions: Array with all regions that the theme supports.
 * data: Array with data that is made available to the template file as variables. 
* 
* The name of the stylesheet is also appended to the data-array, as 'stylesheet' and made 
* available to the template files.
 */
$ly->config['theme'] = array(
  'path'            => 'site/themes/mytheme',
  //'path'            => 'themes/grid',
  'parent'          => 'themes/grid/',
  'stylesheet'      => 'style.css',
  //'stylesheet'      => 'style.php',
  'template_file'   => 'index.tpl.php',
  'regions' => array('flash','featured-first','featured-middle','featured-last',
    'primary','rightbar','leftbar','triptych-first','triptych-middle','triptych-last',
    'footer-column-one','footer-column-two','footer-column-three','footer-column-four',
    'footer',
  ),
  'data' => array(
    'header' => 'Framework',
    'slogan' => 'A PHP-based MVC-inspired CMF',
    'favicon' => 'logo.png',
    'logo' => 'logo.png',
    'logo_width'  => 70,
    'logo_height' => 70,
    'footer' => '<p>Lydia &copy; by Mikael Roos (mos@dbwebb.se)</p>',
    'showMenu' => "true",//Set true or false if menu should be visilble or not
    'menu' => array(
    	    'hem'        => array('text'=>'Start',      'url'=>'index'),
    	    'developer'  => array('text'=>'Developer',  'url'=>'developer'),
    	    'guestbook'  => array('text'=>'Guestbok',   'url'=>'guestbook'),
    	    'page'       => array('text'=>'Artiklar',   'url'=>'page'),
    	    'blog'       => array('text'=>'Blogg',      'url'=>'blog'),
    	    'theme'      => array('text'=>'Themes',     'url'=>'theme'),
    	    'modules'    => array('text'=>'Moduls',     'url'=>'modules'),
    	    'gb'         => array('text'=>'GB',         'url'=>'my/guestbook'),
    	    'Bilder'     => array('text'=>'Bilder',     'url'=>'pics'),
    	    ),
  ),
);



/**
 * How to hash password of new users, choose from: plain, md5salt, md5, sha1salt, sha1.
 */
$ly->config['hashing_algorithm'] = 'sha1salt';


/*
 * Define session name
 */
$ly->config['session_name'] = preg_replace('/[:\.\/-_]/', '', $_SERVER["SERVER_NAME"]);
$ly->config['session_key']  = 'lydia';


/*
 * Define server timezone
 */
$ly->config['timezone'] = 'Europe/Stockholm';

/*
 * Define internal character encoding
 */
$ly->config['character_encoding'] = 'UTF-8';

/*
 * Define language
 */
$ly->config['language'] = 'en';



