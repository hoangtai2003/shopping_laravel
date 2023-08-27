<?php
namespace App\Traits;
use Illuminate\Support\Facades\Log;
use Exception;
trait DeleteModelTrait{
    public function deleteModelTrait($id, $model){
        try {
            $model->find($id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'success'
            ], status: 200);
        } catch(Exception $exp){
            Log::error("Message: " . $exp->getMessage() . 'Line: ' . $exp->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'fail'
            ], status: 500);
       }
    }
}
