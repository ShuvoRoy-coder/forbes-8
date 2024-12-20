<?php

    $url = '/extra/50-leggazdagabb-magyar-2024-25';

    $script = '/assets/index-DUXcYrYt.js';
    $stylsheet = '/assets/index-KMf2Jzcy.css';
    
    if(!isset($page)) {
        $page = [
            'path' => '/',
            'subpage' => ''
        ];
    }

    if(!isset($metaTitle)) {
        $metaTitle = 'Az 50 leggazdagabb magyar';
        $metaDesc = 'Mészáros Lőrinc ezermilliárd fölött szárnyal. Tiborcz István duplázott, Gattyán György visszaesett. Jellinek Dániel bevásárolt, Jászai Gellért Elon Musknál járt. Wáberer György Cápa lett, Nagy Elek kamarai elnök. Egy új szereplő százmilliárddal debütál, és van, aki négy év – pereskedéssel kikényszerített - kihagyás után tér vissza. Mozgalmas év után 8,5 ezermilliárd forint vagyon összpontosul az ötven leggazdagabb magyar kezében.';
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8" />
    <link rel="icon" type="image/png" href="<?= $url ?>/images/favicon.php" sizes="32x32">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <script>
      window.mainUrl = "<?= $url ?>/";
    </script>


  <!--  font-family: "Courier Prime", monospace;
        font-family: "Montserrat", sans-serif; -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Courier+Prime:ital,wght@0,400;0,700;1,400;1,700&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

  <!-- share area -->
    <meta property="og:site_name" content="Forbes">
    <meta property="og:url" content="">
    <meta property="og:title" content="<?= $metaTitle ?>">
    <meta property="og:description"
      content="<?= $metaDesc ?>">
    <meta property="og:image" content="<?= $url ?>/social-share-images/fb-share.png">

    <title>Forbes - Az 50 leggazdagabb magyar</title>

  <script type="module" crossorigin src="<?=$url.$script?>"></script>
  <link rel="stylesheet" crossorigin href="<?=$url.$stylsheet?>">

</head>

<body class="bg-[#F2F2F2]">
  <div id="app" class="font-monst"></div>

  <script async src="https://www.googletagmanager.com/gtag/js?id=G-F73R2FJYMR"></script>
  <!-- (C)2000-2023 Gemius SA - gemiusPrism  / https://forbes.hu//Magazin + rovatoldal -->
  <script type="text/javascript">
    var pp_gemius_identifier =
      ".Xo64etTp8t6lPAFeINGA.U2rjvRGAMIPafaVcPMWEn.s7";
    // lines below shouldn't be edited
    function gemius_pending(i) {
      window[i] =
        window[i] ||
        function () {
          var x = (window[i + "_pdata"] = window[i + "_pdata"] || []);
          x[x.length] = Array.prototype.slice.call(arguments, 0);
        };
    }
    (function (cmds) {
      var c;
      while ((c = cmds.pop())) gemius_pending(c);
    })([
      "gemius_cmd",
      "gemius_hit",
      "gemius_event",
      "gemius_init",
      "pp_gemius_hit",
      "pp_gemius_event",
      "pp_gemius_init",
    ]);
    (function (d, t) {
      try {
        var gt = d.createElement(t),
          s = d.getElementsByTagName(t)[0],
          l = "http" + (location.protocol == "https:" ? "s" : "");
        gt.setAttribute("async", "async");
        gt.setAttribute("defer", "defer");
        gt.src = l + "://gahu.hit.gemius.pl/xgemius.js";
        s.parentNode.insertBefore(gt, s);
      } catch (e) { }
    })(document, "script");
  </script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag() {
      dataLayer.push(arguments);
    }
    gtag("js", new Date());

    gtag("config", "G-F73R2FJYMR");
  </script>
</body>

</html>