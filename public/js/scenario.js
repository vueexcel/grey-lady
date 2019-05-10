updateFormDisplayValues();      
getFinancialScenario();


$('#scenario-control input.range-value').on('change', function () {

  updateFormDisplayValues();      
  getFinancialScenario();

});

$('#scenario-control input.scenario-value').on('change', function (event) {
  
  updateFormManualValues( event );
  getFinancialScenario();
  updateFormDisplayValues();

});

function updateFormDisplayValues () {

  var form = $( '#scenario-control input.range-value' ).each(function(index, el) {

    var id = 'input.scenario-value#' + el.name;
    
    if (el.value < 10) {      

      $(id).val( formatPercentage(el.value) );
      // $(id).html( formatPercentage(el.value) )
      
    } else {

      $(id).val( formatCurrency(el.value, 3) );
      // $(id).html( formatCurrency(el.value, 3) );  
    }
        
  });

}

function updateFormManualValues( event ) {

  var value, range_id;
  value = event.target.value;
  range_id = '#' + event.target.id + '_range';
  if( isNaN( value ) ){

    if( value.indexOf('$') > -1 ){    
      $(range_id).val( formatCurrencyToDigits( value.substr(1) ) );    
    } 
    if( value.indexOf('%') > -1 ) {
      $(range_id).val( formatPercentageToDigits( parseFloat(value), $(range_id).attr('max') ) );  
    }

  } else {
    $(range_id).val( formatCurrencyToDigits( parseFloat( value ) ) );
  }

}

function getFinancialScenario () {

  var form_values = $( '#scenario-control-form' ).serialize();
 
  var url = '/api/secure?url=scenario&listing_id=' + listing_id + '&' + form_values;

  $('#request').html(url);
  
  $.get(url, function(data) {
    
    $('#response').html(data);
    
    data = jQuery.parseJSON(data);
    
    const event = new CustomEvent('data',{detail : data})
    window.dispatchEvent(event)
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

  data = data[0];

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

        if ( new_object[key] < 10 && new_object[key] > 0 ) {

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