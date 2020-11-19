<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //protected $table = 'nometabelacustomizado';

    protected $fillable = ['name', 'price', 'description', 'image'];

    public function search($filter = null)
    {
        $result = $this->where(function ($query) use($filter){
            $query->where('name', 'LIKE', "%{$filter}%")
            ->orWhere('description', 'LIKE', "%{$filter}%");
        })//->toSql();dd($result);
        ->paginate();

        return $result;
    }
}
