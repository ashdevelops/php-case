<?php

namespace CaseConverter;

enum CaseType : int
{
    case Camel = 1;
    case Pascal = 2;
    case Snake = 3;
    case Kebab = 4;
    case Dot = 5;
    case Unknown = 6;
}
