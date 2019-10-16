<?php

namespace App\Controller;
use DateTime;
use Firebase\JWT\JWT;
use App\Entity\UserSecure;
use App\Security\TokenAuthenticator;
use Symfony\Component\Mercure\Update;
use App\Repository\UserSecureRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Mercure\Publisher;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Mercure\Jwt\StaticJwtProvider;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Serializer\Encoder\JsonDecode;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoder;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\Attribute\AttributeBag;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\HttpFoundation\Session\Storage\NativeSessionStorage;

class ApiController extends AbstractController
{

    private $session;

    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }

    /**
     * @Route("/api/signin", name="api" ,  methods={"GET","HEAD", "POST" })
     */

    public function login(UserSecureRepository $UserSecureRepository, ?Request $request=null,UserPasswordEncoderInterface $encoder, SessionInterface $session)
    {

        // $API_Token='eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJtZXJjdXJlIjp7InB1Ymxpc2giOlsiKiJdfX0.NFCEbEEiI7zUxDU2Hj0YB71fQVT8YiQBGQWEyxWG0po';
        
        // if($request!== null && $request->headers->get('JWT-TOKEN') == $API_Token ){ 

        //     $data = $_POST;

        //     $username = $request->request->get('username');
        //     $password = $request->request->get('password');
        //     $header =  $request->headers->get('JWT-TOKEN');
        //     dump($_POST);
        //     //pass phrase jwt alfa1
        //    //les sessions s'enregistre dans var/sessions/dev il faut maintenant apprendre à testé l'existence d'une session et a agir en conséquence afin de pouvoir empecher un user deconnecté d'acceder à ses données et d'empeché n'importe qui de pouvoir acceder a l'url de l'api pour un user précis et de forcer la reconnexion 
        //    // solution trouvé crée une propriété session_duration dans le user la généré à partir du currentTimeStamp+3600 cela reviens a faire une session qui seras valable 1 heure et testé cette propriété à chaque appel API via la procédure suivante=> le client appel l'API on verif dans le header le JWT token puis on verif si le user id existe puis on verifie si la session_duration de l'user est supérieur ou non au currentTimeStamp de l'appel API si il est supérieur la session est encore valide dans le cas contraire elle ne l'est plus et on renvoie une indication au front que la session à expirez et que le user doit se reconnecter et celui-ci devras être rediriger vers la page de connexion .
        //     // $currentUserConnect = $UserSecureRepository->findByNameUser($username);
            

        //     if($currentUserConnect==[]){


        //         $LoginStatus='failure';
        //         $response = new Response();
        //         $response->setContent(json_encode(

        //             [   
        //                 'loginstatus' => $LoginStatus,
        //             ]));

        //         $response->headers->set('Content-Type', 'application/json');
                        
        //         return $response ;
        //     }
           
        //     else{   

        //         if(empty($username)){

        //             $LoginStatus='failure username is missing';
        //             $response = new Response();
        //             $response->setContent(json_encode(
        //                 [ 
        //                     'loginstatus' => $LoginStatus,
        //                     'JWT-TOKEN' => $header ,
        //                     'username' => $username,
        //                     'password' => $password,
                           
        //                 ]));
        //             $response->headers->set('Content-Type', 'application/json');
                            
        //             return $response ;
                    
        //         }




        //         if(empty($password)){
        //             $LoginStatus='failure password is missing';
        //             $response = new Response();
        //             $response->setContent(json_encode(
        //                 [  $_POST,

        //                     'loginstatus' => $LoginStatus,
        //                 ]));
        //             $response->headers->set('Content-Type', 'application/json');
                            
        //             return $response ;
        //         }
               
        //         $plainPassword = $password;
        //         $encoded = $encoder->isPasswordValid($currentUserConnect[0], $plainPassword, $currentUserConnect[0]->getSalt());
        //         // dd($encoded);
        //         if($currentUserConnect!=[] && $encoded === true )
        //         {
                   
                       
                        
                     
        //                 $date = new DateTime();
        //                 $timestamp = $date->getTimestamp();

                 

                  

        //             if (($currentUserConnect[0]->getSessionDuration()<$timestamp)) {
        //                 $key = "alfa1";
        //                 $token = array(
        //                 "id" => $currentUserConnect[0]->getId(),
        //                 "username" => $currentUserConnect[0]->getUsername(),
                        
        //             );

        //                 /**
        //                  * IMPORTANT:
        //                  * You must specify supported algorithms for your application. See
        //                  * https://tools.ietf.org/html/draft-ietf-jose-json-web-algorithms-40
        //                  * for a list of spec-compliant algorithms.
        //                  */
        //                 $jwt = JWT::encode($token, $key);
        //                 $decoded = JWT::decode($jwt, $key, array('HS256'));
        //                 $verify = 

        //                 // 'JWT-TOKEN' => $header ,
        //                 $LoginStatus='succes';
        //                 $sessionStatus = 'expired';
        //                 $response = new Response();
        //                 $response->setContent(json_encode(
        
        //                     [  
                                
        
        //                         'decoded'=> $decoded ,
        //                         'jwt' => $jwt ,
        //                         'session_status'=> $sessionStatus,
        //                         'session_duration' => $currentUserConnect[0]->getSessionDuration(),
        //                         'loginstatus' => $LoginStatus,
        //                         'username' => $currentUserConnect[0]->getUsername(),
        //                         'role'=>$currentUserConnect[0]->getRoles(),
        //                     ]));
        //                return $response ;
        //             }


                    
        //             // if($request->getSession()->get($currentUserConnect[0]->getId())){
        //             //     $sessionStorage = new NativeSessionStorage();
        //             //    $sessionStorage->setOptions(['cookie_lifetime' =>$session->getMetadataBag()->getCreated()+ 3600]);
        //             //     $currentSession = $request->getSession($sessionStorage);
                       
        //             //     $currentSession->set($currentUserConnect[0]->getId() , $currentUserConnect[0]->getUsername() );
        //             // }

                
               
        //         if($currentUserConnect[0]->getSessionDuration()>$timestamp )
        //         {
                   
               
        //             $LoginStatus='success';
        //             $sessionStatus = 'active';
        //             $response = new Response();
        //             $response->setContent(json_encode(

        //             [  

        //                 'session_status'=> $sessionStatus,
        //                 'JWT-TOKEN' => $header ,
                        
                       
        //               'session_duration' => $currentUserConnect[0]->getSessionDuration(),
                        

                        
                        
        //                 'loginstatus' => $LoginStatus,
        //                 'username' => $currentUserConnect[0]->getUsername(),
        //                 'role'=>$currentUserConnect[0]->getRoles()
        //             ]));
        //         $response->headers->set('Content-Type', 'application/json');
                        
        //         return $response ;}
        //         }
        //         else{
                    
        //             $LoginStatus='failure';
        //             $response = new Response();
        //             $response->setContent(json_encode(
        //                 [   
        //                     'loginstatus' => $LoginStatus,
        //                 ]));
        //             $response->headers->set('Content-Type', 'application/json');
                            
        //             return $response ;
        //         }
        //     }
        
         
        // }else{
        //     $response = new Response();
        //     $response->setContent(json_encode(

        //         [  

                    

        //             'connection_status' =>'refused',
                    
        //             'token'=>"invalide"
        //         ]));
        //     $response->headers->set('Content-Type', 'application/json');
                    
        //     return $response ;
        // }
        

        
        
       
       
            

    }



     /**
     * @Route("/api/signup" , name="api-subscribe")
     */

    public function subscribe( \Swift_Mailer $mailer ,EntityManagerInterface $em ,UserPasswordEncoderInterface $encoder, Request $request)
    {


        
       
        //protocole fonctionnalité :dont forget 
        $username = $request->request->get('username');
        $password = $request->request->get('password');
        $email =  $request->request->get('email');

        $user = new UserSecure;
        $user->setUsername($username);
        $user->setEmail($email);
        $plainPassword = $password;
        $encoded = $encoder->encodePassword($user, $plainPassword);
        $user->setPassword($encoded);
        $user->setRoles(['ROLE_USER']);
        $em->persist($user);
        $em->flush();
        
        $subscribeStatus='done';
                $response = new Response();
                $response->setContent(json_encode(
                    [
                        'mailStatus' => 'send',
                        'subscribeStatus' => $subscribeStatus,
                    ]));
                $response->headers->set('Content-Type', 'application/json');

                $message = (new \Swift_Message('Bienvenue sur O\'wedding'))
                ->setFrom('O\'wedding@project.com')
                ->setTo($email)
                ->setBody(
                    $this->renderView(
                        // templates/emails/registration.html.twig
                        'emails/registration.html.twig',
                        ['name' => $username]
                    ),
                    'text/html'
                )
        
              
            ;
        
            $mailer->send($message);
        
            
        return $response ;

    }

   

     /**
     * @Route("/api/maketoken" , name="api-token")
     */

    public function apiToken( EntityManagerInterface $em ,UserPasswordEncoderInterface $encoder, Request $request ,UserSecureRepository $USR,SessionInterface $session)
    {
        
       $AllUser= $USR->findAll();
        foreach( $AllUser as $User){
            $User->setSessionDuration($session->getMetadataBag()->getCreated()+3600);
            $em->persist($User);
        }
        
        $USR->findBy(['1']);
        $USR->setApiToken('123456789');
       
        $em->flush();
        
        return $this->render('api/index.html.twig', [
            
        ]);
    }



    /**
     * @Route("/api/setSession" , name="setting_session")
     */

    public function apiSession( EntityManagerInterface $em ,UserPasswordEncoderInterface $encoder, Request $request ,UserSecureRepository $USR,SessionInterface $session)
    {

        $date = new DateTime();
        $timestamp = $date->getTimestamp();
       $AllUser= $USR->findAll();
        foreach( $AllUser as $User){
            $User->setSessionDuration($timestamp+30);
            $em->persist($User);
        }
        
        
        $em->flush();
        
       
    }



     /**
     * @Route("/api/mercure/send" , name="mercure_test")
     */

    public function mercureTest(Publisher $publisher)
    {

        $id = 1;

        $update = new Update('http://monsite.com/ping/'.$id ,'ping');
        $id = $publisher($update);
        
       
        return $this->redirectToRoute('mercure');

    }
    
   
    
}
