<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\User;
use App\Entity\Phone;
use App\Entity\Company;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $brands = ['iPhone', 'Samsung', 'Xiaomi', 'Huawei', 'Sony'];
    private $colors = ['black', 'white', 'red', 'pink', 'gray'];
    private $storages = ['32go', '64go', '256go'];
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i <= 20; $i++) {
            $phone = new Phone();
            $phone
                ->setBrand($this->brands[rand(0, 4)] . ' ' . rand(4, 8))
                ->setColor($this->colors[rand(0, 4)])
                ->setReference(rand(1000, 5000))
                ->setPrice(rand(500, 1000))
                ->setStorage($this->storages[rand(0, 2)]);

            $manager->persist($phone);
        }

        $company = new Company();
        $company
            ->setEmail('company@gmail.com')
            ->setPassword($this->encoder->encodePassword($company, 'password'))
            ->setRoles(['ROLE_ADMIN']);

        $manager->persist($company);

        $faker = Factory::create('fr_FR');
        for ($i = 0; $i < 20; $i++) {
            $user = new User();
            $user
                ->setFirstname($faker->firstname)
                ->setLastname($faker->lastname)
                ->setEmail($faker->email)
                ->setCompany($company);

            $manager->persist($user);
        }

        $manager->flush();
    }
}
