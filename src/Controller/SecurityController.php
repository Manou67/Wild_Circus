<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        $user = $this->getUser();
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        if($user){
            return $this->redirectToRoute('profile');
        }else{
            return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
        }

   }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout()
    {
        throw new \Exception('This method can be blank - it will be intercepted by the logout key on your firewall');
    }

    /**
     * @Route("/profile", name="profile")
     * @return Response
     */
    public function myProfile(AuthenticationUtils $authenticationUtils): Response
    {
        $user = $this->getUser();
        $lastUsername = $authenticationUtils->getLastUsername();

        $prenom = $user->getFirstname();
        $name = $user->getName();
        $email = $user->getEmail();
        $spectacles = $user->getSpectacle();

        return $this->render('security/profile.html.twig', [
            'firstname' => $prenom,
            'name' => $name,
            'email' => $email,
            'lastUsername' => $lastUsername,
            'spectacles' => $spectacles
        ]);
    }

}
