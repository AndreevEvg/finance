<?php

namespace App\FinanceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use App\FinanceBundle\Entity\Product;
use App\FinanceBundle\Entity\Category;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use App\FinanceBundle\Form\Product\ProductType;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;

class DefaultController extends Controller {

    public function indexAction() {

        $foo = $this->get("foo");
        $name = $foo->send();
        
        return $this->render('AppFinanceBundle:Default:index.html.twig', [
            'name' => $name,
        ]);
    }

    //Создать запись
    public function createRecordAction(Request $request) {

        $product = new Product();
        $product->setDate(new \DateTime());

        $form = $this->createForm(new ProductType(), $product);

        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($product);
                $em->flush();

                $this->addFlash('notice', 'Сохранено!');

                return $this->redirect($this->generateUrl('app_finance_homepage'));
            }
        }

        return $this->render('AppFinanceBundle:Default:createRecord.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    //Выбрать записи из БД
    public function reportsAction(Request $request) {

        $name = $request->request->get("text");

        $product = $this->getDoctrine()
            ->getRepository('AppFinanceBundle:Product')
            ->findAllOrderedByName();
//          ->findBy(
//              array('name' => array('Ekaterina', 'Evgeniy'))
//          );


        return $this->render('AppFinanceBundle:Default:reports.html.twig', [
            'product' => $product,
        ]);
    }

    public function helloAction($name) {

        if ($name != "John") {
            return $this->redirect($this->generateUrl('app_finance_homepage'));
        }

        return $this->render('AppFinanceBundle:Default:hello.html.twig', [
            'name' => $name,
        ]);
    }

}
