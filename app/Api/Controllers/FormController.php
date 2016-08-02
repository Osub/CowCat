<?php
namespace App\Api\Controllers;

use App\Api\Controllers\BasicController;
use App\Models\Form;
use App\Api\Transformers\FormTransformer;
class FormController extends BasicController
{
    public function index()
    {
        $forms = Form::all();
        return $this->collection($forms,new FormTransformer());
    }

}