var player;

// Load the IFrame Player API code asynchronously.
var tag = document.createElement('script');
tag.src = "https://www.youtube.com/player_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

// Replace the 'ytplayer' element with an <iframe> and
// YouTube player after the API code downloads.
function onYouTubePlayerAPIReady() {
	player = new YT.Player('ytplayer', {
	  height: '390',
	  width: '640',
	  videoId: '9hvOP4PVTdQ',
	  events: {'onStateChange':onPlayerStateChange}
	});
}

function onPlayerStateChange(event) {
	var timeoutDuration;
	var noteEndTime = player.getDuration()*1000;
	switch(event.data) {
	  case YT.PlayerState.ENDED:
	    // console.log('Video ended');
	    break;
	  case YT.PlayerState.PLAYING:
	  	// console.log('Video started playing at '+player.getCurrentTime());
	  	
	    // Get current time on yt video (0 if first starting)
	    var currentTime = player.getCurrentTime() * 1000;

	    // Does same thing as showNoteBlock, except sets noteEndTime for timeoutDuration calculations (which needs to be done both inside recursive loop in setTimeout and outside it)
	    // FIXME: Could possibly be done with a prototype function
		$('#notes-block').children().each(function(){
			// $(this).parent().height(176);
			// Show note
			if(currentTime >= $(this).attr('data-start-time') && currentTime < $(this).attr('data-end-time')){
				$(this).fadeIn('slow');
				noteEndTime = $(this).attr('data-end-time');
				var heightval = $(this).height() + 80;

				// $(this).parent().animate({height:heightval},200);
			}else if(currentTime < $(this).next().attr('data-start-time') && currentTime >= $(this).attr('data-end-time')){
				// Set delay to period of not showing note (in case time is currently between notes)
				noteEndTime = $(this).next().attr('data-start-time');
				// $(this).parent().animate({height:60},200);
			}else{
				// Hide note
				$(this).fadeOut('slow');
			}
		});

	    timeoutDuration = noteEndTime - currentTime;
		setTimeout(function(){
		    // Figure out which block to display and display it
		    showNoteBlock();
	        onPlayerStateChange(event);
	   	}, timeoutDuration);
	   	break;
	  case YT.PlayerState.PAUSED:
	  	// console.log("Video paused at "+player.getCurrentTime());
	    break;
	}
}

function showNoteBlock(){
	var time = player.getCurrentTime() * 1000;
	$('#notes-block').children().each(function(){
		if(time >= $(this).attr('data-start-time') && time < $(this).attr('data-end-time')){
			$(this).fadeIn('slow');
		}else{
			$(this).fadeOut('slow');
		}
	});
 }