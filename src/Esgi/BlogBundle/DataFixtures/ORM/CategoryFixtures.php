<?php 

namespace Esgi\BlogBundle\DataFixtures;

use Esgi\BlogBundle\Entity\Category;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\Persistence\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;

class CategoryFixture extends AbstractFixture implements FixtureInterface
{
	function load(ObjectManager $manager)
	{
		$i = 1;
		while ($i <= 10) {
			$category = new Category(); 
			$category->setName('Catégorie n° '.$i);

			$manager->persist($category);
			$this->addReference('category-'.$i, $category);
			$i++; 
		}
		$manager->flush();
	}

	public function getOrder()
	{
		return 2;
	}
}