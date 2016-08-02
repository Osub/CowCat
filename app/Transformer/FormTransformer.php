<?php
namespace App\Transformer;


class FormTransformer extends Transformer
{
    public function transform($form)
    {
        return [
            'id' => $form['id'],
            'fid'=> $form['fid'],
        ];
    }
}