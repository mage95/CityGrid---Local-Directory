<?php
class flickrphotos {
	
	private $FlickrKey;

	public function __construct($FlickrKey) {
		
	  	$this->FlickrKey = $FlickrKey;
		
	}

	public function __destruct() {
		 
	}

   	public function displayFlickr($FlickrKey,$FlickrSearch,$DisplayCount,$RandomCount, $width){
			
		$f = new phpFlickr($FlickrKey);
		
		$returnurl = '';
		$trycount = 1;
	
		$photocount = $DisplayCount;

		$search = $f->photos_search(array("text"=>"$FlickrSearch", "tag_mode"=>"any", "per_page"=>"$RandomCount", "license"=>"Attribution Creative Commons"));

		// Create the illusion of random photo
		$RandomPhoto = rand(1,$RandomCount);			
		
		foreach ($search['photo'] as $photo) 
			{				
			//echo $photocount . ' == ' . $RandomPhoto . '<br />';
			if($photocount==$RandomPhoto)
				{
		
			    $photo_id = $photo['id'];
			    $photo_owner = $photo['owner'];
			    $photo_title = $photo['title'];
			    $photo_farm = $photo['farm'];
			    $photo_server = $photo['server'];
			    $photo_secret = $photo['secret'];
			    
			    $url = "http://www.flickr.com/photos/" . $photo_owner . "/" . $photo_id . "/";
		
				// Build the HTML for an image to return
				$returnurl = '<center><a href="' . $url . '" class="img">';			
				$returnurl .= '<img src="http://farm' . $photo_farm . '.staticflickr.com/' . $photo_server . '/' . $photo_id . '_' . $photo_secret .'.jpg" width="' . $width . '" />';
				$returnurl .= '<div>' . $FlickrSearch . '</div>';
				$returnurl .= '</a></center>'; 	

				}
				
			$photocount++;
			}

		return $returnurl;   		
   			
   		}
   		 		
   		
	}
?>