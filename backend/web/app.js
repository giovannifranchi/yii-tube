// document.addEventListener('DOMContentLoaded', function () {
//     const videoFile = document.getElementById('videoFile');
//     videoFile.addEventListener('change', (e) => {
//         videoFile.closest('form').submit()
//     })
// })

//jquery version

$(function() {
    // Your code here will run once the DOM is loaded
    $('#videoFile').change( (e) => { 
        $(e.target).closest('form').trigger('submit')
    });
});