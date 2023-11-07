<?php

namespace Goldfinch\Component\BlankItem\Pages\Nest;

use Goldfinch\Component\BlankItem\Controllers\Nest\BlanksController;
use Goldfinch\Nest\Pages\Nest;

class Blanks extends Nest
{
    private static $table_name = 'Blanks';
    private static $controller_name = BlanksController::class;

    private static $icon_class = 'bi-circle';
}
