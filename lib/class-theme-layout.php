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
								$this->attr['components'] = array( 'internal-header', 'content-box', 'geo-box-1', 'geo-box-2', 'geo-box-3', 'geo-box-4' ); // , 'benefits'
								break;
							case 'templates/page-template-geothermal.php':
								$this->attr['components'] = array( 'internal-header', 'content-box', 'geo-box-1', 'geo-box-2' ); // , 'benefits'
								break;
							case 'templates/page-template-colorado.php':
								$this->attr['components'] = array( 'internal-header', 'content-box' ); // , 'benefits' , 'geo-box-1', 'geo-box-2'
								break;
							case 'templates/page-template-the-team.php':
								$this->attr['components'] = array( 'internal-header', 'management', 'board-of-directors' );
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
			<div class="container-lg">
				
			<!-- no closing container div -->		
		';
		return;
	}

	protected function build_footer() {
		$this->html .= '
			
			<footer class="row p-5 clearfix">
				<div class="syrcuit-footer-content container-lg clearfix">
					<div class="row">
						<div class="col-12 col-lg-4 order-2 order-lg-1">
							<div class="row">
							<div class="col-12 col-sm-6 col-lg-12">
							<img src="' . get_template_directory_uri() . '/assets/images/Syrcuit-Logo.png" class="mb-3" id="site-footer-logo" width="300" height="71" alt="Syrcuit logo">
							</div>
							<div class="col-12 col-sm-6 col-lg-12">
								<div class="syrcuit-footer-addr mb-4">
									' . ( $this->get_option( 'addr_line1' ) ? '<div>' . $this->get_option( 'addr_line1' ) . '</div>' : '' ) . '
									' . ( $this->get_option( 'addr_line2' ) ? '<div>' . $this->get_option( 'addr_line2' ) . '</div>' : '' ) . '
									' . ( $this->get_option( 'addr_line3' ) ? '<div>' . $this->get_option( 'addr_line3' ) . '</div>' : '' ) . '
									' . ( $this->get_option( 'phone_num' ) ? '<div>' . $this->get_option( 'phone_num' ) . '</div>' : '' ) . '
									<div class="syrcuit-footer-social">
									' . $this->build_social_icons( 's-ics', 36 ) . '
									</div>
								</div>
							</div>
							</div>
						</div>
						<div class="col-12 col-lg-8 order-1 order-lg-2">
							
							<div class="row">
								' . $this->get_content_from_option( 'footer_contact', '<div class="syrcuit-footer-contact">', '</div>' ) . '
							</div>
						</div>
					</div>
					<hr class="my-3"/>
					<div class="row">
						<div class="col-12">
						' . $this->get_content_from_option( 'footer_copyright', '<div class="syrcuit-footer-copyright">', '</div>' ) . '
						</div>
					</div>					
				</div>		
			</footer>
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
					// var_dump($this->get_meta( '_syrcuit_' . $prefix . '_video' ));
					// die();
					$this->html .= '						
						<div id="inner-header" class="row">
							<div class="col" ' . ( $this->get_meta( '_syrcuit_' . $prefix . '_image_id' ) ? 'style="background-image: url('.wp_get_attachment_image_src( $this->get_meta( '_syrcuit_' . $prefix . '_image_id' ), 'full', false )[0].')"' : '' ) . '>
								<video playsinline autoplay muted loop id="myVideo">
								  <source src="' . $this->get_meta( '_syrcuit_' . $prefix . '_video' ) . '" type="video/mp4">
								</video>
								
								<div id="inner-header-content" >
								<div class="navbar-wrap">
								<nav class="navbar navbar-expand-lg navbar-dark">
							<div class="p-5 row">
							<div class="col-10 col-lg-5">
								<div class="text-md-start">
										<a href="/">
											<img src="' . get_template_directory_uri() . '/assets/images/Syrcuit-Logo-ko.png" class="mb-3 img-fluid" id="site-logo" width="300" height="71" alt="Syrcuit logo" />
										</a>
								</div>
							</div>
							<div class="col-2 text-end d-lg-none">
								<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
									<span class="navbar-toggler-icon"></span>
								</button>
							</div>
							<div class="col-12 col-lg-7 text-end">
								<div class="collapse navbar-collapse" id="navbarNav">
									' . wp_nav_menu( array( 'theme_location' => 'primary', 'depth' => 2, 'container' => '', 'menu_class' => '', 'items_wrap' => '<ul id="%1$s" class="navbar-nav ms-auto flex-column %2$s">%3$s</ul>','walker' => new bootstrap_5_wp_nav_menu_walker(), 'fallback_cb' => '__return_false', 'echo' => false, ) ) . '
								</div>									
							</div>									

							<div class="col-12 p-4">
								' . $this->get_headline( '_syrcuit_' . $prefix . '_headline', '<h1 class="syrcuit-h1 pt-5 pb-4">', '</h1>' ) . '
								' . $this->get_headline( '_syrcuit_' . $prefix . '_sub_headline', '<h2 class="syrcuit-h1 py-5">', '</h2>' ) . '
								' . $this->get_content( '_syrcuit_' . $prefix . '_content', '<div class="copy py-4">', '</div>' ) . '
							</div>
							</div>
							</div>
							</nav>
							</div>
							</div>
						</div>
									
					';
					break;	
				case 'content-box':
					$this->html .= '
								<div class="row" id="content">
									<div class="p-5">
										<div class="p-4">
											<div class="col-12">
												' . $this->get_headline( '_syrcuit_' . $prefix . '_headline', '<h2 class="syrcuit-h2 mb-4">', '</h2>' ) . '
												' . $this->get_content( '_syrcuit_' . $prefix . '_content', '<div class="syrcuit-copy">', '</div>' ) . '
											</div>
										</div>
									</div>
								</div>
					';
					break;
				case 'geo-box-1':
				case 'geo-box-2':
				case 'geo-box-3':
				case 'geo-box-4':
					$class = 'col-md-6';
					if ( in_array( $prefix, array( 'geo_box_1', 'geo_box_3' ) ) ){
						$class .= ' offset-md-6';
					}
					$this->html .= '
								<div class="row geo-box '.$this->get_meta( '_syrcuit_' . $prefix . '_extra_class' ).'" id="geo-box-1">
									<div class="col" ' . ( $this->get_meta( '_syrcuit_' . $prefix . '_image_id' ) ? 'style="background-image: url('.wp_get_attachment_image_src( $this->get_meta( '_syrcuit_' . $prefix . '_image_id' ), 'full', false )[0].')"' : '' ) . '>
									<video playsinline autoplay muted loop id="myVideo">
											  <source src="' . $this->get_meta( '_syrcuit_' . $prefix . '_video' ) . '" type="video/mp4">
											</video>
									<div class="inner-header-content">
										<div class="p-5">
											<div class="p-4">
												<div class="'.$class.'">
													' . $this->get_headline( '_syrcuit_' . $prefix . '_headline', '<h2 class="syrcuit-h2 mb-4">', '</h2>' ) . '
													' . $this->get_content( '_syrcuit_' . $prefix . '_content', '<div class="syrcuit-copy">', '</div>' ) . '
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
					';
					break;
				case 'section-box':
					$this->html .= '
								<div class="section-box row" id="section">
									<div class="p-5">
										<div class="p-4 row">
											<div class="col-6 pe-md-4">
												' . $this->get_headline( '_syrcuit_' . $prefix . '_left_headline', '<h2 class="syrcuit-h2 mb-3">', '</h2>' ) . '
												' . $this->get_content( '_syrcuit_' . $prefix . '_left_content', '<div class="syrcuit-copy">', '</div>' ) . '
											</div>
											<div class="col-6 ps-md-4">
												' . $this->get_headline( '_syrcuit_' . $prefix . '_right_headline', '<h2 class="syrcuit-h2 mb-3">', '</h2>' ) . '
												' . $this->get_content( '_syrcuit_' . $prefix . '_right_content', '<div class="syrcuit-copy">', '</div>' ) . '
											</div>
										</div>
									</div>
								</div>
					';
					break;
				case 'sections':
					
					$items = $this->get_serialized_meta( '_syrcuit_' . $prefix . '_sections' );
					if ( $items ) {
						if ( is_array( $items ) ) {
							$row = 1;
							foreach ( $items as $item ) {
								$classes = 'col';
								switch ($row) {
								    case 1:
								        $classes = 'col col-lg-9';
								        break;
								    case 2:
								        $classes = 'col col-lg-9 offset-lg-3';
								        break;
								    case 3:
								        $classes = 'col col-lg-9';
								        break;
								}
								$this->html .= '
									<div class="row">
									<!-- start item -->
										<div id="syrcuit-service-content-'.$row.'" class="syrcuit-service-content p-5">
											<div class="'.$classes.' p-4">
												<h2 class="mb-4">' . $this->format_headline( $item['headline'] ) . '</h2>				
												<div class="syrcuit-copy">
													' . $this->filter_content( $item['content'] ) . '
												' . ( $item['label'] ? ( $item['url'] ? '<div class=""><a href="' . $item['url'] . '" class="btn btn-light px-4 py-2 mt-5" target="' . $item['target'] . '">' . $item['label'] . '</a></div>' : '' ) : '' ) . '
												</div>
											</div>
										</div>
									<!-- end item -->
									</div>';
									$row++;
							}
						}
					}		
					break;
				case 'benefits':
					
					$items = $this->get_serialized_meta( '_syrcuit_' . $prefix . '_benefits' );
					if ( $items ) {
						if ( is_array( $items ) ) {
							$this->html .= '<div class="row p-5" id="benefits">';
							foreach ( $items as $item ) {
								$this->html .= '
									<div class="col-md-6 benefit mb-3">
									<!-- start item -->
										<div class="row">
											<div class="col-auto">
												<div class="img-wrapper">
												' . ( $item['img_id'] ? wp_get_attachment_image( $item['img_id'], 'square_icon', false, array( 'class' => 'img-fluid' ) ) : '' ) . '
												</div>
											</div>
											<div class="col">
												<h3>' . $this->format_headline( $item['headline'] ) . '</h3>				
												<div class="benefit-copy my-3">
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
				case 'management':
				case 'board-of-directors':
					$this->html .= '
								<div id="content" class="row team-members '.$component.'">
									<div class="p-5">
										<div class="p-4">
											<div class="col">
											' . $this->get_headline( '_syrcuit_' . $prefix . '_headline', '<h2 class="syrcuit-h2 mb-4">', '</h2>' ) . '
											' . $this->get_content( '_syrcuit_' . $prefix . '_content', '<div class="syrcuit-copy">', '</div>' ) . '
											</div>
										</div>
									</div>
								</div>
					';
					$members = $this->get_serialized_meta( '_syrcuit_' . $prefix . '_members' );
					if ( $members ) {
						if ( is_array( $members ) ) {
							$this->html .= '<div class="p-5">
										<div class="p-4">
											<div class="col"><div class="row px-4" id="members">';
							$count = 1;
							foreach ( $members as $member ) {
								$this->html .= '
									<div class="col col-md-4 member mb-2">
										<div class="pe-4">
									<!-- start member -->									
										<div class="img-wrapper">
										' . ( $member['img_id'] ? wp_get_attachment_image( $member['img_id'], 'member_image', false, array( 'class' => 'img-fluid mb-3' ) ) : '' ) . '
										</div>
										<div class="accordion accordion-flush" id="accordion-member-'.$component.'-'.$count.'">
												<div class="accordion-item">
													<div class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#member-'.$component.'-'.$count.'" aria-expanded="false" aria-controls="member-'.$component.'-'.$count.'">
														<div>
														<h3>' . $this->format_headline( $member['full_name'] ) . '</h3>	
														<h4>' . $this->format_headline( $member['position'] ) . '</h4>	
														</div>
													</div>				
												<div id="member-'.$component.'-'.$count.'" class="accordion-collapse collapse" aria-labelledby="member-'.$component.'-'.$x.'" data-bs-parent="#accordion-member-'.$component.'-'.$count.'">
												      <div class="accordion-body biography">
												      	' . $this->filter_content( $member['biography'] ) . '
												      </div>
												    </div>
												  </div>
											</div>		
											</div>								
									<!-- end item -->
									</div>
									';
									$count++;
							}
							$this->html .= '</div></div></div>		
											</div>	';
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
