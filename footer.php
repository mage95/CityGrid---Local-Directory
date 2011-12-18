				<div class="span5">
					
					<?php
					// Display a Single Flickr Photo That is 275 Wide
					$FlickrSearch = $what . "," . $where;  // Just doing where
					$DisplayCount = 1;
					$RandomCount = 25; // choose from random of potentially 50 images
					$width = 275;
					$flickr = new flickrphotos($FlickrKey);
					$photo = $flickr->displayFlickr($FlickrKey,$FlickrSearch,$DisplayCount,$RandomCount, $width);						
					echo $photo;
					?>

					<br />
				
					<?php
					// Display a Web Ad that is 300 x 250
					$adid = 1;
					$publisher = 'citysearch';
					$citygridad = new citygrid($publishercode);
					$displayad = $citygridad->display_web_ad_300_250($adid,$publisher,$what,$where);						
					echo $displayad;
					?>			

					<br />
					
					<?php
					// Display a Single Flickr Photo That is 275 Wide
					$FlickrSearch = $what . "," . $where;  // Just doing where
					$DisplayCount = 1;
					$RandomCount = 25; // choose from random of potentially 50 images
					$width = 275;
					$flickr = new flickrphotos($FlickrKey);
					$photo = $flickr->displayFlickr($FlickrKey,$FlickrSearch,$DisplayCount,$RandomCount, $width);						
					echo $photo;
					?>

				</div>
				
			</div>
		
		
			<footer>
      
      
            </footer>
            
      </div>
      
    </div>

  </body>
</html>