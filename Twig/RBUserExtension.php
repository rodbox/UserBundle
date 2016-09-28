<?php
namespace RB\UserBundle\Twig;

use Symfony\Component\DependencyInjection\ContainerInterface;

class RBUserExtension  extends \Twig_Extension{
    public function __construct($container, $twig, $session)
    {
        $this->container = $container;
        $this->twig      = $twig;
        $this->session   = $session;
    }



    public function userImg($id= '1', $format = 'C')
    {
        $img  = 'log.jpg';
        echo $this->twig->render('RBUserBundle:Img:img-'.$format.'.html.twig',['id'=>$id, 'img'=>$img]);
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
            new \Twig_SimpleFunction("myImg", [$this, 'myImg'], ['is_safe' => ['html']]),
        );
    }
}

?>