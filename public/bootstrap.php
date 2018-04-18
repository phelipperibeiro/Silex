<?php

//php -S localhost:8888 -t public/ # servidor embutido

// # testing  doctrine is console 
// the command is (php bin/doctrine)
// create cli-config.php file inside bin folder
// to execute the doctrine in bash, you must be in the same folder where the cli-config.php file is (usually inside bin folder)

require_once(__DIR__ . '/../vendor/autoload.php');

#########################################Doctrine#####################################

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Events;
use Doctrine\ORM\Configuration;
//use Doctrine\Common\EventManager as EventManager;
use Doctrine\Common\EventManager;
use Doctrine\Common\Cache\ArrayCache as Cache;
use Doctrine\Common\Annotations\AnnotationRegistry;
use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\ClassLoader;

$cache = new Doctrine\Common\Cache\ArrayCache;
$annotationReader = new Doctrine\Common\Annotations\AnnotationReader;

$cachedAnnotationReader = new Doctrine\Common\Annotations\CachedReader(
        $annotationReader, // use reader
        $cache // and a cache driver
);

$annotationDrive = new Doctrine\ORM\Mapping\Driver\AnnotationDriver(
        $cachedAnnotationReader,  // our cached annotation reader
        array(__DIR__ . DIRECTORY_SEPARATOR . '../src')
);

$driveChain = new Doctrine\ORM\Mapping\Driver\DriverChain(); 
$driveChain->addDriver($annotationDrive, "Code"); // register our main namespace 


$config = new Doctrine\ORM\Configuration();
$config->setProxyDir("/tmp"); // where is our proxy dir
$config->setProxyNamespace("Proxy"); //
$config->setAutoGenerateProxyClasses(true); // this can be based on production config

// register meta data driver
$config->setMetadataDriverImpl($driveChain);
//use our allready initialized cache driver
$config->setMetadataCacheImpl($cache);
$config->setQueryCacheImpl($cache);

$pathAnnotationRegistry = __DIR__ . DIRECTORY_SEPARATOR . '../vendor' . DIRECTORY_SEPARATOR . 'doctrine' . DIRECTORY_SEPARATOR . 'orm' .
        DIRECTORY_SEPARATOR . 'lib' . DIRECTORY_SEPARATOR . 'Doctrine' . DIRECTORY_SEPARATOR . 'ORM' .
        DIRECTORY_SEPARATOR . 'Mapping' . DIRECTORY_SEPARATOR . 'Driver' .
        DIRECTORY_SEPARATOR . 'DoctrineAnnotations.php';


AnnotationRegistry::registerFile($pathAnnotationRegistry);

$eventManager = new Doctrine\Common\EventManager();
    
// here is where doctrine manages all tables
$entityManager = EntityManager::Create(array(
            'driver' => 'pdo_mysql',
            'host' => 'localhost',
            'port' => '3306',
            'user' => 'root',
            'password' => '2345678',
            'dbname' => 'doctrine_db'), $config, $eventManager);



#########################################Doctrine#####################################


$app = new \Silex\Application();

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__ . '/../src/Code/App/Views',
));

$app->register(new Silex\Provider\UrlGeneratorServiceProvider());

$app['debug'] = true;



