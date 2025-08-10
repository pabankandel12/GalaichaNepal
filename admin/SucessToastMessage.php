
<style>
    .toast-success {
        position: fixed;
        top: 20px;
        right: 20px;
        background-color: #4CAF50;
        /* Green */
        color: white;
        padding: 12px 20px;
        border-radius: 5px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        font-size: 16px;
        z-index: 9999;
        opacity: 0;
        transform: translateY(-20px);
        transition: opacity 0.4s ease, transform 0.4s ease;
    }

    .toast-success.show {
        opacity: 1;
        transform: translateY(0);
    }
</style>

<!-- Success Toast Message -->
<?php if (isset($_SESSION['status_updated'])): ?> 
    <div id="successToast" class="toast-success">
        ✅ <?php echo $_SESSION['status_updated']; ?>
    </div>
    <?php unset($_SESSION['status_updated']); ?>
<?php endif; ?>

<script>
    window.onload = function() {
        var toast = document.getElementById("successToast");
        if (toast) {
            toast.classList.add("show");

            // Hide toast after 3 seconds
            setTimeout(function() {
                toast.classList.remove("show");
            }, 3000);
        }
    };
</script>