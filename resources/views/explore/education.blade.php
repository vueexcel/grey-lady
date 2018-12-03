<div class="box box-default">
  <div class="box-body">
    
    <h4>Education</h4>

    @if (isset($zip[0]->details->education))

      <ul>

      @foreach ($zip[0]->details->education as $key => $education_stat)

        <li><b>{{ $key }}:</b> {{ $education_stat }}</li>
      
      @endforeach

      </ul>

    @endif  

  </div>
</div>