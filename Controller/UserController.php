<?php

namespace RB\UserBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use RB\UserBundle\Entity\User;

/**
 * @Route("/User")
 */
class UserController extends Controller
{
    /**
     * @Route("/create", name="rb_user_create")
     */
    public function createAction(Request $request)
    {
        $r = [
            'infotype' => 'success',
            'msg'      => 'ok'
        ];

        return new JsonResponse($r);    
    }

    /**
     * @Route("/upd/{id}", name="rb_user_upd")
     */
    public function updAction(Request $request, User $User)
    {
        $d = $request->request->get("fos_user_profile_form");
/*
        $editForm = $this->createForm('RB\UserBundle\Form\ProfileFormType', $User);
        $editForm->handleRequest($request);
*/
        $birthday = $d['birthday'];
        $birthday  = new \Datetime($birthday['year'].'-'.$birthday['month'].'-'.$birthday['day']);

        $User->setAdress($d['adress']);
        $User->setCp($d['cp']);
        $User->setCity($d['city']);
        $User->setLastname($d['lastname']);
        $User->setFirstname($d['firstname']);
        $User->setBusinessName($d['businessName']);
        $User->setTel($d['tel']);
        $User->setCity($d['city']);
        $User->setBirthday($birthday);

        $em = $this->getDoctrine()->getManager();
        $em->persist($User);
        $em->flush();
        $resp=true;

        /* SERVICE : serializer */
        $u = $this->get('rb.serializer')->normalize($User);
        /* END SERVICE :  serializer */

        $r = [
            'infotype' => 'success',
            'msg'      => 'ok',
            'data'     => $u,
            'r'        => $resp
        ];

        return new JsonResponse($r);    
    }

    /**
     * @Route("/lock", name="rb_user_lock")
     */
    public function lockAction(Request $request)
    {
        $r = [
            'infotype' => 'success',
            'msg'      => 'ok'
        ];

        return new JsonResponse($r);    
    }

    /**
     * @Route("/del", name="rb_user_del")
     */
    public function delAction(Request $request)
    {
        $r = [
            'infotype' => 'success',
            'msg'      => 'ok'
        ];

        return new JsonResponse($r);    
    }

    /**
     * @Route("/expose", name="rb_user_expose")
     */
    public function exposeAction(Request $request)
    {
        $r = [
            'infotype' => 'success',
            'msg'      => 'ok'
        ];

        return new JsonResponse($r);    
    }

}
