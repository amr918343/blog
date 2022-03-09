<?php
namespace App\Traits;
trait MessageTrait {
    public function message($route, $type, $message) {
        return redirect()->route($route)->with($type, $message);
    }

    public function redirectBackWithMessage($type, $message) {
        return redirect()->back()->with($type, $message);
    }
}


?>