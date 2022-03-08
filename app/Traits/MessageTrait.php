<?php
namespace App\Traits;
trait MessageTrait {
    public function message($route, $type, $message) {
        return redirect()->route($route)->with($type, $message);
    }
}


?>