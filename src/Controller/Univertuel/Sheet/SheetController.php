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
use App\Form\Univertuel\Prophecy\Sheet\SheetEditFormType;
use App\Form\Univertuel\Prophecy\Sheet\SheetAttributesFormType;
use App\Repository\Univertuel\Prophecy\Game\Stat\WoundsRepository;

//TODO : mettre dans une fonction(private?) le chargement de certaines donnees comme sheet et campaign

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
   
        return $this->render('platform/member/sheet/form_sheet_new_step2.html.twig', ['sheetCaracteristics' => $sheetCaracteristics, 'campaign' => $campaign]);
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
    public function sheetCaracteristicsEdit (Request $request, $id, $campaign)
    {
        $sheetRepository = $this->getDoctrine()->getRepository('App\Entity\Univertuel\Prophecy\Sheet\Sheet');
        $sheet = $sheetRepository->find($id);
        $campaignRepository = $this->getDoctrine()->getRepository('App\Entity\Univertuel\Campaign\Campaign');
        $campaign = $campaignRepository->find($campaign);
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
                $em->persist($carac);
            }
            $em->flush();
        }
        
        return $this->redirectToRoute('sheet_select_major_attributes', ['campaign' => $campaign->getId(), 'id_sheet' => $sheet->getId()]);
    }
   
    public function sheetSelectMajorAttributes(Request $request,$id_sheet, $campaign)
    {
        $campaignRepository = $this->getDoctrine()->getRepository('App\Entity\Univertuel\Campaign\Campaign');
        $campaign = $campaignRepository->find($campaign);
        $sheetRepository = $this->getDoctrine()->getRepository('App\Entity\Univertuel\Prophecy\Sheet\Sheet');
        $sheet = $sheetRepository->find($id_sheet);
        $sheetAttributesRepository = $this->getDoctrine()->getRepository('App\Entity\Univertuel\Prophecy\Sheet\SheetAttributes');
        $sheetAttributes = $sheetAttributesRepository->findBy(['sheet' => $sheet]);
        
        return $this->render('platform/member/sheet/form_sheet_new_step4.html.twig', ['sheetAttributes' => $sheetAttributes, 'campaign' => $campaign]);
    }
    
    public function sheetMajorAttributesEdit(Request $request,$id_sheet, $campaign)
    {
        $campaignRepository = $this->getDoctrine()->getRepository('App\Entity\Univertuel\Campaign\Campaign');
        $campaign = $campaignRepository->find($campaign);
        $sheetRepository = $this->getDoctrine()->getRepository('App\Entity\Univertuel\Prophecy\Sheet\Sheet');
        $sheet = $sheetRepository->find($id_sheet);
        $sheetAttributesRepository = $this->getDoctrine()->getRepository('App\Entity\Univertuel\Prophecy\Sheet\SheetAttributes');
        $sheetAttributes = $sheetAttributesRepository->findBy(['sheet' =>$sheet]);
        $em = $this->getDoctrine()->getManager();
        $attributeRepository = $this->getDoctrine()->getRepository('App\Entity\Univertuel\Prophecy\Game\Stat\Attribute');
        foreach ($sheetAttributes as $element)
        {
            $attribute = $sheetAttributesRepository->find($element->getId());
            $attributeId = $attribute->getId();
            if(isset($_POST["$attributeId"]))
            {
                $attribute->setValue($_POST["$attributeId"]);
                $em->persist($attribute);
            }
            $em->flush();
        }
        
        return $this->redirectToRoute('sheet_set_initiative', ['id_sheet' => $sheet->getId(), 'campaign' => $campaign->getId()]);
        //return $this->render('platform/member/sheet/form_sheet_new_step4.html.twig',['sheetAttributes' => $sheetAttributes, 'campaign' => $campaign]);
    }
    
    public function sheetSetInitiative ($id_sheet, $campaign)
    {
        $campaignRepository = $this->getDoctrine()->getRepository('App\Entity\Univertuel\Campaign\Campaign');
        $campaign = $campaignRepository->find($campaign);
        $sheetRepository = $this->getDoctrine()->getRepository('App\Entity\Univertuel\Prophecy\Sheet\Sheet');
        $sheet = $sheetRepository->find($id_sheet);
        $caracteristicRepository = $this->getDoctrine()->getRepository('App\Entity\Univertuel\Prophecy\Game\Stat\Caracteristic');
        $coordination = $caracteristicRepository->findOneBy(['name' => 'coordination']);
        $sheetCaracteristicsRepository = $this->getDoctrine()->getRepository('App\Entity\Univertuel\Prophecy\Sheet\SheetCaracteristics');
        $coo = $sheetCaracteristicsRepository->findOneBy(['sheet' => $sheet, 'caracteristic' =>$coordination]);
        $perception = $caracteristicRepository->findOneBy(['name' => 'perception']);
        $per = $sheetCaracteristicsRepository->findOneBy(['sheet' => $sheet, 'caracteristic' =>$perception]);
        $value = $per->getValue()+$coo->getValue();
        
        $initiative = 0;
        switch($value)
        {
            case $value < 6:
                $initiative = 1;
                break;
                
            case $value < 10: 
                $initiative = 2;
                break;
            
            case $value < 14:
                $initiative = 3;
                break;
                
            case $value < 17:
                $initiative = 4;
                break;
                
            default:
                $initiative = 5;
                break;
                
        }
        $sheet->setInitiative($initiative);
        $em = $this->getDoctrine()->getManager();
        $em->persist($sheet);
        $em->flush();
        
        //a enlever, rediriger vers la prochaine etape
       
        return $this->redirectToRoute('sheet_set_wounds',['id_sheet' => $sheet->getId(), 'campaign' => $campaign->getId()]);
    }
    
    public function sheetInitWounds ($id_sheet, $campaign)
    {
        $campaignRepository = $this->getDoctrine()->getRepository('App\Entity\Univertuel\Campaign\Campaign');
        $campaign = $campaignRepository->find($campaign);
        $sheetRepository = $this->getDoctrine()->getRepository('App\Entity\Univertuel\Prophecy\Sheet\Sheet');
        $sheet = $sheetRepository->find($id_sheet);
        
        //get sum(volonte+resistance of sheet)
        $caracteristicRepository = $this->getDoctrine()->getRepository('App\Entity\Univertuel\Prophecy\Game\Stat\Caracteristic');
        $resistance = $caracteristicRepository->findOneBy(['name' => 'resistance']);
        $sheetCaracteristicsRepository = $this->getDoctrine()->getRepository('App\Entity\Univertuel\Prophecy\Sheet\SheetCaracteristics');
        $res = $sheetCaracteristicsRepository->findOneBy(['sheet' => $sheet, 'caracteristic' =>$resistance]);
        $volonte = $caracteristicRepository->findOneBy(['name' => 'volonte']);
        $vol = $sheetCaracteristicsRepository->findOneBy(['sheet' => $sheet, 'caracteristic' =>$volonte]);
        $sum = $res->getValue() + $vol->getValue(); 
        
        $woundsRepository = $this->getDoctrine()->getRepository('App\Entity\Univertuel\Prophecy\Game\Stat\Wounds');
        $sheetWoundsRepository = $this->getDoctrine()->getRepository('App\Entity\Univertuel\Prophecy\Sheet\SheetWounds');
        $em = $this->getDoctrine()->getManager();
        $egratignure = $woundsRepository->findOneBy(['name' => 'egratignure']);
        $legere = $woundsRepository->findOneBy(['name' => 'legere']);
        $grave = $woundsRepository->findOneBy(['name' => 'grave']);
        $fatale = $woundsRepository->findOneBy(['name' => 'fatale']);
        $mort = $woundsRepository->findOneBy(['name' => 'mort']);
        
        switch($sum)
        {
            case $sum < 5:
                $sheetWounds = $sheetWoundsRepository->findOneBy(['wounds' => $egratignure, 'sheet' => $sheet]);
                $sheetWounds->setMaxVal(3);
                $sheetWounds->setCurrentValue(3);
                $em->persist($sheetWounds);
                $em->flush();
                
                $sheetWounds = $sheetWoundsRepository->findOneBy(['wounds' => $legere, 'sheet' => $sheet])->setMaxVal(1);
                $sheetWounds->setCurrentValue(1);
                $sheetWounds->setMaxVal(1);
                $em->persist($sheetWounds);
                $em->flush();
                
                $sheetWounds = $sheetWoundsRepository->findOneBy(['wounds' => $grave, 'sheet' => $sheet]);
                $sheetWounds->setCurrentValue(1);
                $sheetWounds->setMaxVal(1);
                $em->persist($sheetWounds);
                $em->flush();
                
                $sheetWounds = $sheetWoundsRepository->findOneBy(['wounds' => $fatale, 'sheet' => $sheet]);
                $sheetWounds->setCurrentValue(1);
                $sheetWounds->setMaxVal(1);
                $em->persist($sheetWounds);
                $em->flush();
                
                $sheetWounds = $sheetWoundsRepository->findOneBy(['wounds' => $mort, 'sheet' => $sheet]);
                $sheetWounds->setCurrentValue(1);
                $sheetWounds->setMaxVal(1);
                $em->persist($sheetWounds);
                $em->flush();     
                break;   
                
            case $sum < 10:
                $sheetWounds = $sheetWoundsRepository->findOneBy(['wounds' => $egratignure, 'sheet' => $sheet]);
                $sheetWounds->setMaxVal(3);
                $sheetWounds->setCurrentValue(3);
                $em->persist($sheetWounds);
                $em->flush();
                
                $sheetWounds = $sheetWoundsRepository->findOneBy(['wounds' => $legere, 'sheet' => $sheet])->setMaxVal(1);
                $sheetWounds->setCurrentValue(2);
                $sheetWounds->setMaxVal(2);
                $em->persist($sheetWounds);
                $em->flush();
                
                $sheetWounds = $sheetWoundsRepository->findOneBy(['wounds' => $grave, 'sheet' => $sheet]);
                $sheetWounds->setCurrentValue(1);
                $sheetWounds->setMaxVal(1);
                $em->persist($sheetWounds);
                $em->flush();
                
                $sheetWounds = $sheetWoundsRepository->findOneBy(['wounds' => $fatale, 'sheet' => $sheet]);
                $sheetWounds->setCurrentValue(1);
                $sheetWounds->setMaxVal(1);
                $em->persist($sheetWounds);
                $em->flush();
                
                $sheetWounds = $sheetWoundsRepository->findOneBy(['wounds' => $mort, 'sheet' => $sheet]);
                $sheetWounds->setCurrentValue(1);
                $sheetWounds->setMaxVal(1);
                $em->persist($sheetWounds);
                $em->flush();
                break;
                
            case $sum < 15:
                $sheetWounds = $sheetWoundsRepository->findOneBy(['wounds' => $egratignure, 'sheet' => $sheet]);
                $sheetWounds->setMaxVal(3);
                $sheetWounds->setCurrentValue(3);
                $em->persist($sheetWounds);
                $em->flush();
                
                $sheetWounds = $sheetWoundsRepository->findOneBy(['wounds' => $legere, 'sheet' => $sheet])->setMaxVal(1);
                $sheetWounds->setCurrentValue(2);
                $sheetWounds->setMaxVal(2);
                $em->persist($sheetWounds);
                $em->flush();
                
                $sheetWounds = $sheetWoundsRepository->findOneBy(['wounds' => $grave, 'sheet' => $sheet]);
                $sheetWounds->setCurrentValue(2);
                $sheetWounds->setMaxVal(2);
                $em->persist($sheetWounds);
                $em->flush();
                
                $sheetWounds = $sheetWoundsRepository->findOneBy(['wounds' => $fatale, 'sheet' => $sheet]);
                $sheetWounds->setCurrentValue(1);
                $sheetWounds->setMaxVal(1);
                $em->persist($sheetWounds);
                $em->flush();
                
                $sheetWounds = $sheetWoundsRepository->findOneBy(['wounds' => $mort, 'sheet' => $sheet]);
                $sheetWounds->setCurrentValue(1);
                $sheetWounds->setMaxVal(1);
                $em->persist($sheetWounds);
                $em->flush();
                break;
            
            case $sum < 20:
                $sheetWounds = $sheetWoundsRepository->findOneBy(['wounds' => $egratignure, 'sheet' => $sheet]);
                $sheetWounds->setMaxVal(3);
                $sheetWounds->setCurrentValue(3);
                $em->persist($sheetWounds);
                $em->flush();
                
                $sheetWounds = $sheetWoundsRepository->findOneBy(['wounds' => $legere, 'sheet' => $sheet])->setMaxVal(1);
                $sheetWounds->setCurrentValue(3);
                $sheetWounds->setMaxVal(3);
                $em->persist($sheetWounds);
                $em->flush();
                
                $sheetWounds = $sheetWoundsRepository->findOneBy(['wounds' => $grave, 'sheet' => $sheet]);
                $sheetWounds->setCurrentValue(2);
                $sheetWounds->setMaxVal(2);
                $em->persist($sheetWounds);
                $em->flush();
                
                $sheetWounds = $sheetWoundsRepository->findOneBy(['wounds' => $fatale, 'sheet' => $sheet]);
                $sheetWounds->setCurrentValue(2);
                $sheetWounds->setMaxVal(2);
                $em->persist($sheetWounds);
                $em->flush();
                
                $sheetWounds = $sheetWoundsRepository->findOneBy(['wounds' => $mort, 'sheet' => $sheet]);
                $sheetWounds->setCurrentValue(1);
                $sheetWounds->setMaxVal(1);
                $em->persist($sheetWounds);
                $em->flush();
                break;
                
            case $sum < 25:
                $sheetWounds = $sheetWoundsRepository->findOneBy(['wounds' => $egratignure, 'sheet' => $sheet]);
                $sheetWounds->setMaxVal(3);
                $sheetWounds->setCurrentValue(3);
                $em->persist($sheetWounds);
                $em->flush();
                
                $sheetWounds = $sheetWoundsRepository->findOneBy(['wounds' => $legere, 'sheet' => $sheet])->setMaxVal(1);
                $sheetWounds->setCurrentValue(4);
                $sheetWounds->setMaxVal(4);
                $em->persist($sheetWounds);
                $em->flush();
                
                $sheetWounds = $sheetWoundsRepository->findOneBy(['wounds' => $grave, 'sheet' => $sheet]);
                $sheetWounds->setCurrentValue(3);
                $sheetWounds->setMaxVal(3);
                $em->persist($sheetWounds);
                $em->flush();
                
                $sheetWounds = $sheetWoundsRepository->findOneBy(['wounds' => $fatale, 'sheet' => $sheet]);
                $sheetWounds->setCurrentValue(2);
                $sheetWounds->setMaxVal(2);
                $em->persist($sheetWounds);
                $em->flush();
                
                $sheetWounds = $sheetWoundsRepository->findOneBy(['wounds' => $mort, 'sheet' => $sheet]);
                $sheetWounds->setCurrentValue(1);
                $sheetWounds->setMaxVal(1);
                $em->persist($sheetWounds);
                $em->flush();
                break;
                
        }
        //a enlever et modifier par la prochaine etape
        //return $this->render('platform/member/sheet/form_sheet_new_step3.html.twig');
        return $this->redirectToRoute('sheetInitChanceMastery', ['id_sheet' => $sheet->getId(), 'campaign' => $campaign->getId()]);
    }
    
    //travailler a base de formulaire de sheet
    public function sheetInitChanceMastery (Request $request, $id_sheet, $campaign)
    {
        $campaignRepository = $this->getDoctrine()->getRepository('App\Entity\Univertuel\Campaign\Campaign');
        $campaign = $campaignRepository->find($campaign);
        $sheetRepository = $this->getDoctrine()->getRepository('App\Entity\Univertuel\Prophecy\Sheet\Sheet');
        $sheet = $sheetRepository->find($id_sheet);
        
        $points = 0;
        $age = $sheet->getAge()->getCode();
        switch($age)
        {
            case $result = hash_equals($age,"enfant")     :
                $sheet->setChance(4);
                $points = 3;
                break;
            case $result = hash_equals($age,"adolescent") :
                $sheet->setChance(2);
                $points = 4;
                break;
            case $result = hash_equals($age,"adulte")     :
                $points = 6;
                break;
            case $result = hash_equals($age,"ancien")     :
                $sheet->setMastery(2);
                $points = 4;
                break;
            case $result = hash_equals($age,"venerable")  :
                $sheet->setMastery(4);
                $points = 3;
                break;
                
        }
        $form = $this->createFormBuilder($sheet)
        ->add('mastery', NumberType::class)
        ->add('chance', NumberType::class)
        ->add('submit', SubmitType::class)
        ->getForm();
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($sheet);
            $em->flush();
            return $this->render('platform/member/sheet/form_sheet_new_step3.html.twig');
        }
        return $this->render('platform/member/sheet/form_sheet_new_step6.html.twig', ['form' => $form->createView(), 'points' => $points]);
    }
    
    //public function sheetInitTendencies()
    
    //public function sheetInitDisadvantages()
    
    //public function sheetInitAdvantages()
    
    //public function sheetInitCasteSkills()
    
    //public function sheetInitSkills ()
    
    //public function sheetInitPrivilege() attention, la classe Privilege n est pas encore cree
    
    //public function sheetInitFamous()
    
    //public function sheetInitMagicalPower ()

    
}
