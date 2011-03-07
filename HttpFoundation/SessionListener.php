<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Bundle\FrameworkBundle\HttpFoundation;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\HttpKernelInterface;
use Symfony\Component\HttpKernel\Event\RequestEventArgs;

/**
 * SessionListener.
 *
 * Saves session in test environment.
 *
 * @author Bulat Shakirzyanov <mallluhuct@gmail.com>
 */
class SessionListener
{
    /**
     * Checks if session was initialized and saves if current request is master
     * Runs on 'filterCoreResponse' in test environment
     *
     * @param RequestEventArgs $eventArgs
     */
    public function filterCoreResponse(RequestEventArgs $eventArgs)
    {
        if ($request = $event->getRequest()) {
            if (HttpKernelInterface::MASTER_REQUEST === $event->getRequestType()) {
                if ($session = $request->getSession()) {
                    $session->save();
                }
            }
        }
    }
}
