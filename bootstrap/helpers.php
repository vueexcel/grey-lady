<?php 

function formatPercentage($number_to_format, $places_to_format = false) {
	
	switch ($places_to_format) {
		case 1:
			$string_to_return = sprintf("%.1f%%", $number_to_format * 100);
			break;
		
		default:
			$string_to_return = sprintf("%.0f%%", $number_to_format * 100);
			break;
	}
	

	return $string_to_return;

}

function formatLargeCurrency($num, $digits = 2) {

	 if($num>10000) {

        return "$" . formatLargeNumber($num);

  } else {
  	return "$" . number_format($num, $digits);
  }

  return $num;
}


function formatLargeNumber($num) {

	 if($num>1000) {

        $x = round($num);
        $x_number_format = number_format($x);
        $x_array = explode(',', $x_number_format);
        $x_parts = array('k', 'm', 'b', 't');
        $x_count_parts = count($x_array) - 1;
        $x_display = $x;
        $x_display = $x_array[0] . ((int) $x_array[1][0] !== 0 ? '.' . $x_array[1][0] : '');
        $x_display .= $x_parts[$x_count_parts - 1];

        return $x_display;

  }

  return $num;
}

function formatProgressBar($percentage, $color = 'blue') {
	$string_to_return = '';
	$string_to_return .= '<div class="progress vertical">';
	$string_to_return .= '<div class="progress vertical">';
	$string_to_return .= '<div class="progress-bar progress-bar-'.$color.'" role="progressbar" aria-valuenow="'.$percentage.'" aria-valuemin="0" aria-valuemax="100" style="height:'.$percentage.'">' ;
	$string_to_return .= '<span class="sr-only">'.$percentage.'%</span>' ;
	$string_to_return .= '</div>' ;
	$string_to_return .= '</div>' ;

	return $string_to_return;
}


function formatPropertyDetailsBlock($value, $label) {

	$string_to_return = '';

	if ( !empty($value)) {
		$string_to_return .= '<div class="col-sm-3 col-xs-6">';
		$string_to_return .= '<div class="description-block">';
		$string_to_return .= '<h5 class="description-header">' . $value . '</h5>';
		$string_to_return .= '<span class="description-text">'.$label.'</span>';
		$string_to_return .= '</div>';
		$string_to_return .= '</div>';
	}
	
	return $string_to_return;
}

function makeButton ($text, $link) {
	
	$string_to_return = '';

	if (isset($link)) {

		$string_to_return .= '<a type="button" class="btn btn-default" href="'.$link.'">'.$text.'</a>';
	
	}

	return $string_to_return;
}