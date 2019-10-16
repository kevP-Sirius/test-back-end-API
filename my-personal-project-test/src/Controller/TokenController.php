<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TokenController extends AbstractController
{
    /**
     * @Route("/mercure", name="mercure")
     */
    public function index()
    {
        return $this->render('mercure/home.html.twig',['id'=>1]
        );
    }
}



// if($CurrentUserConnect==[] && $CurrentProject==[] )
//             {

                
//                 $loadDataStatus = 'failed';
//                 $errorStatus = 'unknown JWT please reconnect' ;
//                 $response = new Response();
//                 $response->setContent(json_encode(

//                     [  

//                         'load_data_status' => $loadDataStatus,
//                         'error_status' => $errorStatus ,
                    
//                     ]));
//                 $response->headers->set('Content-Type', 'application/json');
                        
//                 return $response ;

              
//             }
//             if($CurrentUserConnect!=[] && $CurrentProject==[] )
//             {
//                 $loadDataStatus = 'failed';
//                 $errorStatus = 'a User without project has been found' ;
//                 $response = new Response();
//                 $response->setContent(json_encode(

//                     [  

//                         'load_data_status' => $loadDataStatus,
//                         'error_status' => $errorStatus ,
                    
//                     ]));
//                 $response->headers->set('Content-Type', 'application/json');
                        
//                 return $response ;
//             }


//                 if($CurrentUserConnect!=[] && $CurrentProject!=[] && $CurrentUserConnect[0]->getSessionDuration()< $CurrentTimestamp && $CurrentUserConnect[0]->getUsername()== $username && $CurrentProject[0]->getUser()->getUsername() == $username)

//                 {
//                     $loadDataStatus = 'failed';
//                     $errorStatus = 'Session expired please reconnect' ;
//                     $response = new Response();
//                     $response->setContent(json_encode(
    
//                         [  
    
//                             'load_data_status' => $loadDataStatus,
//                             'error_status' => $errorStatus ,
                            
//                         ]));
//                     $response->headers->set('Content-Type', 'application/json');
                            
//                     return $response ;
    
//                 }
    
//                 if($CurrentUserConnect!=[] && $CurrentProject!=[]  &&  $CurrentUserConnect[0]->getSessionDuration()> $CurrentTimestamp  && $CurrentUserConnect[0]->getUsername()!= $username && $CurrentProject[0]->getUser()->getUsername() == $username)
    
//                 {
    
//                     $loadDataStatus = 'failed';
//                     $errorStatus = ' A user attempt to access to the the wrong user data' ;
//                     $response = new Response();
//                     $response->setContent(json_encode(
    
//                         [  
    
//                             'load_data_status' => $loadDataStatus,
//                             'error_status' => $errorStatus ,
                        
//                         ]));
//                     $response->headers->set('Content-Type', 'application/json');
                            
//                     return $response ;
                   
//                 }

//                 if($CurrentUserConnect!=[] && $CurrentProject!=[]  &&  $CurrentUserConnect[0]->getSessionDuration()> $CurrentTimestamp  && $CurrentUserConnect[0]->getUsername()== $username && $CurrentProject[0]->getUser()->getUsername() != $username)
    
//                 {
    
//                     $loadDataStatus = 'failed';
//                     $errorStatus = ' A user attempt to access to the the wrong project data' ;
//                     $response = new Response();
//                     $response->setContent(json_encode(
    
//                         [  
    
//                             'load_data_status' => $loadDataStatus,
//                             'error_status' => $errorStatus ,
                        
//                         ]));
//                     $response->headers->set('Content-Type', 'application/json');
                            
//                     return $response ;
                   
//                 }
    
//                 if($CurrentUserConnect!=[] && $CurrentProject!=[]  &&  $CurrentUserConnect[0]->getSessionDuration()> $CurrentTimestamp  && $CurrentUserConnect[0]->getUsername()== $username && $CurrentProject[0]->getUser()->getUsername() == $username)
    
//                 {
                    
//                     $loadDataStatus = 'success';
//                     $id=269;
//                     $testProject = $projectRepository->findById($id);
                    
//                     $providerProjectData = [];
//                     foreach ($testProject[0]->getProvider() as $providerProject) {
//                         $providerProjectData[] =
//                         [
                        
                           
//                             'name' => $providerProject->getName(),
                            
//                             'email' => $providerProject->getEmail(),
//                             'phone_number'=>$providerProject->getPhoneNumber(),
//                             'average_price' =>$providerProject->getAveragePrice()

//                         ];

//                         foreach($providerProject->getDepartment() as $departmentProvider ){
//                             $providerData[] = ['department_number'=> $departmentProvider->getNumber()];
//                         }
                       
//                     }

//                     $guestProjectData=[];
//                     foreach($testProject[0]->getGuest() as $guestProject ){
//                         $guestProjectData[] = 
//                         [
//                             'firstname'=> $guestProject->getFirstname(),
//                             'lastname' => $guestProject->getLastname(),
//                             'email' => $guestProject->getEmail(),
//                             'phone_number' => $guestProject->getPhoneNumber()
//                         ];
//                     }
//                     $errorStatus = '' ;
//                     $response = new Response();
//                     $response->setContent(json_encode(
    
//                         [  
                            
//                             'project_data' =>
//                             [
//                                 'name'=>$testProject[0]->getName() ,
//                                 'deadline'=>$testProject[0]->getDeadline(),
//                                 'forecast_budget' => $testProject[0]->getForecastBudget(),
//                                 'user'=>$testProject[0]->getUser()->getUsername(),
//                                 'department_number' =>$testProject[0]->getDepartment()->getNumber(),
//                                 'department_name'=> $testProject[0]->getDepartment()->getName(),
//                                 'provider_list' => $providerProjectData ,
//                                 'Guest_list' => $guestProjectData,
                                
//                             ],
//                             'load_data_status' => $loadDataStatus,
                            
                        
//                         ]));
//                     $response->headers->set('Content-Type', 'application/json');
                            
//                     return $response ;
                   
//                 }

            
