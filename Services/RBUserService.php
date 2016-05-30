<?php
namespace RB\UserBundle\Services;

use Symfony\Component\DependencyInjection\ContainerInterface;

class RBUserService {

    public function __construct($container, $session, $router)
    {
        $this->container = $container;
        $this->router    = $router;
        $this->session    = $session;
    }


    public function autologin($user, $route='fos_user_registration_confirmed')
    {
        $firewallName = $this->container->getParameter('fos_user.firewall_name');

        $token = new UsernamePasswordToken($user, $user->getPassword(), $firewallName, $user->getRoles());
        $this->get('security.context')->setToken($token);
        $request->getSession()->set('_security_main', serialize($token));
        $url = $this->router->generateUrl($route);
        $response = new RedirectResponse($url);

        return $response;
    }
}

?>