<?php 

 namespace Tipddy\BackendBundle\Listener;
 
 use Symfony\Component\HttpFoundation\Session\Session;
 use Symfony\Component\HttpKernel\Event\GetResponseEvent;
 use Symfony\Component\HttpKernel\HttpKernel;
 
 class SessionControlListener
 {
	 private $container;
	 private $session;
	 
	 public function __construct($container, Session $session)
	 {
	     $this->container = $container;
	     $this->session = $session;
		 
	 }
	 
	 public function onKernelRequest(GetResponseEvent $event)
	 {
	      if (HttpKernel::MASTER_REQUEST != $event->getRequestType()) {
		      //don't do anything if it's not the master request
		      return;
	      }
	      
	      $route = trim($this->container->get('request')->get('_route'));
	      $currentRouter = explode('_', $route);
	      
	      if (in_array($currentRouter[0], array('dashboard', 'survey'))) {
		      $this->session->remove('survey');	          
	      }
		 
	 }	 
 }
 
  