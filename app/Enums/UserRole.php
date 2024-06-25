<?php

namespace App\Enums;
enum UserRole: string
{
   case ADMIN = 'ADMIN';
   case SYNDIC = 'SYNDIC';
   case RESIDENT = 'RESIDENT';
}