const form = document.querySelector('#name-collection-form');
const submitButton = document.querySelector('#submit-button');

form.addEventListener('submit', (event) => {
	event.preventDefault();

	const name1 = document.querySelector('#name1').value;
	const name2 = document.querySelector('#name2').value;
	const name3 = document.querySelector('#name3').value;
	const gender = document.querySelector('#gender').value;

	// Here you can send the collected data to a backend server using AJAX or fetch API
	console.log(`Name: ${name1} ${name2} ${name3}\nGender: ${gender}`);

	form.reset();
});
