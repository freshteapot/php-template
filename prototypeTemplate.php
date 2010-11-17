<?php
class prototypeTemplate
{
	public $template;
	/*
	 This is the prototype one, prototype does something else too, but this seems to work.
	 public $pattern = "/(^|.|\r|\n)(#\{(.*?)\})/";
	 */
	public $pattern = "/((#\{(.*?)\}))/";

	function __construct( $template, $pattern="" )
	{
		$this->template = $template;
		$this->pattern = ( !empty( $pattern ) )? $pattern : $this->pattern;
	}



	function evaluate( $data )
	{
		$m = $this->evaluateKeys();
		if( isset( $m['0'] ) )
		{
			$keys = $m['2'];
			$html = $this->template;

			$done = array();
			foreach( $m['3'] as $i => $key )
			{
				if( isset( $data->$key ) && !isset( $done[ $key ] ) )
				{
					$html = str_replace( $keys[ $i ], $data->$key, $html );
				}else{
					$html = str_replace( $keys[ $i ], '', $html );
				}
				$done[ $data->key ]='';
			}
			unset( $keys, $done, $m );
			return $html;
		}
		return '';
	}

	function evaluateKeys( $clean=false )
	{
		preg_match_all( $this->pattern, $this->template, $m, PREG_PATTERN_ORDER );
		if( $clean === false )
		{
			return $m;
		}else{
			return end( $m );
		}

	}
}//end class prototypeTemplate
?>
