<?php

namespace App\Enums;

enum QuestionType: string
{
    case Input = 'input';
    case Dropdown = 'dropdown';
    case CheckBox = 'checkbox';
}
