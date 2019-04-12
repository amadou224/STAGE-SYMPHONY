<?php

namespace App\Controller;

use App\Entity\Lieux;
use App\Entity\Trajet;
use App\Entity\Reservation;
use App\Entity\DepartDestination;
use App\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function homeRoute()
    {

        return $this->render('home/home.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /**
     * @Route("/aeroport", name="aeroport")
     */
    public function aeroportRoute()
    {
        $repositoryLieux = $this->getDoctrine()->getRepository(Lieux::class);

        $lieux = $repositoryLieux->findAll();
        return $this->render('aeroport/aeroport.html.twig', [
            'lieux' => $lieux,
        ]);
    }

    /**
     * @Route("/horairesTarifs", name="horairesTarifs")
     */
    public function aeroportRouteHorairesTarifs()
    {
        return $this->render('aeroport/horairesTarifs.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /**
     * @Route("/profile", name="profile")
     */
    public function Profile()
    {
        return $this->render('profile/profile.html.twig', [
            'user' => $this->getUser(),
            'controller_name' => 'HomeController',
        ]);
    }

    /**
     * @Route("/infoDestination", name="infoDestination")
     */
    public function infoDestination()
    {
        return $this->json(['username' => 'amine']);
    }

    /**
     * @Route("/reservationAller", name="reservationAller")
     */
    public function reservationAller(Request $req) : Response {
        $em = $this->getDoctrine()->getManager();

        $depart_destination = new DepartDestination();
        $reservation = new Reservation();
        $trajet = new Trajet();

        $depart = $req->get('depart_aller');
        $destination = $req->get('destination_aller');
        $nb = $req->get('nb_passager_aller');
        $date_depart = new \DateTime($req->get('date_depart_aller'));
        $horraire_depart = $req->get('horaire_depart_aller');
        $adresse = $req->get('adresse_aller');
        $pdp = $req->get('pdp_aller');
        $cp = $req->get('cp_aller');
        $ville = $req->get('ville_aller');
        $pays = $req->get('pays_aller');

        $depart_destination->setDepart($depart);
        $depart_destination->setDestination($destination);
        
        $reservation->setNbPassager($nb);
        $reservation->setDateDepart($date_depart);
        $reservation->setHorraire($horraire_depart);
        $reservation->setPointDePrise($pdp);
        $reservation->setUser($this->getUser());
        $reservation->setDepartDestination($depart_destination);
        $reservation->setCodepostal($cp);
        $reservation->setVille($ville);
        $reservation->setPays($pays);
        $reservation->setAdresse($adresse);
        
        $trajet->addReservation($reservation);

        $em->persist($trajet);
        $em->persist($depart_destination);
        $em->persist($reservation);

        $em->flush();
        
        return $this->render('home/index.html.twig');

    }
    /**
     * @Route("/reservation", name="reservation")
     */
    public function reservation(Request $req) : Response{
        $em = $this->getDoctrine()->getManager();
        


        $depart = $req->get('depart');
        $destination = $req->get('destination');
        
        $nb_aller = $req->get('nb_passager_1');
        $nb_retour = $req->get('nb_passager_2');
        
        if ($nb_retour == "undefined"){
            $nb_retour = $nb_aller;
        }
        
        $date_depart = new \DateTime($req->get('date_depart'));
        $date_retour = new \DateTime($req->get('date_retour'));
        
        $horaire_depart = $req->get('horaire_depart');
        $horaire_retour = $req->get('horaire_retour');
        
        $pdp = $req->get('pdp');

        $adresse = $req->get('adresse');
        $cp = $req->get('cp');
        $ville = $req->get('ville');
        $pays = $req->get('pays');

        for ($i = 0; $i < 2; $i++){
            $depart_destination = new DepartDestination();
            $reservation = new Reservation();
            $trajet = new Trajet();

            if (!isset($tmp)){
                $depart_destination->setDepart($depart);
                $depart_destination->setDestination($destination);
                
                
                $reservation->setNbPassager($nb_aller);
                $reservation->setDateDepart($date_depart);
                $reservation->setHorraire($horaire_depart);
                $reservation->setPointDePrise($pdp);
                $reservation->setUser($this->getUser());
                $reservation->setDepartDestination($depart_destination);
                $reservation->setCodepostal($cp);
                $reservation->setVille($ville);
                $reservation->setPays($pays);
                $reservation->setAdresse($adresse);
                
                $trajet->addReservation($reservation);
        
                $em->persist($trajet);
                $em->persist($depart_destination);
                $em->persist($reservation);
        

                $tmp = "ok";
            }
            else {
                $depart_destination->setDepart($destination);
                $depart_destination->setDestination($depart);
                
                $reservation->setNbPassager($nb_retour);
                $reservation->setDateDepart($date_retour);
                $reservation->setHorraire($horaire_retour);
                $reservation->setUser($this->getUser());
                $reservation->setDepartDestination($depart_destination);
                
                $trajet->addReservation($reservation);
        
                $em->persist($trajet);
                $em->persist($depart_destination);
                $em->persist($reservation);
        
            }

        }
        $em->flush();
        return $this->render('home/index.html.twig');
    }
}
