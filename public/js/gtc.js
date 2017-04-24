(function () {
    var $id_obra;
    var $tag_container;

    $.prototype.replaceClass = function (a, b) {
        $(this).removeClass(a);
        $(this).addClass(b);
    };

    $.prototype.tagContainer = function () {
        $tag_container = $(this);
        $id_obra = $tag_container.data('id_obra');
        tag_index($id_obra, function (result) {
            $tag_container.empty();
            $tag_container.append(result);
        });
    };

    $(document).ready(function () {

        $(document).on('move.spectrum', function (e, color) {
            var id = $(e.target).data('id');
            if (id) {
                var tag = $('div.tag[data-id="' + id + '"]');
                tag.css('background-color', color.toHexString());
            }
        });

        $(document).on('change.spectrum', function (e, color) {
            var id = $(e.target).data('id');
            if (id) {
                var tag = $('div.tag[data-id="' + id + '"]');
                tag_update(id, {'estilo': "background-color: " + color.toHexString()}, function (response) {
                });
            }
        });

        $(document).on('click', '.checkeable-glyphicon', function () {
            var $this = $(this);
            if ($this.hasClass('glyphicon-unchecked')) {
                $this.replaceClass('glyphicon-unchecked', 'glyphicon-check');
            } else if ($this.hasClass('glyphicon-check')) {
                $this.replaceClass('glyphicon-check', 'glyphicon-unchecked');
            }
        });

        // se ejecuta cuando se presiona la etiqueta, pregunta si tiene etiquetas hijas y las carga si existen
        $(document).on('click', 'div.tag', function () {
            var tag_table = $(this).parents('table.tag-table');
            var tag_span = tag_table.find('div.tag span');
            var id = tag_table.data('id');
            var tag_container = $('div.tag-container[data-id_padre="' + id + '"]');
            if (tag_container.length) {
                tag_span.replaceClass('glyphicon-minus-sign', 'glyphicon-plus-sign');
                tag_container.remove();
            } else {
                tag_show(id, function (result) {
                    if (result != '') {
                        tag_span.replaceClass('glyphicon-plus-sign', 'glyphicon-minus-sign');
                        tag_table.after('<div class="tag-container" data-id_padre="' + id + '"></div>');
                        $('div.tag-container[data-id_padre="' + id + '"]').append(result);
                    }
                });
            }
        });

        // keypress enter en el cuadro de texto para cambiar el nombre de la tag
        $(document).on('keypress', 'input.tag-name', function (e) {
            var input = $(this);
            var nombre = input.val().trim();
            if (e.keyCode == 13 && nombre !== '') {
                var id = input.parents('table.tag-table').data('id');
                tag_update(id, {'nombre': nombre}, function (result) {
                    var table = input.parents('table.tag-table');
                    table.replaceWith(result);
                    if ($('div.tag-container[data-id_padre="' + id + '"]').length) {
                        var span = $('table.tag-table[data-id="' + id + '"]').find('div.tag span');
                        span.replaceClass('glyphicon-plus-sign', 'glyphicon-minus-sign');
                    }
                });
            }
        });

        // añade una sub etiqueta
        $(document).on('click', 'a.tag-addSubtag', function (e) {
            e.preventDefault();
            var $this = $(this);
            var table = $this.parents('table.tag-table');
            var tag = table.find('div.tag');
            var id_padre = table.data('id');
            tag_store(id_padre, $id_obra, function (result) {
                var container = $('div.tag-container[data-id_padre="' + id_padre + '"]');
                if (container.length) {
                    container.append(result);
                } else {
                    tag_show(id_padre, function (result) {
                        if (result != '') {
                            table.after('<div class="tag-container" data-id_padre="' + id_padre + '"></div>');
                            tag.find('span').replaceWith('<span style="float: right" class="glyphicon glyphicon-minus-sign"></span>');
                            $('div.tag-container[data-id_padre="' + id_padre + '"]').append(result);
                        }
                    });
                }
            });
        });

        // eliminar una tag especifico
        $(document).on('click', 'a.tag-destroy', function (e) {
            e.preventDefault();
            var $this = $(this);
            var table = $this.parents('table');
            tag_destroy(table.data('id'), function () {
                var container = $($this.parents('div.tag-container')[0]);
                table.remove();
                if (container.children().length == 0) {
                    var id_padre = container.data('id_padre');
                    if (container.data('id_padre') != '') container.remove();
                    var span = $('table.tag-table[data-id="' + id_padre + '"] .tag span');
                    span.removeClass('glyphicon-plus-sign');
                    span.removeClass('glyphicon-minus-sign');
                }
            });
        });

        $(document).on('click', '#tag-store', function () {
            tag_store(null, $id_obra, function (result) {
                $('div.tag-container[data-id_padre=""]').append(result);
            });
        });
    });

})();

function hexc(colorval) {
    var parts = colorval.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
    delete(parts[0]);
    for (var i = 1; i <= 3; ++i) {
        parts[i] = parseInt(parts[i]).toString(16);
        if (parts[i].length == 1) parts[i] = '0' + parts[i];
    }
    color = '#' + parts.join('');
    return color;
}

function get_idArray() {
    var id_arr = [];
    $('input.tag-checkbox:checked').each(function () {
        id_arr.push($(this).parents('tr').data('id'));
    });
    return id_arr;
}

function tag_index(id_obra, callBack) {
    var form = $('#form-index');
    var url = form.attr('action');
    $.post(url, unirFormData('#form-index', {'id_obra': id_obra}), callBack);
}

function tag_show(id_padre, callBack) {
    var form = $('#form-show');
    var url = form.attr('action').replace(':TAG_ID', id_padre);
    var data = form.serialize();
    $.post(url, data, callBack);
}

function tag_update(id, obj, callBack) {
    var form = $('#form-update');
    var url = form.attr('action').replace(':TAG_ID', id);
    var data = form.serialize() + '&' + Object.keys(obj).map(function (key) {
            return encodeURIComponent(key) + '=' + encodeURIComponent(obj[key]);
        }).join('&');
    $.post(url, data, callBack);
}

function tag_store(id_padre, id_obra, callBack) {
    var form = $('#form-store');
    var url = form.attr('action');
    var obj = {
        'id_obra': id_obra,
        'nombre': 'Nueva Etiqueta',
        'id_padre': id_padre
    };
    var data = form.serialize() + '&' + Object.keys(obj).map(function (key) {
            return encodeURIComponent(key) + '=' + encodeURIComponent(obj[key]);
        }).join('&');
    $.post(url, data, callBack);
}

function tag_destroy(id, callBack) {
    var form = $('#form-destroy');
    var url = form.attr('action').replace(':TAG_ID', id);
    var data = form.serialize();
    $.post(url, data, callBack);
}

function unirFormData(formSelector, data) {
    var f = $(formSelector);
    return f.serialize() + '&' + Object.keys(data).map(function (key) {
            return encodeURIComponent(key) + '=' + encodeURIComponent(data[key]);
        }).join('&');
}