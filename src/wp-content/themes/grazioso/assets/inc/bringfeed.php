<?php 
 /**
  * @package TRIAD Inc.
  * @since 1.0
 */
 
 
 
	/**
	 * Create the 'Bringfeed' function
	 * 
	 * @param     void
	 * @return    void
	 * 
	 * @access    public
	 * @since     1.0
	 * 
	 * ---------------------------------
	 * modify by kazaoki.lab / 2015.6.22
	 * ref: http://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/fetch_feed
	*/

	function bringfeed() {
		require_once (ABSPATH . WPINC . '/feed.php');
		$argnum = func_num_args();
		$arglist = func_get_args();
		if ($argnum >= 1) $url = $arglist[0];
		if ($argnum >= 2) $title = $arglist[1];
		else $title = '';
		if ($argnum >= 3) $numofitem = $arglist[2];
		else $numofitem = 0;

		$disp = "\n<!-- BRINGFEED -->\n";

		if ($argnum < 1 or $argnum > 3) {
			$disp .= "\t<p>Error: BringFeed has encountered an argument error.</p>\n";
		} elseif ($feed = fetch_feed($url)) { 
			$disp .= "\t<ul>\n";
			$feed_items = $feed->get_items(0, $feed->get_item_quantity($numofitem) );
			foreach ($feed_items as $item) {
			 	$title = $item->get_title();
			 	$link = htmlentities($item->get_permalink());
			 	if ($title != '') $disp .= "\t\t<li><a href='$link' target='_blank'>$title</a></li>\n";
			}
			$disp .= "\t</ul>\n";
		} else {
			$disp .= "\t<p>Notice: A feed error has occured.</p>\n";
		}
		return $disp ;
	}

?>