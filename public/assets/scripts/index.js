const COMMENTBUTTON = document.getElementById('commentButton');
const COMMENTFORM = document.getElementById('commentForm');
const LIKEBUTTON = document.getElementById('likeButton');
const IMAGE = document.getElementById('emptyHeart');

const button = document.querySelector('button');
const form = document.querySelector('#blablabla');

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

button.addEventListener('click', () => {
	if (form.classList.contains('open'))
	{
		form.classList.remove('open');
	}
	else
	{
		form.classList.add('open');
	}
});
const editButton = document.querySelector('.edit');
const editForm = document.querySelector('#editContainer');
editButton.addEventListener('click', () => {
	if (editForm.classList.contains('open'))
	{
		editForm.classList.remove('open');
	}
	else
	{
		editForm.classList.add('open');
	}
});
function showMessage()
{
	alert("Данные успешно отредактированы. Обновите страницу, чтобы убедиться в этом");
}

