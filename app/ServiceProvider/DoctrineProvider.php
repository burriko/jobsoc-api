<?php

namespace Jobsoc\ServiceProvider;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\Driver\PHPDriver;
use Doctrine\ORM\Tools\Setup;
use League\Container\ServiceProvider;

class DoctrineProvider extends ServiceProvider
{
    protected $provides = [
        'db'
    ];

    public function register()
    {
        $db_config = $this->getContainer()['app']->getConfig('database');

        $this->getContainer()->singleton('db', function() use ($db_config) {
            // Create a simple "default" Doctrine ORM configuration for Annotations
            $isDevMode = true;
            $config = Setup::createAnnotationMetadataConfiguration([APP_DIR.'/Entity'], $isDevMode);

            $driver = new PHPDriver(APP_DIR.'/config/doctrine/mapping');
            $config = Setup::createConfiguration($isDevMode);
            $config->setMetadataDriverImpl($driver);

            // obtaining the entity manager
            return EntityManager::create($db_config['connection'], $config);
        });
    }
}