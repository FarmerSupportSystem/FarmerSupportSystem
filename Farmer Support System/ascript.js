<script>
    function validateForm() {
        var landSize = document.getElementById("landSize").value;
        var pincode = document.getElementById("pincode").value;
        var description = document.getElementById("description").value;
        var price = document.getElementById("price").value;
        var duration = document.getElementById("duration").value;
        var contact = document.getElementById("contact").value;
        var publicRadio = document.getElementById("public");
        var privateRadio = document.getElementById("private");

        // Check if any field is empty
        if (landSize == "" || pincode == "" || description == "" || price == "" || duration == "" || contact == "") {
            alert("All fields must be filled out");
            return false;
        }

        // Check if land size, pincode, and price are numbers
        if (isNaN(landSize) || isNaN(pincode) || isNaN(price)) {
            alert("Land size, pincode, and price must be numbers");
            return false;
        }

        // Check if land size, pincode, and price are positive numbers
        if (landSize <= 0 || pincode <= 0 || price <= 0) {
            alert("Land size, pincode, and price must be positive numbers");
            return false;
        }

        // Check if ownership is selected
        if (!publicRadio.checked && !privateRadio.checked) {
            alert("Please select ownership (public or private)");
            return false;
        }

        // Check if contact number is valid
        var contactRegex = /^\d{10}$/;
        if (!contact.match(contactRegex)) {
            alert("Contact number must be a 10-digit number");
            return false;
        }

        // Validation passed
        return true;
    }
</script>