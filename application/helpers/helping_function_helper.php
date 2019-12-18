 <?php 

if (! defined('BASEPATH')) exit('No direct script access allowed');
 
if (! function_exists('avg_calculator')) {
    function avg_calculator($array,$total_marks)
    {
        $ci = get_instance();
        $avg_calculator=count($array[0]);
        $average = $total_marks/$avg_calculator;
        return $average;
    }
}

if (! function_exists('total_calculator')) {
    function total_calculator($array)
    {
        $ci = get_instance();
        $total=0;

        foreach ($array[0] as $value) {
        	$total=$total+$value;
        }
        return $total; 
    }
}

?>