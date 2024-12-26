<?php
namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Expense;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
{    
    public function index()
    {
        $userId =Auth::id();
        $expenses = Expense::with('category')->where('user_id',$userId)->paginate(10);
        return view('expenses.index', compact('expenses'));
    }

    /**
     * Show the form for creating a new expense.
     */
    public function create()
    {
        $categories=Category::all();
        return view('expenses.create', compact('categories'));
    }

    /**
     * Store a newly created expense in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'title' => 'required|string|regex:/^[A-Za-z\s]+$/',
            'amount' => 'required|numeric',
            'category' => 'required|exists:categories,id',
            'date' => 'required|date',
        ]);
        Expense::create([
            'title' => $request->title,
            'amount' => $request->amount,
            'user_id' => Auth::id(),
            'category_id' => $request->category,
            'date' => $request->date,
        ]);
        
       return redirect()->route('expenses.index')->with('success', 'Expense created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $expense=Expense::find($id);
        $categories=Category::all();
        return view('expenses.edit', compact('expense','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'category' => 'required|exists:categories,id',
            'date' => 'required|date',
        ]);
        Expense::where('id', $id)->update([
            'title' => $request->title,
            'amount' => $request->amount,
            'category_id' => $request->category,
            'date' => $request->date,
        ]);
        return redirect()->route('expenses.index')->with('success', 'Expense updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $expense = Expense::find($id);
        $expense->delete();
        return redirect()->route('expenses.index')->with('success', 'Expense deleted successfully.');
    }

    //Display a report of total expenses by category,along with filters for date range and category.

    public function report(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $categoryId = $request->input('category_id');
    
        $query = Expense::select('category_id', DB::raw('SUM(amount) as total_expenses'))
            ->with('category')
            ->groupBy('category_id');
    
        if ($startDate && $endDate) {
            $query->whereBetween('date', [$startDate, $endDate]);
        }
    
        if ($categoryId) {
            $query->where('category_id', $categoryId);
        }
    
        // Get the filtered results
        $expenses = $query->get();
    
        $categories = Category::all();
    
        return view('expenses.report', compact('expenses', 'categories', 'startDate', 'endDate', 'categoryId'));
    }  
    public function dashboard(Request $request){

        // Set default date range to 'Last Month'
    $startDate = Carbon::now()->subMonth()->startOfMonth();
    $endDate = Carbon::now()->subMonth()->endOfMonth();

    // Check if a custom date range is selected
    if ($request->has('start_date') && $request->has('end_date')) {
        $startDate = Carbon::parse($request->start_date);
        $endDate = Carbon::parse($request->end_date);
    }

    $expensesQuery = Expense::whereBetween('date', [$startDate, $endDate]);

    if ($request->has('category_id') && $request->category_id != 'all') {
        $expensesQuery->where('category_id', $request->category_id);
    }

    // Fetch expenses and group by category
    $expenses = $expensesQuery->get();

    // Calculate the total amount per category
    $categoryTotals = $expenses->groupBy('category_id')->map(function ($items) {
        return $items->sum('amount');
    });

    $categories = Category::all();

    // Calculate the total amount spent in the selected range
    $totalAmount = $expenses->sum('amount');

    return view('dashboard', compact('categoryTotals', 'categories', 'totalAmount', 'startDate', 'endDate'));
    }  
}
