<?php

//======================================================================
// THEME LAYOUT CLASS
//======================================================================


class SyrcuitThemeLayout extends Method_Layout {

	protected function set_opts() {
		$this->opts = get_option( 'syrcuit_options' );
	}

	protected function determine_attributes() {
		global $wp_query;
		if ( true == $this->attr['is_archive'] ) {
			switch ( $this->attr['post_type'] ) {
				case 'post':
					$this->attr['components'] = array( 'activated' );
					break;
			}
		} else {
			switch ( $this->attr['post_type'] ) {
				case 'page':
					if ( $this->attr['is_front'] ) {
						$this->attr['components'] = array( 'internal-header', 'content-box', 'sections' );
					} else {
						$template = get_page_template_slug( $this->id );
						switch ( $template ) {
							case 'templates/page-template-solar.php':
								$this->attr['components'] = array( 'internal-header', 'content-box', 'benefits' );
								break;
							case 'templates/page-template-geothermal.php':
								$this->attr['components'] = array( 'internal-header', 'content-box', 'benefits' );
								break;
							case 'templates/page-template-the-team.php':
								$this->attr['components'] = array( 'internal-header', 'content-box' );
								break;
							case 'templates/page-template-about.php':
								$this->attr['components'] = array( 'internal-header', 'content-box' );
								break;
							case 'templates/page-template-custom.php':
								$this->attr['components'] = array( 'activated' );
								break;
							default:
								$this->attr['components'] = array( 'activated' );
								break;
						}
					}
					break;
				case 'post':
					$this->attr['components'] = array( 'activated' );
					break;
				default:
					break;
			}
		}
		return;
	}

	protected function build_header() {
		$this->scripts .= '

		';
		$this->html .= '
			<div class="container">
				<div id="syrcuit-primary-nav">
					<div class="row justify-content-center">
						<div class="col-12">
							<div class="navbar-wrap">
								<nav class="navbar navbar-expand-lg navbar-light">
									<a class="navbar-brand" href="/"><span class="visually-hidden"></span></a>
									<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
										<span class="navbar-toggler-icon"></span>
									</button>
									<div class="collapse navbar-collapse" id="navbarNav">
										' . wp_nav_menu( array( 'theme_location' => 'primary', 'depth' => 2, 'container' => '', 'menu_class' => '', 'items_wrap' => '<ul id="%1$s" class="navbar-nav ms-auto %2$s">%3$s</ul>','walker' => new bootstrap_5_wp_nav_menu_walker(), 'fallback_cb' => '__return_false', 'echo' => false, ) ) . '
									</div>
								</nav>
							</div>
						</div>
					</div>
				</div>
			<!-- no closing container div -->
		';
		return;
	}

	protected function build_footer() {
		$this->html .= '
			</div><!-- end container -->
		';
		return;
	}

	protected function build_components() {
		if ( true == $this->attr['is_archive'] ) {
			global $wp_query;
		}
		foreach ( $this->attr['components'] as $component ) {
			$prefix = str_replace( '-', '_', $component );
			switch ( $component ) {
				case 'internal-header':
					$this->html .= '						
									<div class="row">
											<div class="col-12 text-center">
												' . $this->get_headline( '_syrcuit_header_headline', '<h1 class="syrcuit-h1">', '</h1>', get_the_title( $this->id ) ) . '
											</div>
										</div>
									
					';
					break;	
				case 'activated':
					// Placeholder element. Should be removed from production theme.
					$this->html .= '
						<div class="error404">
							<div class="container-fluid">
								<div class="row justify-content-center align-items-center">
									<div class="col-12 col-sm-8 col-md-5 col-lg-4">
										<div class="error404-content text-center">
											<h1>Epic!</h1>
											<br>
											<h2>You\'re Up &amp Running.</h2>
											<p>This site is now running a build of Method.</p>
											<a href="https://github.com/pixelwatt/method" target="_blank" class="btn btn-lg btn-primary m-auto">Method on GitHub</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					';
					break;
				case 'content-box':
					$this->html .= '
								<div class="row">
									<div class="col-12">
										' . $this->get_headline( '_syrcuit_' . $prefix . '_headline', '<h2 class="syrcuit-h2">', '</h2>' ) . '
										' . $this->get_content( '_syrcuit_' . $prefix . '_content', '<div class="syrcuit-copy">', '</div>' ) . '
									</div>
								</div>
					';
					break;
				case 'sections':
					
					$items = $this->get_serialized_meta( '_syrcuit_' . $prefix . '_sections' );
					if ( $items ) {
						if ( is_array( $items ) ) {
							foreach ( $items as $item ) {
								$this->html .= '
									<div class="row">
									<!-- start item -->
										<div class="syrcuit-service-content">
											<h3>' . $this->format_headline( $item['headline'] ) . '</h3>				
											<div class="syrcuit-copy">
												' . $this->filter_content( $item['content'] ) . '
											' . ( $item['label'] ? ( $item['url'] ? '<div class="d-grid gap-2 col-12 col-md-3  justify-content-md-end"><a href="' . $item['url'] . '" class="btn btn-lg btn-primary" target="' . $item['target'] . '">' . $item['label'] . '</a></div>' : '' ) : '' ) . '
											</div>
										</div>
									<!-- end item -->
									</div>';
							}
						}
					}		
					break;
				case 'benefits':
					
					$items = $this->get_serialized_meta( '_syrcuit_' . $prefix . '_benefits' );
					if ( $items ) {
						if ( is_array( $items ) ) {
							$this->html .= '<div class="row">';
							foreach ( $items as $item ) {
								$this->html .= '
									<div class="col-md-6">
									<!-- start item -->
										<div class="row">
											<div class="col-md-auto">
												<div class="">
												' . ( $item['img_id'] ? wp_get_attachment_image( $item['img_id'], 'square_icon', false, array( 'class' => 'img-fluid' ) ) : '' ) . '
												</div>
											</div>
											<div class="col">
												<h3>' . $this->format_headline( $item['headline'] ) . '</h3>				
												<div class="syrcuit-copy">
													' . $this->filter_content( $item['content'] ) . '
												' . ( $item['label'] ? ( $item['url'] ? '<div class="d-grid gap-2 col-12 col-md-3  justify-content-md-end"><a href="' . $item['url'] . '" class="btn btn-lg btn-primary" target="' . $item['target'] . '">' . $item['label'] . '</a></div>' : '' ) : '' ) . '
												</div>
											</div>
										</div>
									<!-- end item -->
									</div>
									';
							}
							$this->html .= '</div>';
						}
					}		
					break;
				default:
					break;
			}
		}
		return;
	}

	/*
	Usage for archive pages:
	get_header();
	$layout = new SyrcuitThemeLayout;
	echo $layout->build_page( '', true );
	get_footer();

	Usage for single pages:
	get_header();
	$layout = new SyrcuitThemeLayout;
	echo $layout->build_page( $post->ID );
	get_footer();

	*/
}
