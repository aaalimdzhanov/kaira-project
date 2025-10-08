<?php

namespace App\Enums;

enum OrderStatus:string
{
    case NEW = 'new';

    case REJECTED = 'rejected';

    case COMPLETED = 'completed';

}
