<?php
use Doctrine\ORM\Tools\Console\ConsoleRunner;

// replace with file to your own project bootstrap
require_once '../public/bootstrap.php';

// replace with mechanism to retrieve EntityManager in your app
// How "EntityManager static class" was load in (bootstrap.php), I don't need the line 9
//$entityManager = GetEntityManager();

return ConsoleRunner::createHelperSet($entityManager);
