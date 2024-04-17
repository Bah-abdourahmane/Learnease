<?php

namespace App\Enums;

enum Provider: string
{
        case Google = 'google';
        case Github = 'github';
        case Facebook = 'facebook';

        public static function values(): array
        {
                return array_map(fn (self $provider) => $provider->value, self::cases());
        }
}
