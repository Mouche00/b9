

$(document).ready(function(){

    const URLROOT = "http://localhost:8000";

    let url = window.location.href.split("/");
    let pageName = url[url.length - 1];
    pageName = pageName.toUpperCase();

    $('#page-name').html(`LIST OF ${pageName}`);
    $('#form-name').html(`${pageName}`);

    // let sidebar = document.querySelector(`#sidebar`);
    // let allSections = Array.from(sidebar.children);
    // allSections.forEach(e => {
    // e.classList.replace("text-black", "hover:text-black");
    // e.classList.replace("bg-white", "hover:bg-white"); 
    // });

    // let currentSection = document.querySelector(`#${pageName}`);
    // currentSection.classList.replace("hover:text-black", "text-black");
    // currentSection.classList.replace("hover:bg-white", "bg-white");

   

    function draw(){
        $.ajax({
            url: URLROOT + '/' + pageName.toLowerCase() + '/display',
            type: 'GET',
            success: function(response){
                let data = JSON.parse(response);
                $('tbody').html('');
                let row = "";
                let element = "";
                data.forEach(e => {
                    row = $("<tr>", {class: "h-10"});
                    for (const [key, value] of Object.entries(e)) {
                        element = $("<td>", {class: "border-black border-2 rounded-sm"});
                        element.html(value);
                        row.append(element);
                    }
                    element = $("<td>", {class: "h-10 border-black border-2 flex justify-evenly items-center rounded-sm"});
                    sub = $("<button>", {class: "delete-button", type: "button"});
                    sub.attr('data-id', `${e.id}`);
                    value = "DELETE";
                    sub.html(value);
                    element.append(sub);

                    sub = $("<button>", {class: "edit-button", type: "button"});
                    sub.attr('data-id', `${e.id}`);
                    value = "EDIT";
                    sub.html(value);
                    element.append(sub);
                    row.append(element);

                    $('tbody').append(row);
                });
    
            }
        });
    }

    draw();

    $(document).on('click', '#add-button', function(){
        $('#overlay').addClass('opacity-70 z-10');
        $('#form-container').addClass('opacity-100 z-20');
        $('#submit').val('SUBMIT');
    });

    $(document).on('click', '#overlay', function(){
        $('#overlay').removeClass('opacity-70 z-10');
        $('#form-container').removeClass('opacity-100 z-20');

    });

    $(document).on('submit', '#form', function(e){
        e.preventDefault();
        let formData = new FormData(this);
        if($("#submit").val() == 'SUBMIT'){
            console.log(1);
            $.ajax({
                url: URLROOT + '/' + pageName.toLowerCase() + '/add',
                type: 'POST',
                data: formData,
                contentType: false,
                cache: false,
                processData:false,
                success: function(response){
                    draw();

                    $('#overlay').removeClass('opacity-70 z-10');
                    $('#form-container').removeClass('opacity-100 z-20');

                    $('#id').val('');
                    $('#name').val('');
                    $('#address').val('');
                }
            });
        } else {
            console.log(2);
            $.ajax({
                url: URLROOT + '/' + pageName.toLowerCase() + '/edit',
                type: 'POST',
                data: formData,
                contentType: false,
                cache: false,
                processData:false,
                success: function(response){
                    draw();

                    $('#overlay').removeClass('opacity-70 z-10');
                    $('#form-container').removeClass('opacity-100 z-20');
                }
            });
        }
    });

    $(document).on('click', '.edit-button', function(){
        let id = $(this).data('id');
        $.ajax({
            url: URLROOT + '/' + pageName.toLowerCase() + '/get/' + id,
            type: 'GET',
            success: function(response){
                let data = JSON.parse(response);
                $('#overlay').addClass('opacity-70 z-10');
                $('#form-container').addClass('opacity-100 z-20');
                $('#submit').val('EDIT');

                $('#id').val(data.id);
                $('#name').val(data.name);
                $('#address').val(data.address);

            }
        });
    });

    $(document).on('click', '.delete-button', function(){
        let id = $(this).data('id');
        $.ajax({
            url: URLROOT + '/' + pageName.toLowerCase() + '/remove/' + id,
            type: 'GET',
            success: function(response){
                draw();
            }
        });
    });

})
