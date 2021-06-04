<?php

namespace App\Controller\Univertuel\Game;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Univertuel\Game\Game;
use App\Form\Univertuel\Game\NewGameType;
use App\Entity\Univertuel\Game\Category;
use App\Form\Univertuel\Game\NewCategoryFormType;
use App\Entity\Univertuel\Prophecy\Game\Capacity\Advantage;
use App\Form\Univertuel\Prophecy\Game\Capacity\AdvantageFormType;
use App\Form\Univertuel\Prophecy\Game\Capacity\DisadvantageFormType;
use App\Entity\Univertuel\Prophecy\Game\Capacity\Disadvantage;
use App\Entity\Univertuel\Prophecy\Game\Capacity\Discipline;
use App\Form\Univertuel\Prophecy\Game\Capacity\DisciplineFormType;
use App\Entity\Univertuel\Prophecy\Game\Capacity\MagicDomain;
use App\Form\Univertuel\Prophecy\Game\Capacity\MagicDomainFormType;
use App\Entity\Univertuel\Prophecy\Game\Stat\Age;
use App\Form\Univertuel\Prophecy\Game\Stat\AgeFormType;
use App\Entity\Univertuel\Prophecy\Game\Stat\Country;
use App\Form\Univertuel\Prophecy\Game\Stat\CountryFormType;
use App\Form\Univertuel\Prophecy\Game\Stat\MagicManaFormType;
use App\Entity\Univertuel\Prophecy\Game\Stat\Omen;
use App\Entity\Univertuel\Prophecy\Game\Stat\MagicMana;
use App\Form\Univertuel\Prophecy\Game\Stat\OmenFormType;
use App\Entity\Univertuel\Prophecy\Game\Stat\StatisticCategory;
use App\Form\Univertuel\Prophecy\Game\Stat\StatisticCategoryFormType;
use App\Entity\Univertuel\Prophecy\Game\Stat\Statistic;
use App\Form\Univertuel\Prophecy\Game\Stat\StatisticFormType;
use App\Entity\Univertuel\Prophecy\Game\Stat\Tendency;
use App\Form\Univertuel\Prophecy\Game\Stat\TendencyFormType;
use App\Entity\Univertuel\Prophecy\Game\Stat\Wounds;
use App\Form\Univertuel\Prophecy\Game\Stat\WoundsFormType;
use App\Entity\Univertuel\Prophecy\Game\Item\ArmorCategory;
use App\Entity\Univertuel\Prophecy\Game\Item\Armor;
use App\Form\Univertuel\Prophecy\Game\Item\ArmorFormType;
use App\Entity\Univertuel\Prophecy\Game\Item\WeaponCategory;
use App\Form\Univertuel\Prophecy\Game\Item\WeaponCategoryFormType;
use App\Entity\Univertuel\Prophecy\Game\Item\CombatWeapon;
use App\Form\Univertuel\Prophecy\Game\Item\CombatWeaponFormType;
use App\Entity\Univertuel\Prophecy\Game\Item\HastWeapon;
use App\Form\Univertuel\Prophecy\Game\Item\HastWeaponFormType;
use App\Entity\Univertuel\Prophecy\Game\Item\RangeWeapon;
use App\Form\Univertuel\Prophecy\Game\Item\RangeWeaponFormType;
use App\Entity\Univertuel\Prophecy\Game\Item\Currency;
use App\Form\Univertuel\Prophecy\Game\Item\CurrencyFormType;
use App\Entity\Univertuel\Prophecy\Game\Item\Various;
use App\Form\Univertuel\Prophecy\Game\Item\VariousFormType;
use App\Form\Univertuel\Prophecy\Game\Item\ArmorCategoryFormType;
use App\Entity\Univertuel\Prophecy\Game\Stat\Skill;
use App\Form\Univertuel\Prophecy\Game\Stat\SkillFormType;
use App\Entity\Univertuel\Prophecy\Game\Stat\Attribute;
use App\Form\Univertuel\Prophecy\Game\Stat\AttributeFormType;
use App\Entity\Univertuel\Prophecy\Game\Stat\Caracteristic;
use App\Form\Univertuel\Prophecy\Game\Stat\CaracteristicFormType;
use App\Entity\Univertuel\Prophecy\Game\Stat\AgeCaracteristic;
use App\Form\Univertuel\Prophecy\Game\Stat\AgeCaracteristicFormType;
use App\Entity\Univertuel\Prophecy\Game\Stat\Caste;
use App\Form\Univertuel\Prophecy\Game\Stat\CasteFormType;


class GameController extends AbstractController
{
    public function gameHomepageView ()
    {
        $gameRepository = $this->getDoctrine()->getRepository('App\Entity\Univertuel\Game\Game');
        $games = $gameRepository->findAll();
        
        return $this->render("platform/member/game/game_homepage.html.twig", ['games' => $games]);
    }
    
