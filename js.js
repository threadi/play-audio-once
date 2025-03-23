/**
 * Check some things on load.
 */
jQuery(document).ready(function($) {
    $('.audio-play-once-true > audio, .audio-play-once-true .mejs-mediaelement audio').each(function () {
        // get md5 of the audio-filename
        let fileMd5 = $.md5($(this).attr('src'));

        // check if audio has already played on load
        playOnceCheckState( $(this), fileMd5 );

        // check if audio has already played on play
        // and mark it als played
        $(this).on('play', function () {
            playOnceCheckState( $(this), fileMd5 );
            // set marker that audio-file has been played
            sessionStorage.setItem('audioPlayed' + fileMd5, '1');
        });
    });
});

/**
 * Check if audio has been played.
 *
 * If yes:
 * - empty the src-attribute
 * - add disabled-class
 *
 * @param obj
 * @param fileMd5
 */
function playOnceCheckState( obj, fileMd5 ) {
    if( sessionStorage.getItem('audioPlayed' + fileMd5) != null ) {
        obj.attr('src', '');
        obj.addClass('disabled');
    }
}