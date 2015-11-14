<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/blog';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();

	public static function truncate_utf8_string($string, $length, $etc = '...')
    	{
    	    $result = '';
    	    $string = html_entity_decode(trim(strip_tags($string)), ENT_QUOTES, 'UTF-8');
    	    $strlen = strlen($string);

    	    for ($i = 0; (($i < $strlen) && ($length > 0)); $i++)
    		{
    	        if ($number = strpos(str_pad(decbin(ord(substr($string, $i, 1))), 8, '0', STR_PAD_LEFT), '0'))
    			{
    	            if ($length < 1.0)
    				{
    	                break;
    	            }
    	            $result .= substr($string, $i, $number);
    	            $length -= 1.0;
    	            $i += $number - 1;
    	        }
    			else
    			{
    	            $result .= substr($string, $i, 1);
    	            $length -= 0.5;
    	        }
    	    }
    	    $result = htmlspecialchars($result, ENT_QUOTES, 'UTF-8');
    	    if ($i < $strlen)
    		{
    	        $result .= $etc;
    	    }
    	    return $result;
    	}
}