$(document).ready(function(){
$(document).on("click", ".list-group>.list-group-item", function(){
    $(".list-group-item").removeClass("selected")
    $(this).addClass("selected");
    });

    // $("#addRoleModal").modal("show");

//#region SELECT ROLE
                //event     id      
$(document).on("change", "#selectRole", function(){
    let value = $(this).val();// $(this) = (#selecRole).val
    if (value == "addRole"){
        $("#addRoleModal").modal("show");
        $(this).prop("selectedIndex",0);
        $(this).selectpicker("refresh");
    }
    console.log(value);
    });

//#endregion

//#region submit role form
$(document).on("submit", "#addRoleForm", function(event){
    event.preventDefault();
    
    $.ajax({
        url: window.site_url.concat("user/add-role"),
        method: "POST",
        data: new FormData(this),
        contentType:false,
        processData:false,
        dataType:"JSON",
        success: function(res){
            if (res.status){
                Swal.fire({
                    title: "Success",
                    icon: "success"
                  });       
                  $("#addRoleForm").trigger("reset");
                  $("addRoleModal").modal("hide");             

                  loadRoles(); 
            }else{
                Swal.fire({
                    title: "Failed",
                    icon: "warning"
                });
            }
        }
    });

});          
//#endregion

//#region submit user
$(document).on("submit", "#addUserForm", function (event){
    event.preventDefault();
    let formData = new FormData(this);
    let fn = $("#firstName").val();
    let ln = $("#lastName").val();
    let name = (fn.charAt(0) + ln.charAt(0)).toUpperCase();
    let dataURI = generateAvatar(name, "userImageCanvas");
    formData.append("dataURI", dataURI);


    $.ajax({
        url:window.site_url.concat("user/add-user"),
        method:"POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(res){
            if(res.status){
                Swal.fire({
                    title:"Success",
                    icon: "success"
                });
                $("#addUserForm").trigger("reset");
            } else {
                Swal.fire({
                    title: "Failed",
                    icon: "warning"
                    });
                }

            }
        });

    });
//#endregion

});

//#region load roles/refresh
    function loadRoles() {
        $.ajax({
            url: window.site_url.concat("user/load-roles"),
            method:"POST",
            dataType:"JSON",
            success: function(res){
                $("#selectRole").empty();
                $("#selectRole").append(
                "<option selected disabled >Select a role...</option>" +
                "<option value='addRole' data-icon='fas fa-plus-circle'>Add roles</option>"
                );
                res.forEach(role => {
                    $("#selectRole").append(
                        "<option value='" + role.id + "'>" + role.name + " </option>"               
                    );
                });
                //console.log(role.id, role.name);
                //console.log(res);
                $("#selectRole").selectpicker("refresh");

            }
        });
    }   
    //#endregion

    //#region  preview image
    function previewImage(event, id) {
        var reader = new FileReader();
        reader.onload = function(){
            var output = document.getElementById(id);
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
    //#endregion

    //#region GENERATE AVATAR
    function generateAvatar(content, canvas) {
        var canvas = document.querySelector("#" + canvas);
        const ctx = canvas.getContext("2d");
        ctx.fillStyle = getRandomColor();
        ctx.fillRect(0, 0, canvas.width, canvas.height);
        ctx.fillStyle = "white"
        ctx.font = "130px bold Arial";
        ctx.textAlign = "center";
        ctx.textBaseline = "middle";
        ctx.fillText(content, canvas.width / 2, canvas.height / 2);
    
        return canvas.toDataURL("image/jpeg");
    }
    //#endregion
            

    //#region RANDOM COLOR GENERATOR
    function getRandomColor() {
        var letters = '012345'.split('');
        var color = '#';
        color += letters[Math.round(Math.random() * 5)];
        letters = '0123456789ABCDEF'.split('');
        for (var i = 0; i < 5; i++) {
            color += letters[Math.round(Math.random() * 15)];
        }
        return color;
    }
//#endregion



