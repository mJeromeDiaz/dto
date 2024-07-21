<?php
namespace App\Controller;

use App\Dto\CurrentTimeDto;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;

#[ApiResource(
    operations: [
        new Get(
            uriTemplate: '/current-time',
            openapiContext: [
                'summary' => 'Get the current time',
                'description' => 'Returns the current date and time.',
                'responses' => [
                    '200' => [
                        'description' => 'The current date and time.',
                        'content' => [
                            'application/json' => [
                                'schema' => [
                                    'type' => 'object',
                                    'properties' => [
                                        'currentTime' => [
                                            'type' => 'string',
                                            'format' => 'date-time',
                                            'description' => 'The current date and time.',
                                            'example' => '2023-03-22T14:30:00+01:00',
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ),
    ],
)]
class CurrentTimeController extends AbstractController
{
    #[Route('/current-time', name: 'current_time', methods: ['GET'])]
    public function __invoke(): JsonResponse
    {
        $currentTime = new \DateTime();

        $dto = new CurrentTimeDto();
        $dto->currentTime = $currentTime->format('Y-m-d\TH:i:sP');

        return $this->json($dto);
    }
}
