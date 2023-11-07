<?php

namespace App\Controller;

use App\Entity\Provider;
use App\Entity\ProviderType;
use App\Form\Type\ProviderFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProviderController extends AbstractController
{
    /**
     * @Route("/provider", name="list")
     */
    public function index(): Response
    {
        // Supongamos que tienes una entidad llamada Product
        $repository = $this->getDoctrine()->getRepository(Provider::class);

        // Encuentra todos los productos
        $providers = $repository->findAll();

        return $this->render('provider/index.html.twig', [
            'controller_name' => 'ProviderController',
            'providers' => $providers
        ]);
    }



     /**
     * @Route("/provider/new", name="create")
     */
    public function create(Request $request): Response
    {
        $provider = new Provider();
        $form = $this->createForm(ProviderFormType::class);
        $form->handleRequest($request);

        $repository = $this->getDoctrine()->getRepository(ProviderType::class);
        $providerTypes = $repository->findAll();
    
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            $provider = new Provider();

            $provider->setName($data->getName());
            $provider->setEmail($data->getEmail());
            $provider->setContactPhone($data->getContactPhone());
            $provider->setActive($data->getActive());
            $provider->setProviderTypeId((int)$data->getProviderTypeId());
            $provider->setCreatedAt();
            $provider->setUpdatedAt();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($provider);
            $entityManager->flush();

            return $this->redirectToRoute('list');
        }

        return $this->render('provider/new.html.twig', [
            'provider' => $provider,
            'providerTypes' => $providerTypes,
            'form' => $form->createView(),
        ]);

    }

     /**
     * @Route("/{id}/edit", name="edit")
     */
    public function update(Request $request, $id = null): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $provider = $this->getDoctrine()->getRepository(Provider::class)->find($id);

        $form = $this->createForm(ProviderFormType::class, $provider);

        $repository = $this->getDoctrine()->getRepository(ProviderType::class);
        $providerTypes = $repository->findAll();

        // $form = $this->createForm(EditPasswordType::class, $user);
        // $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('list');

            // if (!$provider) {
            //     $provider = new provider();
            // }
            // $provider->setName('Keyboard');
            // $provider->setEmail(1999);
            // $provider->setContact_phone('Ergonomic and stylish!');
            // $provider->setActive('Ergonomic and stylish!');
            // $provider->setProviderTypeId('Ergonomic and stylish!');
            
        }
   
        return $this->render('provider/edit.html.twig', [
            'controller_name' => 'ProviderController',
            'provider' => $provider,    
            'providerTypes' => $providerTypes,    
            'form' => $form->createView(),

        ]);

    }

      /**
     * @Route("/provider/delete/{id}", name="delete")
     */
    public function delete($id): Response
    {
        $provider = $this->getDoctrine()->getRepository(Provider::class)->find($id);
        $repositoryObject = $this->getDoctrine()->getManager();
        $repositoryObject->remove($provider);
        $repositoryObject->flush();

        return $this->redirectToRoute('list');
    }

}
