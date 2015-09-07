<?php

namespace Jobsoc\ServiceProvider;

use Doctrine\ORM\Configuration;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\Driver\PHPDriver;
use Doctrine\ORM\Tools\Setup;
use League\Container\ServiceProvider;
use Doctrine\ORM\EntityManagerInterface;

class DoctrineProvider extends ServiceProvider
{
    protected $provides = [
        'db',
        EntityManagerInterface::class
    ];

    public function register()
    {
        $db_config = $this->getContainer()['app']->getConfig('database');

        $this->getContainer()->singleton('db', function() use ($db_config) {
            $isDevMode = true;

            if ($isDevMode) {
                $cache = new \Doctrine\Common\Cache\ArrayCache;
            } else {
                $redis = new \Redis();
                $redis->connect('127.0.0.1');
                $cache = new \Doctrine\Common\Cache\RedisCache();
                $cache->setRedis($redis);
            }

            $config = new Configuration;
            $config->setMetadataCacheImpl($cache);
            $driver = new PHPDriver(APP_DIR.'/config/doctrine/mapping');
            $config->setMetadataDriverImpl($driver);
            $config->setQueryCacheImpl($cache);
            $config->setProxyDir(APP_DIR.'/src/Proxy');
            $config->setProxyNamespace('Jobsoc\Proxy');


            if ($isDevMode) {
                $config->setAutoGenerateProxyClasses(true);
            } else {
                $config->setAutoGenerateProxyClasses(false);
            }

            // obtaining the entity manager
            return EntityManager::create($db_config['connection'], $config);
        });


        $this->getContainer()->singleton(
            EntityManagerInterface::class,
            $this->getContainer()['db']
        );
    }
}
