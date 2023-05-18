<!-- HTML code for the tree view and video player -->
<div class="container">
  <div class="tree-view">
    <ul>
      <li>
        <span class="topic">Topic 1</span>
        <ul>
          <li><a href="#" data-video-id="1">Video 1.1</a></li>
          <li><a href="#" data-video-id="2">Video 1.2</a></li>
        </ul>
      </li>
      <li>
        <span class="topic">Topic 2</span>
        <ul>
          <li><a href="#" data-video-id="3">Video 2.1</a></li>
          <li><a href="#" data-video-id="4">Video 2.2</a></li>
        </ul>
      </li>
    </ul>
  </div>
  <div class="video-player">
    <video id="video-player" controls>
      <source src="" type="video/mp4">
    </video>
  </div>
</div>

<!-- CSS code to position the tree view and video player in a two-column layout -->
<style>
  .container {
    display: flex;
    flex-direction: row;
  }
  
  .tree-view {
    flex: 1;
    margin-right: 20px;
  }

  .video-player {
    flex: 1;
  }
</style>

<!-- JavaScript code to handle the click events and update the video player -->
<script>
  const videoPlayer = document.getElementById("video-player");

  // Add a click event listener to each anchor tag in the tree view
  document.querySelectorAll(".tree-view a").forEach(anchor => {
    anchor.addEventListener("click", event => {
      event.preventDefault(); // Prevent the default behavior of clicking a link

      const videoId = event.target.getAttribute("data-video-id"); // Get the video ID from the "data-video-id" attribute of the clicked anchor tag
      const videoSrc = `/videos/${videoId}.mp4`; // Construct the video file path

      videoPlayer.src = videoSrc; // Set the source of the video player to the new video file
      videoPlayer.play('videos/Telling the Time in English.mp4'); // Play the video
    });
  });
</script>
