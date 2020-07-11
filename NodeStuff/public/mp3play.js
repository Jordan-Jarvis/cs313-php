var wavesurfer = WaveSurfer.create({
    barWidth: 1,
    container: '#wavesurfer',
    cursorWidth: 0,
    dragSelection: true,
    height: 500,
    hideScrollbar: true,
    interact: true,
    normalize: true,
    waveColor: 'rgba(255,255,255,.05)',
    progressColor: 'rgba(255,255,255,.15)'
});
var currentPlay = 0;
var numSongs = 0;
var maybe;
//get list of songs from json using node server
$.getJSON('/getSonglist?id=0', function(jd) {
  console.log('loading ' + jd[currentPlay].filen);
  maybe = jd;
});

//play function, needs some file to play
$('.player').on('click', '#play', function(){
  if( $(this).hasClass('load') ){
    $(this).removeClass('load');
    document.getElementById('title').innerText = maybe[currentPlay].title
    //change album art to new art
    document.getElementsByClassName('artist__image-url')[0].style.background = "url('/public/mp3art/" + maybe[currentPlay].filen + ".jpg')";
    //play the song
    wavesurfer.load('/public/mp3/' + maybe[currentPlay].filen + '.mp3');
  } else {
    wavesurfer.playPause();
  }
});

//next or previous song
$('.player').on('click', '#next', function(){loadNext(0);});
$('.player').on('click', '#prev', function(){loadNext(1);});

// if 0 then normal, if 1 then reverse, potentially 2 for shuffle in future
function loadNext(num){
    $(this).removeClass('load');
    if(num == 1)
    {
      //reverse direction!
      if(currentPlay == 0)
      {
        currentPlay = maybe.length - 1;
      }
      else{
        currentPlay = currentPlay - 1;
      }
    }
    else{
      if(currentPlay + 1 == maybe.length)
      {
        currentPlay = 0;
      }
      else{
        currentPlay = currentPlay + 1;
      }
    }
    //log songs that load
    console.log('loading ' + maybe[currentPlay].filen);
    // change title to new song
    document.getElementById('title').innerText = maybe[currentPlay].title
    //change album art to new art
    document.getElementsByClassName('artist__image-url')[0].style.background = "url('/public/mp3art/" + maybe[currentPlay].filen + ".jpg')";
    //play the song
    wavesurfer.load('/public/mp3/' + maybe[currentPlay].filen + '.mp3');
}

var m,
    s;

// get minutes 
function getMinutes( convTime ){
  convTime = Number(convTime);
  m = Math.floor(convTime% 3600 / 60);
  return ((m < 10 ? "0" : "") + m);
}

// get seconds
function getSeconds( convTime ){
  convTime = Number(convTime);
  s = Math.floor(convTime % 3600 % 60);
  return ((s < 10 ? "0" : "") + s);
}

var totalTime,
    timeJump,
    currentTime,
    currentTimeJump;

//animation for loading and song progress
wavesurfer.on('ready', function(){
  totalTime = wavesurfer.getDuration();
  timeJump = 300 / totalTime;
  $('.wavesurfer__elem').addClass('show');
  $('.button__loader').fadeOut();
  $('.time__minutes').text( getMinutes( totalTime ) );
  $('.time__seconds').text( getSeconds( totalTime ) );
  $('.time, .progress').fadeIn();
  
  wavesurfer.play();
});

// put the little ball thingy in the right place
function progressJump(){
  currentTime = wavesurfer.getCurrentTime();
  currentTimeJump = currentTime * timeJump + 10;
  $('.progress__button').css({ left: currentTimeJump+'px' });
  $('.progress__indicator').css({ width: currentTimeJump+'px' });
  
  $('.time__minutes').text( getMinutes( currentTime ) );
  $('.time__seconds').text( getSeconds( currentTime ) );
}

//when processing audio make the progress bar progress
wavesurfer.on('audioprocess', function(){
  progressJump();
});

// when song ends, go to the next one
wavesurfer.on('finish', function(){
  loadNext(1);
})

// change button on pause to look like a play button
wavesurfer.on('pause', function(){
  $('.button__play-iconplay').fadeIn();
  $('.button__play-iconpause').fadeOut();
  $('.recordplayer').removeClass('play');
  $('.recordplayer__disc').removeClass('animate');
  $('.artist__image').removeClass('play');
});

//change play button to pause when music plays
wavesurfer.on('play', function(){
  $('.button__play-iconplay').fadeOut();
  $('.button__play-iconpause').fadeIn();
  $('.recordplayer').addClass('play');
  $('.recordplayer__disc').addClass('animate');
  $('.artist__image').addClass('play');
});

//make a semi-transparent animation to represent buffering
wavesurfer.on('loading', function(event){
  $('.button__loader').css({ height: event+'px' });
});

// move to specific part of song on user changing the slider
wavesurfer.on('seek', function(event){
  progressJump();
});
