u<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<?php
    include 'connection.php';
    $sql = mysqli_query($con, "select * from images where id=2");
    if(mysqli_num_rows($sql) > 0){
        $result =mysqli_fetch_array($sql);
?>

<img src="./resources/<?php echo $result['feature_image']; ?>" alt="">

<?php
    }

?>




    <form id="imageUploadForm" enctype="multipart/form-data">
        <input type="file" name="feature_image" id="feature_image">
        <input type="file" name="supporting_images[]" id="supporting_images" multiple>
        <button type="submit">Upload</button>
    </form>
    <script src="jquery.js"> </script>
    <script>
        // Function to handle form submission
        function uploadImages(event) {
            event.preventDefault();

            var formData = new FormData();

            // Get feature image file and append it to the form data
            var featureImage = document.getElementById('feature_image').files[0];
            formData.append('feature_image', featureImage);

            // Get supporting images files and append them to the form data
            var supportingImages = document.getElementById('supporting_images').files;
            for (var i = 0; i < supportingImages.length; i++) {
                formData.append('supporting_images[]', supportingImages[i]);
            }

            // Send Ajax request to the server
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'upload.php', true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    // Request successful, do something with the response
                    console.log(xhr.responseText);
                } else {
                    // Error occurred during the request
                    console.error(xhr.statusText);
                }
            };
            xhr.send(formData);
        }

        // Attach form submission event listener
        document.getElementById('imageUploadForm').addEventListener('submit', uploadImages);
    </script>

</body>

</html>