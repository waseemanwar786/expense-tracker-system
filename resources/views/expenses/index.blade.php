<x-app-layout>
    @if(session('success'))
    <div id="successMessage" class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
<div class="card mx-4 mt-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4>Expenses details</h4>
        <a href="{{ route('expenses.report') }}" class="btn btn-primary">View Report</a>
    </div>
    <div class="card-body">
        <div class=" d-flex justify-content-between align-items-center">
          <a class="btn btn-xs btn-success mb-2" href="{{ route('expenses.create') }}">Create Expense</a>
             <div>
               <a class="btn btn-xs btn-success mb-2" href="{{ route('expenses.importForm') }}">Upload Excel File</a>
               <a class="btn btn-xs btn-success mb-2" href="{{ route('expenses.export') }}">Download Excel File</a>
             </div>
        </div>
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Expense">
                <thead>
                    <tr>
                       
                        <th>ID</th>
                        <th>Expense Title</th>
                        <th>Amount</th>
                        <th>Category</th>
                        <th>Date</th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($expenses as $key => $expense)
                        <tr data-entry-id="{{ $expense->id }}">
                           
                            <td>
                                {{ $expense->id ?? '' }}
                            </td>
                            <td>
                                {{ $expense->title ?? '' }}
                            </td>
                            <td>
                               ${{ number_format($expense->amount ?? '' , 2)}}
                            </td>
                            <td>
                                {{ $expense->category->name ?? '' }}
                            </td>
                            <td>
                                {{ $expense->date ?? '' }}
                            </td>
                            <td>
                                    <a class="btn btn-xs btn-info text-white" href="{{ route('expenses.edit', $expense->id) }}">Edit</a>
                                    <form action="{{ route('expenses.destroy', $expense->id) }}" method="POST" onsubmit="return confirm('Are you sure?');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="Delete">
                                    </form>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{$expenses->links()}}
    </div>
</div>

</x-app-layout>
<script>
    // Automatically remove the success message after 2 seconds
    setTimeout(function() {
        let messageElement = document.getElementById('successMessage');
        if (messageElement) {
            messageElement.style.transition = "opacity 0.5s ease"; 
            messageElement.style.opacity = 0;
            setTimeout(() => messageElement.remove(), 500); 
        }
    }, 2000); 
</script>



