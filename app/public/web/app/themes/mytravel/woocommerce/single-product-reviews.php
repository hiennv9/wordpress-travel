<?php
/**
 * Display single product reviews (comments)
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product-reviews.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.3.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

if ( ! comments_open() ) {
	return;
}

$product_format = mytravel_get_product_format();

if ( ( 'hotel' === $product_format || 'tour' === $product_format || 'activity' === $product_format || 'rental' === $product_format || 'yacht' === $product_format || 'car_rental' === $product_format ) && wc_review_ratings_enabled() && function_exists( 'mas_travels_hotel_get_rating_by_categories' ) ) :

	wc_get_template( 'single-product/hotel/reviews.php' );

else :
	$rating_count = $product->get_rating_count();
	$review_count = $product->get_review_count();
	$average      = $product->get_average_rating();
	?><div id="reviews" class="woocommerce-Reviews">
	<?php
	if ( $rating_count ) :
		if ( function_exists( 'mas_travels_hotel_get_rating_by_categories' ) ) :
			?>
			<div class="hotel__reviews-header border-bottom py-4">
				<h3 class="font-size-21 font-weight-bold text-dark mb-4"><?php esc_html_e( 'Average Reviews', 'mytravel' ); ?></h3>
				<div class="row">
					<div class="hotel__reviews-summary col-md-4 mb-4 mb-md-0">
						<div class="border rounded flex-content-center py-5 border-width-2">
							<div class="text-center">
								<p class="font-size-50 font-weight-bold text-primary mb-0 text-lh-sm">
								<?php echo esc_html( mytravel_format_rating( $average ) ); ?><span class="font-size-20">/5</span>
								</p>
								<div class="font-size-25 text-dark mb-3">
								<?php
									echo esc_html( mytravel_hotel_get_user_rating_text( $average ) );
								?>
								</div>
								<div class="text-gray-1">
									<?php
									/* translators: %s: review count. */
									echo wp_kses_post( sprintf( _n( 'From %s Review', 'From %s Reviews', $review_count, 'mytravel' ), '<span class="count">' . esc_html( $review_count ) . '</span>' ) );
									?>
								</div>
							</div>
						</div>
					</div><!-- /.hotel__reviews-summary -->
					<div class="hotel__reviews-breakup col-md-8">
						<div class="row">
						<?php

							$ratings = mas_travels_hotel_get_rating_by_categories();

						foreach ( $ratings as $rating ) :

							$percentage = round( 100 * ( floatval( $rating['rating'] ) / 5 ) );

							?>
							<div class="col-md-6 mb-4">
								<h6 class="font-weight-normal text-gray-1 mb-1"><?php echo esc_html( $rating['title'] ); ?></h6>
								<div class="flex-horizontal-center mr-6">
									<div class="progress bg-gray-33 rounded-pill w-100" style="height: 7px;">
										<div class="progress-bar rounded-pill" role="progressbar" style="width: <?php echo esc_attr( $percentage ); ?>%;" aria-valuenow="<?php echo esc_attr( $percentage ); ?>" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
									<div class="ml-3 text-primary font-weight-bold text-nowrap"><?php echo esc_html( mytravel_format_rating( $rating['rating'] ) ); ?></div>
								</div>
							</div>
							<?php

							endforeach

						?>
						</div>
					</div><!-- /.hotel__reviews-breakup -->
				</div>
			</div><!-- /.hotel__reviews-header -->
		<?php endif; ?>
		<div id="comments" class="pt-4">
			<h4 class="woocommerce-Reviews-title font-size-21 font-weight-bold text-dark mb-8">
				<?php
				$count = $product->get_review_count();
				if ( $count && wc_review_ratings_enabled() ) {
					/* translators: 1: reviews count 2: product name */
					$reviews_title = sprintf( esc_html( _n( 'Showing %1$s review for %2$s', 'Showing %1$s reviews for %2$s', $count, 'mytravel' ) ), esc_html( $count ), get_the_title() );
					echo esc_html( apply_filters( 'woocommerce_reviews_title', $reviews_title, $count, $product ) ); // phpcs:ignore Standard.Category.SniffName.ErrorCode.
				} else {
					esc_html_e( 'Reviews', 'mytravel' );
				}
				?>
			</h4>

			<?php if ( have_comments() ) : ?>
				<ol class="commentlist list-unstyled mb-n4">
					<?php wp_list_comments( apply_filters( 'woocommerce_product_review_list_args', array( 'callback' => 'woocommerce_comments' ) ) ); ?>
				</ol>

				<?php
				if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
					echo '<nav class="woocommerce-pagination">';
					paginate_comments_links(
						apply_filters(
							'woocommerce_comment_pagination_args',
							array(
								'prev_text' => is_rtl() ? '&rarr;' : '&larr;',
								'next_text' => is_rtl() ? '&larr;' : '&rarr;',
								'type'      => 'list',
							)
						)
					);
					echo '</nav>';
				endif;
				?>
			<?php else : ?>
				<p class="woocommerce-noreviews alert alert-warning"><?php esc_html_e( 'There are no reviews yet.', 'mytravel' ); ?></p>
			<?php endif; ?>
		</div>
	<?php endif; ?>

	<?php if ( get_option( 'woocommerce_review_rating_verification_required' ) === 'no' || wc_customer_bought_product( '', get_current_user_id(), $product->get_id() ) ) : ?>
		<div id="review_form_wrapper" class="py-4">
			<div id="review_form">
				<?php
				$commenter    = wp_get_current_commenter();
				$comment_form = array(
					/* translators: %s is product title */
					'title_reply'         => have_comments() ? esc_html__( 'Add a review', 'mytravel' ) : sprintf( esc_html__( 'Be the first to review &ldquo;%s&rdquo;', 'mytravel' ), get_the_title() ),
					/* translators: %s is product title */
					'title_reply_to'      => esc_html__( 'Leave a Reply to %s', 'mytravel' ),
					'title_reply_before'  => '<h4 id="reply-title" class="comment-reply-title font-size-21 font-weight-bold text-dark mb-4">',
					'title_reply_after'   => '</h4>',
					'comment_notes_after' => '',
					'label_submit'        => esc_html__( 'Submit', 'mytravel' ),
					'class_submit'        => 'btn rounded-xs bg-blue-dark-1 text-white p-2 height-51 width-190 transition-3d-hover submit',
					'class_form'          => 'row mb-5 mb-lg-0 comment-form',
					'logged_in_as'        => '',
					'comment_field'       => '',
					'submit_field'        => '<div class="form-submit col d-flex justify-content-center justify-content-lg-start">%1$s %2$s</div>',
				);

				$name_email_required = (bool) get_option( 'require_name_email', 1 );
				$fields              = array(
					'author' => array(
						'label'    => esc_html__( 'Name', 'mytravel' ),
						'type'     => 'text',
						'value'    => $commenter['comment_author'],
						'required' => $name_email_required,
					),
					'email'  => array(
						'label'    => esc_html__( 'Email', 'mytravel' ),
						'type'     => 'email',
						'value'    => $commenter['comment_author_email'],
						'required' => $name_email_required,
					),
				);

				$comment_form['fields'] = array();

				foreach ( $fields as $key => $field ) {
					$field_html  = '<p class="col-md-6 mb-5 comment-form-' . esc_attr( $key ) . '">';
					$field_html .= '<label class="d-block font-weight-bold text-dark mb-1 h6" for="' . esc_attr( $key ) . '">' . esc_html( $field['label'] );

					if ( $field['required'] ) {
						$field_html .= '&nbsp;<span class="required">*</span>';
					}

					$field_html .= '</label><input id="' . esc_attr( $key ) . '" name="' . esc_attr( $key ) . '" type="' . esc_attr( $field['type'] ) . '" class="form-control" placeholder="' . esc_attr( $field['label'] ) . '" value="' . esc_attr( $field['value'] ) . '" size="30" ' . ( $field['required'] ? 'required' : '' ) . ' /></p>';

					$comment_form['fields'][ $key ] = $field_html;
				}

				$account_page_url = wc_get_page_permalink( 'myaccount' );
				if ( $account_page_url ) {
					/* translators: %s opening and closing link tags respectively */
					$comment_form['must_log_in'] = '<p class="col-12 must-log-in">' . sprintf( esc_html__( 'You must be %1$slogged in%2$s to post a review.', 'mytravel' ), '<a href="' . esc_url( $account_page_url ) . '">', '</a>' ) . '</p>';
				}

				if ( wc_review_ratings_enabled() ) {
					$comment_form['comment_field'] = '<div class="col-12 mb-5 comment-form-rating"><label class="d-block font-weight-bold text-dark mb-1 h6" for="rating">' . esc_html__( 'Your rating', 'mytravel' ) . ( wc_review_ratings_required() ? '&nbsp;<span class="required">*</span>' : '' ) . '</label><select name="rating" id="rating" required>
						<option value="">' . esc_html__( 'Rate&hellip;', 'mytravel' ) . '</option>
						<option value="5">' . esc_html__( 'Perfect', 'mytravel' ) . '</option>
						<option value="4">' . esc_html__( 'Good', 'mytravel' ) . '</option>
						<option value="3">' . esc_html__( 'Average', 'mytravel' ) . '</option>
						<option value="2">' . esc_html__( 'Not that bad', 'mytravel' ) . '</option>
						<option value="1">' . esc_html__( 'Very poor', 'mytravel' ) . '</option>
					</select></div>';
				}

				$comment_form['comment_field'] .= '<p class="col-sm-12 mb-5 comment-form-comment"><label class="d-block font-weight-bold text-dark mb-1 h6" for="comment">' . esc_html__( 'Your review', 'mytravel' ) . '&nbsp;<span class="required">*</span></label><textarea id="comment" class="form-control" name="comment" cols="45" rows="8" required></textarea></p>';

				comment_form( apply_filters( 'woocommerce_product_review_comment_form_args', $comment_form ) );
				?>
			</div>
		</div>
	<?php else : ?>
		<p class="woocommerce-verification-required"><?php esc_html_e( 'Only logged in customers who have purchased this product may leave a review.', 'mytravel' ); ?></p>
	<?php endif; ?>
	<div class="clear"></div>
</div>
	<?php

endif;
