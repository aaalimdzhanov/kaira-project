<?php

namespace App\Enums;

enum ProductStatus:string
{
    case PENDING = 'pending';
    case PUBLIC = 'public';
    case REJECTED = 'rejected';

    case UNAVAILABLE = 'unavailable';

}
