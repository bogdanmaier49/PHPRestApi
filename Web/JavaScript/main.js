function search () {
    $.ajax({
        type: "GET",
        dataType: "json",
        url: "Server/api.php",
        data: {"method": "search", "searchPattern": $("input[name=searchPattern]").val()},
        success: function(data) {
            printDataTable (data);
        }
    });
    return null;
}

function add () {

    var postData = {
        "method": "addEmployee",
        "FirstName": $("input[name=FirstName]").val(),
        "LastName": $("input[name=LastName]").val(),
        "Email": $("input[name=Email]").val(),
        "Password": $("input[name=Password]").val(),
        "Age": $("input[name=Age]").val(),
        "Role": $("input[name=Role]").val(),
        "Profile": $("input[name=Profile]").val()
    };

    $.ajax({
        type: "POST",
        dataType: "json",
        url: "Server/api.php",
        data: postData,
        success: function(data) {

            $(".alert-success").hide().empty();
            $(".alert-danger").hide().empty();

            if (data.response == 200) 
                $(".alert-success").show().empty().append("Employee added successfully.");
            else
                $(".alert-danger").show().empty().append("Employee could not be added.");
        }
    });
}

function update (email) {
    alert("TODO update the data for: " + email);
}

function remove (email) {
    var postData = {
        "method": "removeEmployee",
        "Email": email,
    };

    $.ajax({
        type: "POST",
        dataType: "json",
        url: "Server/api.php",
        data: postData,
        success: function(data) {
            search();
        }
    });
}

function printDataTable (data) {
    $(".employeeTable").empty();
    $(".employeeTable").append("<table></table>");
    $(".employeeTable table").append(
        "<tr class='header'>" + 
        "<th> First Name </th>" + 
        "<th> Last Name </th>"+
        "<th> Email </th> " + 
        "<th> Age </th>" + 
        "<th> Role </th>"+
        "<th> Action </th>"+
        "</tr>");
    
    for (var i = 0; i < data.length; i++) {
        $(".employeeTable table").append("<tr>" + 
        "<td> <input type='text' class='form-control' value='" + data[i].FirstName  + "'/> </td>" + 
        "<td> <input type='text' class='form-control' value='" + data[i].LastName   + "'/> </td> " + 
        "<td> <input type='text' class='form-control' value='" + data[i].Email      + "'/> </td> " + 
        "<td> <input type='text' class='form-control' value='" + data[i].Age        + "'/> </td> " + 
        "<td> <input type='text' class='form-control' value='" + data[i].Role       + "'/> </td> " +
        "<td> " +
        "<button class='removeBtn btn btn-danger' style='width:40px' toRemove='"+data[i].Email+"'> <span class='glyphicon glyphicon-trash'></span> </button>" + 
        "<button class='updateBtn btn btn-warning' style='width:40px' toUpdate='"+data[i].Email+"'> <span class='glyphicon glyphicon-open'></span> </button>" +
        " </td> " + 
        "</tr>");
    }

    $(".employeeTable").append(
        "<button class='btn btn-primary closeBtn'> <span class='glyphicon glyphicon-chevron-up'></span> Close </button>" 
    );


    $(".removeBtn").click(function() {
        remove($(this).attr("toRemove"));
    });

    $(".closeBtn").click(function() {
        $(".employeeTable").empty();
    });

    $(".updateBtn").click(function() {
        update($(this).attr("toUpdate"));
    });
}

$( document ).ready(function() {
    $(".alert-success").hide();
    $(".alert-danger").hide();
});