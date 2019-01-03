<?php

function check_class($file)
{
	if(!check_file($file . '.php'))
        die("{$file}.php Not Found");

    return require "{$file}.php";
}

function check_file($file)
{
	return (file_exists($file));
}

function asset_url($file)
{
	if(!check_file($file))
		die("{$file} Not Found");
	return BASEPATH . "assets" . DIRECTORY_SEPARATOR .  "{$file}.php";
}

function lang($alias)
{
	$label = check_class(BASEPATH . 'config' . DIRECTORY_SEPARATOR . 'application');
	return $label[$alias];
}

function formatDate($params = array())
{
    $format = (!empty($params['date'])) ? $params['date'] : 'Y-m-d';
    $format .= (!empty($params['time']) && $params['time']) ? ' H:i:s' : '';
    if(!empty($params['when']))
        switch($params['when']) {
            case 'begin':
                $strdate = 'first day of this month'; break;
            case 'end':
                $strdate = 'last day of this month'; break;
            case 'previous':
                $strdate = 'last day of prevous month'; break;
            case 'next';
                $strdate = 'last day of next month'; break;
            default:
                $strdate = $params['when'];
        }
    else
        $strdate = 'now';

    $date = date($format, strtotime($strdate));
    return (date('Y', strtotime($strdate)) < MIN_YEAR) ? 'error' : $date;
}

function formatnumber($number, $thousand = '.', $decimal = ',')
{
	return format_number($number, 2, ",", ".");
}

function hash_password($plain)
{
	return sha1($plain);
}