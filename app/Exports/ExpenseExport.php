<?php

namespace App\Exports;

use App\Models\Expense;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ExpenseExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Expense::where('user_id', Auth::id())->get(); 
    }

    public function headings(): array
    {
        return [
            'ID',
            'Title',
            'Amount',
            'Category', 
            'Date', 
        ];
    }

    public function map($expense): array
    {
        return [
            $expense->id,
            $expense->title,
            $expense->amount,
            $expense->category->name, 
            $expense->date, 
        ];
    }
}