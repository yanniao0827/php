<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
</head>

<body>
    <a href="https://tw.yahoo.com" onclick="return false">yahoo 1 return false</a><br />
    <a href="https://tw.yahoo.com" onclick="func(event)">yahoo 2</a><br />
    <a href="https://tw.yahoo.com" onclick="console.log('行內的', event)">yahoo 3</a><br />

    <script>
        const aTags = document.querySelectorAll("a");

        const func = (e) => {
            e.preventDefault();
        };

        aTags[2].onclick = (e) => {
            console.log('function 內的');
            e.preventDefault();
        };

    </script>
</body>

</html>