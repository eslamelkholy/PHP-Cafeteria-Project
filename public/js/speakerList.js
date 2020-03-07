function deleteSpeaker(mySpeakerId,obj)
{
   
    $.ajax({
        url:"http://localhost:8080/speaker/delete",
        method:"post",
        dataType:"json",
        contentType : "application/json",
        data : JSON.stringify({speakerId : mySpeakerId}),
        success:function(data){
            console.log("The Object id = " + data);
            $(obj).parents("tr").remove();
        },
        error:function(error){
            console.log(error);
        }
    })
}


