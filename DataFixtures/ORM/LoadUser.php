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
        $mail = $this->container->getParameter('mail_business');


        $users = [
            [
                'username' => 'user',
                'email'     => $mail,
                'firstname' => 'John',
                'lastname'  => 'Doe',
                'pw'        => 'aze',
                'roles'     => ['ROLE_SUPER_ADMIN','ROLE_ADMIN'],
                'img'       => 'superadmin.png'
            ],
            [
                'username' => 'simpleuser',
                'email'     => 'simpleuser@rodbox.fr',
                'firstname' => 'Bilbon',
                'lastname'  => 'Sacquet',
                'pw'        => 'aze',
                'roles'     => ['ROLE_USER'],
                'img'       => 'user.png'
            ]
        ];

        foreach ($users as $key => $userData) {
            extract($userData);

            // Create our user and set details
            $user = $userManager->createUser();

            $user->setUsername($username);
            $user->setFirstName($firstname);
            $user->setLastname($lastname);
            $user->setEmail($email);
            $user->setPlainPassword($pw);
            $user->setDateCrea(new \DateTime());
            $user->setDateUpd(new \DateTime());

            //$user->setPassword('3NCRYPT3D-V3R51ON');
            $user->setEnabled(true);
            $user->setRoles($roles);
            $user->setImg($img);
           
            // Update the user
            $userManager->updateUser($user, true);
        }


  }

}