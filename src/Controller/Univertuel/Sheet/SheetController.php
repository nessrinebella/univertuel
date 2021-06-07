<?php

namespace App\Controller\Univertuel\Sheet;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Univertuel\Prophecy\Sheet\Sheet;
use Symfony\Component\Routing\Annotation\Route;

use Doctrine\Common\Collections\ArrayCollection;
use App\Entity\Univertuel\Prophecy\Game\Stat\Age;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Univertuel\Prophecy\Game\Stat\Omen;
use App\Entity\Univertuel\Prophecy\Game\Stat\Caste;
use App\Entity\Univertuel\Prophecy\Sheet\SheetPurse;
use App\Entity\Univertuel\Prophecy\Sheet\SheetSkills;
use App\Entity\Univertuel\Prophecy\Sheet\SheetWounds;
use App\Form\Univertuel\Prophecy\Sheet\SheetFormType;
use App\Entity\Univertuel\Prophecy\Sheet\SheetTendency;
use App\Entity\Univertuel\Prophecy\Sheet\SheetStatistic;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use App\Entity\Univertuel\Prophecy\Sheet\SheetAttributes;
use App\Entity\Univertuel\Prophecy\Sheet\SheetDiscipline;
use App\Entity\Univertuel\Prophecy\Sheet\SheetMagicDomain;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Entity\Univertuel\Prophecy\Game\Stat\Caracteristic;
use App\Entity\Univertuel\Prophecy\Sheet\SheetCaracteristics;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use App\Form\Univertuel\Prophecy\Game\Stat\CaracteristicFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Form\Univertuel\Prophecy\Sheet\SheetCaracteristicsFormType;
use App\Form\Univertuel\Prophecy\Sheet\SheetCaracteristicsEditFormType;
use App\Form\Univertuel\Prophecy\Sheet\SheetEditFormType;


class SheetController extends AbstractController
{
    
