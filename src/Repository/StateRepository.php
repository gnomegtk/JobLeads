<?php

namespace App\Repository;

use App\Entity\State;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method State|null find($id, $lockMode = null, $lockVersion = null)
 * @method State|null findOneBy(array $criteria, array $orderBy = null)
 * @method State[]    findAll()
 * @method State[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StateRepository extends ServiceEntityRepository
{
    /**
     * StateRepository constructor.
     *
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, State::class);
    }

    /**
     * Output the average county tax rate per state
     *
     * @return array
     */
    public function averageCountyTaxRatePerState()
    {
        return $this->createQueryBuilder('s')
            ->select('c.name as country_name, s.name, AVG(cty.taxRate) as average')
            ->leftJoin('s.country', 'c')
            ->leftJoin('s.counties', 'cty')
            ->orderBy('c.name', 'ASC')
            ->orderBy('s.name', 'ASC')
            ->groupBy('s.id')
            ->getQuery()
            ->getResult();
    }

    /**
     * Output the overall amount of taxes collected per state
     *
     * @return array
     */
    public function collectedTaxesPerState()
    {
        return $this->createQueryBuilder('s')
            ->select('c.name as country_name, s.name, SUM(cty.amountTaxes) as total')
            ->leftJoin('s.country', 'c')
            ->leftJoin('s.counties', 'cty')
            ->orderBy('c.name', 'ASC')
            ->orderBy('s.name', 'ASC')
            ->groupBy('s.id')
            ->getQuery()
            ->getResult();
    }

    /**
     * Output the average amount of taxes collected per state
     *
     * @return array
     */
    public function averageAmountTaxesCollectedPerState()
    {
        return $this->createQueryBuilder('s')
            ->select('c.name as country_name, s.name, AVG(cty.amountTaxes) as average')
            ->leftJoin('s.country', 'c')
            ->leftJoin('s.counties', 'cty')
            ->orderBy('c.name', 'ASC')
            ->orderBy('s.name', 'ASC')
            ->groupBy('s.id')
            ->getQuery()
            ->getResult();
    }
}