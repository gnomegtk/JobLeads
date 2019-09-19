<?php

namespace App\Controller;

use App\Repository\CountryRepository;
use App\Repository\StateRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/statistics")
 */
class StatisticsController extends AbstractController
{
    /**
     * @Route("/", name="statistics_index", methods={"GET"})
     *
     * @return Response
     */
    public function index(): Response
    {
        return $this->render('statistics/index.html.twig');
    }

    /**
     * @Route("/collected_taxes_per_country", name="statistics_collected_taxes_per_country", methods={"GET"})
     *
     * @param CountryRepository $countryRepository
     *
     * @return Response
     */
    public function collectedTaxesPerCountry(CountryRepository $countryRepository): Response
    {
        return $this->render('statistics/collected_taxes_per_country.html.twig', [
            'countries' => $countryRepository->collectedTaxesPerCountry()
        ]);
    }

    /**
     * @Route("/average_taxrate_per_country", name="statistics_average_taxrate_per_country", methods={"GET"})
     *
     * @param CountryRepository $countryRepository
     *
     * @return Response
     */
    public function averageTaxRatePerCountry(CountryRepository $countryRepository): Response
    {
        return $this->render('statistics/average_taxrate_per_country.html.twig', [
            'countries' => $countryRepository->averageTaxRatePerCountry()
        ]);
    }

    /**
     * @Route("/average_county_taxrate_per_state", name="statistics_average_county_taxrate_per_state", methods={"GET"})
     *
     * @param StateRepository $stateRepository
     *
     * @return Response
     */
    public function averageCountyTaxRatePerState(StateRepository $stateRepository): Response
    {
        return $this->render('statistics/average_county_taxrate_per_state.html.twig', [
            'states' => $stateRepository->averageCountyTaxRatePerState()
        ]);
    }

    /**
     * @Route("/collected_taxes_per_state", name="statistics_collected_taxes_per_state", methods={"GET"})
     *
     * @param StateRepository $stateRepository
     *
     * @return Response
     */
    public function collectedTaxesPerState(StateRepository $stateRepository): Response
    {
        return $this->render('statistics/collected_taxes_per_state.html.twig', [
            'states' => $stateRepository->collectedTaxesPerState()
        ]);
    }

    /**
     * @Route("/average_amount_taxes_collected_per_state", name="statistics_average_amount_taxes_collected_per_state", methods={"GET"})
     *
     * @param StateRepository $stateRepository
     *
     * @return Response
     */
    public function averageAmountTaxesCollectedPerState(StateRepository $stateRepository): Response
    {
        return $this->render('statistics/average_amount_taxes_collected_per_state.twig', [
            'states' => $stateRepository->averageAmountTaxesCollectedPerState()
        ]);
    }
}