<?php

namespace Application\Migrations;

use AppBundle\Entity\EventCategory;
use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20150810134814 extends AbstractMigration implements ContainerAwareInterface
{
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $em = $this->container->get('doctrine')->getManager();
        foreach ($this->getDefaultCategories() as $category) {
           $em->persist($category);
        }
        $em->flush();
    }

    private function getDefaultCategories()
    {
        return [
            new EventCategory('Quick Look', 'quick_look'),
            new EventCategory('Unfinished', 'unfinished'),
            new EventCategory('Metal Gear Scanlon', 'metal_gear_scanlon'),
            new EventCategory('VinnyVania', 'vinny_vania'),
            new EventCategory('Breaking Brad', 'breaking_brad'),
            new EventCategory('Live', 'live'),
        ];
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
    }
}
