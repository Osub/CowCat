<?php

namespace App\Api\Transformers;


use League\Fractal\TransformerAbstract;
use App\Models\Form;

class FormTransformer extends TransformerAbstract
{
    public function transform(Form $form)
    {
        return [
            'id' => $form['id'],
            'fid'=> $form['fid'],
        ];
    }
}