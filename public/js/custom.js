$(function() {
    $('#list_project').on('change',onProjectSelected)
    $('#projects').on('change',onSelectProject);
});

function onSelectProject(){
    var project_id = $(this).val();

    if (!project_id){
        $('#levels').html('<option value="">Selecciona un nivel</option>');
        return;
    }
    //ajax
    $.get('/proyecto/'+project_id+'/niveles', function(data){
        var html = '<option value="">Selecciona un nivel</option>';
        for(var i=0; i<data.length; ++i)
            html += '<option value="'+data[i].id+'">'+data[i].name+'</option>';

        $('#levels').html(html);
    });
}

function onProjectSelected() {
    var project_id = $(this).val();
    var url = '/proyectos/' + project_id + '/seleccionar';
    location.href = url;
}