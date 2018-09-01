<?php

function geralt_card_layout_general ($id = 0, $label = 'cat') { echo ''?>

<div class="row section">
	<div class="col-md-12">
		<h2 class="u-to"><?php echo esc_attr($id ? get_cat_name($id) : "Latest posts") ?></h2>
	</div>
</div>
<div class="row">
	
	<?php
		$args = array(
			$label => $id,
			'posts_per_page' => 10 // 10 posts
		);
		$wp_query = new WP_Query( $args );
		$post_index = 0;
		while ($wp_query->have_posts()) : $wp_query->the_post();
	?>

		<?php if ($post_index > -1) : ?>

			<?php
				$thumbnail_url = get_the_post_thumbnail_url();
			?>
			<div class="col-md-4">
				<article class="c-card">
					<?php if ($thumbnail_url) : ?>
						<div class="c-card__thumbnail" style="background-image: url(<?php echo esc_attr($thumbnail_url) ?>)"></div>
					<?php else : ?>
						<div class="c-card__thumbnail"></div>
					<?php endif ?>

					<div class="c-card__info">
						<a class="c-card__basic" href="<?php the_permalink() ?>">
							<h1 class="c-card__title"><?php the_title() ?></h1>
							<div class="c-card__excerpt"><?php the_excerpt() ?></div>
						</a>
						<div class="c-card__footer">
							<div class="c-card__author">
								<i class="fa fa-user"></i>
								<?php the_author() ?>
							</div>
							<div class="">
								<i class="fa fa-calendar-alt"></i>
								<?php the_date('M n') ?>
							</div>
						</div>
					</div>

					<?php if (!($label == 'cat' && $id != 0)) : ?>
						<?php the_category() ?>
					<?php endif ?>
				</article>
			</div>

		<?php endif ?>

	<?php $post_index++; endwhile ?>

</div>

<?php } ?>