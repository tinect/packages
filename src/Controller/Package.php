<?php

namespace App\Controller;

use App\Repository\PackageRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class Package extends AbstractController
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route(path="/packages/{name}", name="package", requirements={"name"="[A-Za-z0-9_.-]+(/[A-Za-z0-9_.-]+?)?/"})
     */
    public function package(string $name, Request $request): Response
    {
        /** @var PackageRepository $repository */
        $repository = $this->entityManager->getRepository(\App\Entity\Package::class);

        $package = $repository->findOne($name);

        if (!$package) {
            throw new NotFoundHttpException(\sprintf('Cannot find package by name %s', $name));
        }

        $selectedVersion = $request->query->get('version', $package->getNewestVersion());
        $foundVersion = $version = $package->getVersions()->current();

        if ($selectedVersion) {
            foreach ($package->getVersions() as $version) {
                if ($version->getVersion() === $selectedVersion) {
                    $foundVersion = $version;
                }
            }
        }

        return $this->render('package.html.twig', [
            'package' => $package,
            'version' => $foundVersion,
        ]);
    }
}
