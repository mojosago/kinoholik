<?php $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author)); ?>




<?php echo $curauth->nickname; ?><br>
<?php echo $curauth->aim; ?><br>
<?php echo $curauth->description; ?><br>
<?php echo $curauth->display_name; ?><br>
<?php echo $curauth->first_name; ?><br>
<?php echo $curauth->ID; ?><br>
<?php echo $curauth->jabber; ?><br>
<?php echo $curauth->last_name; ?><br>
<?php echo $curauth->nickname; ?><br>
<?php echo $curauth->user_email; ?><br>
<?php echo $curauth->user_login; ?><br>
<?php echo $curauth->user_nicename; ?><br>
<?php echo $curauth->user_registered; ?><br>
<?php echo $curauth->user_url; ?><br>
<?php echo $curauth->yim; ?><br>
<?php echo $curauth->role; ?><br>