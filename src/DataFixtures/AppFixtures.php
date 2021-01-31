<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    /**
     * @var UserPasswordEncoderInterface
     */
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public  function load(ObjectManager $manager)
    {
        $this->loadUsers($manager);
    }

    public  function loadUsers(ObjectManager $manager)
    {
        $user = new User();
        $user->setName('gggggg');
        $user->setEmail('ggg@gmail.com');
        $user->setUsername('azzeddine');
        $password = $this->passwordEncoder->encodePassword($user, 'azertyuiop');
        $user->setPassword($password);

        $this->addReference('user_admin', $user);
        $manager->persist($user);
        $manager->flush();
    }
}