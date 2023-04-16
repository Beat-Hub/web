function handleImageChange(event) {
    const reader = new FileReader();
    reader.onload = () => {
        const image = document.getElementById('profile-image');
        image.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
}
