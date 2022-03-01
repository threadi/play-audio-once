/* Add custom attribute to image block, in Sidebar */
const { __ } = wp.i18n;

// Enable custom attributes on Image block
const enableSidebarSelectOnBlocks = [
    'core/audio'
];

const { createHigherOrderComponent } = wp.compose;
const { Fragment } = wp.element;
const { InspectorControls } = wp.blockEditor;
const { PanelBody, CheckboxControl } = wp.components;

import classnames from 'classnames'

/**
 * Declare our custom audio-attribute
 */
const setSidebarSelectAttribute = ( settings, name ) => {
    // Do nothing if it's another block than our defined ones.
    if ( ! enableSidebarSelectOnBlocks.includes( name ) ) {
        return settings;
    }

    return Object.assign( {}, settings, {
        attributes: Object.assign( {}, settings.attributes, {
            playOnce: { type: 'boolean' }
        } ),
    } );
};
wp.hooks.addFilter(
    'blocks.registerBlockType',
    'custom-attributes/set-sidebar-select-attribute',
    setSidebarSelectAttribute
);

/**
 * Add custom option to block in Edit
 */
const withSidebarSelectProp = createHigherOrderComponent( ( BlockListBlock ) => {
    return ( props ) => {

        // If current block is not allowed
        if ( ! enableSidebarSelectOnBlocks.includes( props.name ) ) {
            return (
                <BlockListBlock { ...props } />
            );
        }

        const { attributes } = props;
        const { imageAttribute } = attributes;

        if ( imageAttribute ) {
            return <BlockListBlock { ...props } className={ 'has-option-' + imageAttribute } />
        } else {
            return <BlockListBlock { ...props } />
        }
    };
}, 'withSidebarSelectProp' );

wp.hooks.addFilter(
    'editor.BlockListBlock',
    'custom-attributes/with-sidebar-select-prop',
    withSidebarSelectProp
);

/**
 * Add custom option to audio sidebar
 */
const addOptionInSidebar = createHigherOrderComponent( ( BlockEdit ) => {
    return ( props ) => {

        // If current block is not allowed
        if ( ! enableSidebarSelectOnBlocks.includes( props.name ) ) {
            return (
                <BlockEdit { ...props } />
            );
        }

        const { attributes, setAttributes } = props;
        const { playOnce } = attributes;

        return (
            <Fragment>
                <BlockEdit { ...props } />
                <InspectorControls>
                    <PanelBody
                        title={ __( 'Advanced Audio Controls', 'play-audio-once' ) }
                    >
                        <CheckboxControl
                            label={__('play only once per session', 'play-audio-once')}
                            checked={ playOnce }
                            onChange={ ( value ) => {
                                setAttributes( {
                                    playOnce: value,
                                } );
                            } }
                        />
                    </PanelBody>
                </InspectorControls>
            </Fragment>
        );
    };
}, 'withSidebarSelect' );

wp.hooks.addFilter(
    'editor.BlockEdit',
    'custom-attributes/with-sidebar-select',
    addOptionInSidebar
);

/**
 * Save custom audio-attribute
 */
const saveOptionFromSidebar = ( extraProps, blockType, attributes ) => {
    // Do nothing if it's another block than our defined ones.
    if ( enableSidebarSelectOnBlocks.includes( blockType.name ) ) {
        const { playOnce } = attributes;
        if ( playOnce ) {
            extraProps.className = classnames( extraProps.className, 'audio-play-once-' + playOnce )
        }
    }
    return extraProps;
};
wp.hooks.addFilter(
    'blocks.getSaveContent.extraProps',
    'custom-attributes/save-sidebar-select-attribute',
    saveOptionFromSidebar
);