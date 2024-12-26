<x-app-layout>
    <div class="container">
        <div class="d-flex justify-content-between align-items-center w-100">
            <div>
                <h2 class="mt-2">Expense Report</h2>
                <p class="mt-2">Please select the category and date range (By default date range is set one month)</p>
            </div>
            <a href="{{ route('expenses.index') }}" class="btn btn-info text-white">Add Expenses</a>
        </div>
        
        <form method="GET" action="{{ route('dashboard') }}">
            <div class="row">
                
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="category_id">Category</label>
                        <select class="form-control" name="category_id" id="category_id">
                            <option value="all" {{ request('category_id') == 'all' ? 'selected' : '' }}>All Categories</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
    
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="start_date">Start Date</label>
                        <input type="date" class="form-control" name="start_date" value="{{ request('start_date', $startDate->toDateString()) }}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="end_date">End Date</label>
                        <input type="date" class="form-control" name="end_date" value="{{ request('end_date', $endDate->toDateString()) }}">
                    </div>
                </div>
    
                <div class="d-flex justify-between col-md-12 mt-3">
                    <button type="submit" class="btn btn-primary">Filter</button>
                    <h4>Total Amount: ${{ number_format($totalAmount, 2) }} </h4>
                </div>
            </div>
        </form>
        
        <h5 class="mt-2">Breakdown by Category:</h5>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Category</th>
                    <th>Total Amount</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categoryTotals as $categoryId => $total)
                    @php
                        $category = $categories->firstWhere('id', $categoryId);
                    @endphp
                    <tr>
                        <td>{{ $category ? $category->name : 'Unknown' }}</td>
                        <td>${{ number_format($total, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
