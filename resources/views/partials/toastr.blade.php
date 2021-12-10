@if (session('success'))
<script>
    iziToast.success({
        title: 'Success',
        message: {{ session('success') }},
        position: 'topRight'
    });
</script>
@endif
@if (session('error'))
<script>
    iziToast.error({
        title: 'Error',
        message: {{ session('error') }},
        position: 'topRight'
    });
</script>
@endif
@if (session('info'))
<script>
    iziToast.info({
        title: 'Info',
        message: {{ session('info') }},
        position: 'topRight'
    });
</script>
@endif
