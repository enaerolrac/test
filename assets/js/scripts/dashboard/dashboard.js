 $(document).ready(function() {

//     //#region 
//     $(document).on("click", "#logoutBtn", function (event) {
//         $.ajax({
//             url:window.site_url.concat("user/logout"),
//             method: "POST",
//             success: function(res) {
                
//             }
//         })
        
//     })
//     //#endregion 
    $(document).on("click", "#saveBtn", function(){
        Swal.fire({
            title: "Do you want to save it?",
            icon: "warning",
            title: "error!",
            showCancelButton:true,
            confirmButtonText: "Yes",
            cancelButtonText: "No",
            closeOnConfirm: true,
            closeOnCancel:true,
        })
    });
})
