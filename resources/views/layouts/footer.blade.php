<div class="container">
    <div class="pull-right hidden-xs">        
        @php $news = json_decode($news, true); @endphp
        @foreach( $news as $newsItem )
            @if( strtolower($newsItem['type']) == 'app' )
                <b>Version</b> {{ $newsItem['version'] }}
                @break
            @endif
        @endforeach
    </div>
</div>

