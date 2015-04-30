<?php
/**
 * AccueilManager.php made by Sheol
 * 28/04/2015 - 17:34
 */

namespace Model;

use Core\Manager;
use Entities\Accueil;

abstract class AccueilManager extends Manager {
    abstract public function test();
    abstract public function testBis(Accueil $accueil);
}
