function collapseUser(userId,cell){
    console.log(cell);
    var row = cell.parentElement;
    var target_row = row.parentElement.children[row.rowIndex + 1];
    if (target_row.style.display == 'table-row') {
        cell.innerHTML = '+';
        target_row.style.display = 'none';
    } else {
        showUserDetails(userId);
        cell.innerHTML = '-';
        target_row.style.display = 'table-row';
    }
    }
    function collapseOrder(orderId,cell){
        console.log(cell);
        var row = cell.parentElement;
        var target_row = row.parentElement.children[row.rowIndex + 1];
        if (target_row.style.display == 'table-row') {
            cell.innerHTML = '+';
            target_row.style.display = 'none';
        } else {
            showOrderDetails(orderId);
            cell.innerHTML = '-';
            target_row.style.display = 'table-row';
        }
        }
function showUserDetails(userId){
    $.ajax({
        url:"http://localhost/Cafeteria-Project/Controller/ChecksController.php",
        method:"POST",
        dataType:"json",
        data:{userId : userId},
        success:function(allOrders){
            $.each(allOrders,function(index,order){
                console.log(this);
                var html="<tr>"+
                "<td id='collapseButton' onclick='collapseOrder("+order.id+","+this+")'>+</td>"+
                "<td>"+order.order_date+"</td>"+
                "<td>"+order.amount+"</td>"+
              "</tr>";
              $("#orders").append(html);
            })
        },
        error:function(error){
            console.log(error);
        }
    });
}
function showOrderDetails(orderId){
    console.log(orderId);
    $.ajax({
        url:"http://localhost/Cafeteria-Project/Controller/ChecksController.php",
        method:"POST",
        dataType:"json",
        data:{orderId : orderId},
        success:function(allProducts){
            $.each(allProducts,function(index,product){
                var html="<tr>"+
                "<td>"+product.name+"</td>"+
                "<td>"+product.price+"</td>"+
                "<td>"+product.quantity+"</td>"+
                "</tr>";
                $("#products").append(html);
            })
        },
        error:function(error){
            console.log(error);
        }

    });
}
