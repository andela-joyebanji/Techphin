<div class="ui three wide column rail computer only" id="categories">
    <div class="ui sticky">
        <div class="ui stacked segment">
            <div class="ui middle aligned selection list">
                <h3 class="ui header dividing">Categories</h3>
                @forelse ($categories as $category)
                    <a href="{{ url('/videos/category/'.$category->name) }}" class="item">
                        <i class="{{ $category->icon }}  icon"></i>
                        <div class="content">
                            {{ $category->name }}
                        </div>
                    </a>
                @empty
                    <div class="item">
                        <div class="content">
                            No Video Category yet.
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
