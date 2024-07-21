<?php
namespace App\Dto;

use ApiPlatform\Metadata\ApiProperty;

class CurrentTimeDto
{
    #[ApiProperty(
        description: 'The current date and time.',
        example: '2023-03-22T14:30:00+01:00',
    )]
    public string $currentTime;
}
