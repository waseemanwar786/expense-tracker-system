<?php

namespace App\Imports;

use App\Models\Expense;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ExpenseImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    
     public function model(array $row)
     {
         $category = Category::where('name', $row['category'])->first();
     
         $date = Carbon::parse($row['date']);
      
         return new Expense([
             'title' => $row['title'],
             'amount' => $row['amount'],
             'category_id' => $category ? $category->id : null,
             'date' => $date,
             'user_id' => Auth::id(),
         ]);
     }
     
}