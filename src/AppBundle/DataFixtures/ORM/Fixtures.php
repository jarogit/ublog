<?php
namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\User;
use AppBundle\Entity\Tag;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class Fixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setUsername('admin');
        $encoder = $this->container->get('security.password_encoder');
        $password = $encoder->encodePassword($user, 'admin');
        $user->setPassword($password);
        $manager->persist($user);

        $tag = new Tag();
        $tag->setName('tag1');
        $manager->persist($tag);

        $tag = new Tag();
        $tag->setName('tag2');
        $manager->persist($tag);

        $manager->flush();
    }
}
