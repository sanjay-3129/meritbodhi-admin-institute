const videoPlayer = document.querySelector('.video-player')
const video = videoPlayer.querySelector('.video')
const playButton = videoPlayer.querySelector('.play-button')
const volume = videoPlayer.querySelector('.volume')
const currentTimeElement = videoPlayer.querySelector('.current')
const cutt = videoPlayer.querySelector('.cut-time')
const durationTimeElement = videoPlayer.querySelector('.duration')
const progress = videoPlayer.querySelector('.video-progress')
const progressBar = videoPlayer.querySelector('.video-progress-filled')
var butt=document.getElementById('popo');
var inpfl=document.getElementById('videouploadbuttonid');
var viii=document.getElementById('viii');
var dfd=document.getElementById('createcrs');
var dfdd=document.getElementById('cutdura');

inpfl.addEventListener("change", function() {
  if(event.target.files.length==0){
            return;
  }
  var turl=URL.createObjectURL(event.target.files[0]);
  viii.setAttribute("src",turl);
});


//Play and Pause button
playButton.addEventListener('click', (e) => {
  if(video.paused){
    video.play()
    e.target.textContent = '❚ ❚'
  } else {
    video.pause()
    e.target.textContent = "Play"
  }
})

//volume
volume.addEventListener('mousemove', (e)=> {
  video.volume = e.target.value
})

//current time and duration
const currentTime = () => {
  var hours = Math.floor(video.duration / 3600);
  var time = video.duration - hours * 3600;
  var minutes = Math.floor(time / 60);
  var seconds = Math.floor(time - minutes * 60);

  if(hours<10){
    hours="0"+hours;
  }
  if(minutes<10){
    minutes="0"+minutes;
  }
  if(seconds<10){
    seconds="0"+seconds;
  }

  var hours1 = Math.floor(video.currentTime / 3600);
  var time1 = video.currentTime - hours1 * 3600;
  var minutes1 = Math.floor(time1 / 60);
  var seconds1 = Math.floor(time1 - minutes1 * 60);

  if(hours1<10){
    hours1="0"+hours1;
  }
  if(minutes1<10){
    minutes1="0"+minutes1;
  }
  if(seconds1<10){
    seconds1="0"+seconds1;
  }

  let currentMinutes = Math.floor(video.currentTime / 60)
  let currentSeconds = Math.floor(video.currentTime - currentMinutes * 60)
  let durationMinutes = Math.floor(video.duration / 60)
  let durationSeconds = Math.floor(video.duration - durationMinutes * 60)

  currentTimeElement.innerHTML = `${hours1}:${minutes1}:${seconds1}`
  durationTimeElement.innerHTML = `${hours}:${minutes}:${seconds}`
}

video.addEventListener('timeupdate', currentTime)

 
//Progress bar
video.addEventListener('timeupdate', () =>{
  const percentage = (video.currentTime / video.duration) * 100
  progressBar.style.width = `${percentage}%`
})


//change progress bar on click
progress.addEventListener('click', (e) =>{
  const progressTime = (e.offsetX / progress.offsetWidth) * video.duration
  video.currentTime = progressTime

  var hours = Math.floor(progressTime / 3600);
  var time = progressTime - hours * 3600;
  var minutes = Math.floor(time / 60);
  var seconds = Math.floor(time - minutes * 60);
  
  if(hours<10){
    hours="0"+hours;
  }
  if(minutes<10){
    minutes="0"+minutes;
  }
  if(seconds<10){
    seconds="0"+seconds;
  }
  cutt.innerHTML="Starting Time : "+hours+":"+minutes+":"+seconds;
})