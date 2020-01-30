<?php

namespace App\DataFixtures;

use App\Entity\News;
use App\Entity\Spectacle;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $admin = new User();
        $admin->setEmail('emmanuelle.buono@hotmail.fr')
             ->setName('Manou')
             ->setFirstname('Buono')
             ->setPassword('1234')
             ->setRoles(['ROLE_ADMIN']);

        $manager->persist($admin);

        $spectacle = new Spectacle();
        $spectacle->setName('Papillon')
            ->setDate(new \DateTime('Y-m-d H:i:s','2020-10-10 20:45:10'))
            ->setPrice('49')
            ->setAvailableTickets('500');
        $manager->persist($spectacle);

        $spectacle2 = new Spectacle();
        $spectacle2->setName('Avatar')
            ->setDate(new \DateTime('Y-m-d H:i:s','2020-06-06 20:45:10'))
            ->setPrice('59')
            ->setAvailableTickets('400');
        $manager->persist($spectacle2);

        $spectacle3 = new Spectacle();
        $spectacle3->setName('Kiwis')
            ->setDate(new \DateTime('Y-m-d H:i:s','2020-04-06 20:45:10'))
            ->setPrice('79')
            ->setAvailableTickets('300');
        $manager->persist($spectacle3);

        $news = new News();
        $news->setDescription('Le nouveau spectacle Papillon est terminé et les billets seront mis en vente demain, le 11 octobre 2019. Nous avous attendons nombreux pour ce show exceptionnel !')
            ->setDate(new \DateTime('Y-m-d H:i:s','2019-10-10 20:45:10'));
        $manager->persist($news);

        $news = new News();
        $news->setDescription('Avatar est le nouveau spectacle proposé par le Wild circus, il s\'agit d\'un spectacle unique qui replonge le spectateur dans l\'univers féérique du film Avatar')
            ->setDate(new \DateTime('Y-m-d H:i:s','2019-O6-10 20:45:10'));

        $news = new News();
        $news->setDescription('C\'est officiel, notre nouveau spectacle Kiwis a été achévé hier et le chorégraphe et ses acrobates attendent avec impatience de pouvoir vous accueillir et vous enchanter à travers un spectacle son et lumières incoryable.')
            ->setDate(new \DateTime('Y-m-d H:i:s','2019-04-10 20:45:10'));

        $manager->flush();
    }
}