    public function gameNew(Request $request)
    {
        $game = new Game();
        $form = $this->createForm(NewGameType::class, $game);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($game);
            $em->flush();
            return $this->redirectToRoute('game_homepage');
            //+add flash message message 
        }
        return $this->render('platform\member\game\form_game_new.html.twig', ['form' => $form->createView()]); 
    }
    
    public function categoryNew(Request $request)
    {
        $category = new Category();
        $form = $this->createForm(NewCategoryFormType::class, $category);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($category);
            $em->flush();
        }
        return $this->render('platform\member\game\form_category_game_new.html.twig', ['form' => $form->createView()]);
        
    }
    
    public function gameEdit ($id)
    {      
        $gameRepository = $this->getDoctrine()->getRepository('App\Entity\Univertuel\Game\Game');
        $game = new Game();
        $game = $gameRepository->find($id);
        $code = $game->getCode();
        switch($code)
        {
            case str_contains(strtolower($code), "prophecy"):
                return $this->render('univertuel/prophecy/prophecy_admin_homepage.html.twig');
                break;
                
            case str_contains(strtolower($code), "dark earth"):
                return $this->render('univertuel/prophecy/dark_earth_admin_homepage.html.twig');
                break;
        }
        
    }
    
    public function gameEditElement(Request $request, $id)
    {
        $element;
        $form;
        $title;
        switch($id)
        {
            case "Advantage":
                $element = new Advantage();
                $form = $this->createForm(AdvantageFormType::class,$element);
                $title = "d'un avantage";
                break;
               
            case "Disadvantage":
                $element = new Disadvantage();
                $form = $this->createForm(DisadvantageFormType::class,$element);
                $title = "d'un inconvénient";
                break;
                
            case "Discipline":
                $element = new Discipline();
                $form = $this->createForm(DisciplineFormType::class,$element);
                $title = "d'une discipline";
                break;
                
            case "MagicDomain":
                $element = new MagicDomain();
                $form = $this->createForm(MagicDomainFormType::class,$element);
                $title = "d'un domaine de magie";
                break;
                
            case "Spell":
                $element = new MagicDomain();
                $form = $this->createForm(MagicDomainFormType::class,$element);
                $title = "d'un sortilège";
                break;
                
            case "Age":
                $element = new Age();
                $form = $this->createForm(AgeFormType::class,$element);
                $title = "d'un âge";
                break;
                
            case "AgeCarac":
                $element = new AgeCaracteristic();
                $form = $this->createForm(AgeCaracteristicFormType::class, $element);
                $title = "des modificateurs d'age";
                break;
        
            case "Country":
                $element = new Country();
                $form = $this->createForm(CountryFormType::class,$element);
                $title = "d'un pays d'origine";
                break;
                
            case "MagicMana":
                $element = new MagicMana();
                $form = $this->createForm(MagicManaFormType::class,$element);
                $title = "d'une réserve de magie";
                break;
        
            case "Omen":
                $element = new Omen();
                $form = $this->createForm(OmenFormType::class,$element);
                $title = "d'un augure";
                break;
                
            case "Skill":
                $element = new Skill();
                $form = $this->createForm(SkillFormType::class, $element);
                $title = "d'une campétence";
                break;
                
            case "Attribute":
                $element = new Attribute();
                $form = $this->createForm(AttributeFormType::class, $element);
                $title = "d'un attribut";
                break;
                
            case "Caracteristic":
                $element = new Caracteristic();
                $form = $this->createForm(CaracteristicFormType::class, $element);
                $title = "d'une caractéristique";
                break;
                
            case "StatisticCategory":
                $element = new StatisticCategory();
                $form = $this->createForm(StatisticCategoryFormType::class,$element);
                $title = "d'une catégorie de statistique";
                break;
                
            case "Statistic":
                $element = new Statistic();
                $form = $this->createForm(StatisticFormType::class,$element);
                $title = "d'un élément de statistique";
                break;
                
            case "Tendency":
                $element = new Tendency();
                $form = $this->createForm(TendencyFormType::class,$element);
                $title = "d'une tendance";
                break;
                
            case "Wounds":
                $element = new Wounds();
                $form = $this->createForm(WoundsFormType::class,$element);
                $title = "d'une blessure";
                break;
                
            case "ArmorCategory":
                $element = new ArmorCategory();
                $form = $this->createForm(ArmorCategoryFormType::class,$element);
                $title = "d'une catégorie d'armure";
                break;
                
            case "Armor":
                $element = new Armor();
                $form = $this->createForm(ArmorFormType::class,$element);
                $title = "d'une armure";
                break;
                
            case "WeaponCategory":
                $element = new WeaponCategory();
                $form = $this->createForm(WeaponCategoryFormType::class,$element);
                $title = "d'une catégorie d'arme";
                break;
            
            case "CombatWeapon":
                $element = new CombatWeapon();
                $form = $this->createForm(CombatWeaponFormType::class,$element);
                $title = "d'une arme de corps à corps";
                break;
            
            case "HastWeapon":
                $element = new HastWeapon();
                $form = $this->createForm(HastWeaponFormType::class,$element);
                $title = "d'une arme d'hast";
                break;
                
            case "RangeWeapon":
                $element = new RangeWeapon();
                $form = $this->createForm(RangeWeaponFormType::class,$element);
                $title = "d'une arme à distance";
                break;
                
            case "Currency":
                $element = new Currency();
                $form = $this->createForm(CurrencyFormType::class,$element);
                $title = "d'une monnaie";
                break;
                
            case "Various":
                $element = new Various();
                $form = $this->createForm(VariousFormType::class,$element);
                $title = "d'un objet quelconque";
                break;
                
            case "Caste":
                $element = new Caste();
                $form = $this->createForm(CasteFormType::class,$element);
                $title = "d'une caste";
                break;          
        }
        
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($element);
            $em->flush();
        }
        return $this->render('univertuel\prophecy\form_prophecy_game_elements.html.twig',
            ['form' => $form->createView(), 'title' => $title]);
    }
}
