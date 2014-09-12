<?php
define('DS', DIRECTORY_SEPARATOR);
defined('APPLICATION_PATH') || define('APPLICATION_PATH', realpath(dirname(__FILE__) . DS . '..' . DS . 'application'));
define('EXT', '.php');

require_once APPLICATION_PATH . DS . 'EntityManager' . EXT;
require_once APPLICATION_PATH . DS . 'Repository\AbstractRepository' . EXT;
require_once APPLICATION_PATH . DS . 'Repository\User' . EXT;
require_once APPLICATION_PATH . DS . 'Repository\Post' . EXT;
require_once APPLICATION_PATH . DS . 'Mapper\AbstractMapper' . EXT;
require_once APPLICATION_PATH . DS . 'Mapper\User' . EXT;
require_once APPLICATION_PATH . DS . 'Mapper\Post' . EXT;
require_once APPLICATION_PATH . DS . 'Entity\User' . EXT;
require_once APPLICATION_PATH . DS . 'Entity\Post' . EXT;

if (file_exists('../vendor/autoload.php')) {
    $loader = include '../vendor/autoload.php';
}

//$user = new \Entity\User();
//$user->setFirstName('Max');
//$user->setLastName('Mustermann');
//$user->setGender(\Entity\User::GENDER_MALE);
//$user->setNamePrefix('Prof. Dr');
//
//echo $user->assembleDisplayName();
//$db = new \PDO("mysql:host=msbios.mysql.ukraine.com.ua;dbname=msbios_doctrine", 'msbios_doctrine', 't8wn27yv');
//$result = $db->query('SELECT * FROM users WHERE id = 1')->fetch();
//
//$user = new \Entity\User();
//$user->setId($result['id']);
//$user->setFirstName($result['first_name']);
//$user->setLastName($result['last_name']);
//$user->setGender($result['gender']);
//$user->setNamePrefix($result['name_prefix']);
//
//echo $user->assembleDisplayName();
//$db = new \PDO("mysql:host=msbios.mysql.ukraine.com.ua;dbname=msbios_doctrine", 'msbios_doctrine', 't8wn27yv');
//$data = $db->query('SELECT * FROM users WHERE id = 1')->fetch();
//
//$user = new \Entity\User();
//$mapper = new \Mapper\User();
//
//$mapper->populate($data, $user);
//
//echo $user->assembleDisplayName();
//$entityManager = new EntityManager('msbios.mysql.ukraine.com.ua', 'msbios_doctrine', 'msbios_doctrine', 't8wn27yv');
//
//$user = $entityManager->getUserRepository()->findOneById(1);
//
//echo $user->assembleDisplayName() . '<br />';
//$newUser = new \Entity\User();
//$newUser->setFirstName('Ute');
//$newUser->setLastName('Musermann');
//$newUser->setGender(1);
//
//$entityManager->saveUser($newUser);
//
//echo $newUser->assembleDisplayName();
//$entityManager = new EntityManager('msbios.mysql.ukraine.com.ua', 'msbios_doctrine', 'msbios_doctrine', 't8wn27yv');
//$user = $entityManager->getUserRepository()->findOneById(1);
//echo $user->assembleDisplayName() . '<br />';
//
//$user->setFirstname('Moritz');
//$entityManager->saveUser($user);
//$entityManager = new EntityManager('msbios.mysql.ukraine.com.ua', 'msbios_doctrine', 'msbios_doctrine', 't8wn27yv');
//$user = $entityManager->getUserRepository()->findOneById(1);

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$paths = array(APPLICATION_PATH . DS . "Entity");

$isDevMode = true;

$dbParams = array(
    'host' => 'msbios.mysql.ukraine.com.ua',
    'driver' => 'pdo_mysql',
    'user' => 'msbios_doctrine',
    'password' => 't8wn27yv',
    'dbname' => 'msbios_doctrine'
);

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
$entityManager = EntityManager::create($dbParams, $config);
//$user = $entityManager->getRepository('Entity\User')->findOneById(1);
//
//echo $user->assembleDisplayName() . '<br />';
//$user->setFirstname('Moritz');
//$entityManager->persist($user);
//$entityManager->flush();

$user = $entityManager->getRepository('Entity\User')->findOneById(1);
?>

<h1><?php echo $user->assembleDisplayName(); ?></h1>

<ul>
    <?php foreach ($user->getPosts() as $post): ?>
        <li><?php echo $post->getTitle(); ?></li>
    <?php endforeach; ?>
</ul>