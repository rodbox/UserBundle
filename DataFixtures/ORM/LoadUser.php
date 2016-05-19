<?php
namespace RB\UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

use RB\UserBundle\Entity\User;

class LoadUser implements FixtureInterface, ContainerAwareInterface
{

    /**
     * @var ContainerInterface
     */
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

  public function load(ObjectManager $em){

        // Get our userManager, you must implement `ContainerAwareInterface`
        $userManager = $this->container->get('fos_user.user_manager');

        // Create our user and set details
        $user = $userManager->createUser();

        $user->setUsername('rodolphe');
        $user->setUserFirstName('Rodolphe');
        $user->setEmail('jacquemin.rodolphe@hotmail.fr');
        $user->setUserLastname('Jacquemin');
        $user->setUserFirstname('Rodolphe');
        $user->setUserDateCrea(new \DateTime());
        $user->setUserDateUpd(new \DateTime());

        $user->setPlainPassword('aze');
        //$user->setPassword('3NCRYPT3D-V3R51ON');
        $user->setEnabled(true);
        $user->setRoles(array('ROLE_ADMIN','ROLE_SUPER_ADMIN'));

        // Update the user
        $userManager->updateUser($user, true);

  }

}