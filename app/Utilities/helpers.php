<?php
/**
 * Created by PhpStorm.
 * User: afghany
 * Date: 16/01/19
 * Time: 02:30 م
 */

use App\Utilities\Classes\Flash;


/**
 * @return \Illuminate\Contracts\Auth\Authenticatable|null current authenticated user in any guard
 */

function user()
{
    foreach (config('auth.guards') as $guard => $value)

        if(auth($guard)->check())

            return auth($guard)->user();

    return null;
}

/**
 * @param array $keys
 * @param array $source
 * @return array values of given keys in second array given
 */

function data(array $keys, array $source) : array
{
    $result = [] ;

    foreach (array_unique($keys) as $key)

        if(isset($source[$key]))

            $result[$key] = $source[$key];

    return $result;
}

/**
 * @param array $keys
 * @return array values of given keys in request object
 */

function dataFromRequest(array $keys) : array
{
    return data($keys,request()->all());
}

/**
 * @param null $message
 * @param string $class
 * @param null $key
 * @return Flash|void
 */

function flash($message = null,$class = 'success',$key = null)
{
    $instance = new Flash($key);

    if(!func_num_args())

        return $instance;

    return $instance->setClass($class)->setMessage($message)->execute();
}

/**
 * @param $number
 * @param $total
 * @param int $precision
 * @return float|int
 */

function percentage($number, $total,$precision = 2)
{
    return round($number * 100 / $total,$precision);
}

/**
 * @param $number
 * @return string
 */

function getMonthName($number)
{
    return DateTime::createFromFormat('!m', $number)->format('F');
}