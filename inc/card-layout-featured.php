<?php

function geralt_card_layout_featured ($id = 0, $label = 'cat') { echo ''?>

<div class="row section">
	<div class="col-md-8">
		
		<?php
			$args = array(
				$label => $id,
				'posts_per_page' => 1 // 1 primary post
			);
			$wp_query = new WP_Query( $args );
			while ($wp_query->have_posts()) : $wp_query->the_post();
		?>

			<?php
				$thumbnail_url = get_the_post_thumbnail_url();
			?>
			<article class="c-card-featured" style="background-image: url(<?php echo esc_attr($thumbnail_url) ?>)">
				<div class="c-card-featured__info">
					<a href="<?php the_permalink() ?>">
						<h1 class="c-card-featured__title u-ts"><?php the_title() ?></h1>
					</a>
					<div class="c-card-featured__author">
						<i class="fa fa-user"></i>
						<?php the_author() ?>
					</div>
				</div>

				<?php the_category() ?>
			</article>

		<?php endwhile ?>

	</div>
	<div class="col-md-4 m-hor-scroller">

		<?php
			$args = array(
				$label => $id,
				'posts_per_page' => 2 // 2 side posts
			);
			$wp_query = new WP_Query( $args );
			$post_index = 0;
			while ($wp_query->have_posts()) : $wp_query->the_post();
		?>

			<?php if ($post_index > -1) : ?>

				<?php
					$thumbnail_url = get_the_post_thumbnail_url();
				?>
				<article class="c-card-featured c-card-featured--small" style="background-image: url(<?php echo esc_attr($thumbnail_url) ?>)">
					<div class="c-card-featured__info">
						<a href="<?php the_permalink() ?>">
							<h1 class="c-card-featured__title c-card-featured__title--small u-ts"><?php the_title() ?></h1>
						</a>
						<div class="c-card-featured__author c-card-featured__author--small">
							<i class="fa fa-user"></i>
							<?php the_author() ?>
						</div>
					</div>

					<?php the_category() ?>
				</article>

			<?php endif ?>

		<?php $post_index++; endwhile ?>

	</div>
</div>

<?php } ?>