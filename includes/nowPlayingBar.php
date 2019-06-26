<?php
$songQuery = mysqli_query($con, "SELECT * FROM songs ORDER BY RAND() LIMIT 10");

$resultArray = array();

while($row = mysqli_fetch_array($songQuery)){
    array_push($resultArray, $row['id']);
}

$jsonArray = json_encode($resultArray);

?>

<script>


$(document).ready(function() {
    var newPlayList = <?php echo $jsonArray; ?>;
    audioElement = new Audio();
    setTrack(newPlayList[0], newPlayList, false);
    updateVolumeProgressBar(audioElement.audio);

    $("#nowPlayingBarContainer").on("mousedown touchstart mousemove touchmove", function(e){
        e.preventDefault();
    })

    $(".playbackBar .progressBar").mousedown(function(){
        mouseDown = true;
    });

    $(".playbackBar .progressBar").mousemove(function(e){
        if(mouseDown){
            //set time of song depending on position of mouse
            timeFromOffset(e, this);
        }
    });
    
    $(".playbackBar .progressBar").mouseup(function(e){
        timeFromOffset(e, this);
    });

    
    $(".volumeBar .progressBar").mousedown(function(){
        mouseDown = true;
    });

    $(".volumeBar .progressBar").mousemove(function(e){
        if(mouseDown){

            var percentage = e.offsetX / $(this).width();

            if(percentage >= 0 && percentage <= 1){
            audioElement.audio.volume = percentage;
            }
        }
    });
    
    $(".volumeBar .progressBar").mouseup(function(e){
        
            var percentage = e.offsetX / $(this).width();
                
            if(percentage >= 0 && percentage <= 1){
            audioElement.audio.volume = percentage;
            }
    });

    $(document).mouseup(function(){
        mouseDown = false;
    });
});

function timeFromOffset(mouse, progressBar){
    var percentage = mouse.offsetX / $(progressBar).width() * 100;
    var seconds = audioElement.audio.duration * (percentage / 100);
    audioElement.setTime(seconds);
}

function prevSong() {
    if(audioElement.audio.currentTime >= 3 || currentIndex == 0) {
        audioElement.setTime(0);
    } else {
        currentIndex = currentIndex - 1;
        setTrack(currentPlayList[currentIndex], currentPlayList, true);
    }
} 

function nextSong() {

    if(repeat) {
        audioElement.setTime(0);
        playSong();
        return;
    }

    if(currentIndex == currentPlayList.length - 1) {
        currentIndex = 0;
    }
    else {
        currentIndex++;
    }

    var trackToPlay = shuffle ? shufflePlayList[currentIndex] : currentPlayList[currentIndex];
    setTrack(trackToPlay, currentPlayList, true); 
}

function setRepeat() {
    repeat = !repeat;
    var imageName = repeat ? "repeat.png" : "repeat2.png";
    $(".controlButton.repeat img").attr("src", "assets/images/" + imageName);
}

function setMute() {
    audioElement.audio.muted = !audioElement.audio.muted;
    var imageName = audioElement.audio.muted ? "mute.png" : "volume.png";
    $(".controlButton.volume img").attr("src", "assets/images/" + imageName);
}

function setShuffle() {
    shuffle = !shuffle;
    var imageName = shuffle ? "shuffle.png" : "shuffle1.png";
    $(".controlButton.shuffle img").attr("src", "assets/images/" + imageName);

    if(shuffle) {
        //Randomize Playlist
        shuffleArray(shufflePlayList);
        currentIndex = shufflePlayList.indexOf(audioElement.currentlyPlaying.id); 
    } else {
        //shuffle deactivated - regular playlist
        currentIndex = currentPlayList.indexOf(audioElement.currentlyPlaying.id); 
    }
}

function shuffleArray(a) {
    var j, x, i;
    for (i = a.length; i; i--) {
        j = Math.floor(Math.random() * i);
        x = a[i - 1];
        a[i - 1] = a[j];
        a[j] = x;
    }
}

