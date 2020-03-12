<script>
    alertify.set('notifier', 'position', 'top-center');

    @if (Session::has('status'))
        var alertType = "{{ Session::get('status') }}"; // success/error
        alertify[alertType]("{{ Session::get('message') }}");
    @endif
</script>