    //TODO ajouter un code de suppression du message de lien pour la creation de personnage
    public function sheetNew(Request $request, $id, $user)
    {
        //control si user in link == current user to secure character creation in campaign
        if($user != $this->getUser()->getId())
        {
            return $this->redirectToRoute('app_forbidden');
        }
        //create figure name
        else
        {
            $sheet = new Sheet();
            $campaignRepository = $this->getDoctrine()->getRepository('App\Entity\Univertuel\Campaign\Campaign');
            $campaign = $campaignRepository->find($id);
            $sheet->setCampaign($campaign);
            $owner = $this->getUser();
            $sheet->setOwner($owner);
            $form = $this->createForm(SheetFormType::class, $sheet);
            $form->handleRequest($request);
            if($form->isSubmitted() && $form->isValid())
            {
                $em = $this->getDoctrine()->getManager();
                $em->persist($sheet);
                
                /**** creation of each sheet part ****/
                
                //disciple sheet part
                $discipleRepository = $this->getDoctrine()->getRepository('App\Entity\Univertuel\Prophecy\Game\Capacity\Discipline');
                $disciplines = $discipleRepository->findAll();
                foreach ($disciplines as $d)
                {
                    $sheetDiscipline = new SheetDiscipline();
                    $sheetDiscipline->setDiscipline($d);
                    $sheetDiscipline->setValue(0);
                    $sheetDiscipline->setSheet($sheet);
                    $em->persist($sheetDiscipline);
                    $em->flush();
                }
                
                //tendency sheet part
                $tendencyRepository = $this->getDoctrine()->getRepository('App\Entity\Univertuel\Prophecy\Game\Stat\Tendency');
                $tendencies = $tendencyRepository->findAll();
                foreach ($tendencies as $t)
                {
                    $sheetTendency = new SheetTendency();
                    $sheetTendency->setSheet($sheet);
                    $sheetTendency->setTendency($t);
                    $sheetTendency->setCircles(0);
                    $sheetTendency->setValue(0);
                    $em->persist($sheetTendency);
                    $em->flush();
                }
                
                //magicDomain sheet part
                $magicDomainRepository = $this->getDoctrine()->getRepository('App\Entity\Univertuel\Prophecy\Game\Capacity\MagicDomain');
                $magicDomains = $magicDomainRepository->findAll();
                foreach ($magicDomains as $md)
                {
                    $sheetMagicDomain = new SheetMagicDomain();
                    $sheetMagicDomain->setMagicDomain($md);
                    $sheetMagicDomain->setSheet($sheet);
                    $sheetMagicDomain->setValue(0);
                    $em->persist($sheetMagicDomain);
                    $em->flush();
                }
                
                //purse sheet part
                $currencyRepository = $this->getDoctrine()->getRepository('App\Entity\Univertuel\Prophecy\Game\Item\Currency');
                $currencies = $currencyRepository->findAll();
                foreach ($currencies as $cur)
                {
                    $sheetPurse = new SheetPurse();
                    $sheetPurse->setCurrency($cur);
                    $sheetPurse->setSheet($sheet);
                    $sheetPurse->setValue(0);
                    $em->persist($sheetPurse);
                    $em->flush();
                }
                
                //wounds sheet part
                $woundsRepository = $this->getDoctrine()->getRepository('App\Entity\Univertuel\Prophecy\Game\Stat\Wounds');
                $wounds = $woundsRepository->findAll();
                foreach ($wounds as $wo)
                {
                    $sheetWounds = new SheetWounds();
                    $sheetWounds->setWounds($wo);
                    $sheetWounds->setMaxVal(0);
                    $sheetWounds->setCurrentValue(0);
                    $sheetWounds->setSheet($sheet);
                    $em->persist($sheetWounds);
                    $em->flush();
                }
                
                //attribute sheet part
                $attributeRepository = $this->getDoctrine()->getRepository('App\Entity\Univertuel\Prophecy\Game\Stat\Attribute'); 
                $attributes = $attributeRepository->findAll();
                foreach ($attributes as $at)
                {
                    $sheetAttributes = new SheetAttributes();
                    $sheetAttributes->setSheet($sheet);
                    $sheetAttributes->setAttribute($at);
                    $sheetAttributes->setValue(0);
                    $em->persist($sheetAttributes);
                    $em->flush();
                    
                }
                
                //caracteristic sheet part
                $caracteristicRepository =  $this->getDoctrine()->getRepository('App\Entity\Univertuel\Prophecy\Game\Stat\Caracteristic');
                $caracteristics = $caracteristicRepository->findAll();
                foreach ($caracteristics as $carac)
                {
                    $sheetCaracteristics = new SheetCaracteristics();
                    $sheetCaracteristics->setSheet($sheet);
                    $sheetCaracteristics->setCaracteristic($carac);
                    $sheetCaracteristics->setValue(0);
                    $em->persist($sheetCaracteristics);
                    $em->flush();
                }
                
                //skill sheet part
                $skillRepository = $this->getDoctrine()->getRepository('App\Entity\Univertuel\Prophecy\Game\Stat\Skill');
                $skills = $skillRepository->findAll();
                foreach ($skills as $skill)
                {
                    $sheetSkills = new SheetSkills();
                    $sheetSkills->setSheet($sheet);
                    $sheetSkills->setSkill($skill);
                    $sheetSkills->setValue(0);
                    $em->persist($sheetSkills);
                    $em->flush();
                }
                
                //statistic sheet part
                //A SUPPRIMER
                $statisticRepository = $this->getDoctrine()->getRepository('App\Entity\Univertuel\Prophecy\Game\Stat\Statistic');
                $statistics = $statisticRepository->findAll();
                foreach ($statistics as $stat)
                {
                    $sheetStatistic = new SheetStatistic();
                    $sheetStatistic->setSheet($sheet);
                    $sheetStatistic->setStatistic($stat);
                    $sheetStatistic->setValue(0);
                    
         
                }
                
                //TODO : SHEETADVANTAGE AND SHEETDISADVANTAGE
                
                $em->flush();
                
                return $this->redirectToRoute('sheet_new_step2', ['id' => $campaign->getId(),'id_sheet' => $sheet->getId() ]);
            }
            return $this->render('platform/member/sheet/form_sheet_new_step1.html.twig', ['form' =>$form->createView()]);
        }

    }
    
