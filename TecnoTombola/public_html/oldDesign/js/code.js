var start = new Date().getTime();
var time = 30;
var timer;
$(document).ready(function() {
    $('#file').bootstrapFileInput();
    $('#file').change(function(evt) {
        if (comprueba_extension($(this).val())) {
            if (typeof $(this).attr('data-ie') !== 'undefined' && $(this).attr('data-ie') === 'true') {

                $(".oculto").hide();
                $("#cargando").fadeIn('slow');
                var f = evt.target.files[0];
                if (!f) {
                    alert("No se logro cargar el archivo");
                } else {
                    var r = new FileReader();
                    $('#random2 div').html('');
                    r.onload = function(e) {
                        var contents = e.target.result;
                        var lines = contents.split(/[\r\n]+/g);
                        var html = [];
                        lines.forEach(function(line) {
                            html[html.length] = "<p class='s'>" + line + "</p>";
                        });
                        $('#random2 div').html(html.join(''));
                        $(".oculto, #cargando").hide();
                        $("#paso2").fadeIn('slow');
                    };

                    r.readAsText(f, 'ISO-8859-1');//aqui sucede la magia
                    //ISO-8859-1 permite mostar caracteres especiales
                }
            } else {
                $('#upload').submit();
            }
        } else {
            $('.file-input-name').text('');
        }
    });
}, false);
function cargar() {
    $("#paso2").hide();
    $('#random2 div').html('');
    $("#paso1").fadeIn();
}
function colaEfectos() {


    var divs = $("p.s").get().sort(function() {
        return Math.round(Math.random()) - 0.1;
    }).slice(0, 1);
    $(divs).addClass("second");
    $(divs).fadeIn();
    $(divs).animate({
        "font-size": "1.75em"
    }, 100);
    $(divs).animate({
        "font-size": "1.75em"
    }, 100, colaEfectos2);

}
function colaEfectos2() {
    var t = $("#flagS").val();
    if ((new Date().getTime() - start) > time) {
        t = '1';
        $("#flagS").val('1');
        document.getElementById('star').disabled = false;
        $('#paso3').fadeIn();
        $('#timer').text('');
    }

    if (t === '0') {
        $("p.second").removeClass("second");
        $("p.second").hide();
        colaEfectos();
    } else {
        timer.pause();
        $('#ganador').text('Felicidades ' + $("p.second").text() + '! ');
        $('#paso3, #paso2').hide();
        $('#random2').fadeOut('slow');
        $('#felicitacion').fadeIn('slow');
        $("p.second").remove();
    }
}
function comprueba_extension(archivo) {
    extensiones_permitidas = new Array(".txt", ".dat", ".csv", ".xls");
    mierror = "";
    if (!archivo) {
        return false;
    } else {
        extension = (archivo.substring(archivo.lastIndexOf("."))).toLowerCase();
        permitida = false;
        for (var i = 0; i < extensiones_permitidas.length; i++) {
            if (extensiones_permitidas[i] === extension) {
                permitida = true;
                break;
            }
        }
        if (!permitida) {
            alert("Comprueba la extensión de los archivos a subir. \nSólo se pueden subir archivos con extensiones: " + extensiones_permitidas.join());
            return false;
        } else {
            return true;
        }
    }
}
function detener() {
    $('#paso3').fadeIn();
    $('#timer').text('');
    if ($("#flagS").val() === '1') {
        alert("La tómbola esta detenida!");
    } else {
        $("#flagS").val('1');
        document.getElementById('star').disabled = false;
    }

}
function inicia() {
    $('#random2 div').html('');
    if (typeof $('#textA').val() === 'undefined' || $('#textA').val() === '') {
        alert('Debe seleccionar o ingresar manualmente los participantes');
    } else {
        var html = [];
        var lines = $('#textA').val().split('\n');
        if (lines.length > 1) {
            $(".oculto").hide();
            $("#cargando").fadeIn('slow');
            for (var i = 0; i < lines.length; i++) {
                if (typeof lines[i] !== 'undefined' && lines[i].length !== '' && lines[i].length > 0) {

                    html[html.length] = "<p class='s'>" + lines[i] + "</p>";
                }
            }
            if (html.length > 1) {
                $('#random2 div').html(html.join(''));
                $("#paso1, #cargando").hide();
                $("#paso2").fadeIn('slow');
            } else {
                $("#cargando").hide('slow');
                $("#paso1").fadeIn();
                alert('Debe ingresar mas de 1 participantes');
            }
        } else {
            alert('Debe ingresar mas de 1 participantes');
        }
    }
}
function iniciar() {
    $('#paso2').hide();
    if ($("p.s").length === 0) {
        alert("No hay datos para iniciar la tómbola");
        $('#paso2').fadeIn();
    } else {
        if (typeof $("#flag").val() === 'undefined') {
            alert('ingrese un tiempo valido para la tómbola');
            $("#flagS").val('1');
            document.getElementById('star').disabled = false;
            $('#paso2').fadeIn();
            $('#timer').text('');
        } else if (isNaN($("#flag").val())) {
            alert('ingrese un tiempo valido para la tómbola');
            $("#flagS").val('1');
            document.getElementById('star').disabled = false;
            $('#paso2').fadeIn();
            $('#timer').text('');
        } else if ($("#flag").val() === '') {
            alert('ingrese un tiempo valido para la tómbola');
            $("#flagS").val('1');
            document.getElementById('star').disabled = false;
            $('#paso2').fadeIn();
            $('#timer').text('');
        } else {
            $('#cargando').fadeIn();
            var count = parseInt($('#flag').val()) + 1;
            if (plus) {
                timer = $.timer(
                        function() {
                            count++;
                            $('#timer').animate({
                                "font-size": "1.75em"
                            }, 100);
                            $('#timer').html(count);
                            $('#timer').animate({
                                "font-size": "7.75em"
                            }, 100);
                        }, 1000, true);
            } else {
                timer = $.timer(
                        function() {
                            count--;
                            $('#timer').animate({
                                "font-size": "1.75em"
                            }, 100);
                            $('#timer').html(count);
                            $('#timer').animate({
                                "font-size": "7.75em"
                            }, 100);
                        }, 1000, true);
            }
            timer.play();
            $(".oculto ").hide();
            $('#paso3,#random2').fadeIn();
            start = new Date().getTime();
            time = parseInt($("#flag").val()) * 1000;
            colaEfectos();
        }
    }
}
function regresar() {
    $('#felicitacion').hide();
    $('#paso2').fadeIn();
}
function     validar(tr) {
    document.images["imagen"].style.display = "inline";
    setTimeout('document.images["imagen"].src="http://tmp-webapps:8082/Recursos/img/ajax-loader.gif"', 10);
    $('#formCargando').toggle();
    $("#" + tr).toggle();
}
