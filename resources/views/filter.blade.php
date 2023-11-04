<div class="d-flex justify-content-between my-5">
    <div class="form-inline">
        <select id="categoryFilter" class="form-control mr-2">
            <option value="">All Categories</option>
            @foreach($categoriesList as $cat)
                @if($selected_category === $cat)
                    <option value="{{ $cat }}" selected>{{ $cat }}</option>
                @else
                    <option value="{{ $cat }}">{{ $cat }}</option>
                @endif
            @endforeach
        </select>
        <button onclick="filterProducts()" class="btn btn-primary">Apply Filter</button>
    </div>
    <div class="form-inline">
        <form method="get" action="{{ route('specificSearch.index') }}" class="form-inline">
            <input type="text" name="searchField" class="form-control mr-2" placeholder="Search by name..">
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>
</div>