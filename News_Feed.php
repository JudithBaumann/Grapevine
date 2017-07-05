<!Doctype html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <title>Grapevine</title>
    <link rel="stylesheet" href="newsfeed.css"
    <script src="jquery.js"></script>

</head>

    <body>
        <script>
        $(document).ready(function () {
            $("#loader").hide();
            $("#feed").load("newsfeed.php");
        });
        </script>

        <div id="pre_box">
            <div id="status_error"></div>
            <textarea id="status_box" placeholder="Write a status here"></textarea>
            <button id="status_btn">Post Status</button>

        </div>
        <div id="feed">
            <div id="loader">Loading...</div>
        </div>

        <script src="post_status.js"></script>

    </body>
</html>