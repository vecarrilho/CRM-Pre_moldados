<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum StatusEnum: string implements HasLabel, HasColor
{   
    case NOT_STARTED = 'not_started';
    case CREATED = 'created';
    case IN_PROCESS = 'in_process';
    case APROVED = 'aproved';
    case FAILED = 'failed';
    public function getLabel(): ?string
    {
        return match ($this) {
            self::NOT_STARTED => 'Não Iniciada',
            self::CREATED => 'Criado',
            self::IN_PROCESS => 'Em processo',
            self::APROVED => 'Aprovado',
            self::FAILED => 'Reprovado',
        };
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::NOT_STARTED => 'info',
            self::CREATED => 'success',
            self::IN_PROCESS => 'warning',
            self::APROVED => 'success',
            self::FAILED => 'danger',
        };
    }

}