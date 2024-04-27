function diableJS() {

    /*Radio buttons */
    var pieceRadio = document.getElementById('piece_radio');
    var gramsRadio = document.getElementById('grams_radio');

    /*text feild  */
    var Textboxpice = document.getElementById('num_piece');
    var Textboxgram = document.getElementById('num_grams');



    if (pieceRadio.checked) {
        Textboxpice.disabled = true;
        Textboxgram.disabled = false;

    } else if (gramsRadio.checked) {
        Textboxgram.disabled = true;
        Textboxpice.disabled = false;

    }

}
diableJS()