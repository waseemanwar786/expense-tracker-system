<x-app-layout>
    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
    <div style="margin-left: 350px; margin-right: 350px;" class="card mt-4">
        <div class="card-header d-flex justify-content-between align-items-center pt-4 pb-4">
           <h4>Upload Expense</h4>
           <a href="{{ route('expenses.index') }}" class="btn btn-info text-white">Back to Expenses</a>
        </div>
    
        <div class="card-body">
            <form action="{{ route('expenses.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="file">Upload Expense File (CSV or Excel)</label>
                    <input type="file" name="file" class="form-control" id="file" required>
                </div>
                <button type="submit" class="btn btn-success mt-4">Upload</button>
            </form>
            
        </div>
    </div>
    </x-app-layout>
    