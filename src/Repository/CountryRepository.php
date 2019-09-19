<?php

namespace App\Repository;

use App\Entity\Country;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Country|null find($id, $lockMode = null, $lockVersion = null)
 * @method Country|null findOneBy(array $criteria, array $orderBy = null)
 * @method Country[]    findAll()
 * @method Country[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CountryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Country::class);
    }

    /**
     * Output the collected overall taxes of the country
     *
     * @return array
     */
    public function collectedTaxesPerCountry()
    {
        return $this->createQueryBuilder('c')
            ->select('c.name, SUM(cty.amountTaxes) as total')
            ->leftJoin('c.states', 's')
            ->leftJoin('s.counties', 'cty')
            ->orderBy('c.name', 'ASC')
            ->groupBy('c.id')
            ->getQuery()
            ->getResult();
    }

    /**
     * Output the average tax rate of the country
     *
     * @return array
     */
    public function averageTaxRatePerCountry()
    {
        return $this->createQueryBuilder('c')
            ->select('c.name, AVG(cty.taxRate) as average')
            ->leftJoin('c.states', 's')
            ->leftJoin('s.counties', 'cty')
            ->orderBy('c.name', 'ASC')
            ->groupBy('c.id')
            ->getQuery()
            ->getResult();
    }
}