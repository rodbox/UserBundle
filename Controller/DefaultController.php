<?php

namespace RB\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/auto-login/{loginToken}", name="auto_login")
     */
    public function autoLogin(Request $request, User $user)
    {
         $firewallName = $this->container->getParameter('fos_user.firewall_name');

        $token = new UsernamePasswordToken($user, $user->getPassword(), $firewallName, $user->getRoles());
        $this->get('security.context')->setToken($token);
        $request->getSession()->set('_security_main', serialize($token));
        $url = $this->generateUrl('fos_user_registration_confirmed');
        $response = new RedirectResponse($url);

        return $response;
    }
}
