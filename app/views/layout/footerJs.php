<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>
    window.jQuery || document.write('<script src="src/js/vendor/jquery-3.3.1.min.js"><\/script>')
</script>
<script src="config/public/plugins/popper.js/dist/umd/popper.min.js"></script>
<script src="config/public/plugins/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="config/public/plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
<script src="config/public/plugins/screenfull/dist/screenfull.js"></script>

<script src="config/public/plugins/datatables.net/js/dataTables.personalizado.js"></script>
<script src="config/public/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="config/public/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="config/public/plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="config/public/plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>


<script src="config/public/plugins/moment/moment.js"></script>
<script src="config/public/plugins/tempusdominus-bootstrap-4/build/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="config/public/plugins/d3/dist/d3.min.js"></script>
<script src="config/public/plugins/c3/c3.min.js"></script>
<script src="config/public/js/tables.js"></script>
<script src="config/public/js/widgets.js"></script>
<script src="config/public/js/charts.js"></script>
<script src="config/public/dist/js/theme.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/cleave.js/1.0.2/cleave.min.js"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>

<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<script>
    (function(b, o, i, l, e, r) {
        b.GoogleAnalyticsObject = l;
        b[l] || (b[l] =
            function() {
                (b[l].q = b[l].q || []).push(arguments)
            });
        b[l].l = +new Date;
        e = o.createElement(i);
        r = o.getElementsByTagName(i)[0];
        e.src = 'https://www.google-analytics.com/analytics.js';
        r.parentNode.insertBefore(e, r)
    }(window, document, 'script', 'ga'));
    ga('create', 'UA-XXXXX-X', 'auto');
    ga('send', 'pageview');
</script>

<!--Mascara CPF-->
<script type="text/javascript">
    new Cleave('#cpf', {
        delimiters: ['.', '.', '-'],
        blocks: [3, 3, 3, 2],
        numericOnly: true
    });
</script>

<!--Mascara Valor-->
<script type="text/javascript">
    new Cleave('#valor', {
        delimiters: ['.'],
        blocks: [3, 2],
        numericOnly: true
    });
</script>

<!--Mascara Telefone-->
<script>
    jQuery("input.telefone")
        .mask("(99) 9999-9999?9")
        .focusout(function(event) {
            var target, phone, element;
            target = (event.currentTarget) ? event.currentTarget : event.srcElement;
            phone = target.value.replace(/\D/g, '');
            element = $(target);
            element.unmask();
            if (phone.length > 10) {
                element.mask("(99) 99999-999?9");
            } else {
                element.mask("(99) 9999-9999?9");
            }
        });
</script>

<!--Modal excluir Pedido-->
<script>
    $('#delete_pedido').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whateverid')
        var recipientProduto = button.data('whateverproduto')
        var modal = $(this)
        modal.find('.modal-title').text('ID: ' + recipient)
        modal.find('#texto').text('Produto:  ' + recipientProduto)
        modal.find('#id_cliente').val(recipient)
    });
</script>
<!--Modal excluir Pedido-->

<!--Modal excluir Cliente-->
<script>
    $('#delete_cliente').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whateverid')
        var recipientNome = button.data('whatevernome')
        var modal = $(this)
        modal.find('.modal-title').text('ID: ' + recipient)
        modal.find('#texto').text('Nome:  ' + recipientNome)
        modal.find('#id_cliente').val(recipient)
    });
</script>
<!--Modal excluir Cliente-->

<!--Modal Inativar Cliente-->
<script>
    $('#inativar_cliente').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whateverid')
        var recipientNome = button.data('whatevernome')
        var modal = $(this)
        modal.find('.modal-title').text('ID: ' + recipient)
        modal.find('#texto').text('Nome:  ' + recipientNome)
        modal.find('#id_cliente').val(recipient)
    });
</script>
<!--Modal Inativar Cliente-->

<!--Modal Ativar Cliente-->
<script>
    $('#ativar_cliente').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whateverid')
        var recipientNome = button.data('whatevernome')
        var modal = $(this)
        modal.find('.modal-title').text('ID: ' + recipient)
        modal.find('#texto').text('Nome:  ' + recipientNome)
        modal.find('#id_cliente').val(recipient)
    });
</script>
<!--Modal ativar Cliente-->

</html>