<?php

use \Bitrix\Main\Loader;

if (Loader::includeModule("czebra.project")) {
    \Czebra\Project\Events::create();
}
if (Loader::includeModule("czebra.auth")) {
    \Czebra\Project\Events::create();
}
if (Loader::includeModule("czebra.south")) {
    \Czebra\Project\Events::create();
}
