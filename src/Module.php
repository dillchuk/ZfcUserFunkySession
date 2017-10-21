<?php

namespace ZfcUserFunkySession;

use Zend\Mvc\MvcEvent;

class Module {

    public function onBootstrap(MvcEvent $event) {
        try {
            $authService = $event->getApplication()
            ->getServiceManager()->get('zfcuser_auth_service');
            if (!$authService) {
                return;
            }
            if ($authService->hasIdentity() && !$authService->getIdentity()) {
                $authService->clearIdentity();
            }
        } catch (\Exception $exception) {

        }
    }

}
