document.addEventListener('DOMContentLoaded', () => {
    (function () {
        $("#CreateEventStartDate").datepicker({
            dateFormat: 'yy/mm/dd'
        });
    })();

    (function () {
        $("#CreateEventEndDate").datepicker({
            dateFormat: 'yy/mm/dd'
        });
    })();


    const isLimited = $("#isLimited");
    const maxGuestsParent = $("#maxGuestsParent");
    const maxGuestsTextInput = $("#maxGuestsTextInput");

    maxGuestsTextInput.fadeOut(300);

    maxGuestsParent.on("change", function () {
        if (isLimited.is(':checked')) {
            maxGuestsTextInput.fadeIn(300);
        } else {
            maxGuestsTextInput.fadeOut(300);
        }
    });

   

    const profilePictureInput = $("#profilePicture");
    const displayFileText = $("#displayFileText");

    function getFileData(myFile) {
        const file = myFile.files[0];
        const filename = file.name;
        // document.getElementById('displayFileText').val = filename;
        displayFileText.text(filename);
    }

}); // DOM Content Loaded listener ends