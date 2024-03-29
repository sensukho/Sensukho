<?php

namespace Sensukho\ListaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sensukho\ListaBundle\Entity\Product;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('SensukhoListaBundle:Default:index.html.twig', array('name' => $name));
    }
/*
    public function articulosAction($id,$year,$lang) {
    	//-- Simulamos obtener los datos de la base de datos cargando los articulos a un array
		$articulos = array(
			array('id' => 1, 'title' => 'Articulo numero 1', 'created' =>'2011-01-01'),
			array('id' => 2, 'title' => 'Articulo numero 2', 'created' =>'2011-01-01'),
			array('id' => 3, 'title' => 'Articulo numero 3', 'created' =>'2011-01-01'),
		);

		//-- Buscamos dentro del array el ID solicitado 
		$articuloSeleccionado = null; foreach($articulos as $articulo){
			if($articulo['id'] == $id) {
				$articuloSeleccionado = $articulo;
				break;
			}
		}
		//-- Invocamos a nuestra nueva plantilla, pasando los datos
		return $this->render('SensukhoListaBundle:Default:articulos.html.twig',array('articulos' => $articulos, 'articulo' => $articuloSeleccionado, 'lang' => $lang));
		//return $this->render('SensukhoListaBundle:Default:articulos.html.twig', array('articulos' => $articulos));
	}
*/

	public function articulosAction($id,$year,$lang) {
    	$product = new Product();
    	$product->setName('A Foo Bar');
    	$product->setPrice('19.99');
    	$product->setDescription('Lorem ipsum dolor');

    	$em = $this->getDoctrine()->getManager();
    	$em->persist($product);
    	$em->flush();

    	return new Response('Created product id '.$product->getId());
	}
}
