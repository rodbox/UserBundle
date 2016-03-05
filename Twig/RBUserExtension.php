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
            "rb_user_img" => new \Twig_Function_Method($this, 'userImg',            ['is_safe' => ['html']]),
            "rb_my_img"   => new \Twig_Function_Method($this, 'myImg',            ['is_safe' => ['html']]),
        );
    }
}

?>