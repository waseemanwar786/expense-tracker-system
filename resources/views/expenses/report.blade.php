<x-app-layout>
<div class="container">
    <div class="card-header d-flex justify-content-between align-items-center pt-4 pb-4">
        <h4>Expenses Report</h4>
        <a href="{{ route('expenses.index') }}" class="btn btn-info text-white">Back to Expenses</a>
    </div>
    <form method="GET" action="{{ route('expenses.report') }}">
        <div class="row mb-3">
            <div class="col-md-4">
                <input type="date" name="start_date" class="form-control" placeholder="Start Date" value="{{ old('start_date', $startDate) }}">
            </div>
            <div class="col-md-4">
                <input type="date" name="end_date" class="form-control" placeholder="End Date" value="{{ old('end_date', $endDate) }}">
            </div>
            <div class="col-md-4">
                <select name="category_id" class="form-control">
                    <option value="">All Categories</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == $categoryId ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Filter</button>
    </form>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Category</th>
                <th>Total Expenses</th>
            </tr>
        </thead>
        <tbody>
            @foreach($expenses as $expense)
                <tr>
                    <td>{{ $expense->category->name }}</td>
                    <td>${{ $expense->total_expenses }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</x-app-layout>
