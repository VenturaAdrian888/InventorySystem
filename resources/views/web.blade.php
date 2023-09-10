<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" 
        rel="stylesheet" 
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" 
        crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/quagga/0.12.1/quagga.min.js"></script>    
</head>
<body>
    <div class="container">
        <h1>Webcam Page</h1>
        <div id="scanner-container">
            <div id="scanner" style="width: 100%;"></div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/quagga/0.12.1/quagga.min.js"></script>
    
    <script>
        // JavaScript function to handle the scanned result
        function handleScannedResult(serialCode) {
            localStorage.removeItem('scannedSerialCode'); // Clear the previous value
            localStorage.setItem('scannedSerialCode', serialCode);
            window.close(); // Close the webcam page
        }
        
        // Configure QuaggaJS and start scanning
        Quagga.init({
            inputStream: {
                name: "Live",
                type: "LiveStream",
                target: document.querySelector("#scanner"),
                constraints: {
                    facingMode: "environment" // Use the rear camera (change as needed)
                }
            },
            decoder: {
                readers: ["ean_reader", "code_128_reader"] // Supported barcode formats
            }
        }, function(err) {
            if (err) {
                console.error("Error initializing Quagga:", err);
                return;
            }
            Quagga.start();
        });

        // Handle scanned barcode
        Quagga.onDetected(function(result) {
            const code = result.codeResult.code;
            handleScannedResult(code);
        });
    </script>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" 
        crossorigin="anonymous">

</script>
</html>