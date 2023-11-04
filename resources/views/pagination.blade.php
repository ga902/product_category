<div class="row">
    <div class="col">
          @if($prevPageUrl)
            @if(isset($searchField))
                <a href="{{ $search == 1 ? 'search' : 'products' }}?searchField={{ $searchField }}&id={{ $prevPageUrl }}" class="btn btn-primary">Previous</a>
            @else
                <a href="{{ $search == 1 ? 'search' : 'products' }}?id={{ $prevPageUrl }}" class="btn btn-primary">Previous</a>
            @endif
          @endif

          @if($nextPageUrl)
            @if(isset($searchField))
                <a href="{{ $search == 1 ? 'search' : 'products' }}?searchField={{ $searchField }}&id={{ $nextPageUrl }}" class="btn btn-primary">Next</a>
            @else
                <a href="{{ $search == 1 ? 'search' : 'products' }}?id={{ $nextPageUrl }}" class="btn btn-primary">Next</a>
            @endif
          @endif
      </div>
  </div>