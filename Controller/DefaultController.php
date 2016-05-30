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
        $route = 'fos_user_registration_confirmed';
        /* SERVICE : rb_user.services */
        return $this->get('rb_user.services')->autologin($user, $route);
        /* END SERVICE :  rb_user.services */
    }
}
