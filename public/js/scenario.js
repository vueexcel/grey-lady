
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

  $('#request').html(url);

  $.get(url, function(data) {
    
    $('#response').html(data);

    data = jQuery.parseJSON(data);

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