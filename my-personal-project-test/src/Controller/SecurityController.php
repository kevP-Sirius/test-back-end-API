<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    // /**
    //  * @Route("/login", name="app_login")
    //  */
    // public function login(AuthenticationUtils $authenticationUtils): Response
    // {
    //     // if ($this->getUser()) {
    //     //    $this->redirectToRoute('target_path');
    //     // }

    //     // get the login error if there is one
    //     $error = $authenticationUtils->getLastAuthenticationError();
    //     // last username entered by the user
    //     $lastUsername = $authenticationUtils->getLastUsername();

    //     return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    // }

    // /**
    //  * @Route("/logout", name="app_logout")
    //  */
    // public function logout()
    // {
    //     throw new \Exception('This method can be blank - it will be intercepted by the logout key on your firewall');
    // }


//      /**
//      * @Route("/api/signin", name="signin")
//      */
//     public function signin( ?Request $request=null,UserPasswordEncoderInterface $encoder)
//     {
       
//                 $API_Token='eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJtZXJjdXJlIjp7InB1Ymxpc2giOlsiKiJdfX0.NFCEbEEiI7zUxDU2Hj0YB71fQVT8YiQBGQWEyxWG0po';
                
//         if($request!== null && $request->headers->get('JWT') == $API_Token )
//         { 

            
            
//             $username = $request->request->get('username');
//             $password = $request->request->get('password');
//             $header =  $request->headers->get('JWT-TOKEN');

//             $currentUserConnect = $UserRepository->findByNameUser($username);
//             $currentUserConnectEmail = $UserRepository->findByMail($username);

//             if($currentUserConnect==[] && $currentUserConnectEmail==[])
//             {



//                 $LoginStatus='failure the user does not exist';
//                 $response = new Response();
//                 $response->setContent(json_encode(

//                     [   
//                         'loginstatus' => $LoginStatus,
//                     ]));

//                 $response->headers->set('Content-Type', 'application/json');
                        
//                 return $response ;

//             }else{

                

            
               
//                 if($currentUserConnect!=[])
//                 {
               

                   
//                     $plainPassword = $password;
//                     $verify = $encoder->isPasswordValid($currentUserConnect[0], $plainPassword, $currentUserConnect[0]->getSalt());
//                     // si le password est valide et que le user existe on passe à la suite
//                     if($verify === true )
//                     {
//                         //je crée ici le timestamp dont je vais me servir pour crée une $session_duration 
//                         $date = new DateTime();
//                         $timestamp = $date->getTimestamp();
//                         $session_duration=$timestamp+3600;
//                         $currentUserConnect[0]->setSessionDuration($session_duration);
//                         //je crée ici le token avec le passphrase
//                         $key = "alfa1";
//                         $token = array(
//                         "id" => $currentUserConnect[0]->getId(),
//                         "username" => $currentUserConnect[0]->getUsername()
//                         );

//                         $jwt = JWT::encode($token, $key);

//                         $currentUserConnect[0]->setToken($jwt);
//                         $loginStatus='succes';
//                         $sessionStatus = 'start';
//                         $response = new Response();
//                         $response->setContent(json_encode(
        
//                             [  
                                
        
                                
//                                 'jwt' => $jwt ,
//                                 'session_status'=> $sessionStatus,
//                                 'login_status' => $loginStatus,
//                                 'username' => $currentUserConnect[0]->getUsername(),
                                
//                             ]));
//                     return $response ;


//                     }
                

//                     if($currentUserConnectEmail!=[])
//                     {


//                         $plainPassword = $password;
//                         $verify = $encoder->isPasswordValid($currentUserConnectEmail[0], $plainPassword, $currentUserConnectEmail[0]->getSalt());
//                         // si le password est valide et que le user existe on passe à la suite
//                         if($verify === true )
//                         {
//                             //je crée ici le timestamp dont je vais me servir pour crée une $session_duration 
//                             $date = new DateTime();
//                             $timestamp = $date->getTimestamp();
//                             $session_duration=$timestamp+3600;
//                             $currentUserConnectEmail[0]->setSessionDuration($session_duration);
//                             //je crée ici le token avec le passphrase
//                             $key = "alfa1";
//                             $token = array(
//                             "id" => $currentUserConnectEmail[0]->getId(),
//                             "username" => $currentUserConnectEmail[0]->getUsername()
//                             );
    
//                             $jwt = JWT::encode($token, $key);
    
//                             $currentUserConnectEmail[0]->setToken($jwt);
//                             $loginStatus='succes';
//                             $sessionStatus = 'start';
//                             $response = new Response();
//                             $response->setContent(json_encode(
            
//                                 [  
                                    
            
                                    
//                                     'jwt' => $jwt ,
//                                     'session_status'=> $sessionStatus,
//                                     'login_status' => $loginStatus,
//                                     'username' => $currentUserConnectEmail[0]->getUsername(),
                                    
//                                 ]));
//                         return $response ;
    
    
//                         }else{
//                             $errorStatus = 'wrong password';
//                             $loginStatus='failure';
//                             $sessionStatus = 'refused';
//                             $response = new Response();
//                             $response->setContent(json_encode(
            
//                                 [  
                                    
            
                                    
//                                     'error' =>$errorStatus,
//                                     'session_status'=> $sessionStatus,
//                                     'login_status' => $loginStatus,
//                                     'username' => $currentUserConnectEmail[0]->getUsername(),
                                    
//                                 ]));
//                         return $response ;
    
    
//                         }




//                     }

//                 }


//             }
//         }else{

//             $response = new Response();
//             $response->headers->set('Content-Type', 'application/json');
//             $response->setContent(json_encode(

//                 [  

                    

//                     'connection_API_status' =>'refused',
                    
//                     'Header_token'=>"invalide"
//                 ]));
           
                    
//             return $response ;
//         }
        
//     }
}
