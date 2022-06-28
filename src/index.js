/**
 * Registers a new block provided a unique name and an object defining its behavior.
 *
 * @see https://developer.wordpress.org/block-editor/developers/block-api/#registering-a-block
 */
import { registerBlockType } from '@wordpress/blocks';

/**
 * Internal dependencies
 */
import Edit from './edit';
import save from './save';
import metadata from './block.json';

/**
 * Register a new block type definition.
 *
 * @see https://developer.wordpress.org/block-editor/developers/block-api/#registering-a-block
 */
registerBlockType( metadata.name, {
	/**
	 * Used to construct a preview for the block to be shown in the block inserter.
	 */
	example: {
		attributes: {
			message: 'Current Year',
		},
	},
	icon: {
		src: <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M3.097,11.731l-0.006,-0l0,0.269c0,4.917 3.992,8.909 8.909,8.909c2.755,-0 5.221,-1.254 6.855,-3.221l1.129,1.129c-1.926,2.253 -4.789,3.683 -7.984,3.683c-5.795,0 -10.5,-4.705 -10.5,-10.5c0,-1.613 0.364,-3.141 1.016,-4.508c-0,0 2.795,2.796 3.845,3.846l-3.244,0l-0.02,0.393Zm8.711,-1.043l0.19,0.191l3.637,-3.637c-0,0 1.143,1.144 1.143,1.144c0,-0 -3.971,3.971 -3.971,3.971l-0,5.028c-0,-0 -1.618,-0 -1.618,-0c0,-0 0,-5.028 0,-5.028l-3.967,-3.967c-0,-0 1.143,-1.144 1.143,-1.144c0,0 3.443,3.442 3.443,3.442Zm9.095,1.581l0.006,0l-0,-0.269c-0,-4.917 -3.992,-8.909 -8.909,-8.909c-2.755,0 -5.221,1.254 -6.855,3.221c0,0 -1.129,-1.129 -1.129,-1.129c1.926,-2.253 4.789,-3.683 7.984,-3.683c5.795,-0 10.5,4.705 10.5,10.5c0,1.613 -0.364,3.141 -1.016,4.508l-3.845,-3.846l3.244,-0c0.009,-0.131 0.016,-0.262 0.02,-0.393Z"/></svg>,
	},
	/**
	 * @see ./edit.js
	 */
	edit: Edit,
	/**
	 * @see ./save.js
	 */
	save,
} );
