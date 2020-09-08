<?php

namespace App\Bootstrap;

use danog\MadelineProto\API;
use Illuminate\Container\Container;
use ZnCore\Base\Legacy\Yii\Helpers\FileHelper;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Component\Console\Application;

class Kernel
{

    private $container;

    public function init()
    {
        $this->container = Container::getInstance();
        $this->bindContainer($this->container);
    }

    private function bindContainer(Container $container) {
        $container->bind(Application::class, Application::class, true);
        $this->bindApi($container);
        $container->bind(\ZnSandbox\Telegram\Services\ResponseService::class, \ZnSandbox\Telegram\Services\ResponseService::class, true);
        $container->bind(\ZnSandbox\Telegram\Services\StateService::class, \ZnSandbox\Telegram\Services\StateService::class, true);
        $container->bind(\ZnSandbox\Telegram\Services\UserService::class, \ZnSandbox\Telegram\Services\UserService::class, true);
        $container->bind(\App\Dialog\Domain\Interfaces\Repositories\TagRepositoryInterface::class, \App\Dialog\Domain\Repositories\Eloquent\TagRepository::class);
        $container->bind(\App\Dialog\Domain\Interfaces\Repositories\AnswerRepositoryInterface::class, \App\Dialog\Domain\Repositories\Eloquent\AnswerRepository::class);
        $container->bind(\App\Dialog\Domain\Interfaces\Repositories\AnswerTagRepositoryInterface::class, \App\Dialog\Domain\Repositories\Eloquent\AnswerTagRepository::class);
        $container->bind(\App\Dialog\Domain\Interfaces\Repositories\AnswerOptionRepositoryInterface::class, \App\Dialog\Domain\Repositories\Eloquent\AnswerOptionRepository::class);
        $container->bind(\MyBundles\Top\Domain\Interfaces\Repositories\ShopRepositoryInterface::class, \MyBundles\Top\Domain\Repositories\Eloquent\ShopRepository::class);
        $container->bind(FilesystemAdapter::class, function () {
            return new FilesystemAdapter('app', \ZnCore\Base\Enums\Measure\TimeEnum::SECOND_PER_HOUR, $_ENV['CACHE_DIRECTORY']);
        }, true);
    }

    private function bindApi(Container $container) {
        $callback = function (): API {
            $sessionName = $_ENV['APP_ENV'] . '/session/madeline';
            FileHelper::createDirectory(__DIR__ . '/../../var/' . $_ENV['APP_ENV'] . '/session');
            $sessionFileName = __DIR__ . '/../../var/' . $sessionName;
            $sessionFileName = FileHelper::normalizePath($sessionFileName);
            $settings = include(__DIR__ . '/../../config/main.php');
            $api = new API($sessionFileName, $settings);
            $api->start();
            return $api;
        };
        $container->bind(API::class, $callback, true);
    }

}
