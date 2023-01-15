$(document).ready(function () {
    $('#input1').on('keyup change', function () {
        if ($(this).val().length > 0) {
            $('#submit').prop('disabled', false)
        } else {
            $('#submit').prop('disabled', true)
        }
    })

    $('#reset').on('click', function () {
        $('#input1').val('')
        $('#input2').val('')
        $('#submit').prop('disabled', true)
    })

    $('#mode').on('click', function () {
        $('#body').toggleClass('dark');
        $('#input1, #input2, #url').toggleClass('color text-white-50');
        $('h4, a, h5, label, h1, p, #btnmodal').toggleClass('text-white-50');
        $('#mode').toggleClass('bg-secondary');
        $('#modalbox').toggleClass('dark');
        $('#btnmodal').toggleClass('bg-secondary');
        $("[data-bs-custom-class='custom-tooltip1']").attr("data-bs-custom-class", "customtooltip");
        $('.tooltip-form').tooltip('update')
        $('.tooltip-form').tooltip('dispose')
        $('.tooltip-form').tooltip()

        if ($('#body').hasClass('dark')) {
            $('#mode').html('<i class="bi bi-lightbulb"></i>')
        } else {
            $('#mode').html('<i class="bi bi-moon-fill"></i></i>')
        }
    })

    $('#btnmodal').on('click', function () {
        $("[data-bs-title='Copy to clipboard']").attr("data-bs-title", "Copied!");
        $(this).tooltip('update')
        $(this).tooltip('dispose')
        $(this).tooltip()
        $('#btnmodal').html('<i class="bi bi-check-lg">')
    })

    $("#form").submit(function (event) {
        var url = $('#input2').val();
        event.preventDefault();
        console.log($('#input1').val());
        $.post("function.php", {
                _method: 'POST',
                long_url: $('#input1').val(),
                short_url: $('#input2').val(),
            },
            function (response) {
                console.log(response);
                if (response) {
                    $('#modal-title').text('')
                    $('#modal-body').html(`<div class="alert alert-warning" role="alert">
                        End point URL "<b>/` + response + `</b>" is not available.
                      </div>`)
                }
            });
        $('#input1').val('')
        $('#input2').val('')
        $('#url').val('http://linkin.rf.gd/' + url)
    })
});



const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))