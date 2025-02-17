<?php
/**
 * Icons for Astra theme.
 *
 * @package     Astra
 * @link        https://www.brainstormforce.com
 * @since       Astra 3.3.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Icons Initial Setup
 *
 * @since 3.3.0
 */
class Astra_Icons {
	/**
	 * Constructor function that initializes required actions and hooks
	 */
	public function __construct() {
		// Remove astra.woff and other format of Astra font files when SVG is enabled.
		if ( self::is_svg_icons() ) {
			add_filter( 'astra_enable_default_fonts', '__return_false' );
		}
	}

	/**
	 * Check if we need to load icons as SVG or fonts.
	 * Returns true if SVG false if font.
	 *
	 * @since 3.3.0
	 *
	 * @return boolean should be svg or font.
	 */
	public static function is_svg_icons() {
		$astra_settings = astra_get_options();
		return apply_filters( 'astra_is_svg_icons', isset( $astra_settings['can-update-astra-icons-svg'] ) ? $astra_settings['can-update-astra-icons-svg'] : true );
	}

	/**
	 * Get SVG icons.
	 * Returns the SVG icon you want to display.
	 *
	 * @since 3.3.0
	 *
	 * @param string  $icon Key for the SVG you want to load.
	 * @param boolean $is_echo whether to echo the output or return.
	 * @param boolean $replace load close markup for SVG.
	 * @param string  $menu_location Creates dynamic filter for passed parameter.
	 *
	 * @return string SVG for passed key.
	 */
	public static function get_icons( $icon, $is_echo = false, $replace = false, $menu_location = 'main' ) {
		$output = '';
		if ( true === self::is_svg_icons() ) {
			switch ( $icon ) {
				case 'menu-bars':
					$output = '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="ast-menu-bars-icon" x="0px" y="0px" width="20px" height="20px" viewBox="57 41.229 26 18.806" enable-background="new 57 41.229 26 18.806" xml:space="preserve">
                <path d="M82.5,41.724h-25v3.448h25V41.724z M57.5,48.907h25v3.448h-25V48.907z M82.5,56.092h-25v3.448h25V56.092z"/>
                </svg>';
					break;

				case 'close':
					$output = '<svg viewBox="0 0 512 512" aria-hidden="true" role="img" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px">
                                <path d="M71.029 71.029c9.373-9.372 24.569-9.372 33.942 0L256 222.059l151.029-151.03c9.373-9.372 24.569-9.372 33.942 0 9.372 9.373 9.372 24.569 0 33.942L289.941 256l151.03 151.029c9.372 9.373 9.372 24.569 0 33.942-9.373 9.372-24.569 9.372-33.942 0L256 289.941l-151.029 151.03c-9.373 9.372-24.569 9.372-33.942 0-9.372-9.373-9.372-24.569 0-33.942L222.059 256 71.029 104.971c-9.372-9.373-9.372-24.569 0-33.942z" />
                            </svg>';
					break;

				case 'search':
					$output = '<svg width="31" height="33" viewBox="0 0 31 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <g clip-path="url(#clip0_4139_1817)">
                      <path d="M11.2868 22.1465C17.2847 22.1465 22.1469 17.2843 22.1469 11.2864C22.1469 5.28856 17.2847 0.426331 11.2868 0.426331C5.28899 0.426331 0.426758 5.28856 0.426758 11.2864C0.426758 17.2843 5.28899 22.1465 11.2868 22.1465Z" stroke="black" stroke-width="0.852663" stroke-miterlimit="10"/>
                      <path d="M17.124 20.4412L26.8472 30.5083C27.3958 31.0767 28.1063 31.4803 28.8879 31.5969C29.6695 31.7134 30.4114 31.5542 30.5506 30.4913C30.6501 29.7295 30.3602 28.9707 29.823 28.4193L19.7389 18.0992" stroke="black" stroke-width="0.852663" stroke-miterlimit="10"/>
                      </g>
                      <defs>
                      <clipPath id="clip0_4139_1817">
                      <rect width="31" height="32.0545" fill="white"/>
                      </clipPath>
                      </defs>
                    </svg>';
					break;


				case 'arrow':
					$output = '<svg class="ast-arrow-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" width="26px" height="16.043px" viewBox="57 35.171 26 16.043" enable-background="new 57 35.171 26 16.043" xml:space="preserve">
                <path d="M57.5,38.193l12.5,12.5l12.5-12.5l-2.5-2.5l-10,10l-10-10L57.5,38.193z"/>
                </svg>';
					break;

				case 'cart':
					$output = '<svg width="41" height="38" viewBox="0 0 41 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 1.24478H7.73212L10.121 30.5823H35.8409" stroke="#1C2240" stroke-miterlimit="10"/>
                        <path d="M8.16797 6.60263L39.8577 6.97712L36.8177 24.9404H9.66103" stroke="#1C2240" stroke-miterlimit="10"/>
                        <path d="M14.8355 36.7552C16.5401 36.7552 17.922 35.3733 17.922 33.6687C17.922 31.9641 16.5401 30.5822 14.8355 30.5822C13.1309 30.5822 11.749 31.9641 11.749 33.6687C11.749 35.3733 13.1309 36.7552 14.8355 36.7552Z" stroke="#1C2240" stroke-miterlimit="10"/>
                        <path d="M31.4351 36.7552C33.1397 36.7552 34.5216 35.3733 34.5216 33.6687C34.5216 31.9641 33.1397 30.5822 31.4351 30.5822C29.7305 30.5822 28.3486 31.9641 28.3486 33.6687C28.3486 35.3733 29.7305 36.7552 31.4351 36.7552Z" stroke="#1C2240" stroke-miterlimit="10"/>
                      </svg>
                        ';
					break;

				case 'bag':
					$output = '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="ast-bag-icon-svg" x="0px" y="0px" width="100" height="100" viewBox="826 826 140 140" enable-background="new 826 826 140 140" xml:space="preserve">
				<path d="M960.758,934.509l2.632,23.541c0.15,1.403-0.25,2.657-1.203,3.761c-0.953,1.053-2.156,1.579-3.61,1.579H833.424  c-1.454,0-2.657-0.526-3.61-1.579c-0.952-1.104-1.354-2.357-1.203-3.761l2.632-23.541H960.758z M953.763,871.405l6.468,58.29H831.77  l6.468-58.29c0.15-1.203,0.677-2.218,1.58-3.045c0.903-0.827,1.981-1.241,3.234-1.241h19.254v9.627c0,2.658,0.94,4.927,2.82,6.807  s4.149,2.82,6.807,2.82c2.658,0,4.926-0.94,6.807-2.82s2.821-4.149,2.821-6.807v-9.627h28.882v9.627  c0,2.658,0.939,4.927,2.819,6.807c1.881,1.88,4.149,2.82,6.807,2.82s4.927-0.94,6.808-2.82c1.879-1.88,2.82-4.149,2.82-6.807v-9.627  h19.253c1.255,0,2.332,0.414,3.235,1.241C953.086,869.187,953.612,870.202,953.763,871.405z M924.881,857.492v19.254  c0,1.304-0.476,2.432-1.429,3.385s-2.08,1.429-3.385,1.429c-1.303,0-2.432-0.477-3.384-1.429c-0.953-0.953-1.43-2.081-1.43-3.385  v-19.254c0-5.315-1.881-9.853-5.641-13.613c-3.76-3.761-8.298-5.641-13.613-5.641s-9.853,1.88-13.613,5.641  c-3.761,3.76-5.641,8.298-5.641,13.613v19.254c0,1.304-0.476,2.432-1.429,3.385c-0.953,0.953-2.081,1.429-3.385,1.429  c-1.303,0-2.432-0.477-3.384-1.429c-0.953-0.953-1.429-2.081-1.429-3.385v-19.254c0-7.973,2.821-14.779,8.461-20.42  c5.641-5.641,12.448-8.461,20.42-8.461c7.973,0,14.779,2.82,20.42,8.461C922.062,842.712,924.881,849.519,924.881,857.492z"/>
				</svg>';
					break;

				case 'basket':
					$output = '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="ast-basket-icon-svg" x="0px" y="0px" width="100" height="100" viewBox="826 826 140 140" enable-background="new 826 826 140 140" xml:space="preserve">
				<path d="M955.418,887.512c2.344,0,4.343,0.829,6.002,2.486c1.657,1.659,2.486,3.659,2.486,6.002c0,2.343-0.829,4.344-2.486,6.001  c-1.659,1.658-3.658,2.487-6.002,2.487h-0.994l-7.627,43.9c-0.354,2.033-1.326,3.713-2.917,5.04  c-1.593,1.326-3.405,1.989-5.438,1.989h-84.883c-2.033,0-3.846-0.663-5.438-1.989c-1.591-1.327-2.564-3.007-2.918-5.04l-7.626-43.9  h-0.995c-2.343,0-4.344-0.829-6.001-2.487c-1.658-1.657-2.487-3.658-2.487-6.001c0-2.343,0.829-4.343,2.487-6.002  c1.658-1.658,3.659-2.486,6.001-2.486H955.418z M860.256,940.563c1.149-0.089,2.111-0.585,2.885-1.491  c0.773-0.907,1.116-1.936,1.028-3.085l-2.122-27.586c-0.088-1.15-0.585-2.111-1.492-2.885c-0.906-0.774-1.934-1.117-3.083-1.028  c-1.149,0.088-2.111,0.586-2.885,1.492s-1.116,1.934-1.028,3.083l2.122,27.587c0.088,1.105,0.542,2.034,1.359,2.785  c0.818,0.752,1.78,1.128,2.885,1.128H860.256z M887.512,936.319v-27.587c0-1.149-0.42-2.144-1.26-2.984  c-0.84-0.84-1.834-1.26-2.984-1.26s-2.144,0.42-2.984,1.26c-0.84,0.841-1.26,1.835-1.26,2.984v27.587c0,1.149,0.42,2.145,1.26,2.984  c0.84,0.84,1.835,1.26,2.984,1.26s2.144-0.42,2.984-1.26C887.092,938.464,887.512,937.469,887.512,936.319z M912.977,936.319  v-27.587c0-1.149-0.42-2.144-1.26-2.984c-0.841-0.84-1.835-1.26-2.984-1.26s-2.145,0.42-2.984,1.26  c-0.84,0.841-1.26,1.835-1.26,2.984v27.587c0,1.149,0.42,2.145,1.26,2.984s1.835,1.26,2.984,1.26s2.144-0.42,2.984-1.26  C912.557,938.464,912.977,937.469,912.977,936.319z M936.319,936.65l2.122-27.587c0.088-1.149-0.254-2.177-1.027-3.083  s-1.735-1.404-2.885-1.492c-1.15-0.089-2.178,0.254-3.084,1.028c-0.906,0.773-1.404,1.734-1.492,2.885l-2.122,27.586  c-0.088,1.149,0.254,2.178,1.027,3.085c0.774,0.906,1.736,1.402,2.885,1.491h0.332c1.105,0,2.066-0.376,2.885-1.128  C935.777,938.685,936.23,937.756,936.319,936.65z M859.66,855.946l-6.167,27.322h-8.753l6.698-29.245  c0.84-3.89,2.807-7.062,5.902-9.516c3.095-2.453,6.632-3.68,10.611-3.68h11.074c0-1.149,0.42-2.144,1.26-2.984  c0.84-0.84,1.835-1.26,2.984-1.26h25.465c1.149,0,2.144,0.42,2.984,1.26c0.84,0.84,1.26,1.834,1.26,2.984h11.074  c3.979,0,7.516,1.227,10.611,3.68c3.094,2.454,5.062,5.626,5.901,9.516l6.697,29.245h-8.753l-6.168-27.322  c-0.486-1.945-1.491-3.537-3.017-4.774c-1.525-1.238-3.282-1.857-5.272-1.857h-11.074c0,1.15-0.42,2.144-1.26,2.984  c-0.841,0.84-1.835,1.26-2.984,1.26h-25.465c-1.149,0-2.144-0.42-2.984-1.26c-0.84-0.84-1.26-1.834-1.26-2.984h-11.074  c-1.99,0-3.747,0.619-5.272,1.857C861.152,852.409,860.146,854,859.66,855.946z"/>
				</svg>';
					break;

				case 'play':
					$output =
          '<svg width="80px" height="80px" viewBox="0 0 24 24" id="_24x24_On_Light_Play" xmlns="http://www.w3.org/2000/svg">
            <rect id="view-box" width="24" height="24" fill="none"/>
            <path id="Shape" d="M0,9.75A9.75,9.75,0,1,1,9.75,19.5,9.761,9.761,0,0,1,0,9.75Zm1.5,0A8.25,8.25,0,1,0,9.75,1.5,8.259,8.259,0,0,0,1.5,9.75Zm5.75-3.8,7,3.8-7,3.8Z" transform="translate(2.25 2.25)" fill="#FFF"/>
          </svg>';
					break;

				default:
					$output = '';
					break;
			}

			if ( $replace ) {
				$output .= '<svg class="ast-close-icon-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" width="18px" height="18px" viewBox="-63 -63 140 140" enable-background="new -63 -63 140 140" xml:space="preserve">
                <path d="M75.133-47.507L61.502-61.133L7-6.625l-54.507-54.507l-13.625,13.625L-6.625,7l-54.507,54.503l13.625,13.63     L7,20.631l54.502,54.502l13.631-13.63L20.63,7L75.133-47.507z"/></svg>';
			}
		} else {
			if ( 'menu-bars' === $icon ) {
				$menu_icon = apply_filters( 'astra_' . $menu_location . '_menu_toggle_icon', 'menu-toggle-icon' );
				$output    = '<span class="' . esc_attr( $menu_icon ) . '"></span>';
			}
		}

		$output = apply_filters( 'astra_svg_icon_element', $output, $icon );

		$classes = array(
			'ast-icon',
			'icon-' . $icon,
		);

		$output = sprintf(
			'<span class="%1$s">%2$s</span>',
			implode( ' ', $classes ),
			$output
		);

		if ( ! $is_echo ) {
			return apply_filters( 'astra_svg_icon', $output, $icon );
		}

		echo apply_filters( 'astra_svg_icon', $output, $icon ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}
new Astra_Icons();
