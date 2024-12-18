$(document).ready(function(){

    $('.increment-btn').click(function(e){

        e.preventDefault();

         var prod_id = $(this).siblings('.product_id').val();
        var qty = $(this).siblings('.prodectqty').val();
     
        var value = parseInt(qty, 10);
        value = isNaN(value) ? 0 : value;
        if(value <= 10){
            value++;
            $(this).siblings('.prodectqty').val(value);
             $(this).siblings('.prodectqtyhidden').val(value);
            
        }
       var vardata = "prod_id="+ prod_id + "&prod_qty=" + value + "&action=update_cart";
         $.ajax({
            method: "POST",
            url: "admin/functions/cart-logic.php",
            data: vardata,
            success: function(response){
                if(response == 201){
                     // alertify.success('Cart Updated Successfully');
                     // location.reload();
                }else if(response == "existing"){
                    alertify.success('exist');
               }else if(response == 401){
                    alertify.success("Login to continue");
                }else if(response == 500){
                    alertify.success("some thing went wrong");
                }
            }
        });


    });
    
    $('.decrement-btn').click(function(e){

        e.preventDefault();

        var prod_id = $(this).siblings('.product_id').val();
        var qty = $(this).siblings('.prodectqty').val();
        var value = parseInt(qty, 10);
        value = isNaN(value) ? 0 : value;
        if(value > 0){
            value--;
            $(this).siblings('.prodectqty').val(value);
             $(this).siblings('.prodectqtyhidden').val(value);
        }
var vardata = "prod_id="+ prod_id + "&prod_qty=" + value + "&action=update_cart";
         $.ajax({
            method: "POST",
            url: "admin/functions/cart-logic.php",
            data: vardata,
            success: function(response){
                if(response == 201){
                      // alertify.success('Cart Updated Successfully');
                      // location.reload();
                }else if(response == "existing"){
                    alertify.success('exist');
               }else if(response == 401){
                    alertify.success("Login to continue");
                }else if(response == 500){
                    alertify.success("some thing went wrong");
                }
            }
        });
    });

    // $('.addtocartbtn').click(function(e){
    //     e.preventDefault();
    //     var qty = $(this).closest('.prodect-data').find('.prodectqty').val();
    //     var prod_id = $(this).val();

    //     $.ajax({
    //         method: "POST",
    //         url: "admin/functions/handlecart.php",
    //         data: {
    //             "prod_id" : prod_id,
    //             "prod_qty" : qty,
    //             "scope" : "add" 
    //         },
    //         success: function(response){
    //             if(response == 201){
    //                  alertify.success('Hello');
    //             }else if(response == "existing"){
    //                 alertify.success('exist');
    //            }else if(response == 401){
    //                 alertify.success("Login to continue");
    //             }else if(response == 500){
    //                 alertify.success("some thing went wrong");
    //             }
    //         }
    //     });
    // });




});

