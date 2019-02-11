
@extends('layouts.app')


@section('content')

<div id="message-area"></div>

<div class=" col-md-4">

  @include('listings.general.simple')

  <div class="row"></div>

  @include('scenario.controls')  

</div>
<div class=" col-md-4">

  @include('scenario.new-scenario')  

</div>
<div class=" col-md-4">

  @include('scenario.base-scenario')      

</div>




@endsection


@section('footer-scripts')

  <!-- page script -->
  <script type="text/javascript">

    var listing_id = '{{ $listing->id }}';

    updateFormDisplayValues();      
    getFinancialScenario();


    $('form input').on('change', function () {
    
      updateFormDisplayValues();      
      getFinancialScenario();

    });

    function updateFormDisplayValues () {

      var form = $( '#scenario-control input' ).each(function(index, el) {

        var id = 'span#' + el.name;
        $(id).html(el.value);
        
      });

    }

    function getFinancialScenario () {

      var form_values = $( '#scenario-control' ).serialize();

      var url = '/api/secure?url=scenario&listing_id=' + listing_id + '&' + form_values;

      console.log(url);

      $.get(url, function(data) {
        
        data = jQuery.parseJSON(data);

        console.log(data);

        buildFinancialForms(data);

      });

    }


    function buildFinancialForms (data) {
      $('#new-scenario').html(' ');        
      $('#base-scenario').html(' ');        


      buildListFromObject(data.new_calculated_fields.financial_information, 'Financial Information', '#new-scenario');
      buildListFromObject(data.new_calculated_fields.mortgage_information, 'Mortgage Information', '#new-scenario');
      buildListFromObject(data.new_calculated_fields.operating_profit_and_loss.monthly, 'Operating P&L', '#new-scenario');


      buildListFromObject(data.calculated_fields[0].financial_information, 'Financial Information', '#base-scenario');
      buildListFromObject(data.calculated_fields[0].mortgage_information, 'Mortgage Information', '#base-scenario');
      buildListFromObject(data.calculated_fields[0].operating_profit_and_loss.monthly, 'Operating P&L', '#base-scenario');
    }

    function buildListFromObject (object, title, appendTo ) {

      var html = '';
      html += '<h5>' + title + '</h5>';
      html += '<ul>';

      html += '</ul>';

      for (key in object) {

        if ( object[key] < 10 ) {
          html += '<li><b>' + key + ': </b>' + formatPercentage(object[key]) + '</li>';  
        } else if ( object[key] > 10 ) {
          html += '<li><b>' + key + ': </b>' + formatCurrency(object[key], 2) + '</li>';  
        }

        
      }

      $(html).appendTo(appendTo);

    }


  </script>

  <style type="text/css">

    #scenario-control div {
      float: left;
    }    
    #scenario-control label {
      width: 100px;
      float: left;
      margin: 5px;
    }    
    #scenario-control span {
      float: left;
      margin: 5px;
      width: 50px;
    }    
    #scenario-control input {
      width: 150px;
      float: left;
      margin: 5px;
    }    

  </style>



@endsection 



@section('header-scripts')

  {{-- <link rel="stylesheet" href="/css/listings-details.css"> --}}

@endsection 


@section('page-title')

  {{-- <div class="explore-details-header">
    <h3><span>{{ $listing->details->location->address }}, {{ $listing->details->location->city }} {{ $listing->details->location->zip }}</span></h3>
  </div> --}}


@endsection