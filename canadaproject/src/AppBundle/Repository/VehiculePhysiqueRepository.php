<?php

namespace AppBundle\Repository;

/**
 * VehiculePhysiqueRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class VehiculePhysiqueRepository extends \Doctrine\ORM\EntityRepository
{
    public function findActive() {
        return $this->getEntityManager()
            ->createQuery("SELECT v FROM AppBundle:VehiculePhysique v WHERE v.validationStatut = '2' ORDER BY v.dateMiseEnLigne ASC")
            ->getResult();
    }

    public function findByRecherche($marque, $model, $version, $miseEnCircuMax, $miseEnCircuMin, $kiloMax, $kiloMin, $prixMax, $prixMin, $bdv, $energie) {
                    $query = $this->createQueryBuilder('v')
                    ->join('v.version', 'ver')
                    ->join('ver.model', 'mod')
                    ->join('mod.marque', 'm');

            // ON DEFINIT D'ABORD QUE LE VEHICULE DOIT ETRE EN LIGNE POUR ETRE DANS LES REPONSES
                    $query->where('v.validationStatut == 2');

                // SI LA VERSION EST FOURNIE

                if($version != ''){
                    $query->AndWhere('ver.version == :version')

                        ->setParameters(array(
                            'version' => $version,
                        ));
                }

                // SI LE MODEL EST FOURNIE

                if(($model != '') && ($version == '')){
                    $query->AndWhere('mod.model == :model')

                        ->setParameters(array(
                            'model' => $model,
                        ));
                }

                // SI LA MARQUE EST FOURNIE

                if(($marque != '') && ($model = '') && ($version == '')){
                    $query->AndWhere('m.marque == :marque')

                        ->setParameters(array(
                            'marque' => $marque,
                        ));
                }


        // GESTION DES CHAMPS MIN & MAX SI LES DEUX SONT REMPLIS

                //GESTION DATE DE MISE EN CIRCULATION

                    if(($miseEnCircuMin != '') && ($miseEnCircuMax == '')){
                        $query->AndWhere('v.dateDeMiseEnCirculation > :dateDeMiseEnCirculationMin')

                        ->setParameters(array(
                            'dateDeMiseEnCirculationMin' => $miseEnCircuMin,
                        ));
                    }elseif (($miseEnCircuMin != '') && ($miseEnCircuMax != '')){
                        $query->AndWhere('v.dateDeMiseEnCirculation < :dateDeMiseEnCirculationMax')
                            ->setParameters(array(
                                'dateDeMiseEnCirculationMax' => $miseEnCircuMax
                            ));

                    }elseif (($miseEnCircuMin != '') && ($miseEnCircuMax != '')){
                        $query->AndWhere('v.dateDeMiseEnCirculation BETWEEN :dateDeMiseEnCirculationMin AND :dateDeMiseEnCirculationMax')

                            ->setParameters(array(
                                'dateDeMiseEnCirculationMin' => $miseEnCircuMin,
                                'dateDeMiseEnCirculationMax' => $miseEnCircuMax
                            ));

                    }

                    //GESTION KILOMETRAGE

                    if(($kiloMin != '') && ($kiloMax == '')){
                        $query->AndWhere('v.kilometrage > :kiloMin')

                            ->setParameters(array(
                                'kiloMin' => $kiloMin,
                            ));
                    }elseif (($kiloMin != '') && ($kiloMax != '')){
                        $query->AndWhere('v.kilometrage < :kiloMax')
                            ->setParameters(array(
                                'kiloMax' => $kiloMax
                            ));

                    }elseif (($kiloMin != '') && ($kiloMax != '')){
                        $query->AndWhere('v.kilometrage BETWEEN :kiloMin AND :kiloMax')

                            ->setParameters(array(
                                'kiloMin' => $kiloMin,
                                'kiloMax' => $kiloMax
                            ));
                    }

                    //GESTION PRIX

                    if(($prixMin != '') && ($prixMax == '')){
                        $query->AndWhere('v.prix > :prixMin')

                            ->setParameters(array(
                                'prixMin' => $prixMin,
                            ));
                    }elseif (($prixMin != '') && ($prixMax != '')){
                        $query->AndWhere('v.prix < :prixMax')
                            ->setParameters(array(
                                'prixMax' => $prixMax
                            ));

                    }elseif (($prixMin != '') && ($prixMax != '')){
                        $query->AndWhere('v.prix BETWEEN :prixMin AND :prixMax')

                            ->setParameters(array(
                                'prixMin' => $prixMin,
                                'prixMax' => $prixMax
                            ));
                    }

                    // SI LA BDV EST FOURNIE

                    if($bdv != ''){
                        $query->AndWhere('ver.bdv == :bdv')

                            ->setParameters(array(
                                'bdv' => $bdv,
                            ));
                    }

                    // SI L' ENERGIE EST FOURNIE

                    if($energie != ''){
                        $query->AndWhere('ver.energie == :energie')

                            ->setParameters(array(
                                'energie' => $energie,
                            ));
                    }

        return $query->getQuery()->getResult();
    }
}
