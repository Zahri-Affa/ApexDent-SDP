$(document).ready(function() {
    "use strict";

    // Quantity validation (ensures no negative quantity)
    $('#quantity').on('input', function() {
        var quantity = $(this).val();
        if (quantity < 0) {
            $(this).val(0); // Set to 0 if negative
            alert("Quantity cannot be negative!");
        }
    });

    // Expiry Date: auto-format the input (you can add more customization)
    $('#expiry_date').on('change', function() {
        var expiryDate = $(this).val();
        if (new Date(expiryDate) < new Date()) {
            alert("The expiry date cannot be in the past!");
        }
    });

    // Handling low stock warning after update
    $(document).on('submit', '#inventoryForm', function(e){
        var quantity = $('#quantity').val();
        if (quantity < 5) {
            alert("⚠️ Low stock alert: You have less than 5 items left in stock!");
        }
    });
});
