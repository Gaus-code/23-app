const COMMENTBUTTON = document.getElementById('commentButton');
const COMMENTFORM = document.getElementById('commentForm');
const LIKEBUTTON = document.getElementById('likeButton');
const IMAGE = document.getElementById('emptyHeart');

COMMENTBUTTON.addEventListener('click', function() {
  if (COMMENTFORM.style.height === '0px' || COMMENTFORM.style.height === '') {
    COMMENTFORM.style.height = '50px';
    COMMENTFORM.style.opacity = '1';
  } else {
    COMMENTFORM.style.height = '0px';
    COMMENTFORM.style.opacity = '0';
  }
});

LIKEBUTTON.addEventListener('click', function() {
  IMAGE.src = '/assets/images/heart.svg';
});

document.getElementById('likeButton').addEventListener('click', function() {
  let randomColor = '#'+Math.floor(Math.random()*16777215).toString(16);
  this.style.color = randomColor;
});