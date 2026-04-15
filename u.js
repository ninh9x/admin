(function() {
    var token = '<?php echo htmlspecialchars($_SESSION["csrf_token"] ?? "", ENT_QUOTES); ?>';
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('form[method="post"], form[method="POST"]').forEach(function(form) {
            if (!form.querySelector('input[name="csrf_token"]')) {
                var input = document.createElement('input');
                input.type  = 'hidden';
                input.name  = 'csrf_token';
                input.value = token;
                form.appendChild(input);
            }
        });
    });
})();
