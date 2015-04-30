<?php
/**
 * AccueilManagerPDO.php made by Sheol
 * 30/04/2015 - 10:47
 */

namespace Model;

use Entities\Accueil;

class AccueilManagerPDO extends AccueilManager {
    public function test() {
        $request = $this->dao->prepare("SELECT * FROM forum_members WHERE id_member = :id");
        $request->bindValue(':id', 3, \PDO::PARAM_INT);
        $request->execute();
        return $request->fetch(\PDO::FETCH_ASSOC);
    }

    public function testBis(Accueil $accueil) {
        $accueil->setFirstTest("test");
        return $accueil->getFirstTest();
    }
}
