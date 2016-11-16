<?php
namespace RB\UserBundle\Twig;

use Symfony\Component\DependencyInjection\ContainerInterface;

class RBUserExtension  extends \Twig_Extension{
    public function __construct($container, $twig, $session)
    {
        $this->container = $container;
        $this->twig      = $twig;
        $this->session   = $session;

        $this->dir = $this->container->getParameter('dir_users');
        $this->url = $this->container->getParameter('web_users');
    }



    public function userImg($id= '1', $format = 'C')
    {
        $img  = $this->url.'/'.$id.'/log/log.jpg';
        echo $this->twig->render('RBUserBundle:Img:img.html.twig',['id'=>$id, 'img'=>$img, 'format'=>$format]);
    }


    public function userBG($id= '1', $format = 'C')
    {
        echo $this->url.'/'.$id.'/bg/bg.jpg';
    }



    public function myImg($format = 'C')
    {
        $id = '1';
        $this->userImg($id, $format);
    }



    public function getName(){
        return 'rb_user_extension';
    }



    public function getFunctions(){
        return array(
            new \Twig_SimpleFunction("userImg", [$this, 'userImg'], ['is_safe' => ['html']]),
            new \Twig_SimpleFunction("userBg", [$this, 'userBg'], ['is_safe' => ['html']]),
            new \Twig_SimpleFunction("myImg", [$this, 'myImg'], ['is_safe' => ['html']]),
        );
    }
}

?>