<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelDecrypter extends Model
{
    public function decryptModel(Model $model)
    {
        foreach ($model->getEncryptable() as $attribute) {
            $model->setAttribute($attribute, decrypt($model->getAttribute($attribute)));
        }

        return $model;
    }

    public function decryptCollection(Collection $collection)
    {
        return $collection->map(function (Model $model) {
            return $this->decryptModel($model);
        });
    }
}
