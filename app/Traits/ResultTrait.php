<?
namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

trait ResultTrait {
    public function updateModel(Model $model, Request $request, int $id, $route,  $success_message, $error_message) {
    $row = $model::findOrFail($id);
                if ($row) { 
                    $row->title = $request->title;
                    $row->body = $request->body;
                    $row->save();
                    return $this->message($route, 'success', $success_message);
                } else {
                    return $this->message($route, 'error', $error_message);
                }
    }

}