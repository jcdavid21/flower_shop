$(document).ready(() => {
    $(".button").on("click", function(event) {
        event.preventDefault();

        const userDetails = JSON.parse(localStorage.getItem("userDetails"));
        const feedback = $('#feedback').val();
        const prod_id = $(this).data("prod-id");
        if(!userDetails){
            Swal.fire({
                title: "Log in first!",
                text: "You need to log in first before you can submit feedback!",
            });
            return
        }

        if (feedback) {
            $.ajax({
                url: "../backend/user/submitFeedback.php",
                method: "post",
                data: {
                    feedback,
                    prod_id
                },
                success: function(response) {
                    Swal.fire({
                        title: "Submitted!",
                        text: "Your feedback has been submitted.",
                        showConfirmButton: false,
                        timer: 1500
                    });

                    setTimeout(() => {
                        window.location.reload();
                    }, 1500);
                }
            });
        } else {
            Swal.fire({
                title: "Missing Fields!",
                text: "Please fill out the feedback field.",
                icon: "error"
            });
        }
    });
});