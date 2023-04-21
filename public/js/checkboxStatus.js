
const linkCheckboxMP3 = document.getElementById('link-checkboxMP3');
const beatPriceMP3Input = document.getElementById('beatPriceMP3')
const linkCheckboxWAV = document.getElementById('link-checkboxWAV');
const beatPriceWAVInput = document.getElementById('beatPriceWAV')

$('#link-checkboxWAV').click(function() {
    let value = $('#link-checkboxWAV').is(':checked');
    $( '#beatPriceWAV' ).prop( "disabled", value ? false : true )
});
$('#link-checkboxMP3').click(function() {
    let value = $('#link-checkboxMP3').is(':checked');
    $( '#beatPriceMP3' ).prop( "disabled", value ? false : true )
});
linkCheckboxMP3.addEventListener('change', () => {
    if (linkCheckboxMP3.checked) {
        beatPriceMP3Input.disabled = false;
    } else if (!linkCheckboxMP3.checked) {
        beatPriceMP3Input.disabled = true;
    }
});
linkCheckboxWAV.addEventListener('change', () => {
    console.log(linkCheckboxWAV.checked)
    if (linkCheckboxWAV.checked) {
        beatPriceWAVInput.disabled = false;
    } else if (!linkCheckboxWAV.checked) {
        beatPriceWAVInput.disabled = true;
    }
});
