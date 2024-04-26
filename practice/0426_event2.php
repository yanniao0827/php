<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
</head>

<body>
    <div>1</div>
    <div>2</div>
    <div>3</div>
    <div>4</div>

    <script>
        const divs = document.querySelectorAll("div");

        const handler = (e) => {
            console.log(e.target.innerHTML);
        };

        divs.forEach((div) => {
            div.addEventListener("click", handler);
        });

        divs[0].addEventListener("click", (e) => {
            console.log('aaaaaaaaaaaa');
        });
        divs[0].addEventListener("click", (e) => {
            console.log('bbbbbbbbbbbb');
        });
    </script>
</body>

</html>