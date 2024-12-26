<?php

namespace App\Http\Controllers;
use App\Imports\ExpenseImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\ExpenseExport;

class ExcelController extends Controller
{
    public function showImportForm()
    {
        return view('expenses.importForm'); 
    }

    public function import(Request $request)
    {
        
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv|max:2048',
        ]);

        // Handle file upload and import
        try {
            $file = $request->file('file');
            Excel::import(new ExpenseImport, $file);

            // Redirect back with success message
            return redirect()->route('expenses.index')->with('success', 'Expenses imported successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error importing expenses: ' . $e->getMessage());
        }
    }
    public function export() 
{
    return Excel::download(new ExpenseExport, 'expenses.xlsx');
}
}
