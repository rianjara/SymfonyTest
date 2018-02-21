<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use AppBundle\Entity\Estudiante;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class EstudianteController extends Controller
{

    private function doctrineExeQuery($entity)
    {
        // entity manager
        $em = $this->getDoctrine()->getManager();
        // tells Doctrine you want to (eventually) save the Product (no queries yet)
        $em->persist($entity);
        // actually executes the queries (i.e. the INSERT query)
        $em->flush();
    }

    public function listarAction(Request $request)
    {
        $studentRepository = $this->getDoctrine()->getRepository('AppBundle:Estudiante');
        $estudiantes = $studentRepository->findAll();
        $argsArray = [
            'estudiantes' => $estudiantes
        ];
        $templateName = 'estudiante/listar';
        return $this->render($templateName . '.html.twig', $argsArray);
    }

    public function crearAction(Request $request)
    {
        $http_status = 500;

        $nombre = $request->get('nombre');

        $estudiante = new Estudiante();
        $estudiante->setNombre($nombre);

        $this->doctrineExeQuery($estudiante);

        $estudiante_id = $estudiante->getId();

        if ($estudiante_id) {
            $http_status = 201;
            $data = array(
                "id" => $estudiante->getId(),
                "mensaje" => "Estudiante CREADO"
            );
        } else {
            $http_status = 202;
            $data = array("error" => "Estudiante NO creado");
        }

        $response = new JsonResponse($data, $http_status);
        return $response;
    }

    public function eliminarAction($id)
    {
        // entity manager
        $em = $this->getDoctrine()->getManager();
        $studentRepository = $this->getDoctrine()->getRepository('AppBundle:Estudiante');
        // find thge student with this ID
        $estudiante = $studentRepository->find($id);

        if ($estudiante) {
            $estudiante_id = $estudiante->getId();
            // tells Doctrine you want to (eventually) delete the Student (no queries yet)
            $em->remove($estudiante);
            // actually executes the queries (i.e. the DELETE query)
            $em->flush();
        }

        if ($estudiante) {
            $http_status = 201;
            $data = array(
                "id" => $estudiante_id,
                "mensaje" => "Estudiante ELIMINADO",
            );
        } else {
            $http_status = 500;
            $data = array("error" => "Estudiante NO eliminado");
        }

        $response = new JsonResponse($data, $http_status);
        return $response;
    }

    public function actualizarAction(Request $request)
    {

        $id = $request->get('id');
        $nombre_nuevo = $request->request->get('nombre');

        $em = $this->getDoctrine()->getManager();
        $estudiante = $em->getRepository('AppBundle:Estudiante')->find($id);
        $estudiante->setNombre($nombre_nuevo);
        $em->flush();

        if ($estudiante) {
            $http_status = 201;
            $data = array(
                "id" => $estudiante->getId(),
                "nombre" => $estudiante->getNombre(),
                "mensaje" => "Estudiante ACTUALIZADO",
            );
        } else {
            $http_status = 500;
            $data = array("error" => "Estudiante NO acualizado (No encontrado)");
        }

        $response = new JsonResponse($data, $http_status);
        return $response;
    }

}
