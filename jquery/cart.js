
$(document).ready(()=>{
    $(".delete-js").on("click", function(){
        const itemId = $(this).attr("id");
        if(itemId){
            $.ajax({
                url:"../backend/user/deleteprod.php",
                method: "get",
                data:{
                    itemId
                },
                success: function(response){
                    if(response === "deleted"){
                        Swal.fire({
                            title: "Item removed",
                            text: "Product item has been deleted in your cart.",
                            
                        }).then((result)=>{
                            if(result.isConfirmed){
                                window.location.href = "cart.php";
                            }
                        })
                    }
                },
                error: function(){
                    alert("Connection Error!");
                }
            })
        }
    })

// Decrease quantity
$('.minus-btn').on('click', function() {
    const item_id = $(this).data("item-id");
    const button = $(this);
    if (item_id) {
        $.ajax({
            url: "../backend/user/minusQnty.php",
            method: "GET",
            data: { item_id },
            success: function(response) {
                window.location.reload();
            },
            error: function() {
                alert("Connection Error!");
            }
        });
    }
});

// Increase quantity
$('.add-btn').on('click', function() {
    const item_id = $(this).data("item-id");
    const button = $(this);
    if (item_id) {
        $.ajax({
            url: "../backend/user/addQnty.php",
            method: "GET",
            data: { item_id },
            success: function(response) {
                window.location.reload();
            },
            error: function() {
                alert("Connection Error!");
            }
        });
    }
});

    $('.checkbox').on('click', function() {
        const item_id = $(this).data('item-id');
        const status = $(this).is(':checked') ? 1 : 0;

        if (item_id) {
            $.ajax({
                url: "../backend/user/updateStatus.php",
                method: "post",
                data: { item_id, status },
                success: function(response) {
                    window.location.reload();
                },
                error: function() {
                    alert("Connection Error!");
                }
            });
        }
    });



    $('.proceed-btn').on('click', function() {
    
        const receiptFile = $('#receiptFile')[0].files[0];
        const gcashName = $("#gcashName").val().trim();
        const senderAddress = $("#senderAddress").val().trim();
        const refNumber = $("#refNumber").val().trim();
        const depositAmnt = $("#depAmount").val().trim();
        const totalAmnt = $("#overAllTotal").val().trim().replace("₱", "").replace(",", "");

        // Check if the receipt file is uploaded
        if (!receiptFile) {
            Swal.fire({
                title: "Please upload your receipt",
                
                showConfirmButton: true,
            });
            return;
        }

        if (!gcashName) {
            Swal.fire({
                title: "Please enter your Gcash Name.",
                
                showConfirmButton: true,
            });
            return;
        }

        if (!senderAddress) {
            Swal.fire({
                title: "Please enter your Address.",
                
                showConfirmButton: true,
            });
            return;
        }
        
        const allowedExtensions = ['jpg', 'jpeg', 'png', 'svg', 'webp'];
        const fileExtension = receiptFile.name.split('.').pop().toLowerCase();
        
        // Validate file extension
        if (!allowedExtensions.includes(fileExtension)) {
            Swal.fire({
                title: "Invalid file type",
                text: "Please upload a file with one of the following extensions: jpg, jpeg, png, svg, webp",
                
                showConfirmButton: true,
            });
            return;
        }
        
        // Validate reference number input
        if (!refNumber) {
            Swal.fire({
                title: "Please enter your reference number.",
                
                showConfirmButton: true,
            });
            return;
        }

        if(refNumber.length < 13){
            Swal.fire({
                title: "Invalid reference number",
                text: "Reference number must be 13 characters long.",
                
                showConfirmButton: true,
            });
            return;
        }
    
        // Validate deposit amount input
        if (!depositAmnt || isNaN(depositAmnt) || parseFloat(depositAmnt) <= 0) {
            Swal.fire({
                title: "Please enter a valid deposit amount.",
                
                showConfirmButton: true,
            });
            return;
        }
        // console.log(parseFloat(totalAmnt) / 2);
        if((parseFloat(totalAmnt) / 2) > depositAmnt){
            Swal.fire({
                title: "Invalid deposit amount",
                text: "Deposit amount must be at least 50% of the total amount.",
                
                showConfirmButton: true,
            });
            return;
        }

        if(parseFloat(depositAmnt) > parseFloat(totalAmnt)){
            Swal.fire({
                title: "Invalid deposit amount",
                text: "Deposit amount must not exceed the total amount.",
                
                showConfirmButton: true,
            });
            return;
        }
        
        // Confirm pickup action
        Swal.fire({
            title: "Want to pick up now?",
            text: "Your items will be prepared right away.",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, proceed!"
        }).then((result) => {
            if (result.isConfirmed) {
                let formData = new FormData();
                formData.append('receipt', receiptFile);
                formData.append('refNumber', refNumber);
                formData.append('depositAmount', depositAmnt);
                formData.append('gcashName', gcashName);
                formData.append('senderAddress', senderAddress);
    
                $.ajax({ 
                    url: "../backend/user/proceed.php",
                    method: "post",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response === 'success') {
                            Swal.fire({
                                title: "Success!",
                                text: "Your order has been placed successfully.",
                                
                                showConfirmButton: true,
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = "cart.php";
                                }
                            });
                        } else if(response === "stocks"){
                            Swal.fire({
                                title: "Invalid stocks!",
                                text: "Deleted items due to insufficient stocks.",
                                
                                showConfirmButton: true,
                            }).then((result)=>{
                                if(result.isConfirmed){
                                    window.location.reload();
                                }
                            }
                            )
                        }else {
                            Swal.fire({
                                title: "Update error",
                                text: response,
                                
                                showConfirmButton: true,
                            });
                        }
                    },
                    error: function() {
                        Swal.fire({
                            title: "Connection Error!",
                            text: "Could not connect to the server.",
                            
                            showConfirmButton: true,
                        });
                    }
                });
            }
        });
    });
    
    
})
