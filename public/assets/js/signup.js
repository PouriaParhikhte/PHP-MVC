const signupForm = document.forms[0], signupResult = document.getElementById('signupResult');
signupForm.addEventListener('submit', async e => {
    let inputs = signupForm.querySelectorAll('input:not([type=submit])'),
        fields = [];
    inputs.forEach((value) => {
        fields[value.name] = value.value;
    });
    e.preventDefault();
    const response = await fetch(signupForm.getAttribute('action'), {
        method: signupForm.getAttribute('method'),
        headers: {
            ContentType: 'application/x-www-form-urlencoded; charset=UTF-8',
            type: 'xhr',
        },
        body: JSON.stringify(Object.assign({}, fields))
    });
    signupResult.textContent = await response.text();
});