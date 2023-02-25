<script src="{{ asset('/dash/js/core.min.js') }}"></script>
<script src="{{ asset('/dash/js/script.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.2/moment.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.2/locale/es.js"></script>
<script>
    moment.locale('es');

    $("#date_now").text(moment(Date.now()).format('LL'));
</script>