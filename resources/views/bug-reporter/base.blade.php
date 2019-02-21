<style type="text/css">
  .report-bug-wrapper {
    position: fixed;
    bottom: 10px;
    right: 10px;
  }

  .bug-reporter textarea {
    width: 100%;
    height: 100px;
  }

  .code-snippet {
    background: #f4f4f4;
    border: 1px solid #ddd;
    border-left: 3px solid #f36d33;
    color: #666;
    page-break-inside: avoid;
    font-family: monospace;
    font-size: 15px;
    line-height: 1.6;
    margin-bottom: 1.6em;
    max-width: 100%;
    overflow: auto;
    padding: 1em 1.5em;
    display: block;
    word-wrap: break-word;
  }
  .code-snippet.short {
    height: 100px;
    overflow-y: scroll;
  }

  .hidden-but-visible {
    position: absolute;
    left: -99999px;
    bottom: -99999px;
    font-size: 5px;
  }
</style>


<!-- Button trigger modal -->
<div class="report-bug-wrapper">
  <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
    Report Bug
  </button>  
</div>


<div class="modal fade bug-reporter" tabindex="-1" role="dialog" id="myModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        @yield('title')
        
      </div>
      <div class="modal-body">
        @yield('body')
      </div>
      <div class="modal-footer">
        @yield('buttons')
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->