<?php
$label=mh_tour_label('plural');
echo head( array('maptype'=>'none', 'title' => $label, 'bodyid'=>'tours',
   'bodyclass' => 'browse' ) );
?>
<div id="content">
<section class="browse tour">			
<h2><?php echo __('All %1$s: %2$s', $label, total_tours());?></h2>


	<div id="primary" class="browse">
	
	<section id="results">
	<nav class="tours-nav navigation secondary-nav">
	  <?php echo public_nav_tours(); ?>
	</nav>	
	<div class="pagination bottom"><?php echo pagination_links(); ?></div>

    <?php 
    
    if( has_tours() ){
    if( has_tours_for_loop() ){
    	$i=1;
    	$tourimg=0;
		foreach( $tours as $tour ){ 
		set_current_record( 'tour', $tour );
		
			$tourdesc = nls2p( tour( 'description' ) );
		
			echo '<article id="item-result-'.$i.'" class="item-result has-image">';
			echo '<h3>'.link_to_tour(null,array('class'=>'permalink')).'</h3>';
			
			echo '<span class="tour-meta-browse">';
			if(tour( 'Credits' )){
				echo __('%1s curated by: %2s', mh_tour_label_option('singular'),tour( 'Credits' ));
			}elseif(get_theme_option('show_author') == true){
				echo __('%1s curated by: The %2s Team',mh_tour_label_option('singular'),option('site_title'));
			}		
			echo ' | '.count($tour->Items).' '.__('Locations').'</span>';

//				preg_match('/<img(.*)src(.*)=(.*)"(.*)"/U', display_tour_thumb($tour,1,$userDefined=null), $result);
//				$tourimg = array_pop($result);	
//				echo isset($tourimg) ? link_to_tour('<span class="item-image" style="background-image:url('.$tourimg.');"></span>') : null;					
//				$tourimg++;

			echo '<div class="item-description"><p>'.snippet($tourdesc,0,250).'</p></div>'; 
			echo '</article>';
			$i++;
		
			}
			
		}
	}
	?>
	
    
	</section>
    </div>

	
	<div class="pagination bottom"><?php echo pagination_links(); ?></div>

</section>
</div> <!-- end content -->

<div id="share-this" class="browse">
<?php echo mh_share_this(); ?>
</div>

<?php echo foot();?>