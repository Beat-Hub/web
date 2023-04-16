function handleImageChange(event) {
    const reader = new FileReader();
    reader.onload = () => {
        const image = document.getElementById('profile-image');
        image.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
}

function countWords(textField) {
    let words = textField.value.split(/\s+/); // Dividir el texto en palabras
    if (words.length > 30) {
        words = words.slice(0, 30); // Cortar el array de palabras a 30
        textField.value = words.join(" "); // Unir las palabras en un string de texto
    }
}

