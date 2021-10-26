<?php
require "header.php";
?>

    <section id="description">
        <div class="container">
            <img src="img/logo_szittya.png" alt="Turul Energiaital Szittya">
            <div class="wrapper">
                <article>
                    <h1>Tea + Limonádé + Energia</h1>
                    <p>
                        <span id="hunnia">Édes Erdély itt vagyunk <br/>
                        Érted élünk és halunk <br/>
                        Győz a szittya fergeteg a rohanó sereg</span><br/>
                        Talán ez az idézet írja le legjobban amit a Szittya megalkotásakor éreztünk.
                        Frissítsd fel magad a tea, a limonádé, az elektrolitok és az ütős Szittya energiakeverékünk kombójával, hogy meglegyen a kezdő lökés!
                    </p>
                </article>
                <table class="nutrient-table" id="t1">
                    <caption>Tápértéktartalom</caption>
                    <thead>
                    <tr>
                        <th></th>
                        <th id="100ml">100ml</th>
                        <th id="500ml">500ml</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Energia</td>
                        <td headers="100ml">200kJ</td>
                        <td headers="500ml">1000kJ</td>
                    </tr>
                    <tr>
                        <td>Kalóriában</td>
                        <td headers="100ml">237 kcal</td>
                        <td headers="500ml">47 kcal</td>
                    </tr>
                    <tr>
                        <td>Szénhidrát</td>
                        <td headers="100ml">12 g</td>
                        <td headers="500ml">60 g</td>
                    </tr>
                    <tr>
                        <td>Amelyből cukrok</td>
                        <td headers="100ml">11 g</td>
                        <td headers="500ml">50 g</td>
                    </tr>
                    <tr>
                        <td>Só</td>
                        <td headers="100ml">0.21</td>
                        <td headers="500ml">1.1 g</td>
                    </tr>
                    </tbody>
                </table>
                <table class="nutrient-table" id="t2">
                    <caption>Vitaminok</caption>
                    <thead>
                    <tr>
                        <th></th>
                        <th id="100mlv">100ml(%**)</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>B3-vitamin</td>
                        <td headers="100mlv">0,6 mg (43%)</td>
                    </tr>
                    <tr>
                        <td>Riboflavin</td>
                        <td headers="100mlv">8,0 mg (50%)</td>
                    </tr>
                    <tr>
                        <td>B6-vitamin</td>
                        <td headers="100mlv">0,2 µg (8%)</td>
                    </tr>
                    <tr>
                        <td>B12-vitamin</td>
                        <td headers="100mlv">2,0 mg (33%)</td>
                    </tr>
                    <tr>
                        <td>Pantoténsav</td>
                        <td headers="100mlv">0,8 mg (57%)</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <aside id="products">
        <div id="container">
            <ul>
                <li><a href="klasszik.php"><img src="img/t1_c.png" alt="Turul Energiaital Klasszik"></a></li>
                <li><a href="ultra.php"><img src="img/t2_c.png" alt="Turul Energiaital Ultramagyar"></a></li>
                <li><a href="csibesz.php"><img src="img/t3_c.png" alt="Turul Energiaital Csibész"></a></li>
                <li><a href="szittya.php"><img src="img/t4_c.png" alt="Turul Energiaital Szittya"></a></li>
                <li><a href="harcos.php"><img src="img/t5_c.png" alt="Turul Energiaital Harcos"></a></li>
                <li><a href="https://www.youtube.com/watch?v=KmUMvShEq-E" target="_blank"><img src="img/t_kerdojel_c.png" alt="?"></a></li>
            </ul>
        </div>
    </aside>

    <section id="general-stuff">
        <div class="container">
            <h1>Összetevők</h1>
            <p>
                Víz, Étkezési sav: citromsav, Szén-dioxid, Savanyúságot szabályozó anyag: nátrium-citrátok, Aromák, Panax ginseng gyökér kivonat, Édesítőszerek: szukralóz és aceszulfám K, L-arginin, Koffein, Tartósítószerek: szorbinsav és benzoesav, L-karnitin-L-tartarát, Vitaminok (B3, B5, B6, B12), Glükuronolakton, Guaranamag kivonat, Inozitol.
            </p>
            <h1>Biztonsági információk</h1>
            <p>
                Magas koffeintartalmú. A termék fogyasztása gyermekeknek, terhes nőknek és szoptató anyáknak, koffeinérzékenyeknek, szív- és érrendszeri betegségekben, magas vérnyomásban szenvedőknek nem ajánlott (30 mg/100 ml). Fogyasztása alkohollal nem ajánlott. Fogyaszd felelősséggel!
                A megjelölt ajánlott napi maximális adagot nem szabad túllépni.
            </p>
        </div>
    </section>

<?php
require "footer.php";