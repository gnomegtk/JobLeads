<?php

namespace App\Controller;

use App\Entity\Country;
use App\Entity\County;
use App\Entity\State;
use App\Form\ImportType;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ImportController extends AbstractController
{
    /**
     * @Route("/import", name="import_index")
     */
    public function import(Request $request)
    {
        $form = $this->createForm(ImportType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $file = $form['file']->getData();

            if ($file) {
                $handle = fopen($file->getPathName(), 'r');
                if ($handle) {

                    $line    = 0;
                    $error   = false;
                    $isEmpty = true;

                    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

                        $line++;

                        if (count($data) != 5) {
                            $error = 'Invalid line #' . $line;

                            continue;
                        }

                        if (strtolower($data[0]) == 'country') {
                            continue;
                        }

                        $isEmpty = false;

                        try {
                            $this->addData($data[0], $data[1], $data[2], $data[3], $data[4]);
                        } catch (\Exception $e) {
                            $error = 'Error in line #' . $line . ': ' . $e->getMessage();

                            continue;
                        }
                    }

                    if (!$isEmpty && $form->isValid()) {

                        $append = $form['append']->getData();

                        $manager    = $this->getDoctrine()->getManager();
                        $connection = $manager->getConnection();
                        $dbPlatform = $connection->getDatabasePlatform();

                        $connection->beginTransaction();

                        try {

                            if (!$append) {
                                $connection->query('SET FOREIGN_KEY_CHECKS=0');

                                $classes = [Country::class, State::class, County::class];

                                foreach ($classes as $className) {
                                    $classMetaData = $manager->getClassMetadata($className);
                                    $q = $dbPlatform->getTruncateTableSql($classMetaData->getTableName());
                                    $connection->executeUpdate($q);
                                }

                                $connection->query('SET FOREIGN_KEY_CHECKS=1');
                            }

                            $manager->flush();

                            $connection->commit();
                        } catch (\Exception $e) {
                            $error = 'Error processing the file: ' . $e->getMessage();

                            $connection->rollback();
                        }
                    }

                    fclose($handle);

                    if ($isEmpty) {
                        $error = 'File has no valid data';
                    }

                    if ($error) {
                        $this->addFlash(
                            'error',
                            $error
                        );
                    } else {
                        $this->addFlash(
                            'notice',
                            'File imported with success!'
                        );
                    }

                    return $this->redirectToRoute('import_index');
                }
            }
        }

        return $this->render('import/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    private function addData($country, $state, $county, $taxRate, $amountTaxes)
    {
        $country = $this->importEntity(Country::class, $country);
        $state   = $this->importEntity(State::class, $state);
        $county  = $this->importEntity(County::class, $county, $taxRate, $amountTaxes);

        $state->setCountry($country);
        $county->setState($state);

        $manager = $this->getDoctrine()->getManager();
        $manager->persist($country);
        $manager->persist($state);
        $manager->persist($county);
    }

    private function importEntity($entity, $name, $taxRate = false, $amountTaxes = false)
    {
        $object = $this->getDoctrine()
            ->getRepository($entity)
            ->findOneBy(['name' => $name]);

        if (!$object) {
            $object = new $entity();
            $object->setName($name);
        }

        if ($taxRate !== false) {
            $object->setTaxRate($taxRate);
        }

        if ($amountTaxes !== false) {
            $object->setAmountTaxes($amountTaxes);
        }

        return $object;
    }
}