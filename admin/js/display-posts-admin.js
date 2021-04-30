(function( $ ) {
	'use strict';

	/**
	 * All of the code for your admin-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */
	/**
 * Internal block libraries
 */
const { __ } = wp.i18n;
const { select, withSelect } = wp.data;
const { Spinner } = wp.components;
/**
 * Register block
 */
registerBlockType( 'displayposts/displayposts-block', {
    title: __( 'Display Posts Blocks', 'wp-displayposts' ),
    description: __( 'Display Posts – Easy lists, grids, and more.' ),
    icon: 'calendar-alt',
    category: 'widgets',
    keywords: [
        __( 'Archive', 'Posts' )
    ],
    edit: withSelect( select => {
      const posts = select( 'core' ).getEntityRecords( 'postType', 'wp_events', { 'per_page': 2 } );
      console.log(posts);
      return posts;
    } )( props => {
      const posts = select( 'core' ).getEntityRecords( 'postType', 'wp_events', { 'per_page': 2 } );
      if ( ! posts ) {
        return wp.element.createElement("p", null, __('Loading...', 'wholesomecode'));
      }
      return wp.element.createElement("ul", null, posts.map(post => {
          return wp.element.createElement("li", null, wp.element.createElement("a", {
            href: post.link
          }, post.title.raw));
        }));
    } ),
    save: function() {
      return null;
    }
  } );
})( jQuery );
