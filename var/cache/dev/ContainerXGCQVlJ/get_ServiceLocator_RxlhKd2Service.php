<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private '.service_locator.rxlhKd2' shared service.

return $this->privates['.service_locator.rxlhKd2'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
    'stateRepository' => ['privates', 'App\\Repository\\StateRepository', 'getStateRepositoryService.php', true],
], [
    'stateRepository' => 'App\\Repository\\StateRepository',
]);
