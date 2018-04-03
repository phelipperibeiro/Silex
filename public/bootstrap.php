<?php

//php -S localhost:8888 -t public/ # servidor embutido

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
        $annotationReader, $cache
);

$annotationDrive = new Doctrine\ORM\Mapping\Driver\AnnotationDriver(
        $cachedAnnotationReader, array(__DIR__ . DIRECTORY_SEPARATOR . '../src')
);

$driveChain = new Doctrine\ORM\Mapping\Driver\DriverChain();
$driveChain->addDriver($annotationDrive, "Code");


$config = new Doctrine\ORM\Configuration();
$config->setProxyDir("/tmp");
$config->setProxyNamespace("Proxy");
$config->setAutoGenerateProxyClasses(true);

$config->setMetadataDriverImpl($driveChain);

$config->setMetadataCacheImpl($cache);
$config->setQueryCacheImpl($cache);

$pathAnnotationRegistry = __DIR__ . DIRECTORY_SEPARATOR . '../vendor' . DIRECTORY_SEPARATOR . 'doctrine' . DIRECTORY_SEPARATOR . 'orm' .
        DIRECTORY_SEPARATOR . 'lib' . DIRECTORY_SEPARATOR . 'Doctrine' . DIRECTORY_SEPARATOR . 'ORM' .
        DIRECTORY_SEPARATOR . 'Mapping' . DIRECTORY_SEPARATOR . 'Driver' .
        DIRECTORY_SEPARATOR . 'DoctrineAnnotations.php';


AnnotationRegistry::registerFile($pathAnnotationRegistry);

$eventManager = new Doctrine\Common\EventManager();

$entityManager = EntityManager::Create(array(
            'driver' => 'pdo_mysql',
            'host' => 'localhost',
            'port' => '3306',
            'user' => 'root',
            'password' => 'root',
            'dbname' => 'doctrine_db'), $config, $eventManager);



#########################################Doctrine#####################################


$app = new \Silex\Application();

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__ . '/../src/Code/App/Views',
));

$app->register(new Silex\Provider\UrlGeneratorServiceProvider());

$app['debug'] = true;



