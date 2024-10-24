$(document).ready(()=>{
    $('.updateResBtn').on('click', function(){
        const prod_name = $(this).closest('.modal-content').find('.updatedName').val();
        const prod_price = $(this).closest('.modal-content').find('.updatedPrice').val();
        const prod_id = $(this).val();
        const stocks = $(this).closest('.modal-content').find('.updatedStocks').val();
        const desc = $(this).closest('.modal-content').find('.updatedDesc').val();
        
        if(prod_id && prod_name && prod_price){
            $.ajax({
                url: "../backend/admin/updateProd.php",
                method: "post",
                data:{
                    prod_id,
                    prod_name,
                    prod_price,
                    stocks,
                    desc
                },
                success: function(response){
                    if(response === 'success'){
                        Swal.fire({
                            title: "Product Updated",
                            text: "Product has been updated",
                        }).then((result)=>{
                            if(result.isConfirmed){
                                window.location.reload();
                            }
                        })
                    }else if(response === 'you cannot reduce the stocks'){
                        Swal.fire({
                            title: "Invalid Stocks",
                            text: "You cannot reduce the stocks",
                            icon: "warning"
                        })
                    }else{
                        Swal.fire({
                            title: "Product Not Updated",
                            text: "Product has not been updated",
                            icon: "warning"
                        })
                    }
                },
                error: function(){
                    alert("Connection Error")
                }
            })
        }else{
            Swal.fire({
                title: "Empty Field!",
                text: "You cannot empty the field.",
                icon: "warning",
                showConfirmButton: false,
                timer: 1500
              });
        }
    })
})
