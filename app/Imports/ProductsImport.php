<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Excel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
      
        return new Product([
          'name' => $row['name'],
          'detail' => $row['detail'],
          'image' => $row['image']
        ]);
    }
}