    //select omen property
    public function sheetStep2(Request $request, $id, $id_sheet)
    {
        $campaignRepository = $this->getDoctrine()->getRepository('App\Entity\Univertuel\Campaign\Campaign');
        $campaign = $campaignRepository->find($id);
        $sheetRepository = $this->getDoctrine()->getRepository('App\Entity\Univertuel\Prophecy\Sheet\Sheet');
        $sheet = $sheetRepository->find($id_sheet);
        $form = $this->createFormBuilder($sheet)
            ->add('omen', EntityType::class, [
                    'class' => Omen::class,
                    'choice_label' => 'code',
                    'expanded' => false,
                    'multiple' => false
                ])
            ->add('valider', SubmitType::class)
            ->getForm();
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($sheet);
            $em->flush();
            
            return $this->redirectToRoute('sheet_new_step3',['id' => $campaign->getId(),'id_sheet' => $sheet->getId() ]);
        }
        return $this->render('platform/member/sheet/form_sheet_new_step1.html.twig', ['form' =>$form->createView()]);
    }
    
    //select age property
    public function sheetStep3(Request $request, $id, $id_sheet)
    {
        $campaignRepository = $this->getDoctrine()->getRepository('App\Entity\Univertuel\Campaign\Campaign');
        $campaign = $campaignRepository->find($id);
        $sheetRepository = $this->getDoctrine()->getRepository('App\Entity\Univertuel\Prophecy\Sheet\Sheet');
        $sheet = $sheetRepository->find($id_sheet);
        $form = $this->createFormBuilder($sheet)
        ->add('age', EntityType::class, [
            'class' => Age::class,
            'choice_label' => 'code',
            'expanded' => false,
            'multiple' => false
        ])
        ->add('valider', SubmitType::class)
        ->getForm();
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($sheet);
            $em->flush();
            
            return $this->redirectToRoute('sheet_new_step4',['id' => $campaign->getId(),'id_sheet' => $sheet->getId() ]);
        }
        return $this->render('platform/member/sheet/form_sheet_new_step1.html.twig', ['form' =>$form->createView()]);
    }
    
    //select caste
    public function sheetStep4 (Request $request, $id, $id_sheet)
    {
        $campaignRepository = $this->getDoctrine()->getRepository('App\Entity\Univertuel\Campaign\Campaign');
        $campaign = $campaignRepository->find($id);
        $sheetRepository = $this->getDoctrine()->getRepository('App\Entity\Univertuel\Prophecy\Sheet\Sheet');
        $sheet = $sheetRepository->find($id_sheet);
        $form = $this->createFormBuilder($sheet)
        ->add('caste', EntityType::class, [
            'class' => Caste::class,
            'choice_label' => 'code',
            'multiple' => false,
            'expanded' => false
        ])
        ->add('valider', SubmitType::class)
        ->getForm();
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($sheet);
            $em->flush();
            return $this->redirectToRoute('sheet_select_caracteristics',['id' => $campaign->getId(),'id_sheet' => $sheet->getId() ]);
        }
         
        return $this->render('platform/member/sheet/form_sheet_new_step1.html.twig', ['form' =>$form->createView()]);
    }
    
    public function sheetSelectCaracteristics (Request $request, $id, $id_sheet)
    {
        $scoresAvailable = [3,4,5,6,7];
        $campaignRepository = $this->getDoctrine()->getRepository('App\Entity\Univertuel\Campaign\Campaign');
        $campaign = $campaignRepository->find($id);
        $sheetRepository = $this->getDoctrine()->getRepository('App\Entity\Univertuel\Prophecy\Sheet\Sheet');
        $sheet = $sheetRepository->find($id_sheet);
        $sheetCaracteristicsRepository = $this->getDoctrine()->getRepository('App\Entity\Univertuel\Prophecy\Sheet\SheetCaracteristics');
        $sheetCaracteristics = $sheetCaracteristicsRepository->findBy(['sheet' => $sheet]);
   
        return $this->render('platform/member/sheet/form_sheet_new_step2.html.twig', ['sheetCaracteristics' => $sheetCaracteristics]);
    }

    /**
     * 
     * @param Request $request
     * @param int sheet $id 
     * @return \Symfony\Component\HttpFoundation\Response
     * Role : traitement du formulaire des caractéristiques à la création du personnage
     * TODO gerer les modif dus a l age
     * TOD transformer l'input en select et ajouter une liste de valeurs
     */
    public function sheetCaracteristicsEdit (Request $request, $id)
    {
        $sheetRepository = $this->getDoctrine()->getRepository('App\Entity\Univertuel\Prophecy\Sheet\Sheet');
        $sheet = $sheetRepository->find($id);
        $sheetCaracteristicsRepository = $this->getDoctrine()->getRepository('App\Entity\Univertuel\Prophecy\Sheet\SheetCaracteristics');
        $sheetCaracteristics = $sheetCaracteristicsRepository->findBy(['sheet' => $sheet]);
        $em = $this->getDoctrine()->getManager();

        $caracteristicRepository = $this->getDoctrine()->getRepository('App\Entity\Univertuel\Prophecy\Game\Stat\Caracteristic');
        foreach ($sheetCaracteristics as $element)
        {
            $carac = $sheetCaracteristicsRepository->find($element->getId());
            $caracId = $carac->getCaracteristic()->getId();
            if(isset($_POST["$caracId"]))
            {
                $carac->setValue($_POST["$caracId"]);
                $em = $this->getDoctrine()->getManager();
                $em->persist($carac);
            }
            $em->flush();
        }
        
        return $this->render('platform/member/sheet/form_sheet_new_step3.html.twig');
    }
    
    public function sheetSelectMajorAttributes($id_sheet)
    {
        
    }
    
    
}
