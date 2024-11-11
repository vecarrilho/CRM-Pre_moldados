<?php
namespace App\Enums;
use Filament\Support\Contracts\HasLabel;
 
enum RolesEnum: string implements HasLabel
{
    case SuperAdmin = 'super_admin';
    case Representative = 'representative';
   
    
    public function getLabel(): ?string
    {
        return match ($this) {
            self::SuperAdmin => 'Super Admin',
            self::Representative => 'Representante',
        };
    }
}