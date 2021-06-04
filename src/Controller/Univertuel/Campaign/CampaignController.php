<?php

namespace App\Controller\Univertuel\Campaign;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Univertuel\Campaign\Campaign;
use App\Form\Univertuel\Campaign\CampaignFormType;


class CampaignController extends AbstractController
{
    public function campaignHomepageView()
    {
        $campaignRepository = $this->getDoctrine()->getRepository('App\Entity\Univertuel\Campaign\Campaign');
        $campaigns = $campaignRepository->findBy(['owner' => $this->getUser()]);
 
        return $this->render('platform/member/campaign/homepage.html.twig', ['campaigns' => $campaigns]);
    }
    
    public function campaignView ($id)
    {
        $campaignRepository = $this->getDoctrine()->getRepository('App\Entity\Univertuel\Campaign\Campaign');
        $campaigns = $campaignRepository->findBy(['owner' => $this->getUser()]);
        $campaign = $campaignRepository->find($id);
        if($this->getUser() == $campaign->getOwner())
        {
            return $this->render('platform/member/campaign/campaign.html.twig', ['campaign' => $campaign, 'campaigns' => $campaigns]);
        }
        else 
        {
            return $this->redirectToRoute('app_forbidden');    
        }
    }
    
    public function campaignNew (Request $request)
    {
        $campaign = new Campaign();
        $campaigns = null;
        $owner = $this->getUser();
        $campaign->setOwner($owner);
        $form = $this->createForm(CampaignFormType::class, $campaign);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($campaign);
            $em->flush();
            return $this->redirectToRoute('campaign_homepage');
        }
        
        return $this->render('platform/member/campaign/form_campaign_new.html.twig', 
            ['form' => $form->createView(),'campaigns' => $campaigns]);
    }
}
