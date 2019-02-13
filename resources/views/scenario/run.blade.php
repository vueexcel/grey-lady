
@extends('layouts.app')


@section('content')

<div id="message-area"></div>

<div class=" col-md-5">
  @include('scenario.controls')    
</div>

<div class=" col-md-7">
  @include('scenario.table')
</div>

@endsection


@section('footer-scripts')

  <!-- page script -->
  <script type="text/javascript">

    var listing_id = '{{ $listing->id }}';

    updateFormDisplayValues();      
    getFinancialScenario();


    $('#scenario-control input').on('change', function () {
    
      updateFormDisplayValues();      
      getFinancialScenario();

    });

    function updateFormDisplayValues () {

      var form = $( '#scenario-control input' ).each(function(index, el) {

        var id = 'span#' + el.name;

        if (el.value < 10) {

          $(id).html( formatPercentage(el.value) )
          
        } else {

          $(id).html( formatCurrency(el.value, 3) );  
        }
        
        
      });

    }

    function getFinancialScenario () {

      var form_values = $( '#scenario-control-form' ).serialize();

      var url = '/api/secure?url=scenario&listing_id=' + listing_id + '&' + form_values;

      console.log(url);

      $.get(url, function(data) {
        
        data = jQuery.parseJSON(data);

        console.log(data);

        buildFinancialForms(data);

      });

    }


    function buildFinancialForms (data) {
      
      $('#scenario-table').html(' ');

      var html = ''
      html += '<table>';
      html += '<tr>';
      html += '<td><b>Metric</b></td>';
      html += '<td><b>New Scenario</b></td>';
      html += '<td><b>Base Scenarios</b></td>';
      html += '<td><b>Difference</b></td>';
      html += '</tr>';

      html += buildTableFromObjects(data.new_calculated_fields.financial_information,data.calculated_fields[0].financial_information, 'Financial Information', '#scenario-table');
      html += buildTableFromObjects(data.new_calculated_fields.mortgage_information,data.calculated_fields[0].mortgage_information, 'Mortgage Information', '#scenario-table');
      html += buildTableFromObjects(data.new_calculated_fields.operating_profit_and_loss.monthly, data.calculated_fields[0].operating_profit_and_loss.monthly, 'Operating P&L', '#scenario-table');

      html += '</table>';

      $('#scenario-table').append(html);

    }

    function buildTableFromObjects(new_object, base_object, title, appendTo) {

      var html = ''      

      for (key in new_object) {


        if (typeof new_object[key] !== 'object') {

            html += '<tr>';
            html += '<td><b>' + key + '</b></td>';

            if ( new_object[key] < 10 ) {

              html += '<td>' + formatPercentage(new_object[key]) + '</td>';
              html += '<td>' + formatPercentage(base_object[key]) + '</td>';
              html += '<td>' + formatPercentage((base_object[key] - new_object[key])) + '</td>';
          
            
            } else if ( new_object[key] > 10 ) {

              html += '<td>' + formatCurrency(new_object[key],3) + '</td>';
              html += '<td>' + formatCurrency(base_object[key], 3) + '</td>';
              html += '<td>' + formatCurrency((base_object[key] - new_object[key]), 3) + '</td>';
            
            }

          html += '</tr>';

        }
      
      }

      return html;
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
      width: 25px;
    }    
    #scenario-control input {
      width: 100px;
      float: left;
      margin: 5px;
    }    

    table {
      box-sizing: border-box;
      width: 100%;
      max-width: 100%;
      border-collapse: collapse;
      border: solid #e0e0dc;
      border-width: 1px 0 0 1px;
    }

    table td {
      border: solid #e0e0dc;
      border-width: 0 1px 1px 0;
      padding: 6px 8px;
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