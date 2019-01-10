<?php
	global $wpdb;
	$sql = 'SELECT * FROM ' . $wpdb->prefix . 'comments INNER JOIN ' . $wpdb->prefix . 'posts ON ( ' . $wpdb->prefix . 'comments.comment_post_ID = ' . $wpdb->prefix . 'posts.ID) ORDER BY comment_date DESC LIMIT 6';
	$result = $wpdb->get_results($sql);

	$comments_bucket = array();

?>
			<?php

				if ($result):
					global $post;
					foreach ($result as $post) {
						gather_comments($comments_bucket, $post);
					}
				endif;

			?>		

	<div class="row">
	



<?php
	// echo comments

	foreach ($comments_bucket as $i) { 
		
		echo "<div class='content'>";
			echo "Temat: <a href='".get_permalink($i['post_ID'])."'>".$i['title']."</a>";
			echo "<ul>";
		foreach($i["comments"] as $comment) {

			echo "<li>";
			echo "<div class='date'>".$comment['date']."</div>";
			echo "<span class='author'>".$comment['author'].":</span> <span class='comment'><a href='". get_comment_link($comment['id']) ."'>".$comment['content']."</a></span>";
 			echo "</li>";

		}
			echo "</ul>";
		echo "</div>";
	}
?>

	</div>

<?php 
	function gather_comments(&$bucket, $record) {
		 
		$new_title = $record->post_title;
		$presentElement = -1;

		$newComment = array ('author' => $record->comment_author,
							'date' => $record->comment_date,
							'content' => $record->comment_content,
							'id' => $record->comment_ID);

		#sprwadź czy ten tytuł już jest
		foreach ($bucket as $key=>$i) {
			if ($i['title'] == $new_title) {
				$presentElement = $key;
				break;
			}
		}

		if ($presentElement == -1) {
			array_push($bucket, array('title' => $new_title, 'post_ID' => $record->ID, 'comments' => array($newComment)) );
		} else {
			array_push($bucket[$presentElement]['comments'],  $newComment);
		}
	}

?>