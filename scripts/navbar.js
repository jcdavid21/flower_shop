document.addEventListener("DOMContentLoaded", function() {
    if (JSON.parse(localStorage.getItem("userDetails"))) {
        const dropDown = document.querySelector(".drop-down");
        const profileDiv = document.querySelector(".profile-div");
        let count = 0;

        if (dropDown && profileDiv) {
            dropDown.addEventListener("click", function() {
                if (count === 0) {
                    profileDiv.style.display = "block";
                    count = 1;
                } else {
                    profileDiv.style.display = "none";
                    count = 0;
                }
            });
        }

        const logOut = document.querySelector(".logOut");
        
        if (logOut) {
            logOut.addEventListener("click", () => {
                localStorage.removeItem("logInAcc");
            });
        }
    }
});

// Existing navbar.js code may be here

// Add search functionality
$(document).ready(function() {
    // Handle search form submission
    $('.search-bar').submit(function(e) {
        const query = $('#search_bar').val().trim();
        
        // Validate search query
        if (query === '') {
            e.preventDefault();
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Please enter a search term!'
            });
        }
    });
    
    // Optional: Trigger search on Enter key press
    $('#search_bar').keypress(function(e) {
        if (e.which === 13) { // Enter key
            $('.search-bar').submit();
        }
    });
});