function setTrack(trackId, newPlayList, play){

    if(newPlayList != currentPlayList){
        currentPlayList = newPlayList;
        shufflePlayList = currentPlayList.slice();
        shuffleArray(shufflePlayList);
    }

    if(shuffle){
        currentIndex = shufflePlayList.indexOf(trackId);
    } else{
        currentIndex = currentPlayList.indexOf(trackId);
    }

    pauseSong();

    //ajax call
$.post("includes/handlers/ajax/getSongJson.php", { songId: trackId}, function(data){
        
        var track = JSON.parse(data);

        $(".trackName span").text(track.title);

    $.post("includes/handlers/ajax/getArtistJson.php", { artistId: track.artist}, function(data){
        var artist = JSON.parse(data);
        $(".trackInfo .artistName span").text(artist.name);
        $(".trackInfo .artistName span").attr("onclick", "openPage('artist.php?id=" + artist.id + "')");
     });

    $.post("includes/handlers/ajax/getAlbumJson.php", { albumId: track.album}, function(data){
        var album = JSON.parse(data);
        $(".content .albumLink img").attr("src", album.artworkPath);
        $(".content .albumLink img").attr("onclick", "openPage('album.php?id=" + album.id + "')");
        $(".trackInfo .trackName span").attr("onclick", "openPage('album.php?id=" + album.id + "')");
    });

        audioElement.setTrack(track);
        if(play){ 
            playSong();
        }
    });

    
}
function playSong() {

    if(audioElement.audio.currentTime == 0){
        $.post("includes/handlers/ajax/updatePlays.php", { songId: audioElement.currentlyPlaying.id });
    }

    $(".controlButton.play").hide();
    $(".controlButton.pause").show();
    audioElement.play();
}

function pauseSong() {
    $(".controlButton.play").show();
    $(".controlButton.pause").hide();
    audioElement.pause();
}
</script>

<div id="nowPlayingBarContainer">
    <div id="nowPlayingBar">

<div id="nowPlayingLeft">
    <div class="content">
        <span class='albumLink'>
            <img role="link" tabindex="0" src="" class="albumArtwork" alt="">
        </span>
        <div class="trackInfo">
            <span class="trackName">
                <span role="link" tabindex="0"></span>
            </span>

            <span class="artistName">
                <span role="link" tabindex="0"></span>
            </span>
        </div>
    </div>
</div>
        
<div id="nowPlayingCenter">
<div class="content playerControls">

    <div class="buttons">

        <button class="controlButton shuffle" title="Shuffle button" onclick="setShuffle()">
            <img src="assets/images/shuffle1.png" alt="Shuffle">
        </button>

        <button class="controlButton previous" title="Previous button" onclick="prevSong()">
            <img src="assets/images/previous.png" alt="Previous">
        </button>

        <button class="controlButton play" title="Play button" onclick="playSong()">
            <img src="assets/images/play.png" alt="Play">
        </button>
        <button class="controlButton pause" title="Pause button" style="display: none;" onclick="pauseSong()">
            <img src="assets/images/pause.png" alt="Pause">
        </button>

        <button class="controlButton next" title="Next button">
            <img src="assets/images/next1.png" alt="Next" onclick="nextSong()">
        </button>

        <button class="controlButton repeat" title="Repeat button" onclick="setRepeat()">
            <img src="assets/images/repeat2.png" alt="Repeat">
        </button>

    </div>

    <div class="playbackBar">
        <span class="progressTime current"> 0.00</span>

        <div class="progressBar">
            <div class='progressBarBg'>
                <div class="progress"></div>
            </div>
        </div>

        <span class="progressTime remaining"> 0.00</span>
    </div>


</div>
</div>
        
<div id="nowPlayingRight">
<div class="volumeBar">
    <button class="controlButton volume" title="Volume button" onclick="setMute()">
        <img src="assets/images/volume.png" alt="Volume">
    </button>

    <div class="progressBar">
            <div class='progressBarBg'>
                <div class="progress"></div>
            </div>
        </div>


</div>

</div>
    </div>
    
</div>
