$(document).ready(() => {
    $("#submit").on("click", function() {
        const userDetails = JSON.parse(localStorage.getItem("userDetails"));

        if (userDetails) {
            const prodId = $(this).data("prod-id");
            const receiver = $(this).closest(".cart-details").find("#receiver").val();
            const sender = $(this).closest(".cart-details").find("#sender").val();
            const message = $(this).closest(".cart-details").find("#message").val();
            const qnty = $(this).closest(".cart-details").find("#quantity").val();
           
            if (prodId === null || qnty === '' || qnty === '0' || receiver === '' || sender === '') {
                Swal.fire({
                    title: "Invalid Input",
                    text: "Make sure all fields are filled.",
                });
                return;
            }

            if(qnty < 1){
                Swal.fire({
                    title: "Invalid Input",
                    text: "Quantity must be at least 1.",
                });
                return;
            }

            if (qnty > 10) {
                Swal.fire({
                    title: "Invalid Input",
                    text: "Quantity must be less than or equal to 10.",
                });
                return;
            }


            $.ajax({
                url: "../backend/user/addcart.php",
                method: "POST",
                data: {
                    prodId: prodId,
                    receiver: receiver,
                    sender: sender,
                    message: message,
                    qnty: qnty,
                },
                success: function(response) {
                    if (response === 'exceeds') {
                        Swal.fire({
                            title: "Item already in cart!",
                            text: "This item is already in your cart.",
                        });
                    } else if (response === 'success') {
                        Swal.fire({
                            title: "Success",
                            text: "Item added to cart!",
                        }).then(() => {
                            location.reload();
                        });
                        
                    } else if(response === 'stocks') {
                        Swal.fire({
                            title: "Insufficient Stocks",
                            text: "The quantity you entered exceeds the available stocks.",
                        });
                    }else{
                        Swal.fire({
                            title: "Error",
                            text: "An error occured while adding to cart.",
                        });
                    }
                },
                error: function() {
                    alert("Connection Error");
                }
            });
        } else {
            Swal.fire({
                title: "Log in first!",
                text: "You need to log in first before you order!",
            });
        }
    });
});
