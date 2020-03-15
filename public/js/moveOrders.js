//Append Order Section In The Orders
$(".orders").click(function(){
    let OrderName = $(this).next().next().text();
    let OrderVal = $(this).next().text().split(" ")[0];
    var html = '<div class="form-group row">' + 
           '<label for="" class="offset-sm-1 col-sm-2 control-label">'+OrderName+'</label>' + 
               '<div class="col-sm-6">' +
               '<input class="form-control onRuntime" type="number" placeholder="0" value="0" name="'+OrderName+'" min="0" max="10"style="width: 100px;" />' +
               '<div style="text-align: right;margin-top:-35px">' +
               '  EGP <span id="total" class="col-2 quantityTotalPrice"> 0 </span>'+
               '(<span id="cancel"> '+OrderVal+' </span>)'+
                    '</div>'+
                '</div>'
           '</div>';
    $("#SelectedOrdersContainers").append(html);
    $(this).off('click');
});

//Change The Total Quantity Price & Bind The Event On The Element
$("#SelectedOrdersContainers").on('keyup change','.onRuntime',function(){
    var quantity = $(this).val();
    var currentPrice = $(this).next().children().first();
    var drinkPrice = $(this).next().children().next().text();
    currentPrice.text(parseInt(quantity) * parseInt(drinkPrice));
    sumTotalPrice();
});

//Calculate The Total Price In Each Change
function sumTotalPrice() {
    sum = 0;
    $('.quantityTotalPrice').each(function(index,object){
        sum += parseInt($(this).text());
    });
    $('input[name="totalPrice"]').val(sum);
}

//Show Specified Order Info
function showOrder(orderId,obj)
{   
    
    if($(obj).text() == "+")
    {
        $(".showOrder").text('+');
        $(".showOrder").removeClass('btn-danger');
        $(obj).toggleClass("btn-danger");
        $(obj).text('-');
        $(".orderImages").fadeIn("slow").fadeIn(5000).show().empty();
        $.ajax({
            url:"http://localhost/CafeteriaProject/Controller/orderController.php",
            method:"post",
            dataType:"json",
            data : {orderId : orderId},
            success:function(allProduct){
                $.each(allProduct,function(index,product){
                    var html = '<div class="images">'+
                        '<img src="../public/Images/'+product.product_picture+'">'+
                        '<span class="badge badge-pill badge-primary">'+product.price+' EGP</span>'+
                        '<figcaption>'+product.name+'</figcaption>'+
                        '<figcaption>'+product.quantity+'</figcaption>'+
                    '</div>';
                    $(".orderImages").append(html).fadeIn("slow").fadeIn(5000).show();
                });
            },
            error:function(error){
                console.log(error);
            }
        });
    }
    else
    {
        $(obj).text('+');
        $(obj).toggleClass("btn-danger");
        $(".orderImages").fadeOut("slow").fadeOut(6000).empty().hide();
    }
}