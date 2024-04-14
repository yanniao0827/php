<pre><?php
        $a = 3;
        $b = 9;


        var_dump($a && $b); //其中一個是false就顯示false
        var_dump($a || $b); //其中一個就算是false還是顯示true
        echo $a && $b; //在php中如果是true就會顯示1，false則不顯示
        echo "<br>";
        echo $a || $b;
        echo "<br>";

        $c = $a and $b; //此時顯示的結果不會是布林值，因為and的優先權比=還要低，因此顯示出的結果是int(a)
        var_dump($c);

        $d = ($a and $b); //如果要顯示布林值，要用()包起來
        var_dump($d);

        ?></pre>