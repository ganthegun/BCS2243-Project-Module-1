document.addEventListener('DOMContentLoaded', function () {
    // Add click event listeners to dropdown buttons
    var dropdownButtons = document.querySelectorAll('.dropbtn');
    
    dropdownButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            var dropdownContent = this.nextElementSibling;
            dropdownContent.style.display = (dropdownContent.style.display === 'block') ? 'none' : 'block';
        });
    });
});
