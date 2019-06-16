<?php
    include 'header.php';
?> 
<?php
    include './includes/conn.inc.php';

    $query = $pdo->query("SELECT SUBSTRING(title, 1, 20) AS title, SUBSTRING(description_service, 1, 200) AS descript, date_added FROM services ORDER BY id DESC LIMIT 4");
    $query->execute();
    $services = $query->fetchAll();

    $rndService = $services[array_rand($services)];
?>
          
        <div class="showcase">
            <div class="slider">
                <div id="box-img">
                    <img src="./sources/a.jpg">
                </div>
                <button class="prew" onclick="prewImage()"><</button>
                <button class="next" onclick="nextImage()">></button>
            </div>
            <div class="showcase-content">
                <h1><?php echo $rndService['title']; ?></h1>
                <p><?php echo $rndService['descript']; ?></p>
                <div class="btn">
                    <a href="#">Reade More</a><span class="arrow">❯</span>
                </div>
            </div>
        </div>

    </div>
</div>
    
    <div id="boxes">
        <div class="container">
            <?php foreach ($services as $service): ?>
                <div class="box">
                    <h3><?php echo $service['title']; ?></h3>
                    <p><?php echo $service['descript']; ?></p>
                    <p class="date"><?php
                        $mounth = substr($service['date_added'], 5, 2);
                        switch ($mounth) {
                            case '01': $mounth = 'January';
                                break;
                            case '02': $mounth = 'February';
                                break;
                            case '03': $mounth = 'March';
                                break;
                            case '04': $mounth = 'April';
                                break;
                            case '05': $mounth = 'May';
                                break;
                            case '06': $mounth = 'June';
                                break;
                            case '07': $mounth = 'July';
                                break;
                            case '08': $mounth = 'August';
                                break;
                            case '09': $mounth = 'September';
                                break;
                            case '10': $mounth = 'October';
                                break;
                            case '11': $mounth = 'November';
                                break;
                            case '12': $mounth = 'December';
                                break;
                            default: $mounth = 'None';
                                break;
                        }
                        echo $mounth . ' ' . substr($service['date_added'], 8, 2) . ', '.  substr($service['date_added'], 0, 4); ?></p>
                </div>
            <?php endforeach; ?>

        </div>
    </div>

    <div id="quote">
        <div class="container">
            <div class="qoute-box">
                <i class="fas fa-quote-left fa-2x"></i> 
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas eius tempora corporis deleniti iusto animi! loaa Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet. <span class="autori">Qendrim Vrella, CEO, Google</span></p>
            </div>
        </div>
    </div>

    <div id="clients">
        <div class="container">
            <h2>Clients We Have Work With</h2>
            <div class="box-client">
                <img src="./sources/client-1.png" alt="photo">
                <img src="./sources/client-2.png" alt="photo">
                <img src="./sources/client-3.png" alt="photo">
                <img src="./sources/client-4.png" alt="photo">
                <img src="./sources/client-5.png" alt="photo">
            </div>
        </div>
    </div>

<?php
    include 'footer.php';
?>