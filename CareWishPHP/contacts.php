<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/reset.css" />
    <link rel="stylesheet" href="./css/style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Ysabeau:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <title>CareWish</title>
</head>

<body>
    <?php include 'header.php' ?>

    <div class="container">
        <div class="contacts">
            <div class="contacts-info">
                <p class="contacts-info_adress">Contacts Info:</p>
                <p class="contacts-info_adress">Address: Chisinau, str. Studentilor 5/2</p>
                <p class="contacts-info_email">Email: ivan.sergheev@iis.utm.md</p>
                <p class="contacts-info_telefon">Telefon: +373 78312918</p>
                <p class="contacts-info_director">Director: Sergheev Ivan</p>

            </div>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script>
            $(document).ready(function() {
                $('#callback-form').submit(function(e) {
                    e.preventDefault();

                    let formData = $(this).serialize();

                    $.ajax({
                        type: 'POST',
                        url: 'callBack.php',
                        data: formData,
                        success: function(response) {
                            Toastify({
                                text: 'Отзыв успешно отправлен!',
                                duration: 3000,
                                gravity: 'top',
                                position: 'right',
                                backgroundColor: '#0b721c',
                            }).showToast();

                            $('#nameCallBack').val('');
                            $('#phoneCallBack').val('');
                            $('#message').val('');
                        },
                        error: function(xhr, status, error) {
                            Toastify({
                                text: 'Произошла ошибка при отправке отзыва.',
                                duration: 3000,
                                gravity: 'top',
                                position: 'right',
                                backgroundColor: '#0b721c',
                            }).showToast();

                            console.log(error);
                        }
                    });
                });
            });
            </script>+


            <div class="contact-callBack">
                <form id="callback-form" method="post" action="callBack.php">
                    <h2>Offer</h2>
                    <label for="nameCallBack">Name:</label>
                    <input type="text" id="nameCallBack" name="nameCallBack" required>
                    <label for="phoneCallBack">Telefon:</label>
                    <input type="tel" id="phoneCallBack" name="phoneCallBack" required>
                    <label for="message">Message:</label>
                    <textarea id="message" name="message"></textarea>

                    <button type="submit">Submit</button>
                </form>
            </div>

        </div>
    </div>

    <script src="./js/script.js">
    </script>
</body>

</html>