<?php
include("includes/includedFiles.php");

if(isset($_GET['id'])) {
    $artistId = $_GET['id'];
} else {
    header("Location: index.php");
}

$artist = new Artist($con, $artistId);
?>

<div class="entityInfo borderBottom">
    <div class="centerSection">
        <div class="artistInfo">
            <h1 class="artistName"><?php echo $artist->getName(); ?></h1>

            <div class="headerButtons">
                <button class="button purple" onclick="playFirstSong()">PLAY</button>
            </div>    
        </div>
    </div>
</div>

<!-- retrieve song -->

<div class="trackListContainer borderBottom">

    <h2>SONGS</h2>

        <ul class="trackList">
            
            <?php
                $songIdArray = $artist->getSongIds();
                
                $i = 1;
                foreach($songIdArray as $songId){

                    if($i > 7){
                        break;
                    }

                    $albumSong = new Song($con, $songId);

                        // $albumSong->getTitle();
                        $albumArtist = $albumSong->getArtist();

                        echo "<li class='trackListRow'>
                                    <div class='trackCount'>
                                    <img class='play' src='assets/images/play1.png' onclick='setTrack(\"" . $albumSong->getId() . "\", tempPlayList, true)'>
                                        <span class='trackNumber'>$i</span>
                                    </div>

                                    <div class='trackInfo'>
                                        <span class='trackName'>". $albumSong->getTitle() ."</span>
                                        <span class='artistName'>". $albumArtist->getName() ."</span>
                                    </div>

                                    <div class='trackOptions'>
                                        <input type='hidden' class='songId' value='" . $albumSong->getId() . "'>
                                        <img class='optionsButton' src='assets/images/more.png' onclick='showOptionsMenu(this)'>
                                    </div>

                                    <div class='trackDuration'>
                                        <span class='duration'>". $albumSong->getDuration() . "</span>
                                    </div>


                                </li>";
                        $i++;
                }

            ?>
            <script>
                var tempSongIds = '<?php echo json_encode($songIdArray); ?>';
                tempPlayList = JSON.parse(tempSongIds);
            </script>
            
        </ul>
    </div>

    <!-- Retrieve Album art -->

    <div class="gridViewContainer">

        <h2>ALBUMS</h2>

        <?php
            $albumQuery = mysqli_query($con, "SELECT * FROM albums WHERE artist='$artistId'");

            while ($row = mysqli_fetch_array($albumQuery)){
                echo "<div class='gridViewItem'>
                <span role='link' tabindex='0' onclick='openPage(\"album.php?id=". $row['id']."\")'>
                        <img src='". $row['artworkPath'] ."'>
                        <div class='gridViewInfo'>".
                        $row['title']
                        ."</div>
                        </span>
                    </div>";
            }
        ?>
    </div>

    <nav class="optionsMenu">
        <input type="hidden" class="songId">
        <?php echo Playlist::getPlaylistsDropdown($con, $userLoggedIn->getUsername()); ?>
    </nav>



