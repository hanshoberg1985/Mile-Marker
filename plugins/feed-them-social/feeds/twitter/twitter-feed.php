<?php
add_action('wp_enqueue_scripts', 'fts_twitter_head');
function  fts_twitter_head() {
    wp_enqueue_style( 'fts_twitter_css', plugins_url( 'twitter/css/styles.css',  dirname(__FILE__) ) ); 
		if(is_plugin_active('feed-them-premium/feed-them-premium.php')) {
			wp_enqueue_style( 'fts_instagram_css_popup', plugins_url( 'instagram/css/magnific-popup.css',  dirname(__FILE__) ) );
			wp_enqueue_script( 'fts_instagram_popup_js', plugins_url( 'instagram/js/magnific-popup.js',  dirname(__FILE__) ) );
		}
}
add_shortcode( 'fts twitter', 'fts_twitter_func' );
//Main Funtion
function fts_twitter_func($atts){
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

if(is_plugin_active('feed-them-premium/feed-them-premium.php')) {
   include(WP_CONTENT_DIR.'/plugins/feed-them-premium/feeds/twitter/twitter-feed.php');
   
}
else 	{
	extract( shortcode_atts( array(
		'twitter_name' => '',
		'twitter_height' => '',
	), $atts ) );
	$tweets_count ='4';
}
ob_start();  
 
$numTweets      = $tweets_count;
$name           = $twitter_name;  
$excludeReplies = true;            

 	  $data_cache = WP_CONTENT_DIR.'/plugins/feed-them-social/feeds/twitter/cache/twitter_data_cache-'.$name.'-num'.$totalToFetch.'.json';
	  $data_cache_folder = WP_CONTENT_DIR.'/plugins/feed-them-social/feeds/twitter/cache';
	  //Check Cache
	  if(file_exists($data_cache) && !filesize($data_cache) == 0 && filemtime($data_cache) > time() - 1800 && false !== strpos($data_cache,'-num'.$totalToFetch.'')){
		$fetchedTweets = json_decode(file_get_contents($data_cache));
		
		$connection_check = true;
	  } 
	  else {
			// Get the tweets from Twitter.
			include_once 'twitteroauth/twitteroauth.php';
			//Authenticate connection
			$connection = new TwitterOAuthFTS(
			//Consumer Key
			'dOIIcGrhWgooKquMWWXg',
			//Consumer Secret
			'qzAE4t4xXbsDyGIcJxabUz3n6fgqWlg8N02B6zM',
			//Access Token
			'1184502104-Cjef1xpCPwPobP5X8bvgOTbwblsmeGGsmkBzwdB',  
			//Access Token Secret
			'd789TWA8uwwfBDjkU0iJNPDz1UenRPTeJXbmZZ4xjY'
			);
			
			
			// If excluding replies, we need to fetch more than requested as the
			// total is fetched first, and then replies removed.
			$totalToFetch = ($excludeReplies) ? max(50, $numTweets * 3) : $numTweets;
			
			$fetchedTweets = $connection->get(
			'statuses/user_timeline',
			  array(
				'screen_name'     => $name,
				'count'           => $totalToFetch,
				'exclude_replies' => $excludeReplies,
				'images'		  => $description_image
			  )
			);
			
			
  
		//Does Cache folder exists? If not make it!
		$folder_create_check = true;
		if (!file_exists($data_cache_folder)) {
			if(mkdir($data_cache_folder, 0755, true)) {
				mkdir($data_cache_folder, 0755, true);
			} else {
				$connection_check = false;
				$folder_create_check = false;
				echo '<div>Your server is not allowing FTS to create a cache FOLDER! Please contact your Developer or Hosting Provider for assistance on allowing this file to be created! The Feed Them Social plugin needs to be able to create the folder '.$data_cache_folder.'</div>';
			}
		}
		//Does Cache File exists? If not make it!
		if (!file_exists($data_cache) && $folder_create_check != false) {
			if(touch($data_cache)) {
				touch($data_cache);
			} else {
				$connection_check = false;
				echo '<div>Your server is not allowing FTS to create a cache File! Please contact your Developer or Hosting Provider for assistance on allowing this file to be created! Feed Them Social needs to be able to create a file in '.$data_cache_folder.'</div>';
			}
			
		}
		
		//IS RATE LIMIT REACHED?
		if($fetchedTweets->errors){
		}
		else{
		  file_put_contents($data_cache,json_encode($fetchedTweets));
		  $connection_check = true;
		}
		
		//DID CONNECTION FAIL?
		if($connection->http_code != 200) {
			 if(file_exists($data_cache) && !filesize($data_cache) == 0 && false !== strpos($data_cache,'-num'.$totalToFetch.'')){
		 		 $fetchedTweets = json_decode(file_get_contents($data_cache));
				 $connection_check = true;
			 }//END IF
			 else{
			 	$connection_check = false;
			 }//END ELSE
		}//END IF
		else	{
			$connection_check = true;
		}//END ELSE
}//END ELSE
  
  // Did the fetch fail?
  if($connection_check == false or $fetchedTweets->errors) {
	  //echo'<div>Twitter may temporarily be down but should be back shortly!</div>';
  }//END IF
  else {
	 
    // Fetch succeeded.
    // Now update the array to store just what we need.
    // (Done here instead of PHP doing this for every page load)
	if (!empty($fetchedTweets)){
    $limitToDisplay = min($numTweets, count($fetchedTweets));
    
    for($i = 0; $i < $limitToDisplay; $i++) {
      $tweet = $fetchedTweets[$i];
    
	
      // Core info.
      $name = $tweet->user->name;
	  $screen_name = $tweet->user->screen_name;
	  
	  $protocol = isset($_SERVER["HTTPS"]) ? 'https://' : 'http://';
	  $not_protocol = !isset($_SERVER["HTTPS"]) ? 'https://' : 'http://';
	  
      $permalink = $protocol.'twitter.com/'. $screen_name .'/status/'. $tweet->id_str;
	  
	  $user_permalink = $protocol.'twitter.com/#!/'. $screen_name;
 	  $media_url = $tweet->entities->media[0]->media_url;
	  $media_url = str_replace($not_protocol, $protocol, $media_url);
	  
	  // leaving this for another update, trying to get videos, and I know this ain't right! $url = $tweet->entities->media[0]->expanded_url;
	  
      /* Alternative image sizes method: http://dev.twitter.com/doc/get/users/profile_image/:screen_name */
      $image = $tweet->user->profile_image_url;
	  $image = str_replace($not_protocol, $protocol, $image);
 
      // Message. Convert links to real links.
      $pattern = array('/http:(\S)+/', '/https:(\S)+/', '/([^a-zA-Z0-9-_&])@([0-9a-zA-Z_]+)/', '/([^a-zA-Z0-9-_&])#([0-9a-zA-Z_]+)/');
      $replace = array(' <a href="${0}" target="_blank" rel="nofollow">${0}</a>', ' <a href="${0}" target="_blank" rel="nofollow">${0}</a>', ' <a href="'.$protocol.'twitter.com/$2" target="_blank" rel="nofollow">@$2</a>', ' <a href="'.$protocol.'twitter.com/search?q=%23$2&src=hash" target="_blank" rel="nofollow">#$2</a>');
      $text = preg_replace($pattern, $replace, $tweet->text);
 
      // Need to get time in Unix format.
	  $times = $tweet->created_at;
	  
	  $CustomDateCheck = get_option('fts-date-and-time-format');
	  if($CustomDateCheck) {
	  	$CustomDateFormatTwitter = get_option('fts-date-and-time-format');
	  }
	  else {
		$CustomDateFormatTwitter = 'F jS, Y \a\t g:ia'; 
	  }
      $uTime = date($CustomDateFormatTwitter ,strtotime($times));
	  $twitter_id = $tweet->id_str;
 
      // Now make the new array.
      $tweets[] = array(
              'text' => $text,
              'name' => $name,
              'screen_name' => $screen_name,
			  'user_permalink' => $user_permalink,
              'permalink' => $permalink,
              'image' => $image,
              'time' => $uTime,
			  'media_url' => $media_url,
			  'id' => $twitter_id,
			 // 'url' => $url,
              );
  }//End FOR ?>
  <?php foreach($tweets as $t) :?>
  <li class="feed-wrap col-lg-3 col-md-3 col-sm-4 col-xs-6">
    <div class="feed-info">
      <div class="feed-info-wrapper">
          <div class="feed-avatar">
              <a href="<?php print $t['user_permalink'];?>" target="_blank" class="black">
                  <img class="twitter-image" src="<?php print $t['image'];?>" />
              </a>
          </div>
          <div class="feed-user-name">
              <a href="<?php print $t['user_permalink'];?>" target="_blank" class="black">@<?php print $t['screen_name'];?></a>
          </div>
          <div class="feed-content">
              <?php print $t['text'];?>
          </div>
          <div class="feed-time">
              <?php print $t['time'];?> via Twitter
          </div>
      </div>
    </div>
  </li>
  <?php endforeach; ?>
<?php if ($twitter_height !== 'auto' && empty($twitter_height) == NULL) {?>
<script>
  // this makes it so the page does not scroll if you reach the end of scroll bar or go back to top
  jQuery.fn.isolatedScrollTwitter = function() {
		this.bind('mousewheel DOMMouseScroll', function (e) {
		var delta = e.wheelDelta || (e.originalEvent && e.originalEvent.wheelDelta) || -e.detail,
			bottomOverflow = this.scrollTop + jQuery(this).outerHeight() - this.scrollHeight >= 0,
			topOverflow = this.scrollTop <= 0;
	
		if ((delta < 0 && bottomOverflow) || (delta > 0 && topOverflow)) {
			e.preventDefault();
		}
	});
	return this;
  };
  jQuery('.fts-twitter-scrollable').isolatedScrollTwitter();
</script>
<?php }?>  
<?php  
	}// END IF $fetchedTweets
}//END ELSE

return ob_get_clean(); 
}
?>