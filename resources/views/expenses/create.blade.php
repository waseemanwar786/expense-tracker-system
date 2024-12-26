<x-app-layout>
<div style="margin-left: 350px; margin-right: 350px;" class="card mt-4">
    <div class="card-header d-flex justify-content-between align-items-center pt-4 pb-4">
       <h4>Create Expense</h4>
       <a href="{{ route('expenses.index') }}" class="btn btn-info text-white">Back to Expenses</a>
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("expenses.store")}}">
            @csrf
            <div class="form-group">
                <label class="required" for="title">Title</label>
                <input class="form-control title {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title') }}" required>
                @if($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="amount">Amount($)</label>
                <input class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}" type="number" name="amount" id="amount" value="{{ old('amount', '') }}" step="1" required>
                @if($errors->has('amount'))
                    <span class="text-danger">{{ $errors->first('amount') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <select class="form-control" name="category" id="category">
                        <option selected>Select</option>
                        @foreach ($categories as $category)
                        <option value="{{$category->id}}" >{{$category->name}}</option>
                        @endforeach
                </select>
                @if($errors->has('category'))
                    <span class="text-danger">{{ $errors->first('category') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="date">Date</label>
                <input class="form-control {{ $errors->has('date') ? 'is-invalid' : '' }}" type="date" name="date" id="date" value="{{ old('date', '') }}" required>
                @if($errors->has('date'))
                    <span class="text-danger">{{ $errors->first('date') }}</span>
                @endif
            </div>
            <div class="form-group">
                <button class="btn btn-success mt-4" type="submit">Save</button>
            </div>
        </form>
    </div>
</div>
</x-app-layout>
