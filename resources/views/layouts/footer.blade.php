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



  <div class="modal fade" tabindex="-1" role="dialog" id="myModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Welcome to Greylady</h4>
      </div>
      <div class="modal-body">
        <p>Do you want to take a quick tour?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Skip</button>
        <button type="button" class="btn btn-primary" onclick="javascript:introJs().start();">Start tour</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

</div>


